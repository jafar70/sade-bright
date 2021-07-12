<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jafar_Theme
 */

$heading    = get_the_title( get_the_ID() );
$post_date  = get_the_date( 'j F Y', get_the_ID() );
$excerpt    = get_the_excerpt( get_the_ID() );
$image_id   = get_post_thumbnail_id( get_the_ID() );
$image_alt  = get_post_meta( get_the_ID(), '_wp_attachment_image_alt', true );
$image_src  = get_the_post_thumbnail_url( get_the_ID(), 'large' );
$image_attr = is_admin() ? 'src=' . $image_src : 'data-src=' . $image_src;
$permalink  = get_permalink( get_the_ID() );

?>

<a class="m08__post flex" href="<?php echo esc_url( $permalink ); ?>">
	<?php if ( $image_id ) : ?>
		<div class="m08__post__img">
			<img class="lazy" <?php echo esc_attr( $image_attr ); ?> alt="<?php echo esc_attr( $alt_text ); ?>" />
		</div>
	<?php endif; ?>

	<div class="m08__post__text">
		<h6 class="m08__post__text__info small">
			<?php
			$term_categories = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'all' ) );
			foreach ( $term_categories as $term_category ) {
				if ( get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true ) == $term_category->term_id ) {
					echo wp_kses_post( '<span>' . $term_category->name . '</span> / ' );
				}
			}
			?>
			<?php echo esc_html( $post_date ); ?>
		</h6>
		<h6 class="m08__post__text__title"><?php echo esc_html( $heading ); ?></h6>
	</div>
</a>
