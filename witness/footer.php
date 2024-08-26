<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package witnessai
 */

 
    $bg_style = function_exists( 'get_field' ) ? get_field( 'body_background_style' ) : NULL;
    
    //witnessai footer area hook 
    do_action( 'witnessai_footer_area' );
    ?>
    </div>
    <?php 
    wp_footer();?>
    </body>
</html>