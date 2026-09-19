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
				const slides         = sliderContainer.querySelectorAll( '.swiper-slide' );
				const numPagination  = parent.querySelector( '.js-pagination-number' );
				const titleContainer = parent.querySelector( '.js-hero-title-container' );
				const titleEl        = parent.querySelector( '.js-hero-title' );
				const noteContainer  = parent.querySelector( '.js-hero-note-container' );
				const noteEl         = parent.querySelector( '.js-hero-note' );
				const ctaContainer   = parent.querySelector( '.js-hero-cta-container' );
				const cta            = parent.querySelector( '.js-hero-cta' );
				const ctaLabel       = cta ? cta.querySelector( 'span' ) : null;
				const isAutoplay     = sliderContainer.dataset.autoplay;
				const delay          = sliderContainer.dataset.delay;
				const totalSlides    = slides.length;
				const uniqueCount    = Number( sliderContainer.dataset.uniqueCount ) || totalSlides;

				const padNum = ( num ) => String( num ).padStart( 2, '0' );

				const getActiveSlide = ( swiper ) => {
					if ( ! swiper || ! swiper.slides ) {
						return null;
					}

					return swiper.slides[ swiper.activeIndex ] || null;
				};

				const getSlideIndex = ( swiper ) => {
					if ( uniqueCount > 0 && Number.isFinite( swiper.realIndex ) ) {
						return ( ( swiper.realIndex % uniqueCount ) + uniqueCount ) % uniqueCount;
					}

					const activeSlide = getActiveSlide( swiper );
					if ( ! activeSlide ) {
						return 0;
					}

					const slideIndex = Number( activeSlide.dataset.slideIndex );
					if ( Number.isFinite( slideIndex ) && slideIndex >= 0 ) {
						return slideIndex % uniqueCount;
					}

					return 0;
				};

				const updateHeroContent = ( swiper ) => {
					const activeSlide = getActiveSlide( swiper );
					if ( ! activeSlide ) {
						return;
					}

					const titleSource = activeSlide.querySelector( '.js-hero-slide-title' );
					const title       = titleSource ? titleSource.innerHTML.trim() : '';
					const note        = activeSlide.dataset.note || '';
					const ctaText     = activeSlide.dataset.ctaText || '';
					const ctaLink     = activeSlide.dataset.ctaLink || '';
					const current     = getSlideIndex( swiper );

					if ( titleEl ) {
						titleEl.innerHTML = title;
					}
					if ( titleContainer ) {
						titleContainer.hidden = ! title;
					}

					if ( noteEl ) {
						noteEl.textContent = note;
					}
					if ( noteContainer ) {
						noteContainer.hidden = ! note;
					}

					if ( cta && ctaContainer ) {
						const hasCta        = Boolean( ctaText && ctaLink );
						ctaContainer.hidden = ! hasCta;
						cta.setAttribute( 'href', hasCta ? ctaLink : '#' );
						if ( ctaLabel ) {
							ctaLabel.textContent = hasCta ? ctaText : '';
						}
					}

					if ( numPagination ) {
						numPagination.textContent = `${ padNum( current + 1 ) }/${ padNum( uniqueCount ) }`;
					}

					const bullets = parent.querySelectorAll( '.js-pagination .swiper-pagination-bullet' );
					bullets.forEach( ( bullet, bulletIndex ) => {
						if ( bulletIndex >= uniqueCount ) {
							bullet.hidden = true;
							return;
						}

						bullet.hidden = false;
						bullet.classList.toggle( 'swiper-pagination-bullet-active', bulletIndex === current );
					} );
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
					loopAdditionalSlides: uniqueCount,
					autoplay: isAutoplay && totalSlides > minLength ? autoplay : false,
					navigation: {
						prevEl: parent.querySelector( '.js-nav-prev' ),
						nextEl: parent.querySelector( '.js-nav-next' ),
					},
					pagination: {
						el: parent.querySelector( '.js-pagination' ),
						type: 'bullets',
						clickable: true,
						renderBullet: ( bulletIndex, className ) => {
							if ( bulletIndex >= uniqueCount ) {
								return '';
							}

							return `<span class="${ className }"></span>`;
						},
					},
					on: {
						init: updateHeroContent,
						slideChange: updateHeroContent,
						realIndexChange: updateHeroContent,
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
