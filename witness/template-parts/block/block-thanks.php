<?php /* Block Name: Thank You Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$content = get_field('content');
$button = get_field('button');
$image = get_field('image');

?>


<!-- Report -->
<?php
$use_alternate_gradient = get_field('use_alternate_gradient');

$background_style = $use_alternate_gradient
    ? 'background:linear-gradient(270deg, #F99E23 -1.51%, #000 50.7%);'
    : 'background:linear-gradient(270deg, #759D9E -1.51%, #000 50.7%);';

?>
<section class="report-area section-padding-top section-padding-bottom" style="<?php echo esc_attr($background_style); ?>">
    <div class="container">
        <div class="row align-items-end gx-xl-5 gy-4">
            <div class="col-lg-5">
                <div class="report-img-wrap text-center text-lg-end">
                    <!-- Image -->
                    <?php echo wp_get_attachment_image($image, 'full', false, array('class' => '')) ?>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="breadcrumb-info breadcrumb-info-download text-center text-lg-start pt-lg-5">
                    <?php
                    // title
                    $title ? printf('<h2 class="text-white h1">%1$s</h2>', $title) : '';

                    // content
                    // $content ? printf('<p class="text-white download-desc mt-2">%1$s</p>', $content) : '';
                    ?>
                    <p class="text-white download-desc mt-2">
                        <?php echo do_shortcode($content); ?>
                    </p>
                    <?php

                    // button
                    if ($button) {
                        $btn_url    = $button['url'];
                        $btn_title  = $button['title'];
                        $btn_target = $button['target'] ? $button['target'] : '';
                    ?>
                        <a class="common-btn text-hover mt-4 " href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                            <?php echo esc_html($btn_title); ?>
                        </a>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

    <?php if (have_rows('platform_items')): ?>
        <div class="container container-extra-large-two section-margin-top">
            <div class="row platform-divider position-relative gy-4">
                <?php while (have_rows('platform_items')): the_row(); ?>
                    <div class="col-lg-6">
                        <div class="platform-info text-center">
                            <?php
                            // Sanitize and escape text content
                            $platform_text = esc_html(get_sub_field('platform_text'));
                            $platform_link = esc_url(get_sub_field('platform_link'));
                            $platform_link_text = esc_html(get_sub_field('platform_link_text'));
                            ?>
                            <p class="text_white"><?php echo $platform_text; ?></p>
                            <a class="text-decoration-underline platform-btn mt-2 mt-lg-4 d-inline-block" href="<?php echo $platform_link; ?>">
                                <?php echo $platform_link_text; ?>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>

</section>

<!-- Report End -->