<?php
/**
 * Block: M01 - Home Banner
 *
 * @used:
 *  - Gutenberg
 *
 * @package Josh_Bright
 */

$heading   = get_field( 'm01_title' );
$subtitle  = get_field( 'm01_subtitle' );
$cta       = get_field( 'm01_button' );
$image     = get_field( 'm01_image' );
$caption   = get_field( 'm01_caption' );
$signature = get_field( 'm01_signature' );
?>

<div class="m01 block-element">
	<div class="m01__grid">
		<div class="m01__grid__item">
			<div class="m01__box">
				<?php if ( $heading ) : ?>
					<h1 class="m01__title  h1"><?php echo esc_html( $heading ); ?></h1>
				<?php endif; ?>

				<?php if ( $subtitle ) : ?>
					<p class="m01__subtitle"><?php echo esc_html( $subtitle ); ?></p>
				<?php endif; ?>

				<?php
				if ( $cta ) :
					$link_url    = $cta['url'];
					$link_title  = $cta['title'];
					$link_target = $cta['target'] ? $cta['target'] : '_self';
					?>
						<a class="m01__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
		<div class="m01__grid__item">
			<div class="m01__box">
				<div class="m01__img">
					<?php if ( $image ) : ?>
						<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
					<?php endif; ?>
				</div>

				<?php if ( $caption ) : ?>
					<p class="m01__caption"><?php echo esc_html( $caption ); ?></p>
				<?php endif; ?>

				<?php if ( $signature ) : ?>
					<p class="m01__signature"><?php echo esc_html( $signature ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
