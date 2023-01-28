<?php
/*
 * Codestar Framework Config
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

/**
 * Integrate - Codestar Framework
 */
require FAME_FRAMEWORK .'/theme-options/theme-options.php';
require FAME_FRAMEWORK .'/theme-options/theme-customizer.php';

/**
 * Remove Welcome Page - Codestar Framework
 */
add_filter( 'csf_welcome_page', '__return_false' );

/**
 * Codestar Framework - Changing Override Folder Path
 */
function fame_vt_cs_framework_override() {
  return 'inc/theme-options/theme-extend';
}
add_filter( 'csf_override', 'fame_vt_cs_framework_override' );

/**
 * Enqueue Google Fonts
 */
if ( ! function_exists( 'fame_vt_google_fonts' ) ) {
  function fame_vt_google_fonts() {

    $embed_fonts  = array();
    $query_args   = array();

    $body_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['body_font'] : '';
    $menu_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['menu_font'] : '';
    $sub_menu_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['sub_menu_font'] : '';
    $headings_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['headings_font'] : '';
    $shortcode_prime_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['shortcode_prime_font'] : '';
    $shortcode_secon_font_family       = cs_get_option('theme_typo') ? cs_get_option('theme_typo')['shortcode_secon_font'] : '';

    $typography = array(
      "1st" => $body_font_family,
      "2nd" => $menu_font_family,
      "3rd" => $sub_menu_font_family,
      "4th" => $headings_font_family,
      "5th" => $shortcode_prime_font_family,
      "6th" => $shortcode_secon_font_family,
    );

    if ( empty( $typography ) ) { return; }

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        $font_family = $font ? $font['font-family'] : 'Nunito';
        $font_weight  = $font ? ':'.$font['font-weight'] : ':400';
        $subset  = $font ? '&subset=' . $font['subset'] : '';
        if( $font ) {
          $query_args[]= $font_family . $font_weight . $subset;
        } else {
          $query_args[]= 'Nunito:normal|Nunito:600|Nunito Sans:normal';
        }
      }
      wp_enqueue_style( 'fame-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $query_args ) ), '//fonts.googleapis.com/css' ) ), array(), null );
    }

  }
}

/**
 * Enqueue Custom Google Fonts
 */
if ( ! function_exists( 'fame_custom_google_fonts' ) ) {
  function fame_custom_google_fonts() {

    $embed_fonts  = array();
    $query_args   = array();
    $typography   = cs_get_option( 'custom_typography' );

    if ( empty( $typography ) ) { return; }

    if ( ! empty( $typography ) ) {
      foreach ( $typography as $font ) {
        if ( ! empty( $font['custom_css'] ) ) {
          if( $font['custom_typo']['font-family'] ) {
            $family  = $font['custom_typo']['font-family'];
            $font_weight  = $font['custom_typo']['font-weight'] ? ':'.$font['custom_typo']['font-weight'] : ':400';
            $subset  = $font['custom_typo']['subset'] ? '&subset=' . $font['custom_typo']['subset'] : '';
            $query_args[]= $family . $font_weight . $subset;
          }
        }
      }
      wp_enqueue_style( 'fame-custom-google-fonts', esc_url( add_query_arg( 'family', urlencode( implode( '|', $query_args ) ), '//fonts.googleapis.com/css' ) ), array(), null );
    }

  }
}

/**
 * Custom Font Family
 */
if( ! function_exists( 'fame_custom_font_family' ) ) {

  function fame_custom_font_family( $fonts ) {

    $font_family = cs_get_option( 'custom_font_family' );

    if( ! empty( $font_family ) ) {
      foreach ( $font_family as $font ) {
        $name = $font['name'];
        $weight =  $font['weight'];
        $fonts[$name] = array( $weight );
      }
      return $fonts;
    }

  }
  add_filter( 'csf_field_typography_customwebfonts', 'fame_custom_font_family' );
}
