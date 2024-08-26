<?php



/**
 * witnessai_scripts description
 * @return [type] [description]
 */
function witnessai_scripts()
{

    // Load Elementor assets for front end  if elementor installed
    if (class_exists('\Elementor\Plugin')) {
        $elementor = \Elementor\Plugin::instance();
        $elementor->frontend->enqueue_styles();
    }

    if (class_exists('\ElementorPro\Plugin')) {
        $elementor_pro = \ElementorPro\Plugin::instance();
        $elementor_pro->enqueue_styles();
    }

    // wp_enqueue_style( 'witnessai-fonts', witnessai_fonts_url(), array(), '1.0.0' );

    /**
     * Load CSS fiels
     *  */


    wp_enqueue_style('bootstrap', WITNESSAI_THEME_CSS_DIR . 'plugins/bootstrap.min.css', [], time());

    // Dependency Style
    /* == bootstrap icon == */
    wp_enqueue_style('boostrap-icon', WITNESSAI_THEME_CSS_DIR . 'plugins/bootstrap-icons.css', [], time());
    /* == magnific popup == */
    wp_enqueue_style('magnific-popup', WITNESSAI_THEME_CSS_DIR . 'plugins/magnific-popup.css', [], time());
    /* == meanmenu == */
    wp_enqueue_style('meanmenu', WITNESSAI_THEME_CSS_DIR . 'plugins/meanmenu.min.css', [], time());
    /* == Odometer == */
    wp_enqueue_style('odometer', WITNESSAI_THEME_CSS_DIR . 'plugins/odometer.css', [], time());
    /* == Select 2 == */
    wp_enqueue_style('selecttwo', WITNESSAI_THEME_CSS_DIR . 'plugins/select2.css', [], time());
    /* == Select 2 == */
    wp_enqueue_style('animatewow', WITNESSAI_THEME_CSS_DIR . 'plugins/animate.css', [], time());
    /* == MAin == */
    wp_enqueue_style('main-style', WITNESSAI_THEME_CSS_DIR . '/style.css', [], time());
    wp_enqueue_style('witnessai-style', get_stylesheet_uri());

    /**
     * Load JS fiels
     *  */

    /* Bootstrap JS */
    wp_enqueue_script('bootstrap-bundle', WITNESSAI_THEME_JS_DIR . 'bootstrap.bundle.min.js', [], '', true);
    /* Magnific Popup JS */
    wp_enqueue_script('magnific-popup', WITNESSAI_THEME_JS_DIR . 'jquery.magnific-popup.min.js', ['jquery'], '', true);
    /* Odometer JS */
    wp_enqueue_script('odometer', WITNESSAI_THEME_JS_DIR . 'odometer.min.js', ['jquery'], '', true);
    /* Odometer JS */
    wp_enqueue_script('viewport-jquery', WITNESSAI_THEME_JS_DIR . 'viewport.jquery.js', ['jquery'], '', true);
    /* select2 JS */
    wp_enqueue_script('selecttwo-jquery', WITNESSAI_THEME_JS_DIR . 'select2.js', ['jquery'], '', true);
    /* select2 JS */
    wp_enqueue_script('wow-jquery', WITNESSAI_THEME_JS_DIR . 'wow.min.js', ['jquery'], '', true);
    /* Odometer JS */
    wp_enqueue_script('meanmenu', WITNESSAI_THEME_JS_DIR . 'jquery.meanmenu.min.js', ['jquery'], '', true);

    /** Resouces */
    if (is_page('resource') || is_page('resources')) {
        wp_enqueue_script('resource-ajax', WITNESSAI_THEME_JS_DIR . 'resource-ajax.js', ['jquery'], time(), true);

        $resource_ajax_arg = [
            'url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('resource-filter')
        ];
        wp_localize_script('resource-ajax', 'rec_ajax', $resource_ajax_arg);
    }
    wp_enqueue_script('witnessai-main', WITNESSAI_THEME_JS_DIR . 'main.js', ['jquery'], time(), true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'witnessai_scripts');


/*
Register Fonts
 */
function witnessai_fonts_url()
{
    $font_url = '';

    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Google font: on or off', 'witnessai')) {
        // $font_url = 'https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700&family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,700&display=swap';
    }
    return $font_url;
}

/**
 * Enqueue Editor assets.
 */
function unlocklive_editor_style()
{
    wp_enqueue_style(
        'default-guternberg',
        get_template_directory_uri() . '/assets/css/editor-styles.css'
    );
}
add_action('enqueue_block_editor_assets', 'unlocklive_editor_style');
