<?php

    /* Template for single posts */

    if ( ! defined( 'ABSPATH' ) ) {
        exit;
    }

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);

    while ( have_posts() ) : the_post(); ?>

        <?php

        if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
            echo '<div class="mnmlwp-flex-columns mnmlwp-flex-columns--main">';
            echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--two-third mnmlwp-flex-column--content">';
        }

        ?>
        
        <main>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <header class="entry-header">
                    <!-- Categories and Tags, Author and Date -->
                    <div class="mnmlwp-meta-wrapper mnmlwp-meta-wrapper--single">
                        <?php echo mnmlwp_get_post_meta( $post->ID ); ?>
                    </div>
                </header>

                <!-- Entry Content -->
                <div class="entry-content">
                    <?php
                    
                    if( ! $mnmlwp_hide_page_title ) {
                        echo '<h1 class="mnmlwp-page-title">' . get_the_title() . '</h1>';
                    }
                    
                    if ( has_post_thumbnail() ) {
                        echo '<img class="mnmlwp-featured-image lazy" data-original="' . get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-1600' ) . '" src="' . mnmlwp_assets_url() . '/img/placeholder.png" title="' . get_the_title() . '">';
                    }
                    
                    the_content();
                    
                    wp_link_pages();
                    
                    ?>
                </div>

            </article>
            
        </main>

        <!-- Shariff -->
        <?php if ( shortcode_exists( 'shariff' ) ) {
                echo do_shortcode('[shariff]');
            } ?>

        <!-- Previous/Next Posts -->
        <?php mnmlwp_adjacent_posts(); ?>

        <?php

        if( is_active_sidebar( 'mnmlwp-sidebar' )  && $mnmlwp_show_sidebar == 1 ) {

            echo '</div>';

            echo '<div class="mnmlwp-flex-column mnmlwp-flex-column--third mnmlwp-flex-column--sidebar">';

                echo get_sidebar();

            echo '</div>';
            echo '</div>';

        }

        ?>
        
        <?php if ( comments_open() || get_comments_number() ) : ?>
            
            <?php comments_template(); ?>
        
        <?php endif; ?>        

    <?php endwhile;

    get_footer();
