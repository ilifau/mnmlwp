<?php

    /**
     * Template Name: Post Archive
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );

    echo '<div class="row">';

        echo '<div class="column">';

            if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
                echo '<div class="three-fourth">';
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

                echo '<div class="one-fourth last-column">';

                    echo get_sidebar();

                echo '</div>';

            }

        echo '</div>';

    echo '</div>';

    get_footer();
