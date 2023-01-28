<?php
/**
 * Single Post.
 */
// Metabox
global $post;
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_meta  = get_post_meta( $fame_id, 'post_type_metabox', true );

$fame_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fame_large_image = $fame_large_image[0];

$date_format = cs_get_option('blog_date_format');
$date_format_actual = $date_format ? $date_format : '';
// Single Theme Option
$fame_metas_hide = (array) cs_get_option( 'theme_single_metas_hide' );

if($fame_large_image) {
  $img_class = '';
} else {
  $img_class = ' no-img';
}

$cat_list = get_the_category();
$tag_list = get_the_tags();
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('fame-blog-post'); ?>>
	<div class="fame-news-detail<?php echo esc_attr($img_class); ?>">
    <?php do_action( 'fame_before_single_content_action' ); // Fame Action ?>
    <?php if(get_post_format() === 'quote') {
			if ($fame_meta) {
				$quote_text = $fame_meta['quote_text'];
				$quote_author = $fame_meta['quote_author'];
				$quote_author_link = $fame_meta['quote_author_link'];
			} else {
				$quote_text = '';
				$quote_author = '';
				$quote_author_link = '';
			}
			if ($quote_text) {
			?>
				<blockquote class="blockquote-style-two">
	        <p><?php echo esc_html($quote_text); ?><span class="quote-icon"></span></p>
	        <?php if ($quote_author) { ?><cite><?php if ($quote_author_link) { ?><a href="<?php echo esc_url( $quote_author_link ); ?>"><?php echo esc_html($quote_author); ?></a><?php } else { ?><?php echo esc_html($quote_author); ?><?php } ?></cite><?php } ?>
	      </blockquote>
		  <?php }
		} else {
		  if ($fame_large_image) { ?>
			  <div class="news"><img src="<?php echo esc_url($fame_large_image); ?>" alt="<?php the_title_attribute(); ?>"></div>
			<?php }
		} ?>
		<div class="news-detail-wrap">
			<div class="news-meta">
	      <div class="row">
	        <div class="col-md-12">
	        	<?php if ( (!in_array( 'date', $fame_metas_hide )) || (!in_array( 'category', $fame_metas_hide )) ) { ?>
	        	<h5 class="news-date">
	        		<?php if ( !in_array( 'date', $fame_metas_hide ) ) { echo get_the_date($date_format_actual); }
	        		if ( !in_array( 'category', $fame_metas_hide ) ) {
					    $categories = get_the_category();
			        foreach ( $categories as $category ) : ?>
			          <a href="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a>
			        <?php endforeach; } ?>
	        	</h5>
		        <?php } ?>
	        </div>
	      </div>
	    </div>
	    <!-- Content -->
			<?php
			the_content();
			echo fame_wp_link_pages();
			?>
			<!-- Content -->
			<!-- FameWP -->
			<div class="fame-news-meta">
				<?php if ( !in_array( 'tag', $fame_metas_hide ) && $tag_list ) { ?>
        <div class="pull-left">
          <span class="meta-label"><?php esc_html_e( 'Tags:', 'fame' ); ?></span>
          <?php
			    $tags = get_the_tags();
		      foreach ( $tags as $tag ) : ?>
	          <span class="meta-tag"><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a></span>
		      <?php endforeach; ?>
        </div>
	      <?php } ?>
        <div class="pull-right">
          <?php if ( function_exists( 'fame_post_single_share_option' ) && !in_array( 'share', $fame_metas_hide ) ) {	echo fame_post_single_share_option(); } ?>
        </div>
      </div>
		</div>
    <?php do_action( 'fame_after_single_content_action' ); // Fame Action ?>
  </div>
	<!-- Author Info -->
	<?php	if( !in_array( 'author', $fame_metas_hide ) ) { echo fame_author_info(); } ?>
	<!-- Related Articles -->
	<?php
	$single_related_post = cs_get_option('single_related_post');
	$single_related_title = cs_get_option('single_related_title');
	$single_related_limit = cs_get_option('single_related_limit');
	$single_related_title = $single_related_title ? $single_related_title : esc_html__( 'Related Posts', 'fame' );
	$single_related_limit = $single_related_limit ? $single_related_limit : '2';

	$date_format = cs_get_option('blog_date_format');
	$fame_read_more_text = cs_get_option('read_more_text');
	$fame_read_text = $fame_read_more_text ? $fame_read_more_text : esc_html__( 'READ MORE', 'fame' );
	$date_format_actual = $date_format ? $date_format : '';

	if(!$single_related_post) {} else {
	$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => $single_related_limit, 'post__not_in' => array($post->ID) ) );
	if ($related) { ?>
	<div class="fame-related-posts">
	  <h3 class="related-post-title"><?php echo esc_html($single_related_title); ?></h3>
    <div class="row">
    <?php do_action( 'fame_before_related_post_action' ); // Fame Action ?>
    <?php
		if( $related ) foreach( $related as $post ) {
		setup_postdata($post);
    $related_large_image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
    $related_large_image = $related_large_image[0];

    if(class_exists('Aq_Resize')) {
			$blog_img = aq_resize( $related_large_image, '500', '410', true );
	   } else {$blog_img = $related_large_image;}
		$featured_img = ( $blog_img ) ? $blog_img : esc_url(FAME_IMAGES) . '/holders/500x410.png';
		?>
      <div class="col-md-6">
				<div class="post-item fame-item">
          <?php if ($related_large_image) { ?>
					  <div class="fame-image">
					    <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($featured_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
					  </div>
					<?php } ?>
          <div class="post-info">
            <h5 class="post-date"><?php echo get_the_date($date_format_actual); ?></h5>
            <h3 class="post-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a></h3>
            <div class="fame-link">
				      <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($fame_read_text); ?> <img src="<?php echo esc_url( FAME_IMAGES . '/icons/icon53@2x.png' ); ?>" alt="<?php echo esc_attr($fame_read_text); ?>" width="18"></a>
				    </div>
          </div>
        </div>
      </div>
		<?php	} wp_reset_postdata(); ?>
    <?php do_action( 'fame_after_related_post_action' ); // Fame Action ?>
    </div>
	</div>
	<?php	} } ?>
</div><!-- #post-## -->
<?php
