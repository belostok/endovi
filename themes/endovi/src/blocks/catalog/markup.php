<?php
/**
 * Block Name: Catalog
 *
 * @var $block
 */

use function endoviTheme\Helpers\trim_string;
use function endoviTheme\Helpers\get_array;

$hide = (bool) get_field( 'catalog_hide' );

if ( empty( $block['id'] ) || $hide ) {
	return null;
}

$_tabs = get_array( get_field( 'catalog_tabs' ) );

if ( empty( $_tabs ) ) {
	return null;
}

$show_breadcrumbs = (bool) get_field( 'catalog_breadcrumbs' );
$is_h1            = (bool) get_field( 'catalog_is_h1' );
$_title           = trim_string( get_field( 'catalog_title' ) );

$buttons_html = '';
$_tabs_html   = '';

$t = 0;
foreach ( $_tabs as $_tab ) {
	$tab_name   = trim_string( $_tab['title'] ?? '' );
	$is_type    = (bool) ( $_tab['is_type'] ?? false );
	$categories = get_array( $_tab['categories'] ?? [] );

	if ( ! $tab_name || empty( $categories ) ) {
		continue;
	}

	ob_start();
	?>
	<button
		class="endovi-catalog__tab-button flex jcc aic js-catalog-tab-button<?php echo ( 0 === $t ) ? ' endovi-catalog__tab-button_active' : ''; ?>"
		data-tab="<?php echo esc_attr( $t ); ?>"
	>
		<span class="endovi-catalog__tab-button-title text-normal">
			<?php echo esc_html( $tab_name ); ?>
		</span>
	</button>
	<?php
	$buttons_html .= ob_get_clean();

	$_tabs_html .= '<div class="endovi-catalog__categories ' . ( $is_type ? 'endovi-catalog__categories_types' : 'endovi-catalog__categories_series' ) . ( 0 === $t ? ' endovi-catalog__categories_active' : '' ) . ' js-catalog-tab" data-tab="' . esc_attr( $t ) . '">';

	foreach ( $categories as $category ) {
		$is_gradient    = (bool) ( $category['is_gradient'] ?? false );
		$is_gradient    = $is_gradient && ! $is_type;
		$category_title = trim_string( $category['title'] ?? '' );
		$category_image = (int) ( $category['image'] ?? 0 );
		$items          = get_array( $category['items'] ?? [] );

		if ( empty( $items ) ) {
			continue;
		}

		ob_start();
		?>
		<div class="endovi-catalog__category relative<?php echo $is_gradient ? ' endovi-catalog__category_gradient' : ''; ?>">
			<?php if ( $category_image ) : ?>
				<div class="endovi-catalog__category-image-container img-contain absolute">
					<?php endovi_the_image( $category_image, 'endovi-catalog__category-image' ); ?>
				</div>
			<?php endif; ?>

			<?php if ( ! $is_type ) : ?>
				<div class="endovi-catalog__items-container flex fdc relative">
			<?php endif; ?>
			<?php if ( $category_title ) : ?>
				<div class="endovi-catalog__category-title-container">
					<h4 class="endovi-catalog__category-title h4">
						<?php echo wp_kses_post( $category_title ); ?>
					</h4>
				</div>
			<?php endif; ?>
			<ul class="endovi-catalog__items">
				<?php
				foreach ( $items as $item ) {
					$item_title = trim_string( $item['title'] ?? '' );
					$item_link  = trim_string( $item['link'] ?? '' );

					if ( ! $item_title ) {
						continue;
					}
					?>
						<li class="endovi-catalog__item">
							<?php if ( $item_link ) : ?>
								<a href="<?php echo esc_url( $item_link ); ?>" class="endovi-catalog__item-link flex aic jcspb">
									<?php echo esc_html( $item_title ); ?>
									<svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.35355 4.03544C9.54882 3.84018 9.54882 3.52359 9.35355 3.32833L6.17157 0.146351C5.97631 -0.0489108 5.65973 -0.0489108 5.46447 0.146351C5.2692 0.341614 5.2692 0.658196 5.46447 0.853458L8.29289 3.68189L5.46447 6.51031C5.2692 6.70557 5.2692 7.02216 5.46447 7.21742C5.65973 7.41268 5.97631 7.41268 6.17157 7.21742L9.35355 4.03544ZM0 3.68188L-4.37113e-08 4.18188L9 4.18189L9 3.68189L9 3.18189L4.37113e-08 3.18188L0 3.68188Z" fill="#020033"/>
									</svg>
								</a>
							<?php else : ?>
								<div class="endovi-catalog__item-link flex aic">
									<?php echo esc_html( $item_title ); ?>
									<svg width="31" height="16" viewBox="0 0 31 16" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect width="31" height="16" rx="4" fill="#F3F5F4"/>
										<path d="M6.656 5.384C6.89067 5.384 7.09067 5.38933 7.256 5.4C7.42667 5.41067 7.58133 5.42933 7.72 5.456C7.864 5.47733 8.01067 5.50667 8.16 5.544L8.088 6.08C7.928 6.064 7.77867 6.05067 7.64 6.04C7.50667 6.02933 7.36267 6.02133 7.208 6.016C7.05333 6.01067 6.86933 6.008 6.656 6.008C6.29867 6.008 6.016 6.07733 5.808 6.216C5.6 6.35467 5.45067 6.58667 5.36 6.912C5.27467 7.23733 5.232 7.68 5.232 8.24C5.232 8.8 5.27467 9.24267 5.36 9.568C5.45067 9.89333 5.6 10.1253 5.808 10.264C6.016 10.4027 6.29867 10.472 6.656 10.472C6.99733 10.472 7.28267 10.4667 7.512 10.456C7.74667 10.44 7.976 10.416 8.2 10.384L8.272 10.912C8.04267 10.976 7.80533 11.0213 7.56 11.048C7.32 11.08 7.01867 11.096 6.656 11.096C6.128 11.096 5.704 11.0053 5.384 10.824C5.06933 10.6373 4.84 10.336 4.696 9.92C4.55733 9.504 4.488 8.944 4.488 8.24C4.488 7.536 4.55733 6.976 4.696 6.56C4.84 6.144 5.06933 5.84533 5.384 5.664C5.704 5.47733 6.128 5.384 6.656 5.384ZM12.4665 7.104C12.3812 7.33333 12.2985 7.544 12.2185 7.736C12.1438 7.92267 12.0665 8.088 11.9865 8.232C11.9118 8.376 11.8265 8.49867 11.7305 8.6C11.6398 8.70133 11.5332 8.784 11.4105 8.848C11.2878 8.90667 11.1438 8.944 10.9785 8.96V8.984C11.1545 9 11.3065 9.03733 11.4345 9.096C11.5625 9.15467 11.6745 9.23733 11.7705 9.344C11.8718 9.44533 11.9625 9.57333 12.0425 9.728C12.1278 9.88267 12.2132 10.0667 12.2985 10.28C12.3838 10.488 12.4772 10.728 12.5785 11H11.8665C11.7705 10.7493 11.6825 10.528 11.6025 10.336C11.5225 10.1387 11.4425 9.97067 11.3625 9.832C11.2878 9.69333 11.2052 9.58133 11.1145 9.496C11.0238 9.40533 10.9172 9.34133 10.7945 9.304C10.6772 9.26133 10.5385 9.24 10.3785 9.24V8.712C10.5705 8.712 10.7332 8.67733 10.8665 8.608C10.9998 8.53333 11.1145 8.42667 11.2105 8.288C11.3118 8.14933 11.4052 7.98133 11.4905 7.784C11.5758 7.58667 11.6665 7.36 11.7625 7.104H12.4665ZM9.8745 7.104V8.264C9.8745 8.38133 9.8665 8.49867 9.8505 8.616C9.8345 8.73333 9.8105 8.848 9.7785 8.96C9.8105 9.072 9.8345 9.184 9.8505 9.296C9.8665 9.408 9.8745 9.51467 9.8745 9.616V11H9.1945V7.104H9.8745ZM10.6345 8.712V9.24H9.6745V8.712H10.6345ZM15.1083 7.008C15.5563 7.008 15.9136 7.07467 16.1803 7.208C16.447 7.34133 16.639 7.56 16.7563 7.864C16.879 8.16267 16.9403 8.56 16.9403 9.056C16.9403 9.552 16.879 9.952 16.7563 10.256C16.639 10.5547 16.447 10.7707 16.1803 10.904C15.9136 11.0373 15.5563 11.104 15.1083 11.104C14.6603 11.104 14.3003 11.0373 14.0283 10.904C13.7616 10.7707 13.567 10.5547 13.4443 10.256C13.327 9.952 13.2683 9.552 13.2683 9.056C13.2683 8.56 13.327 8.16267 13.4443 7.864C13.567 7.56 13.7616 7.34133 14.0283 7.208C14.3003 7.07467 14.6603 7.008 15.1083 7.008ZM15.1083 7.584C14.8256 7.584 14.6016 7.62933 14.4363 7.72C14.271 7.80533 14.1536 7.95467 14.0843 8.168C14.015 8.38133 13.9803 8.67733 13.9803 9.056C13.9803 9.43467 14.015 9.73067 14.0843 9.944C14.1536 10.1573 14.271 10.3093 14.4363 10.4C14.6016 10.4853 14.8256 10.528 15.1083 10.528C15.391 10.528 15.6123 10.4853 15.7723 10.4C15.9376 10.3093 16.055 10.1573 16.1243 9.944C16.1936 9.73067 16.2283 9.43467 16.2283 9.056C16.2283 8.67733 16.1936 8.38133 16.1243 8.168C16.055 7.95467 15.9376 7.80533 15.7723 7.72C15.6123 7.62933 15.391 7.584 15.1083 7.584ZM20.2546 7.008C20.7346 7.008 21.0786 7.184 21.2866 7.536C21.4946 7.88267 21.5986 8.39467 21.5986 9.072C21.5986 9.57333 21.5453 9.97333 21.4386 10.272C21.332 10.5653 21.1693 10.776 20.9506 10.904C20.732 11.032 20.4573 11.096 20.1266 11.096C19.8706 11.096 19.6173 11.0613 19.3666 10.992C19.116 10.9227 18.876 10.816 18.6466 10.672L18.6866 10.264C18.9373 10.3333 19.156 10.392 19.3426 10.44C19.5346 10.4827 19.7373 10.504 19.9506 10.504C20.18 10.504 20.3613 10.464 20.4946 10.384C20.6333 10.304 20.7346 10.16 20.7986 9.952C20.8626 9.744 20.8946 9.45067 20.8946 9.072C20.8946 8.704 20.8653 8.41333 20.8066 8.2C20.7533 7.98667 20.6626 7.83467 20.5346 7.744C20.412 7.648 20.2466 7.6 20.0386 7.6C19.8253 7.6 19.6146 7.65067 19.4066 7.752C19.1986 7.85333 18.956 8.008 18.6786 8.216L18.6066 7.76C18.7506 7.60533 18.9133 7.472 19.0946 7.36C19.276 7.248 19.4653 7.16267 19.6626 7.104C19.8653 7.04 20.0626 7.008 20.2546 7.008ZM18.5826 7.104L18.6626 7.912L18.7026 8.016V10.512L18.6706 10.608C18.6866 10.7573 18.6973 10.9013 18.7026 11.04C18.708 11.1787 18.708 11.3253 18.7026 11.48V12.608H18.0306V7.104H18.5826ZM24.3427 7.008C24.7907 7.008 25.148 7.07467 25.4147 7.208C25.6814 7.34133 25.8734 7.56 25.9907 7.864C26.1134 8.16267 26.1747 8.56 26.1747 9.056C26.1747 9.552 26.1134 9.952 25.9907 10.256C25.8734 10.5547 25.6814 10.7707 25.4147 10.904C25.148 11.0373 24.7907 11.104 24.3427 11.104C23.8947 11.104 23.5347 11.0373 23.2627 10.904C22.996 10.7707 22.8014 10.5547 22.6787 10.256C22.5614 9.952 22.5027 9.552 22.5027 9.056C22.5027 8.56 22.5614 8.16267 22.6787 7.864C22.8014 7.56 22.996 7.34133 23.2627 7.208C23.5347 7.07467 23.8947 7.008 24.3427 7.008ZM24.3427 7.584C24.06 7.584 23.836 7.62933 23.6707 7.72C23.5054 7.80533 23.388 7.95467 23.3187 8.168C23.2494 8.38133 23.2147 8.67733 23.2147 9.056C23.2147 9.43467 23.2494 9.73067 23.3187 9.944C23.388 10.1573 23.5054 10.3093 23.6707 10.4C23.836 10.4853 24.06 10.528 24.3427 10.528C24.6254 10.528 24.8467 10.4853 25.0067 10.4C25.172 10.3093 25.2894 10.1573 25.3587 9.944C25.428 9.73067 25.4627 9.43467 25.4627 9.056C25.4627 8.67733 25.428 8.38133 25.3587 8.168C25.2894 7.95467 25.172 7.80533 25.0067 7.72C24.8467 7.62933 24.6254 7.584 24.3427 7.584Z" fill="#020033"/>
									</svg>
								</div>
							<?php endif; ?>
						</li>
					<?php
				}
				?>
			</ul>
			<?php if ( ! $is_type ) : ?>
				</div>
			<?php endif; ?>
		</div>
		<?php
		$_tabs_html .= ob_get_clean();
	}

	$_tabs_html .= '</div>';

	++ $t;
}

if ( ! $buttons_html || ! $_tabs_html ) {
	return null;
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
	$anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class_names = 'endovi-catalog endovi-container js-catalog-block ' . esc_attr( apply_filters( 'endovi_block_class', '' ) );

if ( ! $is_h1 ) {
	$class_names .= ' endovi-catalog_h2';
}

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
	<div class="endovi-catalog__wrapper endovi-wrapper">
		<?php
		if ( $show_breadcrumbs ) :
			get_template_part(
				'partials/breadcrumbs',
				null,
				array(
					'classes' => 'endovi-catalog__breadcrumbs-container',
				)
			);
		endif;
		?>
		<?php if ( $_title ) : ?>
			<div class="endovi-catalog__title-container">
				<?php if ( $is_h1 ) : ?>
					<h1 class="endovi-catalog__title h1">
						<?php echo wp_kses_post( $_title ); ?>
					</h1>
				<?php else : ?>
					<h2 class="endovi-catalog__title h1">
						<?php echo wp_kses_post( $_title ); ?>
					</h2>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<div class="endovi-catalog__catalog">
			<div class="endovi-catalog__tabs-container">
				<?php echo $buttons_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</div>
			<?php echo $_tabs_html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		</div>
	</div>
</section>
