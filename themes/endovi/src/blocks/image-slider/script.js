import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';

const PLAY_BUTTON_HIDDEN_CLASS = 'endovi-image-slider__play-button_hidden';

const togglePlayButton = ( playButton, isVisible ) => {
	if ( ! playButton ) {
		return;
	}

	playButton.classList.toggle( PLAY_BUTTON_HIDDEN_CLASS, ! isVisible );
};

const pauseSlideVideo = ( slide ) => {
	const video      = slide?.querySelector( '.endovi-image-slider__video' );
	const playButton = slide?.querySelector( '.js-play-button' );

	if ( ! video ) {
		return;
	}

	video.pause();
	togglePlayButton( playButton, true );
};

const resetSlideVideo = ( slide ) => {
	const video      = slide?.querySelector( '.endovi-image-slider__video' );
	const playButton = slide?.querySelector( '.js-play-button' );

	if ( ! video ) {
		return;
	}

	video.pause();
	video.currentTime = 0;

	if ( video.getAttribute( 'poster' ) ) {
		video.load();
	}

	togglePlayButton( playButton, true );
};

const initSlideVideo = ( slide ) => {
	const video      = slide.querySelector( '.endovi-image-slider__video' );
	const playButton = slide.querySelector( '.js-play-button' );

	if ( ! video || ! playButton ) {
		return;
	}

	playButton.addEventListener( 'click', () => {
		video.play();
	} );

	video.addEventListener( 'click', () => {
		if ( ! video.paused && ! video.ended ) {
			pauseSlideVideo( slide );
		}
	} );

	video.addEventListener( 'play', () => {
		togglePlayButton( playButton, false );
	} );

	video.addEventListener( 'pause', () => {
		togglePlayButton( playButton, true );
	} );

	video.addEventListener( 'ended', () => {
		resetSlideVideo( slide );
	} );
};

document.addEventListener( 'DOMContentLoaded', () => {
	const sliderContainers = document.querySelectorAll( '.js-image-slider-slider' );
	const minLength        = 1;
	let sliders            = [];

	sliderContainers.forEach( ( el, index ) => {
		sliders[ index ] = null;
	} );

	sliderContainers.forEach( ( sliderContainer, index ) => {
		if ( sliders[ index ] === null ) {
			const parent = sliderContainer.closest( '.js-image-slider' );
			if ( parent ) {
				const slides        = sliderContainer.querySelectorAll( '.swiper-slide' );
				const isAutoplay    = sliderContainer.dataset.autoplay;
				const delay         = sliderContainer.dataset.delay;
				const totalSlides   = slides.length;

				slides.forEach( initSlideVideo );

				const autoplay   = {
					delay: delay || 5000,
					disableOnInteraction: true
				};
				sliders[ index ] = new Swiper( ( sliderContainer ), {
					modules: [ Autoplay, Navigation, Pagination ],
					slidesPerView: 1,
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
						slideChange: ( swiper ) => {
							swiper.slides.forEach( ( slide ) => {
								resetSlideVideo( slide );
							} );
						},
					},
				} );
			}
		}
	} );
} );
