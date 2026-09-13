<?php
/**
 * Block Name: Hero News
 *
 * @var $block
 */

use endoviTheme\Constants\Constants;
use function endoviTheme\Helpers\trim_string;

if ( empty( $block['id'] ) ) {
	return null;
}

$_post_id = get_the_ID();
$_title   = trim_string( get_the_title() );

if ( ! $_post_id || ! $_title ) {
	return null;
}

$excerpt   = trim_string( get_the_excerpt() );
$date      = trim_string( get_field( 'news_dates', $_post_id ) );
$image     = (int) get_field( 'hero_news_image' );
$image_mob = (int) get_field( 'hero_news_image_mobile' );
$image_mob = $image_mob ? $image_mob : $image;
$term_name = '';

$terms = get_the_terms( $_post_id, Constants::TAX_MEDIA_TYPES_SLUG );
if ( $terms && ! is_wp_error( $terms ) ) {
	$_term     = $terms[0];
	$term_name = $_term->name;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-hero-news endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-hero-news__wrapper endovi-wrapper relative">
		<button type="button" class="endovi-hero-news__back-button flex aic absolute default-hover js-back-button">
			<svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M0.146447 3.32809C-0.0488157 3.52335 -0.0488157 3.83993 0.146447 4.03519L3.32843 7.21717C3.52369 7.41244 3.84027 7.41244 4.03553 7.21717C4.2308 7.02191 4.2308 6.70533 4.03553 6.51007L1.20711 3.68164L4.03553 0.853214C4.2308 0.657951 4.2308 0.341369 4.03553 0.146107C3.84027 -0.0491555 3.52369 -0.0491555 3.32843 0.146107L0.146447 3.32809ZM7.5 3.68164V3.18164L0.5 3.18164V3.68164V4.18164L7.5 4.18164V3.68164Z" fill="#020033"/>
			</svg>
			<span><?php echo esc_html__( 'Назад', 'endovi' ); ?></span>
		</button>
		<div class="endovi-hero-news__inner flex fdc">
			<?php if ( $image ) : ?>
				<div class="endovi-hero-news__image-container relative">
					<?php endovi_the_image( $image, 'endovi-hero-news__image desktop' ); ?>
					<?php endovi_the_image( $image_mob, 'endovi-hero-news__image mobile' ); ?>
					<?php if ( $term_name ) : ?>
						<div class="endovi-hero-news__badge-container absolute">
							<p class="endovi-hero-news__badge text-small">
								<?php echo esc_html( $term_name ); ?>
							</p>
						</div>
					<?php endif; ?>
				</div>
			<?php endif; ?>
			<div class="endovi-hero-news__title-block flex fdc">
				<div class="endovi-hero-news__title-container">
					<h1 class="endovi-hero-news__title h2">
						<?php echo esc_html( $_title ); ?>
					</h1>
				</div>
				<div class="endovi-hero-news__footer flex jcfe">
					<?php if ( $date ) : ?>
						<div class="endovi-hero-news__date-container">
							<p class="endovi-hero-news__date text-small text-gray">
								<?php echo esc_html( $date ); ?>
							</p>
						</div>
					<?php endif; ?>
					<?php if ( $excerpt ) : ?>
						<div class="endovi-hero-news__excerpt-container">
							<p class="endovi-hero-news__excerpt text-small text-gray">
								<?php echo esc_html( $excerpt ); ?>
							</p>
						</div>
					<?php endif; ?>
					<div class="endovi-hero-news__share-container flex">
						<button type="button" class="endovi-hero-news__share flex aic default-hover js-share-button">
							<span><?php echo esc_html__( 'Поделиться', 'endovi' ); ?></span>
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4.6875 8.12446C4.60462 8.12446 4.52513 8.15739 4.46653 8.21599C4.40792 8.2746 4.375 8.35408 4.375 8.43696V16.562C4.375 16.7345 4.515 16.8745 4.6875 16.8745H15.3125C15.3954 16.8745 15.4749 16.8415 15.5335 16.7829C15.5921 16.7243 15.625 16.6448 15.625 16.562V8.43696C15.625 8.35408 15.5921 8.2746 15.5335 8.21599C15.4749 8.15739 15.3954 8.12446 15.3125 8.12446H14.0625C13.8139 8.12446 13.5754 8.02569 13.3996 7.84988C13.2238 7.67406 13.125 7.43561 13.125 7.18696C13.125 6.93832 13.2238 6.69987 13.3996 6.52405C13.5754 6.34824 13.8139 6.24946 14.0625 6.24946H15.3125C16.52 6.24946 17.5 7.22946 17.5 8.43696V16.562C17.5 17.1421 17.2695 17.6985 16.8593 18.1088C16.4491 18.519 15.8927 18.7495 15.3125 18.7495H4.6875C4.10734 18.7495 3.55094 18.519 3.1407 18.1088C2.73047 17.6985 2.5 17.1421 2.5 16.562V8.43696C2.5 7.22946 3.48 6.24946 4.6875 6.24946H5.9375C6.18614 6.24946 6.4246 6.34824 6.60041 6.52405C6.77623 6.69987 6.875 6.93832 6.875 7.18696C6.875 7.43561 6.77623 7.67406 6.60041 7.84988C6.4246 8.02569 6.18614 8.12446 5.9375 8.12446H4.6875ZM9.77875 0.220715C9.80778 0.191613 9.84226 0.168524 9.88023 0.15277C9.91819 0.137015 9.9589 0.128906 10 0.128906C10.0411 0.128906 10.0818 0.137015 10.1198 0.15277C10.1577 0.168524 10.1922 0.191613 10.2213 0.220715L13.8412 3.84071C13.8851 3.88442 13.9149 3.94015 13.927 4.00085C13.9391 4.06154 13.9329 4.12446 13.9092 4.18163C13.8855 4.2388 13.8454 4.28765 13.7939 4.32198C13.7424 4.35631 13.6819 4.37458 13.62 4.37446H10.9375V11.562C10.9375 11.8106 10.8387 12.0491 10.6629 12.2249C10.4871 12.4007 10.2486 12.4995 10 12.4995C9.75136 12.4995 9.5129 12.4007 9.33709 12.2249C9.16127 12.0491 9.0625 11.8106 9.0625 11.562V4.37446H6.38C6.31811 4.37458 6.25758 4.35631 6.20609 4.32198C6.1546 4.28765 6.11446 4.2388 6.09076 4.18163C6.06706 4.12446 6.06087 4.06154 6.07298 4.00085C6.08508 3.94015 6.11493 3.88442 6.15875 3.84071L9.77875 0.220715Z" fill="#020033"/>
							</svg>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
