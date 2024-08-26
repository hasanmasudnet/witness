<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */


//  Get Video URL if exist
$witnessai_video_url = function_exists( 'get_field' ) ? get_field( 'post_format_video_url' ) : NULL;


if ($witnessai_video_url != null && strpos($witnessai_video_url, 'https://www.youtube.com/watch') === 0) {
    // Get the query string from the URL
    $queryString = parse_url($witnessai_video_url, PHP_URL_QUERY);
  
    // Parse the query string and get the 'v' parameter value
    parse_str($queryString, $queryParams);
    $videoId = $queryParams['v'];
  } elseif($witnessai_video_url != null) {
    // Extract the video ID from the URL
    $videoId = substr(parse_url($witnessai_video_url, PHP_URL_PATH), 1);
  }



if ( is_single() ) : ?>

    </article>
    <!-- Single Post End -->

    <!-- Single Post Start -->
    <article id="post-<?php the_ID();?>" <?php post_class( 'single-post' );?>>

    <?php if( isset($videoId) && $videoId != '' ): ?>
        <div class="blog__post_video overflow-hidden">
            <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php print esc_attr( $videoId ); ?>"></div>
        </div>
    <?php elseif( has_post_thumbnail() ): ?>
        <!-- post loop thumbnail  -->
        <div class="blog__post_thumb overflow-hidden">
            <a href="<?php the_permalink();?>">
                <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
            </a>
        </div>
        <!-- End post loop thumbnail  -->
    <?php endif; ?>

    <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>

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
    <!-- .Blog Details Info -->

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

        <?php if( isset($videoId) && $videoId != '' ): ?>
            <div class="blog__post_thumb">
                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo esc_attr ( $videoId ); ?>"></div>
            </div>
        <?php elseif( has_post_thumbnail() ): ?>
            <!-- post loop thumbnail  -->
            <div class="blog__post_thumb">
                <a href="<?php the_permalink();?>">
                    <?php the_post_thumbnail( 'full', ['class' => 'img-responsive'] );?>
                </a>
            </div>
            <!-- End post loop thumbnail  -->
        <?php elseif( witnessai_embedded_media( ['video', 'iframe' ])  ):
                echo witnessai_embedded_media( ['video', 'iframe' ] );
        endif;
        ?>
        
        <div class="blog_standard__disc">
            <?php get_template_part( 'template-parts/blog/blog-meta' ); ?>
            <h3 class="bs__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <?php get_template_part( 'template-parts/blog/blog-excerpt' ); ?>

            <?php get_template_part( 'template-parts/blog/blog-btn' ); ?>
        </div>
    </article>
    <!-- Post Loop End -->
<?php endif;?>
