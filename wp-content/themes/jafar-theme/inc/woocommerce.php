<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package Jafar_Theme
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function jafar_theme_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 4,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'jafar_theme_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function jafar_theme_woocommerce_scripts() {
	// wp_enqueue_style( 'jafar-theme-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'jafar-theme-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'jafar_theme_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function jafar_theme_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'jafar_theme_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function jafar_theme_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jafar_theme_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'jafar_theme_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function jafar_theme_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'jafar_theme_woocommerce_wrapper_before' );

if ( ! function_exists( 'jafar_theme_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function jafar_theme_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'jafar_theme_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'jafar_theme_woocommerce_header_cart' ) ) {
			jafar_theme_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'jafar_theme_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function jafar_theme_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		jafar_theme_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'jafar_theme_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'jafar_theme_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function jafar_theme_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'jafar-theme' ); ?>">
			<?php
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				_n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'jafar-theme' ),
				WC()->cart->get_cart_contents_count()
			);
			?>
			<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'jafar_theme_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function jafar_theme_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php jafar_theme_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

function ql_woocommerce_ajax_add_to_cart_js() {
	if ( function_exists( 'is_product' ) && is_product() ) {
		wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/assets/js/custom/ajax_add_to_cart.js', array( 'jquery' ), '1.0' );
	}
}
add_action( 'wp_enqueue_scripts', 'ql_woocommerce_ajax_add_to_cart_js' );

add_action( 'wp_ajax_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart' );
add_action( 'wp_ajax_nopriv_ql_woocommerce_ajax_add_to_cart', 'ql_woocommerce_ajax_add_to_cart' );
function ql_woocommerce_ajax_add_to_cart() {
	$product_id        = apply_filters( 'ql_woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
	$quantity          = empty( $_POST['quantity'] ) ? 1 : wc_stock_amount( $_POST['quantity'] );
	$variation_id      = absint( $_POST['variation_id'] );
	$passed_validation = apply_filters( 'ql_woocommerce_add_to_cart_validation', true, $product_id, $quantity );
	$product_status    = get_post_status( $product_id );
	if ( $passed_validation && WC()->cart->add_to_cart( $product_id, $quantity, $variation_id ) && 'publish' === $product_status ) {
		do_action( 'ql_woocommerce_ajax_added_to_cart', $product_id );
		if ( 'yes' === get_option( 'ql_woocommerce_cart_redirect_after_add' ) ) {
			wc_add_to_cart_message( array( $product_id => $quantity ), true );
		}
			WC_AJAX::get_refreshed_fragments();
	} else {
		$data = array(
			'error'       => true,
			'product_url' => apply_filters( 'ql_woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
		);
		echo wp_send_json( $data );
	}
			wp_die();
}

add_shortcode( 'woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
		$cart_count = WC()->cart->cart_contents_count;
		$cart_url   = wc_get_cart_url();
	?>
	<li>
		<a class="gm01__list__link gm01__list__link--basket" href="<?php echo esc_url( $cart_url ); ?>" title="My Basket">
			<?php get_template_part( 'assets/svg/cart.svg' ); ?>
			<span class="cart-contents-count"><?php echo esc_html( $cart_count ); ?></span>
		</a>
	</li>

	<?php
	return ob_get_clean();
}


add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
/**
 * Add AJAX Shortcode when cart contents update
 */
function woo_cart_but_count( $fragments ) {

	ob_start();

	$cart_count = WC()->cart->cart_contents_count;
	$cart_url   = wc_get_cart_url();

	?>
	<a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
	<?php
	if ( $cart_count > 0 ) {
		?>
		<span class="cart-contents-count"><?php echo $cart_count; ?></span>
		<?php
	}
	?>
		</a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );

// Edit WooCommerce dropdown menu item of shop page//
// Options: menu_order, popularity, rating, date, price, price-desc

function my_woocommerce_catalog_orderby( $orderby ) {
	unset( $orderby['popularity'] );
	unset( $orderby['rating'] );
	return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'my_woocommerce_catalog_orderby', 20 );
