<?php
/**
 * Template part for displaying posts.
 */
// Metabox
global $post;
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_meta  = get_post_meta( $fame_id, 'post_type_metabox', true );

$fame_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fame_large_image = $fame_large_image[0];

$fame_metas_hide = (array) cs_get_option( 'theme_metas_hide' );
$date_format = cs_get_option('blog_date_format');
$fame_read_more_text = cs_get_option('read_more_text');
$fame_read_text = $fame_read_more_text ? $fame_read_more_text : esc_html__( 'READ MORE', 'fame' );
$date_format_actual = $date_format ? $date_format : '';

if(is_sticky()) {
  $sticky_class = ' sticky';
} else {
  $sticky_class = '';
}
if($fame_large_image) {
  $img_class = '';
} else {
  $img_class = ' no-img';
}
if ( function_exists( 'fame_post_share_option' ) && !in_array( 'share', $fame_metas_hide ) ) {
	$col_class = 'col-md-8';
} else {
	$col_class = 'col-md-12';
}
?>
<div class="news-item<?php echo esc_attr($sticky_class.$img_class); ?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class('fame-blog-post'); ?>>
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
			  <div class="fame-image">
			    <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($fame_large_image); ?>" alt="<?php the_title_attribute(); ?>"></a>
			  </div>
			<?php }
		} ?>
	  <div class="news-info">
	    <div class="news-meta">
	      <div class="row">
	        <div class="<?php echo esc_attr($col_class); ?>">
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
	          <h3 class="news-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_title(); ?></a></h3>
	        </div>
	        <?php if ( function_exists( 'fame_post_share_option' ) && !in_array( 'share', $fame_metas_hide ) ) { ?>
		        <div class="col-md-4 text-right">
		        	<?php	echo fame_post_share_option(); ?>
		        </div>
		      <?php } ?>
	      </div>
	    </div>
	    <?php
				$blog_excerpt = cs_get_option('theme_blog_excerpt');
				if ($blog_excerpt) {
					$blog_excerpt = $blog_excerpt;
				} else {
					$blog_excerpt = '55';
				}
				echo '<p>';
				fame_excerpt($blog_excerpt);
				echo '</p>';
				echo fame_wp_link_pages();
			?>
	    <div class="fame-link">
	      <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($fame_read_text); ?> <img src="<?php echo esc_url( FAME_IMAGES . '/icons/icon53@2x.png' ); ?>" alt="<?php echo esc_attr($fame_read_text); ?>" width="18"></a>
	    </div>
	  </div>
	</div>
</div>
<!-- #post-## -->
<?php
