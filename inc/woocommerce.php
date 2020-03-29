<?php
/**
 * WooCommerce Support
 *
 * @package executive
 */

/**
 * WooCommerce Support
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'north_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'north_wrapper_end', 10);

// remove sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// remove ratings on store page
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// remove up sell
remove_action( 'woocommerce_after_north_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' , 10 );

function north_wrapper_start() {
  echo '<div class="wrap"><div id="primary">';
}

function north_wrapper_end() {
  echo '</div></div>';
}

if ( ! function_exists( '_disable_jetpack_infinite_scroll_conditionally' ) ) {
	/**
	 * _disable_jetpack_infinite_scroll_conditionally Disables infinite scroll on WooCommerce pages
	 * Original code credit https://gist.github.com/rspublishing/6b0b2d2eabafa514bd48045d1860f24b
	 */
	function _disable_jetpack_infinite_scroll_conditionally() {
		if ( true === is_woocommerce() ) {
			remove_theme_support( 'infinite-scroll' );
		}
	}
	add_action( 'template_redirect', '_disable_jetpack_infinite_scroll_conditionally', 9 );
}

/*
 * Remove Related Products
 *
 * Clear the query arguments for related products so none show.
 * Add this code to your theme functions.php file.
 */
function north_remove_related_products( $args ) {
	return array();
}
add_filter('woocommerce_related_products_args','north_remove_related_products', 10);
remove_action( 'woocommerce_after_north_product_summary', 'woocommerce_upsell_display', 15 );
