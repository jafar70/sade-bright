<?php
/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Jafar_Theme
 */

get_header();
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( site_url() ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html( 'Search for:' ); ?></span>
		<input type="text" id="search" class="search-field" placeholder="Search …" value="" name="s">
	</label>
	<a class="search-form__close">
		<?php echo wp_kses_post( '<span>×</span>' ); ?>
		<?php echo wp_kses_post( 'Reset' ); ?>
	</a>
</form>
