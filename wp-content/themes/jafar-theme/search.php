<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Jafar_Theme
 */

get_header();
?>

	<main id="primary" class="site-main gm05">
		<section class="m06">
			<div class="container">
				<h1 class="m06__title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'jafar-theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>

				<?php get_template_part( 'search', 'form-page' ); ?>
			</div>
		</section>

		<div class="container container--small m10">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

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
	</main><!-- #main -->

<?php
get_footer();
