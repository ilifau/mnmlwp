<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

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

    $wp_customize->add_section( 'mnmlwp_hero_section' , array(
        'title'      => esc_html__( 'Hero Section', 'mnmlwp' ),
        'priority'   => 30,
    ) );

    // Section Settings Color Scheme

    // General

    $wp_customize->add_setting( 'mnmlwp_body_text_color' , array(
        'default'   => '#2b323a',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_headings_text_color' , array(
        'default'   => '#2b323a',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_color' , array(
        'default'   => '#2065b1',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_hover_color' , array(
        'default'   => '#154e8c',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Header
    
    $wp_customize->add_setting( 'mnmlwp_logo_base_font_size_desktop' , array(
        'default'   => 1.75,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_base_font_size_tablet' , array(
        'default'   => 1.75,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_base_font_size_mobile' , array(
        'default'   => 1.5,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_site_title_font_size' , array(
        'default'   => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_site_subtitle_font_size' , array(
        'default'   => 0.5875,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_height_desktop' , array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_height_tablet' , array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_height_tablet' , array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_height_mobile' , array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_header_bg_color' , array(
        'default'   => '#34465b',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_text_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon_color' , array(
        'default'   => '#72b6ff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_tagline_color' , array(
        'default'   => '#c1dfff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon' , array(
        'default'   => 'diamond',
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
            'default'   => '#34465b',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_color' , array(
            'default'   => '#2065b1',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_hover_color' , array(
            'default'   => '#154e8c',
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

    $wp_customize->add_setting( 'mnmlwp_nav_link_background_color' , array(
        'default'   => '#21232b',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_color_hover' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_background_color_hover' , array(
        'default'   => '#131419',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_active_link_color' , array(
        'default'   => '#72b6ff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_active_link_background_color' , array(
        'default'   => '#131419',
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
        'default'   => '#34465b',
        'transport' => 'refresh',
           'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_text_color' , array(
        'default'   => '#f4f8f9',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_headings_color' , array(
        'default'   => '#fff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_footer_link_color' , array(
        'default'   => '#72b6ff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_link_color_hover' , array(
        'default'   => '#629cdb',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Section Settings Page Layout

    $wp_customize->add_setting( 'mnmlwp_base_font_size' , array(
        'default'   => '1.125em',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_column_width' , array(
        'default'   => '1120px',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_excerpt_length' , array(
        'default'   => 60,
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_sidebar_position', array(
        'default' => 'right',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_position', array(
        'default' => 'left',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
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

    $wp_customize->add_setting( 'mnmlwp_nav_align', array(
        'default' => 'flex-start',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_align_mobile', array(
        'default' => 'flex-start',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_animation', array(
        'default' => 'fade',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_nav_is_sticky', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_has_header_search', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_has_nav_search', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_center_header', array(
        'default' => false,
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
        'default' => 'elastic',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_header_padding_top' , array(
        'default'   => 1.5,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_header_padding_bottom' , array(
        'default'   => 1.5,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_item_padding_top_bottom' , array(
        'default'   => 15,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_item_padding_left_right' , array(
        'default'   => 15,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'mnmlwp_header_padding_bottom' , array(
        'default'   => 1.5,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_columns_spacing_horizontal' , array(
        'default'   => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'mnmlwp_columns_spacing_vertical' , array(
        'default'   => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ) );

    function mnmlwp_sanitize_checkbox( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }

    // Hero

    $wp_customize->add_setting( 'mnmlwp_hero_base_font_size_desktop' , array(
        'default'   => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_hero_base_font_size_tablet' , array(
        'default'   => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    $wp_customize->add_setting( 'mnmlwp_hero_base_font_size_mobile' , array(
        'default'   => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );

    // General

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_body_text_color', array(
        'label'      => esc_html__( 'Text color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_body_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_headings_text_color', array(
        'label'      => esc_html__( 'Headings color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_headings_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_link_color', array(
        'label'      => esc_html__( 'Link color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_link_hover_color', array(
        'label'      => esc_html__( 'Link hover color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_link_hover_color',
    ) ) );

    // Header

    $wp_customize->add_control( 'mnmlwp_logo_base_font_size_desktop', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo base font size (desktop)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_base_font_size_desktop',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_base_font_size_tablet', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo base font size (tablet)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_base_font_size_tablet',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_base_font_size_mobile', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo base font size (mobile)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_base_font_size_mobile',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_site_title_font_size', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Site title font size (em)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_site_title_font_size',
        'input_attrs' => array(
            'min' => .5,
            'max' => 2.5,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_site_subtitle_font_size', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Site tagline font size (em)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_site_subtitle_font_size',
        'input_attrs' => array(
            'min' => 0.25,
            'max' => 1.5,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_height_desktop', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo image height (desktop)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_height_desktop',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_height_tablet', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo image height (tablet)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_height_tablet',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_height_mobile', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo image height (mobile)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_height_mobile',
        'input_attrs' => array(
            'min' => 1,
            'max' => 3,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_header_bg_color', array(
        'label'      => esc_html__( 'Header background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_header_bg_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_logo_text_color', array(
        'label'      => esc_html__( 'Logo text color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_logo_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_logo_icon_color', array(
        'label'      => esc_html__( 'Logo icon color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_logo_icon_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_tagline_color', array(
        'label'      => esc_html__( 'Tagline color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_tagline_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_contact_row_bg_color', array(
        'label'      => esc_html__( 'Contact row background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_contact_row_bg_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_contact_row_text_color', array(
        'label'      => esc_html__( 'Contact row text', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_contact_row_text_color',
    ) ) );

    // Navigation

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_row_color', array(
        'label'      => esc_html__( 'Navigation background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_row_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_color', array(
        'label'      => esc_html__( 'Nav item color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_background_color', array(
        'label'      => esc_html__( 'Nav item background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_background_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_color_hover', array(
        'label'      => esc_html__( 'Nav item hover color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_color_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_link_background_color_hover', array(
        'label'      => esc_html__( 'Nav item hover background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_link_background_color_hover',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_active_link_color', array(
        'label'      => esc_html__( 'Nav item active color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_active_link_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_active_link_background_color', array(
        'label'      => esc_html__( 'Nav item active background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_active_link_background_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_nav_hamburger_color', array(
        'label'      => esc_html__( 'Hamburger icon color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_nav_hamburger_color',
    ) ) );
    
    // Breadcrumb navigation

    if( function_exists('breadcrumb_trail') ):
    
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_bg_color', array(
            'label'      => esc_html__( 'Breadcrumb background color', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_bg_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_text_color', array(
            'label'      => esc_html__( 'Breadcrumb text color', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_text_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_link_color', array(
            'label'      => esc_html__( 'Breadcrumb link color', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_link_color',
        ) ) );

        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_breadcrumb_link_hover_color', array(
            'label'      => esc_html__( 'Breadcrumb link color (hover)', 'mnmlwp' ),
            'section'    => 'colors',
            'settings'   => 'mnmlwp_breadcrumb_link_hover_color',
        ) ) );
        
    endif;

    // Footer

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_bg_color', array(
        'label'      => esc_html__( 'Footer background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_bg_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_text_color', array(
        'label'      => esc_html__( 'Footer text color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_headings_color', array(
        'label'      => esc_html__( 'Footer headings color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_headings_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_link_color', array(
        'label'      => esc_html__( 'Footer link color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_link_color_hover', array(
        'label'      => esc_html__( 'Footer link hover color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_link_color_hover',
    ) ) );

    // Customizer Controls Page Layout

    $wp_customize->add_control( 'mnmlwp_column_width', array(
        'label'      => esc_html__( 'Main content width (default: 1120px)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_column_width',
    ) );

    $wp_customize->add_control( 'mnmlwp_base_font_size', array(
        'label'      => esc_html__( 'Base font size (default: 1.125em)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_base_font_size',
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_position', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Main menu position', 'mnmlwp'),
        'choices' => array(
            'before_header' => __('Before header', 'mnmlwp'),
            'after_header' => __('After header (default)', 'mnmlwp'),
            'inside_header' => __('Inside header', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_position', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Logo position', 'mnmlwp'),
        'choices' => array(
            'left' => __('Left (default)', 'mnmlwp'),
            'right' => __('Right', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_align', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Main menu alignment (desktop)', 'mnmlwp'),
        'choices' => array(
            'flex-start' => __('Left (default)', 'mnmlwp'),
            'center' => __('Center', 'mnmlwp'),
            'flex-end' => __('Right', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_align_mobile', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Main menu alignment (mobile)', 'mnmlwp'),
        'choices' => array(
            'flex-start' => __('Left (default)', 'mnmlwp'),
            'center' => __('Center', 'mnmlwp'),
            'flex-end' => __('Right', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_animation', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Menu animation style', 'mnmlwp'),
        'choices' => array(
            'fade' => 'Fade (default)',
            'slide' => 'Slide',
        ),
    ) );

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

    $wp_customize->add_control( 'mnmlwp_excerpt_length', array(
        'label'      => esc_html__( 'Excerpt length in words (default: 60)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_excerpt_length',
        'type'       => 'number',
    ) );

    $wp_customize->add_control( 'mnmlwp_sidebar_position', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Sidebar position', 'mnmlwp'),
        'choices' => array(
            'right' => __('Right (default)', 'mnmlwp'),
            'left' => __('Left', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_is_boxed', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Boxed layout?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_is_sticky', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Sticky main navigation?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_has_header_search', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Include search form in header (desktop)?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_has_nav_search', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Include search form in main navigation (mobile)?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_center_header', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Center header content?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_has_loading_layer', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show loading animation on page load?', 'mnmlwp'),
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

    $wp_customize->add_control( 'mnmlwp_show_contact_row', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Show contact row?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_contact_row', array(
        'type' => 'textarea',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Contact row', 'mnmlwp'),
        'description' => esc_html__( 'This section will show at the top of your website and may include some contact information or similar stuff.', 'mnmlwp' ),
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_spinner_color', array(
        'label'      => esc_html__( 'Spinner color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_spinner_color',
    ) ) );

    $wp_customize->add_control( 'mnmlwp_header_padding_top', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Header padding top', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_header_padding_top',
        'input_attrs' => array(
            'min' => 0,
            'max' => 8,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_header_padding_bottom', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Header padding bottom', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_header_padding_bottom',
        'input_attrs' => array(
            'min' => 0,
            'max' => 8,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_item_padding_top_bottom', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Nav item padding top/bottom (desktop)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_nav_item_padding_top_bottom',
        'input_attrs' => array(
            'min' => 5,
            'max' => 31,
            'step' => 1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_item_padding_left_right', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Nav item padding left/right (desktop)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_nav_item_padding_left_right',
        'input_attrs' => array(
            'min' => 5,
            'max' => 31,
            'step' => 1,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_columns_spacing_horizontal', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Flex columns spacing (horizontal)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_columns_spacing_horizontal',
        'input_attrs' => array(
            'min' => 0,
            'max' => 64,
            'step' => 2,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_columns_spacing_vertical', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Folumns columns spacing (vertical)', 'mnmlwp' ),
        'section'    => 'mnmlwp_layout_section',
        'settings'   => 'mnmlwp_columns_spacing_vertical',
        'input_attrs' => array(
            'min' => 0,
            'max' => 64,
            'step' => 2,
            'style' => 'width:98%;'
        ),
    ) );

    // Hero

    $wp_customize->add_control( 'mnmlwp_hero_base_font_size_desktop', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Hero content base font size (desktop)', 'mnmlwp' ),
        'section'    => 'mnmlwp_hero_section',
        'settings'   => 'mnmlwp_hero_base_font_size_desktop',
        'input_attrs' => array(
            'min' => 0.5,
            'max' => 2,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_hero_base_font_size_tablet', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Hero content base font size (tablet)', 'mnmlwp' ),
        'section'    => 'mnmlwp_hero_section',
        'settings'   => 'mnmlwp_hero_base_font_size_tablet',
        'input_attrs' => array(
            'min' => 0.5,
            'max' => 2,
            'step' => 0.05,
            'style' => 'width:98%;'
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_hero_base_font_size_mobile', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Hero content base font size (mobile)', 'mnmlwp' ),
        'section'    => 'mnmlwp_hero_section',
        'settings'   => 'mnmlwp_hero_base_font_size_mobile',
        'input_attrs' => array(
            'min' => 0.5,
            'max' => 2,
            'step' => 0.05,
            'style' => 'width:98%;'
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
                 color: ' . esc_html( get_theme_mod('mnmlwp_body_text_color', '#2b323a') ) . ';
                 font-size: ' . esc_html( get_theme_mod('mnmlwp_base_font_size', '1.125em') ) . ';
             }

             .sk-fading-circle .sk-circle:before {
                 background-color: ' . esc_html( get_theme_mod('mnmlwp_spinner_color', '#000') )  . ';
             }

             .mnmlwp-row.mnmlwp-row--contact {
                 background: ' . esc_html( get_theme_mod('mnmlwp_contact_row_bg_color', '#21232b') ) . ';
             }

             .mnmlwp-column {
                 width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ';
             }

             .mnmlwp-column.mnmlwp-column--contact,
             .mnmlwp-column.mnmlwp-column--contact a,
             .mnmlwp-column.mnmlwp-column--contact a:hover {
                 color: ' . esc_html( get_theme_mod('mnmlwp_contact_row_text_color', '#fff') ) . ';
             }';

             // Flex columns spacing
             $mnmlwp_columns_spacing_horizontal = esc_html( get_theme_mod('mnmlwp_columns_spacing_horizontal', 0) );
             $mnmlwp_columns_spacing_vertical = esc_html( get_theme_mod('mnmlwp_columns_spacing_vertical', 0) );
             
             if( $mnmlwp_columns_spacing_horizontal > 0 || $mnmlwp_columns_spacing_vertical > 0 )
             {
                echo '.mnmlwp-flex-column {
                        margin-bottom: calc((1em + ' .  $mnmlwp_columns_spacing_vertical . 'px));
                    }
                        
                    .mnmlwp-flex-column--half {
                        width: calc(1/2 * 100% - (1 - 1/2) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                        
                    }
                    
                    .mnmlwp-flex-column--third {
                        width: calc(1/3 * 100% - (1 - 1/3) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--two-third {
                        width: calc(2/3 * 100% - (1 - 2/3) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--fourth {
                        width: calc(1/4 * 100% - (1 - 1/4) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--three-fourth {
                        width: calc(3/4 * 100% - (1 - 3/4) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--fifth {
                        width: calc(1/5 * 100% - (1 - 1/5) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--two-fifth {
                        width: calc(2/5 * 100% - (1 - 2/5) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    .mnmlwp-flex-column--three-fifth {
                        width: calc(3/5 * 100% - (1 - 3/5) * (1.5em + ' . $mnmlwp_columns_spacing_horizontal . 'px));
                    }

                    @media screen and (max-width: 767px) {
                        .mnmlwp-flex-column--half:not(.dont-break),
                        .mnmlwp-flex-column--third:not(.dont-break),
                        .mnmlwp-flex-column--two-third:not(.dont-break),
                        .mnmlwp-flex-column--fourth:not(.dont-break),
                        .mnmlwp-flex-column--three-fourth:not(.dont-break),
                        .mnmlwp-flex-column--fifth:not(.dont-break),
                        .mnmlwp-flex-column--two-fifth:not(.dont-break),
                        .mnmlwp-flex-column--three-fifth:not(.dont-break) {
                            width: 100%;
                            margin-right: 0;
                        }
                }';
             }
             
             // Breadcrumb navigation
             
             if( function_exists('breadcrumb_trail') ) {
                 echo ' .mnmlwp-row.mnmlwp-row--breadcrumbs {
                      background: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_bg_color', '#f4f7ff') ) . ';
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_text_color', '#34465b') ) . ';
                  }

                  .mnmlwp-row.mnmlwp-row--breadcrumbs a {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_color', '#2065b1') ) . ';
                  }

                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:hover,
                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:focus,
                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:active {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_hover_color', '#154e8c') ) . ';
                  }
                  
                  .trail-items li::after {
                      opacity: .25;
                  }';
             }

             if( get_theme_mod('mnmlwp_is_boxed') ) {
                  echo 'body {
                     padding: 1em 0;
                 }

                 .mnmlwp-row {
                     width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ';
                     margin: 0 auto;
                 }

                 .mnmlwp-row.mnmlwp-row--main .mnmlwp-column {
                     background: #fff;
                 }
                
                 .mnmlwp-column.mnmlwp-column--hero {
                     background: transparent!important;
                 }

                 .mnmlwp-column.mnmlwp-column--single {
                     background: #fff;
                 }
                 
                 @media screen and (max-width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ') {
                    body {
                        padding: 0 0;
                    }
                 }';
             } else {
                 echo '.mnmlwp-row-hero-wrapper {
                     background: transparent;
                 }';
             }

             echo 'h1, .h1, h2, h3, h4, h5, h6 {
                 color: ' . esc_html( get_theme_mod('mnmlwp_headings_text_color', '#2b323a') ) . ';
             }

             a,
             p a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ) . ';
             }

             blockquote::before {
                 color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ), 0.2 ) . ';
             }

             blockquote {
                 border-color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ), 0.1 ) . ';
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
                 color: ' . esc_html( get_theme_mod('mnmlwp_nav_link_color_hover', '#fff') ) . ';
             }

             .mnmlwp-btn,
             input[type=submit] {
                 background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ) . ';
             }

             .mnmlwp-btn:hover,
             .mnmlwp-btn:focus,
             input[type=submit]:hover,
             input[type=submit]:focus {
                 opacity: 1;
                 background: ' . mnmlwp_adjust_color( get_theme_mod('mnmlwp_link_color', '#2065b1'), -12 ) . ';
             }

             div.mnmlwp-logo a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_text_color', '#fff') ) . '!important;
             }

             .mnmlwp-logo-icon {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_icon_color', '#72b6ff') ) . '!important;
             }

             .mnmlwp-tagline {
                 color: ' . esc_html( get_theme_mod('mnmlwp_tagline_color', '#c1dfff') ) . '!important;
             }

            nav#main ul li,
            nav#main ul li a {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_link_background_color', '#21232b') ) . ';
            }

            nav#main ul li a:hover {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_link_background_color_hover', '#131419') ) . ';
            }

            nav#main ul li.current-menu-item > a,
            nav#main ul li.current_page_item > a,
            nav#main ul li.current-page-parent > a,
            nav#main ul li.current-menu-parent > a,
            nav#main ul li.current-menu-item > a:hover,
            nav#main ul li.current_page_item > a:hover,
            nav#main ul li.current-page-parent > a:hover,
            nav#main ul li.current-menu-item > a:focus,
            nav#main ul li.current_page_item > a:focus,
            nav#main ul li.current-page-parent > a:focus,
            nav#main ul li.current-menu-item > a:active,
            nav#main ul li.current_page_item > a:active,
            nav#main ul li.current-page-parent > a:active {
                opacity: 1;
                color: ' . esc_html( get_theme_mod('mnmlwp_nav_active_link_color', '#72b6ff') ) . ';
            }

            nav#main ul li.current-menu-item > a {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_active_link_background_color', '#131419') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit:hover,
            nav#main li.mnmlwp-main-nav-searchform button.submit:focus {
                opacity: 1;
                background: ' . mnmlwp_adjust_color( esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ), -12 ) . ';
            }

            .mnmlwp-pagination span.page-numbers {
                background: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ), 0.5) . ';
                color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ) . ';
            }

            .mnmlwp-pagination span.page-numbers.current {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#2065b1') ) . ';
                color: #fff;
            }

            .mnmlwp-row.mnmlwp-row--footer {
                background: ' . esc_html( get_theme_mod('mnmlwp_footer_bg_color', '#34465b') ) . ';
            }

            footer {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_text_color', '#f4f8f9') ) . '!important;
            }

            footer .mnmlwp-widget-title,
            footer .mnmlwp-widget-title a,
            footer .mnmlwp-widget-title a:hover,
            footer .mnmlwp-widget-title a:focus,
            footer .h1, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_headings_color', '#fff') ) . '!important;
            }
            
            footer a {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color', '#72b6ff') ) . ';
            }
            
            footer a:hover,
            footer a:focus {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color_hover', '#629cdb') ) . ';
            }

            @media screen and (max-width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ') {
                .mnmlwp-column.mnmlwp-column--single.mnmlwp-column--single-hero {
                    margin-top: 0;
                }
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
                echo '.mnmlwp-row.mnmlwp-row--header {
                    background: url(' . get_header_image()  . ') center center;
                    background-size: cover;
                }';
            } else {
                echo '.mnmlwp-row.mnmlwp-row--header {
                    background: ' . esc_html( get_theme_mod('mnmlwp_header_bg_color', '#34465b') ) . ';
                }';
            }

            // Heaer padding
            $mnmlwp_header_padding_top = esc_html( get_theme_mod('mnmlwp_header_padding_top', 1.5) );
            $mnmlwp_header_padding_bottom = esc_html( get_theme_mod('mnmlwp_header_padding_bottom', 1.5) );

            echo '.mnmlwp-column.mnmlwp-column--header {
                padding-top: ' . $mnmlwp_header_padding_top . 'em;
                padding-bottom: ' . $mnmlwp_header_padding_bottom . 'em;
            }';

            // Site title and subtitle (tagline)
            $mnmlwp_logo_base_font_size_desktop = esc_html( get_theme_mod('mnmlwp_logo_base_font_size_desktop', 1.75) );
            $mnmlwp_logo_base_font_size_tablet = esc_html( get_theme_mod('mnmlwp_logo_base_font_size_tablet', 1.75) );
            $mnmlwp_logo_base_font_size_mobile = esc_html( get_theme_mod('mnmlwp_logo_base_font_size_mobile', 1.5) );

            $mnmlwp_site_title_font_size = esc_html( get_theme_mod('mnmlwp_site_title_font_size', 1) );
            $mnmlwp_site_subtitle_font_size = esc_html( get_theme_mod('mnmlwp_site_subtitle_font_size', 0.5875) );

            echo '

            div.mnmlwp-logo {
                font-size: ' . $mnmlwp_logo_base_font_size_desktop . 'em;
            }

            @media screen and (max-width: 1023px) {
                div.mnmlwp-logo {
                    font-size: ' . $mnmlwp_logo_base_font_size_tablet . 'em;
                }
            }
            
            @media screen and (max-width: 640px) {
                div.mnmlwp-logo {
                    font-size: ' . $mnmlwp_logo_base_font_size_mobile . 'em;
                }
            }

            .mnmlwp-logo-icon, .mnmlwp-logo-text {
                font-size: ' . $mnmlwp_site_title_font_size . 'em;
            }

            .mnmlwp-tagline {
                font-size: ' . $mnmlwp_site_subtitle_font_size . 'em;
            }';

            // Logo height
            $mnmlwp_logo_height_desktop = esc_html( get_theme_mod('mnmlwp_logo_height_desktop', 2) );
            $mnmlwp_logo_height_tablet = esc_html( get_theme_mod('mnmlwp_logo_height_tablet', 2) );
            $mnmlwp_logo_height_mobile = esc_html( get_theme_mod('mnmlwp_logo_height_mobile', 2) );

            echo '.mnmlwp-logo-image {
                height: ' . $mnmlwp_logo_height_desktop . 'em;
            }

            @media screen and (max-width: 1023px) {
                .mnmlwp-logo-image {
                    height: ' . $mnmlwp_logo_height_tablet . 'em;
                }
            }
            
            @media screen and (max-width: 640px) {
                .mnmlwp-logo-image {
                    height: ' . $mnmlwp_logo_height_mobile . 'em;
                }
            }';

            // Nav position / hamburger icon
            echo '.mnmlwp-row.mnmlwp-row--nav {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_row_color', '#21232b') ) . ';
            }';

            // Nav item padding
            echo '@media screen and (min-width: 768px) {
                nav#main ul li a {
                    padding: ' . absint( get_theme_mod('mnmlwp_nav_item_padding_top_bottom', 15) ) . 'px ' . absint( get_theme_mod('mnmlwp_nav_item_padding_left_right', 15) ) . 'px;
                }
            }';

            switch( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) )
            {  
                case 'inside_header':
                
                    echo '
                
                    @media screen and (min-width: 768px) {
                        
                        .mnmlwp-row.mnmlwp-row--header {
                            overflow: visible;
                        }
                        
                        .mnmlwp-column.mnmlwp-column--header {
                            padding-left: 1.5em;
                            padding-right: 1.5em;
                            display: flex;
                            align-items: center;
                            overflow: visible;
                        }

                        .mnmlwp-column.mnmlwp-column--nav {
                            padding-left: 0;
                            padding-right: 0;
                            text-align: right;
                            width: auto;
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
                        }';

                    echo '}';
                        
                    echo '@media screen and (max-width: 767px) {            
                            .mnmlwp-column.mnmlwp-column--nav {
                                padding-left: 0;
                            }

                            nav#main li.mnmlwp-main-nav-searchform {
                                margin-left: 0;
                                margin-bottom: 0;
                            }
                        }';
                    
                    if( get_theme_mod('mnmlwp_nav_is_sticky', true) === true ) {
                        echo '.mnmlwp-row.mnmlwp-row--header {
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

                    break;    
            }

            // Main navigation alignmemnt
            $mnmlwp_main_nav_align = get_theme_mod('mnmlwp_nav_align', 'flex-start');
            $mnmlwp_main_nav_align_mobile = get_theme_mod('mnmlwp_nav_align_mobile', 'flex-start');

            echo 'nav#main ul {
                justify-content: ' . $mnmlwp_main_nav_align . ';
            }
            
            @media screen and (max-width: 767px) {';
                if( $mnmlwp_main_nav_align_mobile === 'flex-end' ) {
                    echo 'nav#main ul li {
                        text-align: right;
                    }

                    nav#main ul li a {
                        padding-right: 1em;
                    }
                    
                    nav#main ul li ul li a {
                        padding-left: 1em;
                        padding-right: 2em;
                    }';
                } else if( $mnmlwp_main_nav_align_mobile === 'center' ) {
                    echo 'nav#main ul li {
                        text-align: center;
                    }
                    
                    nav#main ul li a,
                        nav#main ul li ul li a {
                        text-align: center;
                        padding-left: .875em;
                        padding-right: .875em;
                    }';
                }
            echo '}';

            // Hero section
            $mnmlwp_hero_base_font_size_desktop = esc_html( get_theme_mod('mnmlwp_hero_base_font_size_desktop', 1) );
            $mnmlwp_hero_base_font_size_tablet = esc_html( get_theme_mod('mnmlwp_hero_base_font_size_tablet', 1) );
            $mnmlwp_hero_base_font_size_mobile = esc_html( get_theme_mod('mnmlwp_hero_base_font_size_mobile', 1) );

            echo '.mnmlwp-hero-inner {
                    font-size: ' . $mnmlwp_hero_base_font_size_desktop . 'em;
                }

            @media screen and (max-width: 1023px) {
                .mnmlwp-hero-inner {
                    font-size: ' . $mnmlwp_hero_base_font_size_tablet . 'em;
                }
            }

            @media screen and (max-width: 640px) {
                .mnmlwp-hero-inner {
                    font-size: ' . $mnmlwp_hero_base_font_size_mobile . 'em;
                }
            }';

            // Sidebar position
            $mnmlwp_sidebar_position = esc_html( get_theme_mod('mnmlwp_sidebar_position', 'right') );
            
            if( $mnmlwp_sidebar_position === 'left' ) {
                echo '@media screen and (min-width: 768px) {
                    .mnmlwp-flex-columns--main {
                        flex-direction: row-reverse;
                    }
                }';
            }

            // Logo position
            $mnmlwp_logo_position = esc_html( get_theme_mod('mnmlwp_logo_position', 'left') );
            
            if( $mnmlwp_logo_position === 'right' ) {
                echo '.mnmlwp-column.mnmlwp-column--header {
                        flex-direction: row-reverse;
                    }
                    
                    div.mnmlwp-logo {
                        flex: 1 1 25%;
                        text-align: right;
                    }

                    @media screen and (max-width: 767px) {
                        .hamburger {
                            padding: 15px 15px 15px 0;
                        }
                    }';
            } else {
                echo '.hamburger {
                    text-align: right;
                }';
            }

            // Center header
            if( get_theme_mod('mnmlwp_center_header', false) === true ) {
                echo 'div.mnmlwp-logo {
                    text-align: center;
                }

                .mnmlwp-column.mnmlwp-column--header {
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    text-align: center;
                }

                .mnmlwp-column--header #searchform {
                    margin-left: 0;
                }

                @media screen and (min-width: 768px) {';
                    if( esc_html( get_theme_mod('mnmlwp_logo_position', 'left') ) === 'right' ) {
                        echo '.mnmlwp-column.mnmlwp-column--header {
                            flex-direction: column-reverse;
                        }';
                    }
                echo '}

                @media screen and (max-width: 767px) {
                    .hamburger {
                        margin-top: .75em;
                        padding: 9px 9px 0 9px;
                    }
                }';

            }

            // Header flex item margins (this is probably the best solution
            // until flex gap is supported by all major browsers...)
            // Margins are only required for desktop layout.
            echo '@media screen and (min-width: 768px) {';

            if( get_theme_mod('mnmlwp_center_header', false) === false ) {

                if( $mnmlwp_logo_position !== 'right' ) {
                    echo '
                        div.mnmlwp-logo + .mnmlwp-row--nav-inside-header,
                        .mnmlwp-row--nav-inside-header + #searchform {
                            margin-left: .75rem;
                        }
                    ';
                } else {
                    echo '
                        div.mnmlwp-logo + .mnmlwp-row--nav-inside-header,
                        .mnmlwp-row--nav-inside-header + #searchform {
                            margin-right: .75rem;
                        }
                    ';
                }

            }

            else { // centered header

                if( $mnmlwp_logo_position !== 'right' ) {
                    echo 'div.mnmlwp-logo + .mnmlwp-row--nav-inside-header,
                    div.mnmlwp-logo + #searchform,
                    .mnmlwp-row--nav-inside-header + #searchform {
                        margin-top: .75rem;
                    }';
                } else {
                    echo 'div.mnmlwp-logo + .mnmlwp-row--nav-inside-header,
                    div.mnmlwp-logo + #searchform,
                    .mnmlwp-row--nav-inside-header + #searchform {
                        margin-bottom: .75rem;
                    }';
                }

            }

            echo '}';

    echo '</style>';
}

add_action( 'wp_head', 'mnmlwp_customizer_css');

// Theme Logo
function mnmlwp_theme_prefix_setup()
{
    add_theme_support( 'custom-logo', array(
        'height'      => 320,
        'width'       => 800,
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

// Sanitize float values
function mnmlwp_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}