export default () => {
	document.addEventListener( 'click', ( e ) => {
		const target = e.target;

		if ( target?.closest( '.js-tab-widget-button' ) ) {
			const buttonData = target.dataset.tab;
			const container  = target.closest( '.js-tab-widget' );

			if ( ! container || ! buttonData ) {
				return null;
			}

			const targetContent = container.querySelector( `.js-tab-widget-content[data-tab="${ buttonData }"]` );

			if ( ! targetContent ) {
				return null;
			}

			const buttonCl = 'endovi-values__list-button_active';
			const contentCl = 'endovi-values__content-item_active';
			targetContent.classList.add( contentCl );
			container.querySelectorAll( '.js-tab-widget-content' ).forEach( ( content ) => {
				if ( content !== targetContent ) {
					content.classList.remove( contentCl );
				}
			} );

			target.classList.add( buttonCl );
			container.querySelectorAll( '.js-tab-widget-button' ).forEach( ( button ) => {
				if ( button !== target ) {
					button.classList.remove( buttonCl );
				}
			} );
		}
	} );
}
