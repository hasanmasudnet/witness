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
	<section class="team-details-area section-margin-top section-margin-bottom">
		<div class="container">
            <?php
               while ( have_posts() ):
               the_post();

               get_template_part( 'template-parts/content', get_post_format() );

                  if ( get_previous_post_link() AND get_next_post_link() ): ?>

                  <div class="single__post_navigation d-none">
                     <div class="row align-items-center">
                        <?php
                           if ( get_previous_post_link() ): ?>
                           <div class="col-lg-6 col-md-6">
                              <div class="theme-navigation b-next-post text-left mb-30">
                                 <span><?php print esc_html__( 'Prev Post', 'witnessai' );?></span>
                                 <h4><?php print get_previous_post_link( '%link ', '%title' );?></h4>
                              </div>
                           </div>
                        <?php
                           endif;?>

                     <?php
                        if ( get_next_post_link() ): ?>
                        <div class="col-lg-6 col-md-6">
                           <div class="theme-navigation b-next-post text-left text-md-right  mb-30">
                              <span><?php print esc_html__( 'Next Post', 'witnessai' );?></span>
                              <h4><?php print get_next_post_link( '%link ', '%title' );?></h4>
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
                     comments_template();
                  endif;

                  endwhile; // End of the loop.
               ?>
		</div>
	</section>
	<!-- End Blog single -->

<?php
get_footer();
