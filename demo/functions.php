<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function mnmlwp_import_files()
{
    return array(
        array(
            'import_file_name'             => 'Base',
            'categories'                   => array('Base'),
            'import_file_url'              => 'https://base.minimalwordpress.de/demo/content.xml',
            'import_widget_file_url'       => 'https://base.minimalwordpress.de/demo/widgets.wie',
            'import_customizer_file_url'   => 'https://base.minimalwordpress.de/demo/customizer.dat',
            'import_preview_image_url'     => 'https://base.minimalwordpress.de/demo/screenshot.png',
            'preview_url'                  => 'https://base.minimalwordpress.de',
            'import_notice'              => __( 'Please configure your widgets and category colors after importing the demo content.', 'mnmlwp' ),
        ),
    );
}

add_filter( 'pt-ocdi/import_files', 'mnmlwp_import_files' );

// Before Import
function mnmlwp_before_widgets_import( $selected_import )
{
    update_option( 'sidebars_widgets', array() );
}

add_action( 'pt-ocdi/before_widgets_import', 'mnmlwp_before_widgets_import' );

// After Import
function mnmlwp_after_import_setup()
{
    // Assign menus to their locations.
    $main_menu = get_term_by( 'name', 'Main Navigation', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'main-nav' => $main_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Welcome' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
}

add_action( 'pt-ocdi/after_import', 'mnmlwp_after_import_setup' );