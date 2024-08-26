<?php

/**
 * witnessai functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package witnessai
 */

if (!function_exists('witnessai_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function witnessai_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on witnessai, use a find and replace
         * to change 'witnessai' to the name of your theme in all the template files.
         */
        load_theme_textdomain('witnessai', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'main-menu' => esc_html__('Main Menu', 'witnessai'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('witnessai_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        //Enable custom header
        add_theme_support('custom-header');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ]);

        /**
         * Enable suporrt for Post Formats
         *
         * see: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', [
            'image',
            'audio',
            'video',
            'gallery',
            'quote',
        ]);

        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

        // remove_theme_support( 'widgets-block-editor' );

        add_image_size('witnessai-case-details', 1170, 600, ['center', 'center']);
    }
endif;
add_action('after_setup_theme', 'witnessai_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function witnessai_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('witnessai_content_width', 640);
}
add_action('after_setup_theme', 'witnessai_content_width', 0);



/**
 * Enqueue scripts and styles.
 */

define('WITNESSAI_THEME_DIR', get_template_directory());
define('WITNESSAI_THEME_URI', get_template_directory_uri());
define('WITNESSAI_THEME_CSS_DIR', WITNESSAI_THEME_URI . '/assets/css/');
define('WITNESSAI_THEME_JS_DIR', WITNESSAI_THEME_URI . '/assets/js/');
define('WITNESSAI_THEME_INC', WITNESSAI_THEME_DIR . '/inc/');



// wp_body_open
if (!function_exists('wp_body_open')) {
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
}

/**
 * Implement the Custom Header feature.
 */
require WITNESSAI_THEME_INC . 'custom-header.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require WITNESSAI_THEME_INC . 'template-functions.php';

/**
 * Custom template helper function for this theme.
 */
require WITNESSAI_THEME_INC . 'template-helper.php';

/**
 * initialize kirki customizer class.
 */
// include_once WITNESSAI_THEME_INC . 'kirki-customizer.php';
// include_once WITNESSAI_THEME_INC . 'class-witnessai-kirki.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require WITNESSAI_THEME_INC . 'jetpack.php';
}


/**
 * include witnessai functions file
 */
require_once WITNESSAI_THEME_INC . 'class-navwalker.php';
require_once WITNESSAI_THEME_INC . 'class-tgm-plugin-activation.php';
require_once WITNESSAI_THEME_INC . 'add_plugin.php';
require_once WITNESSAI_THEME_INC . '/common/witnessai-breadcrumb.php';
require_once WITNESSAI_THEME_INC . '/common/witnessai-scripts.php';
require_once WITNESSAI_THEME_INC . '/common/witnessai-widgets.php';

// block
require_once WITNESSAI_THEME_INC . '/common/acf_blocks.php';

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function witnessai_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'witnessai_pingback_header');

// change textarea position in comment form
// ----------------------------------------------------------------------------------------
function witnessai_move_comment_textarea_to_bottom($fields)
{
    $comment_field       = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter('comment_form_fields', 'witnessai_move_comment_textarea_to_bottom');


// witnessai_comment 
if (!function_exists('witnessai_comment')) {
    function witnessai_comment($comment, $args, $depth)
    {
        $GLOBAL['comment'] = $comment;
        extract($args, EXTR_SKIP);
        $args['reply_text'] = 'Reply';
        $replayClass = 'comment-depth-' . esc_attr($depth);
?>
        <li id="comment-<?php comment_ID(); ?>">
            <div class="comments-box">
                <div class="comments-avatar">
                    <?php print get_avatar($comment, 102, null, null, ['class' => []]); ?>
                </div>
                <div class="comments-text">
                    <div class="avatar-name">
                        <h5><?php print get_comment_author_link(); ?></h5>
                        <span><?php comment_time(get_option('date_format')); ?></span>
                    </div>
                    <?php comment_text(); ?>

                    <div class="comments-replay">
                        <?php comment_reply_link(array_merge($args, ['depth' => $depth, 'max_depth' => $args['max_depth']])); ?>
                    </div>

                </div>
            </div>
        <?php
    }
}


/**
 * shortcode supports for removing extra p, spance etc
 *
 */
add_filter('the_content', 'witnessai_shortcode_extra_content_remove');
/**
 * Filters the content to remove any extra paragraph or break tags
 * caused by shortcodes.
 *
 * @since 1.0.0
 *
 * @param string $content  String of HTML content.
 * @return string $content Amended string of HTML content.
 */
function witnessai_shortcode_extra_content_remove($content)
{

    $array = [
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']',
    ];
    return strtr($content, $array);
}

// witnessai_search_filter_form
if (!function_exists('witnessai_search_filter_form')) {
    function witnessai_search_filter_form($form)
    {

        $form = sprintf(
            '<form class="sidebar-search position-relative overflow-hidden mt-2" action="%s">
            <input type="text value="%s" required name="s" placeholder="%s">
            <button type="submit" class="position-absolute h-100 top-0 end-0 d-flex align-items-center justify-content-center text-white wp-block-search__button"><i class="bi bi-search"></i></button></form>',
            esc_url(home_url('/')),
            esc_attr(get_search_query()),
            esc_html__('Search', 'witnessai')
        );

        return $form;
    }
    add_filter('get_search_form', 'witnessai_search_filter_form');
}

add_action('admin_enqueue_scripts', 'witnessai_admin_custom_scripts');

function witnessai_admin_custom_scripts()
{
    wp_enqueue_media();
    wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css', array());
    wp_register_script('witnessai-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
    wp_enqueue_script('witnessai-admin-custom');
}



function witnessai_embedded_media($type = array())
{
    $content = do_shortcode(apply_filters('the_content', get_the_content()));
    $embed   = get_media_embedded_in_content($content, $type);


    if (in_array('audio', $type)) {
        if (count($embed) > 0) {
            $output = str_replace('?visual=true', '?visual=false', $embed[0]);
        } else {
            $output = '';
        }
    } else {
        if (count($embed) > 0) {
            $output = $embed[0];
        } else {
            $output = '';
        }
    }
    return $output;
}

if (! function_exists('printr')) {
    function printr($arr, $exit = false)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        if ($exit == true) {
            exit;
        }
    }
}


/**
 *
 * resource filter Ajax trigger 
 *
 * @since  1.0.0
 */
add_action("wp_ajax_resource_filter_callback", "resource_filter_callback");
add_action("wp_ajax_nopriv_resource_filter_callback", "resource_filter_callback");

function resource_filter_callback()
{

    $nonce = $_REQUEST['nonce'];
    if (wp_verify_nonce($nonce, 'resource-filter') != true) {
        return;
    }

    $paged = isset($_REQUEST['page']) ? sanitize_text_field($_REQUEST['page']) : 1;
    $search_string = isset($_REQUEST['search']) ? sanitize_text_field($_REQUEST['search']) : false;
    $resource_post_args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => get_option('posts_per_page'),
        'tax_query' => ['relation' => 'AND'],
        'paged' => $paged
    ];

    if (!empty($search_string)) {
        $resource_post_args['s'] = $search_string;
    }

    $get_topic_term = (sanitize_text_field($_REQUEST['f_topic'])) ? explode(',', sanitize_text_field($_REQUEST['f_topic'])) : null;
    if ($get_topic_term != null && count($get_topic_term) > 0) {
        $resource_post_args['tax_query'][] = [
            'taxonomy' => 'post_tag',
            'field'     => 'slug',
            'terms' => $get_topic_term
        ];
    }

    $get_cat_term = (sanitize_text_field($_REQUEST['f_cat'])) ? explode(',', sanitize_text_field($_REQUEST['f_cat'])) : null;
    if ($get_cat_term != null && count($get_cat_term) > 0) {
        $resource_post_args['tax_query'][] = [
            'taxonomy' => 'category',
            'field'     => 'slug',
            'terms' => $get_cat_term
        ];
    }

    // assign selected recourse
    $resource_posts = sanitize_text_field($_REQUEST['selected_res']);

    if (!empty($resource_posts)) {
        $resource_posts = explode(",", $resource_posts);
        $resource_post_args['post__in'] = $resource_posts;
    }

    $resource_query = new WP_Query($resource_post_args);
    $_post = [];

    if ($resource_query->have_posts()) {
        while ($resource_query->have_posts()) {
            $resource_query->the_post();
            ob_start();
            get_template_part('template-parts/content-resource');
            $_post[] = ob_get_clean();
        }
        wp_reset_postdata();
    }
    wp_send_json(['max_num_page' => $resource_query->max_num_pages, 'posts' => $_post, 'query' => $resource_post_args, 'qq' => $resource_posts]);

    die();
}

add_filter('wpcf7_autop_or_not', '__return_false');


add_action('wp_footer', function () {

    $form_id = class_exists('ACF') && ! empty(get_field('select_webinar_form', 'option')) ? get_field('select_webinar_form', 'option') : '';
    $url     = site_url('thank-you-webinar');
        ?>
        <script>
            var wpcf7Elm = document.querySelector('.wpcf7');

            if (wpcf7Elm != null) {
                wpcf7Elm.addEventListener('wpcf7submit', function(event) {

                    if (
                        event.detail.contactFormId == <?php echo $form_id ?> &&
                        event.detail.inputs[0].value != ''
                    ) {
                        window.location.href = '<?php echo $url ?>' + '?user-name=' + event.detail.inputs[0].value
                    }
                }, false);
            }
        </script>
    <?php
});

function display_user_name_shortcode()
{

    // check if editor mode

    // Check if 'user_name' is present in the URL
    if (isset($_GET['user-name']) && ! empty($_GET['user-name'])) {
        // Sanitize the user_name parameter to ensure it's safe
        $user_name = sanitize_text_field($_GET['user-name']);

        return esc_html($user_name);
    }
}

// Register the shortcode
add_shortcode('display_user_name', 'display_user_name_shortcode');
