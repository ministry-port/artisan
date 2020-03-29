<?php
/**
 * The template for displaying the Project Type taxonomy archive page.
 *
 * @package artisan
 */

get_header(); ?>

<div class="wrap">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			if ( have_posts() ) {
				get_template_part( 'template-parts/content', 'portfolio-archive' );
			} else {
				get_template_part( 'template-parts/content', 'none' );
			}
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php
get_footer();
