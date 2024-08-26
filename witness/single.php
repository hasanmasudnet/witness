<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package witnessai
 */

	get_header();


?>
	<!-- Start single
	============================================= -->

	 <!-- Breadcrumb -->

	 <div class="breadcrumb-area breadcrumb-area-career breadcrumb-resource-details bg-info-ai"
         style="background-image: url(<?php echo get_the_post_thumbnail_url('','full'); ?>);">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="breadcrumb-info breadcrumb-info-resource resource-details">
                     <h2 class="text-white h1 text-uppercase"><?php the_title( ); ?></h2>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Breadcrumb End -->

	<section class="details-area section-margin-top row-bottom-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="wpr-postbox__wrapper postbox-details">
						<?php
							while ( have_posts() ):
							the_post();

							get_template_part( 'template-parts/content', get_post_format() );
								
		
								if ( get_previous_post_link() || get_next_post_link() ): ?>

								<div class="single__post_navigation pt-5">
									<div class="row align-items-center gy-2">
										<?php
											if ( get_previous_post_link() ): ?>
											<div class="col-6">
												<div class="post-btn">
													<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
														<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
													</svg>
													<?php previous_post_link( '%link', 'Previous Post' ); ?>
												</div>
											</div>
										<?php
											endif;?>

									<?php
										if ( get_next_post_link() ): ?>
											<div class="col-6 text-end">
												<div class="post-btn">
													<?php next_post_link( '%link', 'Next Post' ); ?>
													<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
														<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
													</svg>
												</div>
											</div>
									<?php
										endif;?>
								</div>
							</div>

							<?php
								endif;?>
							<?php

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ):
									//comments_template();
								endif;

								endwhile; // End of the loop.
							?>
					</div>
				</div>


			</div>
		</div>
	</section>
	<!-- End Blog single -->

<?php
get_footer();
