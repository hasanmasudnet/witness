<?php

/**
 * Breadcrumbs for Witnessai theme.
 *
 * @package     Witnessai
 * @author      wprealizer
 * @copyright   Copyright (c) 2022, wprealizer
 * @link        https://www.wprealizer.com
 * @since       Witnessai 1.0.0
 */


function witnessai_breadcrumb_func()
{
    global $post;
    $breadcrumb_class   = '';
    $breadcrumb_show    = 1;
    $title              =  __('Blog', 'witnessai');
    $header_transparent = function_exists('get_field') ? (get_field('transparent_header') == true) ? 'breadcrumb-transparent' : NULL : NULL;

    // hide breadcrumb for 404 page
    if (is_404()) {
        return;
    }

    if (is_front_page() && is_home()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'witnessai'));
        $breadcrumb_class = 'home_front_page';
    } elseif (is_front_page()) {
        $title = get_theme_mod('breadcrumb_blog_title', __('Blog', 'witnessai'));
        $breadcrumb_show = 0;
    } elseif (is_home()) {
        if (get_option('page_for_posts')) {
            $title = get_the_title(get_option('page_for_posts'));
        }
    } elseif (is_single() && 'post' == get_post_type()) {
        $title = get_the_title();
    } elseif (is_single() && 'product' == get_post_type()) {
        $title = get_theme_mod('breadcrumb_product_details', __('Shop', 'witnessai'));
    } elseif (is_search()) {
        $title = esc_html__('Search Results for : ', 'witnessai') . get_search_query();
    } elseif (is_404()) {
        $title = esc_html__('Page not Found', 'witnessai');
    } elseif (function_exists('is_woocommerce') && is_woocommerce()) {
        $title = get_theme_mod('breadcrumb_shop', __('Shop', 'witnessai'));
    } elseif (is_archive()) {
        $title = get_the_archive_title();
    } else {
        $title = get_the_title();
    }


    $_id = get_the_ID();

    if (is_single() && 'product' == get_post_type()) {
        $_id = $post->ID;
    } elseif (function_exists("is_shop") and is_shop()) {
        $_id = wc_get_page_id('shop');
    } elseif (is_home() && get_option('page_for_posts')) {
        $_id = get_option('page_for_posts');
    }

    $is_breadcrumb = function_exists('get_field') ? get_field('breadcrumb_invisibility', $_id) : '';
    if (!empty($_GET['s'])) {
        $is_breadcrumb = null;
    }

    if (empty($is_breadcrumb) && $breadcrumb_show == 1) {

        $bg_img_from_page   = function_exists('get_field') ? get_field('breadcrumb_background_image', $_id) : '';
        $hide_bg_img        = function_exists('get_field') ? get_field('hide_breadcrumb_background_image', $_id) : '';

        // get_theme_mod
        $bg_img                         = get_theme_mod('breadcrumb_bg_img');
        $witnessai_breadcrumb_shape_switch = get_theme_mod('witnessai_breadcrumb_shape_switch', false);
        $breadcrumb_switch              = get_theme_mod('breadcrumb_switch', true);

        if ($hide_bg_img && empty($_GET['s'])) {
            $bg_img = '';
        } else {
            $bg_img = !empty($bg_img_from_page) ? $bg_img_from_page['url'] : $bg_img;
        } ?>

        <!-- page title area start -->
        <?php if (!empty($breadcrumb_switch)) : ?>
            <div class="hero-area hero-become-client position-relative z-index-one bg_color_gradient_green <?php print esc_attr($breadcrumb_class);
                                                                                                            print esc_attr($header_transparent) ?>" data-background="<?php print esc_attr($bg_img); ?>">
                <div class="container container-extra-large">
                    <div class="w-100">
                        <div class="row justify-content-between align-items-end">
                            <div class="col-xl-8 col-lg-6 col-md-10">
                                <div class="hero-info hero-info-resource">
                                    <h1 class="text-white"><?php echo wp_kses_post($title); ?></h1>
                                    <?php if (function_exists('bcn_display')) {
                                        bcn_display();
                                    } ?>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 position-absolute top-0 end-0 pe-0 h-100 d-none d-lg-block">
                                <div class="hero-img text-end h-100 d-flex align-items-end justify-content-end">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/hero/resources-single-hero.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- page title area end -->
<?php
    }
}

// add_action( 'witnessai_before_main_content', 'witnessai_breadcrumb_func' );

?>