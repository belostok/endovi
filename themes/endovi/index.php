<?php
/**
 * The main template file
 */

get_header();
?>

	<section class="page-content">
		<div class="wrapper">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

<?php
get_footer();
