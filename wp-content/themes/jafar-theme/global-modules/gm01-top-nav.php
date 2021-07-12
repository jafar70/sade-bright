<?php
/**
 * Global Modules: GM01 - Top Nav
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

<div class="gm01">
	<div class="container gm01__grid">
		<ul class="gm01__list">
			<?php if ( $facebook_url ) : ?>
				<li>
					<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" class="gm01__list__link gm01__list__link--facebook">
						<?php get_template_part( 'assets/svg/facebook.svg' ); ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( $twitter_url ) : ?>
				<li>
					<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" class="gm01__list__link gm01__list__link--twitter">
					<?php get_template_part( 'assets/svg/twitter.svg' ); ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( $linkedin_url ) : ?>
				<li>
				<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" class="gm01__list__link gm01__list__link--linkedin">
					<?php get_template_part( 'assets/svg/linkedin.svg' ); ?>				
				</a>
				</li>
			<?php endif; ?>

			<?php if ( $email ) : ?>
				<li>
					<a href="<?php echo esc_attr( 'mailto:' . $email ); ?>" class="gm01__list__link gm01__list__link--linkedin">
						<?php get_template_part( 'assets/svg/email.svg' ); ?>				
					</a>
				</li>
			<?php endif; ?>

			<li>
				<a class="gm01__list__link gm01__list__link--search">
					<?php get_template_part( 'assets/svg/search.svg' ); ?>	
					<span><?php echo esc_html( 'Search' ); ?></span>			
				</a>
			</li>

			<?php echo do_shortcode( '[woo_cart_but]' ); ?>

			</ul>
	</div>
</div>
