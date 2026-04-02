import Swiper from 'swiper';
import { Autoplay } from 'swiper/modules';
import { isMobileMatchesSm } from '../../scripts/helpers';

document.addEventListener( 'DOMContentLoaded', () => {
const sliderContainers = document.querySelectorAll( '.js-dealers-slider' );
	const minLength        = 4;
	const sliders          = [];

	const initSlider = ( sliderContainer, index ) => {
		const slides      = sliderContainer.querySelectorAll( '.swiper-slide' );
		const isAutoplay  = sliderContainer.dataset.autoplay;
		const delay       = sliderContainer.dataset.delay;
		const totalSlides = slides.length;

		const autoplay = {
			delay: delay || 3000,
			disableOnInteraction: true
		};

		sliders[ index ] = new Swiper( sliderContainer, {
			modules: [ Autoplay ],
			slidesPerView: 'auto',
			allowTouchMove: false,
			loop: totalSlides > minLength,
			autoplay: isAutoplay && totalSlides > minLength ? autoplay : false
		} );
	};

	const destroySlider = ( index ) => {
		if ( sliders[ index ] ) {
			sliders[ index ].destroy( true, true );
			sliders[ index ] = null;
		}
	};

	const checkSliders = () => {
		sliderContainers.forEach( ( sliderContainer, index ) => {
			if ( isMobileMatchesSm() ) {
				destroySlider( index );
			} else {
				if ( ! sliders[ index ] ) {
					initSlider( sliderContainer, index );
				}
			}
		} );
	};

	checkSliders();

	window.addEventListener( 'resize', checkSliders );
} );
