<?php

/**
 * Template part for displaying post_excerpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */


$post_excerpt = get_the_excerpt();
?>

<?php if(  $post_excerpt ): ?>
    <div class="blog__details_content clearfix">
        <p>
            <?php echo esc_html($post_excerpt); ?>
        </p>
    </div>
<?php endif; ?>