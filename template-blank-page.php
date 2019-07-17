<?php

    /**
     * Template Name: Blank Template
     * Template Post Type: post, page
     */

    get_header();

        echo '<main>';

            if (have_posts()) :

                while (have_posts()) : the_post();

                    the_content();

                endwhile;

            endif;

        echo '</main>';

    get_footer();
