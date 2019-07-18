<?php

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    echo '<div class="mnmlwp-sidebar">';

        switch( get_post_type() )
        {
            default:
                if ( is_active_sidebar( 'mnmlwp-sidebar' ) ) :
                    dynamic_sidebar( 'mnmlwp-sidebar' );
                endif;

                break;
        }

    echo '</div>';
