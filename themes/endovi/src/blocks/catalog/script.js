const btnActiveCl     = 'endovi-catalog__tab-button_active';
const contentActiveCl = 'endovi-catalog__categories_active';

document.addEventListener( 'click', ( e ) => {
	const button = e.target?.closest( '.js-catalog-tab-button' );

	if ( ! button ) {
		return;
	}

	if ( button.classList.contains( btnActiveCl ) ) {
		return;
	}

	const tabIndex = button.dataset.tab;
	const block    = button.closest( '.js-catalog-block' );

	if ( ! tabIndex || ! block ) {
		return;
	}

	const buttons       = block.querySelectorAll( '.js-catalog-tab-button' );
	const contents      = block.querySelectorAll( '.js-catalog-tab' );
	const targetContent = block.querySelector( `.js-catalog-tab[data-tab="${ tabIndex }"]` );

	if ( ! buttons.length || ! contents.length || ! targetContent ) {
		return;
	}

	buttons.forEach( ( btn ) => {
		btn.classList.remove( btnActiveCl );
	} );
	contents.forEach( ( content ) => {
		content.classList.remove( contentActiveCl );
	} );

	button.classList.add( btnActiveCl );
	targetContent.classList.add( contentActiveCl );
} );
