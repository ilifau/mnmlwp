<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

echo mnmlwp_page_content_wrapper( 'footer' ); ?>

<div class="row row--footer">

    <?php if( is_active_sidebar( 'mnmlwp-footer-left' ) || is_active_sidebar( 'mnmlwp-footer-middle' ) || is_active_sidebar( 'mnmlwp-footer-right' ) || is_active_sidebar( 'mnmlwp-footer-full-width' ) ): ?>

        <div class="column column--footer overflow-hidden">

            <footer>

                <div class="full-width last mnmlwp-footer-widgets">
                    <div class="one-third last">
                        <?php
                            if ( is_active_sidebar( 'mnmlwp-footer-left' ) ) :
                                dynamic_sidebar( 'mnmlwp-footer-left' );
                            endif;
                        ?>
                    </div>
                    <div class="one-third last">
                        <?php
                            if ( is_active_sidebar( 'mnmlwp-footer-middle' ) ) :
                                dynamic_sidebar( 'mnmlwp-footer-middle' );
                                echo '&nbsp;';
                            endif;
                        ?>
                    </div>
                    <div class="one-third last last-column">
                        <?php
                            if ( is_active_sidebar( 'mnmlwp-footer-right' ) ) :
                                dynamic_sidebar( 'mnmlwp-footer-right' );
                            endif;
                        ?>
                    </div>
                    <div class="clear-columns"></div>
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

    <?php endif; ?>

    <?php if( get_theme_mod('mnmlwp_is_boxed') ) { echo '</div>'; } ?>

</div>

<?php wp_footer(); ?>

</body>
</html>
