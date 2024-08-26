<?php 
    $title = get_field('title');
    $solutions = !empty(get_field('solutions')) ? get_field('solutions') : [];

?>

<!-- Solution -->

<section class="solution-area row-top-margin section-margin-bottom overflow-hidden">
		<div class="container">

            <?php if( $title ): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-border">
                            <?php  printf('<h1 class="text-white">%1$s</h1>', $title); ?>
                            <h6 class="h6">Our Solutions</h6>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

			<div class="row gy-4 gx-xl-5">
                <?php foreach( $solutions as $key => $item): ?>
                    <div class="col-md-4">
                        <div class="solution-box">
                            <div class="solution-img">
                                <?php echo wp_get_attachment_image( $item['image'], [410, 257], '', ['class' => 'w-100 ']) ?>
                            </div>
                            <div class="solution-info">
                                <p class="p2"><?php echo $item['title'] ?></p>
                                <p><?php echo $item['content'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Solution End -->