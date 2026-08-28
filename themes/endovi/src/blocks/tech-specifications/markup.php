<?php
/**
 * Block Name: Tech Specifications
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'tech_specifications_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$models_raw = get_array( get_field( 'tech_specifications_models' ) );
$rows_raw   = get_array( get_field( 'tech_specifications_rows' ) );

$models = [];

foreach ( $models_raw as $model ) {
	if ( ! is_array( $model ) ) {
		continue;
	}

	$_title = trim_string( $model['title'] ?? '' );

	if ( '' === $_title ) {
		continue;
	}

	$models[] = $_title;
}

$rows         = [];
$models_count = count( $models );

foreach ( $rows_raw as $row ) {
	if ( ! is_array( $row ) ) {
		continue;
	}

	$label  = trim_string( $row['label'] ?? '' );
	$values = [];

	foreach ( get_array( $row['values'] ?? [] ) as $item ) {
		if ( ! is_array( $item ) ) {
			continue;
		}

		$values[] = trim_string( $item['value'] ?? '' );
	}

	if ( '' === $label && empty( $values ) ) {
		continue;
	}

	$values_count = count( $values );

	// Align values count with models count.
	while ( $values_count < $models_count ) {
		$values[] = '';
		++$values_count;
	}

	if ( $values_count > $models_count ) {
		$values = array_slice( $values, 0, $models_count );
	}

	$rows[] = [
		'label'  => $label,
		'values' => $values,
	];
}

if ( empty( $models ) || empty( $rows ) ) {
	return null;
}

$_title       = trim_string( get_field( 'tech_specifications_title' ) );
$label_header = trim_string( get_field( 'tech_specifications_label_header' ) );
$label_header = $label_header ? $label_header : __( 'Модель', 'endovi' );
$image        = (int) get_field( 'tech_specifications_image' );
$image_mobile = (int) get_field( 'tech_specifications_image_mobile' );
$image_mobile = $image_mobile ? $image_mobile : $image;

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-tech-specifications endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-tech-specifications__wrapper endovi-wrapper relative">
		<?php if ( $image ) : ?>
			<div class="endovi-tech-specifications__image-container absolute img-cover">
				<?php endovi_the_image( $image, 'endovi-tech-specifications__image desktop' ); ?>
				<?php endovi_the_image( $image_mobile, 'endovi-tech-specifications__image mobile' ); ?>
			</div>
		<?php endif; ?>
		<div class="endovi-tech-specifications__content relative" style="--tech-spec-models: <?php echo (int) $models_count; ?>;">
			<div class="endovi-tech-specifications__scroll-icon-container img-contain absolute mobile">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M15.0078 4.497H20.9988M15.0078 4.497C15.0078 3.797 16.9988 2.491 17.5038 2M15.0078 4.497C15.0078 5.197 16.9988 6.503 17.5038 6.994" stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M6.53589 14.4486V9.97856V4.45856C6.53589 3.63756 7.22089 2.97656 8.04189 2.97656C8.86389 2.97656 9.51089 3.63756 9.51089 4.45856V8.45856M9.51089 8.45856V10.9866M9.51089 8.45856C10.0689 7.54856 12.0979 7.91756 12.4929 9.63556M6.53589 9.98056C5.21889 11.1726 3.80189 12.6786 3.61089 13.0646C2.72289 14.4146 2.81589 15.0696 3.80589 16.7216C4.4394 17.7633 5.11908 18.7764 5.84289 19.7576C6.51389 20.5176 6.38089 20.5176 7.35389 21.2326C8.22389 21.8346 10.0269 22.2556 14.2539 21.8346C17.6979 21.3046 18.5239 18.3006 18.5049 16.8646V13.3216C18.7199 10.3756 17.4869 10.2416 15.2489 9.95156M12.4939 9.63356C12.4939 9.64156 12.4952 9.6489 12.4979 9.65556L12.5139 9.74356C12.5239 9.8209 12.5289 9.89956 12.5289 9.97956V10.9826M15.5139 11.9796V10.8346C15.3899 8.72856 12.3529 8.43656 12.4939 9.63356C12.4972 9.6689 12.5039 9.70556 12.5139 9.74356" stroke="#5B5B66" stroke-width="1.5" stroke-linecap="round"/>
				</svg>
			</div>
			<?php if ( $_title ) : ?>
				<div class="endovi-tech-specifications__title-container">
					<h2 class="endovi-tech-specifications__title h2">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				</div>
			<?php endif; ?>
			<div class="endovi-tech-specifications__table-container">
				<table class="endovi-tech-specifications__table">
					<thead>
						<tr class="endovi-tech-specifications__row is-header">
							<th class="endovi-tech-specifications__cell is-title" scope="col">
								<?php echo esc_html( $label_header ); ?>
							</th>
							<?php foreach ( $models as $model ) : ?>
								<th class="endovi-tech-specifications__cell" scope="col">
									<?php echo wp_kses_post( $model ); ?>
								</th>
							<?php endforeach; ?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ( $rows as $row ) : ?>
							<tr class="endovi-tech-specifications__row">
								<th class="endovi-tech-specifications__cell is-title" scope="row">
									<?php echo esc_html( $row['label'] ); ?>
								</th>
								<?php foreach ( $row['values'] as $value ) : ?>
									<td class="endovi-tech-specifications__cell">
										<?php echo wp_kses_post( $value ); ?>
									</td>
								<?php endforeach; ?>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
