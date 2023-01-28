<?php
// Main Text
$fame_id    = ( isset( $post ) ) ? $post->ID : 0;
$fame_id    = ( is_home() ) ? get_option( 'page_for_posts' ) : $fame_id;
$fame_id    = ( fame_is_woocommerce_shop() ) ? wc_get_page_id( 'shop' ) : $fame_id;
$fame_meta  = get_post_meta( $fame_id, 'page_type_metabox', true );

$left_copyright_text = cs_get_option('copyright_text');
$right_copyright_text = cs_get_option('copyright_text_right');

$copyright_layout = cs_get_option('copyright_layout');

if ($copyright_layout === 'copyright-1') {
	$layout_class = 'pull-left';
	$seclayout_class = 'pull-right';
} elseif ($copyright_layout === 'copyright-2') {
	$layout_class = 'pull-right';
	$seclayout_class = 'pull-left';
} elseif ($copyright_layout === 'copyright-3') {
	$layout_class = 'col-sm-12 aligncenter';
} else {
	$layout_class = 'pull-left';
	$seclayout_class = 'pull-right';
}
?>
<!-- Copyright Bar -->
<?php if ($left_copyright_text) { ?>
  <div class="<?php echo esc_attr($layout_class); ?>">
  	<?php do_action( 'fame_before_copyright_left_action' ); // Fame Action ?>
    <?php echo do_shortcode($left_copyright_text); ?>
  	<?php do_action( 'fame_after_copyright_left_action' ); // Fame Action ?>
  </div>
<?php }
if ($right_copyright_text && $copyright_layout !== 'copyright-3') { ?>
  <div class="<?php echo esc_attr($seclayout_class); ?>">
		<?php do_action( 'fame_before_copyright_right_action' ); // Fame Action ?>
    <?php echo do_shortcode($right_copyright_text); ?>
		<?php do_action( 'fame_after_copyright_right_action' ); // Fame Action ?>
  </div>
<?php } ?>
<!-- Copyright Bar -->
<?php
