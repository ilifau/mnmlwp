<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

echo mnmlwp_page_content_wrapper( get_the_ID(), 'footer' ); ?>

    <footer>

        <?php $mnmlwp_footer_columns_amount = absint( get_theme_mod('mnmlwp_footer_columns_amount', 3) ); ?>

        <?php if( $mnmlwp_footer_columns_amount > 0 && ( is_active_sidebar( 'mnmlwp-footer-left' ) || is_active_sidebar( 'mnmlwp-footer-middle' ) || is_active_sidebar( 'mnmlwp-footer-right' ) || is_active_sidebar( 'mnmlwp-footer-fourth' ) ) ): ?>
        
            <div class="mnmlwp-row mnmlwp-row--footer">

                <div class="mnmlwp-column mnmlwp-column--footer overflow-hidden">

                    <div class="full-width last mnmlwp-widgets mnmlwp-footer-widgets">

                        <?php

                            switch( $mnmlwp_footer_columns_amount ) {
                                case 1:
                                    $mnmlwp_footer_columns_class = '';
                                    break;
                                case 2:
                                    $mnmlwp_footer_columns_class = 'mnmlwp-flex-column--half';
                                    break;
                                case 3:
                                    $mnmlwp_footer_columns_class = 'mnmlwp-flex-column--third';
                                    break;
                                case 4:
                                    $mnmlwp_footer_columns_class = 'mnmlwp-flex-column--fourth';
                                    break;
                                case 5:
                                    $mnmlwp_footer_columns_class = 'mnmlwp-flex-column--fifth';
                                    break;
                                default:
                                    $mnmlwp_footer_columns_class = 'mnmlwp-flex-column--third';
                                    break;
                            }

                        ?>

                        <div class="mnmlwp-flex-columns">
                            <?php if( $mnmlwp_footer_columns_amount > 0 ): ?> 
                            <div class="mnmlwp-flex-column <?php echo $mnmlwp_footer_columns_class; ?>">
                                <?php
                                    if ( is_active_sidebar( 'mnmlwp-footer-left' ) ) :
                                        dynamic_sidebar( 'mnmlwp-footer-left' );
                                    endif;
                                ?>
                            </div>
                            <?php endif; ?>
                            <?php if( $mnmlwp_footer_columns_amount > 1 ): ?> 
                            <div class="mnmlwp-flex-column <?php echo $mnmlwp_footer_columns_class; ?>">
                                <?php
                                    if ( is_active_sidebar( 'mnmlwp-footer-middle' ) ) :
                                        dynamic_sidebar( 'mnmlwp-footer-middle' );
                                    endif;
                                ?>
                            </div>
                            <?php endif; ?>
                            <?php if( $mnmlwp_footer_columns_amount > 2 ): ?> 
                            <div class="mnmlwp-flex-column <?php echo $mnmlwp_footer_columns_class; ?>">
                                <?php
                                    if ( is_active_sidebar( 'mnmlwp-footer-right' ) ) :
                                        dynamic_sidebar( 'mnmlwp-footer-right' );
                                    endif;
                                ?>
                            </div>
                            <?php endif; ?>
                            <?php if( $mnmlwp_footer_columns_amount > 3 ): ?> 
                            <div class="mnmlwp-flex-column <?php echo $mnmlwp_footer_columns_class; ?>">
                                <?php
                                    if ( is_active_sidebar( 'mnmlwp-footer-fourth' ) ) :
                                        dynamic_sidebar( 'mnmlwp-footer-fourth' );
                                    endif;
                                ?>
                            </div>
                            <?php endif; ?>
                            <?php if( $mnmlwp_footer_columns_amount > 4 ): ?> 
                            <div class="mnmlwp-flex-column <?php echo $mnmlwp_footer_columns_class; ?>">
                                <?php
                                    if ( is_active_sidebar( 'mnmlwp-footer-fifth' ) ) :
                                        dynamic_sidebar( 'mnmlwp-footer-fifth' );
                                    endif;
                                ?>
                            </div>
                            <?php endif; ?>
                        </div>

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
