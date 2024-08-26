<?php /* Block Name: Webinar Form; dev: Jahid */ ?>

<?php
$content = get_field('description');
$qoute_content = get_field('qoute_content');

?>

<!-- Download Info -->

<section class="download-info-area section-padding-top section-padding-bottom download-bg position-relative">
    <div class="container container-extra-large-two">
        <div class="row justify-content-between gy-5">
            <div class="col-lg-6">
                <div class="download-info">
                    <p class="download-desc"><?php echo wp_kses($content, true) ?></p>
                    <div class="download-divider"></div>
                    <div class="quote position-relative">
                        <p class="text_black"><?php echo wp_kses($qoute_content, true) ?></p>
                        <img class="position-absolute top-0 start-0" src="<?php echo get_template_directory_uri(); ?>/assets/images/qt.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <!-- Contact Form Shortcode -->
                <?php
                $shortcode = get_field('webinar_shortcode');
                if (!empty($shortcode)) {
                    echo do_shortcode($shortcode);
                }
                ?>

                <!-- <div class="download-form-wrap h-100 position-relative pt-xxl-5">
                    <h4 class="h4 text_white">Download the webinar</h4>
                    <form action="#" class="download-form-box mt-4 mt-lg-5">
                        <div class="row gy-4">
                            <div class="col-xxl-8 col-lg-10">
                                <label class="d-inline-block text_white">Name (required)</label>
                                <input class="w-100" type="text">
                            </div>
                            <div class="col-xxl-8 col-lg-10">
                                <label class="d-inline-block text_white">Email (required)</label>
                                <input class="w-100" type="email">
                            </div>
                            <div class="col-xxl-8 col-lg-10">
                                <label class="d-inline-block text_white">Company</label>
                                <input class="w-100" type="text">
                            </div>
                            <div class="col-xxl-8 col-lg-10">
                                <label class="d-inline-block text_white">Title</label>
                                <input class="w-100" type="text">
                            </div>
                            <div class="col-xxl-8 col-lg-10 text-center">
                                <button class="border-0 common-btn">CTA Here</button>
                            </div>
                        </div>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</section>

<!-- Download Info eND -->