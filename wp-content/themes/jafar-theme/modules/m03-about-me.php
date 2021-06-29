<?php
/**
 * Block: M03 - About Me
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading    = get_field( 'm03_title' );
$text       = get_field( 'm03_text' );
$image      = get_field( 'm03_image' );
$image_attr = is_admin() ? 'src=' . $image['url'] : 'data-src=' . $image['url'];
$cta        = get_field( 'm03_link' );
$text_order = get_field( 'm03_text_position' );
?>

<section class="m03 break-out m03--align-<?php echo esc_html( $text_order ); ?>">
	<div class="container">
		<div class="m03__grid">
			<div class="m03__grid__text">
				<?php if ( $heading ) : ?>
					<h2 class="h2 m03__title"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $text ) : ?>
					<div class="m03__subtext">
						<?php echo wp_kses_post( $text ); ?>
					</div>
				<?php endif; ?>

				<?php
				if ( $cta ) :
						$link_url    = $cta['url'];
						$link_title  = $cta['title'];
						$link_target = $cta['target'] ? $cta['target'] : '_self';
					?>
						<a class="button button--crail" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>

			</div>
		</div>
		<div class="m03__media">
			<?php if ( have_rows( 'm03_image_or_video' ) ) : ?>
				<?php
				while ( have_rows( 'm03_image_or_video' ) ) :
					the_row();
					?>
						<?php
						if ( get_row_layout() == 'm03_images' ) :
							$image      = get_sub_field( 'm03_image_media' );
							$image_attr = is_admin() ? 'src=' . $image['url'] : 'data-src=' . $image['url'];
							?>
							<?php if ( $image ) : ?>
								<img <?php echo esc_attr( $image_attr ); ?> alt="<?php echo esc_attr( $image['alt'] ); ?>" class='lazy m03__media__image'>
							<?php endif; ?>
							<?php
						elseif ( get_row_layout() == 'm03_videos' ) :
								$video_id   = get_sub_field( 'm03_video_id' );
								$video_type = get_sub_field( 'm03_video_type' );
							?>
								<div class="js-player" data-plyr-provider="<?php echo esc_attr( $video_type ); ?>" data-plyr-embed-id="<?php echo esc_attr( $video_id ); ?>"></div>
						<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
