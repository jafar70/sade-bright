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
// add_filter( 'allowed_block_types', 'allowed_block_types' );
