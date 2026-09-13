const REQUIRED_SELECTOR = '.wpcf7-form-control.wpcf7-validates-as-required, .wpcf7-form-control.wpcf7-acceptance:not(.optional)';

const getForm = ( target ) => {
	if ( ! target ) {
		return null;
	}

	if ( target.classList?.contains( 'wpcf7-form' ) ) {
		return target;
	}

	return target.closest?.( '.wpcf7-form' ) || null;
};

const getWrap = ( control ) => control.closest( '.wpcf7-form-control-wrap' ) || control;

const isChoiceControl = ( control ) => {
	return control.matches( '.wpcf7-checkbox, .wpcf7-radio, .wpcf7-acceptance, [type="checkbox"], [type="radio"]' );
};

const isEmpty = ( control ) => {
	if ( isChoiceControl( control ) ) {
		const scope = control.matches( 'input' ) ? getWrap( control ) : control;

		return ! scope.querySelector( 'input:checked' );
	}

	if ( control.matches( '[type="file"]' ) ) {
		return ! control.files?.length;
	}

	if ( 'value' in control ) {
		return ! String( control.value ).trim();
	}

	const field = control.querySelector( 'input, textarea, select' );

	return ! field || ! String( field.value ).trim();
};

const getFocusTarget = ( control ) => {
	if ( control.matches( 'input, textarea, select' ) ) {
		return control;
	}

	return control.querySelector( 'input, textarea, select' );
};

const setInvalid = ( control, invalid ) => {
	const wrap    = getWrap( control );
	const targets = new Set( [ control, wrap ] );

	wrap.querySelectorAll( 'input[type="checkbox"], input[type="radio"]' ).forEach( ( input ) => {
		targets.add( input );
	} );

	targets.forEach( ( el ) => {
		el.classList.toggle( 'wpcf7-not-valid', invalid );

		if ( invalid ) {
			el.setAttribute( 'aria-invalid', 'true' );
		} else {
			el.removeAttribute( 'aria-invalid' );
		}
	} );
};

const validateForm = ( form ) => {
	let firstInvalid = null;

	form.querySelectorAll( REQUIRED_SELECTOR ).forEach( ( control ) => {
		const empty = isEmpty( control );

		setInvalid( control, empty );

		if ( empty && ! firstInvalid ) {
			firstInvalid = getFocusTarget( control );
		}
	} );

	firstInvalid?.focus();

	return ! firstInvalid;
};

const clearIfValid = ( target ) => {
	const wrap = target.closest( '.wpcf7-form-control-wrap' );

	if ( ! wrap ) {
		return;
	}

	const control = wrap.querySelector( REQUIRED_SELECTOR ) || wrap.querySelector( '.wpcf7-form-control' );

	if ( ! control || isEmpty( control ) ) {
		return;
	}

	setInvalid( control, false );
};

export default () => {
	document.addEventListener( 'submit', ( e ) => {
		const form = getForm( e.target );

		if ( ! form || validateForm( form ) ) {
			return;
		}

		e.preventDefault();
		e.stopImmediatePropagation();
	}, true );

	document.addEventListener( 'input', ( e ) => {
		if ( getForm( e.target ) ) {
			clearIfValid( e.target );
		}
	} );

	document.addEventListener( 'change', ( e ) => {
		if ( getForm( e.target ) ) {
			clearIfValid( e.target );
		}
	} );
};
