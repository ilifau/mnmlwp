<?php

function mnmlwp_customize_register( $wp_customize )
{
    // Sections

    $wp_customize->add_section( 'colors' , array(
        'title'      => esc_html__( 'Color Scheme', 'mnmlwp' ),
        'priority'   => 30,
    ) );

    $wp_customize->add_section( 'mnmlwp_layout_section' , array(
        'title'      => esc_html__( 'Page Layout', 'mnmlwp' ),
        'priority'   => 30,
    ) );

    // Section Settings Color Scheme

    // General

    $wp_customize->add_setting( 'mnmlwp_body_text_color' , array(
        'default'   => '#222',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_headings_text_color' , array(
        'default'   => '#222',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_color' , array(
        'default'   => '#3498db',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_hover_color' , array(
        'default'   => '#2875a8',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Header

    $wp_customize->add_setting( 'mnmlwp_header_bg_color' , array(
        'default'   => '#2c3e50',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_text_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon_color' , array(
        'default'   => '#e74c3c',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_tagline_color' , array(
        'default'   => '#91a4ba',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon' , array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_contact_row_bg_color' , array(
        'default'   => '#21232b',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_contact_row_text_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_contact_row', array(
        'capability' => 'edit_theme_options',
        'default' =>'Company Name | Street Address | Postcode City | +49 (0) 1234 56789 | contact@email.xyz',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    // Breadcrumb navigation
    
    if( function_exists('breadcrumb_trail') ): 
    
        $wp_customize->add_setting( 'mnmlwp_breadcrumb_bg_color' , array(
            'default'   => '#f4f7ff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_text_color' , array(
            'default'   => '#2c3e50',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_color' , array(
            'default'   => '#3498db',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_hover_color' , array(
            'default'   => '#2875a8',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
    endif;

    // Navigation

    $wp_customize->add_setting( 'mnmlwp_nav_row_color' , array(
        'default'   => '#21232b',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_color_hover' , array(
        'default'   => '#ecf0f1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_active_link_color' , array(
        'default'   => '#e74c3c',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_sub_menu_background' , array(
        'default'   => '#21232b',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_sub_menu_link_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_sub_menu_link_color_hover' , array(
        'default'   => '#ecf0f1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_sub_menu_link_color_active' , array(
        'default'   => '#e74c3c',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_hamburger_color' , array(
        'default'   => '#ecf0f1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Footer

    $wp_customize->add_setting( 'mnmlwp_footer_bg_color' , array(
        'default'   => '#2c3e50',
        'transport' => 'refresh',
           'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_text_color' , array(
        'default'   => '#f4f8f9',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_headings_color' , array(
        'default'   => '#e74c3c',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_footer_link_color' , array(
        'default'   => '#3498db',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_link_color_hover' , array(
        'default'   => '#2875a8',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Section Settings Page Layout

    $wp_customize->add_setting( 'mnmlwp_base_font_size' , array(
        'default'   => '1.25em',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_column_width' , array(
        'default'   => '1120px',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_has_local_font', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_is_boxed', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_show_contact_row', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_show_sidebar_by_default', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_hide_page_title_by_default', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_show_read_more_link', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );


    $wp_customize->add_setting( 'mnmlwp_excerpt_length' , array(
        'default'   => 60,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    // Breadcrumb navigation
    
    if( function_exists('breadcrumb_trail') ):

        $wp_customize->add_setting( 'mnmlwp_has_breadcrumbs', array(
            'default' => false,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumbs_show_on_home', array(
            'default' => false,
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
        ) );
        
    endif;

    $wp_customize->add_setting( 'mnmlwp_nav_position', array(
        'default' => 'after_header',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_animation', array(
        'default' => 'slide',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_nav_is_sticky', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_has_nav_search', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_has_loading_layer', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_spinner_color' , array(
        'default'   => '#666666',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_hamburger_class', array(
        'default' => 'boring',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    function mnmlwp_sanitize_checkbox( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }

    // General

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_body_text_color', array(
        'label'      => esc_html__( 'Text Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_body_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_headings_text_color', array(
        'label'      => esc_html__( 'Headings Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_headings_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_link_color', array(
        'label'      => esc_html__( 'Link Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_link_hover_color', array(
        'label'      => esc_html__( 'Link Hover Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_link_hover_color',
    ) ) );

    // Header

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_header_bg_color', array(
        'label'      => esc_html__( 'Header Background Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_header_bg_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_logo_text_color', array(
        'label'      => esc_html__( 'Logo Text Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_logo_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_logo_icon_color', array(
        'label'      => esc_html__( 'Logo Icon Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_logo_icon_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_tagline_color', array(
        'label'      => esc_html__( 'Tagline Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_tagline_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_contact_row_bg_color', array(
        'label'      => esc_html__( 'Contact Row Background', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_contact_row_bg_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_contact_row_text_color', array(
        'label'      => esc_html__( 'Contact Row Text', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_contact_row_text_color',
    ) ) );

    // Navigation

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_row_color', array(
        'label'      => esc_html__( 'Navigation Background', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_row_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_color', array(
        'label'      => esc_html__( 'Nav Item Link Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_color_hover', array(
        'label'      => esc_html__( 'Nav Item Link Hover Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_color_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_active_link_color', array(
        'label'      => esc_html__( 'Nav Item Link Active Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_active_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'mnmlwp_nav_sub_menu_background', array(
        'label'         => esc_html__( 'Sub-Menu Background Color', 'mnmlwp' ),
        'section'       => 'colors',
        'settings'      => 'mnmlwp_nav_sub_menu_background',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_sub_menu_link_color', array(
        'label'      => esc_html__( 'Sub-Menu Link Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_sub_menu_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_sub_menu_link_color_hover', array(
        'label'      => esc_html__( 'Sub-Menu Link Color Hover', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_sub_menu_link_color_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_sub_menu_link_color_active', array(
        'label'      => esc_html__( 'Sub-Menu Link Color Active', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_sub_menu_link_color_active',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_hamburger_color', array(
        'label'      => esc_html__( 'Hamburger Icon Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_hamburger_color',
    ) ) );
    
    // Breadcrumb navigation

    if( function_exists('breadcrumb_trail') ):
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_bg_color', array(
            'label'      => esc_html__( 'Breadcrumb Background', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_bg_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_text_color', array(
            'label'      => esc_html__( 'Breadcrumb Text Color', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_text_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_link_color', array(
            'label'      => esc_html__( 'Breadcrumb Link Color', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_link_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_link_hover_color', array(
            'label'      => esc_html__( 'Breadcrumb Link Color (hover)', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_link_hover_color',
        ) ) );
        
    endif;

    // Footer

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_bg_color', array(
        'label'      => esc_html__( 'Footer Background Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_bg_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_text_color', array(
        'label'      => esc_html__( 'Footer Text Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_headings_color', array(
        'label'      => esc_html__( 'Footer Headings Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_headings_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_link_color', array(
        'label'      => esc_html__( 'Footer Link Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_link_color_hover', array(
        'label'      => esc_html__( 'Footer Link Hover Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_link_color_hover',
    ) ) );

    // Customizer Controls Page Layout

    $wp_customize->add_control( 'mnmlwp_column_width', array(
        'label'      => esc_html__( 'Main Content Width (default: 1120px)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_column_width',
    ) );

    $wp_customize->add_control( 'mnmlwp_base_font_size', array(
        'label'      => esc_html__( 'Base Font Size (default: 1.25em)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_base_font_size',
    ) );

    $wp_customize->add_control( 'mnmlwp_has_local_font', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Use local font (Source Sans Pro)?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_is_boxed', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Boxed Layout?', 'mnmlwp'),
    ) );
    
    $wp_customize->add_control( 'mnmlwp_show_contact_row', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show contact row?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_show_sidebar_by_default', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show sidebar by default?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_hide_page_title_by_default', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Hide page title by default?', 'mnmlwp'),
    ) );
    
    $wp_customize->add_control( 'mnmlwp_excerpt_length', array(
        'label'      => esc_html__( 'Excerpt length in words (default: 60)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_excerpt_length',
        'type'       => 'number',
    ) );

    $wp_customize->add_control( 'mnmlwp_show_read_more_link', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show read more link?', 'mnmlwp'),
    ) );
    
    // Breadcrumb navigation
    
    if( function_exists('breadcrumb_trail') ):

        $wp_customize->add_control( 'mnmlwp_has_breadcrumbs', array(
            'type' => 'checkbox',
            'section' => 'mnmlwp_layout_section',
            'label' => esc_html__( 'Show breadcrumbs navigation?', 'mnmlwp'),
        ) );

        $wp_customize->add_control( 'mnmlwp_breadcrumbs_show_on_home', array(
            'type' => 'checkbox',
            'section' => 'mnmlwp_layout_section',
            'label' => esc_html__( 'Show breadcrumbs navigation on home page?', 'mnmlwp'),
        ) );
        
    endif;

    $wp_customize->add_control( 'mnmlwp_logo_icon', array(
        'label'      => esc_html__( 'Logo Icon', 'mnmlwp' ),
        'description' => sprintf( esc_html__('Select an icon that will be displayed together with your site logo (choose from any icon from %1$s).', 'mnmlwp' ), '<a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Font Awesome Icons</a>' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_icon',
    ) );

    $wp_customize->add_control( 'mnmlwp_contact_row', array(
        'type' => 'textarea',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Contact Row', 'mnmlwp'),
        'description' => esc_html__( 'This section will show at the top of your website and may include some contact information or similar stuff.', 'mnmlwp' ),
    ) );
    
    $wp_customize->add_control( 'mnmlwp_nav_position', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Main Menu Position', 'mnmlwp'),
        'choices' => array(
            'after_header' => 'Default (after header)',
            'before_header' => 'Before header',
            'inside_header' => 'Inside header',
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_animation', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Menu Animation Style', 'mnmlwp'),
        'choices' => array(
            'slide' => 'Slide (default)',
            'fade' => 'Fade',
        ),
    ) );
    
    $wp_customize->add_control( 'mnmlwp_nav_is_sticky', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Sticky main navigation?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_has_nav_search', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Include search form in primary navigation?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_has_loading_layer', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show loading animation on page load?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_spinner_color', array(
        'label'      => esc_html__( 'Spinner Color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_spinner_color',
    ) ) );

    $wp_customize->add_control( 'mnmlwp_hamburger_class', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Hamburger icon class', 'mnmlwp'),
        'choices' => array(
            'boring' => 'Default',
            'spin' => 'Spin',
            'squeeze' => 'Squeeze',
            'elastic' => 'Elastic',
            'arrow' => 'Arrow',
            'collapse' => 'Collapse',
            'slider' => 'Slider',
            'stand' => 'Stand',
            'spring' => 'Spring',
            '3dx' => '3Dx',
        ),
    ) );
}

add_action( 'customize_register', 'mnmlwp_customize_register' );

// Custom Header
$custom_header_defaults = array(
    'width' => 1920,
    'height' => 540,
    'default-image' => '',
    'uploads' => true,
);

add_theme_support( 'custom-header', $custom_header_defaults );

// Output Customizer CSS
function mnmlwp_customizer_css()
{
    echo '<style>';
        echo 'body {
                 color: ' . esc_html( get_theme_mod('mnmlwp_body_text_color', '#222') ) . ';
                 font-size: ' . esc_html( get_theme_mod('mnmlwp_base_font_size', '1.25em') ) . ';
             }

             .sk-fading-circle .sk-circle:before {
                 background-color: ' . esc_html( get_theme_mod('mnmlwp_spinner_color', 'rgba(44,62,80,0.75)') )  . ';
             }

             .row.row--contact {
                 background: ' . esc_html( get_theme_mod('mnmlwp_contact_row_bg_color', '#21232b') ) . ';
             }

             .row.row--nav {
                 background: ' . esc_html( get_theme_mod('mnmlwp_nav_row_color', '#21232b') ) . ';
             }

             .column {
                 width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ';
             }

             .column.column--contact,
             .column.column--contact a,
             .column.column--contact a:hover {
                 color: ' . esc_html( get_theme_mod('mnmlwp_contact_row_text_color', '#fff') ) . ';
             }';
             
             // Breadcrumb navigation
             
             if( function_exists('breadcrumb_trail') ) {
                 echo ' .row.row--breadcrumbs {
                      background: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_bg_color', '#f4f7ff') ) . ';
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_text_color', '#2c3e50') ) . ';
                  }

                  .row.row--breadcrumbs a {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_color', '#3498db') ) . ';
                  }

                  .row.row--breadcrumbs a:hover,
                  .row.row--breadcrumbs a:focus,
                  .row.row--breadcrumbs a:active {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_hover_color', '#2875a8') ) . ';
                  }
                  
                  .trail-items li::after {
                      opacity: .25;
                  }';
             }

             if( get_theme_mod('mnmlwp_is_boxed') ) {
                  echo 'body {
                     padding: 1em 0;
                 }
                 .row {
                     width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ';
                     margin: 0 auto;
                 }

                 .row.row--main .column {
                     background: #fff;
                 }
                
                 .column.column--hero {
                     background: transparent!important;
                 }
                 
                 @media screen and (max-width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ') {
                    body {
                        padding: 0 0;
                    }

                    .row {
                        max-width: 100%;
                    }
                 }';
             } else {
                 echo '.row-hero-wrapper {
                     background: transparent;
                 }';
             }

             echo 'h1, .h1, h2, h3, h4, h5, h6 {
                 color: ' . esc_html( get_theme_mod('mnmlwp_headings_text_color', '#222') ) . ';
             }

             a,
             p a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ) . ';
             }

             blockquote::before {
                 color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ), 0.2 ) . ';
             }

             blockquote {
                 border-color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ), 0.1 ) . ';
             }

             a:hover,
             a:focus,
             p a:hover,
             p a:focus {
                 color: ' . esc_html( get_theme_mod('mnmlwp_link_hover_color', '#006093') ) . ';
             }

             nav#main ul li a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_nav_link_color', '#fff') ) . ';
             }

             nav#main ul li a:hover,
             nav#main ul li a:focus {
                 color: ' . esc_html( get_theme_mod('mnmlwp_nav_link_color_hover', '#ecf0f1') ) . ';
             }

             .mnmlwp-btn,
             input[type=submit] {
                 background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ) . ';
             }

             .mnmlwp-btn:hover,
             .mnmlwp-btn:focus,
             input[type=submit]:hover,
             input[type=submit]:focus {
                 opacity: 1;
                 background: ' . mnmlwp_adjust_color( get_theme_mod('mnmlwp_link_color', '#3498db'), -12 ) . ';
             }

             div.mnmlwp-logo a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_text_color', '#fff') ) . '!important;
             }

             .mnmlwp-logo-icon {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_icon_color', '#e74c3c') ) . '!important;
             }

             .mnmlwp-tagline {
                 color: ' . esc_html( get_theme_mod('mnmlwp_tagline_color', '#91a4ba') ) . '!important;
             }

             nav#main ul li.current_page_item > a,
             nav#main ul li.current-page-parent > a,
             nav#main ul li.current-menu-parent > a,
             nav#main ul li.current_page_item > a:hover,
             nav#main ul li.current-page-parent > a:hover,
             nav#main ul li.current_page_item > a:focus,
             nav#main ul li.current-page-parent > a:focus,
             nav#main ul li.current_page_item > a:active,
             nav#main ul li.current-page-parent > a:active {
                opacity: 1;
                color: ' . esc_html( get_theme_mod('mnmlwp_nav_active_link_color', '#e74c3c') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit:hover,
            nav#main li.mnmlwp-main-nav-searchform button.submit:focus {
                opacity: 1;
                background: ' . mnmlwp_adjust_color( esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ), -12 ) . ';
            }

            nav#main ul.sub-menu li.current_page_item > a,
            nav#main ul.sub-menu li.current-page-parent > a,
            nav#main ul.sub-menu li.current-menu-parent > a,
            nav#main ul.sub-menu li.current_page_item > a:hover,
            nav#main ul.sub-menu li.current-page-parent > a:hover,
            nav#main ul.sub-menu li.current_page_item > a:focus,
            nav#main ul.sub-menu li.current-page-parent > a:focus,
            nav#main ul.sub-menu li.current_page_item > a:active,
            nav#main ul.sub-menu li.current-page-parent > a:active {
               opacity: 1;
               color: ' . esc_html( get_theme_mod('mnmlwp_nav_sub_menu_link_color_active', '#e74c3c') ) . ';
           }

            .mnmlwp-pagination span.page-numbers {
                background: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ), 0.5) . ';
                color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ) . ';
            }

            .mnmlwp-pagination span.page-numbers.current {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#3498db') ) . ';
                color: #fff;
            }

            .row.row--footer {
                background: ' . esc_html( get_theme_mod('mnmlwp_footer_bg_color', '#2c3e50') ) . ';
            }

            footer {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_text_color', '#f4f8f9') ) . '!important;
            }

            footer .mnmlwp-widget-title,
            footer .mnmlwp-widget-title a,
            footer .mnmlwp-widget-title a:hover,
            footer .mnmlwp-widget-title a:focus,
            footer .h1, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_headings_color', '#e74c3c') ) . '!important;
            }
            
            footer a {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color', '#3498db') ) . ';
            }
            
            footer a:hover,
            footer a:focus {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color_hover', '#006093') ) . ';
            }

            @media screen and (max-width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ') {
                .column.column--single.column--single-hero {
                    margin-top: 0;
                }
            }

            @media screen and (min-width: 768px) {
                nav#main ul.sub-menu {
                    background: ' . esc_html( get_theme_mod('mnmlwp_nav_sub_menu_background', '#21232b') ) . ';
                }

                nav#main ul.sub-menu li a {
                    color: ' . esc_html( get_theme_mod('mnmlwp_nav_sub_menu_link_color', '#fff') ) . ';
                }

                nav#main ul.sub-menu li a:hover,
                nav#main ul.sub-menu li a:active,
                nav#main ul.sub-menu li a:focus {
                    color: ' . esc_html( get_theme_mod('mnmlwp_nav_sub_menu_link_color_hover', '#ecf0f1') ) . ';
                }';

                echo '
            }

            @media screen and (max-width: 767px) {
                body {
                    font-size: 1em;
                }
            }

            .hamburger-inner,
            .hamburger-inner:after,
            .hamburger-inner:before {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_hamburger_color', '#ecf0f1') ) . ';
            }';

            if( has_header_image() ) {
                echo '.row.row--header {
                    background: url(' . get_header_image()  . ') center center;
                    background-size: cover;
                }';
            } else {
                echo '.row.row--header {
                    background: ' . esc_html( get_theme_mod('mnmlwp_header_bg_color', '#2c3e50') ) . ';
                }';
            }

            // Nav poition / hamburger icon
            switch( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) )
            {
                case 'before_header':
                    
                    echo '@media screen and (min-width: 768px) {
                        nav#main li.mnmlwp-main-nav-searchform {
                            top: .5em;
                        }
                        
                        nav#main li.mnmlwp-main-nav-searchform input#s {
                            padding: .375em .5em;
                        }
                    }
                    
                    @media screen and (max-width: 1023px) {
                        nav#main li.mnmlwp-main-nav-searchform {
                            top: .41em;
                        }
                        
                        nav#main li.mnmlwp-main-nav-searchform input#s {
                            font-size: .875em;
                        }
                    }
                    
                    @media screen and (max-width: 767px) {
                        nav#main li.mnmlwp-main-nav-searchform input#s {
                            font-size: 1.125em;
                        }
                    }';
                    
                    if( display_header_text() && get_bloginfo( 'description' ) )
                    {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: 1.5em;
                                z-index: 99;
                            }
                        }';
                    } else {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: .875em;
                                z-index: 99;
                            }
                        }';
                    }
                    
                    break;
                    
                case 'inside_header':
                
                    echo '.row.row--nav {
                        background: 0;
                    }';
                
                    echo '@media screen and (min-width:768px) {
                        
                        .row.row--header {
                            overflow: visible;
                        }
                        
                        .column.column--header {
                            width: auto;
                            padding: 1em;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            margin: 0 auto;
                            overflow: visible;
                        }
                        
                        div.mnmlwp-logo {
                            margin-right: auto;
                            max-width: 25%;
                        }
                        
                        .row.row--nav {
                            margin-left: auto;
                            max-width: 75%;
                            box-shadow: 0 0;
                        }

                        .column.column--nav {
                            padding-left: 0;
                            padding-right: 0;
                            text-align: right;
                        }
                        
                        nav#main li ul li {
                            text-align: left;
                        }
                        
                        nav#main li.mnmlwp-main-nav-searchform {
                            position: relative;
                            top: 0;
                        }
                        
                        nav#main li.mnmlwp-main-nav-searchform input#s {
                            width: 9em;
                            max-width: 9em;
                        }
                    }';
                        
                    echo '@media screen and (max-width: 767px) {            
                            .column.column--nav {
                                padding-left: 0;
                            }
                            
                            nav#main {
                                padding: .75em 0 0!important;
                            }
                            
                            nav#main ul li.current_page_item > a {
                                font-weight: 700;
                            }
                            
                            .hamburger {
                                right: 0;
                            }
                        }';
                    
                    if( display_header_text() && get_bloginfo( 'description' ) )
                    {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: -3.175em;
                            }
                        }';
                    } else {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: -2.5em;
                            }
                        }';
                    }
                    
                    if( get_theme_mod('mnmlwp_nav_is_sticky', true) === true ) {
                        echo '.row.row--header {
                            position: sticky;
                            position: -webkit-sticky;
                            position: -moz-sticky;
                            position: -ms-sticky;
                            position: -o-sticky;
                            top: 0;
                            z-index: 99;
                        }';
                    }

                    break;
                    
                default:
                
                    if( display_header_text() && get_bloginfo( 'description' ) )
                    {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: -4.75em;
                            }
                        }';
                    } else {
                        echo '@media screen and (max-width: 767px) {
                            .hamburger {
                                top: -4em;
                            }
                        }';
                    }
                    
                    break;    
            }

    echo '</style>';
}

add_action( 'wp_head', 'mnmlwp_customizer_css');

// Theme Logo
function mnmlwp_theme_prefix_setup()
{
    add_theme_support( 'custom-logo', array(
        'height'      => 42,
        'width'       => 137,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title' ),
    ) );
}

add_action( 'after_setup_theme', 'mnmlwp_theme_prefix_setup' );

// Adjust colors
function mnmlwp_adjust_color($hex, $adjustment)
{
    $adjustment = max(-255, min(255, $adjustment));
    $hex = str_replace('#', '', $hex);

    if (strlen($hex) == 3)
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);

    $colors = str_split($hex, 2);
    $adjusted_value = '#';

    foreach($colors as $color)
    {
        $color = hexdec($color);
        $color = max(0, min(255, $color + $adjustment));
        $adjusted_value .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
    }

    return $adjusted_value;
}
