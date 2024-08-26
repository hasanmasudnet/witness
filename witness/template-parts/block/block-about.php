<?php /* Block Name: About Us Block; dev: Jahid */ ?>

<?php
$section_title = get_field('section_title');
$content = get_field('content');
$button = get_field('button');

?>

<!-- About -->
<section class="about-area bg-info-ai section-margin-bottom" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/about-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about-box d-flex flex-column flex-md-row">
                    <?php if (!empty($section_title)) : ?>
                        <div class="about-title flex-shrink-0">
                            <h2 class="text_white"><?php echo esc_html($section_title) ?></h2>
                        </div>
                    <?php endif; ?>

                    <div class="about-info">
                        <?php
                        // content
                        (!empty($content)) ? printf('<p>%s</p>',  wp_kses($content, true)) : '';

                        if ($button) {
                            $btn_url    = $button['url'];
                            $btn_title  = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>

                            <a class="common-btn black mt-4  wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1000ms" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>"> <?php echo esc_html($btn_title); ?></a>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About End -->