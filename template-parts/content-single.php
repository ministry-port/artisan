<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisan
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-wrap' ); ?>>
	<?php if ( ! has_post_thumbnail() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="single-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php artisan_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'artisan' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'artisan' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'artisan' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
