<?php
/**
 * artisan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package artisan
 */

if ( ! function_exists( 'artisan_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function artisan_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on artisan, use a find and replace
	 * to change 'artisan' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'artisan', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since artisan 1.0.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 154,
		'flex-height' => true,
		'flex-width' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'artisan-blog-thumbnail', 1000, 400, true );
	add_image_size( 'artisan-front-pages', 755, 425, true );
	add_image_size( 'artisan-slider-img', 1440, 500, true );
	add_image_size( 'artisan-featured', 1200, 450, true );
	add_image_size( 'artisan-portfolio-image', 480, 360, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'artisan' ),
		'social' => esc_html__( 'Social', 'artisan' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'artisan_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'artisan_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function artisan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'artisan_content_width', 1000 );
}
add_action( 'after_setup_theme', 'artisan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function artisan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'artisan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'artisan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'artisan_widgets_init' );

if ( ! function_exists( 'artisan_fonts_url' ) ) :
/**
 * Register Google fonts for artisan.
 *
 * Create your own artisan_fonts_url() function to override in a child theme.
 *
 * @since artisan 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function artisan_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'artisan' ) ) {
		$fonts[] = 'Playfair Display:400,600,700';
	}

	if ( 'off' !== _x( 'on', 'Raleway font: on or off', 'artisan' ) ) {
		$fonts[] = 'Raleway:400,600,700';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Enqueue scripts and styles.
 */
function artisan_scripts() {
	wp_enqueue_style( 'artisan-style', get_stylesheet_uri() );

	// Add custom fonts
	wp_enqueue_style( 'artisan-fonts', artisan_fonts_url(), array(), null );

	// Icon Fonts
	wp_register_style( 'genericons-neue', get_stylesheet_directory_uri() . '/assets/fonts/genericons/Genericons-Neue.css', array(), '20151215' );
	wp_enqueue_style( 'genericons-neue' );

	// Font Awesome
	wp_register_style( 'font-fontawesome', get_stylesheet_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.css', array(), '20151215' );
	wp_enqueue_style( 'font-fontawesome' );

	wp_enqueue_script( 'artisan-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	// Custom Functions
	wp_enqueue_script( 'artisan-functions', get_template_directory_uri() . '/assets/js/artisan.js', array( 'jquery' ), '20151215', true );

	// Flexslider
	wp_register_style( 'flexslider-styles', get_stylesheet_directory_uri() . '/assets/flexslider/flexslider.css', array(), '20151215' );
	wp_enqueue_script( 'flexslider-functions', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array(), '20151215', true );

	wp_enqueue_script( 'artisan-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'artisan_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
