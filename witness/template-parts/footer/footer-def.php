<?php

/**
 * Template part for displaying footer layout one
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package witnessai
 */

if (function_exists('get_field')) {
	$hide_newsletter = (get_field('hide_newsletter')) ?? NULL;
}

?>

<?php if (is_front_page()) : ?>
	<div class="w-100 subscribe-banner-bg bg-info-ai" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/blog_banner-bg.jpg);"></div>
<?php endif; ?>

<?php if (!$hide_newsletter == true) :  ?>
	<!-- Subscribe -->
	<div class="subscribe-area d-bibe" style="background-color: #7DA8A9; padding: 35px 0;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="subscribe-box d-flex justify-content-center flex-column flex-lg-row align-items-center align-items-lg-start">

						<?php
						$subscribe_title = get_field('subscribe_title', 'option');
						$subscribe_form = get_field('subscribe_form', 'option');

						// title
						(!empty($subscribe_title)) ? printf('<p class="mt-lg-2"><strong>%s</strong></p>', esc_html($subscribe_title)) : '';

						// Newsletter Form
						if (!empty($subscribe_form)) {
							echo do_shortcode($subscribe_form);
						}

						?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Subscribe End -->
<?php endif; ?>

<!-- Footer -->

<!-- About -->

<section class="about-area footer-area bg-info-ai" style="background-image: url(<?php echo get_template_directory_uri() ?>/assets/images/witness-ai-footer-scaled.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="about-box footer-box d-flex flex-column flex-md-row">
					<div class="footer-logo-wrap flex-shrink-0 text-center text-md-start">
						<?php
						// Footer Logo
						$footer_logo = get_field('footer_logo', 'option');
						echo '<a href="' . home_url() . '">';
						echo wp_get_attachment_image($footer_logo, 'full');
						echo "</a>";
						?>
					</div>
					<div class="footer-info text-center text-md-start">

						<?php
						// details
						$footer_details = get_field('footer_details', 'option');
						(!empty($footer_details)) ? printf('<p class="text_white">%s</p>', wp_kses($footer_details, true)) : '';
						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- About End -->

<!-- Footer End -->