<?php
// Metabox
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_id    = ( !is_tag() && !is_archive() && !is_search()) ? $fame_id : false;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
if ($fame_meta) {
  $fame_title_bar_padding = $fame_meta['title_area_spacings'];
} else {
  $fame_title_bar_padding = '';
}
// Padding - Theme Options
if ($fame_title_bar_padding && $fame_title_bar_padding !== 'padding-default') {
  $fame_title_spacings_unit = $fame_meta['title_top_bottom_padding'] ? $fame_meta['title_top_bottom_padding']['unit'] : '';
	$fame_title_top_spacings = $fame_meta['title_top_bottom_padding'] ? $fame_meta['title_top_bottom_padding']['top'] : '';
	$fame_title_bottom_spacings = $fame_meta['title_top_bottom_padding'] ? $fame_meta['title_top_bottom_padding']['bottom'] : '';
	if ($fame_title_bar_padding === 'padding-custom') {
		$fame_title_top_spacings = $fame_title_top_spacings ? 'padding-top:'.$fame_title_top_spacings.$fame_title_spacings_unit.';' : '';
		$fame_title_bottom_spacings = $fame_title_bottom_spacings ? 'padding-bottom:'.$fame_title_bottom_spacings.$fame_title_spacings_unit.';' : '';
		$fame_custom_padding = $fame_title_top_spacings . $fame_title_bottom_spacings;
	} else {
		$fame_custom_padding = '';
	}
} else {
	$fame_title_bar_padding = cs_get_option('title_bar_padding');
  $fame_titlebar_padding_unit = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['unit'] : '';
	$fame_titlebar_top_padding = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['top'] : '';
	$fame_titlebar_bottom_padding = cs_get_option('titlebar_top_bottom_padding') ? cs_get_option('titlebar_top_bottom_padding')['bottom'] : '';
	if ($fame_title_bar_padding === 'padding-custom') {
		$fame_titlebar_top_padding = $fame_titlebar_top_padding ? 'padding-top:'.$fame_titlebar_top_padding.$fame_titlebar_padding_unit.';' : '';
		$fame_titlebar_bottom_padding = $fame_titlebar_bottom_padding ? 'padding-bottom:'.$fame_titlebar_bottom_padding.$fame_titlebar_padding_unit.';' : '';
		$fame_custom_padding = $fame_titlebar_top_padding . $fame_titlebar_bottom_padding;
	} else {
		$fame_custom_padding = '';
	}
}

// Banner Type - Meta Box
if ($fame_meta) {
	$fame_banner_type = $fame_meta['banner_type'];
} else { $fame_banner_type = ''; }

// Background - Type
if( $fame_meta && ($fame_meta['title_area_bg']['background-color'] || $fame_meta['title_area_bg']['background-image']['url']) ) {

  $image      = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-image']['url'] : '';
  $repeat     = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-repeat'] : '';
  $position   = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-position'] : '';
  $attachment = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-attachment'] : '';
  $size       = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-size'] : '';
  $origin     = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-origin'] : '';
  $clip       = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-clip'] : '';
  $blend      = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-blend-mode'] : '';
  $bg_color   = $fame_meta['title_area_bg'] ? $fame_meta['title_area_bg']['background-color'] : '';
} else {
  $image      = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-image']['url'] : '';
  $repeat     = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-repeat'] : '';
  $position   = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-position'] : '';
  $attachment = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-attachment'] : '';
  $size       = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-size'] : '';
  $origin     = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-origin'] : '';
  $clip       = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-clip'] : '';
  $blend      = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-blend-mode'] : '';
  $bg_color   = cs_get_option('titlebar_bg') ? cs_get_option('titlebar_bg')['background-color'] : '';
}
if ($image || $bg_color) {
  $background_image       = ( ! empty( $image ) ) ? 'background-image: url(' . $image . ');' : '';
  $background_repeat      = ( ! empty( $image ) && ! empty( $repeat ) ) ? ' background-repeat: ' . $repeat . ';' : '';
  $background_position    = ( ! empty( $image ) && ! empty( $position ) ) ? ' background-position: ' . $position . ';' : '';
  $background_attachment  = ( ! empty( $image ) && ! empty( $attachment ) ) ? ' background-attachment: ' . $attachment . ';' : '';
  $background_size        = ( ! empty( $image ) && ! empty( $size ) ) ? ' background-size: ' . $size . ';' : '';
  $background_origin      = ( ! empty( $image ) && ! empty( $origin ) ) ? ' background-origin: ' . $origin . ';' : '';
  $background_clip        = ( ! empty( $image ) && ! empty( $clip ) ) ? ' background-clip: ' . $clip . ';' : '';
  $background_blend       = ( ! empty( $image ) && ! empty( $blend ) ) ? ' background-blend-mode: ' . $blend . ';' : '';
  $background_color       = ( ! empty( $bg_color ) ) ? ' background-color: ' . $bg_color . ';' : '';

  $background_style       = ( ! empty( $image ) ) ? $background_image . $background_repeat . $background_position . $background_attachment . $background_size . $background_origin . $background_clip . $background_blend : '';
  $title_bg = ( ! empty( $background_style ) || ! empty( $background_color ) ) ? $background_style . $background_color : '';

} else {
  $title_bg = '';
}

$error_page_title = cs_get_option('error_page_title');
$title = $error_page_title ? $error_page_title : '404';

if($fame_banner_type === 'hide-title-area') { // Hide Title Area
} elseif($fame_meta && $fame_banner_type === 'revolution-slider') {
   echo do_shortcode($fame_meta['page_revslider']);
} elseif($fame_meta && $fame_banner_type === 'elementor-templates') {
   echo do_shortcode('[fame_elementor_template id="'.$fame_meta['ele_templates'].'"]');
} else { ?> <!-- FameWP -->
<!-- Hanor Page Title -->
<div class="fame-page-title <?php echo esc_attr($fame_title_bar_padding); ?>" style="<?php echo esc_attr($fame_custom_padding . $title_bg); ?>">
  <div class="container">
    <?php do_action( 'fame_before_title_action' ); // Fame Action ?>
    <?php if( is_404() ) { ?>
      <h2 class="page-title"><?php echo esc_html($title); ?></h2>
    <?php } else { ?>
      <h2 class="page-title"><?php echo esc_html(fame_title_area()); ?></h2>
    <?php } ?>
    <?php do_action( 'fame_after_title_action' ); // Fame Action ?>
  </div>
</div>
<?php }
