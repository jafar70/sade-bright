<?php
/**
 * Josh Bright functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Josh_Bright
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'josh_bright_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function josh_bright_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Josh Bright, use a find and replace
		 * to change 'josh-bright' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'josh-bright', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'josh-bright' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'josh_bright_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'editor-styles' );
		add_editor_style( 'style.css' );

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
add_action( 'after_setup_theme', 'josh_bright_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function josh_bright_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'josh_bright_content_width', 640 );
}
add_action( 'after_setup_theme', 'josh_bright_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function josh_bright_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'josh-bright' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'josh-bright' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'josh_bright_widgets_init' );

// add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
// function load_admin_styles() {
// wp_enqueue_style( 'admin_css', get_stylesheet_uri() );
// }

/**
 * Enqueue scripts and styles.
 */
function josh_bright_scripts() {
	wp_enqueue_style( 'jafar-style', get_template_directory_uri() . '/style.css' );
	wp_style_add_data( 'josh-bright-style', 'rtl', 'replace' );

	wp_enqueue_script( 'josh-bright-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'jafar-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'josh_bright_scripts' );

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

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page();

}

function feh_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'josh-blocks',
				'title' => __( 'Josh Blocks', 'josh-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'feh_category', 10, 2 );

add_action( 'acf/init', 'my_acf_init_block_types' );
function my_acf_init_block_types() {

	// Check function exists.
	if ( function_exists( 'acf_register_block_type' ) ) {

		acf_register_block_type(
			array(
				'name'            => 'home-banner',
				'title'           => __( 'Home Banner' ),
				'description'     => __( 'A custom Home Banner block.' ),
				'render_template' => 'modules/m01-home-banner.php',
				'category'        => 'josh-blocks',
				'icon'            => 'slides',
				'keywords'        => array( 'home', 'banner' ),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'latest-releases',
				'title'           => __( 'Latest Releases' ),
				'description'     => __( 'A custom latest releases block.' ),
				'render_template' => 'modules/m02-latest-releases.php',
				'category'        => 'josh-blocks',
				'icon'            => 'star-filled',
				'keywords'        => array( 'latest', 'releases' ),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'reviews',
				'title'           => __( 'Reviews' ),
				'description'     => __( 'A custom reviews block.' ),
				'render_template' => 'modules/m03-reviews.php',
				'category'        => 'josh-blocks',
				'icon'            => 'plus-alt',
				'keywords'        => array( 'reviews' ),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'text-with-image',
				'title'           => __( 'Text with Image' ),
				'description'     => __( 'A custom text with image block.' ),
				'render_template' => 'modules/m04-text-with-image.php',
				'category'        => 'josh-blocks',
				'icon'            => 'align-pull-left',
				'keywords'        => array( 'text', 'image' ),
			)
		);

		acf_register_block_type(
			array(
				'name'            => 'page-header',
				'title'           => __( 'Page Header' ),
				'description'     => __( 'A custom page header block.' ),
				'render_template' => 'modules/m05-page-header.php',
				'category'        => 'josh-blocks',
				'icon'            => 'heading',
				'keywords'        => array( 'page', 'header' ),
			)
		);
	}
}

add_shortcode( 'woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();

		$cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
		$cart_url   = wc_get_cart_url();  // Set Cart URL

	?>
		<a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
		<?php
		if ( $cart_count > 0 ) {
			?>
			<span class="cart-contents__count"><?php echo $cart_count; ?></span>
			<?php
		}
		?>
		</a>
		<?php

		return ob_get_clean();

}

function wc_qty_add_product_field() {

	echo '<div class="options_group">';
	woocommerce_wp_text_input(
		array(
			'id'          => '_wc_min_qty_product',
			'label'       => __( 'Minimum Quantity', 'woocommerce-max-quantity' ),
			'placeholder' => '',
			'desc_tip'    => 'true',
			'description' => __( 'Optional. Set a minimum quantity limit allowed per order. Enter a number, 1 or greater.', 'woocommerce-max-quantity' ),
		)
	);
	echo '</div>';

	echo '<div class="options_group">';
	woocommerce_wp_text_input(
		array(
			'id'          => '_wc_max_qty_product',
			'label'       => __( 'Maximum Quantity', 'woocommerce-max-quantity' ),
			'placeholder' => '',
			'desc_tip'    => 'true',
			'description' => __( 'Optional. Set a maximum quantity limit allowed per order. Enter a number, 1 or greater.', 'woocommerce-max-quantity' ),
		)
	);
	echo '</div>';
}
add_action( 'woocommerce_product_options_inventory_product_data', 'wc_qty_add_product_field' );

/*
* This function will save the value set to Minimum Quantity and Maximum Quantity options
* into _wc_min_qty_product and _wc_max_qty_product meta keys respectively
*/

function wc_qty_save_product_field( $post_id ) {
	$val_min = trim( get_post_meta( $post_id, '_wc_min_qty_product', true ) );
	$new_min = sanitize_text_field( $_POST['_wc_min_qty_product'] );

	$val_max = trim( get_post_meta( $post_id, '_wc_max_qty_product', true ) );
	$new_max = sanitize_text_field( $_POST['_wc_max_qty_product'] );

	if ( $val_min != $new_min ) {
		update_post_meta( $post_id, '_wc_min_qty_product', $new_min );
	}

	if ( $val_max != $new_max ) {
		update_post_meta( $post_id, '_wc_max_qty_product', $new_max );
	}
}
add_action( 'woocommerce_process_product_meta', 'wc_qty_save_product_field' );

function wc_qty_input_args( $args, $product ) {

	$product_id = $product->get_parent_id() ? $product->get_parent_id() : $product->get_id();

	$product_min = wc_get_product_min_limit( $product_id );
	$product_max = wc_get_product_max_limit( $product_id );

	if ( ! empty( $product_min ) ) {
		// min is empty
		if ( false !== $product_min ) {
			$args['min_value'] = $product_min;
		}
	}

	if ( ! empty( $product_max ) ) {
		// max is empty
		if ( false !== $product_max ) {
			$args['max_value'] = $product_max;
		}
	}

	if ( $product->managing_stock() && ! $product->backorders_allowed() ) {
		$stock = $product->get_stock_quantity();

		$args['max_value'] = min( $stock, $args['max_value'] );
	}

	return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'wc_qty_input_args', 10, 2 );

function wc_get_product_max_limit( $product_id ) {
	$qty = get_post_meta( $product_id, '_wc_max_qty_product', true );
	if ( empty( $qty ) ) {
		$limit = false;
	} else {
		$limit = (int) $qty;
	}
	return $limit;
}

function wc_get_product_min_limit( $product_id ) {
	$qty = get_post_meta( $product_id, '_wc_min_qty_product', true );
	if ( empty( $qty ) ) {
		$limit = false;
	} else {
		$limit = (int) $qty;
	}
	return $limit;
}
