<?php

    /**
     * Single Page Template
     */

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);

    echo '<div class="row">';

        echo '<div class="column">';

            if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
                echo '<div class="three-fourth">';
            }

            echo '<main>';

                if (have_posts()) :

                    while (have_posts()) : the_post();

                        if( ! $mnmlwp_hide_page_title ) {
                            echo '<h1>' . get_the_title() . '</h1>';
                        }
                        
                        if ( has_post_thumbnail() ) {
                            echo '<img class="mnmlwp-featured-image lazy" data-original="' . get_the_post_thumbnail_url() . '" src="' . mnmlwp_assets_url() . '/img/placeholder.png" title="' . get_the_title() . '">';
                        }
                        
                        the_content();

                    endwhile;

                endif;

            echo '</main>';
            
            if ( comments_open() || get_comments_number() )
                comments_template();

            if( is_active_sidebar( 'mnmlwp-sidebar' )  && $mnmlwp_show_sidebar == 1 ) {

                echo '</div>';

                echo '<div class="one-fourth last-column">';

                    echo get_sidebar();

                echo '</div>';

            }

        echo '</div>';

    echo '</div>';

    get_footer();
