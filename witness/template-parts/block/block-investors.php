<?php /* Block Name: Investors Block; dev: Jahid */ ?>

<?php
$section_title = get_field('title');

$btn_title = get_field('button_title');
$button = get_field('button');

$ltr_title = get_field('letter_title');
$ltr_desc = get_field('letter_content');

?>

<!-- Investors -->

<div class="investors-area section-margin-top row-bottom-padding">
    <div class="container">
        <div class="row">
            <?php if (!empty($section_title)) : ?>
                <div class="col-lg-12 text-center">
                    <h4><?php echo esc_html($section_title) ?></h4>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <?php if (have_rows('partners_logo')) : ?>
                <div class="col-lg-12">
                    <div class="logos-wrapper d-flex justify-content-center align-items-center flex-wrap">
                        <?php while (have_rows('partners_logo')) : the_row();

                            $com_logo = get_sub_field('companies_logo');
                            $logo_url = get_sub_field('logo_url');

                            if ($com_logo) : ?>
                                <div class="wrap">
                                    <a href="<?php echo esc_url($logo_url); ?>" target="_blank">
                                        <?php echo wp_get_attachment_image($com_logo, 'full', false, array('class' => '')) ?>
                                    </a>
                                </div>
                        <?php endif;
                        endwhile; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row section-margin-top">
            <div class="col-lg-12">
                <div class="investors-box">
                    <?php if (!empty($btn_title)) : ?>
                        <div class="investors-inner text-center">
                            <!-- Title -->
                            <h4><?php echo esc_html($btn_title) ?></h4>

                            <!-- Button -->
                            <?php
                            if ($button) {
                                $btn_url    = $button['url'];
                                $btn_title  = $button['title'];
                                $btn_target = $button['target'] ? $button['target'] : '';
                            ?>
                                <a class="common-btn mt-4 max_content" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>"> <?php echo esc_html($btn_title); ?></a>
                            <?php } ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($ltr_title) || !empty($ltr_desc)) : ?>
                        <div class="investors-inner text-center">
                            <?php
                            // title
                            (!empty($ltr_title)) ? printf('<h4>%s</h4>', esc_html($ltr_title)) : '';

                            // content
                            (!empty($ltr_desc)) ? printf('<p class="investors-sub"><strong>%s</strong></p>',  wp_kses($ltr_desc, true)) : '';

                            ?>
                            <!-- Newsletter Shortcode -->
                            <?php
                            $shortcode = get_field('letter_shortcode');
                            if (!empty($shortcode)) {
                                echo do_shortcode($shortcode);
                            }
                            ?>
                        </div>
                    <?php endif;  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Investors End -->