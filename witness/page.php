<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */

	get_header();


	/* Start single
	============================================= */
	echo '<main id="primary" class="site-main">';
	if ( have_posts() ):
		while ( have_posts() ): the_post();
			get_template_part( 'template-parts/content', 'page' );

			if ( comments_open() || get_comments_number() ) :
				echo '<div class="container mt-5" >';
				echo '<div class="row justify-content-center">';
				echo '<div class="col-lg-10">';
				comments_template();
				echo '</div>';
				echo '</div>';
			endif;

		endwhile;
	else:
		get_template_part( 'template-parts/content', 'none' );
	endif;
	echo '</div>';
get_footer(); 