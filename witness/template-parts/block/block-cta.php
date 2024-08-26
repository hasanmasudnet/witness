<?php /* Block Name: CTA Block; dev: Jahid */ ?>

<?php
$content = get_field('content');

// layout control
$section_classes = '';

if (get_field('layout_control') == 'style-home') {
    $section_classes = 'cta-area row-top-margin';
} elseif (get_field('layout_control') == 'style-career') {
    $section_classes = 'career-cta-area section-margin-top section-margin-bottom';
}
?>

<!-- CTA -->

<div class="<?php echo esc_attr($section_classes) ?>">
    <div class="container">
        <div class="row justify-content-center">
            <?php if (!empty($content)) : ?>
                <div class="col-lg-12">
                    <div class="cta-info section-middle text-center">
                        <?php
                        // content
                        (!empty($content)) ? printf('<p class="p2">%s</p>',  wp_kses($content, true)) : '';
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- CTA End -->

<!-- CAreer Cta -->

<!-- <div class="career-cta-area section-margin-top section-margin-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="p2">WitnessAI is building the team and culture needed to achieve our ambitious goal – to
                    become the leader in AI security and safety. We are a remote company with employees around the
                    world. Creative problem solvers seeking challenges at the bleeding edge of technology are
                    encouraged to apply.</p>
            </div>
        </div>
    </div>
</div> -->

<!-- CAreer Cta End -->