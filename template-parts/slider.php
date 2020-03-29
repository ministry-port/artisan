<?php
/**
 * @package artisan
 */
$featured = intval( get_theme_mod( 'cats_elect', 1 ) );

if ( empty( $featured ) ) {
	return;
}

	// The Query
	$slider_args = array(
		'cat'            => $featured,
		'posts_per_page' => -1,
	);
	$slider_loop = new WP_Query( $slider_args ); ?>
	<div id="featured-content" class="flexslider">
		<ul class="featured-posts slides">
			<?php
			// slider Posts Loop
			while ( $slider_loop->have_posts() ) {
				$slider_loop->the_post();

				get_template_part( 'template-parts/content', 'slider-post' );
			} // end while
			?>
		</ul>
	</div>

	<?php
	// Restore original Post Data
	wp_reset_postdata();
