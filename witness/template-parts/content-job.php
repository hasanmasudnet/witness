

   <?php 
      $button = get_field('apply_button');
      $content_one = get_field('step_one_content');   ?>

   <div id="post-<?php the_ID();?>" class="row">
      <div class="col-lg-9 career-info-wrap">
         <div class="section-title">
            <h2><?php the_title();?></h2>
            <?php
               if ($button) {
                  $btn_url = $button['url'];
                  $btn_title = $button['title'];
                  $btn_target = $button['target'] ? $button['target'] : '';
               ?>
                  <a class="common-btn mt-4" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
                        <?php echo esc_html($btn_title); ?>
                        <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                           <path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                        </svg>
                  </a> 
               <?php } 
            ?>
         </div>
         <div class="listing-wrap-a pb-3">
            <?php 
            // content One
            (!empty($content_one)) ? printf('<p class="mt-4 mb-3">%s</p>',  wp_kses($content_one, true)) : '';
         
            ?>
         </div>
         <div class="listing-wrap mt-lg-5 mt-4">
            <?php the_content();?>
         </div>
         <?php
            if ($button) {
               $btn_url = $button['url'];
               $btn_title = $button['title'];
               $btn_target = $button['target'] ? $button['target'] : '';
            ?>
               <a class="common-btn" href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr($btn_target) ?>">
                     <?php echo esc_html($btn_title); ?>
                     <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                        <path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                     </svg>
               </a> 
            <?php } 
         ?>
      </div>
   </div>

  
   