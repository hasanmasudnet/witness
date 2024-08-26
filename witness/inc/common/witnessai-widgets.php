<?php 

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function witnessai_widgets_init() {

    /**
     * Sidebar sidebar
     */
    register_sidebar( [
        'name'          => esc_html__( 'Blog Sidebar', 'witnessai' ),
        'id'            => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="sidebar-widget widget mb-60 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="sidebar-title"><h3 class="sidebar__sidebar-title">',
        'after_title'   => '</h3></div>',
    ] );

    $footer_widgets = get_theme_mod( 'footer_widget_number', 4 );

    // footer default
    for ( $num = 1; $num <= $footer_widgets; $num++ ) {
        register_sidebar( [
            'name'          => sprintf( esc_html__( 'Footer %1$s', 'witnessai' ), $num ),
            'id'            => 'footer-' . $num,
            'description'   => sprintf( esc_html__( 'Footer %1$s', 'witnessai' ), $num ),
            'before_widget' => '<div id="%1$s" class="footer-widget widget footer-col-'.$num.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="footer-sidebar-title">',
            'after_title'   => '</h3>',
        ] );
    }

}
add_action( 'widgets_init', 'witnessai_widgets_init' );