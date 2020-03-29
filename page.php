<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

	<?php get_sidebar(); ?>

</div><!-- .wrap -->

<?php
get_footer();
