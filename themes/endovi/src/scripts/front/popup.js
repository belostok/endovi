import { removeLoadingState, setLoadingState } from '../helpers';

const POPUP_HASH_PREFIX = '#popup';
const ACTIVE_CLASS      = 'js-popup-active';
const OVERLAY_CLASS     = 'site-content_overlay';
const BODY_OPEN_CLASS   = 'js-popup-open';

const parsePopupParams = ( hrefOrHash ) => {
	if ( ! hrefOrHash || ! hrefOrHash.includes( POPUP_HASH_PREFIX ) ) {
		return null;
	}

	let hash = hrefOrHash;

	try {
		hash = new URL( hrefOrHash, window.location.href ).hash;
	} catch {
		hash = hrefOrHash.includes( '#' )
			? hrefOrHash.substring( hrefOrHash.indexOf( '#' ) )
			: hrefOrHash;
	}

	if ( ! hash.startsWith( POPUP_HASH_PREFIX ) ) {
		return null;
	}

	const query = hash.slice( POPUP_HASH_PREFIX.length ).replace( /^\?/, '' );

	if ( ! query ) {
		return null;
	}

	const params = new URLSearchParams( query );
	const form   = params.get( 'form' );

	if ( ! form ) {
		return null;
	}

	return {
		form,
		title: params.get( 'title' ) || '',
	};
};

const buildPopupHash = ( { form, title } ) => {
	let hash = `${ POPUP_HASH_PREFIX }?form=${ encodeURIComponent( form ) }`;

	if ( title ) {
		hash += `&title=${ encodeURIComponent( title ) }`;
	}

	return hash;
};

const getPopupContainer = () => {
	let popup = document.querySelector( '.js-popup' );

	if ( ! popup ) {
		popup           = document.createElement( 'div' );
		popup.className = 'endovi-popup js-popup';
		document.body.appendChild( popup );
	}

	return popup;
};

const initCf7 = ( container ) => {
	if ( typeof wpcf7 === 'undefined' || typeof wpcf7.init !== 'function' ) {
		return;
	}

	container.querySelectorAll( '.wpcf7 > form' ).forEach( ( form ) => {
		wpcf7.init( form );
	} );
};

const setPopupOpenState = ( isOpen ) => {
	const siteContent = document.querySelector( '.site-content' );

	if ( siteContent ) {
		siteContent.classList.toggle( OVERLAY_CLASS, isOpen );
	}

	document.body.classList.toggle( BODY_OPEN_CLASS, isOpen );
};

const closePopup = ( updateHistory = true ) => {
	const popup = document.querySelector( '.js-popup' );

	if ( ! popup ) {
		return;
	}

	popup.classList.remove( ACTIVE_CLASS );
	popup.innerHTML = '';
	setPopupOpenState( false );

	if ( updateHistory && window.location.hash.includes( POPUP_HASH_PREFIX ) ) {
		const url = window.location.pathname + window.location.search;
		window.history.replaceState( null, '', url );
	}
};

const openPopup = async ( params, updateHistory = true ) => {
	if ( typeof endovi_ajax === 'undefined' ) {
		return;
	}

	const popup = getPopupContainer();
	const formData = new FormData();

	formData.append( 'action', 'endovi_get_popup' );
	formData.append( 'nonce', endovi_ajax.nonce );
	formData.append( 'form', params.form );
	formData.append( 'title', params.title || '' );

	setLoadingState( 'popup' );

	try {
		const response = await fetch( endovi_ajax.url, {
			method: 'POST',
			body: formData,
			credentials: 'same-origin',
		} );

		const data = await response.json();

		if ( ! data?.success || ! data?.data?.html ) {
			return;
		}

		popup.innerHTML = data.data.html;
		initCf7( popup );
		popup.classList.add( ACTIVE_CLASS );
		setPopupOpenState( true );

		if ( updateHistory ) {
			window.history.pushState( { popup: true }, '', buildPopupHash( params ) );
		}
	} catch ( error ) {
		// eslint-disable-next-line no-console
		console.error( error );
	} finally {
		removeLoadingState();
	}
};

export default () => {
	document.addEventListener( 'click', ( e ) => {
		const target = e.target;

		if ( target?.closest( '.js-popup-close' ) ) {
			e.preventDefault();
			closePopup();
			return;
		}

		const popupBackdrop = target?.closest( '.js-popup' );

		if ( popupBackdrop?.classList.contains( ACTIVE_CLASS ) && target === popupBackdrop ) {
			closePopup();
			return;
		}

		const link = target?.closest( 'a[href*="#popup"]' );

		if ( ! link ) {
			return;
		}

		const params = parsePopupParams( link.href || link.getAttribute( 'href' ) );

		if ( ! params ) {
			return;
		}

		e.preventDefault();
		openPopup( params );
	} );

	document.addEventListener( 'keydown', ( e ) => {
		if ( e.key === 'Escape' && document.querySelector( `.js-popup.${ ACTIVE_CLASS }` ) ) {
			closePopup();
		}
	} );

	window.addEventListener( 'popstate', () => {
		if ( window.location.hash.includes( POPUP_HASH_PREFIX ) ) {
			const params = parsePopupParams( window.location.hash );

			if ( params ) {
				openPopup( params, false );
			}

			return;
		}

		closePopup( false );
	} );

	const initialParams = parsePopupParams( window.location.hash );

	if ( initialParams ) {
		openPopup( initialParams, false );
	}
};
