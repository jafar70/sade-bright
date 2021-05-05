<?php
/**
 * Block: GM01 - Nav
 *
 * @used:
 *  - header.php
 *
 * @package Josh_Bright
 */

?>

<header class="gm01">
	<div class="container">
		<a href="<?php echo esc_url( site_url() ); ?>" class="gm01__logo"><?php echo esc_html( 'Sade Bright' ); ?></a>
		<?php
			wp_nav_menu(
				array(
					'menu'       => 'primary',
					'container'  => 'ul',
					'menu_class' => 'gm01__menu',
				)
			);
			?>
	</div>
	<?php echo do_shortcode( '[woo_cart_but]' ); ?>
</header>

