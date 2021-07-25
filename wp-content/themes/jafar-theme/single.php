<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Josh_Bright
 */

global $post;
$heading       = get_the_title( get_the_ID() );
$post_date     = get_the_date( 'j F Y', get_the_ID() );
$current_page  = get_permalink( get_the_ID() );
$email_link    = 'mailto:?subject=' . rawurlencode( html_entity_decode( $heading ) ) . '&body=' . $current_page;
$twitter_link  = 'https://twitter.com/intent/tweet?url=' . rawurlencode( $current_page );
$linkedin_link = 'https://www.linkedin.com/shareArticle?mini=true&url=' . rawurlencode( $current_page ) . '&title=&summary=&source=';
$facebook_link = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( $current_page );
$whatsapp_link = 'https://wa.me/?text=' . rawurlencode( $current_page );
$author_id     = get_post_field( 'post_author', $cause_id );
$fname         = get_the_author_meta( 'first_name', $author_id );
$lname         = get_the_author_meta( 'last_name', $author_id );
$full_name     = '';

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
				<h6 class="m09__meta">
					<?php echo esc_html( 'by ' . $full_name . ' / ' . $post_date ); ?>
				</h6>
				<?php if ( $heading ) : ?>
					<h1 class="m09__title h1"><?php echo esc_html( $heading ); ?></h1>
				<?php endif; ?>

				<div class="m09__social">
					<?php if ( $facebook_link ) : ?>
						<a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank" class="m09__social__link m09__social__link--facebook">
							<?php get_template_part( 'assets/svg/facebook.svg' ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $twitter_link ) : ?>
						<a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank" class="m09__social__link m09__social__link--twitter">
						<?php get_template_part( 'assets/svg/twitter.svg' ); ?>
						</a>
					<?php endif; ?>

					<?php if ( $linkedin_link ) : ?>
						<a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank" class="m09__social__link m09__social__link--linkedin">
							<?php get_template_part( 'assets/svg/linkedin.svg' ); ?>				
						</a>
					<?php endif; ?>

					<?php if ( $email_link ) : ?>
						<a href="<?php echo esc_attr( $email_link ); ?>" class="m09__social__link m09__social__link--linkedin">
							<?php get_template_part( 'assets/svg/email.svg' ); ?>				
						</a>
					<?php endif; ?>
				</div>


			</div>
		</div>

		<div class="container container--small ">
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

			<?php
			//phpcs:disable
			// get_template_part( 'modules/m08', 'share-article' );. 
			?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
