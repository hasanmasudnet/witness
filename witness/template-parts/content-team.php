   

   <?php
   $appellation = get_field('appellation');
   ?>

   <!-- Details -->
   <div id="post-<?php the_ID();?>" class="row gx-xl-5 align-items-end">
      <div class="col-lg-4">
         <?php if ( has_post_thumbnail() ): ?>   
               <!-- post loop thumbnail  -->
               <div class="team-details-img">
                  <?php the_post_thumbnail( 'full', ['class' => 'w-100'] );?>
               </div>
               <!-- End post loop thumbnail  -->
         <?php endif; ?>
      </div>
      <div class="col-lg-8">
         <div class="section-title">
            <h2><?php the_title();?></h2>
            <?php
            // content
               (!empty($appellation)) ? printf('<p class="tean-details-surname mb-4">%s</p>',  wp_kses($appellation, true)) : '';
            ?>
            <p><?php the_content()?></p>
         </div>
      </div>
   </div>
   <!-- Details End -->