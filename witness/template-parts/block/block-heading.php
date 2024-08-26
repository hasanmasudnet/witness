<?php /* Block Name: Heading Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$content = get_field('content');

?>

<!-- Product CTA -->

<div class="product-cta-area section-margin-top section-margin-bottom wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
    <div class="container">
        <div class="row">
            <?php if (!empty($title) || !empty($content)) : ?>
                <div class="col-lg-9">

                    <?php
                    // title
                    (!empty($title)) ? printf('<h4 class="h4 mb-3">%s</h4>', esc_html($title)) : '';

                    // content
                    (!empty($content)) ? printf('<p>%s</p>',  wp_kses($content, true)) : '';

                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Product CTA End -->