<?php
/**
 * Template Name: Front Page Template
 *
 * @package artisan
 */

get_header();

if ( has_header_image() ) { ?>
	<div class="header-image">
		<div class="color-overlay">
		<?php the_header_image_tag(); ?>
		</div>
	</div><!-- .header-image -->
<?php } else {
	get_template_part( 'template-parts/slider' );
}
?>

<div class="wrap">

	<div id="primary" class="content-area frontpage-content">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header>

					<div class="front-content">
						<?php the_content(); ?>
					</div>
				</article>

			<?php
				endwhile; // end of the loop.
				wp_reset_postdata();
			?>

			<?php artisan_info_pages(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- .wrap -->

<?php
get_footer();