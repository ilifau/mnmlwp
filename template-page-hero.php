<?php

    /**
     * Template Name: Hero (Page)
     * Template Post Type: page
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    echo mnmlwp_get_hero_row();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);
    
    ?>

    <div class="row row--single row--single-hero">

        <div class="column column--single column--single-hero">

            <?php

            if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
                echo '<div class="three-fourth">';
            }

            ?>

            <main>

                <?php

                if (have_posts()) :

                    while (have_posts()) : the_post();

                        if( ! $mnmlwp_hide_page_title ) {
                            echo '<h1>' . get_the_title() . '</h1>';
                        }
                        
                        the_content();

                    endwhile;

                endif;

                ?>

            </main>

            <?php

            if( is_active_sidebar( 'mnmlwp-sidebar' )  && $mnmlwp_show_sidebar == 1 ) {

                echo '</div>';

                echo '<div class="one-fourth last-column">';

                    echo get_sidebar();

                echo '</div>';

            }

            ?>

        </div>

    </div>

<?php get_footer();
