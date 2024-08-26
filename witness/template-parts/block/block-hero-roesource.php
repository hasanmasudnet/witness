<?php /* Block Name: Hero Resource Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$button = get_field('button');
$bg_img = get_field('image');
?>


<!-- Breadcrumb -->

<div class="breadcrumb-area breadcrumb-area-career breadcrumb-area-resource bg-info-ai" style="background-image: url(<?php echo wp_get_attachment_image_url($bg_img, 'full'); ?>);">
    <div class="container">
        <div class="row">
            <?php if (!empty($title)) : ?>
                <div class="col-lg-5 col-md-9">
                    <div class="breadcrumb-info breadcrumb-info-resource">
                        <?php
                        // title
                        (!empty($title)) ? printf('<h2 class="text-white h1">%s</h2>', esc_html($title)) : '';

                        if ($button) {
                            $btn_url    = $button['url'];
                            $btn_title  = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>

                            <a class="common-btn text-hover mt-4" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>"> <?php echo esc_html($btn_title); ?></a>

                        <?php } ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Breadcrumb End -->