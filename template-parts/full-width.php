<?php
/**
 * Template Name: Full Width
 *
 * @package artisan
 */

get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/content', 'hero' );

endwhile; // End of the loop.
?>

	<div class="wrap">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

	</div><!-- .wrap -->

<?php
get_footer();
