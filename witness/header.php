<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package witnessai
 */

?>

<!doctype html>
<html <?php language_attributes();?>>
<head>
   <!-- ========== Meta Tags ========== -->
	<meta charset="<?php bloginfo( 'charset' );?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>

<body <?php body_class();?>>

   <?php 
      wp_body_open();
      $witnessai_preloader_logo  = get_template_directory_uri() . '/assets/img/favicon.svg';

    
      do_action( 'witnessai_header_style' );?>
    
    <!-- wrapper-box start -->
    <?php do_action( 'witnessai_before_main_content' );?>