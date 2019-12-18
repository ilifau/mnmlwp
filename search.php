<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    global $wp_query;

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
        echo '<div class="three-fourth">';
    }

    echo mnmlwp_get_posts();

    echo '<div class="clear-column"></div>';

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

        echo '</div>';

        echo '<div class="one-fourth last-column">';

            echo get_sidebar();

        echo '</div>';

    }

    get_footer();
