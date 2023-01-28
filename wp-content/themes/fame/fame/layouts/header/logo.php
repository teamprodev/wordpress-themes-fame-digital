<?php
// Logo Image
$fame_brand_logo_default = cs_get_option('brand_logo_default') ? cs_get_option('brand_logo_default')['url'] : '';

// Metabox - Header Transparent
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
// Retina Size
$fame_retina_width = cs_get_option('logo_width_height') ? cs_get_option('logo_width_height')['width'] : '';
$fame_retina_height = cs_get_option('logo_width_height') ? cs_get_option('logo_width_height')['height'] : '';
// Logo Spacings
$fame_brand_logo_unit = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['unit'] : '';
$fame_brand_logo_top = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['top'] : '';
$fame_brand_logo_bottom = cs_get_option('brand_logo_top_bottom') ? cs_get_option('brand_logo_top_bottom')['bottom'] : '';
if ($fame_brand_logo_top !== '') {
	$fame_brand_logo_top = $fame_brand_logo_top ? 'padding-top:'.$fame_brand_logo_top.$fame_brand_logo_unit.';' : '';
} else { $fame_brand_logo_top = ''; }
if ($fame_brand_logo_bottom !== '') {
	$fame_brand_logo_bottom = $fame_brand_logo_bottom ? 'padding-bottom:'.$fame_brand_logo_bottom.$fame_brand_logo_unit.';' : '';
} else { $fame_brand_logo_bottom = ''; }

$fame_brand_logo_top = $fame_brand_logo_top ? $fame_brand_logo_top : '';
$fame_brand_logo_bottom = $fame_brand_logo_bottom ? $fame_brand_logo_bottom : '';
?>
<div class="fame-brand" style="<?php echo esc_attr($fame_brand_logo_top); echo esc_attr($fame_brand_logo_bottom); ?>">
  <?php do_action( 'fame_before_logo_action' ); // Fame Action ?>
	<a href="<?php echo esc_url(home_url( '/' )); ?>">
	<?php

		if ($fame_brand_logo_default) {
			echo '<img src="'. esc_url($fame_brand_logo_default) .'" alt="'. esc_attr(get_bloginfo( 'name' )) . '" class="default-logo normal-logo" width="'. esc_attr($fame_retina_width) .'" height="'. esc_attr($fame_retina_height) .'">';
		} else {
			echo '<div class="text-logo">'. esc_html(get_bloginfo( 'name' )) . '</div>';
		}
	echo '</a>';
	?>
  <?php do_action( 'fame_after_logo_action' ); // Fame Action ?>
</div><?php
