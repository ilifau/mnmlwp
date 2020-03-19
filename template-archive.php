<?php

    /**
     * Template Name: Post Archive
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );

    if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
        echo '<div class="mnmlwp-flex-columns">';
        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third">';
    }
    
    echo '<main>';

        if (have_posts()) :

            while (have_posts()) : the_post();

                the_content();

            endwhile;

        endif;
        
    echo '</main>';

    echo mnmlwp_get_posts();

    if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {

        echo '</div>';

        echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third">';

            echo get_sidebar();

        echo '</div>';
        echo '</div>';

    }

    get_footer();
