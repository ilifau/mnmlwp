<?php

    /**
     * Archive by author
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
        echo '<div class="mnmlwp-flex-columns">';
        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third">';
    }

    echo mnmlwp_get_posts();

    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

        echo '</div>';

        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third">';

            echo get_sidebar();

        echo '</div>';
        echo '</div>';

    }

    get_footer();
