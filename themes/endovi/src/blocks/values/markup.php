<?php
/**
 * Block Name: Values
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'values_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$pre_title = trim_string( get_field( 'values_pre_title' ) );
$items     = get_array( get_field( 'values_items' ) );

if ( empty( $items ) ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-values endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! empty( $block['className'] ) ) {
	$class_names .= ' ' . $block['className'];
}

if ( ! empty( $block['align'] ) ) {
	$class_names .= ' align' . $block['align'];
}

$buttons_html = '';
$content_html = '';
$i            = 0;
foreach ( $items as $item ) {
	$button_title        = trim_string( $item['button_title'] ?? '' );
	$content_icon        = (int) ( $item['content_icon'] ?? 0 );
	$content_description = trim_string( $item['content_description'] ?? '' );

	if ( ! $button_title || ! $content_description ) {
		continue;
	}

	++$i;

	ob_start();
	?>
	<li class="endovi-values__list-item">
		<button
			class="endovi-values__list-button flex jcfe js-tab-widget-button <?php echo ( 1 === $i ) ? 'endovi-values__list-button_active' : ''; ?>"
			data-tab="<?php echo esc_attr( $i ); ?>"
		>
			<span class="endovi-values__list-count text-small">
				<?php echo esc_html( sprintf( '%02d', $i ) ); ?>
			</span>
			<span class="endovi-values__list-title h4">
				<?php echo esc_html( $button_title ); ?>
			</span>
		</button>
	</li>
	<?php
	$buttons_html .= ob_get_clean();

	ob_start();
	?>
	<div
		class="endovi-values__content-item fdc js-tab-widget-content <?php echo ( 1 === $i ) ? 'endovi-values__content-item_active' : ''; ?>"
		data-tab="<?php echo esc_attr( $i ); ?>"
	>
		<?php if ( $content_icon ) : ?>
			<div class="endovi-values__content-image-container">
				<?php endovi_the_image( $content_icon ); ?>
			</div>
		<?php endif; ?>
		<div class="endovi-values__content-title-container mobile">
			<h4 class="endovi-values__content-title h4">
				<?php echo esc_html( $button_title ); ?>
			</h4>
		</div>
		<div class="endovi-values__content-description-container">
			<div class="endovi-values__content-description text-normal">
				<p><?php echo wp_kses_post( $content_description ); ?></p>
			</div>
		</div>
	</div>
	<?php
	$content_html .= ob_get_clean();
}

if ( ! $buttons_html || ! $content_html ) {
	return null;
}
?>
<section
	class="<?php echo esc_attr( $class_names ); ?>"
	<?php echo $anchor; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
>
	<div class="endovi-values__wrapper endovi-wrapper relative">
		<?php
		if ( $pre_title ) {
			get_template_part(
				'partials/corner-title',
				null,
				array(
					'title'   => $pre_title,
					'classes' => 'endovi-values__corner-title desktop',
				)
			);
		}
		?>
		<div class="endovi-values__widget js-tab-widget">
			<div class="endovi-values__buttons desktop">
				<ul class="endovi-values__list">
					<?php echo $buttons_html; // phpcs:ignore ?>
				</ul>
			</div>
			<div class="endovi-values__content">
				<?php echo $content_html; // phpcs:ignore ?>
			</div>
		</div>
	</div>
</section>
