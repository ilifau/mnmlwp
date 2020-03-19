<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();
        
    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
        echo '<div class="mnmlwp-flex-columns">';
        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third">';
    }

    echo '<main>';

        echo '<h1>404 &ndash; ' . esc_html__('Ooops!', 'mnmlwp') . '</h2>';
        echo '<p>' . esc_html__('Sorry, but there is no content attached to this URL.', 'mnmlwp');
        echo '<p>' . sprintf( esc_html__('Please go back to the %s or use the search form.', 'mnmlwp'), '<a href="' . esc_url( home_url() ) . '">' . esc_html__('front page', 'mnmlwp') . '</a>') . '</p>';

    echo '</main>';
    
    if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

        echo '</div>';

        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third">';

            echo get_sidebar();

        echo '</div>';
        echo '</div>';

    }

    get_footer();
