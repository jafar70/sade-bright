<?php
/**
 * Global Modules: GM02 - Footer
 *
 * @used:
 *  - footer.php
 *
 * @package Jafar_Theme
 */

$logo         = get_field( 'gm02_logo', 'option' );
$twitter_url  = get_field( 'twitter_url', 'option' );
$facebook_url = get_field( 'facebook_url', 'option' );
$linkedin_url = get_field( 'linkedin_url', 'option' );
$email        = get_field( 'email_address', 'option' );
?>

<footer class="gm02">
	<div class="container container--medium gm02__grid">
		<h2 class="heading--1 gm02__logo"><?php echo esc_html( 'Sade Bright' ); ?></h2>
		<div class="gm02__menu">
			<?php
				wp_nav_menu(
					array(
						'menu'      => 'footer-menu',
						'container' => 'ul',
					)
				);
				?>
		</div>

		<div class="gm02__social">

			<?php if ( $facebook_url ) : ?>
				<a href="<?php echo esc_url( $facebook_url ); ?>" target="_blank" class="gm02__social__link gm02__social__link--facebook">
					<?php get_template_part( 'assets/svg/facebook.svg' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( $twitter_url ) : ?>
				<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" class="gm02__social__link gm02__social__link--twitter">
				<?php get_template_part( 'assets/svg/twitter.svg' ); ?>
				</a>
			<?php endif; ?>

			<?php if ( $linkedin_url ) : ?>
				<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" class="gm02__social__link gm02__social__link--linkedin">
					<?php get_template_part( 'assets/svg/linkedin.svg' ); ?>				
				</a>
			<?php endif; ?>

			<?php if ( $email ) : ?>
				<a href="<?php echo esc_attr( 'mailto:' . $email ); ?>" class="gm02__social__link gm02__social__link--linkedin">
					<?php get_template_part( 'assets/svg/email.svg' ); ?>				
				</a>
			<?php endif; ?>
		</div>
	</div>

	<div class="gm02__bottom">
		<div class="container container--medium flex flex-wrap justify-content--space-between">
			<div class="gm02__bottom__info flex flex-wrap">
				<p><?php echo esc_html( '©' . gmdate( 'Y' ) . ' Sade Bright.' ); ?></p>
				<?php
				wp_nav_menu(
					array(
						'menu'       => 'bottom-footer',
						'container'  => 'ul',
						'menu_class' => 'gm02__bottom__info__links',
					)
				);
				?>
			</div>

			<div class="gm02__bottom__credits">
				<p class="gm02__bottom__credits__link">
					<?php echo esc_html( 'Website by ' ); ?>
					<a href="<?php echo esc_url( 'https://jafarsalami.co.uk' ); ?>" target="_blank"><?php echo esc_html( 'Jafar Salami' ); ?></a>
				</p>
			</div>
		</div>
	</div>
</footer>
