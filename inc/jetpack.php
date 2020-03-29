<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package artisan
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function artisan_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'artisan_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// logo support
	add_image_size( 'artisan-site-logo', '345', '50', true );
	add_theme_support( 'site-logo', array( 'size' => 'artisan-site-logo' ) );

	/**
	 * Add theme support for Portfolio Custom Post Type.
	 */
	add_theme_support( 'jetpack-portfolio', array(
		'title'          => true,
		'content'        => true,
		'featured-image' => true,
	) );
}
add_action( 'after_setup_theme', 'artisan_jetpack_setup' );

/**
 * Portfolio Title.
 */
function artisan_title( $before = '', $after = '' ) {
	$jetpack_portfolio_title = get_option( 'jetpack_portfolio_title' );
	$title = '';

	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		if ( isset( $jetpack_portfolio_title ) && '' != $jetpack_portfolio_title ) {
			$title = esc_html( $jetpack_portfolio_title );
		} else {
			$title = post_type_archive_title( '', false );
		}
	} elseif ( is_tax( 'jetpack-portfolio-type' ) || is_tax( 'jetpack-portfolio-tag' ) ) {
		$title = single_term_title( '', false );
	}

	echo $before . $title . $after;
}

/**
 * Portfolio Content.
 */
function artisan_content( $before = '', $after = '' ) {
	$jetpack_portfolio_content = get_option( 'jetpack_portfolio_content' );

	if ( is_tax() && get_the_archive_description() ) {
		echo $before . get_the_archive_description() . $after;
	} else if ( isset( $jetpack_portfolio_content ) && '' != $jetpack_portfolio_content ) {
		$content = convert_chars( convert_smilies( wptexturize( stripslashes( wp_filter_post_kses( addslashes( $jetpack_portfolio_content ) ) ) ) ) );
		echo $before . $content . $after;
	}
}

/**
 * Portfolio Featured Image.
 */
function artisan_thumbnail( $before = '', $after = '' ) {
	$jetpack_portfolio_featured_image = get_option( 'jetpack_portfolio_featured_image' );

	if ( isset( $jetpack_portfolio_featured_image ) && '' != $jetpack_portfolio_featured_image ) {
		$featured_image = wp_get_attachment_image( (int) $jetpack_portfolio_featured_image, 'post-thumbnail' );
		echo $before . $featured_image . $after;
	}
}

/**
 * Custom render function for Infinite Scroll.
 */
function artisan_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}

/**
 * Custom function to check for a post thumbnail;
 * If Jetpack is not available, fall back to has_post_thumbnail()
 */
function artisan_has_post_thumbnail( $post = null ) {
	if ( function_exists( 'jetpack_has_featured_image' ) ) {
		return jetpack_has_featured_image( $post );
	} else {
		return has_post_thumbnail( $post );
	}
}

/**
 * Custom function to get the URL of a post thumbnail;
 * If Jetpack is not available, fall back to wp_get_attachment_image_src()
 */
function artisan_get_attachment_image_src( $post_id, $post_thumbnail_id, $size ) {
	if ( function_exists( 'jetpack_featured_images_fallback_get_image_src' ) ) {
		return jetpack_featured_images_fallback_get_image_src( $post_id, $post_thumbnail_id, $size );
	} else {
		$attachment = wp_get_attachment_image_src( $post_thumbnail_id, $size ); // Attachment array
		$url = $attachment[0]; // Attachment URL
		return $url;
	}
}

/**
* Getter function for Featured Content.
* See http://jetpack.me/support/featured-content/
*/
function artisan_get_banner_posts() {
	return apply_filters( 'artisan_get_banner_posts', array() );
}

/**
 * Check for minimum number of featured posts
 */
function artisan_has_banner_posts( $minimum = 1 ) {

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'artisan_get_banner_posts', array() );

	if ( ! is_array( $featured_posts ) ) {
		return false;
	}

	if ( $minimum > count( $featured_posts ) ) {
		return false;
	}

	return true;
}
