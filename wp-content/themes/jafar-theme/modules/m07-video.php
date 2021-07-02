<?php
/**
 * Block: M07 - Video
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$video_id   = get_field( 'm07_video_id' );
$video_type = get_field( 'm07_video_type' );
?>

<section class="m07">
	<div class="js-player" data-plyr-provider="<?php echo esc_attr( $video_type ); ?>" data-plyr-embed-id="<?php echo esc_attr( $video_id ); ?>"></div>
</section>
