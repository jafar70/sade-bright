<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jafar_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="m06 break-out">
			<div class="container">
				<h1 class="m06__title">
					<?php echo esc_html( 'Blog' ); ?>
				</h1>
			</div>
		</section>

		<div class="m08">
			<div class="container">
				<?php
				if ( have_posts() ) :
					/* Start the Loop */
					?>
					<div class="m08__grid">
						<?php
						while ( have_posts() ) :
							the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/

							get_template_part( 'template-parts/content', 'post' );

						endwhile;
						?>
					</div>

					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 3,
							'prev_text' => __( '«' ),
							'next_text' => __( '»' ),
						)
					);

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
