import { endoviSetCookie } from '../helpers';

const COOKIE_NAME = 'endovi_cookie';

export default () => {
	document.addEventListener( 'click', ( e ) => {
		const closeBtn = e.target?.closest( '.js-cookie-close' );

		if ( ! closeBtn ) {
			return;
		}

		const container = closeBtn.closest( '.js-cookie' );

		if ( ! container ) {
			return;
		}

		endoviSetCookie( COOKIE_NAME, '1', 365 * 100 );
		container.remove();
	} );
};
