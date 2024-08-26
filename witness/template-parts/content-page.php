<div class="theme-page-post">
<?php
    the_content();
    wp_link_pages( [
        'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'witnessai' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ] );

    if ( comments_open() || get_comments_number() ):
        comments_template();
    endif;
?>
</div>