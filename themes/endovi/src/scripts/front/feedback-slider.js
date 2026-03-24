import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';

export default () => {
	const sliderContainers = document.querySelectorAll( '.js-feedback-slider' );
	const minLength        = 1;
	let sliders            = [];

	sliderContainers.forEach( ( el, index ) => {
		sliders[ index ] = null;
	} );

	sliderContainers.forEach( ( sliderContainer, index ) => {
		if ( sliders[ index ] === null ) {
			const parent = sliderContainer.parentNode;
			if ( parent ) {
				const slides        = sliderContainer.querySelectorAll( '.swiper-slide' );
				const isAutoplay    = sliderContainer.dataset.autoplay;
				const delay         = sliderContainer.dataset.delay;
				const totalSlides   = slides.length;

				const autoplay   = {
					delay: delay || 8000,
					disableOnInteraction: true
				};
				sliders[ index ] = new Swiper( ( sliderContainer ), {
					modules: [ Autoplay, Navigation, Pagination ],
					slidesPerView: 1,
					spaceBetween: 20,
					autoHeight: true,
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
					}
				} );
			}
		}
	} );
}
