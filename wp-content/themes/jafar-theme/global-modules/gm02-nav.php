<?php
/**
 * Global Modules: GM02 - Nav
 *
 * @used:
 *  - header.php
 *
 * @package Jafar_Theme
 */

$twitter_url  = get_field( 'twitter_url', 'option' );
$facebook_url = get_field( 'facebook_url', 'option' );
$linkedin_url = get_field( 'linkedin_url', 'option' );
$email        = get_field( 'email_address', 'option' );
?>

<div class="gm02">
	<div class="container">
		<div class="gm02__grid flex justify-content--space-between align-items--center">
			<a href="<?php echo esc_url( home_url() ); ?>" class="gm02__grid__logo">
				<h2>Sade Bright</h2>
			</a>

			<div class="gm02__grid__menu">
			<?php
			wp_nav_menu(
				array(
					'menu'       => 'menu-1',
					'container'  => 'ul',
					'menu_class' => 'gm02__menu',
				)
			);
			?>
			</div>
		</div>
	</div>
</div>
