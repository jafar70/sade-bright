<?php
/**
 * Block: M04 - Latest Posts
 *
 * @used:
 *  - Gutenberg
 *
 * @package Jafar_Theme
 */

$heading        = get_field( 'm04_title' );
$featured_posts = get_field( 'm04_posts' );
?>

<section class="m04 break-out">
	<div class="container">
		<?php if ( $heading ) : ?>
		<h2 class="m04__title"><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>

		<?php if ( $featured_posts ) : ?>
			<div class="m04__grid">
				<?php
				foreach ( $featured_posts as $featured_post ) :
					$permalink  = get_permalink( $featured_post->ID );
					$heading    = get_the_title( $featured_post->ID );
					$price      = wc_get_product( $featured_post->ID );
					$image_id   = get_post_thumbnail_id( $featured_post->ID );
					$image_url  = get_the_post_thumbnail_url( $featured_post->ID, 'large' );
					$alt_text   = get_post_meta( $featured_post->ID, '_wp_attachment_image_alt', true );
					$image_attr = is_admin() ? 'src=' . $image_url : 'data-src=' . $image_url;
					$post_date  = get_the_date( 'dS M Y', $featured_post->ID );
					$category   = get_the_category( $featured_post->ID );
					?>
					<a class="m04__post flex" href="<?php echo esc_url( $permalink ); ?>">
						<?php if ( $image_id ) : ?>
							<div class="m04__post__img">
								<img class="lazy" <?php echo esc_attr( $image_attr ); ?> alt="<?php echo esc_attr( $alt_text ); ?>" />
							</div>
						<?php endif; ?>

						<div class="m04__post__text">
							<h6 class="m04__post__text__info small">
								<?php
								$term_categories = wp_get_post_terms( $featured_post->ID, 'category', array( 'fields' => 'all' ) );
								foreach ( $term_categories as $term_category ) {
									if ( get_post_meta( $featured_post->ID, '_yoast_wpseo_primary_category', true ) == $term_category->term_id ) {
										echo wp_kses_post( '<span>' . $term_category->name . '</span> / ' );
									}
								}
								?>
								<?php echo esc_html( $post_date ); ?>
							</h6>
							<h6 class="m04__post__text__title"><?php echo esc_html( $heading ); ?></h6>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<div class="m04__grid">
				<?php
					$args = array(
						'post_type'      => 'post',
						'posts_per_page' => 5,
					);

					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) :
						$loop->the_post();
						$permalink       = get_permalink( $post->ID );
						$heading         = get_the_title( $post->ID );
						$image_id        = get_post_thumbnail_id( $post->ID );
						$image_url       = get_the_post_thumbnail_url( $post->ID, 'full' );
						$alt_text        = get_post_meta( $post->ID, '_wp_attachment_image_alt', true );
						$image_attr      = is_admin() ? 'src=' . $image_url : 'data-src=' . $image_url;
						$post_date       = get_the_date( 'd M Y', $post->ID );
						$term_categories = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'all' ) );
						foreach ( $term_categories as $term_category ) {
							if ( get_post_meta( get_the_ID(), '_yoast_wpseo_primary_category', true ) == $term_category->term_id ) {
								$main_cat = $term_category->name;
							}
						}
						?>
						<a class="m04__post flex" href="<?php echo esc_url( $permalink ); ?>">
							<?php if ( $image_id ) : ?>
								<div class="m04__post__img">
									<img class="lazy" <?php echo esc_attr( $image_attr ); ?> alt="<?php echo esc_attr( $alt_text ); ?>" />
								</div>
							<?php endif; ?>

							<div class="m04__post__text">
								<h6 class="m04__post__text__info small">
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
								<h6 class="m04__post__text__title"><?php echo esc_html( $heading ); ?></h6>
							</div>
						</a>

						<?php
						endwhile;

					wp_reset_postdata();
					?>
			</div>
		<?php endif; ?>

		<div class="flex justify-content--center">
			<a href="<?php echo esc_url( site_url() . '/blog' ); ?>" class="button button--crail"> <?php echo esc_html( 'View more blogs' ); ?></a>
		</div>
	</div>
</section>
