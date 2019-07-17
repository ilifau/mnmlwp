<?php

    /* Template for single posts */

    get_header();

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_hide_page_title = filter_var(get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true ), FILTER_VALIDATE_BOOLEAN);

    while ( have_posts() ) : the_post(); ?>

        <div class="row row--single">

            <div class="column column--single">

                <?php

                if( is_active_sidebar( 'mnmlwp-sidebar' ) && $mnmlwp_show_sidebar == 1 ) {
                    echo '<div class="three-fourth">';
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
                                echo '<img class="mnmlwp-featured-image lazy" data-original="' . get_the_post_thumbnail_url() . '" src="' . mnmlwp_assets_url() . '/img/placeholder.png" title="' . get_the_title() . '">';
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

                    echo '<div class="one-fourth last-column">';

                        echo get_sidebar();

                    echo '</div>';

                }

                ?>

            </div>

        </div>
        
        <?php if ( comments_open() || get_comments_number() ) : ?>
            
            <div class="row">

                <div class="column">
            
                    <?php comments_template(); ?>
                
                </div>

            </div>
        
        <?php endif; ?>        

    <?php endwhile;

    get_footer();
