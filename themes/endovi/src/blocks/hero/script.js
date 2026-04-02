import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import { debounce } from '../../scripts/helpers';

document.addEventListener( 'DOMContentLoaded', () => {
	const sliderContainers = document.querySelectorAll( '.js-hero-slider' );
	const minLength        = 3;
	let sliders            = [];

	sliderContainers.forEach( ( el, index ) => {
		sliders[ index ] = null;
	} );

	sliderContainers.forEach( ( sliderContainer, index ) => {
		if ( sliders[ index ] === null ) {
			const parent = sliderContainer.closest( '.js-hero' );
			if ( parent ) {
				const slides        = sliderContainer.querySelectorAll( '.swiper-slide' );
				const numPagination = parent.querySelector( '.js-pagination-number' );
				const isAutoplay    = sliderContainer.dataset.autoplay;
				const delay         = sliderContainer.dataset.delay;
				const totalSlides   = slides.length;

				const padNum = ( num ) => String( num ).padStart( 2, '0' );

				const updateNumPagination = ( swiper ) => {
					if ( ! numPagination ) {
						return null;
					}
					numPagination.textContent = `${ padNum( swiper.realIndex + 1 ) }/${ padNum( totalSlides ) }`;
				};

				const autoplay   = {
					delay: delay || 5000,
					disableOnInteraction: true
				};
				sliders[ index ] = new Swiper( ( sliderContainer ), {
					modules: [ Autoplay, Navigation, Pagination ],
					slidesPerView: 'auto',
					centeredSlides: true,
					loop: totalSlides > minLength,
					autoplay: isAutoplay && totalSlides > minLength ? autoplay : false,
					navigation: {
						prevEl: parent.querySelector( '.js-nav-prev' ),
						nextEl: parent.querySelector( '.js-nav-next' ),
					},
					pagination: {
						el: parent.querySelector( '.js-pagination' ),
						type: 'bullets',
						clickable: true
					},
					on: {
						init: updateNumPagination,
						slideChange: updateNumPagination,
					},
					breakpoints: {
						768: {
							allowTouchMove: false,
						}
					}
				} );
			}
		}
	} );

	const updateSliders = debounce( () => {
		sliders.forEach( ( swiper ) => {
			if ( swiper ) {
				swiper.update();
			}
		} );
	}, 200 );

	window.addEventListener( 'resize', updateSliders );
} );
