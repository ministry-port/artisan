<?php
/**
 * artisan Theme Customizer
 *
 * @package artisan
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function artisan_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->add_section( 'artisan_theme_options', array(
		'title'    => __( 'Theme Options', 'artisan' ),
		'priority' => 130,
	) );

	$wp_customize->add_setting( 'artisan_blog_slider', array(
		'default'           => '',
		'sanitize_callback' => 'artisan_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'artisan_blog_slider', array(
		'label'             => esc_html__( 'Show featured content slider on blog page.', 'artisan' ),
		'section'           => 'artisan_theme_options',
		'type'              => 'checkbox',
		'priority'          => 3,
	) );

	// create an empty array
	$cats = array();

	// we loop over the categories and set the names and
	// labels we need
	foreach ( get_categories() as $categories => $category ){
		$cats[$category->term_id] = $category->name;
	}

	// we register our new setting
	$wp_customize->add_setting( 'cats_elect', array(
		'default' => 1,
		'sanitize_callback' => 'absint'
	) );

	// we create our control for the setting
	$wp_customize->add_control( 'cat_contlr', array(
		'settings' => 'cats_elect',
		'type'     => 'select',
		'choices'  => $cats,
		'section'  => 'artisan_theme_options',
		'priority' => 4,
		'label'    => __( 'Choose your slider category:', 'artisan' ),
	) );

	/* Front Page: Featured Page One */
	$wp_customize->add_setting( 'artisan_featured_page_one_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'artisan_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'artisan_featured_page_one_front_page', array(
		'label'             => __( 'Front Page: Featured Page One', 'artisan' ),
		'section'           => 'artisan_theme_options',
		'priority'          => 5,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Two */
	$wp_customize->add_setting( 'artisan_featured_page_two_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'artisan_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'artisan_featured_page_two_front_page', array(
		'label'             => __( 'Front Page: Featured Page Two', 'artisan' ),
		'section'           => 'artisan_theme_options',
		'priority'          => 6,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Three */
	$wp_customize->add_setting( 'artisan_featured_page_three_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'artisan_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'artisan_featured_page_three_front_page', array(
		'label'             => __( 'Front Page: Featured Page three', 'artisan' ),
		'section'           => 'artisan_theme_options',
		'priority'          => 7,
		'type'              => 'dropdown-pages',
	) );

	/* Front Page: Featured Page Four */
	$wp_customize->add_setting( 'artisan_featured_page_four_front_page', array(
		'default'           => '',
		'sanitize_callback' => 'artisan_sanitize_dropdown_pages',
	) );
	$wp_customize->add_control( 'artisan_featured_page_four_front_page', array(
		'label'             => __( 'Front Page: Featured Page Four', 'artisan' ),
		'section'           => 'artisan_theme_options',
		'priority'          => 8,
		'type'              => 'dropdown-pages',
	) );
}
add_action( 'customize_register', 'artisan_customize_register' );

/**
 * Sanitize the dropdown pages.
 *
 * @param interger $input.
 * @return interger.
 */
function artisan_sanitize_dropdown_pages( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

/**
 * Sanitize the checkbox.
 *
 * @param boolean $input.
 * @return boolean true if portfolio page template displays title and content.
 */
function artisan_sanitize_checkbox( $input ) {
	if ( 1 == $input ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function artisan_customize_preview_js() {
	wp_enqueue_script( 'artisan_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'artisan_customize_preview_js' );
