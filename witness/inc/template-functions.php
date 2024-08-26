<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package witnessai
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function witnessai_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if ( !is_singular() ) {
        $classes[] = 'hfeed';
    }
    // Adds a class of no-sidebar when there is no sidebar present.
    if ( !is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'no-sidebar';
    }
    if (  function_exists('tutor') ) {
        $user_name = sanitize_text_field(get_query_var('tutor_student_username'));
        $get_user = tutor_utils()->get_user_by_login($user_name);
    }

    if ( !empty($get_user) ) {
        $classes[] = 'profile-breadcrumb';
    }

    return $classes;
}
add_filter( 'body_class', 'witnessai_body_classes' );

/**
 * Get tags.
 */
function witnessai_get_tag() {
    $html = '';
    if ( has_tag() ) {
        
        $title = count(wp_get_post_terms(get_the_ID(), 'post_tag')) > 1 ? esc_html__( 'Post Tags : ', 'witnessai' ) : esc_html__( 'Post Tag : ', 'witnessai' );
        $html .= '<div class="tag-list"><span>' . $title . '</span>';
        $html .= get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
        $html .= '</div>';
    }
    return $html;
}

/**
 * Get categories.
 */
function witnessai_get_category() {

    $categories = get_the_category( get_the_ID() );
    $x = 0;
    foreach ( $categories as $category ) {

        if ( $x == 2 ) {
            break;
        }
        $x++;
        print '<a class="news-tag" href="' . get_category_link( $category->term_id ) . '">' . $category->cat_name . '</a>';

    }
}

/** img alt-text **/
function witnessai_img_alt_text( $img_er_id = null ) {
    $image_id = $img_er_id;
    $image_alt = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
    $image_title = get_the_title( $image_id );

    if ( !empty( $image_id ) ) {
        if ( $image_alt ) {
            $alt_text = get_post_meta( $image_id, '_wp_attachment_image_alt', false );
        } else {
            $alt_text = get_the_title( $image_id );
        }
    } else {
        $alt_text = esc_html__( 'Image Alt Text', 'witnessai' );
    }

    return $alt_text;
}

// witnessai_ofer_sidebar_func
function witnessai_offer_sidebar_func() {
    if ( is_active_sidebar( 'offer-sidebar' ) ) {

        dynamic_sidebar( 'offer-sidebar' );
    }
}
add_action( 'witnessai_offer_sidebar', 'witnessai_offer_sidebar_func', 20 );

// witnessai_service_sidebar
function witnessai_service_sidebar_func() {
    if ( is_active_sidebar( 'services-sidebar' ) ) {

        dynamic_sidebar( 'services-sidebar' );
    }
}
add_action( 'witnessai_service_sidebar', 'witnessai_service_sidebar_func', 20 );

// witnessai_portfolio_sidebar
function witnessai_portfolio_sidebar_func() {
    if ( is_active_sidebar( 'portfolio-sidebar' ) ) {

        dynamic_sidebar( 'portfolio-sidebar' );
    }
}
add_action( 'witnessai_portfolio_sidebar', 'witnessai_portfolio_sidebar_func', 20 );

// witnessai_faq_sidebar
function witnessai_faq_sidebar_func() {
    if ( is_active_sidebar( 'faq-sidebar' ) ) {

        dynamic_sidebar( 'faq-sidebar' );
    }
}
add_action( 'witnessai_faq_sidebar', 'witnessai_faq_sidebar_func', 20 );


/**
 * Add span in wp list category items
 */
add_filter('wp_list_categories', 'add_span_in_archive_cat_list_widget');
function add_span_in_archive_cat_list_widget($links) {
  $links = str_replace('</a> (', '</a> <span class="count">(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

/**
 * Add span in wp archive list items
 */
add_filter('get_archives_link', 'add_span_in_archive_link_widget');
function add_span_in_archive_link_widget($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}