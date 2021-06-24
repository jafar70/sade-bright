<?php
/**
 * Block: M04 - Text with Image
 *
 * @used:
 *  - Gutenberg
 *
 * @package Josh_Bright
 */

$heading   = get_field( 'm04_title' );
$image     = get_field( 'm04_image' );
$text      = get_field( 'm04_text' );
$signature = get_field( 'm04_signature' );
?>

<div class="m04 block-element">
	<div class="container">
		<div class="m04__grid">
			<div class="m04__grid__img">
			<?php
			if ( $image ) :
				?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
			<?php endif; ?>
			</div>
			<div class="m04__grid__text">
				<?php if ( $heading ) : ?>
					<h4><?php echo esc_html( $heading ); ?></h4>
				<?php endif; ?>

				<?php echo wp_kses_post( $text ); ?>

				<p class="m04__signature"><?php echo wp_kses_post( $signature ); ?></p>
			</div>
		</div>
	</div>
</div>
