<?php
/**
 * Block: M06 - Page Header
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading = get_field( 'm06_title' );
?>

<section class="m06 break-out">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h1 class="m06__title"><?php echo esc_html( $heading ); ?></h1>
		<?php endif; ?>
	</div>
</section>
