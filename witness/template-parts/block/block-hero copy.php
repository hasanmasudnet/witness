<?php /* Block Name: Hero Block; dev: Noman */ ?>

<?php
$title = get_field('title');
$content = get_field('content');
$button = get_field('button');

// layout control
$row_classes = '';
$wrap_classes = '';
$shap_bg_url = '';
$white_color = '';

if (get_field('layout_control') == 'style-home') {
    $row_classes = 'col-xl-7 col-lg-6 col-md-10';
    $wrap_classes = 'hero-area position-relative z-index-one';
    $shap_bg_url = WITNESSAI_THEME_URI . '/assets/images/hero/hero-3.svg';

} elseif (get_field('layout_control') == 'style-become-client') {
    $wrap_classes = 'hero-area hero-become-client position-relative z-index-one';
    $row_classes = 'col-xl-8 col-lg-6 col-md-10';
    $shap_bg_url = WITNESSAI_THEME_URI . '/assets/images/hero/become-cloent.svg';

} elseif (get_field('layout_control') == 'style-investment-philosophy') {
    $wrap_classes = 'hero-area hero-area-investment bg_color_gradient_green position-relative z-index-one';
    $row_classes = 'col-lg-6 col-md-12';
    $white_color = 'text-white';

} elseif (get_field('layout_control') == 'style-resource') {
    $wrap_classes = 'hero-area resource-hero position-relative z-index-one';
    $row_classes = 'col-xl-8 col-lg-6 col-md-10';

} elseif (get_field('layout_control') == 'style-fiduciary') {
    $wrap_classes = 'hero-area fiduciary-hero position-relative z-index-one';
    $row_classes = 'col-lg-6 col-md-10';
}
?>

<?php if (get_field('layout_control') == 'style-careers'): ?>
    <!-- Hero -->
	<div class="hero-area hero-career position-relative z-index-one overflow-hidden">
		<div class="container container-extra-large">
			<div class="w-100">
				<div class="row justify-content-between align-items-end">
					<div class="col-lg-8 col-md-5 col-md-10 pe-0">
						<div class="hero-info hero-info-journey career position-relative z-index-one">
                            <?php
                                $title ? printf('<h1 class="text-white">%1$s</h1>', $title) : '';
                                $content ? printf('<p class="text-white">%1$s</p>', $content) : '';
                                if ($button) {
                                    $btn_url    = $button['url'];
                                    $btn_title  = $button['title'];
                                    $btn_target = $button['target'] ? $button['target'] : '';
                                ?>
                                    <a class="common-btn white mt-0 mt-lg-3 " href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                        <?php echo esc_html($btn_title); ?>
                                        <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"/>
                                            <path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"/>
                                        </svg>
                                    </a>
                                <?php
                                }
                            ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Hero End -->

<?php else: ?>
<!-- Hero -->
<div class="<?php echo esc_attr($wrap_classes) ?>">
    <div class="container container-extra-large">
        <div class="w-100">
            <div class="row justify-content-between align-items-end">
                <div class="<?php echo esc_attr($row_classes); ?>">
                    <div class="hero-info">
                        <?php

                        $title ? printf('<h1 class="%2$s">%1$s</h1>', $title, $white_color) : '';
                        $content ? printf('<p class="%2$s">%1$s</p>', $content, $white_color) : '';
                        if ($button) {
                            $btn_url    = $button['url'];
                            $btn_title  = $button['title'];
                            $btn_target = $button['target'] ? $button['target'] : '';
                        ?>
                            <a class="common-btn <?php echo $white_color; ?>" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
                                <?php echo esc_html($btn_title); ?>
                                <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10" />
                                    <path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10" />
                                </svg>
                            </a>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php if (get_field('layout_control') == 'style-become-client' || get_field('layout_control') == 'style-home') : ?>
                    <div class="col-xl-5 col-lg-6 position-absolute top-0 end-0 pe-0 h-100 d-none d-lg-block">
                        <div class="hero-img text-end h-100 d-flex align-items-end justify-content-end">
                            <img src="<?php echo esc_url($shap_bg_url); ?>" alt="<?php echo get_the_title() . ' Hero Shape' ?>">
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->

<?php endif; ?>