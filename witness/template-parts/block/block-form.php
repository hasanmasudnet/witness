<?php /* Block Name: Contact Form Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$sub_title = get_field('sub_title');
$content = get_field('desc');

?>

<!-- Form -->

<div class="ct-form-area section-margin-top section-margin-bottom">
    <div class="container">
        <div class="row">
            <?php if (!empty($title)) : ?>
                <div class="col-lg-12">
                    <h1><?php echo esc_html($title) ?></h1>
                </div>
            <?php endif; ?>
        </div>
        <div class="row row-top-margin gy-5 gx-lg-5">
            <div class="col-lg-8">
                <!-- Contact Form Shortcode -->
                <?php
                $shortcode = get_field('form_shortcode');
                if (!empty($shortcode)) {
                    echo do_shortcode($shortcode);
                }
                ?>
            </div>
            <?php if (!empty($sub_title) || !empty($content)) : ?>
                <div class="col-lg-4">
                    <div class="ct-form-info">
                        <p><strong><?php echo wp_kses($sub_title, true) ?></strong></p>
                        <p class="mt-lg-3 mt-2"><?php echo wp_kses($content, true) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Form End -->