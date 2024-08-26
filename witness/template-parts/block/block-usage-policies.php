<?php /* Block Name: Usage Policies Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$content = get_field('content');
$policies = !empty(get_field('policies_list')) ? get_field('policies_list') : [];
$button = get_field('button');
?>

<!-- Using -->
<div class="using-area bg_black section-padding-bottom ">
    <div class="container container-extra-large-two">
        <div class="row">
            <?php if (!empty($title) || !empty($content)) : ?>
                <div class="col-lg-12">
                    <div class="using-title text-center">
                        <?php
                        // title
                        (!empty($title)) ? printf(' <h2 class="text-white">%s</h2>', esc_html($title)) : '';

                        // Content
                        (!empty($content)) ? printf(' <h4 class="text-white section-middle mt-3">%s</h4>',  wp_kses($content, true)) : '';
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center section-padding-top gy-4">
            <?php foreach ($policies as $key => $item) : ?>
                <div class="col-lg-4 col-md-6">
                    <div class="using-box text-center">
                        <h4><?php echo $item['plc_title'] ?></h4>
                        <p class="section-middle"><?php echo $item['plc_content'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mt-lg-5 mt-5">
            <div class="col-lg-12 text-center">
                <?php
                // Button

                if ($button) {
                    $btn_url    = $button['url'];
                    $btn_title  = $button['title'];
                    $btn_target = $button['target'] ? $button['target'] : '';
                ?>

                    <a class="common-btn text-hover" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>"> <?php echo esc_html($btn_title); ?></a>

                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Using End -->