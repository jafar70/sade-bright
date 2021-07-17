<?php
/**
 * The template for displaying search form on the search page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Jafar_Theme
 */

get_header();
?>

<form role="search" method="get" class="search-form search-form--page" action="<?php echo esc_url( site_url() ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo esc_html( 'Search for:' ); ?></span>
		<input type="text" id="search-page" placeholder="Search …" value="" name="s">
	</label>
	<a class="search-form__close-page">
		<?php echo wp_kses_post( '<span>×</span>' ); ?>
		<?php echo wp_kses_post( 'Reset' ); ?>
	</a>
</form>
