<?php
/**
 * Block: M05 - Page Header
 *
 * @used:
 *  - Gutenberg
 *
 * @package Josh_Bright
 */

$heading = get_field( 'm05_title' );
?>

<div class="m05 block-element">
	<div class="container container--medium">
		<?php if ( $heading ) : ?>
			<hr class="m05__separator">
			<h1 class="m05__title h2"><?php echo esc_html( $heading ); ?></h1>
		<?php endif; ?>
	</div>
</div>
