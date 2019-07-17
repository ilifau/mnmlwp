<?php

    get_header();

    echo '<div class="row">';

        echo '<div class="column">';
        
            if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
                echo '<div class="three-fourth">';
            }

            echo '<main>';

                echo '<h1>404 &ndash; ' . esc_html__('Ooops!', 'mnmlwp') . '</h2>';
                echo '<p>' . esc_html__('Sorry, but there is no content attached to this URL.', 'mnmlwp');
                echo '<p>' . sprintf( esc_html__('Please go back to the %s or use the search form.', 'mnmlwp'), '<a href="' . esc_url( home_url() ) . '">' . esc_html__('front page', 'mnmlwp') . '</a>') . '</p>';

            echo '</main>';
            
            if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

                echo '</div>';

                echo '<div class="one-fourth last-column">';

                    echo get_sidebar();

                echo '</div>';

            }

        echo '</div>';

    echo '</div>';

    get_footer();
