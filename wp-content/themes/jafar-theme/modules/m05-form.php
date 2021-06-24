<?php
/**
 * Block: M05 - Form
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading = get_field( 'm05_title' );
$text    = get_field( 'm05_text' );
$form_id = get_field( 'm05_form_id' );
?>

<section class="m05 break-out">
	<div class="container">
		<div class="m05__grid flex flex-wrap justify-content--space-between">
			<div class="m05__grid__text">
				<?php if ( $heading ) : ?>
					<h2 class="m05__title"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $text ) : ?>
					<p class="m05__text">
						<?php echo esc_html( $text ); ?>
					</p>
				<?php endif; ?>
			</div>

			<div class="m05__grid__form" id="m05__form">
				<?php echo do_shortcode( '[gravityform id="' . $form_id . '" title="false" description="false" ajax="true"]' ); ?>
			</div>
		</div>
	</div>
</section>
