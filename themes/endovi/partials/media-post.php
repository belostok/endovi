<?php

use function endoviTheme\Helpers\trim_string;

$post_title = trim_string( $args['title'] ?? '' );
$post_link  = trim_string( $args['link'] ?? '' );

if ( ! $post_title || ! $post_link ) {
	return null;
}

$post_excerpt = trim_string( $args['excerpt'] ?? '' );
$post_date    = trim_string( $args['date'] ?? '' );
$post_image   = (int) ( $args['image'] ?? '' );
$badge        = trim_string( $args['badge'] ?? '' );
$classes      = trim_string( $args['classes'] ?? '' );
?>

<a href="<?php echo esc_url( $post_link ); ?>" class="endovi-news-card default-hover <?php echo esc_attr( $classes ); ?>">
	<?php if ( $post_image ) : ?>
		<div class="endovi-news-card__image-container img-cover relative">
			<?php endovi_the_image( $post_image, 'endovi-news-card__image' ); ?>
			<?php if ( $badge ) : ?>
				<div class="endovi-news-card__badge-container absolute">
					<p class="endovi-news-card__badge text-small">
						<?php echo esc_html( $badge ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	<div class="endovi-news-card__text-side flex fdc jcspb">
		<div class="endovi-news-card__text-upper flex fdc">
			<div class="endovi-news-card__title-container">
				<h4 class="endovi-news-card h4">
					<?php echo esc_html( $post_title ); ?>
				</h4>
			</div>
			<?php if ( $post_excerpt ) : ?>
				<div class="endovi-news-card__description-container">
					<p class="endovi-news-card__description">
						<?php echo esc_html( $post_excerpt ); ?>
					</p>
				</div>
			<?php endif; ?>
		</div>
		<?php if ( $post_date ) : ?>
			<div class="endovi-news-card__date-container">
				<span class="endovi-news-card__date text-normal">
					<?php echo esc_html( $post_date ); ?>
				</span>
			</div>
		<?php endif; ?>
	</div>
</a>
