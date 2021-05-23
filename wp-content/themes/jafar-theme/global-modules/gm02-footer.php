<?php
/**
 * Block: GM02 - Footer
 *
 * @used:
 *  - footer.php
 *
 * @package Jafar_Theme
 */

$instagram_url = get_field( 'instagram_url', 'option' );
$github_url    = get_field( 'github_url', 'option' );
$linkedin_url  = get_field( 'linkedin_url', 'option' );
$twitter_url   = get_field( 'twitter_url', 'option' );
$facebook_url  = get_field( 'facebook_url', 'option' );
$contact_title = get_field( 'contact_details_title', 'option' );
$contact_text  = get_field( 'contact_details_text', 'option', false, false );
$social_title  = get_field( 'social_media_title', 'option' );
$more_title    = get_field( 'more_information_title', 'option' );
$more_text     = get_field( 'more_information_text', 'option' );
?>
<footer class="gm02">
	<div class="container">
		<div class="gm02__grid">
			<div class="gm02__grid__item">
				<h4 class="gm02__title">
					<?php echo wp_kses_post( $contact_title ); ?>
				</h4>
				<?php echo wp_kses_post( $contact_text ); ?>
			</div>
			<div class="gm02__grid__item">
				<h4 class="gm02__title">
					<?php echo wp_kses_post( $social_title ); ?>
				</h4>
				<div class="gm02__socials">
					<?php if ( $instagram_url ) { ?>
						<a href="<?php echo esc_url( $instagram_url ); ?>" rel="noopener" target="_blank" class='nav-right__link' aria-label="Instagram">
							<?php get_template_part( 'assets/img/inline', 'instagram.svg' ); ?>
						</a>
					<?php } ?>
					<?php if ( $twitter_url ) { ?>
						<a href="<?php echo esc_url( $twitter_url ); ?>" rel="noopener" target="_blank" class='nav-right__link' aria-label="Twitter">
							<?php get_template_part( 'assets/img/inline', 'twitter.svg' ); ?>
						</a>
					<?php } ?>
					<?php if ( $linkedin_url ) { ?>
						<a href="<?php echo esc_url( $linkedin_url ); ?>" rel="noopener" target="_blank" class='nav-right__link' aria-label="LinkedIn">
							<?php get_template_part( 'assets/img/inline', 'linkedin.svg' ); ?>
						</a>
					<?php } ?>
					<?php if ( $facebook_url ) { ?>
						<a href="<?php echo esc_url( $facebook_url ); ?>" rel="noopener" target="_blank" class='nav-right__link' aria-label="LinkedIn">
							<?php get_template_part( 'assets/img/inline', 'facebook.svg' ); ?>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="gm02__grid__item">
				<h4 class="gm02__title">
					<?php echo wp_kses_post( $more_title ); ?>
				</h4>
				<?php echo wp_kses_post( $more_text ); ?>
			</div>
		</div>
		<div class="gm02__credits">
			<p><?php echo esc_html( '© ' . gmdate( 'Y' ) . ' Sade Bright' ); ?></p>
		</div>
	</div>
</footer>
