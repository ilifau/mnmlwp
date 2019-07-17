<?php

    /**
     * Archive by author
     */

    get_header();

    echo '<div class="row">';

        echo '<div class="column">';

            if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {
                echo '<div class="three-fourth">';
            }

            echo mnmlwp_get_posts();

            if( is_active_sidebar( 'mnmlwp-sidebar' ) ) {

                echo '</div>';

                echo '<div class="one-fourth last-column">';

                    echo get_sidebar();

                echo '</div>';

            }

        echo '</div>';

    echo '</div>';

    get_footer();
