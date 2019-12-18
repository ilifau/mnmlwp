<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);

    if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
        echo '<div class="three-fourth">';
    }

    echo '<h1>' . esc_html__('Latest Posts', 'mnmlwp') . '</h1>';

    echo mnmlwp_get_posts();

    if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {

        echo '</div>';

        echo '<div class="one-fourth last-column">';

            echo get_sidebar();

        echo '</div>';

    }

    get_footer();
