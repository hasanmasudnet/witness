<?php /* Block Name: Product Listing Block; dev: Jahid */ ?>

<?php

// layout control
$section_classes = '';

if (get_field('layout_control') == 'style-product') {
    $section_classes = 'ai-listing-area section-margin-top section-margin-bottom';
} elseif (get_field('layout_control') == 'style-solution') {
    $section_classes = 'ai-listing-area section-margin-bottom section-margin-top';
}

?>


<!-- AI Listing -->
<div class="<?php echo esc_attr($section_classes); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ai-listing-wrap">
                <?php
                // Check rows exists.
                if (have_rows('product_listing')) :
                    $wow_delay = 250;

                    // Loop through rows.
                    while (have_rows('product_listing')) : the_row();

                        $list_title     = get_sub_field('list_title');
                        $list_content   = get_sub_field('list_content');
                        $list_sub_content   = get_sub_field('list_sub_content');
                        $list_img  = get_sub_field('list_image');

                ?>
                        <div class="ai-listing-box">
                            <div class="row justify-content-between gy-4">
                                <?php if (!empty($list_title) || !empty($list_content)) : ?>
                                    <div class="col-md-6 wow fadeInUp" data-wow-delay="<?php echo esc_attr($wow_delay); ?>ms" data-wow-duration="1500ms">
                                        <div class="ai-listing-info">
                                            <?php
                                            // title
                                            $list_title ? printf('<h4>%s</h4>', $list_title) : '';
                                            // content
                                            $list_content ? printf('<p class="mt-3">%s</p>', $list_content) : '';
                                            ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($list_img)) : ?>
                                    <div class="col-md-4">
                                        <div class="ai-listing-img text-center">
                                            <!-- Image -->
                                            <?php echo wp_get_attachment_image($list_img, 'full', false, array('class' => 'w-100 mb-2')) ?>
                                            <!-- Sub Content -->
                                            <?php $list_sub_content ? printf('<p style="font-size: 10pt;">%s</p>', $list_sub_content) : ''; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                <?php
                        $wow_delay += 150;
                    // End loop.
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

<!-- AI Listing End -->