<?php
/**
 * Jafar Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Jafar_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'jafar_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function jafar_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Jafar Theme, use a find and replace
		 * to change 'jafar-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'jafar-theme', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu'     => esc_html__( 'Main Menu', 'jafar-theme' ),
				'footer-menu'   => esc_html__( 'Footer Menu', 'jafar-theme' ),
				'bottom-footer' => esc_html__( 'Bottom Footer Menu', 'jafar-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'jafar_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'jafar_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function jafar_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jafar_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'jafar_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function jafar_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'jafar-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'jafar-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'jafar_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jafar_theme_scripts() {
	wp_enqueue_style( 'jafar-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'jafar-theme-style', 'rtl', 'replace' );

	$script_dependancies = array( 'jquery' );
	wp_enqueue_script( 'lazyload-js', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.3.1/dist/lazyload.min.js', array(), _S_VERSION, true );
	wp_enqueue_style( 'plyr-style', 'https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.8/plyr.min.css', array(), _S_VERSION );
	wp_enqueue_script( 'plyr-js', 'https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.8/plyr.min.js', array(), _S_VERSION, true );

	if ( $google_maps_key = get_field( 'google_maps_key', 'global_options' ) ) { // phpcs:ignore
		wp_register_script( 'google-map-api', 'https://maps.googleapis.com/maps/api/js?key=' . $google_maps_key, [ 'jquery' ], true ); // phpcs:ignore
		array_push( $script_dependancies, 'google-map-api' );
	}

	wp_enqueue_script( 'jafar-script', get_template_directory_uri() . '/assets/js/custom.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'jafar-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jafar-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jafar_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/style-admin.css', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * ACF Blocks.
 */
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Block API Access.
 */
require get_template_directory() . '/inc/block-api.php';

/**
 * ACF Options.
 */
require get_template_directory() . '/inc/acf-options.php';
