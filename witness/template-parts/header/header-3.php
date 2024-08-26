<?php 

	/**
	 * Template part for displaying header layout two
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package witnessai
	*/


    /** Header buttons */
    //Button one
    $witnessai_head_btn_one = get_theme_mod( 'witnessai_head_r_button_text_one', __( 'Login', 'witnessai' ) );
    $witnessai_head_btn_one_link = get_theme_mod( 'witnessai_head_r_button_link_one', __( '#', 'witnessai' ) );
    
    //Button two
    $witnessai_head_btn_two = get_theme_mod( 'witnessai_head_r_button_text_two', __( 'Sign Up', 'witnessai' ) );
    $witnessai_head_btn_two_link = get_theme_mod( 'witnessai_head_r_button_link_two', __( '#', 'witnessai' ) );

   // Header Options
   $is_transparent = function_exists( 'get_field' ) ? (get_field( 'transparent_header' ) == true ) ? 'header-transparent' : NULL : NULL;

   // header right
   $witnessai_header_right = get_theme_mod( 'witnessai_header_right', false );
   $witnessai_menu_col = ( $witnessai_header_right ) ? 'col-xl-6 col-lg-8 col-md-8 col-sm-6 col-xs-6 d-xl-flex justify-content-lg-center' : 'col-xl-9 d-xl-flex justify-content-lg-end';

?>

<!-- ===============  header area start =============== -->
<header>
   <div class="header-area header-three <?php echo esc_attr($is_transparent); ?>">
      <div class="container">
            <div class="row">
               <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12 align-items-center d-xl-flex d-lg-block">
                  <div class="nav-logo d-flex justify-content-between align-items-center">
                     <?php 
                     //Site Logo
                     witnessai_header_logo();?>

                     <div class="d-flex align-items-center gap-4">
                        <div class="mobile-menu d-flex ">
                           <a href="javascript:void(0)" class="hamburger d-block d-xl-none">
                                 <span class="h-top"></span>
                                 <span class="h-middle"></span>
                                 <span class="h-bottom"></span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="<?php echo esc_attr($witnessai_menu_col); ?>">
                  <nav class="main-nav float-end">
                     <div class="inner-logo d-xl-none text-center">
                        <?php 
                        //Site Logo
                        witnessai_header_logo();?>
                     </div>

                     <?php 
                     // Site menu
                     witnessai_header_menu();?>

                     <?php if ( !empty( $witnessai_header_right ) ): ?>
                        <div class="inner-contact-options d-xl-none d-inline-flex flex-column  px-3">
                           <a href="<?php echo esc_html( $witnessai_head_btn_one_link ); ?>" class="btn-transparent-xl btn-transparent-v3 mb-3"><?php echo esc_html( $witnessai_head_btn_one ); ?></a>
                           <a href="<?php echo esc_html( $witnessai_head_btn_two_link ); ?>" class="btn-fill-pill-v2 md-btn"><?php echo esc_html( $witnessai_head_btn_two ); ?></a>
                        </div>
                     <?php endif; ?>

                  </nav>
               </div>
               <?php if ( !empty( $witnessai_header_right ) ): ?>
                    <div class="col-xl-3">
                        <div class="nav-right float-end d-xl-flex d-none">
                            <a href="<?php echo esc_html( $witnessai_head_btn_one_link ); ?>" class="btn-transparent-xl btn-transparent-v3"><?php echo esc_html( $witnessai_head_btn_one ); ?></a>
                            <a href="<?php echo esc_html( $witnessai_head_btn_two_link ); ?>" class="btn-fill-pill-v2 md-btn"><?php echo esc_html( $witnessai_head_btn_two ); ?><span></span></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
      </div>
   </div>
</header>
<!-- ===============  header area end =============== -->
