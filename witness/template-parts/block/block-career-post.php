<?php /* Block Name: Carrer Post Block; dev: Jahid */ ?>

<?php
$section_title = get_field('section_title');
?>

<!-- Career -->
<div class="career-area section-margin-bottom">
    <div class="container">
        <div class="row">
            <?php if (!empty($section_title)) : ?>
                <div class="col-lg-12">
                    <div class="title-border">
                        <h6 class="h6"><?php echo wp_kses($section_title, true) ?></h6>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row justify-content-center row-top-padding gy-5">
            <?php
            // Check rows exists.
            if (have_rows('job_post_list')) :

                // Loop through rows.
                while (have_rows('job_post_list')) : the_row();

                    $job_title     = get_sub_field('job_title');
                    $job_type     = get_sub_field('job_type');
                    $job_desc   = get_sub_field('job_desc');
                    $job_button   = get_sub_field('button');

            ?>
                    <div class="col-lg-10">
                        <div class="career-box">
                            <?php if (!empty($job_title) || !empty($job_type)) : ?>
                                <div class="meta d-flex flex-wrap justify-content-between gap-2">
                                    <?php
                                    // title
                                    $job_title ? printf('<h6>%s</h6>', $job_title) : '';
                                    // type
                                    $job_type ? printf('<h6>%s</h6>', $job_type) : '';
                                    ?>
                                </div>
                            <?php endif;

                            if (!empty($job_desc)) :  ?>
                                <div class="description">
                                    <?php
                                    // Desc
                                    $job_desc ? printf('<p>%s</p>', $job_desc) : '';
                                    ?>
                                </div>
                            <?php endif;

                            if (!empty($job_button)) : ?>
                                <div class="button-wrap mt-lg-5 mt-4">
                                    <?php
                                    if ($job_button) {
                                        $btn_url    = $job_button['url'];
                                        $btn_title  = $job_button['title'];
                                        $btn_target = $job_button['target'] ? $job_button['target'] : '';
                                    ?>

                                        <a class="common-btn" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>"> <?php echo esc_html($btn_title); ?></a>

                                    <?php } ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
            <?php
                // End loop.
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>

<!-- Career End -->