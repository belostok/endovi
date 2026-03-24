export default () => {
	const prepareCl = 'endovi-header__menu-container_prepare';
	const activeCl  = 'endovi-header__menu-container_active';
	const timeout   = 300;

	document.addEventListener( 'click', ( e ) => {
		const target = e.target;

		if ( target?.closest( '.js-menu-button' ) ) {
			const menuContainer = target.parentNode?.querySelector( '.js-menu' );

			if ( ! menuContainer ) {
				return null;
			}

			menuContainer.classList.add( prepareCl );
			setTimeout( () => {
				menuContainer.classList.add( activeCl );
			}, 0 );
		}

		if ( target?.closest( '.js-close-menu-button' ) ) {
			const menuContainer = target.closest( '.js-menu' );

			if ( ! menuContainer ) {
				return null;
			}

			menuContainer.classList.remove( activeCl );
			setTimeout( () => {
				menuContainer.classList.remove( prepareCl );
			}, timeout );
		}
	} );
}
