<?php
// Metabox
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_id    = ( ! is_tag() && ! is_archive() && ! is_search() && ! is_404() && ! is_singular('testimonial') ) ? $fame_id : false;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );
// Header Style - ThemeOptions & Metabox
if ($fame_meta) {
  $fame_search_icon        = $fame_meta['search_icon'];
} else {
  $fame_search_icon        = cs_get_option('search_icon');
}

// Search Icon
if($fame_meta && $fame_search_icon != 'default') {
  $fame_search_icon = $fame_meta['search_icon'];
} else {
  $fame_search_icon = cs_get_option('search_icon');
}

$header_btns = cs_get_option('header_btns');
$fame_mobile_breakpoint = cs_get_option('mobile_breakpoint');
$fame_breakpoint = $fame_mobile_breakpoint ? $fame_mobile_breakpoint : '1199';
?>
<!-- Navigation & Search -->
<?php do_action( 'fame_before_menu_action' ); // Fame Action
if ( has_nav_menu( 'primary' ) ) { ?>
<nav class="fame-navigation" data-nav="<?php echo esc_attr($fame_breakpoint); ?>">
<?php
  if ($fame_meta) {
    $fame_choose_menu = $fame_meta['choose_menu'];
  } else { $fame_choose_menu = ''; }
  $fame_choose_menu = $fame_choose_menu ? $fame_choose_menu : '';
  wp_nav_menu(
    array(
      'menu'              => 'primary',
      'theme_location'    => 'primary',
      'container'         => '',
      'container_class'   => '',
      'container_id'      => '',
      'menu'              => $fame_choose_menu,
      'menu_class'        => '',
      'fallback_cb'       => 'fame_wp_bootstrap_navwalker::fallback',
      'walker'            => new fame_wp_bootstrap_navwalker()
    )
  );
?>
</nav> <!-- Container -->
<?php } do_action( 'fame_after_menu_action' ); // Fame Action ?>
<div class="header-links-wrap">
  <?php if($fame_search_icon === 'show') { ?>
  <div class="search-link">
    <a href="javascript:void(0);"><i class="fa fa-search" aria-hidden="true"></i></a>
  </div>
  <?php } echo do_shortcode($header_btns); ?>
</div><?php
