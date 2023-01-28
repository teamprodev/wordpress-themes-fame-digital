<?php
/*
 * All Theme Options for Fame theme.
 * Author & Copyright: VictorThemes
 * URL: http://themeforest.net/user/VictorThemes
 */

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  // Set a unique slug-like ID
  $prefix = 'fame_csf_theme_options';

  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title'      => FAME_NAME . esc_html__(' Options', 'fame'),
    'menu_slug'       => sanitize_title(FAME_NAME) . '_options',
    'menu_type'       => 'menu',
    'menu_icon'       => 'dashicons-awards',
    'menu_position'   => '4',
    'ajax_save'       => false,
    'show_reset_all'  => true,
    'framework_title' => FAME_NAME .' <small>V-'. FAME_VERSION .' by <a href="'. FAME_BRAND_URL .'" target="_blank">'. FAME_BRAND_NAME .'</a></small>',
  ) );

  // Brand
  CSF::createSection( $prefix, array(
    'name'     => 'theme_brand',
    'title'    => esc_html__('Logo', 'fame'),
    'icon'     => 'fa fa-bookmark',
    'fields' => array(

      // Site Logo
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Site Logo', 'fame'),
      ),
      array(
        'id'    => 'brand_logo_default',
        'type'  => 'media',
        'url'   => false,
        'title' => esc_html__('Logo', 'fame'),
        'desc' => esc_html__('Upload your 2x size of logo here. It\'ll comfortable for retina screens.', 'fame'),
        'button_title' => esc_html__('Add Logo', 'fame'),
      ),
      array(
        'id'    => 'logo_width_height',
        'type'  => 'dimensions',
        'title'       => esc_html__('Logo Width & Height', 'fame'),
        'unit'  => false,
      ),
      array(
        'id'    => 'brand_logo_top_bottom',
        'type'  => 'spacing',
        'title' => esc_html__('Logo Top & Bottom Space', 'fame'),
        'left'  => false,
        'right' => false,
      ),

      // WordPress Admin Logo
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('WordPress Admin Logo', 'fame'),
      ),
      array(
        'id'    => 'brand_logo_wp',
        'type'  => 'media',
        'url'   => false,
        'title' => esc_html__('Login logo', 'fame'),
        'desc' => esc_html__('Upload your WordPress login page logo here.', 'fame'),
        'button_title' => esc_html__('Add Login logo', 'fame'),
      ),

    )
  ) );

  // General
  CSF::createSection( $prefix, array(
    'name'     => 'theme_general',
    'title'    => esc_html__('General', 'fame'),
    'icon'     => 'fa fa-wrench',
    'fields' => array(
      
      array(
        'id'       => 'sticky_header',
        'type'     => 'switcher',
        'title'    => esc_html__('Sticky Header', 'fame'),
        'desc'     => esc_html__('Turn On if you want your naviagtion bar on sticky.', 'fame'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'id'       => 'sticky_footer',
        'type'     => 'switcher',
        'title'    => esc_html__('Sticky Footer', 'fame'),
        'desc'     => esc_html__('If you turn this ON the footer will be sticky.', 'fame'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'       => 'theme_preloader',
        'type'     => 'switcher',
        'title'    => esc_html__('Preloader', 'fame'),
        'desc'     => esc_html__('Turn off if you don\'t want preloader.', 'fame'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
      ),
      array(
        'id'       => 'theme_btotop',
        'type'     => 'switcher',
        'title'    => esc_html__('Back To Top', 'fame'),
        'desc'     => esc_html__('Turn off if you don\'t want back to top button.', 'fame'),
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'id'        => 'search_icon',
        'type'      => 'select',
        'title'     => esc_html__('Search Icon', 'fame'),
        'options'   => array(
          'hide'   => 'Hide',
          'show' => 'Show',
        ),
      ),
      array(
        'id'          => 'mobile_breakpoint',
        'type'        => 'text',
        'title'       => esc_html__('Mobile Menu Breakpoint', 'fame'),
        'desc' => esc_html__('Just put numeric value only. Like : 1199. Don\'t use px or any other units.', 'fame'),
      ),
      array(
        'id'       => 'theme_img_resizer',
        'type'     => 'switcher',
        'title'    => esc_html__('Disable Image Resizer?', 'fame'),
        'desc'     => esc_html__('Turn on if you don\'t want image resizer.', 'fame'),
      ),

    )
  ) );

  // Header Parent
  CSF::createSection( $prefix, array(
    'id'     => 'theme_header_tab',
    'title'    => esc_html__('Header', 'fame'),
    'icon'     => 'fa fa-bars',
  ) );

  // Design
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_header_tab',
    'name'     => 'header_design_tab',
    'title'    => esc_html__('Design', 'fame'),
    'icon'     => 'fa fa-magic',
    'fields' => array(

      array(
        'id'       => 'need_content',
        'type'     => 'switcher',
        'title' => esc_html__('Need Header Content', 'fame'),
        'default' => true,
      ),
      array(
        'id'              => 'header_btns',
        'title'           => esc_html__('Header Buttons', 'fame'),
        'desc'            => esc_html__('Add your header buttons here. Example : Buttons', 'fame'),
        'type'            => 'textarea',
        'shortcoder'      => 'fame_vt_shortcodes',
        'dependency'   => array('need_content', '==', 'true'),
      ),

    )
  ) );

  // Title Bar
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_header_tab',
    'name'     => 'header_banner_tab',
    'title'    => esc_html__('Title Bar (or) Banner', 'fame'),
    'icon'     => 'fa fa-bullhorn',
    'fields' => array(

      array(
        'id'       => 'need_title_bar',
        'type'     => 'switcher',
        'title'   => esc_html__('Title Bar', 'fame'),
        'desc'   => esc_html__('If you want title bar in your sub-pages, please turn this ON.', 'fame'),
        'default'     => true,
      ),
      array(
        'id'             => 'title_bar_padding',
        'type'           => 'select',
        'title'          => esc_html__('Padding Spaces Top & Bottom', 'fame'),
        'options'        => array(
          'padding-default' => esc_html__('Default Spacing', 'fame'),
          'padding-xs' => esc_html__('Extra Small Padding', 'fame'),
          'padding-sm' => esc_html__('Small Padding', 'fame'),
          'padding-md' => esc_html__('Medium Padding', 'fame'),
          'padding-lg' => esc_html__('Large Padding', 'fame'),
          'padding-xl' => esc_html__('Extra Large Padding', 'fame'),
          'padding-no' => esc_html__('No Padding', 'fame'),
          'padding-custom' => esc_html__('Custom Padding', 'fame'),
        ),
        'dependency'   => array( 'need_title_bar', '==', 'true' ),
      ),
      array(
        'id'    => 'titlebar_top_bottom_padding',
        'type'  => 'spacing',
        'title' => esc_html__('Title Bar Top & Bottom Space', 'fame'),
        'left'  => false,
        'right' => false,
        'dependency'   => array( 'title_bar_padding|need_title_bar', '==|==', 'padding-custom|true' ),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Background Options', 'fame'),
      ),
      array(
        'id'      => 'titlebar_bg',
        'type'    => 'background',
        'title'   => esc_html__('Background', 'fame'),
        'background_color'      => true,
        'background_image'      => true,
        'background-position'   => true,
        'background_repeat'     => true,
        'background_attachment' => true,
        'background_size'       => true,
        'background_origin'     => true,
        'background_clip'       => true,
        'background_blend_mode' => true,
        'dependency' => array( 'need_title_bar', '==', 'true' ),
      ),

    )
  ) );

  // Footer
  CSF::createSection( $prefix, array(
    'name'     => 'footer_section',
    'title'    => esc_html__('Footer', 'fame'),
    'icon'     => 'fa fa-ellipsis-h',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Footer Widget Layout', 'fame')
      ),
      array(
        'id'    => 'footer_widget_block',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Widget Block', 'fame'),
        'desc' => esc_html__('If you turn this ON, then Goto : Appearance > Widgets. There you can see Footer Widget 1,2,3 or 4 Widget Area, add your widgets there.', 'fame'),
        'default' => true,
      ),
      array(
        'id'    => 'footer_widget_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Widget Layouts', 'fame'),
        'desc' => esc_html__('Choose your footer widget layouts.', 'fame'),
        'options' => array(
          1   => FAME_CS_IMAGES . '/footer/footer-1.png',
          2   => FAME_CS_IMAGES . '/footer/footer-2.png',
          3   => FAME_CS_IMAGES . '/footer/footer-3.png',
          4   => FAME_CS_IMAGES . '/footer/footer-4.png',
          5   => FAME_CS_IMAGES . '/footer/footer-5.png',
          6   => FAME_CS_IMAGES . '/footer/footer-6.png',
          7   => FAME_CS_IMAGES . '/footer/footer-7.png',
          8   => FAME_CS_IMAGES . '/footer/footer-8.png',
          9   => FAME_CS_IMAGES . '/footer/footer-9.png',
          10  => FAME_CS_IMAGES . '/footer/footer-10.png',
        ),
        'default' => 8,
        'dependency'  => array('footer_widget_block', '==', 'true'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Footer Top Widgets', 'fame')
      ),
      array(
        'id'        => 'hide_footer_top',
        'type'      => 'select',
        'title'     => esc_html__('Footer Top Widget', 'fame'),
        'options'   => array(
          'hide'   => 'Hide',
          'show' => 'Show',
        ),
      ),
      array(
        'id'      => 'footer_top_bg',
        'type'  => 'media',
        'url'   => false,
        'title'   => esc_html__('Background Image', 'fame'),        
        'dependency'  => array('hide_footer_top', '==', 'show'),
      ),
      array(
        'id'            => 'footer_top_title',
        'type'          => 'text',
        'title'         => esc_html__('Title', 'fame'),
        'desc'          => esc_html__('Enter your title.', 'fame'),
        'dependency'  => array('hide_footer_top', '==', 'show'),
      ),
      array(
        'id'              => 'footer_top_subtitle',
        'type'            => 'textarea',
        'title'           => esc_html__('Sub Title', 'fame'),
        'desc'            => esc_html__('Enter your sub title.', 'fame'),
        'dependency'  => array('hide_footer_top', '==', 'show'),
      ),
      array(
        'id'              => 'footer_top_content',
        'title'           => esc_html__('Content', 'fame'),
        'desc'            => esc_html__('Your form shortcode.', 'fame'),
        'type'            => 'textarea',
        'shortcoder'      => 'fame_vt_shortcodes',
        'dependency'  => array('hide_footer_top', '==', 'show'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Copyright Layout', 'fame')
      ),
      array(
        'id'    => 'need_copyright',
        'type'  => 'switcher',
        'title' => esc_html__('Enable Copyright Section', 'fame'),
        'default' => true,
      ),
      array(
        'id'    => 'copyright_layout',
        'type'  => 'image_select',
        'title' => esc_html__('Select Copyright Layout', 'fame'),
        'options'      => array(
          'copyright-1'    => FAME_CS_IMAGES .'/footer/copyright-1.png',
          'copyright-2'    => FAME_CS_IMAGES .'/footer/copyright-2.png',
          'copyright-3'    => FAME_CS_IMAGES .'/footer/copyright-3.png',
          ),
        'default'      => 'copyright-1',
        'dependency'     => array('need_copyright', '==', 'true'),
      ),
      array(
        'id'              => 'copyright_text',
        'title'           => esc_html__('Copyright Text', 'fame'),
        'desc'            => esc_html__('Helpful shortcodes: [fame_current_year] [fame_home_url] or any shortcode.', 'fame'),
        'type'            => 'textarea',
        'shortcoder'      => 'fame_vt_shortcodes',
        'dependency'      => array('need_copyright', '==', 'true'),
      ),
      array(
        'id'              => 'copyright_text_right',
        'title'           => esc_html__('Copyright Right Text', 'fame'),
        'desc'            => esc_html__('Add any shortcode.', 'fame'),
        'type'            => 'textarea',
        'shortcoder'      => 'fame_vt_shortcodes',
        'dependency'   => array('need_copyright|copyright_layout', '==|!=', 'true|copyright-3'),
      ),

    )
  ) );

  // Design Parent
  CSF::createSection( $prefix, array(
    'id'     => 'theme_design',
    'title'    => esc_html__('Design', 'fame'),
    'icon'     => 'fa fa-magic',
  ) );

  // Colors
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_design',
    'name'     => 'theme_color_section',
    'title'    => esc_html__('Colors', 'fame'),
    'icon'     => 'fa fa-eyedropper',
    'fields' => array(

      array(
        'type'    => 'heading',
        'content' => esc_html__('Color Options', 'fame'),
      ),
      array(
        'type'    => 'content',
        'content' => esc_html__('All color options are available in our theme customizer. The reason of we used customizer options for color section is because, you can choose each part of color from there and see the changes instantly using customizer. Highly customizable colors are in Appearance > Customize', 'fame'),
      ),

    )
  ) );

  // Typography
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_design',
    'name'     => 'theme_typo_section',
    'title'    => esc_html__('Typography', 'fame'),
    'icon'     => 'fa fa-header',
    'fields' => array(

      array(
        'id'            => 'theme_typo',
        'type'          => 'accordion',
        'title'         => esc_html__('Typography', 'fame'),
        'accordions'    => array(

          array(
            'title'     => esc_html__('Body Typography', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'body_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'body_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),
          array(
            'title'     => esc_html__('Menu Typography', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'menu_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'menu_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Sub Menu Typography', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'sub_menu_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'sub_menu_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Headings Typography', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'headings_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'headings_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Shortcode Elements Primary Font', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'shortcode_prime_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'shortcode_prime_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),
          array(
            'title'  => esc_html__('Shortcode Elements Secondary Font', 'fame'),
            'fields'    => array(
              array(
                'id'                 => 'shortcode_secon_font',
                'type'               => 'typography',
                'title'              => esc_html__('Typography', 'fame'),
                'font_family'        => true,
                'font_weight'        => true,
                'font_style'         => true,
                'font_size'          => true,
                'line_height'        => true,
                'letter_spacing'     => true,
                'text_align'         => true,
                'text-transform'     => true,
                'color'              => true,
                'subset'             => true,
                'backup_font_family' => true,
                'font_variant'       => true,
                'word_spacing'       => true,
                'text_decoration'    => true,
                'default'            => array(
                  'font-family'      => 'Nunito Sans',
                  'type'             => 'google',
                ),
              ),
              array(
                'id'              => 'shortcode_secon_css',
                'type'            => 'textarea',
                'title'           => esc_html__('Custom CSS', 'fame'),
                'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
              ),
            )
          ),

        )
      ),

      array(
        'id'        => 'custom_typography',
        'type'      => 'group',
        'title'     => esc_html__('Custom Typography', 'fame'),
        'fields'    => array(
          array(
            'id'    => 'custom_title',
            'type'  => 'text',
            'title' => esc_html__('Title', 'fame'),
          ),
          array(
            'id'                 => 'custom_typo',
            'type'               => 'typography',
            'title'              => esc_html__('Typography', 'fame'),
            'font_family'        => true,
            'font_weight'        => true,
            'font_style'         => true,
            'font_size'          => true,
            'line_height'        => true,
            'letter_spacing'     => true,
            'text_align'         => true,
            'text-transform'     => true,
            'color'              => true,
            'subset'             => true,
            'backup_font_family' => true,
            'font_variant'       => true,
            'word_spacing'       => true,
            'text_decoration'    => true,
            'default'            => array(
              'font-family'      => 'Noto Sans',
              'type'             => 'google',
            ),
          ),
          array(
            'id'              => 'custom_css',
            'type'            => 'textarea',
            'title'           => esc_html__('Custom CSS', 'fame'),
            'desc'            => esc_html__('Enter your Custom CSS separated with ( , ) Ex: .class1, .class2', 'fame'),
          ),
        ),
      ),

      // Custom Fonts Upload
      array(
        'id'                 => 'custom_font_family',
        'type'               => 'group',
        'title'              => esc_html__('Upload Custom Fonts', 'fame'),
        'button_title'       => esc_html__('Add New Custom Font', 'fame'),
        'accordion_title'    => esc_html__('Adding New Font', 'fame'),
        'accordion'          => true,
        'desc'               => 'It is simple. Only add your custom fonts and click to save. After you can check "Font Family" selector. Do not forget to Save!',
        'fields'             => array(

          array(
            'id'             => 'name',
            'type'           => 'text',
            'title'          => esc_html__('Font-Family Name', 'fame'),
            'attributes'     => array(
              'placeholder'  => 'for eg. Arial'
            ),
          ),

          array(
            'id'            => 'weight',
            'type'          => 'select',
            'title'         => esc_html__('Font Weight', 'fame'),
            'options'       => array(
              '100'         => esc_html__('Thin 100', 'fame'),
              '100italic'   => esc_html__('Thin 100 Italic', 'fame'),
              '200'         => esc_html__('Extra Light 200', 'fame'),
              '200italic'   => esc_html__('Extra Light 200 Italic', 'fame'),
              '300'         => esc_html__('Light 300', 'fame'),
              '300italic'   => esc_html__('Light 300 Italic', 'fame'),
              '400'         => esc_html__('Regular 400', 'fame'),
              '400italic'   => esc_html__('Regular 400 Italic', 'fame'),
              '500'         => esc_html__('Medium 500', 'fame'),
              '500italic'   => esc_html__('Medium 500 Italic', 'fame'),
              '600'         => esc_html__('Semi Bold 600', 'fame'),
              '600italic'   => esc_html__('Semi Bold 600 Italic', 'fame'),
              '700'         => esc_html__('Bold 700', 'fame'),
              '700italic'   => esc_html__('Bold 700 Italic', 'fame'),
              '800'         => esc_html__('Extra Bold 800', 'fame'),
              '800italic'   => esc_html__('Extra Bold 800 Italic', 'fame'),
              '900'         => esc_html__('Black 900', 'fame'),
              '900italic'   => esc_html__('Black 900 Italic', 'fame'),
            ),
            'placeholder'   => esc_html__('Select font weight', 'fame'),
          ),

          array(
            'id'             => 'ttf',
            'type'           => 'upload',
            'title'          => 'Upload .ttf <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.ttf</i>',
          ),

          array(
            'id'             => 'eot',
            'type'           => 'upload',
            'title'          => 'Upload .eot <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.eot</i>',
          ),

          array(
            'id'             => 'otf',
            'type'           => 'upload',
            'title'          => 'Upload .otf <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.otf</i>',
          ),

          array(
            'id'             => 'woff',
            'type'           => 'upload',
            'title'          => 'Upload .woff <small><i>(optional)</i></small>',
            'library'        => 'font',
            'button_title'   => 'Upload <i>.woff</i>',
          ),

          array(
            'id'             => 'css',
            'type'           => 'textarea',
            'title'          => 'Extra CSS Style <small><i>(optional)</i></small>',
            'attributes'     => array(
              'placeholder'  => 'for eg. font-weight: normal;'
            ),
          ),

        ),
      ),
      // End All field

    )
  ) );

  // Post Parent
  CSF::createSection( $prefix, array(
    'id'       => 'theme_post_types',
    'title'    => esc_html__('Custom Post Types', 'fame'),
    'icon'     => 'fa fa-files-o',
  ) );

  // Portfolio
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'portfolio_section',
    'title'    => esc_html__('Portfolio', 'fame'),
    'icon'     => 'fa fa-paint-brush',
    'fields'   => array(

      // Portfolio Name
      array(
        'id'            => 'noneed_portfolio_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Portfolio Post?', 'fame'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'fame'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_portfolio_name',
        'type'          => 'text',
        'title'         => esc_html__('Portfolio Name', 'fame'),
        'attributes'    => array(
          'placeholder' => 'Portfolio'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_portfolio_slug',
        'type'          => 'text',
        'title'         => esc_html__('Portfolio Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'portfolio-item'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_portfolio_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Portfolio Category Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'portfolio-category'
        ),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set portfolio slug and page slug as same. It\'ll not work.', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      // Portfolio Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Portfolio Listing & Style', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Portfolio Limit', 'fame'),
        'subtitle'      => esc_html__('max:100 | min:-1 | step:1', 'fame'),
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_show_category',
        'type'          => 'select',
        'title'         => esc_html__('Portfolio Categories', 'fame'),
        'desc'          => esc_html__('Select categories you want to display.', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
        'chosen'        => true,
        'multiple'      => true,
        'attributes'    => array(
          'style'       => 'width: 200px;'
        ),
        'options'       => 'categories',
        'query_args'  => array(
          'type'      => 'portfolio',
          'taxonomy'  => 'portfolio_category',
        ),
        'placeholder'   => esc_html__('Select categories', 'fame'),
      ),
      array(
        'id'            => 'portfolio_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'fame'),
        'options'       => array(
          'none'        => esc_html__('None', 'fame'),
          'ID'          => esc_html__('ID', 'fame'),
          'author'      => esc_html__('Author', 'fame'),
          'title'       => esc_html__('Title', 'fame'),
          'date'        => esc_html__('Date', 'fame'),
          'name'        => esc_html__('Name', 'fame'),
          'modified'    => esc_html__('Modified', 'fame'),
          'rand'        => esc_html__('Random', 'fame'),
          'menu_order'  => esc_html__('Menu Order', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Portfolio Order By', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'fame'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'fame'),
          'DESC'        => esc_html__('Desending', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Portfolio Order', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Enable/Disable Options', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_aqr',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Image Resize?', 'fame'),
        'desc'          => esc_html__('If need to disable image resize, please turn this ON.', 'fame'),
        'default'       => false,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_filter',
        'type'          => 'switcher',
        'title'         => esc_html__('Filter', 'fame'),
        'desc'          => esc_html__('If you need filter in portfolio pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'             => 'portfolio_filter_type',
        'type'           => 'select',
        'title'          => esc_html__('Filter Type', 'fame'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'fame'),
          'ajax'         => esc_html__('Ajax', 'fame'),
        ),
        'placeholder'    => esc_html__('Select Filter', 'fame'),
        'dependency'     => array('portfolio_filter|noneed_portfolio_post', '==|==', 'true|false'),
      ),
      array(
        'id'            => 'portfolio_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Pagination', 'fame'),
        'desc'          => esc_html__('If you need pagination in portfolio pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),

      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Related Links', 'fame'),
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_need_related',
        'type'          => 'switcher',
        'title'         => esc_html__('Need Related Links', 'fame'),
        'desc'          => esc_html__('If you need related projects in portfolio single pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_portfolio_post', '==', 'false'),
      ),
      array(
        'id'            => 'portfolio_related_title',
        'type'          => 'text',
        'title'         => esc_html__('Portfolio Related Links Title', 'fame'),
        'desc'          => esc_html__('Enter related projects title.', 'fame'),
        'dependency'    => array('portfolio_need_related|noneed_portfolio_post', '==|==', 'true|false'),
      ),

    )
  ) );
  
  // Case Studies
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'case_studies_section',
    'title'    => esc_html__('Case Studies', 'fame'),
    'icon'     => 'fa fa-briefcase',
    'fields'   => array(

      // Case Studies Name
      array(
        'id'            => 'noneed_case_studies_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Case Studies Post?', 'fame'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'fame'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_case_studies_name',
        'type'          => 'text',
        'title'         => esc_html__('Case Studies Name', 'fame'),
        'attributes'    => array(
          'placeholder' => 'Case Studies'
        ),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_case_studies_slug',
        'type'          => 'text',
        'title'         => esc_html__('Case Studies Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'casestudies-item'
        ),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_case_studies_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Case Studies Category Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'casestudies-category'
        ),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set case studies slug and page slug as same. It\'ll not work.', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      // Case Studies Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Case Studies Listing & Style', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'             => 'case_studies_col',
        'type'           => 'select',
        'title'          => esc_html__('Case Studies Column', 'fame'),
        'options'        => array(
          'two'          => esc_html__('Two', 'fame'),
          'three'          => esc_html__('Three', 'fame'),
        ),
        'placeholder' => esc_html__('Select Column', 'fame'),
        'dependency'   => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Case Studies Limit', 'fame'),
        'subtitle'      => esc_html__('max:100 | min:-1 | step:1', 'fame'),
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_show_category',
        'type'          => 'select',
        'title'         => esc_html__('Case Studies Categories', 'fame'),
        'desc'          => esc_html__('Select categories you want to display.', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
        'chosen'        => true,
        'multiple'      => true,
        'attributes'    => array(
          'style'       => 'width: 200px;'
        ),
        'options'       => 'categories',
        'query_args'  => array(
          'type'      => 'casestudies',
          'taxonomy'  => 'casestudies_category',
        ),
        'placeholder'   => esc_html__('Select categories', 'fame'),
      ),
      array(
        'id'            => 'case_studies_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'fame'),
        'options'       => array(
          'none'        => esc_html__('None', 'fame'),
          'ID'          => esc_html__('ID', 'fame'),
          'author'      => esc_html__('Author', 'fame'),
          'title'       => esc_html__('Title', 'fame'),
          'date'        => esc_html__('Date', 'fame'),
          'name'        => esc_html__('Name', 'fame'),
          'modified'    => esc_html__('Modified', 'fame'),
          'rand'        => esc_html__('Random', 'fame'),
          'menu_order'  => esc_html__('Menu Order', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Case Studies Order By', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'fame'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'fame'),
          'DESC'        => esc_html__('Desending', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Case Studies Order', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Enable/Disable Options', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_aqr',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Image Resize?', 'fame'),
        'desc'          => esc_html__('If need to disable image resize, please turn this ON.', 'fame'),
        'default'       => false,
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_filter',
        'type'          => 'switcher',
        'title'         => esc_html__('Filter', 'fame'),
        'desc'          => esc_html__('If you need filter in case studies pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'             => 'case_studies_filter_type',
        'type'           => 'select',
        'title'          => esc_html__('Filter Type', 'fame'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'fame'),
          'ajax'         => esc_html__('Ajax', 'fame'),
        ),
        'placeholder'    => esc_html__('Select Filter', 'fame'),
        'dependency'     => array('case_studies_filter|noneed_case_studies_post', '==|==', 'true|false'),
      ),
      array(
        'id'            => 'case_studies_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Pagination', 'fame'),
        'desc'          => esc_html__('If you need pagination in case studies pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),

      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Case Studies Single', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_single_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Single Pagination', 'fame'),
        'desc'          => esc_html__('If you need pagination in case studies single pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'            => 'case_studies_single_url',
        'type'          => 'text',
        'title'         => esc_html__('Single URL', 'fame'),
        'desc'          => esc_html__('Enter single URL.', 'fame'),
        'dependency'    => array('noneed_case_studies_post', '==', 'false'),
      ),
      array(
        'id'          => 'prev_case_studies',
        'type'        => 'text',
        'title'       => esc_html__('Case Studies Prev Text', 'fame'),
      ),
      array(
        'id'          => 'next_case_studies',
        'type'        => 'text',
        'title'       => esc_html__('Case Studies Next Text', 'fame'),
      ),

    )
  ) );

  // Testimonial
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'testimonial_section',
    'title'    => esc_html__('Testimonial', 'fame'),
    'icon'     => 'fa fa-commenting',
    'fields'   => array(

      // Testimonial Name
      array(
        'id'            => 'noneed_testimonial_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Testimonial Post?', 'fame'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'fame'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'fame'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_name',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Name', 'fame'),
        'attributes'    => array(
          'placeholder' => 'Testimonial'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_slug',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'testimonial-item'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_testimonial_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Testimonial Category Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'testimonial-category'
        ),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set testimonial slug and page slug as same. It\'ll not work.', 'fame'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      // Testimonial Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Testimonial Listing & Style', 'fame'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'             => 'testimonial_style',
        'type'           => 'select',
        'title'          => esc_html__('Testimonial Style', 'fame'),
        'options'        => array(
          'testimonial_one'          => esc_html__('Style One', 'fame'),
          'testimonial_two'          => esc_html__('Style Two', 'fame'),
        ),
        'placeholder' => esc_html__('Select Testimonial Style', 'fame'),
        'dependency'   => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_limit',
        'type'          => 'spinner',
        'title'         => 'Testimonial Limit',
        'subtitle'      => 'max:100 | min:-1 | step:1',
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'fame'),
        'options'       => array(
          'none'        => esc_html__('None', 'fame'),
          'ID'          => esc_html__('ID', 'fame'),
          'author'      => esc_html__('Author', 'fame'),
          'title'       => esc_html__('Title', 'fame'),
          'date'        => esc_html__('Date', 'fame'),
          'name'        => esc_html__('Name', 'fame'),
          'modified'    => esc_html__('Modified', 'fame'),
          'rand'        => esc_html__('Random', 'fame'),
          'menu_order'  => esc_html__('Menu Order', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Testimonial Order By', 'fame'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),
      array(
        'id'            => 'testimonial_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'fame'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'fame'),
          'DESC'        => esc_html__('Desending', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Testimonial Order', 'fame'),
        'dependency'    => array('noneed_testimonial_post', '==', 'false'),
      ),

    )
  ) );

  // Team
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'team_section',
    'title'    => esc_html__('Team', 'fame'),
    'icon'     => 'fa fa-users',
    'fields'   => array(

      // Team Name
      array(
        'id'            => 'noneed_team_post',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Team Post?', 'fame'),
        'desc'          => esc_html__('If need to disable this post type, please turn this ON.', 'fame'),
        'default'       => false,
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Name Change', 'fame'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_name',
        'type'          => 'text',
        'title'         => esc_html__('Team Name', 'fame'),
        'attributes'    => array(
          'placeholder' => 'Team'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_slug',
        'type'          => 'text',
        'title'         => esc_html__('Team Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'team-item'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'theme_team_cat_slug',
        'type'          => 'text',
        'title'         => esc_html__('Team Category Slug', 'fame'),
        'attributes'    => array(
          'placeholder' => 'team-category'
        ),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'type'          => 'submessage',
        'style'         => 'danger',
        'content'       => esc_html__('Important: Please do not set team slug and page slug as same. It\'ll not work.', 'fame'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      // Team Name
      array(
        'type'          => 'submessage',
        'style'         => 'info',
        'content'       => esc_html__('Team Listing & Style', 'fame'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Team Limit', 'fame'),
        'subtitle'      => esc_html__('max:100 | min:-1 | step:1', 'fame'),
        'max'           => 100,
        'min'           => -1,
        'step'          => 1,
        'default'       => 9,
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_orderby',
        'type'          => 'select',
        'title'         => esc_html__('Order By', 'fame'),
        'options'       => array(
          'none'        => esc_html__('None', 'fame'),
          'ID'          => esc_html__('ID', 'fame'),
          'author'      => esc_html__('Author', 'fame'),
          'title'       => esc_html__('Title', 'fame'),
          'date'        => esc_html__('Date', 'fame'),
          'name'        => esc_html__('Name', 'fame'),
          'modified'    => esc_html__('Modified', 'fame'),
          'rand'        => esc_html__('Random', 'fame'),
          'menu_order'  => esc_html__('Menu Order', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Team Order By', 'fame'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_order',
        'type'          => 'select',
        'title'         => esc_html__('Order', 'fame'),
        'options'       => array(
          'ASC'         => esc_html__('Asending', 'fame'),
          'DESC'        => esc_html__('Desending', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Team Order', 'fame'),
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_aqr',
        'type'          => 'switcher',
        'title'         => esc_html__('Disable Image Resize?', 'fame'),
        'desc'          => esc_html__('If need to disable image resize, please turn this ON.', 'fame'),
        'default'       => false,
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),
      array(
        'id'            => 'team_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Pagination', 'fame'),
        'desc'          => esc_html__('If you need pagination in team pages, please turn this ON.', 'fame'),
        'default'       => true,
        'dependency'    => array('noneed_team_post', '==', 'false'),
      ),

    )
  ) );

  // Events
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_post_types',
    'name'     => 'event_section',
    'title'    => esc_html__('Events', 'fame'),
    'icon'     => 'fa fa-calendar',
    'fields'   => array(

      array(
        'id'            => 'event_styles',
        'type'          => 'select',
        'title'         => esc_html__('Style', 'fame'),
        'options'       => array(
          'default'         => esc_html__('Plugin Style', 'fame'),
          'style_one'        => esc_html__('Theme Style', 'fame'),
        ),
        'placeholder'   => esc_html__('Select Events Style', 'fame'),
      ),      
      array(
        'id'            => 'event_pagination',
        'type'          => 'switcher',
        'title'         => esc_html__('Pagination', 'fame'),
        'desc'          => esc_html__('If you need pagination in event pages, please turn this ON.', 'fame'),
        'default'       => true,
      ),

    )
  ) );

  // Blog
  CSF::createSection( $prefix, array(
    'id'       => 'blog_section',
    'title'    => esc_html__('Blog', 'fame'),
    'icon'     => 'fa fa-edit',
  ) );

  // General
  CSF::createSection( $prefix, array(
    'parent'   => 'blog_section',
    'name'     => 'blog_general_tab',
    'title'    => esc_html__('General', 'fame'),
    'icon'     => 'fa fa-cog',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Layout', 'fame')
      ),      
      array(
        'id'             => 'blog_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'fame'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'fame'),
          'sidebar-left' => esc_html__('Left', 'fame'),
          'sidebar-hide' => esc_html__('Hide', 'fame'),
        ),
        'placeholder' => 'Select sidebar position',
        'help'          => esc_html__('This style will apply, default blog pages - Like : Archive, Category, Tags, Search & Author.', 'fame'),
        'desc'          => esc_html__('Default option : Right', 'fame'),
      ),
      array(
        'id'             => 'blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'fame'),
        'options'        => 'sidebars',
        'placeholder'    => esc_html__('Select Widget', 'fame'),
        'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
        'desc'           => esc_html__('Default option : Main Widget Area', 'fame'),
      ),
      array(
        'id'             => 'sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Style', 'fame'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'fame'),
          'bar-sticky'   => esc_html__('Sticky', 'fame'),
          'bar-float'    => esc_html__('Floating', 'fame'),
        ),
        'placeholder' => 'Select sidebar Style',
        'dependency'     => array('blog_sidebar_position', '!=', 'sidebar-hide'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Global Options', 'fame')
      ),
      array(
        'id'         => 'theme_exclude_categories',
        'type'       => 'checkbox',
        'title'      => esc_html__('Exclude Categories', 'fame'),
        'desc'      => esc_html__('Select categories you want to exclude from blog page.', 'fame'),
        'options'    => 'categories',
      ),
      array(
        'id'            => 'theme_blog_excerpt',
        'type'          => 'spinner',
        'title'         => esc_html__('Excerpt Length', 'fame'),
        'subtitle'      => esc_html__('max:200 | min:0 | step:1', 'fame'),
        'max'           => 200,
        'min'           => 0,
        'step'          => 1,
        'default'       => 35,
      ),
      array(
        'id'      => 'theme_metas_hide',
        'type'    => 'checkbox',
        'title'   => esc_html__('Meta\'s to hide in listing', 'fame'),
        'desc'    => esc_html__('Check items you want to hide from blog/post meta field.', 'fame'),
        'inline'  => true,
        'options'    => array(
          'category'   => esc_html__('Category', 'fame'),
          'date'    => esc_html__('Date', 'fame'),
          'share'    => esc_html__('Share', 'fame'),
        ),
      ),
      array(
        'id'        => "blog_date_format",
        'type'      => 'text',
        'title'     => esc_html__('Date Format', 'fame'),
        'desc'      => 'Enter date format (for more info <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">click here</a>)',
      ),

    )
  ) );

  // Single
  CSF::createSection( $prefix, array(
    'parent'   => 'blog_section',
    'name'     => 'blog_single_tab',
    'title'    => esc_html__('Single', 'fame'),
    'icon'     => 'fa fa-sticky-note',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Enable / Disable', 'fame')
      ),
      array(
        'id'      => 'theme_single_metas_hide',
        'type'    => 'checkbox',
        'title'   => esc_html__('Meta\'s to hide in single', 'fame'),
        'desc'    => esc_html__('Check items you want to hide from blog/post meta field.', 'fame'),
        'inline'  => true,
        'options'    => array(
          'date'    => esc_html__('Date', 'fame'),
          'category'   => esc_html__('Category', 'fame'),
          'tag'   => esc_html__('Tag', 'fame'),
          'share'    => esc_html__('Share', 'fame'),
          'author'     => esc_html__('Author', 'fame'),
        ),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Related Posts', 'fame')
      ),
      array(
        'id'    => 'single_related_post',
        'type'  => 'switcher',
        'title' => esc_html__('Related Posts', 'fame'),
        'desc' => esc_html__('If need to hide related posts on single blog page, please turn this OFF.', 'fame'),
        'default' => true,
      ),
      array(
        'id'      => 'single_related_title',
        'type'    => 'text',
        'title'   => esc_html__('Section Title', 'fame'),
        'desc'   => esc_html__('Related post section title.', 'fame'),
        'dependency'     => array('single_related_post', '==', 'true'),
      ),
      array(
        'id'            => 'single_related_limit',
        'type'          => 'spinner',
        'title'         => esc_html__('Excerpt Length', 'fame'),
        'subtitle'      => esc_html__('max:100 | min:0 | step:1', 'fame'),
        'max'           => 100,
        'min'           => 0,
        'step'          => 1,
        'default'       => 2,
        'dependency'     => array('single_related_post', '==', 'true'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Sidebar', 'fame')
      ),
      array(
        'id'             => 'single_sidebar_position',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Position', 'fame'),
        'options'        => array(
          'sidebar-right' => esc_html__('Right', 'fame'),
          'sidebar-left' => esc_html__('Left', 'fame'),
          'sidebar-hide' => esc_html__('Hide', 'fame'),
        ),
        'placeholder' => 'Select sidebar position',
        'desc'          => esc_html__('Default option : Right', 'fame'),
      ),
      array(
        'id'             => 'single_blog_widget',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Widget', 'fame'),
        'options'        => 'sidebars',
        'placeholder'    => esc_html__('Select Widget', 'fame'),
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
        'desc'           => esc_html__('Default option : Main Widget Area', 'fame'),
      ),
      array(
        'id'             => 'single_sidebar_type',
        'type'           => 'select',
        'title'          => esc_html__('Sidebar Style', 'fame'),
        'options'        => array(
          'normal'       => esc_html__('Normal', 'fame'),
          'bar-sticky'   => esc_html__('Sticky', 'fame'),
          'bar-float'    => esc_html__('Floating', 'fame'),
        ),
        'placeholder' => 'Select sidebar Style',
        'dependency'     => array('single_sidebar_position', '!=', 'sidebar-hide'),
      ),

    )
  ) );

  if (class_exists( 'WooCommerce' )) {
    // Woocommerce
    CSF::createSection( $prefix, array(
      'name'     => 'woocommerce_section',
      'title'    => esc_html__('Woocommerce', 'fame'),
      'icon'     => 'fa fa-shopping-cart',
      'fields' => array(

        array(
          'type'    => 'submessage',
          'style'   => 'info',
          'content' => esc_html__('Layout', 'fame')
        ),
        array(
          'id'             => 'woo_sidebar_position',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Position', 'fame'),
          'options'        => array(
            'right-sidebar' => esc_html__('Right', 'fame'),
            'left-sidebar' => esc_html__('Left', 'fame'),
            'sidebar-hide' => esc_html__('Hide', 'fame'),
          ),
          'placeholder' => esc_html__('Select sidebar position', 'fame'),
          'desc'          => esc_html__('Default option : Right', 'fame'),
        ),
        array(
          'id'             => 'woo_widget',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Widget', 'fame'),
          'options'        => 'sidebars',
          'placeholder' => esc_html__('Select Widget', 'fame'),
          'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
          'desc'           => esc_html__('Default option : Main Widget Area', 'fame'),
        ),
        array(
          'id'             => 'woo_sidebar_type',
          'type'           => 'select',
          'title'          => esc_html__('Sidebar Style', 'fame'),
          'options'        => array(
            'normal'       => esc_html__('Normal', 'fame'),
            'bar-sticky'   => esc_html__('Sticky', 'fame'),
            'bar-float'    => esc_html__('Floating', 'fame'),
          ),
          'placeholder' => 'Select sidebar Style',
          'dependency'     => array('woo_sidebar_position', '!=', 'sidebar-hide'),
        ),
        array(
          'type'    => 'submessage',
          'style'   => 'info',
          'content' => esc_html__('Single Product', 'fame')
        ),
        array(
          'id'    => 'woo_single_related',
          'type'  => 'switcher',
          'title' => esc_html__('Related Products', 'fame'),
          'desc' => esc_html__('If you want \'Related Products\' in single product page, please turn this ON.', 'fame'),
          'default' => false,
        ),
        array(
          'id'             => 'woo_related_limit',
          'type'           => 'text',
          'title'          => esc_html__('Related Products Limit', 'fame'),
          'dependency'     => array('woo_single_related', '==', 'true'),
        ),
        array(
          'id'             => 'woo_related_title',
          'type'           => 'text',
          'title'          => esc_html__('Related Products Title', 'fame'),
          'dependency'     => array('woo_single_related', '==', 'true'),
        ),
        array(
          'id'    => 'woo_single_upsell',
          'type'  => 'switcher',
          'title' => esc_html__('You May Also Like(Upsell)', 'fame'),
          'desc' => esc_html__('If you want \'You May Also Like\' products in single product page, please turn this ON.', 'fame'),
          'default' => false,
        ),
        array(
          'id'    => 'woo_single_crosssell',
          'type'  => 'switcher',
          'title' => esc_html__('You May interested in(Cross Sell)', 'fame'),
          'desc' => esc_html__('If you want \'You May interested in\' products in cart page, please turn this ON.', 'fame'),
          'default' => false,
        ),

      )
    ) );
  }

  // Extra Pages Parent
  CSF::createSection( $prefix, array(
    'id'       => 'theme_extra_pages',
    'title'    => esc_html__('Extra Pages', 'fame'),
    'icon'     => 'fa fa-clone',
  ) );

  // 404
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_extra_pages',
    'name'     => 'error_page_section',
    'title'    => esc_html__('404 Page', 'fame'),
    'icon'     => 'fa fa-exclamation-triangle',
    'fields' => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('404 Error Page Options', 'fame')
      ),
      array(
        'id'    => 'error_page_title',
        'type'  => 'text',
        'title' => esc_html__('404 Page Title', 'fame'),
        'desc'  => esc_html__('Enter title text here.', 'fame'),
      ),
      array(
        'id'    => 'error_heading',
        'type'  => 'text',
        'title' => esc_html__('404 Page Heading', 'fame'),
        'desc'  => esc_html__('Enter 404 page heading.', 'fame'),
      ),
      array(
        'id'    => 'error_sub_heading',
        'type'  => 'text',
        'title' => esc_html__('404 Page Sub Heading', 'fame'),
        'desc'  => esc_html__('Enter 404 page sub heading.', 'fame'),
      ),
      array(
        'id'    => 'error_page_content',
        'type'  => 'textarea',
        'title' => esc_html__('404 Page Content', 'fame'),
        'desc'  => esc_html__('Enter 404 page content.', 'fame'),
        'shortcoder'      => 'fame_vt_shortcodes',
      ),
      array(
        'id'    => 'error_page_bg',
        'type'  => 'media',
        'url'   => false,
        'title' => esc_html__('404 Page Background', 'fame'),
        'desc'  => esc_html__('Choose 404 page background image.', 'fame'),
        'button_title' => esc_html__('Add 404 Image', 'fame'),
      ),
      array(
        'id'    => 'error_btn_text',
        'type'  => 'text',
        'title' => esc_html__('Button Text', 'fame'),
        'desc'  => esc_html__('Enter BACK TO HOME button text. If you want to change it.', 'fame'),
      ),

    )
  ) );

  // Maintenance
  CSF::createSection( $prefix, array(
    'parent'   => 'theme_extra_pages',
    'name'     => 'maintenance_mode_section',
    'title'    => esc_html__('Maintenance Mode', 'fame'),
    'icon'     => 'fa fa-hourglass-half',
    'fields'   => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('If you turn this ON : Only Logged in users will see your pages. All other visiters will see, selected page of : Maintenance Mode Page', 'fame')
      ),
      array(
        'id'    => 'enable_maintenance_mode',
        'type'  => 'switcher',
        'title' => esc_html__('Maintenance Mode', 'fame'),
        'default' => false,
      ),
      array(
        'id'    => 'elementor_page',
        'type'  => 'switcher',
        'title' => esc_html__('Elementor Page', 'fame'),
        'desc'  => esc_html__('Enable if your selected page is edited by elementor.', 'fame'),
        'default' => false,
        'dependency'   => array( 'enable_maintenance_mode', '==', 'true' ),
      ),
      array(
        'id'             => 'maintenance_mode_page',
        'type'           => 'select',
        'title'          => esc_html__('Maintenance Mode Page', 'fame'),
        'options'        => 'pages',
        'placeholder'    => esc_html__('Select a page', 'fame'),
        'dependency'     => array( 'enable_maintenance_mode', '==', 'true' ),
      ),

    )
  ) );

  // Misc Parent
  CSF::createSection( $prefix, array(
    'id'       => 'misc_section',
    'title'    => esc_html__('Misc', 'fame'),
    'icon'     => 'fa fa-recycle',
  ) );

  // Custom Sidebar
  CSF::createSection( $prefix, array(
    'parent'   => 'misc_section',
    'name'     => 'custom_sidebar_section',
    'title'    => esc_html__('Custom Sidebar', 'fame'),
    'icon'     => 'fa fa-reorder',
    'fields'   => array(

      array(
        'id'     => 'custom_sidebar',
        'type'   => 'group',
        'title'           => esc_html__('Sidebars', 'fame'),
        'subtitle'        => esc_html__('Go to Appearance -> Widgets after create sidebars', 'fame'),
        'button_title'    => esc_html__('Add New Sidebar', 'fame'),
        'fields' => array(
          array(
            'id'    => 'sidebar_name',
            'type'  => 'text',
            'title' => esc_html__('Sidebar Name', 'fame'),
          ),
          array(
            'id'    => 'sidebar_desc',
            'type'  => 'text',
            'title' => esc_html__('Custom Description', 'fame'),
          ),
        )
      ),

    )
  ) );

  // Translation
  CSF::createSection( $prefix, array(
    'parent'   => 'misc_section',
    'name'     => 'theme_translation_section',
    'title'    => esc_html__('Translation', 'fame'),
    'icon'     => 'fa fa-language',
    'fields'   => array(

      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Common Texts', 'fame')
      ),
      array(
        'id'          => 'read_more_text',
        'type'        => 'text',
        'title'       => esc_html__('Read More Text', 'fame'),
      ),
      array(
        'id'          => 'portfolio_read_more',
        'type'        => 'text',
        'title'       => esc_html__('Portfolio Read More', 'fame'),
      ),
      array(
        'id'          => 'case_studies_read_more',
        'type'        => 'text',
        'title'       => esc_html__('Case Studies Read More', 'fame'),
      ),
      array(
        'id'          => 'share_text',
        'type'        => 'text',
        'title'       => esc_html__('Share Text', 'fame'),
      ),
      array(
        'id'          => 'share_on_text',
        'type'        => 'text',
        'title'       => esc_html__('Share On Tooltip Text', 'fame'),
      ),
      array(
        'id'          => 'post_comment_text',
        'type'        => 'text',
        'title'       => esc_html__('Post Comment Text [Submit Button]', 'fame'),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'info',
        'content' => esc_html__('Filter All Texts', 'fame')
      ),
      array(
        'id'          => 'all_text',
        'type'        => 'text',
        'title'       => esc_html__('Filter All Text (Portfolio)', 'fame'),
      ),
      array(
        'id'          => 'case_all_text',
        'type'        => 'text',
        'title'       => esc_html__('Filter All Text (Case Studies)', 'fame'),
      ),

    )
  ) );

  // Backup
  CSF::createSection( $prefix, array(
    'name'     => 'backup_section',
    'title'    => 'Backup',
    'icon'     => 'fa fa-shield',
    'fields' => array(

      // Site Logo
      array(
        'type'    => 'submessage',
        'style'   => 'warning',
        'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'fame'),
      ),
      array(
        'type'    => 'backup',
      ),

    )
  ) );

}