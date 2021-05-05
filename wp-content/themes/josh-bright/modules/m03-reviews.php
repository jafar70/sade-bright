<?php
/**
 * Block: M03 - Reviews
 *
 * @used:
 *  - Gutenberg
 *
 * @package Josh_Bright
 */

$heading   = get_field( 'm03_title' );
$reviews   = get_field( 'm03_reviews' );
$cta       = get_field( 'm03_button' );
$white_bkg = get_field( 'm03_white_background' );
?>

<div class="m03 block-element <?php echo ( $white_bkg === 'yes' ) ? 'm03--white' : ''; ?>">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2 class="m03__title h2"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php
		if ( $reviews ) :
			?>
				<div class="m03__grid">
				<?php
				foreach ( $reviews as $review ) :
					$quote_text = $review['m03_quote_text'];
					$quote_name = $review['m03_quote_name'];
					?>
						<div class="m03__quote">
							<?php if ( $quote_text ) : ?>
								<p class="m03__quote__text">
									<?php echo wp_kses_post( '"' . $quote_text . '"' ); ?>
								</p>
							<?php endif; ?>

							<?php if ( $quote_name ) : ?>
								<hr class="m03__quote__separator">
								<p class="m03__quote__name">
									<?php echo esc_html( $quote_name ); ?>
								</p>
							<?php endif; ?>
						</div>
				<?php endforeach; ?>
				</div>
			<?php
		endif;
		?>

		<?php
		if ( $cta ) :
				$link_url    = $cta['url'];
				$link_title  = $cta['title'];
				$link_target = $cta['target'] ? $cta['target'] : '_self';
			?>
				<p class="m03__btn-box"><a class="m03__btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></p>
		<?php endif; ?>
	</div>
</div>
