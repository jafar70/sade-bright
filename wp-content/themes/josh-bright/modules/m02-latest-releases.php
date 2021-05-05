<?php
/**
 * Block: M02 - Latest Releases
 *
 * @used:
 *  - Gutenberg
 *
 * @package Josh_Bright
 */

$heading  = get_field( 'm02_title' );
$products = get_field( 'm02_products' );
$cta      = get_field( 'm02_text_box_button' );
$text     = get_field( 'm02_text_box' );
?>

<div class="m02 block-element">
	<div class="container">
		<?php if ( $heading ) : ?>
			<h2 class="m02__title h2"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<div class="m02__grid">
			<?php
			foreach ( $products as $product ) :
				$permalink = get_permalink( $product->ID );
				$heading   = get_the_title( $product->ID );
				$price     = wc_get_product( $product->ID );
				$image_id  = get_post_thumbnail_id( $product->ID );
				$image_url = get_the_post_thumbnail_url( $product->ID, 'full' );
				$alt_text  = get_post_meta( $variation_id, $product->ID, '_wp_attachment_image_alt', true );
				?>
				<a class="m02__product" href="<?php echo esc_url( $permalink ); ?>">
					<div class="m02__product__img">
						<img class="" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $alt_text ); ?>" />
					</div>
					<h5 class="m02__product__title"><?php echo esc_html( $heading ); ?></h5>
					<hr class="m02__product__separator">
					<p class="m02__product__price">
						<?php echo wp_kses_post( $price->get_price_html() ); ?>
					</p>
				</a>
			<?php endforeach; ?>

			<div class="m02__product m02__product--cta" href="<?php echo esc_url( $permalink ); ?>">
				<div class="m02__text-box">
					<?php echo wp_kses_post( $text ); ?>
				</div>

				<?php
				if ( $cta ) :
						$link_url    = $cta['url'];
						$link_title  = $cta['title'];
						$link_target = $cta['target'] ? $cta['target'] : '_self';
					?>
						<a class="m02__cta" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
