<?php /* Block Name: Hero Block; dev: Noman */ ?>

<?php
$title = get_field('title');
$content = get_field('content');
$button = get_field('button');
$bg_img = get_field('background');
?>


<!-- Hero -->

<section class="hero-area" style="background-image: url(<?php echo wp_get_attachment_image_url($bg_img, 'full'); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-info ps-2 wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">

                    <?php
                    $title = str_replace("{{", "<span class='text_orange'>", $title);
                    $title = str_replace("}}", "</span>", $title);

                    // title
                    $title ? printf('<h1 class="text-white">%1$s</h1>', $title) : '';

                    // content
                    $content ? printf('<p class="p2 text_white">%1$s</p>', $content) : '';

                    // button
                    if ($button) {
                        $btn_url    = $button['url'];
                        $btn_title  = $button['title'];
                        $btn_target = $button['target'] ? $button['target'] : '';
                    ?>
                        <a class="common-btn " href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                            <?php echo esc_html($btn_title); ?>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hero End -->