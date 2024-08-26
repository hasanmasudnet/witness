<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package witnessai
 */

/** 
 *
 * witnessai header
 */

function witnessai_check_header()
{
    // Display Default Header
    if (!class_exists('Witnessai_Core')) {
        get_template_part('template-parts/header/header-1');
    }
}
add_action('witnessai_header_style', 'witnessai_check_header', 10);


/**
 *
 * witnessai footer
 */
add_action('witnessai_footer_area', 'witnessai_call_default_footer', 10);

function witnessai_call_default_footer()
{

    // Display Default Footer
    if (!class_exists('Witnessai_Core')) {
        get_template_part('template-parts/footer/footer-def');
    }
}

// header logo
function witnessai_header_logo()
{ ?>
    <?php
    $witnessai_custom_logo_on = function_exists('get_field') ? get_field('is_enable_cust_logo') : NULL;
    $witnessai_logo           = get_template_directory_uri() . '/assets/images/logo-witness.png';
    $witnessai_site_logo      = get_field('site_logo', 'option');
    $witnessai_logo_max_width = get_theme_mod('logo_max_width', 180);
    $witnessai_custom_logo    = function_exists('get_field') ? get_field('custom_logo') : NULL;

    ?>

    <?php if (!empty($witnessai_custom_logo_on) && !empty($witnessai_custom_logo)) : ?>
        <a class="secondary-logo" href="<?php print esc_url(home_url('/')); ?>">
            <?php print wp_get_attachment_image($witnessai_custom_logo, 'full', '', ['class' => 'custom-logo']); ?>
        </a>
    <?php else : ?>
        <a class="standard-logo" href="<?php print esc_url(home_url('/')); ?>">
            <img src="<?php print esc_url($witnessai_site_logo); ?>" alt="<?php print esc_attr__('logo', 'witnessai'); ?>" />
        </a>
    <?php endif; ?>
<?php
}

// header logo
function witnessai_header_sticky_logo()
{ ?>
    <?php
    $witnessai_logo_black     = get_template_directory_uri() . '/assets/img/logo/logo-black.png';
    $witnessai_secondary_logo = get_theme_mod('seconday_logo', $witnessai_logo_black);
    ?>
    <a class="sticky-logo" href="<?php print esc_url(home_url('/')); ?>">
        <img src="<?php print esc_url($witnessai_secondary_logo); ?>" alt="<?php print esc_attr__('logo', 'witnessai'); ?>" />
    </a>
<?php
}

function witnessai_mobile_logo()
{
    // side info
    $witnessai_mobile_logo_hide = get_theme_mod('witnessai_mobile_logo_hide', false);
    $witnessai_site_logo        = get_theme_mod('logo', get_template_directory_uri() . '/assets/img/logo.png');

?>

    <?php if (!empty($witnessai_mobile_logo_hide)) : ?>
        <div class="side__logo mb-25">
            <a class="sideinfo-logo" href="<?php print esc_url(home_url('/')); ?>">
                <img src="<?php print esc_url($witnessai_site_logo); ?>" alt="<?php print esc_attr__('logo', 'witnessai'); ?>" />
            </a>
        </div>
    <?php endif; ?>



<?php }


/**
 * [witnessai_header_menu description]
 * @return [type] [description]
 */
function witnessai_header_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Witnessai_Navwalker_Class::fallback',
        'walker'         => new Witnessai_Navwalker_Class,
    ]);
    ?>
<?php
}

/**
 * [witnessai_header_menu description]
 * @return [type] [description]
 */
function witnessai_mobile_menu()
{
?>
    <?php
    $witnessai_menu = wp_nav_menu([
        'theme_location' => 'main-menu',
        'menu_class'     => '',
        'container'      => '',
        'menu_id'        => 'mobile-menu-active',
        'echo'           => false,
    ]);

    $witnessai_menu = str_replace("menu-item-has-children", "menu-item-has-children has-children", $witnessai_menu);
    echo
    _post($witnessai_menu);
    ?>
<?php
}

/**
 * [witnessai_search_menu description]
 * @return [type] [description]
 */
function witnessai_header_search_menu()
{
?>
    <?php
    wp_nav_menu([
        'theme_location' => 'header-search-menu',
        'menu_class'     => '',
        'container'      => '',
        'fallback_cb'    => 'Witnessai_Navwalker_Class::fallback',
        'walker'         => new Witnessai_Navwalker_Class,
    ]);
    ?>
<?php
}


// witnessai_copyright_text
function witnessai_copyright_text()
{
    return get_theme_mod('witnessai_copyright', esc_html__('© 2023 Witnessai, All Rights Reserved. Design By wprealizer', 'witnessai'));
}


/**
 *
 * pagination
 */
if (!function_exists('witnessai_pagination')) {

    function _witnessai_pagi_callback($pagination)
    {
        return $pagination;
    }

    //page navegation
    function witnessai_pagination($prev, $next, $pages, $args)
    {
        global $wp_query, $wp_rewrite;
        $menu = '';
        $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;

            if (!$pages) {
                $pages = 1;
            }
        }

        $pagination = [
            'base'      => add_query_arg('paged', '%#%'),
            'format'    => '',
            'total'     => $pages,
            'current'   => $current,
            'prev_text' => $prev,
            'next_text' => $next,
            'type'      => 'array',
        ];

        //rewrite permalinks
        if ($wp_rewrite->using_permalinks()) {
            $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
        }

        if (!empty($wp_query->query_vars['s'])) {
            $pagination['add_args'] = ['s' => get_query_var('s')];
        }

        $pagi = '';
        if (paginate_links($pagination) != '') {
            $paginations = paginate_links($pagination);
            $pagi .= '<ul>';
            foreach ($paginations as $key => $pg) {
                $pagi .= '<li>' . $pg . '</li>';
            }
            $pagi .= '</ul>';
        }

        print _witnessai_pagi_callback($pagi);
    }
}


// witnessai_kses_intermediate
function witnessai_kses_intermediate($string = '')
{
    return wp_kses($string, witnessai_get_allowed_html_tags('intermediate'));
}

function witnessai_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'b'      => [],
        'i'      => [],
        'u'      => [],
        'em'     => [],
        'br'     => [],
        'abbr'   => [
            'title' => [],
        ],
        'span'   => [
            'class' => [],
        ],
        'strong' => [],
        'a'      => [
            'href'  => [],
            'title' => [],
            'class' => [],
            'id'    => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'href' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
        $allowed_html['del'] = [
            'class' => [],
        ];
        $allowed_html['ins'] = [
            'class' => [],
        ];
        $allowed_html['bdi'] = [
            'class' => [],
        ];
        $allowed_html['i'] = [
            'class' => [],
            'data-rating-value' => [],
        ];
    }

    return $allowed_html;
}



// WP kses allowed tags
// ----------------------------------------------------------------------------------------
function witnessai_kses($raw)
{

    $allowed_tags = array(
        'a'         => array(
            'class'    => [],
            'href'     => [],
            'rel'      => [],
            'title'    => [],
            'target'   => [],
        ),
        'abbr'                      => array(
            'title' => [],
        ),
        'b'                         => [],
        'blockquote'                => array(
            'cite' => [],
        ),
        'cite'                      => array(
            'title' => [],
        ),
        'code'                      => [],
        'del'                    => array(
            'datetime'   => [],
            'title'      => [],
        ),
        'dd'                     => [],
        'div'                    => array(
            'class'   => [],
            'title'   => [],
            'style'   => [],
        ),
        'dl'                     => [],
        'dt'                     => [],
        'em'                     => [],
        'h1'                     => [],
        'h2'                     => [],
        'h3'                     => [],
        'h4'                     => [],
        'h5'                     => [],
        'h6'                     => [],
        'i'                         => array(
            'class' => [],
        ),
        'img'                    => array(
            'alt'  => [],
            'class'   => [],
            'height' => [],
            'src'  => [],
            'width'   => [],
        ),
        'li'                     => array(
            'class' => [],
        ),
        'ol'                     => array(
            'class' => [],
        ),
        'p'                         => array(
            'class' => [],
        ),
        'q'                         => array(
            'cite'    => [],
            'title'   => [],
        ),
        'span'                      => array(
            'class'   => [],
            'title'   => [],
            'style'   => [],
        ),
        'iframe'                 => array(
            'width'         => [],
            'height'     => [],
            'scrolling'     => [],
            'frameborder'   => [],
            'allow'         => [],
            'src'        => [],
        ),
        'strike'                 => [],
        'br'                     => [],
        'strong'                 => [],
        'data-wow-duration'            => [],
        'data-wow-delay'            => [],
        'data-wallpaper-options'       => [],
        'data-stellar-background-ratio'   => [],
        'ul'                     => array(
            'class' => [],
        ),
        'svg' => array(
            'class' => true,
            'aria-hidden' => true,
            'aria-labelledby' => true,
            'role' => true,
            'xmlns' => true,
            'width' => true,
            'height' => true,
            'viewbox' => true, // <= Must be lower case!
        ),
        'g'     => array('fill' => true),
        'title' => array('title' => true),
        'path'  => array('d' => true, 'fill' => true,),
    );

    if (function_exists('wp_kses')) { // WP is here
        $allowed = wp_kses($raw, $allowed_tags);
    } else {
        $allowed = $raw;
    }

    return $allowed;
}

/**
 * 
 * Remove [...] $more content from wp post excerpt
 * 
 * @link:https://developer.wordpress.org/reference/hooks/excerpt_more/
 */

function witnessai_excerpt_more($more)
{
    return '..';
}
add_filter('excerpt_more', 'witnessai_excerpt_more');

function custom_excerpt_length($excerpt, $length)
{
    if (is_admin()) {
        return $excerpt;
    }

    $length = 40; // Change this number to the desired word count
    $excerpt = wp_trim_words($excerpt, $length);

    return $excerpt;
}
add_filter('wp_trim_excerpt', 'custom_excerpt_length', 10, 2);


// Add cusror to wp_footer
// ----------------------------------------------------------------------------------------
function witnessai_custom_cursor()
{
    // Kirki options
    $cursosr_switch = get_theme_mod('cursor_style_setting');

    if ($cursosr_switch != false) {
        echo '<div class="cursor"></div>';
    }
}
add_action('wp_footer', 'witnessai_custom_cursor');


/**
 * **
 * Registering Team
 */
function unlock_register_cpt()
{

    /**
     * Post Type: Teams.
     */

    $team_labels = [
        "name" => esc_html__("Teams", "textdomain"),
        "singular_name" => esc_html__("Team", "textdomain"),
    ];

    $team_args = [
        "label" => esc_html__("Teams", "textdomain"),
        "labels" => $team_labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "team", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("team", $team_args);


    /**
     * Post Type: Job.
     */

    $job_labels = [
        "name" => esc_html__("Job", "textdomain"),
        "singular_name" => esc_html__("Job", "textdomain"),
    ];

    $job_args = [
        "label" => esc_html__("Jobs", "textdomain"),
        "labels" => $job_labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => ["slug" => "job", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "excerpt"],
        "show_in_graphql" => false,
    ];

    register_post_type("job", $job_args);
}

add_action('init', 'unlock_register_cpt');

/**
 *
 * Add custom option pages
 *
 * @since  1.0.0
 * @param  acf_add_options_page is a function from ACf
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'position' => '30',
        'icon_url' => 'dashicons-clipboard',
        'redirect'      => false
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Global Section',
        'menu_title'    => 'Global',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
}
