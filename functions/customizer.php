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
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_headings_text_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_link_hover_color' , array(
        'default'   => '#0f4996',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Header

    $wp_customize->add_setting( 'mnmlwp_has_logo_and_title' , array(
        'default'   => 0,
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

    $wp_customize->add_setting( 'mnmlwp_logo_height_mobile' , array(
        'default'   => 2,
        'transport' => 'refresh',
        'sanitize_callback' => 'mnmlwp_sanitize_float',
    ) );
    
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

    $wp_customize->add_setting( 'mnmlwp_header_bg_color' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_text_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_tagline_color' , array(
        'default'   => '#969696',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_logo_icon' , array(
        'default'   => 'superpowers',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_setting( 'mnmlwp_contact_row_bg_color' , array(
        'default'   => '#005141',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_contact_row_text_color' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_contact_row', array(
        'capability' => 'edit_theme_options',
        'default' =>'Hey, this is the mnmlWP contact row! 😊',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    
    // Breadcrumb navigation
    
    if( function_exists('breadcrumb_trail') ): 
    
        $wp_customize->add_setting( 'mnmlwp_breadcrumb_bg_color' , array(
            'default'   => '#ffffff',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_text_color' , array(
            'default'   => '#252525',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_color' , array(
            'default'   => '#1559b2',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );

        $wp_customize->add_setting( 'mnmlwp_breadcrumb_link_hover_color' , array(
            'default'   => '#0f4996',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color',
        ) );
        
    endif;

    // Navigation

    $wp_customize->add_setting( 'mnmlwp_nav_row_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_color' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_background_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_color_hover' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_link_background_color_hover' , array(
        'default'   => '#0f4996',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_active_link_color' , array(
        'default'   => '#ffffff',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_active_link_background_color' , array(
        'default'   => '#0f4996',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_nav_hamburger_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Footer

    $wp_customize->add_setting( 'mnmlwp_footer_bg_color' , array(
        'default'   => '#f9f9f9',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_text_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_headings_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_footer_link_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_link_color_hover' , array(
        'default'   => '#0f4996',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    // Footer Full Width
    $wp_customize->add_setting( 'mnmlwp_footer_full_width_bg_color' , array(
        'default'   => '#f7f7f7',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_full_width_text_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_full_width_headings_color' , array(
        'default'   => '#252525',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'mnmlwp_footer_full_width_link_color' , array(
        'default'   => '#1559b2',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_full_width_link_color_hover' , array(
        'default'   => '#0f4996',
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

    $wp_customize->add_setting( 'mnmlwp_footer_columns_amount', array(
        'default' => 3,
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_setting( 'mnmlwp_footer_full_width_text_align', array(
        'default' => 'center',
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

    $wp_customize->add_setting( 'mnmlwp_nav_is_sticky', array(
        'default' => true,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'mnmlwp_sanitize_checkbox',
    ) );

    $wp_customize->add_setting( 'mnmlwp_center_header', array(
        'default' => false,
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

    $wp_customize->add_setting( 'mnmlwp_sub_menu_align_desktop', array(
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
        'default'   => 16,
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

    $wp_customize->add_control( 'mnmlwp_has_logo_and_title', array(
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'label' => esc_html__( 'Display logo and title?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_logo_height_desktop', array(
        'type'       => 'range',
        'label'      => esc_html__( 'Logo image height (desktop)', 'mnmlwp' ),
        'section'    => 'title_tagline',
        'settings'   => 'mnmlwp_logo_height_desktop',
        'input_attrs' => array(
            'min' => 1,
            'max' => 12,
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
            'max' => 12,
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
            'max' => 12,
            'step' => 0.1,
            'style' => 'width:98%;'
        ),
    ) );

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

    // Footer Full Width

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_full_width_bg_color', array(
        'label'      => esc_html__( 'Footer (full width) background color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_full_width_bg_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_full_width_text_color', array(
        'label'      => esc_html__( 'Footer (full width) text color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_full_width_text_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_full_width_headings_color', array(
        'label'      => esc_html__( 'Footer (full width) headings color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_full_width_headings_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_full_width_link_color', array(
        'label'      => esc_html__( 'Footer (full width) link color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_full_width_link_color',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'mnmlwp_footer_full_width_link_color_hover', array(
        'label'      => esc_html__( 'Footer (full width) link hover color', 'mnmlwp' ),
        'section'    => 'colors',
        'settings'   => 'mnmlwp_footer_full_width_link_color_hover',
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

    $wp_customize->add_control( 'mnmlwp_logo_position', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Logo position', 'mnmlwp'),
        'choices' => array(
            'left' => __('Left (default)', 'mnmlwp'),
            'right' => __('Right', 'mnmlwp'),
        ),
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

    $wp_customize->add_control( 'mnmlwp_sub_menu_align_desktop', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Sub menu item text align (desktop)', 'mnmlwp'),
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
        'label' => esc_html__( 'Menu animation style (mobile)', 'mnmlwp'),
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

    $wp_customize->add_control( 'mnmlwp_footer_columns_amount', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Number of footer widget columns', 'mnmlwp'),
        'choices' => array(
            0 => '0',
            1 => '1',
            2 => '2',
            3 => __('3 (default)', 'mnmlwp'),
            4 => '4',
            5 => '5',
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_footer_full_width_text_align', array(
        'type' => 'select',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Footer (full width) text align', 'mnmlwp'),
        'choices' => array(
            'center' => __('Center (default)', 'mnmlwp'),
            'left' => __('Left', 'mnmlwp'),
            'right' => __('Right', 'mnmlwp'),
        ),
    ) );

    $wp_customize->add_control( 'mnmlwp_nav_is_sticky', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Sticky main navigation?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_center_header', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Center header content?', 'mnmlwp'),
    ) );

    $wp_customize->add_control( 'mnmlwp_is_boxed', array(
        'type' => 'checkbox',
        'section' => 'mnmlwp_layout_section',
        'label' => esc_html__( 'Boxed layout?', 'mnmlwp'),
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
                 color: ' . esc_html( get_theme_mod('mnmlwp_body_text_color', '#252525') ) . ';
                 font-size: ' . esc_html( get_theme_mod('mnmlwp_base_font_size', '1.125em') ) . ';
             }

             .sk-fading-circle .sk-circle:before {
                 background-color: ' . esc_html( get_theme_mod('mnmlwp_spinner_color', '#666666') )  . ';
             }

             .mnmlwp-row.mnmlwp-row--contact {
                 background: ' . esc_html( get_theme_mod('mnmlwp_contact_row_bg_color', '#005141') ) . ';
             }

             .mnmlwp-column {
                 width: ' . esc_html( get_theme_mod('mnmlwp_column_width', '1120px') ) . ';
             }

             .mnmlwp-column.mnmlwp-column--contact,
             .mnmlwp-column.mnmlwp-column--contact a,
             .mnmlwp-column.mnmlwp-column--contact a:hover,
             .mnmlwp-column.mnmlwp-column--contact a:focus {
                 color: ' . esc_html( get_theme_mod('mnmlwp_contact_row_text_color', '#ffffff') ) . ';
             }';

             // Flex columns spacing
             $mnmlwp_columns_spacing_horizontal = esc_html( get_theme_mod('mnmlwp_columns_spacing_horizontal', 0) );
             $mnmlwp_columns_spacing_vertical = esc_html( get_theme_mod('mnmlwp_columns_spacing_vertical', 16) );
             
             if( $mnmlwp_columns_spacing_horizontal > 0 || $mnmlwp_columns_spacing_vertical > 0 )
             {
                echo '.mnmlwp-flex-column {
                        margin-bottom: ' .  $mnmlwp_columns_spacing_vertical . 'px;
                    }

                    .mnmlwp-footer-widgets .mnmlwp-flex-column {
                        margin-bottom: 0;
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
                      background: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_bg_color', '#ffffff') ) . ';
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_text_color', '#252525') ) . ';
                  }

                  .mnmlwp-row.mnmlwp-row--breadcrumbs a {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_color', '#1559b2') ) . ';
                  }

                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:hover,
                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:focus,
                  .mnmlwp-row.mnmlwp-row--breadcrumbs a:active {
                      color: ' . esc_html( get_theme_mod('mnmlwp_breadcrumb_link_hover_color', '#0f4996') ) . ';
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
                 color: ' . esc_html( get_theme_mod('mnmlwp_headings_text_color', '#252525') ) . ';
             }

             a,
             p a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ) . ';
             }

             blockquote::before {
                 color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ), 0.2 ) . ';
             }

             blockquote {
                 border-color: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ), 0.1 ) . ';
             }

             a:hover,
             a:focus,
             p a:hover,
             p a:focus {
                 color: ' . esc_html( get_theme_mod('mnmlwp_link_hover_color', '#006093') ) . ';
             }

             nav#main ul li a {
                 color: ' . esc_html( get_theme_mod('mnmlwp_nav_link_color', '#ffffff') ) . ';
             }

             nav#main ul li a:hover,
             nav#main ul li a:focus {
                 color: ' . esc_html( get_theme_mod('mnmlwp_nav_link_color_hover', '#ffffff') ) . ';
             }

             .mnmlwp-btn,
             input[type=submit] {
                 background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ) . ';
             }

             .mnmlwp-btn:hover,
             .mnmlwp-btn:focus,
             input[type=submit]:hover,
             input[type=submit]:focus {
                 opacity: 1;
                 background: ' . mnmlwp_adjust_color( get_theme_mod('mnmlwp_link_color', '#1559b2'), -12 ) . ';
             }

             .mnmlwp-logo-text {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_text_color', '#252525') ) . '!important;
             }

             .mnmlwp-logo-icon {
                 color: ' . esc_html( get_theme_mod('mnmlwp_logo_icon_color', '#252525') ) . '!important;
             }

             .mnmlwp-tagline {
                 color: ' . esc_html( get_theme_mod('mnmlwp_tagline_color', '#969696') ) . '!important;
             }

            nav#main ul li,
            nav#main ul li a {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_link_background_color', '#1559b2') ) . ';
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
                color: ' . esc_html( get_theme_mod('mnmlwp_nav_active_link_color', '#ffffff') ) . ';
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_active_link_background_color', '#0f4996') ) . ';
            }

            nav#main ul li a:hover,
            nav#main ul li a:focus {
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_link_background_color_hover', '#0f4996') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ) . ';
            }

            nav#main li.mnmlwp-main-nav-searchform button.submit:hover,
            nav#main li.mnmlwp-main-nav-searchform button.submit:focus {
                opacity: 1;
                background: ' . mnmlwp_adjust_color( esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ), -12 ) . ';
            }

            .mnmlwp-pagination span.page-numbers {
                background: ' . mnmlwp_hex2rgba( esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ), 0.5) . ';
                color: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ) . ';
            }

            .mnmlwp-pagination span.page-numbers.current {
                background: ' . esc_html( get_theme_mod('mnmlwp_link_color', '#1559b2') ) . ';
                color: #fff;
            }

            .mnmlwp-row.mnmlwp-row--footer {
                background: ' . esc_html( get_theme_mod('mnmlwp_footer_bg_color', '#f9f9f9') ) . ';
            }

            footer {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_text_color', '#252525') ) . '!important;
            }

            footer .mnmlwp-widget-title,
            footer .mnmlwp-widget-title a,
            footer .mnmlwp-widget-title a:hover,
            footer .mnmlwp-widget-title a:focus,
            footer .h1, footer h1, footer h2, footer h3, footer h4, footer h5, footer h6 {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_headings_color', '#252525') ) . '!important;
            }
            
            footer a {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color', '#1559b2') ) . ';
            }
            
            footer a:hover,
            footer a:focus {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_link_color_hover', '#0f4996') ) . ';
            }

            .mnmlwp-row.mnmlwp-row--footer-full-width {
                background: ' . esc_html( get_theme_mod('mnmlwp_footer_full_width_bg_color', '#f7f7f7') ) . ';
            }

            .mnmlwp-row.mnmlwp-row--footer-full-width {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_full_width_text_color', '#252525') ) . '!important;
            }

            .mnmlwp-row.mnmlwp-row--footer-full-width .mnmlwp-widget-title,
            .mnmlwp-row.mnmlwp-row--footer-full-width .mnmlwp-widget-title a,
            .mnmlwp-row.mnmlwp-row--footer-full-width .mnmlwp-widget-title a:hover,
            .mnmlwp-row.mnmlwp-row--footer-full-width .mnmlwp-widget-title a:focus,
            .mnmlwp-row.mnmlwp-row--footer-full-width .h1,
            .mnmlwp-row.mnmlwp-row--footer-full-width h1,
            .mnmlwp-row.mnmlwp-row--footer-full-width h2,
            .mnmlwp-row.mnmlwp-row--footer-full-width h3,
            .mnmlwp-row.mnmlwp-row--footer-full-width h4,
            .mnmlwp-row.mnmlwp-row--footer-full-width h5,
            .mnmlwp-row.mnmlwp-row--footer-full-width h6 {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_full_width_headings_color', '#252525') ) . '!important;
            }
            
            .mnmlwp-row.mnmlwp-row--footer-full-width a {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_full_width_link_color', '#1559b2') ) . ';
            }
            
            .mnmlwp-row.mnmlwp-row--footer-full-width a:hover,
            .mnmlwp-row.mnmlwp-row--footer-full-width a:focus {
                color: ' . esc_html( get_theme_mod('mnmlwp_footer_full_width_link_color_hover', '#0f4996') ) . ';
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
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_hamburger_color', '#1559b2') ) . ';
            }';

            if( has_header_image() ) {
                echo '.mnmlwp-row.mnmlwp-row--header {
                    background: url(' . get_header_image()  . ') center center;
                    background-size: cover;
                }';
            } else {
                echo '.mnmlwp-row.mnmlwp-row--header {
                    background: ' . esc_html( get_theme_mod('mnmlwp_header_bg_color', '#ffffff') ) . ';
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
                background: ' . esc_html( get_theme_mod('mnmlwp_nav_row_color', '#1559b2') ) . ';
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
            $mnmlwp_sub_menu_align_desktop = get_theme_mod('mnmlwp_sub_menu_align_desktop', 'flex-start');

            if( $mnmlwp_sub_menu_align_desktop === 'flex-start' ) {
                $mnmlwp_sub_menu_text_align_desktop = 'left';
            }  else if( $mnmlwp_sub_menu_align_desktop === 'flex-end' ) {
                $mnmlwp_sub_menu_text_align_desktop = 'right';
            } else {
                $mnmlwp_sub_menu_text_align_desktop = 'center';
            }

            echo 'nav#main ul {
                justify-content: ' . $mnmlwp_main_nav_align . ';
            }

            @media screen and (min-width: 768px) {
                nav#main ul.sub-menu li a {
                    justify-content: ' . $mnmlwp_sub_menu_align_desktop . ';
                    text-align: ' . $mnmlwp_sub_menu_text_align_desktop . ';
                }
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
                    }
                    
                    nav#main .mnmlwp-searchform {
                        margin-right: 1em;
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
                    }
                    
                    nav#main .mnmlwp-searchform {
                        margin-left: 0;
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

            // Footer full width text align
            $mnmlwp_footer_full_width_text_align = esc_html( get_theme_mod('mnmlwp_footer_full_width_text_align', 'center') );
            
            echo '.mnmlwp-row.mnmlwp-row--footer-full-width {
                text-align: ' . $mnmlwp_footer_full_width_text_align . ';
            }';

            // Logo position
            $mnmlwp_logo_position = esc_html( get_theme_mod('mnmlwp_logo_position', 'left') );
            
            if( $mnmlwp_logo_position === 'right' ) {
                echo '.mnmlwp-column.mnmlwp-column--header {
                        flex-direction: row-reverse;
                    }
                    
                    .mnmlwp-logo-wrapper {
                        flex: 1 1 25%;
                        justify-content: flex-end;
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
                if( ! has_custom_logo() || ( 0 == get_theme_mod( 'mnmlwp_has_logo_and_title', 0 ) ) ) {
                    echo '.mnmlwp-site-title-wrapper {
                        justify-content: center;
                    }';
                }
                
                echo '.mnmlwp-logo-wrapper {
                    text-align: center;
                }

                .mnmlwp-column.mnmlwp-column--header {
                    flex-direction: column;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                    text-align: center;
                }

                .mnmlwp-column--header .mnmlwp-searchform {
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
                        .mnmlwp-logo-wrapper + .mnmlwp-row--nav-inside-header,
                        .mnmlwp-row--nav-inside-header + .mnmlwp-searchform {
                            margin-left: .75rem;
                        }
                    ';
                } else {
                    echo '
                        .mnmlwp-logo-wrapper + .mnmlwp-row--nav-inside-header,
                        .mnmlwp-row--nav-inside-header + .mnmlwp-searchform {
                            margin-right: .75rem;
                        }
                    ';
                }

            }

            else { // centered header

                if( $mnmlwp_logo_position !== 'right' ) {
                    echo '.mnmlwp-logo-wrapper + .mnmlwp-row--nav-inside-header,
                    .mnmlwp-logo-wrapper + .mnmlwp-searchform,
                    .mnmlwp-row--nav-inside-header + .mnmlwp-searchform {
                        margin-top: 1rem;
                    }';
                } else {
                    echo '.mnmlwp-logo-wrapper + .mnmlwp-row--nav-inside-header,
                    .mnmlwp-logo-wrapper + .mnmlwp-searchform,
                    .mnmlwp-row--nav-inside-header + .mnmlwp-searchform {
                        margin-bottom: 1rem;
                    }';
                }

            }

            echo '}';

            /* Gutenberg block width */
            echo '.wp-block-column.mnmlwp-column  {
                flex: 0 0 ' . get_theme_mod('mnmlwp_column_width', '1120px') . ';
                margin: 0 auto;
                padding: 0 0;
            }';

            /* Align wide */
            $mnmlwp_column_width_px = false;
            $mnmlwp_column_width = get_theme_mod('mnmlwp_column_width', '1120px');

            if( strpos( $mnmlwp_column_width, 'em' ) !== false ) {
               $mnmlwp_column_width_px = str_replace('em', '', $mnmlwp_column_width);
               $mnmlwp_column_width_px = $mnmlwp_column_width_px * 16;
            }

            if( strpos( $mnmlwp_column_width, 'pt' ) !== false ) {
                $mnmlwp_column_width_px = str_replace('pt', '', $mnmlwp_column_width);
                $mnmlwp_column_width_px = $mnmlwp_column_width_px * 1.2525252525253333;
             }

            else if( strpos( $mnmlwp_column_width, 'px' ) !== false ) {
                $mnmlwp_column_width_px = str_replace('px', '', $mnmlwp_column_width);
            }
            
            if( $mnmlwp_column_width_px !== false ) {
                $mnmlwp_column_width_px = $mnmlwp_column_width_px * 1.15;
                echo '@media screen and (min-width: ' . $mnmlwp_column_width_px . 'px) {
                    body:not(.mnmlwp-sidebar-is-active) .alignwide {
                        width: calc(100% + 10vw);
                        max-width: calc(100% + 10vw);
                        position: relative;
                        left: -5vw;
                        text-align: center;
                    }
                }
                
                body:not(.mnmlwp-sidebar-is-active) .alignwide img {
                    max-width: none;
                }';
            }

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