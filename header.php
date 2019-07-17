<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, maximum-scale=2">
        <meta name="description" content="">
        <meta name="format-detection" content="telephone=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php mnmlwp_loading_layer(); ?>
        <?php if( get_theme_mod( 'mnmlwp_show_contact_row', false ) && get_theme_mod( 'mnmlwp_contact_row', 'Company Name | Street Address | Postcode City | +49 (0) 1234 56789 | contact@email.xyz' ) && ! get_post_meta( get_the_ID(), '_mnmlwp_hide_contact_row', true ) ): ?>
                <div class="row row--contact hide-767">
                    <div class="column column--contact">
                        <p><?php echo esc_html( get_theme_mod( 'mnmlwp_contact_row', 'Company Name | Street Address | Postcode City | +49 (0) 1234 56789 | contact@email.xyz') ); ?></p>
                    </div>
                </div>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'before_header' ): ?>
            <div class="row row--nav overflow-visible <?php echo get_theme_mod('mnmlwp_nav_is_sticky', true ) ? 'sticky' : ''; ?>">
                <div class="column column--nav overflow-visible">
                    <?php mnmlwp_nav(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="row row--header">
            <div class="column column--header">
                <div class="mnmlwp-logo">
                    <a href="<?php echo esc_url( home_url() ); ?>">
                        <?php
                            $mnmlwp_custom_logo_id = get_theme_mod( 'custom_logo' );
                            $mnmlwp_logo = wp_get_attachment_image_src( $mnmlwp_custom_logo_id , 'full' );
                            
                            if ( has_custom_logo() ) {
                                echo '<img class="mnmlwp-logo-image" src="'. esc_url( $mnmlwp_logo[0] ) .'" alt="">';
                            } else {
                                if( get_theme_mod( 'mnmlwp_logo_icon' ) ) {
                                    echo '<div class="mnmlwp-logo-icon fa fa-' . esc_attr( get_theme_mod( 'mnmlwp_logo_icon' ) ) . ' mnmlwp-text-shadow"></div>';
                                }

                                echo '<span class="mnmlwp-logo-text mnmlwp-text-shadow">' . get_bloginfo( 'name' ) . '</span>';
                            }
                        ?>
                    </a>
                    <?php
                        if( display_header_text() && get_bloginfo( 'description' ) ) {
                            echo '<div class="mnmlwp-tagline">' . get_bloginfo('description') . '</div>';
                        }
                    ?>
                </div>
                <?php if ( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'inside_header' ): ?>
                    <div class="row row--nav overflow-visible <?php echo get_theme_mod('mnmlwp_nav_is_sticky', true ) ? 'sticky' : ''; ?>">
                        <div class="column column--nav overflow-visible">
                            <?php mnmlwp_nav(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php if( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'after_header' ): ?>
            <div class="row row--nav overflow-visible <?php echo get_theme_mod('mnmlwp_nav_is_sticky', true ) ? 'sticky' : ''; ?>">
                <div class="column column--nav overflow-visible">
                    <?php mnmlwp_nav(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="clear-columns"></div>
        <?php if( function_exists('breadcrumb_trail') ): ?>
            <?php if( ( get_theme_mod( 'mnmlwp_has_breadcrumbs', false ) ) && ! get_post_meta( get_the_ID(), '_mnmlwp_hide_breadcrumbs', true ) ): ?>
                <?php if( ( ! is_front_page() ) || ( is_front_page() && get_theme_mod( 'mnmlwp_breadcrumbs_show_on_home', false ) ) ): ?>
                    <div class="row row--breadcrumbs">
                        <div class="column column--breadcrumbs">
                            <div class="mnmlwp-breadcrumbs">
                                <?php mnmlwp_breadcrumb_trail(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="clear-columns"></div>
                <?php endif; ?>
            <?php endif;?>
        <?php endif; ?>
        <div class="row row--main">
