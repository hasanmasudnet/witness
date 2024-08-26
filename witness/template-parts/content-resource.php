<?php
    // thumbnail image
     $thumb_id = function_exists( 'get_field' ) ? !empty(get_field( 'resource_thum', get_the_ID() )) ? get_field( 'resource_thum', get_the_ID() ) : NULL : NULL;


	
?>

<div class="col-lg-6">
    <div class="resource-box">
        <div class="resource-img overflow-hidden">
            <a href="<?php the_permalink(); ?>">
                <?php echo wp_get_attachment_image( $thumb_id, 'full', '', ['class' => 'w-100'] ); ?>
            </a>
        </div>
        <div class="resource-info">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <a class="common-btn bg-pest" href="<?php the_permalink(); ?>">
                Read more
            </a>
        </div>
    </div>
</div>