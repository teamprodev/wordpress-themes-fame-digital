<?php
/*
 * Admin Styles for Sensation Theme
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Category
global $post;
$fame_terms = wp_get_post_terms($post->ID,'portfolio_category');
foreach ($fame_terms as $term) {
  $fame_cat_class = 'cat-' . $term->slug;
}
$fame_count = count($fame_terms);
$i=0;
$fame_cat_class = '';
if ($fame_count > 0) {
  foreach ($fame_terms as $term) {
    $i++;
    $fame_cat_class .= 'cat-'. $term->slug .' ';
    if ($fame_count != $i) {
      $fame_cat_class .= '';
    } else {
      $fame_cat_class .= '';
    }
  }
}
$fame_portfolio_aqr = cs_get_option('portfolio_aqr');
$fame_read_more_text = cs_get_option('portfolio_read_more');
$fame_read_text = $fame_read_more_text ? $fame_read_more_text : esc_html__( 'VIEW DETAILS', 'fame' );
// Featured Image
$fame_large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' );
$fame_large_image = $fame_large_image[0];

if ($fame_portfolio_aqr) {
  $fame_featured_img = $fame_large_image;
} else {
  if(class_exists('Aq_Resize')) {
    $fame_portfolio_img = aq_resize( $fame_large_image, '500', '839', true );
  } else {$fame_portfolio_img = $fame_large_image;}
  $fame_featured_img = ( $fame_portfolio_img ) ? $fame_portfolio_img : $fame_large_image;
}
?>

<div class="masonry-item <?php echo esc_attr($fame_cat_class); ?>" data-category="<?php echo esc_attr($fame_cat_class); ?>">
  <div class="portfolio-item">
    <?php if($fame_large_image) { ?>
    <div class="fame-image">
      <a href="<?php echo esc_url( get_permalink() ); ?>"><img src="<?php echo esc_url($fame_featured_img); ?>" alt="<?php the_title_attribute(); ?>"></a>
    </div>
    <?php } ?>
    <div class="portfolio-info">
      <h3 class="portfolio-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(the_title()); ?></a></h3>
      <div class="fame-link">
        <a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html($fame_read_text); ?> <img src="<?php echo esc_url( FAME_IMAGES . '/icons/icon53@2x.png' ); ?>" width="18" alt="<?php echo esc_attr($fame_read_text); ?>"></a>
      </div>
    </div>
  </div>
</div>
<?php
