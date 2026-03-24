import { isMobileMatches } from '../../helpers';

export default ( gsap, ScrollTrigger ) => {
	const content = document.querySelector( '.js-gsap-scroll-content' );

	if ( ! content ) {
		return null;
	}

	let scrollTween = null;

	const getScrollAmount = () => {
		return content.scrollHeight - window.innerHeight;
	};

	const createScrollAnimation = () => {
		if ( scrollTween ) {
			return;
		}

		scrollTween = gsap.to( content, {
			y: () => -getScrollAmount(),
			ease: 'none',
			scrollTrigger: {
				trigger: '.js-gsap-scroll-pinned',
				start: 'top top',
				end: () => '+=' + getScrollAmount(),
				scrub: true,
				pin: true,
				anticipatePin: 1,
				invalidateOnRefresh: true
			}
		} );
	};

	const destroyScrollAnimation = () => {
		if ( ! scrollTween ) {
			return;
		}

		const trigger = scrollTween.scrollTrigger;
		if ( trigger ) {
			trigger.kill();
		}
		scrollTween.kill();
		scrollTween = null;

		gsap.set( content, { clearProps: 'y' } );
	};

	const handleResize = () => {
		if ( isMobileMatches() ) {
			destroyScrollAnimation();
		} else {
			createScrollAnimation();
			ScrollTrigger.refresh();
		}
	};

	if ( ! isMobileMatches() ) {
		createScrollAnimation();
	}

	window.addEventListener( 'resize', handleResize );
};
