import Swiper from 'swiper';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';

const PLAY_BUTTON_HIDDEN_CLASS = 'endovi-image-slider__play-button_hidden';
const VIEWER_OPEN_CLASS        = 'is-open';
const VIEWER_VIDEO_CLASS       = 'endovi-image-slider__viewer_video';
const VIEWER_SINGLE_CLASS      = 'endovi-image-slider__viewer_single';
const IMAGE_ZOOM               = 2.5;

const ICON_PREV = '<svg width="10" height="8" viewBox="0 0 10 8" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z" fill="#020033"/></svg>';
const ICON_NEXT = '<svg width="10" height="8" viewBox="0 0 10 8" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z" fill="#020033"/></svg>';
const ICON_CLOSE = '<svg width="14" height="14" viewBox="0 0 14 14" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L13 13M13 1L1 13" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>';
const ICON_PLAY = '<svg class="is-play" width="12" height="14" viewBox="0 0 25 28" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M23.3984 12.0491C24.7318 12.8189 24.7318 14.7434 23.3984 15.5132L2.99844 27.2911C1.66511 28.0609 -0.00156156 27.0987 -0.0015615 25.5591L-0.00156047 2.00321C-0.0015604 0.463608 1.66511 -0.498645 2.99844 0.271155L23.3984 12.0491Z" fill="#FF9462"/></svg>';
const ICON_PAUSE = '<svg class="is-pause" width="12" height="14" viewBox="0 0 12 14" fill="none" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><rect x="1" width="3.5" height="14" rx="1" fill="#FF9462"/><rect x="7.5" width="3.5" height="14" rx="1" fill="#FF9462"/></svg>';

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

const formatTime = ( seconds ) => {
	if ( ! Number.isFinite( seconds ) || seconds < 0 ) {
		return '0:00';
	}

	const total   = Math.floor( seconds );
	const hours   = Math.floor( total / 3600 );
	const minutes = Math.floor( ( total % 3600 ) / 60 );
	const secs    = String( total % 60 ).padStart( 2, '0' );

	if ( hours > 0 ) {
		return `${ hours }:${ String( minutes ).padStart( 2, '0' ) }:${ secs }`;
	}

	return `${ minutes }:${ secs }`;
};

const getLargestImageSrc = ( image ) => {
	const fallback = image.currentSrc || image.getAttribute( 'src' ) || '';
	const srcset   = image.getAttribute( 'srcset' );

	if ( ! srcset ) {
		return fallback;
	}

	let bestSrc   = fallback;
	let bestWidth = 0;

	srcset.split( ',' ).forEach( ( candidate ) => {
		const [ url, descriptor = '' ] = candidate.trim().split( /\s+/ );
		const width                    = descriptor.endsWith( 'w' ) ? parseInt( descriptor, 10 ) : 0;

		if ( url && width >= bestWidth ) {
			bestWidth = width;
			bestSrc   = url;
		}
	} );

	return bestSrc;
};

const getRealIndex = ( slides, slide ) => {
	const listedIndex = slides.indexOf( slide );

	if ( listedIndex >= 0 ) {
		return listedIndex;
	}

	const attrValue = slide.getAttribute( 'data-swiper-slide-index' );

	if ( attrValue !== null && attrValue !== '' ) {
		const attr = Number( attrValue );

		if ( Number.isInteger( attr ) && attr >= 0 && attr < slides.length ) {
			return attr;
		}
	}

	return 0;
};

const createButton = ( className, label, svg ) => {
	const button = document.createElement( 'button' );

	button.type = 'button';
	button.className = className;
	button.setAttribute( 'aria-label', label );
	button.innerHTML = svg;

	return button;
};

const createMediaViewer = ( { root, sliderContainer, slides, swiper } ) => {
	const labels = {
		viewer: root.dataset.labelViewer || 'Fullscreen media',
		close: root.dataset.labelClose || 'Close',
		prev: root.dataset.labelPrev || 'Previous slide',
		next: root.dataset.labelNext || 'Next slide',
		play: root.dataset.labelPlay || 'Play',
		pause: root.dataset.labelPause || 'Pause',
		seek: root.dataset.labelSeek || 'Video position',
	};

	const viewer = document.createElement( 'div' );
	const stage  = document.createElement( 'div' );
	const closeButton = createButton( 'endovi-image-slider__viewer-close', labels.close, ICON_CLOSE );
	const prevButton  = createButton(
		'endovi-image-slider__viewer-nav endovi-image-slider__viewer-nav_prev endovi-nav endovi-nav_fill',
		labels.prev,
		ICON_PREV
	);
	const nextButton = createButton(
		'endovi-image-slider__viewer-nav endovi-image-slider__viewer-nav_next endovi-nav endovi-nav_fill',
		labels.next,
		ICON_NEXT
	);
	const controls = document.createElement( 'div' );
	const toggle   = createButton( 'endovi-image-slider__viewer-toggle', labels.play, ICON_PLAY + ICON_PAUSE );
	const range    = document.createElement( 'input' );
	const time     = document.createElement( 'span' );

	let isOpen       = false;
	let isSeeking    = false;
	let currentIndex = 0;
	let activeVideo  = null;
	let returnFocus  = null;
	const scrollLock = {
		html: '',
		body: '',
	};

	viewer.className = 'endovi-image-slider__viewer';
	viewer.setAttribute( 'role', 'dialog' );
	viewer.setAttribute( 'aria-modal', 'true' );
	viewer.setAttribute( 'aria-hidden', 'true' );
	viewer.setAttribute( 'aria-label', labels.viewer );
	viewer.inert = true;

	if ( slides.length < 2 ) {
		viewer.classList.add( VIEWER_SINGLE_CLASS );
	}

	stage.className = 'endovi-image-slider__viewer-stage';
	controls.className = 'endovi-image-slider__viewer-controls';
	time.className = 'endovi-image-slider__viewer-time';
	time.textContent = '0:00 / 0:00';

	range.className = 'endovi-image-slider__viewer-range';
	range.type = 'range';
	range.min = '0';
	range.max = '1000';
	range.step = '1';
	range.value = '0';
	range.setAttribute( 'aria-label', labels.seek );

	controls.append( toggle, range, time );
	viewer.append( closeButton, prevButton, nextButton, stage, controls );
	document.body.appendChild( viewer );

	const lockScroll = () => {
		scrollLock.html = document.documentElement.style.overflow;
		scrollLock.body = document.body.style.overflow;
		document.documentElement.style.overflow = 'hidden';
		document.body.style.overflow = 'hidden';
	};

	const unlockScroll = () => {
		document.documentElement.style.overflow = scrollLock.html;
		document.body.style.overflow = scrollLock.body;
	};

	const setPlaying = ( isPlaying ) => {
		toggle.classList.toggle( 'is-playing', isPlaying );
		toggle.setAttribute( 'aria-label', isPlaying ? labels.pause : labels.play );
	};

	const paintRange = ( ratio ) => {
		const safe = Math.min( Math.max( ratio, 0 ), 1 );

		range.value = String( Math.round( safe * 1000 ) );
		range.style.setProperty( '--value', `${ safe * 100 }%` );
	};

	const paintTime = ( video ) => {
		const duration = Number.isFinite( video.duration ) ? video.duration : 0;

		time.textContent = `${ formatTime( video.currentTime ) } / ${ formatTime( duration ) }`;
	};

	const clearVideoUi = () => {
		activeVideo = null;
		isSeeking   = false;
		setPlaying( false );
		paintRange( 0 );
		time.textContent = '0:00 / 0:00';
	};

	const syncSlider = ( index ) => {
		if ( ! swiper || swiper.destroyed || swiper.realIndex === index ) {
			return;
		}

		if ( swiper.params.loop ) {
			swiper.slideToLoop( index );
			return;
		}

		swiper.slideTo( index );
	};

	const fitViewerImage = ( image ) => {
		const rect = stage.getBoundingClientRect();

		if ( ! rect.width || ! rect.height ) {
			return;
		}

		image.style.maxWidth  = `${ rect.width }px`;
		image.style.maxHeight = `${ rect.height }px`;
	};

	const bindZoom = ( frame, image ) => {
		const move = ( event ) => {
			if ( event.pointerType === 'touch' ) {
				return;
			}

			const rect = frame.getBoundingClientRect();

			if ( ! rect.width || ! rect.height ) {
				return;
			}

			const x  = Math.min( Math.max( ( event.clientX - rect.left ) / rect.width, 0 ), 1 );
			const y  = Math.min( Math.max( ( event.clientY - rect.top ) / rect.height, 0 ), 1 );
			const tx = -( x - 0.5 ) * ( IMAGE_ZOOM - 1 ) * 100;
			const ty = -( y - 0.5 ) * ( IMAGE_ZOOM - 1 ) * 100;

			image.classList.add( 'is-moving' );
			image.style.transform = `translate(${ tx }%, ${ ty }%) scale(${ IMAGE_ZOOM })`;
		};

		const reset = () => {
			image.classList.remove( 'is-moving' );
			image.style.transform = 'translate(0, 0) scale(1)';
		};

		frame.addEventListener( 'pointermove', move );
		frame.addEventListener( 'pointerleave', reset );
		frame.addEventListener( 'pointercancel', reset );
	};

	const renderImage = ( sourceImage ) => {
		const frame = document.createElement( 'div' );
		const image = document.createElement( 'img' );

		frame.className = 'endovi-image-slider__viewer-frame';
		image.className = 'endovi-image-slider__viewer-image';
		image.alt = sourceImage.alt || '';
		image.draggable = false;
		image.src = getLargestImageSrc( sourceImage );

		if ( sourceImage.naturalWidth && sourceImage.naturalHeight ) {
			image.width  = sourceImage.naturalWidth;
			image.height = sourceImage.naturalHeight;
		}

		frame.appendChild( image );
		stage.appendChild( frame );
		fitViewerImage( image );
		requestAnimationFrame( () => fitViewerImage( image ) );
		bindZoom( frame, image );
	};

	const onTimeUpdate = ( event ) => {
		const video = event?.currentTarget || activeVideo;

		if ( ! video || video !== activeVideo || isSeeking || ! Number.isFinite( video.duration ) || video.duration <= 0 ) {
			return;
		}

		paintRange( video.currentTime / video.duration );
		paintTime( video );
	};

	const renderVideo = ( src, poster ) => {
		const video = document.createElement( 'video' );

		video.className = 'endovi-image-slider__viewer-video';
		video.playsInline = true;
		video.preload = 'auto';
		video.setAttribute( 'playsinline', '' );
		video.setAttribute( 'webkit-playsinline', '' );

		if ( poster ) {
			video.poster = poster;
		}

		activeVideo = video;

		video.addEventListener( 'play', () => {
			if ( activeVideo === video ) {
				setPlaying( true );
			}
		} );
		video.addEventListener( 'pause', () => {
			if ( activeVideo === video ) {
				setPlaying( false );
			}
		} );
		video.addEventListener( 'ended', () => {
			if ( activeVideo === video ) {
				setPlaying( false );
			}
		} );
		video.addEventListener( 'timeupdate', onTimeUpdate );
		video.addEventListener( 'loadedmetadata', onTimeUpdate );
		video.addEventListener( 'click', () => {
			if ( video.paused || video.ended ) {
				video.play();
				return;
			}

			video.pause();
		} );

		video.src = src;
		stage.appendChild( video );
		paintRange( 0 );
		paintTime( video );

		const playPromise = video.play();

		if ( playPromise && typeof playPromise.then === 'function' ) {
			playPromise.then( () => {
				if ( activeVideo === video ) {
					setPlaying( true );
				}
			} ).catch( () => {
				if ( activeVideo === video ) {
					setPlaying( false );
				}
			} );
		}
	};

	const show = ( index ) => {
		const count = slides.length;

		if ( ! count ) {
			return;
		}

		currentIndex = ( index + count ) % count;

		const slide = slides[ currentIndex ];
		const video = slide?.querySelector( '.endovi-image-slider__video' );
		const source = video?.querySelector( 'source' );
		const videoSrc = source?.src || video?.currentSrc || '';

		if ( activeVideo ) {
			activeVideo.pause();
		}

		stage.replaceChildren();
		clearVideoUi();

		if ( video && videoSrc ) {
			viewer.classList.add( VIEWER_VIDEO_CLASS );
			renderVideo( videoSrc, video.getAttribute( 'poster' ) || '' );
		} else {
			viewer.classList.remove( VIEWER_VIDEO_CLASS );

			const image = slide?.querySelector( '.endovi-image-slider__image' );

			if ( image ) {
				renderImage( image );
			}
		}

		syncSlider( currentIndex );
	};

	const close = () => {
		if ( ! isOpen ) {
			return;
		}

		isOpen = false;

		if ( activeVideo ) {
			activeVideo.pause();
		}

		stage.replaceChildren();
		clearVideoUi();
		viewer.classList.remove( VIEWER_OPEN_CLASS, VIEWER_VIDEO_CLASS );
		viewer.setAttribute( 'aria-hidden', 'true' );
		viewer.inert = true;
		unlockScroll();

		if ( returnFocus && typeof returnFocus.focus === 'function' ) {
			returnFocus.focus();
		}
	};

	const open = ( index, focusTarget ) => {
		const slide = slides[ index ];

		if ( ! slide || ! slide.querySelector( '.endovi-image-slider__video, .endovi-image-slider__image' ) ) {
			return;
		}

		const wasOpen = isOpen;

		if ( ! wasOpen ) {
			returnFocus = focusTarget || document.activeElement;
			isOpen = true;
			lockScroll();

			if ( swiper?.autoplay?.running ) {
				swiper.autoplay.stop();
			}

			sliderContainer.querySelectorAll( '.swiper-slide' ).forEach( pauseSlideVideo );
			viewer.inert = false;
			viewer.classList.add( VIEWER_OPEN_CLASS );
			viewer.setAttribute( 'aria-hidden', 'false' );
		}

		show( index );

		if ( ! wasOpen ) {
			requestAnimationFrame( () => closeButton.focus() );
		}
	};

	const shift = ( delta ) => {
		if ( slides.length < 2 ) {
			return;
		}

		show( currentIndex + delta );
	};

	closeButton.addEventListener( 'click', close );
	prevButton.addEventListener( 'click', () => shift( -1 ) );
	nextButton.addEventListener( 'click', () => shift( 1 ) );

	toggle.addEventListener( 'click', () => {
		if ( ! activeVideo ) {
			return;
		}

		if ( activeVideo.paused || activeVideo.ended ) {
			activeVideo.play();
			return;
		}

		activeVideo.pause();
	} );

	range.addEventListener( 'pointerdown', () => {
		isSeeking = true;
	} );

	range.addEventListener( 'input', () => {
		if ( ! activeVideo || ! Number.isFinite( activeVideo.duration ) ) {
			return;
		}

		const ratio = Number( range.value ) / 1000;

		activeVideo.currentTime = ratio * activeVideo.duration;
		range.style.setProperty( '--value', `${ ratio * 100 }%` );
		paintTime( activeVideo );
	} );

	document.addEventListener( 'pointerup', () => {
		isSeeking = false;
	} );

	viewer.addEventListener( 'click', ( event ) => {
		if ( event.target === viewer || event.target === stage ) {
			close();
		}
	} );

	document.addEventListener( 'keydown', ( event ) => {
		if ( ! isOpen ) {
			return;
		}

		if ( event.key === 'Escape' ) {
			event.preventDefault();
			close();
			return;
		}

		if ( event.key !== 'ArrowLeft' && event.key !== 'ArrowRight' ) {
			return;
		}

		if ( event.target.closest( 'input, video' ) ) {
			return;
		}

		event.preventDefault();
		shift( event.key === 'ArrowRight' ? 1 : -1 );
	} );

	window.addEventListener( 'resize', () => {
		if ( ! isOpen ) {
			return;
		}

		const image = stage.querySelector( '.endovi-image-slider__viewer-image' );

		if ( ! image ) {
			return;
		}

		image.classList.remove( 'is-moving' );
		image.style.transform = 'translate(0, 0) scale(1)';
		fitViewerImage( image );
	} );

	return { open };
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
				const realSlides    = Array.from( slides );
				const isAutoplay    = sliderContainer.dataset.autoplay;
				const delay         = sliderContainer.dataset.delay;
				const totalSlides   = slides.length;

				slides.forEach( ( slide ) => {
					initSlideVideo( slide );
					slide.querySelectorAll( 'img' ).forEach( ( image ) => {
						image.setAttribute( 'draggable', 'false' );
					} );
				} );

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

				const viewer = createMediaViewer( {
					root: parent,
					sliderContainer,
					slides: realSlides,
					swiper: sliders[ index ],
				} );

				sliderContainer.addEventListener( 'click', ( event ) => {
					if ( event.target.closest( '.endovi-image-slider__card' ) ) {
						return;
					}

					const slide = event.target.closest( '.endovi-image-slider__slide' );

					if ( ! slide || ! sliderContainer.contains( slide ) ) {
						return;
					}

					const focusTarget = event.target.closest( 'button, [tabindex="0"]' );

					viewer.open( getRealIndex( realSlides, slide ), focusTarget );
				} );

				sliderContainer.addEventListener( 'keydown', ( event ) => {
					if ( event.key !== 'Enter' && event.key !== ' ' ) {
						return;
					}

					if ( event.target.closest( '.js-play-button, .endovi-image-slider__card' ) ) {
						return;
					}

					const slide = event.target.closest( '.endovi-image-slider__slide' );

					if ( ! slide || ! event.target.closest( '.endovi-image-slider__image-container' ) ) {
						return;
					}

					event.preventDefault();
					viewer.open( getRealIndex( realSlides, slide ), event.target );
				} );
			}
		}
	} );
} );
