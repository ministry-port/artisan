<?php
/**
 * The template for displaying the Portfolio archive page.
 *
 * @package artisan
 */

get_header(); ?>

<div class="wrap">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<div class="page-content">
			<?php
				if ( have_posts() ) {
					get_template_part( 'content', 'portfolio-archive' );
				} else {
					get_template_part( 'content', 'none' );
				}
			?>
		</div>

		</main><!-- #main -->
	</section><!-- #primary -->

	<?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php
get_footer();
