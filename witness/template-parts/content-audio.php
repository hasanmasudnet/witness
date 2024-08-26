<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */

$witnessai_audio_url = function_exists( 'get_field' ) ? get_field( 'post_format_audio_url' ) : NULL;

if ( is_single() ): ?>
    <!-- Single Post Start -->
    <article id="post-<?php the_ID();?>" <?php post_class( 'single-post' );?>>
        <!-- Single post details meta -->
        <div class="blog-list-box">
            
            <?php if ( !empty( $witnessai_audio_url ) ): ?>
            <!-- Audio player -->
            <div class="blog__post_audio w-img p-relative">
                <?php echo wp_oembed_get( $witnessai_audio_url ); ?>
            </div>
            <?php endif;?>

            <div class="blog-inner-details">
                <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
            </div>
        </div>

        <!-- Blog Details Info -->
        <div class="blog__details_content clearfix">
            <?php the_content();?>
            <?php
                wp_link_pages( [
                    'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'witnessai' ),
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                ] );
            ?>
        </div>

        <?php if( witnessai_get_tag() ): ?>
            <!-- Info Tag -->
            <div class="info-tag-wrap">
                <?php print witnessai_get_tag();?>
            </div>
            <!-- Info Tag End -->
        <?php endif; ?>
    </article>
    <!-- Single Post End -->

<?php else: ?>

    <!-- Post Loop Start -->
    <article id="post-<?php the_ID();?>" <?php post_class( 'blog_loop_item' );?>>
            <?php if ( !empty( $witnessai_audio_url ) ): ?>
                <div class="blog__post_audio w-img p-relative">
                    <?php echo wp_oembed_get( $witnessai_audio_url ); ?>
                </div>

            <?php elseif ( has_post_thumbnail() ): ?>   
                <!-- post loop thumbnail  -->
                <div class="blog__post_thumb">
                    <a href="<?php the_permalink();?>">
                        <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                    </a>
                </div>
                <!-- End post loop thumbnail  -->
            <?php endif; ?>
        
        <div class="blog_standard__disc">
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
            <h3 class="bs__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php get_template_part( 'template-parts/blog/blog-excerpt' ); ?>

            <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>
        </div>
    </article>
    <!-- Post Loop End -->
<?php endif;?>

