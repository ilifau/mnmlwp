<?php

function mnmlwp_import_files()
{
    return array(
        array(
            'import_file_name'             => 'Default',
            'categories'                   => array('Default'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/data/default/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/data/default/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/data/default/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/data/default/screenshot.png',
            'preview_url'                  => 'https://mnmlwp.de',
            'import_notice'              => __( 'Please configure your widgets and category colors after importing the demo content.', 'mnmlwp' ),
        ),
        array(
            'import_file_name'             => 'WordPress',
            'categories'                   => array('Modified'),
            'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo/data/wordpress/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo/data/wordpress/widgets.wie',
            'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo/data/wordpress/customizer.dat',
            'import_preview_image_url'     => get_template_directory_uri() . '/demo/data/wordpress/screenshot.png',
            'import_notice'              => __( 'Please configure your widgets and category colors after importing the demo content.', 'mnmlwp' ),
        ),
    );
}

add_filter( 'pt-ocdi/import_files', 'mnmlwp_import_files' );

// Before Import
function mnmlwp_before_widgets_import( $selected_import )
{
    // ...
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
    $front_page_id = get_page_by_title( 'About' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
}

add_action( 'pt-ocdi/after_import', 'mnmlwp_after_import_setup' );