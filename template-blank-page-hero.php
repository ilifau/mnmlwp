<?php

    /**
     * Template Name: Blank Template (Hero)
     * Template Post Type: post, page
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    echo mnmlwp_get_hero_row(); ?>

    <main>

        <?php

        if (have_posts()) :

            while (have_posts()) : the_post();
                
                the_content();

            endwhile;

        endif;

        ?>

    </main>

    <?php get_footer();
