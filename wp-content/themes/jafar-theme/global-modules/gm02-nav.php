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
				<h2><?php echo esc_html( 'Sade Bright' ); ?></h2>
			</a>

			<a class="gm02__grid__closebtn"><?php echo esc_html( '×' ); ?></a>

			<div class="gm02__grid__menu">
				<?php
				wp_nav_menu(
					array(
						'menu'       => 'main-menu',
						'container'  => 'ul',
						'menu_class' => 'gm02__menu',
					)
				);
				?>
			</div>

			<div class="gm02__grid__hamburger">	
				<span class='bar1'></span>
				<span class='bar2'></span>
				<span class='bar3'></span>
			</div>
		</div>
	</div>
</div>
