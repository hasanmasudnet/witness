<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package witnessai
 */

	get_header();
	$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 12;

?>

	<section class="deff-blog-loops search-content">
		<div class="container container-box">
			<div class="row">
				<div class="col-lg-<?php print esc_attr( $blog_column );?> blog-post-items blog-padding">
					<div class="wpr-postbox__wrapper pr-20">

						<?php
							if ( have_posts() ):
								/* Start the Loop */
								while ( have_posts() ): the_post(); ?>
								<?php
									/*
									* Include the Post-Type-specific template for the content.
									* If you want to override this in a child theme, then include a file
									* called content-___.php (where ___ is the Post Type name) and that will be used instead.
									*/
									get_template_part( 'template-parts/content', get_post_format() );?>
									
								<?php
									endwhile;
								?>
									<div class="pagination-wrap">
										<?php witnessai_pagination( '<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>', '', ['class' => ''] );?>
									</div>
								<?php
								else:
									get_template_part( 'template-parts/content', 'none' );
							endif;
						?>

					</div>
				</div>

				<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
					<!-- sidebar start -->
					<div class="col-lg-4">
						<div class="sidebar-wrap">
							<?php get_sidebar();?>
						</div>
					</div>
					<!-- sidebar end -->
				<?php endif;?>
			</div>
		</div>
	</section>

<?php
get_footer();
