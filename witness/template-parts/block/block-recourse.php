<?php /* Block Name: Resource; */ ?>

   <!-- Resource -->
   <?php 
   
      $resource_posts = get_field('recourse_posts');

   ?>
   <div class="resource-area section-margin-top section-margin-bottom" data-selected-resource="<?php echo json_encode($resource_posts); ?>">
      <div class="container">
         <div class="row gy-4 gx-lg-5">
            <div class="col-lg-3">
               <div class="sidebar-wrap d-flex flex-column">
                  <div class="single-sidebar">
                     <form class="sidebar-search" action="#">
                        <input class="w-100 res_search" type="text" placeholder="Search">
                     </form>
                  </div>
                  <div class="filter_group filter_by_topic single-sidebar">
                     <h2 class="sidebar-title">Filter by Topic</h2>
                     <div class="sidebar-category-wrap">
                     <?php 
                            $topic_tax_args = [
                                'taxonomy' => 'post_tag',
                                'hide_empty' => false
                            ];
                            $get_topic_tax = get_terms($topic_tax_args);
                        
                            foreach( $get_topic_tax as $key => $topic ): ?>
                              <div class="tax_name">
                                    <input type="checkbox" name="<?php echo esc_attr( $topic->slug )?>" id="<?php echo esc_attr( $topic->slug )?>" class="tax_topic filter_class term-id-<?php echo esc_attr( $topic->term_id )?>  d-none" value="<?php echo esc_attr( $topic->slug )?>">
                                    <label for="<?php echo esc_attr( $topic->slug )?>"><?php echo esc_html( $topic->name )?></label>
                              </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
                  <div class="filter_group filter_by_cat single-sidebar">
                     <h2 class="sidebar-title">Filter by Type</h2>
                     <div class="sidebar-category-wrap">
                     <?php 
                        $cat_tax_args = [
                            'taxonomy' => 'category',
                            'hide_empty' => false
                        ];
                        $get_cats_tax = get_terms($cat_tax_args);
                    
                        foreach( $get_cats_tax as $key => $cat ): if($cat->term_id == 1){ continue; }?>
                           <div class="tax_name">
                              <input type="checkbox" name="<?php echo esc_attr( $cat->slug )?>" id="<?php echo esc_attr( $cat->slug )?>" class="tax_cat filter_class term-id-<?php echo esc_attr( $cat->term_id )?> d-none" value="<?php echo esc_attr( $cat->slug )?>">
                              <label for="<?php echo esc_attr( $cat->slug )?>"><?php echo esc_html( $cat->name )?></label>
                           </div>
                    <?php endforeach; ?>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="row gy-4 gy-lg-5 resource-content">
				<?php 
						$resource_post_args_on = [
							'post_type' => 'post',
							'post_status' => 'publish',
							'posts_per_page' => get_option( 'posts_per_page' ),
							'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
							'order'             => 'ASC'
						];
                  
                  // assign selected recourse
                  if(is_array($resource_posts) && !empty($resource_posts) ){
                     $resource_post_args_on['post__in'] = $resource_posts;
                  }

						$resource_query_on = new WP_Query($resource_post_args_on);

						if( $resource_query_on->have_posts()){
							// global $wp_query;
							while($resource_query_on->have_posts()){
								$resource_query_on->the_post();
								$max_num_page = $resource_query_on->max_num_pages;
								get_template_part( 'template-parts/content-resource');
							}
							?>
							<?php
						}
						wp_reset_postdata();
					?>
					
				</div>
				<div class="col-lg-12 text-center mt-5">
					<a class="common-btn" id="load_more_" data-res-max-page="<?php echo $max_num_page ?>" href="#">LOAD MORE <svg width="34" height="19" viewBox="0 0 34 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.0996 1L31.9996 9.6L22.0996 17.8" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                <path d="M30.65 9.60001H0" stroke="currentColor" stroke-width="1.45" stroke-miterlimit="10"></path>
                </svg></a>
				</div>
            </div>
         </div>
      </div>
   </div>
   <!-- Resource End -->