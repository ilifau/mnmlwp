<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

echo mnmlwp_page_content_wrapper( get_the_ID(), 'footer' ); ?>

    <footer>

        <?php if( is_active_sidebar( 'mnmlwp-footer-left' ) || is_active_sidebar( 'mnmlwp-footer-middle' ) || is_active_sidebar( 'mnmlwp-footer-right' ) ): ?>
        
            <div class="mnmlwp-row mnmlwp-row--footer">

                <div class="mnmlwp-column mnmlwp-column--footer overflow-hidden">

                    <div class="full-width last mnmlwp-widgets mnmlwp-footer-widgets">

                        <?php if( is_active_sidebar( 'mnmlwp-footer-left' ) || is_active_sidebar( 'mnmlwp-footer-middle' ) || is_active_sidebar( 'mnmlwp-footer-right' ) ): ?>
                            <div class="mnmlwp-flex-columns">
                                <div class="mnmlwp-flex-column mnmlwp-flex-column--third">
                                    <?php
                                        if ( is_active_sidebar( 'mnmlwp-footer-left' ) ) :
                                            dynamic_sidebar( 'mnmlwp-footer-left' );
                                        endif;
                                    ?>
                                </div>
                                <div class="mnmlwp-flex-column mnmlwp-flex-column--third">
                                    <?php
                                        if ( is_active_sidebar( 'mnmlwp-footer-middle' ) ) :
                                            dynamic_sidebar( 'mnmlwp-footer-middle' );
                                        endif;
                                    ?>
                                </div>
                                <div class="mnmlwp-flex-column mnmlwp-flex-column--third">
                                    <?php
                                        if ( is_active_sidebar( 'mnmlwp-footer-right' ) ) :
                                            dynamic_sidebar( 'mnmlwp-footer-right' );
                                        endif;
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>

        <?php endif; ?>

        <?php
        
        if( is_active_sidebar( 'mnmlwp-footer-full-width' ) ) {
            echo '<div class="mnmlwp-row mnmlwp-row--footer-full-width">';
                echo '<div class="mnmlwp-column mnmlwp-column--footer-full-width">';
                    dynamic_sidebar( 'mnmlwp-footer-full-width' );
                echo '</div>';
            echo '</div>';
        }
        
        ?>

    </footer>

<?php if( get_theme_mod('mnmlwp_is_boxed') ) { echo '</div>'; } ?>

<?php wp_footer(); ?>

</body>
</html>
