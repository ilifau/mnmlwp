<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

echo mnmlwp_page_content_wrapper( get_the_ID(), 'footer' ); ?>

<?php if( is_active_sidebar( 'mnmlwp-footer-left' ) || is_active_sidebar( 'mnmlwp-footer-middle' ) || is_active_sidebar( 'mnmlwp-footer-right' ) || is_active_sidebar( 'mnmlwp-footer-full-width' ) ): ?>

    <div class="row row--footer">

        <div class="column column--footer overflow-hidden">

            <footer>

                <div class="full-width last mnmlwp-footer-widgets">

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

                    <?php
                        if ( is_active_sidebar( 'mnmlwp-footer-full-width' ) ) {
                            echo '<div class="full-width">';
                              dynamic_sidebar( 'mnmlwp-footer-full-width' );
                            echo '</div>';
                        }
                      ?>
                </div>

            </footer>

        </div>

    </div>

<?php endif; ?>

<?php if( get_theme_mod('mnmlwp_is_boxed') ) { echo '</div>'; } ?>

<?php wp_footer(); ?>

</body>
</html>
