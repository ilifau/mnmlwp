<?php

    /**
     * Template Name: Blank Template (Hero)
     * Template Post Type: post, page
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

        echo mnmlwp_get_hero_row();

        echo '<main>';

            if (have_posts()) :

                while (have_posts()) : the_post();
                    
                    the_content();

                endwhile;

            endif;

        echo '</main>';

    get_footer();
