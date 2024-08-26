<?php
/* Block Name: Demo Items Block; dev: Jahid */


if (have_rows('demo_items')) :
?>

    <!-- Demo -->

    <div class="demo-area section-padding-bottom position-relative z-index-one">
        <div class="container container-extra-large-two">
            <div class="row demo-wrapper">
                <?php
                while (have_rows('demo_items')) : the_row();
                    $demo_img = get_sub_field('demo_img');
                    $demo_content = get_sub_field('demo_content');
                    $reverse_columns = get_sub_field('reverse_column');
                ?>

                    <div class="col-lg-12 single-demo">
                        <div class="row align-items-center justify-content-between gy-2 gx-lg-5">
                            <?php if ($reverse_columns) : ?>
                                <div class="col-lg-6">
                                    <div class="demo-img-wrap">
                                        <?php echo wp_get_attachment_image($demo_img, 'full', false, array('class' => '')) ?>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="demo-info">
                                        <?php
                                        // Content
                                        (!empty($demo_content)) ? printf('<h6>%s</h6>', wp_kses($demo_content, true)) : '';
                                        ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="col-lg-5 order-1 order-lg-0">
                                    <div class="demo-info">
                                        <?php
                                        // Content
                                        (!empty($demo_content)) ? printf('<h6>%s</h6>', wp_kses($demo_content, true)) : '';
                                        ?>
                                        <!-- <h6>Eliminate “Shadow AI” with a dynamic catalog of every AI system accessed by your employees. Understand what each system does and where it stores data.</h6> -->
                                    </div>
                                </div>
                                <div class="col-lg-6 order-lg-1">
                                    <div class="demo-img-wrap">
                                        <?php echo wp_get_attachment_image($demo_img, 'full', false, array('class' => '')) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <?php
                    // Button
                    $button = get_field('button');

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
        <?php
        $shape_style = get_field('shape_style');
        $shape_image = get_field('shape_image');
        $classes = '';

        if ($shape_style == 'observe') {
            $classes = 'position-absolute z-index-minus-one start-0 demo-img d-none d-lg-block';
        } elseif ($shape_style == 'control') {
            $classes = 'position-absolute z-index-minus-one start-0 demo-img demo-img-control d-none d-lg-block';
        } elseif ($shape_style == 'protect') {
            $classes = 'position-absolute z-index-minus-one start-0 demo-img demo-img-protect d-none d-lg-block';
        }
        ?>
        <img class="<?php echo esc_attr($classes) ?>" src="<?php echo esc_url($shape_image); ?>" alt="shape">
    </div>

    <!-- Demo End -->
<?php endif; ?>