<?php /* Block Name: Newsletter Block; dev: Jahid */ ?>

<?php
$title = get_field('title');
$ltr_shortcode = get_field('ltr_shortcode');

?>

<!-- Subscribe -->

<div class="subscribe-area" style="background-color: #7DA8A9; padding: 35px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="subscribe-box d-flex justify-content-center flex-column flex-lg-row align-items-center align-items-lg-start">
                    <?php
                    // title
                    (!empty($title)) ? printf('<p class="mt-lg-2"><strong>%s</strong></p>', esc_html($title)) : '';

                    // Newsletter Form
                    if (!empty($ltr_shortcode)) {
                        echo do_shortcode($ltr_shortcode);
                    }

                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Subscribe End -->