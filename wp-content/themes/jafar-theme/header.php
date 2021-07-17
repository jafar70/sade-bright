<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jafar_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="body" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'jafar-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<?php get_template_part( 'global-modules/gm01', 'top-nav' ); ?>
		<?php get_template_part( 'global-modules/gm02', 'nav' ); ?>
		<?php get_template_part( 'global-modules/gm04', 'search-dropdown' ); ?>
		<div class="background-overlay"></div>
	</header>
