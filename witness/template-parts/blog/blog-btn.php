<?php

/**
 * Template part for displaying post btn
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */

$witnessai_blog_btn = get_theme_mod( 'witnessai_blog_btn', 'Read More' );
$witnessai_blog_btn_switch = get_theme_mod( 'witnessai_blog_btn_switch', true );
?>

<?php if ( !empty( $witnessai_blog_btn_switch ) ): ?>
    <div class="blog__btn">
        <a href="<?php the_permalink();?>"><?php print esc_html( $witnessai_blog_btn );?> <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </a>
    </div>
<?php endif;?>