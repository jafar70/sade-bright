<?php
/**
 * Block: GM03 - Mobile Nav
 *
 * @used:
 *  - header.php
 *
 * @package Josh_Bright
 */

?>

<section class="gm03 navigation">
	<div class="nav-container">
		<div class="brand">
			<a href="<?php echo esc_url( site_url() ); ?>"><?php echo esc_html( 'Sade Bright' ); ?></a>
		</div>
		<nav>
		<?php echo do_shortcode( '[woo_cart_but]' ); ?>
			<div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
			<?php
				wp_nav_menu(
					array(
						'menu'       => 'primary',
						'container'  => 'ul',
						'menu_class' => 'nav-list',
					)
				);
				?>
		</nav>
	</div>
</section>
