<?php 
/**
	 * Template part for displaying header layout one
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package witnessai
	*/


    /** Header buttons */
    //Button one
    $button = function_exists( 'get_field' ) ? !empty(get_field( 'header_button', 'option' )) ? get_field( 'header_button', 'option' ) : NULL : NULL;
    // Header Options
    $is_transparent = function_exists( 'get_field' ) ? (get_field( 'transparent_header' ) == true ) ? 'transparent-header' : NULL : NULL;
  
?>


<header>

    <!-- Menu -->
    <div class="menu-area <?php echo esc_attr($is_transparent); ?>">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 hamburger-menu position-relative">
                    <div class="menu-logo-wrap">
                        <?php 
                        // Site Logo
                        witnessai_header_logo();?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="mainmenu-wrap d-flex align-items-center justify-content-md-end">
                        <div class="mainmenu d-none d-lg-block">
                        <?php witnessai_header_menu();?>

                            <?php 
                                // button
                                if ($button) {
                                    $btn_url    = $button['url'];
                                    $btn_title  = $button['title'];
                                    $btn_target = $button['target'] ? $button['target'] : '';
                                ?>
                                    
                                    
                                <?php
                                }
                            ?>
                        </div>
                        
                        <?php 
                            // button
                            if ($button) {
                                $btn_url    = $button['url'];
                                $btn_title  = $button['title'];
                                $btn_target = $button['target'] ? $button['target'] : '';
                            ?>
                                <div class="menu-btn-wrap d-none d-md-block">
                                    <a class="common-btn menu" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                        <?php echo esc_html($btn_title); ?>
                                    </a>
                                </div>
                                
                            <?php
                            }
                        ?>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <!-- Menu end -->

    <!-- <div class="preloader">
        <div class="spinner-wrap">
            <div class="preloader-logo">
                <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/logo-witness.png" alt="" class="img-fluid">
            </div>
            <div class="spinner"></div> 
        </div>
    </div> -->
    
</header>
<!-- ===============  header area end =============== -->