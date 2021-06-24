<?php
/**
 * Block: M02 - Book Listings
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading  = get_field( 'm02_title' );
$products = get_field( 'm02_products' );
?>

<section class="m02 break-out">
	<div class="container">
		<?php if ( $heading ) : ?>
		<h2 class="m02__title"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php if ( $products ) : ?>
			<div class="m02__grid flex flex-wrap ">
				<?php
				foreach ( $products as $product ) :
					$permalink  = get_permalink( $product->ID );
					$heading    = get_the_title( $product->ID );
					$price      = wc_get_product( $product->ID );
					$image_id   = get_post_thumbnail_id( $product->ID );
					$image_url  = get_the_post_thumbnail_url( $product->ID, 'full' );
					$alt_text   = get_post_meta( $variation_id, $product->ID, '_wp_attachment_image_alt', true );
					$image_attr = 'data-src=' . $image_url . '';

					if ( is_admin() ) {
						$image_attr = 'src=' . $image_url . '';
					}
					?>
					<a class="m02__product" href="<?php echo esc_url( $permalink ); ?>">
						<div class="m02__product__img">
							<img class="lazy" <?php echo esc_attr( $image_attr ); ?> alt="<?php echo esc_attr( $alt_text ); ?>" />
						</div>
						<h5 class="m02__product__title"><?php echo esc_html( $heading ); ?></h5>
						<p class="m02__product__price">
							<?php echo wp_kses_post( $price->get_price_html() ); ?>
						</p>
					</a>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
