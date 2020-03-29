<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisan
 */
?>

<li class="featured">
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'artisan-slider-img' ); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="front-slider" <?php if (has_post_thumbnail()) { echo 'style="background-image: url(' . esc_url( $thumb['0'] ) . ')"'; } ?>></div>
	<?php endif; ?>

	<div class="color-overlay"></div>

				<div class="featured-hentry-wrap">
					<div>
						<div class="slider-header">
							<?php if ( 'post' === get_post_type() ) : ?>
							<div class="entry-meta">
								<?php artisan_posted_on(); ?>
							</div><!-- .entry-meta -->
							<?php
							endif; ?>

							<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

							<a href="<?php echo get_permalink(); ?>" class="button"><?php esc_html_e( 'Read Article', 'artisan' ); ?></a>
						</div><!-- .slider-header -->

					</div><!-- #post-## -->
				</div><!-- .featured-hentry-wrap -->
</li>
