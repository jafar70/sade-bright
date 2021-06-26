<?php
/**
 * Global Modules: GM04 - Search Dropdown
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

<div class="gm04">
	<div class="container">
		<a class="gm04__close"><?php echo wp_kses_post( 'Close <span>×</span>' ); ?></a>
			<?php get_template_part( 'search', 'form' ); ?>
	</div>
</div>
