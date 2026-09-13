document.addEventListener( 'click', ( e ) => {
	const button = e.target?.closest( '.js-back-button' );

	if ( ! button ) {
		return;
	}

	window.history.back();
} );
