<?php /* Block Name: Hero Block; dev: Noman */ ?>

<?php
$bg_img = get_field('bg_img');
$title = get_field('title');
$content = get_field('content');
$button = get_field('button');
$image = get_field('image');


$style = get_field('style');
?>

<!-- Breadcrumb -->
<?php if ($style == 'observe') : ?>
    <div class="breadcrumb-area breadcrumb-area-observe bg-info-ai" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container container-extra-large-two">
            <div class="row align-items-center justify-content-between gy-5">
                <div class="col-lg-5 col-xxl-5">
                    <div class="breadcrumb-info breadcrumb-info-observe text-center text-lg-start">
                        <h1 class="text-white h2"><?php echo wp_kses($title, true); ?></h1>
                        <?php
                        // button
                        if ($button) {
                            $btn_url = $button['url'];
                            $btn_title = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>
                            <a class="common-btn text-hover mt-4 mt-xl-5" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6">
                    <div class="breadcrumb-img">
                        <?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'w-100']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($style == 'control') : ?>
    <div class="breadcrumb-area breadcrumb-area-observe bg-info-ai" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container container-extra-large-two">
            <div class="row align-items-center justify-content-between gy-5">
                <div class="col-lg-5 col-xxl-5">
                    <div class="breadcrumb-info breadcrumb-info-observe text-center text-lg-start">
                        <h1 class="text-white h2"><?php echo $title ?></h1>
                        <?php
                        // button
                        if ($button) {
                            $btn_url = $button['url'];
                            $btn_title = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>
                            <a class="common-btn text-hover mt-4" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6">
                    <div class="breadcrumb-img">
                        <?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'w-100']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($style == 'protect') : ?>
    <div class="breadcrumb-area breadcrumb-area-observe bg-info-ai" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container container-extra-large-two">
            <div class="row align-items-center justify-content-between gy-5">
                <div class="col-lg-5 col-xxl-5">
                    <div class="breadcrumb-info breadcrumb-info-observe text-center text-lg-start">
                        <h1 class="text-white h2"><?php echo $title ?></h1>
                        <?php
                        // button
                        if ($button) {
                            $btn_url = $button['url'];
                            $btn_title = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>
                            <a class="common-btn text-hover mt-4" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-6">
                    <div class="breadcrumb-img">
                        <?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'w-100']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php elseif ($style == 'webinar') : ?>
    <!-- Breadcrumb -->
    <div class="breadcrumb-area breadcrumb-area-download bg-info-ai bg_black" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container container-extra-large-two">
            <div class="row align-items-center justify-content-between gy-5">
                <div class="col-lg-5 col-xxl-6 order-1 order-lg-0">
                    <div class="breadcrumb-info breadcrumb-info-download text-center text-lg-start pt-lg-5">

                        <h1 class="text-white h1"><?php echo $title ?></h1>
                        <p class="text-white download-desc mt-2"><?php echo $content ?></p>

                        <?php
                        // button
                        if ($button) {
                            $btn_url = $button['url'];
                            $btn_title = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>
                            <a class="common-btn text-hover mt-4" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                <?php echo esc_html($btn_title); ?>
                            </a>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-7 col-xxl-6">
                    <div class="breadcrumb-img breadcrumb-img-download text-center">
                        <?php echo wp_get_attachment_image($image, 'full', '', ['class' => 'w-100']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<?php endif; ?>

<!-- Breadcrumb End -->