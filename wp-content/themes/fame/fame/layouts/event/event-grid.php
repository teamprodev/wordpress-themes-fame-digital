<div class="event-mid-wrap">
  <div class="container">
    <div class="event-info-wrap">
      <div class="row">
        <?php
          // Pagination
          $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
          $args = array(
            // other query params here,
            'paged' => $paged,
            'post_type' => 'tribe_events',
          );
          $fame_evnt = new WP_Query( $args );
            if ($fame_evnt->have_posts()) : while ($fame_evnt->have_posts()) : $fame_evnt->the_post();
              // Category
              global $post;
              $terms = wp_get_post_terms($post->ID,'tribe_events_cat');
              foreach ($terms as $term) {
                $cat_class = 'cat-' . $term->slug;
              }
              $count = count($terms);
              $i=0;
              $cat_class = '';
              if ($count > 0) {
                foreach ($terms as $term) {
                  $i++;
                  $cat_class .= 'cat-'. $term->slug .' ';
                  if ($count != $i) {
                    $cat_class .= '';
                  } else {
                    $cat_class .= '';
                  }
                }
              }
              // Featured Image
              $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
              $large_image = $large_image[0];
              if ($large_image) {
                if(class_exists('Aq_Resize')) {
                  $event_grid_image = aq_resize( $large_image, '780', '560', true );
                } else {
                  $event_grid_image = $large_image;
                }
              }
              $event_grid_image = $event_grid_image ? $event_grid_image : esc_url(FAME_IMAGES) . '/holders/800x575.png';
              if($large_image) {
                $img_class = '';
              } else {
                $img_class = ' no-img';
              }

            $post_meta = get_post_meta( get_the_ID() );
            $s_date = $post_meta['_EventStartDate'];
            $s_createDate = new DateTime($s_date[0]);
            $s_year = $s_createDate->format('Y');
            $s_month = $s_createDate->format('M');
            $s_day = $s_createDate->format('d');
            $s_full_date = tribe_get_start_date( null, false, 'M d Y' );
            $s_hour = $s_createDate->format('H:i a');
            // end date
            $e_date = $post_meta['_EventEndDate'];
            $e_createDate = new DateTime($e_date[0]);
            $e_year = $e_createDate->format('Y');
            $e_month = $e_createDate->format('M');
            $e_day = $e_createDate->format('d');
            $e_full_date = $e_createDate->format('d M Y');
            $e_hour = $e_createDate->format('H:i a');

            $venu_details = tribe_get_venue_details ( get_the_ID() ); ?>
            <div class="col-md-6">
              <div class="event-item fame-item">
                <div class="fame-image<?php echo esc_attr($img_class); ?>">
                  <?php if($large_image) { ?><a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($event_grid_image); ?>" alt="<?php the_title_attribute(); ?>"></a><?php } ?>
                  <div class="event-time">
                    <h2 class="event-date"><?php echo esc_html( $e_day ); ?></h2>
                    <h4 class="event-month"><?php echo esc_html( $e_month ); ?></h4>
                  </div>
                </div>
                <div class="event-info">
                  <div class="event-meta">
                    <ul>
                      <li>
                        <?php
                          $category_list = wp_get_post_terms($post->ID, 'tribe_events_cat');
                          foreach ($category_list as $term) {
                          $event_term_link = get_term_link( $term );
                            echo '<a href="'. esc_url($event_term_link) .'">'. esc_html($term->name) .'</a> ';
                          }
                        ?>
                      </li>
                      <li><?php echo esc_html($s_hour); ?> <?php esc_html_e('to', 'fame' ); ?> <?php echo esc_html($e_hour); ?></li>
                      <?php if(!empty($venu_details['address']) || !empty($venu_details['linked_name'])){ ?>
                      <li>
                        <?php
                        $map_link = esc_url( tribe_get_map_link( $post->ID ) );
                        if ($map_link) { echo '<a href="'.$map_link.'" target="_blank">'; }
                        if(!empty($venu_details['linked_name'])){
                          echo esc_html($venu_details['linked_name']);
                        } else {
                          echo esc_html($venu_details['address']);
                        }
                        if ($map_link) { echo '</a>'; }
                        ?>
                      </li>
                      <?php } ?>
                    </ul>
                  </div>
                  <h3 class="event-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html(the_title()); ?></a></h3>
                  <div class="fame-link">
                    <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('READ MORE', 'fame' ); ?> <img src="<?php echo esc_url( FAME_IMAGES . '/icons/icon53@2x.png' ); ?>" alt="<?php esc_attr_e('READ MORE', 'fame' ); ?>" width="18"></a>
                  </div>
                </div>
              </div>
            </div>
            <?php
          endwhile;
          endif;
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </div>
</div>
<?php
