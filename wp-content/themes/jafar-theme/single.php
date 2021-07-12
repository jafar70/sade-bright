<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Josh_Bright
 */

global $post;
$heading   = get_the_title( get_the_ID() );
$author_id = get_post_field( 'post_author', $cause_id );
$fname     = get_the_author_meta( 'first_name', $author_id );
$lname     = get_the_author_meta( 'last_name', $author_id );
$full_name = '';

if ( empty( $fname ) ) {
	$full_name = $lname;
} elseif ( empty( $lname ) ) {
	$full_name = $fname;
} else {
	// both first name and last name are present.
	$full_name = "{$fname} {$lname}";
}

get_header();
?>
	<main id="primary" class="site-main">
		<div class="container">
			<div class="m09">
				<h6 class="m09__meta"><?php echo esc_html( 'by ' . $full_name ); ?></h6>
				<?php if ( $heading ) : ?>
					<h1 class="m09__title h1"><?php echo esc_html( $heading ); ?></h1>
				<?php endif; ?>
			</div>
		</div>

		<div class="container container--small">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'josh-bright' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			?>

			<?php get_template_part( 'modules/m08', 'share-article' ); ?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
