<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package witnessai
 */

   get_header();
?>

   <section class="error__area section-margin-top section-margin-bottom">
      <div class="container">
         <div class="row">
            <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
               <?php 
                  $witnessai_404_bg          = get_theme_mod('witnessai_404_bg',get_template_directory_uri() . '/assets/images/404.png');
                  $witnessai_error_title     = get_theme_mod('witnessai_error_title', __('Page not found', 'witnessai'));
                  $witnessai_error_link_text = get_theme_mod('witnessai_error_link_text', __('Back To Home', 'witnessai'));
                  $witnessai_error_desc      = get_theme_mod('witnessai_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'witnessai'));
               ?>

               <div class="content-400-error text-center">
                  <div class="error__thumb mb-45">
                     <img class='w-60 img-100' src="<?php echo esc_url($witnessai_404_bg); ?>" alt="<?php print esc_attr__('Error 404','witnessai'); ?>">
                  </div>
                  <div class="error__content">
                     <h3 class="error__title mt-5 mb-3"><?php print esc_html($witnessai_error_title);?></h3>
                     <p class="mb-3"><?php print esc_html($witnessai_error_desc);?></p>
                     <a href="<?php print esc_url(home_url('/'));?>" class="common-btn"><?php print esc_html($witnessai_error_link_text);?></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

<?php
get_footer();