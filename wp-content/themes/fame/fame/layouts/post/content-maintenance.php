<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php
$fame_all_element_color  = cs_get_customize_option( 'all_element_colors' );
?>
<meta name="msapplication-TileColor" content="<?php echo esc_attr($fame_all_element_color); ?>">
<meta name="theme-color" content="<?php echo esc_attr($fame_all_element_color); ?>">
<link rel="profile" href="//gmpg.org/xfn/11">

<?php
wp_head();
if (is_elementor()) {
  $layout_class = 'container-fluid';
} else {
  $layout_class = 'container';
}
?>
</head>
	<body <?php body_class(); ?>>
    <div class="fame-mid-wrap vt-maintenance-mode">
      <div class="<?php echo esc_attr($layout_class); ?>">
        <div class="row">
          <div class="col-md-12">
            <?php
              $fame_page = get_post( cs_get_option('maintenance_mode_page') );
              if (is_elementor()) {
                echo ( is_object( $fame_page ) ) ? do_shortcode( '[fame_elementor_template id="'.$fame_page->ID.'"]' ) : '';
              } else {
                echo ( is_object( $fame_page ) ) ? do_shortcode( $fame_page->post_content ) : '';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>
<?php
