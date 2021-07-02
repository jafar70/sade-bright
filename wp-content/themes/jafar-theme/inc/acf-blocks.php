<?php
/**
 * ACF Gutenberg Block Registration & Functions.
 *
 * @package Jafar_Theme
 */

/**
 * Register ACF Block Category.
 *
 * @param array  $categories our block categories.
 * @param object $post our post object.
 */
function block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'sade-blocks',
				'title' => __( 'Sade Blocks', 'stella' ),
			),
		)
	);
}
add_filter( 'block_categories', 'block_category', 10, 2 );

/**
 * Register ACF Blocks.
 */
function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name'            => 'hero',
			'title'           => __( 'Hero' ),
			'description'     => __( 'Hero block.' ),
			'render_template' => 'modules/m01-hero.php',
			'category'        => 'sade-blocks',
			'icon'            => 'align-center',
			'keywords'        => array( 'hero' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => false,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'book-listings',
			'title'           => __( 'Book Listings' ),
			'description'     => __( 'Book Listings block.' ),
			'render_template' => 'modules/m02-book-listings.php',
			'category'        => 'sade-blocks',
			'icon'            => 'book',
			'keywords'        => array( 'book', 'listings' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'about-me',
			'title'           => __( 'About me' ),
			'description'     => __( 'About me block.' ),
			'render_template' => 'modules/m03-about-me.php',
			'category'        => 'sade-blocks',
			'icon'            => 'businesswoman',
			'keywords'        => array( 'about', 'me' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
			'enqueue_assets'  => function() {
				wp_enqueue_style( 'plyr-style', 'https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.8/plyr.min.css', array(), '3.6.8' );
				wp_enqueue_script( 'plyr-js', 'https://cdnjs.cloudflare.com/ajax/libs/plyr/3.6.8/plyr.min.js', array( 'jquery' ), '3.6.8', true );
				wp_enqueue_script( 'jafar-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array( 'jquery' ), '1.0.0', true );
			},
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'latest-posts',
			'title'           => __( 'Latest Posts' ),
			'description'     => __( 'Latest Posts block.' ),
			'render_template' => 'modules/m04-latest-posts.php',
			'category'        => 'sade-blocks',
			'icon'            => 'admin-post',
			'keywords'        => array( 'latest', 'posts' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'form',
			'title'           => __( 'Form' ),
			'description'     => __( 'Form block.' ),
			'render_template' => 'modules/m05-form.php',
			'category'        => 'sade-blocks',
			'icon'            => 'form',
			'keywords'        => array( 'form' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'page-heading',
			'title'           => __( 'Page Heading' ),
			'description'     => __( 'Page heading block.' ),
			'render_template' => 'modules/m06-page-header.php',
			'category'        => 'sade-blocks',
			'icon'            => 'heading',
			'keywords'        => array( 'page', 'heading' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
		)
	);

	acf_register_block_type(
		array(
			'name'            => 'video',
			'title'           => __( 'Video' ),
			'description'     => __( 'Video block.' ),
			'render_template' => 'modules/m07-video.php',
			'category'        => 'sade-blocks',
			'icon'            => 'video',
			'keywords'        => array( 'video' ),
			'supports'        => array(
				'mode'     => false,
				'align'    => false,
				'multiple' => true,
			),
		)
	);
}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_types' );
}

/**
 * Allowed theme block types.
 */
// function allowed_block_types() {
// return array(
// 'core/image',
// 'core/group',
// 'core/table',
// 'core/paragraph',
// 'core/quote',
// 'core/heading',
// 'core/list',
// );
// }
// add_filter( 'allowed_block_types', 'allowed_block_types' );.
