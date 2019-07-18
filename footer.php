<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

</div><!-- end main row -->
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
                    <div class="full-width">
                        <?php
                            if ( is_active_sidebar( 'mnmlwp-footer-full-width' ) ) :
                                dynamic_sidebar( 'mnmlwp-footer-full-width' );
                            endif;
                        ?>
                    </div>
                </div>

            </footer>

        </div>

    <?php endif; ?>

</div>

<?php wp_footer(); ?>

</body>
</html>
