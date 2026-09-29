const COPIED_TIMEOUT = 2000;

const copyText = async ( text ) => {
	try {
		await navigator.clipboard.writeText( text );
		return;
	} catch {
		const input = document.createElement( 'textarea' );
		input.value = text;
		input.setAttribute( 'readonly', '' );
		input.style.position = 'absolute';
		input.style.left = '-9999px';
		document.body.appendChild( input );
		input.select();
		document.execCommand( 'copy' );
		document.body.removeChild( input );
	}
};

document.addEventListener( 'click', async ( e ) => {
	const shareButton = e.target?.closest( '.js-share-button' );

	if ( shareButton ) {
		const url = shareButton.dataset.shareUrl || window.location.href;
		const alert = shareButton.closest( '.endovi-hero-news__share-container' )?.querySelector( '.js-share-alert' );

		await copyText( url );

		if ( ! alert ) {
			return;
		}

		alert.hidden = false;
		alert.classList.add( 'endovi-hero-news__share-alert_visible' );

		if ( alert.copyTimeoutId ) {
			clearTimeout( alert.copyTimeoutId );
		}

		alert.copyTimeoutId = setTimeout( () => {
			alert.classList.remove( 'endovi-hero-news__share-alert_visible' );
			alert.hidden = true;
		}, COPIED_TIMEOUT );

		return;
	}

	const button = e.target?.closest( '.js-back-button' );

	if ( ! button ) {
		return;
	}

	window.history.back();
} );
