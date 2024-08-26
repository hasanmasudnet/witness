<?php /* Block Name: Featured Resource Block; dev: Jahid */ ?>

<?php
$section_title = get_field('section_title');
$featured_posts = get_field('featured_posts');

?>

<!-- Resource -->

<div class="resource-area section-margin-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($section_title)) : ?>
                    <div class="title-border">
                        <h6 class="h6"><?php echo esc_html($section_title) ?></h6>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($featured_posts) : ?>
            <div class="row gx-xl-5 gy-4 align-items-lg-end">
                <?php
                foreach ($featured_posts as $featured_post) :
                    $permalink = get_permalink($featured_post->ID);
                    $title = get_the_title($featured_post->ID);
                    $content = get_the_excerpt($featured_post->ID);
                    $image = the_post_thumbnail($featured_post->ID);
                    $custom_field = get_field('field_name', $featured_post->ID);
                    // thumbnail image
                    $thumb_id = function_exists('get_field') ? !empty(get_field('resource_thum', $featured_post->ID)) ? get_field('resource_thum', $featured_post->ID) : NULL : NULL;

                ?>
                    <div class="col-md-6">
                        <div class="resource-img">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <?php echo wp_get_attachment_image($thumb_id, 'full', '', ['class' => 'w-100']); ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="resource-info">
                            <h4 class="resource-title"><?php echo esc_html($title); ?></h4>
                            <p><?php echo esc_html($content); ?></p>
                            <a class="common-btn" href="<?php echo esc_url($permalink); ?>">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Resource End -->