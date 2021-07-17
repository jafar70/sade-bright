<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jafar_Theme
 */

$type_post = get_post_type( get_the_ID() );
if ( 'product' === $type_post ) {
	$type_post = 'book';
} elseif ( 'post' === $type_post ) {
	$type_post = 'blog';
}

$excerpt = get_the_excerpt( get_the_ID() );
?>

<a class="single-search" href="<?php echo esc_url( get_permalink() ); ?>">
	<h5 class="single-search__tag"><?php echo esc_html( $type_post ); ?></h5>
	<h2 class="single-search__title"><?php echo esc_html( get_the_title() ); ?></h2>
	<h4 class="single-search__link"><?php echo esc_url( get_permalink() ); ?></h4>
	<?php if ( $excerpt ) : ?>
		<p class="single-search__excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_content(), 27, '...' ) ); ?></p>
	<?php endif; ?>
</a><!-- #post-<?php the_ID(); ?> -->
