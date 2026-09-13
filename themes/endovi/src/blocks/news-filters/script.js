import { debounce, removeLoadingState, setLoadingState } from '../../scripts/helpers';

const ACTIVE_CLASS = 'endovi-news-filters__category-button_active';

let abortController = null;
let filterRequestId = 0;

const getSearchForm = ( block ) => block.querySelector( '.js-search-form' );

const getSearchValue = ( block ) => {
	const input = getSearchForm( block )?.querySelector( 'input[name="search"]' );

	return input ? input.value.trim() : '';
};

const getMediaType = ( block ) => {
	const form = getSearchForm( block );

	return Number( form?.dataset.id || block.dataset.id ) || 0;
};

const getActiveCategory = ( block ) => {
	const active = block.querySelector( `.js-news-filters-cat-button.${ ACTIVE_CLASS }` );

	return active ? Number( active.dataset.id ) || 0 : 0;
};

const filterNews = async ( block ) => {
	if ( typeof endovi_ajax === 'undefined' ) {
		return;
	}

	const items     = block.querySelector( '.js-news-filters-items' );
	const mediaType = getMediaType( block );

	if ( ! items || ! mediaType ) {
		return;
	}

	const formData = new FormData();

	formData.append( 'action', 'endovi_filter_news' );
	formData.append( 'nonce', endovi_ajax.nonce );
	formData.append( 'media_type', String( mediaType ) );
	formData.append( 'category', String( getActiveCategory( block ) ) );
	formData.append( 'search', getSearchValue( block ) );

	if ( abortController ) {
		abortController.abort();
	}

	abortController = new AbortController();

	const { signal } = abortController;
	const requestId  = ++filterRequestId;

	setLoadingState( 'news-filters' );

	try {
		const response = await fetch( endovi_ajax.url, {
			method: 'POST',
			body: formData,
			credentials: 'same-origin',
			signal,
		} );

		const data = await response.json();

		if ( requestId !== filterRequestId ) {
			return;
		}

		if ( ! data?.success || typeof data?.data?.html !== 'string' ) {
			return;
		}

		items.innerHTML = data.data.html;
	} catch ( error ) {
		if ( error?.name === 'AbortError' ) {
			return;
		}

		// eslint-disable-next-line no-console
		console.error( error );
	} finally {
		removeLoadingState();
	}
};

document.addEventListener( 'click', ( e ) => {
	const button = e.target?.closest( '.js-news-filters-cat-button' );

	if ( ! button || button.classList.contains( ACTIVE_CLASS ) ) {
		return;
	}

	const block = button.closest( '.js-news-filters' );

	if ( ! block ) {
		return;
	}

	block.querySelectorAll( '.js-news-filters-cat-button' ).forEach( ( btn ) => {
		btn.classList.remove( ACTIVE_CLASS );
	} );

	button.classList.add( ACTIVE_CLASS );
	filterNews( block );
} );

document.addEventListener( 'submit', ( e ) => {
	const form = e.target?.closest( '.js-news-filters .js-search-form' );

	if ( ! form ) {
		return;
	}

	e.preventDefault();

	const block = form.closest( '.js-news-filters' );

	if ( ! block ) {
		return;
	}

	filterNews( block );
} );

const debouncedFilterNews = debounce( ( block ) => {
	filterNews( block );
}, 300 );

document.addEventListener( 'input', ( e ) => {
	const input = e.target?.closest( '.js-news-filters .js-search-form input[name="search"]' );

	if ( ! input ) {
		return;
	}

	const block = input.closest( '.js-news-filters' );

	if ( ! block ) {
		return;
	}

	debouncedFilterNews( block );
} );
