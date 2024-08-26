<?php /* Block Name: About Company Block; dev: Jahid */ ?>

<?php
$top_desc = get_field('top_desc');
$title = get_field('bottom_title');
$bottom_desc = get_field('bottom_desc');

?>

<!-- CAreer Cta -->

<div class="career-cta-area section-padding-top section-padding-bottom bg_black position-relative z-index-one">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (!empty($top_desc)) : ?>
                <div class="col-lg-8 text-center">
                    <?php
                    // Top Content
                    (!empty($top_desc)) ? printf('<p class="p2 text_white">%s</p>',  wp_kses($top_desc, true)) : '';
                    ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($title) || !empty($bottom_desc)) : ?>
                <div class="col-lg-12 mt-4 mt-lg-5 mb-4 mb-lg-5">
                    <img class="w-100" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-divider.svg" alt="">
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if (!empty($title) || !empty($bottom_desc)) : ?>
                <div class="col-lg-7 col-md-11">
                    <div class="about-cta-info">
                        <?php
                        // title
                        (!empty($title)) ? printf('<h4 class="text_white mb-3">%s</h4>', esc_html($title)) : '';

                        // content
                        (!empty($bottom_desc)) ? printf('<p class="text_white">%s</p>',  wp_kses($bottom_desc, true)) : '';
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <img class="position-absolute end-0 bottom-0 about-bg-cta d-none d-md-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/about-bg.svg" alt="">
</div>

<!-- CAreer Cta End -->