<?php
/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function fame_custom_enqueue_child_theme_styles() {
	wp_enqueue_style( 'fame-child-style', get_stylesheet_uri(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'fame_custom_enqueue_child_theme_styles', 11 );