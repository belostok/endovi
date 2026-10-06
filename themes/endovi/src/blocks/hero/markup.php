<?php
/**
 * Block Name: Hero
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

if ( empty( $block['id'] ) ) {
	return null;
}

$_title        = '';
$note          = '';
$cta_text      = '';
$cta_link      = '';
$cta_text_more = trim_string( get_field( 'hero_cta_text_more' ) );
$cta_link_more = trim_string( get_field( 'hero_cta_link_more' ) );
$slider        = get_array( get_field( 'hero_slider' ) );

$valid_slides = [];
foreach ( $slider as $slide ) {
	if ( ! is_array( $slide ) ) {
		continue;
	}

	if ( empty( $slide['image'] ) ) {
		continue;
	}

	$valid_slides[] = $slide;
}

$slider              = $valid_slides;
$unique_slider_count = count( $slider );
// Need enough slides for Swiper loop + slidesPerView:auto + centeredSlides.
// Always append full unique sets — truncated copies make loop skip the last unique slide.
$min_slider_count = max( 12, $unique_slider_count * 2 );

if ( $unique_slider_count > 0 && $unique_slider_count < $min_slider_count ) {
	$original_slides = $slider;
	$slider_count    = count( $slider );

	while ( $slider_count < $min_slider_count ) {
		foreach ( $original_slides as $original_slide ) {
			$slider[] = $original_slide;
		}
		$slider_count = count( $slider );
	}
}

$first_slide = $slider[0] ?? [];
if ( is_array( $first_slide ) ) {
	$_title   = trim_string( $first_slide['title'] ?? '' );
	$note     = trim_string( $first_slide['note'] ?? '' );
	$cta_text = trim_string( $first_slide['cta_text'] ?? '' );
	$cta_link = trim_string( $first_slide['cta_link'] ?? '' );
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-hero js-hero ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! empty( $block['className'] ) ) {
	$class_names .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_names .= ' align' . $block['align'];
}
?>
<section
	class="<?php echo esc_attr( $class_names ); ?>"
	<?php echo $anchor; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<div class="endovi-hero__wrapper">
		<div class="endovi-hero__upper endovi-container relative">
			<div class="endovi-hero__upper-wrapper endovi-wrapper">
				<div class="endovi-hero__logo-container relative desktop">
					<svg width="1380" height="132" viewBox="0 0 1380 132" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_8640_69488)">
					<path d="M1110.5 1.09071C1110.29 0.879449 1110 0.759235 1109.71 0.753906H1086.49C1086.23 0.780393 1085.99 0.899361 1085.8 1.09071C1085.59 1.32534 1085.48 1.6338 1085.48 1.95376V130.928C1085.49 131.208 1085.6 131.472 1085.8 131.664C1085.89 131.767 1085.99 131.849 1086.11 131.907C1086.23 131.965 1086.36 131.997 1086.49 132.001H1110.89V1.95376C1110.88 1.79001 1110.85 1.6287 1110.78 1.4801C1110.72 1.33151 1110.62 1.19889 1110.5 1.09071Z" fill="white"/>
					<path d="M1238.86 40.7891L1150.29 131.999H1110.83L1199.22 40.7891H1238.86Z" fill="white"/>
					<path d="M1252.33 26.918L1242.65 36.8747H1203.01L1212.67 26.918H1252.33Z" fill="white"/>
					<path d="M1265.99 12.834L1259.55 19.4648H1219.89L1226.33 12.834H1265.99Z" fill="white"/>
					<path d="M1275.75 2.75113L1274.28 4.28779H1234.58L1237.73 1.13028C1237.81 1.02177 1237.91 0.931928 1238.03 0.866633C1238.14 0.801338 1238.27 0.76206 1238.4 0.751375H1274.99C1275.22 0.728177 1275.44 0.781834 1275.62 0.903844C1275.81 1.02585 1275.96 1.20924 1276.03 1.42498C1276.12 1.65036 1276.13 1.89673 1276.08 2.13283C1276.03 2.36893 1275.92 2.58413 1275.75 2.75113Z" fill="white"/>
					<path d="M423.525 1.97334C423.513 1.81531 423.534 1.65641 423.587 1.50763C423.64 1.35884 423.723 1.22372 423.832 1.11162C423.94 0.999516 424.07 0.913102 424.214 0.858354C424.358 0.803607 424.511 0.781831 424.664 0.794536H447.859C447.988 0.796955 448.116 0.826125 448.235 0.88034C448.354 0.934556 448.461 1.01273 448.55 1.11029C448.763 1.34255 448.88 1.65258 448.875 1.97334V130.947C448.864 131.227 448.747 131.492 448.55 131.684C448.461 131.782 448.354 131.86 448.235 131.914C448.116 131.968 447.988 131.997 447.859 132H386.243C386.243 132 383.113 127.495 377.543 119.37L318.59 28.4333C317.573 26.8984 316.21 25.6425 314.62 24.7735C313.031 23.9044 311.261 23.4484 309.463 23.4444H293.2V130.947C293.199 131.087 293.17 131.225 293.114 131.352C293.057 131.479 292.976 131.592 292.875 131.684C292.766 131.79 292.639 131.873 292.499 131.927C292.359 131.981 292.211 132.006 292.062 132H268.928C268.798 131.997 268.67 131.968 268.552 131.914C268.433 131.86 268.326 131.782 268.237 131.684C268.135 131.592 268.054 131.479 267.998 131.352C267.942 131.225 267.912 131.087 267.911 130.947V1.97334C267.904 1.8139 267.929 1.65464 267.985 1.50594C268.041 1.35724 268.127 1.22243 268.237 1.11029C268.326 1.01273 268.433 0.934556 268.552 0.88034C268.67 0.826125 268.798 0.796955 268.928 0.794536H330.299C330.299 0.794536 333.674 5.42556 339.264 13.6561L398.217 104.445C399.198 106.016 400.544 107.307 402.131 108.2C403.718 109.094 405.497 109.562 407.303 109.56H423.566L423.525 1.97334Z" fill="white"/>
					<path d="M683.484 0.79335C688.248 0.771076 692.969 1.72598 697.375 3.60294C701.781 5.47991 705.784 8.24178 709.154 11.7292C712.523 15.2166 715.193 19.3605 717.008 23.9218C718.823 28.483 719.748 33.3713 719.729 38.3046V94.4662C719.751 99.4013 718.828 104.292 717.014 108.856C715.2 113.419 712.531 117.566 709.161 121.055C705.791 124.545 701.787 127.309 697.38 129.187C692.972 131.065 688.249 132.021 683.484 131.999H539.802C539.534 131.995 539.278 131.881 539.091 131.683C538.884 131.447 538.775 131.138 538.786 130.82V1.97215C538.775 1.65432 538.884 1.34468 539.091 1.1091C539.278 0.910793 539.534 0.797304 539.802 0.79335H683.484ZM694.38 34.4735C694.382 33.0021 694.099 31.5451 693.547 30.1892C692.995 28.8332 692.186 27.6058 691.168 26.5797C690.176 25.5084 688.982 24.6602 687.66 24.088C686.338 23.5157 684.916 23.2318 683.484 23.2538H564.135V109.559H683.484C684.918 109.578 686.34 109.291 687.663 108.715C688.985 108.139 690.178 107.287 691.168 106.212C692.18 105.176 692.981 103.939 693.522 102.576C694.063 101.213 694.334 99.7503 694.319 98.2763L694.38 34.4735Z" fill="white"/>
					<path d="M954.485 0.793182C959.247 0.776511 963.966 1.73524 968.369 3.61419C972.773 5.49314 976.774 8.25522 980.143 11.7415C983.511 15.2278 986.181 19.3695 987.998 23.9282C989.815 28.4869 990.743 33.3727 990.73 38.3044V94.4661C990.746 99.3995 989.82 104.288 988.004 108.849C986.188 113.41 983.519 117.554 980.15 121.043C976.781 124.531 972.779 127.295 968.374 129.175C963.969 131.056 959.249 132.015 954.485 131.998H845.89C841.129 132.001 836.415 131.032 832.016 129.147C827.618 127.262 823.621 124.497 820.255 121.012C816.888 117.526 814.219 113.387 812.398 108.832C810.578 104.277 809.642 99.3956 809.645 94.4661V38.3044C809.645 33.3766 810.582 28.4971 812.404 23.9446C814.226 19.3922 816.896 15.256 820.262 11.7725C823.628 8.28901 827.624 5.52639 832.021 3.64251C836.418 1.75863 841.131 0.790417 845.89 0.793182H954.485ZM965.381 34.4733C965.397 32.9973 965.125 31.5331 964.58 30.1692C964.035 28.8052 963.228 27.5698 962.209 26.5374C961.216 25.455 960.017 24.5985 958.687 24.0222C957.357 23.446 955.926 23.1628 954.485 23.1905H845.89C843.012 23.2287 840.262 24.4296 838.226 26.5374C836.191 28.6451 835.031 31.4928 834.994 34.4733V98.2761C835.031 101.257 836.191 104.104 838.226 106.212C840.262 108.32 843.012 109.521 845.89 109.559H954.485C955.926 109.587 957.357 109.303 958.687 108.727C960.017 108.151 961.216 107.294 962.209 106.212C963.228 105.18 964.035 103.944 964.58 102.58C965.125 101.216 965.397 99.7521 965.381 98.2761V34.4733Z" fill="white"/>
					<path d="M1380.02 130.947C1380.02 131.084 1379.99 131.218 1379.93 131.342C1379.88 131.465 1379.79 131.575 1379.69 131.663C1379.59 131.776 1379.46 131.865 1379.32 131.923C1379.18 131.981 1379.03 132.007 1378.88 132H1355.69C1355.42 131.976 1355.18 131.858 1354.99 131.665C1354.81 131.473 1354.69 131.218 1354.67 130.947V1.97341C1354.66 1.81397 1354.69 1.65472 1354.74 1.50602C1354.8 1.35732 1354.88 1.2225 1354.99 1.11036C1355.08 1.00989 1355.19 0.928424 1355.31 0.870629C1355.43 0.812833 1355.55 0.779845 1355.69 0.773558H1378.88C1379.03 0.771329 1379.18 0.799942 1379.32 0.857749C1379.46 0.915556 1379.59 1.00141 1379.69 1.11036C1379.8 1.2225 1379.89 1.35732 1379.94 1.50602C1380 1.65472 1380.03 1.81397 1380.02 1.97341V130.947Z" fill="white"/>
					<path d="M22.3624 77.3747H172.264C172.366 77.3747 172.466 77.354 172.56 77.3138C172.653 77.2736 172.739 77.2147 172.81 77.1404C172.882 77.0661 172.939 76.9779 172.978 76.8809C173.017 76.7838 173.037 76.6798 173.037 76.5748V55.5247C173.031 55.3162 172.948 55.1181 172.803 54.9726C172.659 54.8272 172.465 54.7458 172.264 54.7458H22.3624V29.4857C22.365 28.532 22.5491 27.5882 22.904 26.7082C23.2589 25.8282 23.7777 25.0291 24.4309 24.3567C25.084 23.6843 25.8587 23.1517 26.7106 22.7893C27.5625 22.4269 28.475 22.2418 29.396 22.2445L172.305 22.8339C172.51 22.8339 172.706 22.7496 172.851 22.5996C172.996 22.4496 173.077 22.2462 173.077 22.034V1.19444C173.077 0.98229 172.996 0.778829 172.851 0.628818C172.706 0.478807 172.51 0.394532 172.305 0.394532H1.68836C1.46156 0.394378 1.23706 0.441576 1.02827 0.533302C0.819485 0.625027 0.6307 0.759397 0.473199 0.928384C0.315699 1.09737 0.192716 1.29751 0.111601 1.51682C0.0304865 1.73614 -0.00709508 1.97014 0.00110258 2.20484V104.382C0.00110258 111.64 2.78536 118.6 7.74137 123.732C12.6974 128.864 19.4192 131.747 26.428 131.747H172.264C172.469 131.747 172.665 131.663 172.81 131.513C172.955 131.363 173.037 131.159 173.037 130.947V110.044C173.031 109.836 172.948 109.638 172.803 109.492C172.659 109.347 172.465 109.265 172.264 109.266L29.3553 109.855C27.504 109.844 25.7315 109.077 24.4223 107.722C23.1132 106.366 22.373 104.531 22.3624 102.614V77.3747Z" fill="white"/>
					</g>
					<defs>
					<clipPath id="clip0_8640_69488">
					<rect width="1380" height="132" fill="white"/>
					</clipPath>
					</defs>
					</svg>
				</div>
				<div class="endovi-hero__title-wrapper relative flex fwrap jcspb aife">
					<div class="endovi-hero__title-container js-hero-title-container" <?php echo $_title ? '' : 'hidden'; ?>>
						<h1 class="endovi-hero__title h1 js-hero-title">
							<?php echo wp_kses_post( $_title ); ?>
						</h1>
					</div>
					<div class="endovi-hero__description-container js-hero-note-container" <?php echo $note ? '' : 'hidden'; ?>>
						<p class="endovi-hero__description js-hero-note">
							<?php echo esc_html( $note ); ?>
						</p>
					</div>
					<div class="endovi-hero__upper-button-container flex fdc aife jcfe">
						<div class="endovi-hero__pagination-number js-pagination-number"></div>
						<div class="js-hero-cta-container" <?php echo ( $cta_text && $cta_link ) ? '' : 'hidden'; ?>>
							<?php
							get_template_part(
								'partials/button',
								null,
								array(
									'text'        => $cta_text,
									'link'        => $cta_link,
									'classes'     => 'js-hero-cta',
									'allow_empty' => true,
								)
							);
							?>
						</div>
					</div>
				</div>
			</div>
			<?php if ( ! empty( $slider ) ) : ?>
				<div class="endovi-hero__slider-container absolute">
					<div
						class="endovi-hero__slider js-hero-slider"
						data-autoplay="1"
						data-unique-count="<?php echo esc_attr( (string) absint( $unique_slider_count ) ); ?>"
					>
						<div class="endovi-hero__slider-wrapper swiper-wrapper">
							<?php
							$slide_index = 0;
							foreach ( $slider as $slide ) :
								if ( ! is_array( $slide ) ) {
									continue;
								}

								$slide_image = (int) ( $slide['image'] ?? 0 );

								if ( ! $slide_image ) {
									continue;
								}

								$original_index = ( $unique_slider_count > 0 ) ? ( $slide_index % $unique_slider_count ) : 0;
								$slide_title    = trim_string( $slide['title'] ?? '' );
								$slide_note     = trim_string( $slide['note'] ?? '' );
								$slide_cta_text = trim_string( $slide['cta_text'] ?? '' );
								$slide_cta_link = trim_string( $slide['cta_link'] ?? '' );
								++ $slide_index;
								?>
								<div
									class="endovi-hero__slide swiper-slide img-cover"
									data-slide-index="<?php echo esc_attr( (string) absint( $original_index ) ); ?>"
									data-note="<?php echo esc_attr( $slide_note ); ?>"
									data-cta-text="<?php echo esc_attr( $slide_cta_text ); ?>"
									data-cta-link="<?php echo esc_attr( $slide_cta_link ? esc_url( $slide_cta_link ) : '' ); ?>"
								>
									<div class="js-hero-slide-title" hidden>
										<?php echo wp_kses_post( $slide_title ); ?>
									</div>
									<?php endovi_the_image( $slide_image, 'endovi-hero__slide-image' ); ?>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="endovi-hero__pagination endovi-pagination js-pagination"></div>
					<button class="endovi-hero__nav endovi-hero__nav_prev endovi-nav endovi-nav_prev js-nav-prev">
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M0.146446 4.03544C-0.0488157 3.84018 -0.0488157 3.52359 0.146446 3.32833L3.32843 0.146351C3.52369 -0.0489108 3.84027 -0.0489108 4.03553 0.146351C4.2308 0.341614 4.2308 0.658196 4.03553 0.853458L1.20711 3.68189L4.03553 6.51031C4.2308 6.70557 4.2308 7.02216 4.03553 7.21742C3.84027 7.41268 3.52369 7.41268 3.32843 7.21742L0.146446 4.03544ZM9.5 3.68188L9.5 4.18188L0.5 4.18189L0.5 3.68189L0.5 3.18189L9.5 3.18188L9.5 3.68188Z"
								fill="white"/>
						</svg>
					</button>
					<button class="endovi-hero__nav endovi-hero__nav_next endovi-nav endovi-nav_next js-nav-next">
						<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path
								d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z"
								fill="white"/>
						</svg>
					</button>
				</div>
			<?php endif; ?>
		</div>
		<div class="endovi-hero__lower endovi-container relative">
			<div class="endovi-hero__background-text endovi-background-text">
				о компании ENDOVI о компании ENDOVI о компании ENDOVI о компании ENDOVI о компании ENDOVI
			</div>
			<div class="endovi-hero__lower-wrapper endovi-wrapper relative">
				<div class="endovi-hero__lower-button-container flex jcc">
					<?php
					get_template_part(
						'partials/button',
						null,
						array(
							'text'    => $cta_text_more,
							'link'    => $cta_link_more,
							'classes' => 'endovi-button_orange',
						)
					);
					?>
				</div>
			</div>
		</div>
	</div>
</section>
