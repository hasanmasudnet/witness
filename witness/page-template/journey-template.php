<?php
/* Template Name: Journey Template */
?>
<?php get_header(); ?>

<!-- Hero -->
<?php
$hero_title = get_field('hero_title');
$hero_content = get_field('hero_content');
$hero_image = get_field('hero_image');
$hero_button = get_field('hero_button');
?>

<div class="hero-area hero-journey position-relative z-index-one overflow-hidden">
	<div class="container container-extra-large">
		<div class="w-100">
			<div class="row justify-content-between align-items-end">
				<div class="col-lg-8 col-md-5 col-md-10 pe-0">
					<div class="hero-info hero-info-journey position-relative z-index-one">

						<?php

						$hero_title ? printf('<h1 class="text-white">%s</h1>', esc_html($hero_title)) : '';
						$hero_content ? printf('<p class="text-white">%s</p>', wp_kses($hero_content, true)) : '';
						if ($hero_button) {
							$btn_url    = $hero_button['url'];
							$btn_title  = $hero_button['title'];
							$btn_target = $hero_button['target'] ? $hero_button['target'] : '';
						?>
							<a class="common-btn white mt-0 mt-lg-3" href="<?php echo esc_url($btn_url) ?>" target="<?php echo esc_attr($btn_target) ?>">
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
				<?php if (!empty($hero_image)) : ?>
					<div class="col-lg-7  position-absolute top-0 end-0 pe-0 h-100 ps-0">
						<div class="hero-journey-img text-end h-100 d-flex align-items-center justify-content-end">
							<img class="h-100 w-100 z-index-minus-one" src="<?php echo esc_url($hero_image); ?>" alt="">
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<img class="hero-journey-sp position-absolute z-index-minus-one bottom-0 d-none d-lg-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/hero-journey-sp.png" alt="">
</div>

<!-- Hero End -->


<!-- Cta -->

<?php
$process_title = get_field('section_process_title');
$process_content = get_field('section_process_content');
$process_list = get_field('process_card_list');

?>

<div class="cta-area section-padding-top overflow-hidden">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xxl-10 col-xl-11">
				<div class="section-title text-center">

					<?php

					// title
					(!empty($process_title)) ? printf('<h2>%s</h2>', esc_html($process_title)) : '';

					// content
					(!empty($process_content)) ? printf('<p class="mt-1">%s</p>',  wp_kses($process_content, true)) : '';

					?>

				</div>
			</div>
		</div>
		<div class="row mt-4 mt-lg-5 pt-4 cta-row-gap gx-5">
			<?php
			// Check rows exists.
			if (have_rows('process_card_list')) :

				// Loop through rows.
				while (have_rows('process_card_list')) : the_row();

					$process_card_title    = get_sub_field('process_card_title');
					$process_card_content    = get_sub_field('process_card_content');
					$process_card_button   = get_sub_field('process_card_button');

			?>

					<div class="col-xl-3 col-lg-4 col-md-6">
						<div class="cta-section-box text-center d-flex flex-column justify-content-between h-100">
							<div class="cta-section-content-wrap">
								<div class="cta-box-wrap section-middle">
									<div class="cta-box d-flex align-items-center justify-content-center">

										<?php
										// Card Title
										$process_card_title ? printf('<h2 class="h2">%s</h2>', $process_card_title) : '';
										?>

									</div>
								</div>
								<div class="cta-info">

									<?php
									// Card Content
									$process_card_content  ? printf('<p>%s</p>', $process_card_content) : '';

									?>

								</div>
							</div>

							<?php
							// Card Button
							if ($process_card_button) {
								$btn_url = $process_card_button['url'];
								$btn_title = $process_card_button['title'];
								$btn_target = $process_card_button['target'] ? $process_card_button['target'] : '';
							?>
								<a class="common-btn" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
									<?php echo esc_html($btn_title); ?>
									<svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
										<path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
									</svg>
								</a>
							<?php } ?>

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

<!-- Cta End -->

<!-- Service -->
<?php
$services_title = get_field('service_section_title');
$services_cards = get_field('service_card_list');
$services_button = get_field('service_section_button');
?>

<div class="service-area shape-top-margin position-relative z-index-one section-padding-top overflow-hidden row-bottom-padding">
	<div class="container">
		<div class="row">
			<?php if (!empty($services_title)) : ?>
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h2><?php echo esc_html($services_title); ?></h2>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row row-top-padding justify-content-center justify-content-lg-end">
			<div class="col-lg-11">
				<div class="row gy-4 gy-md-5">
					<?php
					// Check rows exists.
					if (have_rows('service_card_list')) :

						// Loop through rows.
						while (have_rows('service_card_list')) : the_row();

							$services_card_title = get_sub_field('services_card_title');

					?>
							<div class="col-md-4 col-sm-6">
								<div class="service-box position-relative">
									<?php
									// Card Title
									$services_card_title ? printf('<h2 class="text_color_green max-wd">%s</h2>', $services_card_title) : '';
									?>
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
	</div>
	<img class="gradient-border position-absolute z-index-minus-one d-none d-lg-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/gradient-border.svg" alt="">
</div>
<div class="service-btn-wrap text-center mt-3 mt-lg-0">

	<?php

	if ($services_button) {
		$btn_url = $services_button['url'];
		$btn_title = $services_button['title'];
		$btn_target = $services_button['target'] ? $services_button['target'] : '';
	?>
		<a class="common-btn" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
			<?php echo esc_html($btn_title); ?>
			<svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
				<path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
			</svg>
		</a>
	<?php } ?>

</div>

<!-- Service End -->

<!-- Customer -->
<?php
$testimonial_title = get_field('testimonial_title');
$testimonial_content = get_field('testimonial_content');
$testimonial_image = get_field('testimonial_image');
?>

<div class="customer-area bg_color_gradient_green section-margin-top pt-4 pb-4 pt-lg-5 pb-lg-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="customer-box-wrap section-middle d-flex">
					<img src="<?php echo esc_url($testimonial_image); ?>" alt="">
					<div class=" customer-info">

						<?php

						// title
						(!empty($testimonial_title)) ? printf('<h2 class="text-white">%s</h2>', esc_html($testimonial_title)) : '';

						// content
						(!empty($testimonial_content)) ? printf('<p class="text-white">%s</p>',  wp_kses($testimonial_content, true)) : '';

						?>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Customer End -->

<!-- About Two -->
<?php
$about_witnessai_title = get_field('about_witnessai_title');
$witnessai_two_list = get_field('about_witnessai_steps');
?>

<div class="about-two-area section-padding-top section-padding-bottom position-relative z-index-one overflow-hidden">
	<div class="container">
		<div class="row">
			<?php if (!empty($about_witnessai_title)) : ?>
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h2><?php echo esc_html($about_witnessai_title); ?></h2>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row row-top-padding justify-content-center gy-4 gy-md-5">
			<?php
			// Check rows exists.
			if (have_rows('about_witnessai_steps')) :
				// Loop through rows.
				while (have_rows('about_witnessai_steps')) : the_row();
					$aps_image     = get_sub_field('aps_image');
					$aps_title     = get_sub_field('aps_title');
					$aps_content   = get_sub_field('aps_content');
					$aps_button    = get_sub_field('aps_button');

			?>
					<div class="col-lg-4 col-md-6">
						<div class="about-two-section text-center d-flex flex-column justify-content-between h-100">
							<div class="about-two-box-info-wrap d-flex flex-column h-100">
								<div class="about-two-box-info">
									<div class="about-two-img d-flex align-items-end justify-content-center">
										<?php echo wp_get_attachment_image($aps_image, 'full') ?>
									</div>

									<?php
									// List Title
									$aps_title ? printf('<h2 class="h2 mt-3 section-middle w-100">%s</h2>', $aps_title) : '';
									?>

								</div>

								<?php
								// List Content
								$aps_content ? printf('<p class="section-middle w-100">%s</p>', $aps_content) : '';

								?>

							</div>

							<?php
							if ($aps_button) {
								$btn_url = $aps_button['url'];
								$btn_title = $aps_button['title'];
								$btn_target = $aps_button['target'] ? $aps_button['target'] : '';
							?>
								<a class="common-btn section-middle" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
									<?php echo esc_html($btn_title); ?>
									<svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
										<path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
									</svg>
								</a>
							<?php } ?>

						</div>
					</div>

			<?php
				// End loop.
				endwhile;
			endif;
			?>
		</div>
	</div>

	<!-- Becoming A Client -->

	<div class="container section-margin-top">
		<div class="row">
			<div class="col-lg-9">
				<div class="section-title">

					<?php

					// Become a Client -> BAC
					$bac_title = get_field('bac_title');
					$bac_content = get_field('bac_content');
					$bac_button = get_field('bac_button');

					// title
					(!empty($bac_title)) ? printf('<h2>%s</h2>', esc_html($bac_title)) : '';

					// content
					(!empty($bac_content)) ? printf('<p class="mt-2">%s</p>',  wp_kses($bac_content, true)) : '';

					?>

				</div>


				<?php
				if ($bac_button) {
					$btn_url = $bac_button['url'];
					$btn_title = $bac_button['title'];
					$btn_target = $bac_button['target'] ? $leadership_button['target'] : '';
				?>
					<a class="common-btn mt-3" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
						<?php echo esc_html($btn_title); ?>
						<svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
							<path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
						</svg>
					</a>

				<?php } ?>


			</div>
		</div>
	</div>
	<!-- Becoming A Client End -->
	<img class="position-absolute about-two-sp end-0 bottom-0 z-index-minus-one d-none d-lg-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/about-two.png" alt="">
</div>

<!-- About Two End -->


<!-- Leadership -->
<?php
$leadership_title 		  = get_field('leadership_title');
$leadership_inner_content = get_field('leadership_inner_content');
$leadership_image 		  = get_field('leadership_image');
$leadership_button 		  = get_field('leadership_button');
?>

<div class="leadership-area section-padding-bottom pt-0 pt-lg-5 position-relative z-index-one">
	<div class="container">
		<div class="row">
			<?php if (!empty($leadership_title)) : ?>
				<div class="col-lg-12">
					<div class="section-title text-center">
						<h2><?php echo esc_html($leadership_title); ?></h2>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row row-top-padding justify-content-center">
			<div class="col-lg-11">
				<div class="leadership-box-two d-flex align-items-center flex-column flex-md-row">
					<img class="w-100" src="<?php echo esc_url($leadership_image); ?>" alt="">
					<div class="leadership-box-two-info w-100">
						<?php

						// inner title
						(!empty($leadership_inner_content)) ? printf('<h2 class="h2">%s</h2>', esc_html($leadership_inner_content)) : '';


						if ($leadership_button) {
							$btn_url = $leadership_button['url'];
							$btn_title = $leadership_button['title'];
							$btn_target = $leadership_button['target'] ? $leadership_button['target'] : '';
						?>
							<a class="common-btn mt-3" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
								<?php echo esc_html($btn_title); ?>
								<svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
									<path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
								</svg>
							</a>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<img class="leadership-two-sp position-absolute start-0 z-index-minus-one d-none d-md-block" src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/leadership-two.png" alt="">
</div>

<!-- Leadership End -->

<?php get_footer(); ?>