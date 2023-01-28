<?php
/*
 * All customizer related options for Fame theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'fame_csf_customizer';

  // Create customize options
  CSF::createCustomizeOptions( $prefix );

  // Primary Color
  CSF::createSection( $prefix, array(
    'name'        => 'elemets_color_section',
	  'title'       => esc_html__('Primary Color', 'fame'),
  	'priority' 		=> 1,
    'fields' => array(

      array(
	      'id'      => 'all_element_colors',
	      'type'    => 'color',
	      'title' => esc_html__('Elements Color', 'fame'),
				'desc'    => esc_html__('This is theme primary color, means it\'ll affect all elements that have default color of our theme primary color.', 'fame'),
	      'default' => '#ef3d44',
	    ),

    )
  ) );

  // Secondary Color
  CSF::createSection( $prefix, array(
    'name'        => 'elemets_sec_color_section',
	  'title'       => esc_html__('Secondary Color', 'fame'),
  	'priority' 		=> 2,
    'fields' => array(

      array(
	      'id'      => 'all_element_secondary_colors',
	      'type'    => 'color',
	      'title' => esc_html__('Elements Secondary Color', 'fame'),
				'desc'    => esc_html__('This is theme secondary color, means it\'ll affect all elements that have default color of our theme secondary color.', 'fame'),
	      'default' => '#3d59fa',
	    ),

    )
  ) );

  // Header Color
  CSF::createSection( $prefix, array(
	  'id'        => 'header_color_section',
	  'title'       => esc_html__('01. Header Colors', 'fame'),
	  'priority' => 4,
	) );

	// Normal Header
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'header_color_section',
    'name'        => 'normal_header_section',
	  'title'       => esc_html__('Normal Header', 'fame'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Main Menu Colors', 'fame'),
      ),
      array(
        'id'        => 'header_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'fame'),
      ),
	    array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sub-Menu Colors', 'fame'),
      ),
      array(
        'id'        => 'submenu_bg_color',
        'type'      => 'color',
        'title'     => esc_html__('Background Color', 'fame'),
      ),
	    array(
        'id'        => 'submenu_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'fame'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Link Colors', 'fame'),
      ),
      array(
        'id'        => 'right_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'fame'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Header Button Colors', 'fame'),
      ),
      array(
        'id'        => 'button_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Text Color', 'fame'),
      ),
      array(
        'id'        => 'button_bg_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Background Color', 'fame'),
      ),
      array(
        'id'        => 'button_border_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Border Color', 'fame'),
      ),

    )
  ) );

  // Mobile Menu
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'header_color_section',
    'name'        => 'mobile_menu_section',
	  'title'       => esc_html__('Mobile Menu', 'fame'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Mobile Menu Colors', 'fame'),
      ),
      array(
        'id'        => 'mobile_menu_color',
        'type'      => 'color_group',
        'title' => esc_html__('Menu Colors', 'fame'),
        'options'   => array(
          'toggle_color' => 'Menu Toggle Color',
          'bg_color' => 'Menu Background Color',
          'border_color' => 'Border Color',
        )
      ),      
      array(
        'id'        => 'mobile_menu_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Link Color', 'fame'),
      ),
	    array(
        'id'        => 'mobile_menu_expand_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Menu Expand Color', 'fame'),
      ),
      array(
        'id'        => 'mobile_menu_expand_bg_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Menu Expand Background Color', 'fame'),
      ),	    

    )
  ) );

  // Title Bar
  CSF::createSection( $prefix, array(
    'name'        => 'titlebar_section',
	  'title'       => esc_html__('02. Title Bar Colors', 'fame'),
	  'priority' => 6,
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Title Colors', 'fame'),
      ),
      array(
	      'id'        => 'titlebar_title_color',
	      'type'      => 'color',
	      'title' => esc_html__('Title Color', 'fame'),
	    ),

    )
  ) );

  // Content
  CSF::createSection( $prefix, array(
	  'id'        => 'content_section',
	  'title'       => esc_html__('03. Content Colors', 'fame'),
	  'desc' => esc_html__('This is all about content area text and heading colors.', 'fame'),
	  'priority' => 7,
	) );

	// Content Color
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'content_section',
    'name'          => 'content_text_section',
    'title'         => esc_html__('Content Text', 'fame'),
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Body Content', 'fame'),
      ),
      array(
	      'id'      => 'body_color',
	      'type'    => 'color',
	      'title'   => esc_html__('Body & Content Color', 'fame'),
	    ),
      array(
        'id'        => 'body_links_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Body Links Color', 'fame'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sidebar Content', 'fame'),
      ),
      array(
	      'id'      => 'sidebar_content_color',
	      'type'    => 'color',
	      'title'   => esc_html__('Sidebar Content Color', 'fame'),
	    ),
      array(
        'id'        => 'sidebar_links_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Sidebar Links Color', 'fame'),
      ),    

    )
  ) );

  // Headings Color
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'content_section',
    'name'          => 'content_heading_section',
    'title'         => esc_html__('Headings', 'fame'),
    'fields' => array(

      array(
	      'id'        => 'content_heading_color',
	      'type'      => 'color_group',
	      'title' => esc_html__('Headings', 'fame'),
	      'options'   => array(
	        'content_heading_color' => 'Content Heading',
	        'sidebar_heading_color' => 'Sidebar Heading',
	      )
	    ),   

    )
  ) );

  // Footer
  CSF::createSection( $prefix, array(
	  'id'        => 'footer_section',
	  'title'       => esc_html__('04. Footer Colors', 'fame'),
	  'desc' => esc_html__('This is all about footer settings. Make sure you\'ve enabled your needed section at : SaaSpot > Theme Options > Footer', 'fame'),
	  'priority' => 8,
	) );

  // Footer Widget Colors
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'footer_section',
    'name'        => 'footer_widget_section',
	  'title'       => esc_html__('Widget Block', 'fame'),
    'fields' => array(

      array(
	      'id'        => 'footer_colors',
	      'type'      => 'color_group',
	      'title' => esc_html__('Footer Colors', 'fame'),
	      'options'   => array(
	        'footer_bg_color' => 'Background Color',
	        'footer_heading_color' => 'Heading Color',
	        'footer_text_color' => 'Content Color',
	      )
	    ),
	    array(
        'id'        => 'footer_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Footer Link Color', 'fame'),
      ),

    )
  ) );

  // Footer Copyright Colors
  CSF::createSection( $prefix, array(
  	'parent'   		=> 'footer_section',
    'name'        => 'copyright_section',
	  'title'       => esc_html__('Copyright Block', 'fame'),
    'fields' => array(

      array(
	      'id'        => 'copyright_colors',
	      'type'      => 'color_group',
	      'title' => esc_html__('Copyright Colors', 'fame'),
	      'options'   => array(
	        'copyright_border_color' => 'Border Color',
	        'copyright_text_color' => 'Content Color',
	      )
	    ),
	    array(
        'id'        => 'copyright_link_color',
        'type'      => 'link_color',
        'title'     => esc_html__('Copyright Link Color', 'fame'),
      ),

    )
  ) );

}

