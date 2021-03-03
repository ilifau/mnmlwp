<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes, maximum-scale=2">
        <meta name="description" content="">
        <meta name="format-detection" content="telephone=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <?php mnmlwp_loading_layer(); ?>
        <?php if( get_theme_mod('mnmlwp_is_boxed') ): ?>
        <div class="mnmlwp-boxed-wrapper" style="width: <?php echo esc_attr( get_theme_mod('mnmlwp_column_width', '1120px') ); ?>">
        <?php endif; ?>  
        <?php if( get_theme_mod( 'mnmlwp_show_contact_row', false ) && get_theme_mod( 'mnmlwp_contact_row', 'Hey, this is the mnmlWP contact row! 😊' ) && ! get_post_meta( get_the_ID(), '_mnmlwp_hide_contact_row', true ) ): ?>
                <div class="mnmlwp-row mnmlwp-row--contact hide-767">
                    <div class="mnmlwp-column mnmlwp-column--contact">
                        <p><?php echo wp_kses_post( get_theme_mod( 'mnmlwp_contact_row', 'Hey, this is the mnmlWP contact row! 😊') ); ?></p>
                    </div>
                </div>
        <?php endif; ?>
        <?php if ( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'before_header' ): ?>
            <div class="mnmlwp-row mnmlwp-row--nav mnmlwp-row--nav-before-header overflow-visible <?php echo esc_attr( get_theme_mod('mnmlwp_nav_is_sticky', true ) ) ? 'sticky' : ''; ?>">
                <div class="mnmlwp-column mnmlwp-column--nav overflow-visible">
                    <?php mnmlwp_nav(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="mnmlwp-row mnmlwp-row--header">
            <div class="mnmlwp-column mnmlwp-column--header">
                <a class="mnmlwp-logo-wrapper" href="<?php echo esc_url( home_url() ); ?>">
                    <?php
                    $mnmlwp_custom_logo_id = esc_html( get_theme_mod( 'custom_logo' ) );
                    $mnmlwp_logo = wp_get_attachment_image_src( $mnmlwp_custom_logo_id , 'full' );

                    if( has_custom_logo() ) {
                        echo '<img class="mnmlwp-logo-image" src="'. esc_attr( $mnmlwp_logo[0] ) .'" alt="">';
                    }
                    ?>

                    <?php if( ! has_custom_logo() || ( has_custom_logo() && get_theme_mod( 'mnmlwp_has_logo_and_title', false ) ) ): ?>
                        <div class="mnmlwp-logo">
                            <?php
                                echo '<div class="mnmlwp-site-title-wrapper">';

                                    if( get_theme_mod( 'mnmlwp_logo_icon', 'superpowers' ) ) {
                                        echo '<div class="mnmlwp-logo-icon fa fa-' . esc_attr( get_theme_mod( 'mnmlwp_logo_icon', 'superpowers' ) ) . '"></div>';
                                    }

                                    echo '<span class="mnmlwp-logo-text">' . get_bloginfo( 'name' ) . '</span>';
                                echo '</div>';
                            ?>
                            <?php
                                if( display_header_text() && get_bloginfo( 'description' ) ) {
                                    echo '<div class="mnmlwp-tagline">' . get_bloginfo('description') . '</div>';
                                }
                            ?>
                        </div>
                    <?php endif; ?>
                </a>
                <?php if ( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'inside_header' ): ?>
                    <div class="mnmlwp-row mnmlwp-row--nav mnmlwp-row--nav-inside-header overflow-visible <?php echo esc_attr( get_theme_mod('mnmlwp_nav_is_sticky', true ) ) ? 'sticky' : ''; ?>">
                        <div class="mnmlwp-column mnmlwp-column--nav overflow-visible">
                            <?php mnmlwp_nav(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( get_theme_mod( 'mnmlwp_has_header_search', true ) ): ?>
                    <form class="mnmlwp-searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input type="text" class="field" name="s" id="s" placeholder="<?php echo esc_attr__( 'Search', 'mnmlwp' ); ?>&hellip;" />
                        <button class="submit mnmlwp-btn mnmlwp-btn-small" id="searchsubmit" value=""></button>
                    </form>
                <?php endif; ?>
                <div class="hamburger hamburger--<?php echo esc_attr( get_theme_mod('mnmlwp_hamburger_class', 'elastic') ); ?>">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php if( get_theme_mod( 'mnmlwp_nav_position', 'after_header' ) === 'after_header' ): ?>
            <div class="mnmlwp-row mnmlwp-row--nav mnmlwp-row--nav-after-header overflow-visible <?php echo esc_attr( get_theme_mod('mnmlwp_nav_is_sticky', true ) ) ? 'sticky' : ''; ?>">
                <div class="mnmlwp-column mnmlwp-column--nav overflow-visible">
                    <?php mnmlwp_nav(); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="mnmlwp-row mnmlwp-row--nav mnmlwp-row--nav-mobile overflow-visible <?php echo esc_attr( get_theme_mod('mnmlwp_nav_is_sticky', true ) ) ? 'sticky' : ''; ?>">
            <div class="mnmlwp-column mnmlwp-column--nav mnmlwp-column--nav-mobile overflow-visible">
                <?php mnmlwp_nav(); ?>
            </div>
        </div>
        <div class="clear-columns"></div>
        <?php echo mnmlwp_get_breadcrumb_row( false ); ?>
        <?php echo mnmlwp_page_content_wrapper( get_the_ID() ); ?>
