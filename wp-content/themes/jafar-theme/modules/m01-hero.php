<?php
/**
 * Block: M01 - Hero
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading    = get_field( 'm01_title' );
$cta_title  = get_field( 'm01_cta_title' );
$cta        = get_field( 'm01_button' );
$image      = get_field( 'm01_image' );
$image_attr = 'data-src=' . $image['url'] . '';

if ( is_admin() ) {
	$image_attr = 'src=' . $image['url'] . '';
}
$caption   = get_field( 'm01_caption' );
$signature = get_field( 'm01_signature' );
?>

<section class="m01 break-out">
	<div class="container">
		<div class="m01__grid flex flex-wrap justify-content--space-between align-items--center">
			<?php if ( $image ) : ?>
				<div class="m01__grid__img">
					<img <?php echo esc_attr( $image_attr ); ?> alt="<?php esc_attr( $image['alt'] ); ?>" class="lazy">
				</div>
			<?php endif; ?>

			<div class="m01__grid__text">
				<div class="m01__white">
					<?php if ( $heading ) : ?>
						<h1 class="heading--1">
						<?php echo wp_kses_post( $heading ); ?>
						</h1>
					<?php endif; ?>
				</div>

				<div class="m01__crail">
					<?php if ( $cta_title ) : ?>
						<p><?php echo esc_html( $cta_title ); ?></p>
					<?php endif; ?>
					<?php
					if ( $cta ) :
							$link_url    = $cta['url'];
							$link_title  = $cta['title'];
							$link_target = $cta['target'] ? $cta['target'] : '_self';
						?>
							<a class="button button--white-outline" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
</section>
