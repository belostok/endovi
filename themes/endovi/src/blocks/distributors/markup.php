<?php
/**
 * Block Name: Distributors
 *
 * @var $block
 */

use function endoviTheme\Helpers\get_array;
use function endoviTheme\Helpers\trim_string;

$hide = (bool) get_field( 'distributors_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$items = get_array( get_field( 'items' ) );

if ( empty( $items ) ) {
	return null;
}

$_title = trim_string( get_field( 'distributors_title' ) );

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-distributors endovi-container ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

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
	<div class="endovi-distributors__wrapper endovi-wrapper">
		<?php if ( $_title ) : ?>
			<div class="endovi-distributors__title-container">
				<h2 class="endovi-distributors__title h2">
					<?php echo wp_kses_post( $_title ); ?>
				</h2>
			</div>
		<?php endif; ?>
		<div class="endovi-distributors__items">
			<?php
			foreach ( $items as $item ) :
				$logo    = (int) ( $item['logo'] ?? 0 );
				$name    = trim_string( $item['name'] ?? '' );
				$_link   = trim_string( $item['link'] ?? '' );
				$phone   = trim_string( $item['phone'] ?? '' );
				$email   = trim_string( $item['email'] ?? '' );
				$address = trim_string( $item['address'] ?? '' );

				if ( ! $name ) {
					continue;
				}
				?>
				<div class="endovi-distributors__item flex fdc relative">
					<div class="endovi-distributors__item-header">
						<?php if ( $logo ) : ?>
							<div class="endovi-distributors__item-logo-container">
								<?php endovi_the_image( $logo, 'endovi-distributors__item-logo' ); ?>
							</div>
						<?php endif; ?>
						<div class="endovi-distributors__item-name-container">
							<?php if ( $_link ) : ?>
								<a href="<?php echo esc_url( $_link ); ?>" class="endovi-distributors__item-name h3 default-hover">
									<?php echo esc_html( $name ); ?>
								</a>
							<?php else : ?>
								<h3 class="endovi-distributors__item-name h3">
									<?php echo esc_html( $name ); ?>
								</h3>
							<?php endif; ?>
						</div>
					</div>
					<?php if ( $phone || $email || $address ) : ?>
						<div class="endovi-distributors__item-contacts flex fdc">
							<?php if ( $phone ) : ?>
								<div class="endovi-distributors__item-contact flex fdc">
									<div class="endovi-distributors__item-contact-title-container">
										<p class="endovi-distributors__item-contact-title text-normal text-gray">
											<?php echo esc_html__( 'Телефон', 'endovi' ); ?>
										</p>
									</div>
									<div class="endovi-distributors__item-contact-value-container">
										<p class="endovi-distributors__item-contact-value h4">
											<?php echo wp_kses_post( $phone ); ?>
										</p>
									</div>
								</div>
							<?php endif; ?>
							<?php if ( $email ) : ?>
								<div class="endovi-distributors__item-contact flex fdc">
									<div class="endovi-distributors__item-contact-title-container">
										<p class="endovi-distributors__item-contact-title text-normal text-gray">
											<?php echo esc_html__( 'Почта', 'endovi' ); ?>
										</p>
									</div>
									<div class="endovi-distributors__item-contact-value-container">
										<p class="endovi-distributors__item-contact-value h4">
											<?php echo wp_kses_post( $email ); ?>
										</p>
									</div>
								</div>
							<?php endif; ?>
							<?php if ( $address ) : ?>
								<div class="endovi-distributors__item-contact flex fdc">
									<div class="endovi-distributors__item-contact-title-container">
										<p class="endovi-distributors__item-contact-title text-normal text-gray">
											<?php echo esc_html__( 'Адрес', 'endovi' ); ?>
										</p>
									</div>
									<div class="endovi-distributors__item-contact-value-container">
										<p class="endovi-distributors__item-contact-value h4">
											<?php echo wp_kses_post( $address ); ?>
										</p>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
