<?php

function witnessai_block_setup()
{
    // add support for editor style
    add_theme_support('editor-styles');

    add_editor_style(WITNESSAI_THEME_CSS_DIR . 'plugins/bootstrap.min.css');
    add_editor_style(WITNESSAI_THEME_CSS_DIR . 'style.css');
}
add_action('after_setup_theme', 'witnessai_block_setup');


/*** Guttenberg Block Custom Category ******/

function custom_category($cat, $post)
{
    return array_merge(
        $cat,
        [
            [
                'slug' => 'unlocklive',
                'title' => __('Witnessai By Unlocklive', 'witnessai'),
            ],
        ]
    );
}
add_filter('block_categories', 'custom_category', 10, 2);


/* Loading ACF into Gutenberg */
function acf_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/template-parts/block/{$slug}.php"))) {
        include(get_theme_file_path("/template-parts/block/{$slug}.php"));
    }
}

// Registering ACF Blocks
add_action('acf/init', 'witnessai_acf_init');
if (!function_exists('witnessai_acf_init')) {
    function witnessai_acf_init()
    {
        if (function_exists('acf_register_block')) {

            /**
             * Dev Noman
             */
            acf_register_block([
                'name'      => 'block-hero',
                'title'     => __('Hero', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'cover-image',
                'keywords' => ['hero']
            ]);

            // Our Solution
            acf_register_block([
                'name'      => 'block-our-solution',
                'title'     => __('Our Solution', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'yes-alt',
                'keywords' => ['solution']
            ]);

            acf_register_block([
                'name'      => 'block-recourse',
                'title'     => __('Recourse', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'yes-alt',
                'keywords' => ['solution']
            ]);

            acf_register_block([
                'name'      => 'block-video',
                'title'     => __('Video', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'yes-alt',
                'keywords' => ['video']
            ]);

            acf_register_block([
                'name'      => 'block-graphics-banner',
                'title'     => __('Banner With Graphics', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'yes-alt',
                'keywords' => ['banner', 'graphics']
            ]);

            /**
             * Dev Jahid
             */
            // Featured Resource
            acf_register_block([
                'name'      => 'block-featured',
                'title'     => __('Featured Resource', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'feedback',
                'keywords' => ['featured', 'resource']
            ]);
            // About Us
            acf_register_block([
                'name'      => 'block-about',
                'title'     => __('About Us', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'portfolio',
                'keywords' => ['about', 'us']
            ]);
            // Products
            acf_register_block([
                'name'      => 'block-products',
                'title'     => __('Product Listing', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'list-view',
                'keywords' => ['product', 'listing', 'ai']
            ]);
            // Breadcrumb
            acf_register_block([
                'name'      => 'block-breadcrumb',
                'title'     => __('Breadcrumb', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'images-alt',
                'keywords' => ['breadcrumb', 'cover']
            ]);
            // Career Post
            acf_register_block([
                'name'      => 'block-career-post',
                'title'     => __('Career Post', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'admin-post',
                'keywords' => ['career', 'job']
            ]);
            // CTA
            acf_register_block([
                'name'      => 'block-cta',
                'title'     => __('CTA', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'media-text',
                'keywords' => ['cta']
            ]);
            // Google Map
            acf_register_block([
                'name'      => 'block-map',
                'title'     => __('Map Iframe', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'media-code',
                'keywords' => ['map', 'iframe']
            ]);
            // Contact Form
            acf_register_block([
                'name'      => 'block-form',
                'title'     => __('Contact Form', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'shortcode',
                'keywords' => ['contact', 'form']
            ]);
            // About Company
            acf_register_block([
                'name'      => 'block-about-company',
                'title'     => __('About Company', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'groups',
                'keywords' => ['about', 'company']
            ]);
            // Investors
            acf_register_block([
                'name'      => 'block-investors',
                'title'     => __('Investors', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'money',
                'keywords' => ['investors', 'newsletter']
            ]);
            // Inner Newsletter
            acf_register_block([
                'name'      => 'block-newsletter',
                'title'     => __('Newsletter', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'buddicons-pm',
                'keywords' => ['newsletter', 'news', 'form']
            ]);
            // Heading
            acf_register_block([
                'name'      => 'block-heading',
                'title'     => __('Heading', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'text',
                'keywords' => ['heading', 'text']
            ]);
            // Resource Hero
            acf_register_block([
                'name'      => 'block-hero-roesource',
                'title'     => __('Hero Resource', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'images-alt',
                'keywords' => ['resource', 'cover', 'hero']
            ]);
            // Usage Policies
            acf_register_block([
                'name'      => 'block-usage-policies',
                'title'     => __('Usage Policies', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'images-alt',
                'keywords' => ['usage', 'policies', 'observe']
            ]);
            // Demo Items
            acf_register_block([
                'name'      => 'block-demo-items',
                'title'     => __('Demo Items', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'unlocklive',
                'icon' => 'images-alt',
                'keywords' => ['demo', 'labtop', 'observe']
            ]);
            // Webinar Form
            acf_register_block([
                'name'      => 'block-webinar-form',
                'title'     => __('Webinar Form', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'witness',
                'icon' => 'images-alt',
                'keywords' => ['webinar', 'form', 'contact']
            ]);
            // Thank you
            acf_register_block([
                'name'      => 'block-thanks',
                'title'     => __('Thank You', 'witnessai'),
                'render_callback' => 'acf_block_render_callback',
                'category' =>  'witness',
                'icon' => 'images-alt',
                'keywords' => ['webinar', 'form', 'thanks']
            ]);
        }
    }
}
