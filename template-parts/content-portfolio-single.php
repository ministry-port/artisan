<?php
/**
 * @package artisan
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-post' ); ?>>

	<?php if ( ! has_post_thumbnail() ) : ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<div class="entry-meta"><span class="portfolio-type-links">', _x(', ', 'Used between list items, there is a space after the comma.', 'artisan' ), '</span></div>' );
		?>
	</header>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'artisan' ) ); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'artisan' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			echo get_the_term_list( $post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">', _x(', ', 'Used between list items, there is a space after the comma.', 'artisan' ), '</span>' );
		?>

		<?php edit_post_link( __( 'Edit', 'artisan' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
