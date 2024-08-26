<?php /* Block Name: Breadcrumb Block; dev: Noman */ ?>

<?php
$title = get_field('title');
$bg_img = get_field('bg_img');


// layout control
$section_classes = '';
$col_classes = '';
$wrap_classes = '';
$ul_classes = '';
$title_classes = '';

if (get_field('layout_control') == 'style-product') {
    $section_classes = 'breadcrumb-area product bg-info-ai';
    $col_classes = 'col-lg-12';
    $wrap_classes = 'breadcrumb-info';
    $ul_classes = 'd-flex flex-wrap';
    $title_classes = 'text-white';
} elseif (get_field('layout_control') == 'style-solution') {
    $section_classes = 'breadcrumb-area bg-info-ai';
    $col_classes = 'col-lg-12';
    $wrap_classes = 'breadcrumb-info breadcrumb-info-solution';
    $ul_classes = 'd-flex flex-wrap mt-3';
    $title_classes = 'text-white';
} elseif (get_field('layout_control') == 'style-career') {
    $section_classes = 'breadcrumb-area breadcrumb-area-career bg-info-ai';
    $col_classes = 'col-lg-5 col-md-9';
    $wrap_classes = 'breadcrumb-info breadcrumb-info-solution';
    $ul_classes = 'd-flex flex-wrap mt-3';
    $title_classes = 'text-white';
} elseif (get_field('layout_control') == 'style-company') {
    $section_classes = 'breadcrumb-area breadcrumb-area-career breadcrumb-area-company bg-info-ai';
    $col_classes = 'col-lg-6';
    $wrap_classes = 'breadcrumb-info breadcrumb-info-company';
    $ul_classes = 'd-flex flex-wrap mt-3';
    $title_classes = 'w-100';
}
?>

<!-- Breadcrumb -->

<div class="<?php echo esc_attr($section_classes); ?>" style="background-image: url(<?php echo wp_get_attachment_image_url($bg_img, 'full'); ?>);">
    <div class="container">
        <div class="row">
            <div class="<?php echo esc_attr($col_classes); ?>">
                <div class="<?php echo esc_attr($wrap_classes); ?> wow fadeInUp" data-wow-delay="250ms" data-wow-duration="1500ms">
                    <?php if (get_field('show_title')) : ?>
                        <h1 class="<?php echo esc_attr($title_classes); ?>"><?php echo wp_kses($title, true) ?></h1>
                    <?php endif; ?>
                    <?php if (have_rows('breadcrumb_list')) : ?>
                        <ul class="<?php echo esc_attr($ul_classes); ?>">
                            <?php while (have_rows('breadcrumb_list')) : the_row(); ?>
                                <li><?php the_sub_field('list_item'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breadcrumb End -->