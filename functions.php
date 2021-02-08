<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Shorten Template Directory URL
function mnmlwp_theme_url()
{
    return get_template_directory_uri();
}

// Theme Assets URL
function mnmlwp_assets_url()
{
    return get_template_directory_uri() . '/assets';
}

// Scripts and Styles
function mnmlwp_scripts_and_styles()
{
    // Scripts
    wp_enqueue_script( 'lazyload', mnmlwp_assets_url() . '/js/lazyload/jquery.lazyload.min.js', array('jquery'), '1.9.7', true );
    wp_enqueue_script( 'lightbox', mnmlwp_assets_url() . '/js/lightbox2-master/dist/js/lightbox.min.js', array('jquery'), '2.9.0', true );
    wp_enqueue_script( 'main', mnmlwp_assets_url() . '/js/main.js', array('jquery'), '0.1.9', true );
    
    if ( is_singular() )
        wp_enqueue_script( 'comment-reply' );
        
    // Localize Scripts
    wp_localize_script('main', 'mnmlwp_globals', array(
			'hero_height' => mnmlwp_get_hero_height(),
			'hero_height_measure' => mnmlwp_get_hero_height_measure(),
            'nav_position' => get_theme_mod( 'mnmlwp_nav_position', 'after_header' ),
            'nav_animation' => get_theme_mod( 'mnmlwp_nav_animation', 'slide' ),
		)
	);

    // Styles
    wp_enqueue_style( 'font-awesome', mnmlwp_assets_url() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
    wp_enqueue_style( 'hamburgers', mnmlwp_assets_url() . '/css/hamburgers/hamburgers.css' );
    wp_enqueue_style( 'mnmlwp', mnmlwp_theme_url() . '/style.css' );
    wp_enqueue_style( 'mnmlwp-main', mnmlwp_assets_url() . '/css/main.css', array(), '0.7.8' );
}

add_action( 'wp_enqueue_scripts', 'mnmlwp_scripts_and_styles' );

// Admin Scripts and Styles
function mnmlwp_admin_scripts_and_styles( $hook_suffix )
{
    // Color Picker
    $screen = get_current_screen();
    $allowed_post_types = array('post', 'page');

    $isHero = in_array( $screen->post_type, $allowed_post_types );
    $isCategory = $screen->taxonomy === 'category';

    if( $isHero || $isCategory ) {
        wp_enqueue_script( 'mnmlwp-color-picker', mnmlwp_assets_url() . '/js/admin/mnmlwp-color-picker.js', array('jquery', 'wp-color-picker'), '0.0.1', true );
        wp_enqueue_style( 'wp-color-picker' );
    }

    // Hero JS
    if( in_array( $hook_suffix, array('post.php', 'post-new.php', 'page.php', 'page-new.php') ) ) {
        wp_enqueue_script( 'mnmlwp-hero', mnmlwp_assets_url() . '/js/admin/mnmlwp-hero.js', array('jquery'), '0.7.8', true );
    }
    
    // Global
    wp_enqueue_style( 'mnmlwp-admin', mnmlwp_assets_url() . '/css/admin.css', array(), '0.7.8' );
    wp_enqueue_script( 'admin-notifications', mnmlwp_assets_url() . '/js/admin/mnmlwp-notifications.js', array('jquery'), '0.0.1', true );
}

add_action( 'admin_enqueue_scripts', 'mnmlwp_admin_scripts_and_styles' );

// Add noscript css
function mnmlwp_add_noscript_css()
{
    echo '<noscript>
        <style>
            .mnmlwp-loading-layer {
                display: none;
            }

            nav#main {
                display: block;
            }

            @media screen and (min-width: 768px) {
                nav#main ul li:hover ul {
                    display: block;
                }
            }

            .hamburger {
                display: none!important;
            }
        </style>
    </noscript>';
}

add_action( 'wp_head', 'mnmlwp_add_noscript_css' );

// Load Textdomain
function mnmlwp_i18n()
{
    load_theme_textdomain( 'mnmlwp', get_template_directory() . '/lang' );
}

add_action( 'after_setup_theme', 'mnmlwp_i18n' );

// Post Formats
add_theme_support( 'post-formats', array(
    'audio',
    'gallery',
    'video'
) );

// WP5 Gutenberg
add_theme_support('responsive-embeds');

// Custom Background
$mnmlwp_custom_background_args = array(
	'default-color' => '#ffffff',
	'default-image' => '',
);

add_theme_support( 'custom-background', $mnmlwp_custom_background_args );

// Add Image Sizes
if( ! function_exists( 'mnmlwp_add_image_sizes') )
{
    function mnmlwp_add_image_sizes()
    {
        add_image_size( 'mnmlwp-1920', 1920, 1280 );
        add_image_size( 'mnmlwp-1600', 1600, 1024 );
        add_image_size( 'mnmlwp-800', 800, 600 );
        add_image_size( 'mnmlwp-portrait', 1024, 1024, true );

        // Set image compression quality
        add_filter( 'jpeg_quality', function( $arg ) { return 82; });
        add_filter( 'wp_editor_set_quality', function( $arg ) { return 82; });
    }
}

add_action( 'after_setup_theme', 'mnmlwp_add_image_sizes' );

// Title Tag
function mnmlwp_theme_setup() {
    add_theme_support( 'title-tag' );
}

add_action( 'after_setup_theme', 'mnmlwp_theme_setup' );

apply_filters( 'document_title_separator', '|' );
apply_filters( 'document_title_parts', array(
    'title' => get_bloginfo('name'),
) );

// Support HTML5 Markup Search Form
add_theme_support( 'html5', array( 'search-form' ) );

// Featured Images in Posts/Pages
add_theme_support( 'post-thumbnails');

// Automatic Feed Links
add_theme_support( 'automatic-feed-links' );

// Custom Header
add_theme_support( 'custom-header' );

// Add Editor Style
function mnmlwp_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}

add_action( 'admin_init', 'mnmlwp_theme_add_editor_styles' );

// WP Link Pages
$defaults = array(
    'before' => '<p>' . esc_html__( 'Pages:', 'mnmlwp' ),
    'after' => '</p>',
    'link_before' => '',
    'link_after' => '',
    'next_or_number' => 'number',
    'separator' => ' ',
    'nextpagelink' => esc_html__( 'Next page', 'mnmlwp'),
    'previouspagelink' => esc_html__( 'Previous page', 'mnmlwp' ),
    'pagelink' => '%',
    'echo' => 1
);

wp_link_pages( $defaults );

// Content Width
if ( ! isset( $content_width ) ) $content_width = 1920;

// mnmlWP Plugin Activation
require_once( dirname(__FILE__) . '/inc/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'mnmlwp_register_required_plugins' );

function mnmlwp_register_required_plugins()
{
    $plugins = array(
        array(
            'name' => 'mnmlWP Contact Form',
            'slug' => 'mnmlwp-simple-contact-form',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '0.1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://de.wordpress.org/plugins/mnmlwp-simple-contact-form/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'Breadcrumb Trail',
            'slug' => 'breadcrumb-trail',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://de.wordpress.org/plugins/breadcrumb-trail/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'One Click Demo Import',
            'slug' => 'one-click-demo-import',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '2.5.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://de.wordpress.org/plugins/one-click-demo-import/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'Shariff',
            'slug' => 'shariff',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '4.4.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://de.wordpress.org/plugins/shariff/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'Customizer Export/Import',
            'slug' => 'customizer-export-import',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '0.7', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://wordpress.org/plugins/customizer-export-import/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
        array(
            'name' => 'Customizer Reset',
            'slug' => 'customizer-reset-by-wpzoom',
            'source' => '', // The plugin source.
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
            'version' => '1.0.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'external_url' => 'https://de.wordpress.org/plugins/customizer-reset-by-wpzoom/', // If set, overrides default API URL and points to an external URL.
            'is_callable' => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
        ),
    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id' => 'mnmlwp',  // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',  // Default absolute path to bundled plugins.
        'menu' => 'tgmpa-install-plugins', // Menu slug.
        'has_notices' => true, // Show admin notices or not.
        'dismissable' => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message' => '', // Message to output right before the plugins table.

        'strings' => array(
            'page_title' => esc_html__( 'Install Required Plugins', 'mnmlwp' ),
            'menu_title' => esc_html__( 'Install Plugins', 'mnmlwp' ),
            /* translators: %s: plugin name. */
            'installing' => esc_html__( 'Installing Plugin: %s', 'mnmlwp' ),
            /* translators: %s: plugin name. */
            'updating' => esc_html__( 'Updating Plugin: %s', 'mnmlwp' ),
            'oops' => esc_html__( 'Something went wrong with the plugin API.', 'mnmlwp' ),
            'notice_can_install_required' => _n_noop(
                /* translators: 1: plugin name(s). */
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'mnmlwp'
            ),
            'notice_can_install_recommended' => _n_noop(
                /* translators: 1: plugin name(s). */
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'mnmlwp'
            ),
            'notice_ask_to_update' => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'mnmlwp'
            ),
            'notice_ask_to_update_maybe' => _n_noop(
                /* translators: 1: plugin name(s). */
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'mnmlwp'
            ),
            'notice_can_activate_required' => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'mnmlwp'
            ),
            'notice_can_activate_recommended' => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'mnmlwp'
            ),
            'install_link' => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'mnmlwp'
            ),
            'update_link' => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'mnmlwp'
            ),
            'activate_link' => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'mnmlwp'
            ),
            'return' => esc_html__( 'Return to Required Plugins Installer', 'mnmlwp' ),
            'plugin_activated' => esc_html__( 'Plugin activated successfully.', 'mnmlwp' ),
            'activated_successfully' => esc_html__( 'The following plugin was activated successfully:', 'mnmlwp' ),
            /* translators: 1: plugin name. */
            'plugin_already_active' => esc_html__( 'No action taken. Plugin %1$s was already active.', 'mnmlwp' ),
            /* translators: 1: plugin name. */
            'plugin_needs_higher_version' => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'mnmlwp' ),
            /* translators: 1: dashboard link. */
            'complete' => esc_html__( 'All plugins installed and activated successfully. %1$s', 'mnmlwp' ),
            'dismiss' => esc_html__( 'Dismiss this notice', 'mnmlwp' ),
            'notice_cannot_install_activate' => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'mnmlwp' ),
            'contact_admin' => esc_html__( 'Please contact the administrator of this site for help.', 'mnmlwp' ),
            'nag_type' => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),
    );

    tgmpa( $plugins, $config );
}

// Breadcrumbs
include 'functions/breadcrumbs.php';

// Customizer
include 'functions/customizer.php';

// Demo Content
include 'demo/functions.php';

// Main Content Wrapper
if( ! function_exists( 'mnmlwp_page_content_wrapper' ) )
{ 
    function mnmlwp_page_content_wrapper( $post_id = 0, $context = 'header' )
    {
        $templates = array(
            'template-blank-page.php',
            'template-blank-page-hero.php',
            'template-page-hero.php',
            'template-post-hero.php',
        );

        if( is_singular() && in_array( get_page_template_slug( $post_id ), $templates ) ) {
            return;
        } else {
            if( $context === 'header' ) {
            return '<div class="mnmlwp-row mnmlwp-row--main"><div class="mnmlwp-row"><div class="mnmlwp-column">';
            } else {
            return '</div></div></div>';
            }
        }
    }
}

// Main Navigation
function mnmlwp_register_main_navigation()
{
    register_nav_menus( array(
        'main-nav' => esc_html__( 'Main Navigation', 'mnmlwp' ),
    ) );
}

add_action('after_setup_theme', 'mnmlwp_register_main_navigation');

// Show Navigation/Menu
if( ! function_exists ( 'mnmlwp_nav' ) )
{
    function mnmlwp_nav()
    {
        if ( has_nav_menu( 'main-nav' ) ) {
            echo '<div class="mnmlwp-main-nav-wrapper">';
                echo '<nav id="main">';
                    wp_nav_menu( array(
                        'theme_location' => 'main-nav',
                        'menu_class' => 'nav',
                    ) );

                echo '</nav>';
            echo '</div>';
        }
    }
}

// Add search form to primary navigation
function mnmlwp_add_search_nav_item( $items, $args )
{
    if( $args->theme_location !== 'main-nav' )
        return $items;

    if( ! get_theme_mod( 'mnmlwp_has_nav_search', true ) )
        return $items;

    // $searchform = get_search_form( false );

    $searchform = '<form method="get" id="searchform" action="' . esc_url( home_url( '/' ) ) . '">
        <input type="text" class="field" name="s" id="s" placeholder="' . esc_attr__( 'Search', 'mnmlwp' ) . '&hellip;" />
        <button class="submit mnmlwp-btn mnmlwp-btn-small" id="searchsubmit" value=""></button>
    </form>';

    $items .= '<li class="menu-item mnmlwp-main-nav-searchform">' . $searchform . '</li>';

    return $items;
}

add_filter( 'wp_nav_menu_items', 'mnmlwp_add_search_nav_item', 10, 2 );

// Widgets & Sidebars
function mnmlwp_widgets_init()
{
    register_sidebar( array(
        'name' => esc_html__( 'mnmlWP Sidebar', 'mnmlwp' ),
        'id' => 'mnmlwp-sidebar',
        'description' => 'Default Sidebar',
        'class' => '',
        'before_widget' => '<div class="mnmlwp-sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="mnmlwp-widget-title">',
        'after_title' => '</h2>'
    ) );

    register_sidebar( array(
        'name'          => 'Footer Left',
        'id'            => 'mnmlwp-footer-left',
        'description'   => 'Left Footer Column',
        'before_widget' => '<div class="mnmlwp-footer-widget mnmlwp-footer-widget-left">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="mnmlwp-widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Middle',
        'id'            => 'mnmlwp-footer-middle',
        'description'   => 'Center Footer Column',
        'before_widget' => '<div class="mnmlwp-footer-widget mnmlwp-footer-widget-middle">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="mnmlwp-widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Right',
        'id'            => 'mnmlwp-footer-right',
        'description'   => 'Right Footer Column',
        'before_widget' => '<div class="mnmlwp-footer-widget mnmlwp-footer-widget-right">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="mnmlwp-widget-title">',
        'after_title' => '</h2>',
    ) );
    
    register_sidebar( array(
        'name'          => 'Footer Full Width',
        'id'            => 'mnmlwp-footer-full-width',
        'description'   => 'Full Width Footer',
        'before_widget' => '<div class="mnmlwp-footer-widget mnmlwp-footer-widget-full-width">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="mnmlwp-widget-title">',
        'after_title' => '</h2>',
    ) );
}

add_action( 'widgets_init', 'mnmlwp_widgets_init' );

// mnmlWP Recent Posts Widget
include dirname(__FILE__) . '/widgets/mnmlwp-recent-posts/mnmlwp-recent-posts.php';
include dirname(__FILE__) . '/widgets/mnmlwp-colored-categories/mnmlwp-colored-categories.php';

/**
 * Add a parent CSS class for nav menu items.
 *
 * @param array  $items The menu items, sorted by each menu item's menu order.
 * @return array (maybe) modified parent CSS class.
 */

function mnmlwp_add_menu_parent_class( $items ) {
    $parents = array();

    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'menu-parent-item';
        }
    }
    return $items;
}

add_filter( 'wp_nav_menu_objects', 'mnmlwp_add_menu_parent_class' );

// Excerpt Length in Words
function mnmlwp_excerpt_length($length) {
    return absint(get_theme_mod( 'mnmlwp_excerpt_length', 60 ));
}

add_filter('excerpt_length', 'mnmlwp_excerpt_length');

// Replaces the excerpt "Read More" text by a link
function mnmlwp_excerpt_more($more) {
    global $post;

    if( get_theme_mod('mnmlwp_show_read_more_link', true) === false )
        return;
    
    return '&hellip; <a class="moretag" href="'. esc_url( get_permalink( $post->ID ) ) . '">' . esc_html__('read&nbsp;more', 'mnmlwp') . '</a>';
}

add_filter('excerpt_more', 'mnmlwp_excerpt_more');

// Loading Layer
if( ! function_exists('mnmlwp_has_loading_layer') )
{
    function mnmlwp_loading_layer()
    {
        if( get_theme_mod( 'mnmlwp_has_loading_layer', true ) === false )
            return;
            
        echo '<div class="mnmlwp-loading-layer">
                <div class="sk-fading-circle">
                    <div class="sk-circle1 sk-circle"></div>
                    <div class="sk-circle2 sk-circle"></div>
                    <div class="sk-circle3 sk-circle"></div>
                    <div class="sk-circle4 sk-circle"></div>
                    <div class="sk-circle5 sk-circle"></div>
                    <div class="sk-circle6 sk-circle"></div>
                    <div class="sk-circle7 sk-circle"></div>
                    <div class="sk-circle8 sk-circle"></div>
                    <div class="sk-circle9 sk-circle"></div>
                    <div class="sk-circle10 sk-circle"></div>
                    <div class="sk-circle11 sk-circle"></div>
                    <div class="sk-circle12 sk-circle"></div>
                </div>
            </div>';
    }
}

// Post List (Archive)
if( ! function_exists( 'mnmlwp_get_posts') )
{
    function mnmlwp_get_posts( $cat = false, $format = 'default' )
    {
        global $wp_query;
        global $paged;
        
        $original_query = $wp_query;

        $posts_per_page = get_option('posts_per_page');
        $query_var_page = get_query_var('page');
        
        if( is_front_page() && ! empty( $query_var_page ) )
            $paged = get_query_var('page');

        if ( is_paged() ) {
            $page_offset = $posts_per_page + ( ( $paged - 2 ) * $posts_per_page );
        } else {
            $page_offset = 0;
        }

        $tag = is_tag() ? single_tag_title('', false) : '';
        $category = is_category() ? single_cat_title('', false) : '';
        $author = is_author() ? get_the_author_meta('nicename') : '';
        $year = get_query_var('year');
        $monthnum = get_query_var('monthnum') ? get_query_var('monthnum') : '01';
        $day = get_query_var('day');

        if( $cat ) {
            $category = $cat;
        }

        if( ! is_date() && ! is_search() )
        {
            $args = array(
                'posts_per_page'   => $posts_per_page,
                'offset'           => $page_offset,
                'orderby'          => 'date',
                'order'            => 'DESC',
                'post_type'        => 'post',
                'post_status'      => 'publish',
                'tag'              => $tag,
                'category_name'    => $category,
                'author_name'      => $author,
                'paged'            => $paged,
            );
            
            $wp_query = null;
            $wp_query = new WP_Query( $args );
        }

        if( is_category() ) {
            $sticky = get_option('sticky_posts');

            foreach( $wp_query->posts as $key => $post ) {
                if( in_array( $post->ID, $sticky ) ) {
                    unset( $wp_query->posts[$key] );
                    array_unshift( $wp_query->posts, $post );
                }
            }
        }

        $html = '';

        if( is_author() ) {
            $html .= '<h1>' . esc_html__('Posts by', 'mnmlwp') . ' ' . ucfirst( $author ) . ' <span class="mnmlwp-search-num-results">(' . $wp_query->found_posts . '&nbsp;' . esc_html__('results', 'mnmlwp') . ')</span></h1>';
        }

        if( is_category() ) {
            $html .= '<h1>' . esc_attr__('Category', 'mnmlwp') . ': ' . ucfirst( $category ) . ' <span class="mnmlwp-search-num-results">(' . $wp_query->found_posts . '&nbsp;' . esc_html__('results', 'mnmlwp') . ')</span></h1>';
        }

        if( is_tag() ) {
            $html .= '<h1>' . esc_attr__('Tag', 'mnmlwp') . ': ' . ucfirst( $tag ) . ' <span class="mnmlwp-search-num-results">(' . $wp_query->found_posts . '&nbsp;' . esc_html__('results', 'mnmlwp') . ')</span></h1>';
        }

        if( is_search() ) {
            global $s;
            global $wp_query;

            $key = esc_html($s);

            if( $s ) {
                if( strlen( $s ) > 15 ) {
                    $s = substr( $s, 0, 15 ) . '&hellip;';
                }
                $html .= '<h1><span class="mnmlwp-highlight">&raquo;' . esc_html( $s ) . '&laquo;</span> <span class="mnmlwp-search-num-results">(' . $wp_query->found_posts . '&nbsp;' . esc_html__('results', 'mnmlwp') . ')</span></h1>';
            } else {
                $html .= '<h1>' . esc_html__('No Results', 'mnmlwp') . '</h1>';
                $html .= '<p>' . esc_html__('Please enter a search term.', 'mnmlwp') . '</p>';
                $html .= get_search_form( false );
                return $html;
            }
        }

        if( have_posts() ) :

            $html .= '<div class="mnmlwp-post-list-wrapper"><ul class="post-list">';

                while( have_posts() ) : the_post();

                    $num_comments = get_comments_number( get_the_ID() );

                    $html .= '<li>';

                        $html .= '<h2 class="post-title">';
                        $html .= '<a class="post-title-link no-border" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' . get_the_title() . '</a>';
                        
                        if( is_sticky( get_the_ID() ) ) {
                            $html .= '<span class="mnmlwp-dashicon dashicons dashicons-admin-post"></span>';
                        }

                        switch( get_post_format( get_the_ID() ) )
                        {
                            case 'audio':
                                $html .= '<span class="mnmlwp-dashicon dashicons dashicons-format-audio"></span>';
                                break;
                                
                            case 'gallery':
                                $html .= '<span class="mnmlwp-dashicon dashicons dashicons-format-gallery"></span>';
                                break;
                            
                            case 'video':
                                $html .= '<span class="mnmlwp-dashicon dashicons dashicons-format-video"></span>';
                                break;
                                
                            default:
                                break;
                        }
                        
                        $html .= '</h2>';

                        if( get_post_type( get_the_ID() ) === 'post' )
                        {
                            $html .= '<div class="mnmlwp-meta-wrapper mnmlwp-meta-wrapper--post-list">';
                                $html .= '<div class="mnmlwp-meta-wrapper--author-date">';
                                $html .= mnmlwp_get_post_meta( get_the_ID(), array('author', 'date') );
                                $html .= '</div>';
                                $html .= mnmlwp_get_post_meta( get_the_ID(), array('categories', 'tags') );
                            $html .= '</div>';
                        }

                        if ( has_post_thumbnail() && $format !== 'no-images' )
                        {
                            $feat_image_url = get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-800' );

                            $html .= '<div class="mnmlwp-post-list-thumbnail-wrapper">';
                            $html .= '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '"><img class="mnmlwp-post-list-thumbnail lazy" data-original="' . $feat_image_url . '" src="' . mnmlwp_assets_url() . '/img/placeholder.png" alt="" /></a>';
                            $html .= '<noscript><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '"><img class="mnmlwp-post-list-thumbnail" src="' . $feat_image_url . '" alt="" /></a></noscript>';
                            $html .= '</div>';
                        }

                        if( get_the_excerpt() )
                        {
                            $html .= '<p class="mnmlwp-excerpt">' . strip_shortcodes( get_the_excerpt() ) . '</p>';

                            if( $num_comments > 0 )
                                $html .= '<p class="last"><a title="' . $num_comments . ' Comments" class="num-comments" href="' . esc_url( get_permalink( get_the_ID() ) ) . '#comments">' . $num_comments . ' ' . esc_html__('comment(s)', 'mnmlwp') . '</a></p>';

                        }

                    $html .= '</li>' . "\n";

                endwhile;

            $html .= '</ul></div>';

        else:

            $html .= '<p class="last">' . esc_html__('No posts found. You might want to use the search form or go back to the home page.', 'mnmlwp') . '</p>';

        endif;

        // Paginate
        $html .= mnmlwp_paginate_links( $paged );
        
        // Restore original query
        $wp_query = null;
        $wp_query = $original_query;
        wp_reset_postdata();

        return $html;
    }
}

// Post Meta
if( ! function_exists ( 'mnmlwp_get_post_meta' ) )
{
    function mnmlwp_get_post_meta( $post_id, $components = null )
    {
        if( $components === null ) {
            $components = array(
                'author',
                'date',
                'categories',
                'tags',
            );
        } else {
            $components = array_map( 'esc_attr', $components );
        }

        $divider = '<span class="mnmlwp-separator"></span>';
        $author_title = '';
        $post_author_id = get_post_field( 'post_author', $post_id );

        $author = in_array( 'author', $components ) && get_post_type( $post_id ) === 'post' ? $author_title . '<a class="post-meta-author-link" href="' . esc_url( home_url() ) . '/author/' . get_the_author_meta( 'nicename', $post_author_id ) . '">' . get_the_author_meta( 'display_name', $post_author_id ) . '</a>' . $divider : '';
        $date = in_array( 'date', $components ) ? get_the_date( '', $post_id ) : '';

        $html = '<div class="mnmlwp-post-meta">';
            $html .= '<p class="last">' . $author . $date . '</p>';
            $html .= in_array( 'categories', $components ) ? mnmlwp_get_post_categories( $post_id ) : '';
            $html .= in_array( 'tags', $components ) ? mnmlwp_get_post_tags( $post_id ) : '';
        $html .= '</div>';

        return $html;
    }
}

// Get Categories
if( ! function_exists( 'mnmlwp_get_post_categories' ) )
{
    function mnmlwp_get_post_categories( $post_id )
    {
        $categories = wp_get_post_categories( $post_id );

        if( empty( $categories ) )
            return;

        $html = '<div class="mnmlwp-category-list">';

            foreach( $categories as $cat )
            {
                $term_id = $cat;
                $cat_meta = get_option( "category_$term_id" );
                $cat_color = isset( $cat_meta['color'] ) ? $cat_meta['color'] : '#444bb1';
                $style = 'background:' . $cat_color . ';color:#fff!important';

                $cat_name = get_cat_name( $cat );
                $cat_name_short = substr( get_cat_name( $cat ), 0, 1 );
                $cat_data = get_option("category_$cat");

                $category = get_category( $cat );

                $html .= '<a class="mnmlwp-category-link" style="' . $style . '" title="' . get_cat_name( $cat ) . '" href="' . get_category_link( $cat ) . '">' . $cat_name . '</a>';
            }

        $html .= '</div>';

        return $html;
    }
}

// Post Tags
if( ! function_exists('mnmlwp_get_post_tags') )
{
    function mnmlwp_get_post_tags( $post_id )
    {
        $tags = get_the_tags( $post_id );

        if( empty( $tags ) )
            return;

        $html = '<div class="mnmlwp-tag-list">';

            foreach( $tags as $tag )
            {
                $html .= '<a class="mnmlwp-tag-link" href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a>';
            }

        $html .= '</div>';

        return $html;
    }
}

// Paginate links
if( ! function_exists ( 'mnmlwp_paginate_links' ) )
{
    function mnmlwp_paginate_links( $paged = 0 )
    {
        global $wp_query;

        if( $wp_query->max_num_pages == 1 )
            return '';

        $big = 999999999; // need an unlikely integer

        $html = '<div class="mnmlwp-pagination">';
            $html .= get_the_posts_pagination( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, $paged ),
                'total' => $wp_query->max_num_pages,
                'prev_next' => false,
                'show_all' => true,
                'screen_reader_text' => false,
            ) );
        $html .= '</div>';

        return $html;
    }
}

// Adjacent Posts
if( ! function_exists ( 'mnmlwp_adjacent_posts' ) )
{
    function mnmlwp_adjacent_posts()
    {
        // Next & prev post
        $next_post = get_next_post();
        $prev_post = get_previous_post();

        $next_post_title = ! empty( $next_post ) ? $next_post->post_title : 'Next';
        $prev_post_title = ! empty( $prev_post ) ? $prev_post->post_title : 'Previous';

        if( ! empty( $next_post ) || ! empty( $prev_post ) ) { ?>

        <div class="prev-posts">
            <?php if( ! empty( $prev_post ) ): ?>
                <div class="prev-posts prev" title="<?php echo $prev_post_title; ?>"><?php previous_post_link('%link', esc_html__('Previous Post', 'mnmlwp')) ?></div>
            <?php endif; ?>

            <?php if( ! empty( $next_post ) ): ?>
                <div class="prev-posts next" title="<?php echo $next_post_title; ?>"><?php next_post_link('%link', esc_html__('Next Post', 'mnmlwp') ) ?></div>
            <?php endif; ?>
        </div>

        <?php }
    }
}

// Hero Row
if( ! function_exists( 'mnmlwp_get_hero_background_style' ) )
{
    function mnmlwp_get_hero_background_style()
    {
        $allowed_templates = ['template-blank-page-hero.php', 'template-page-hero'];
        if( ( ! in_array( get_page_template_slug(), $allowed_templates ) ) && ! has_post_thumbnail( get_the_ID() ) )
            return;

        $mnmnlwp_1920 = get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-1920' );
        $mnmnlwp_1600 = get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-1600' );
        $mnmnlwp_800 = get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-800' );
        $mnmlwp_portrait = get_the_post_thumbnail_url( get_the_ID(), 'mnmlwp-portrait' );

        $style = '<style>
        .mnmlwp-row.mnmlwp-row--hero {
            background-size:cover;
        }

        @media screen and (orientation: landscape) and (min-width: 1601px) {
            .mnmlwp-row.mnmlwp-row--hero {
                background-image: url(' . $mnmnlwp_1920 . ');
            }
        }

        @media screen and (orientation: landscape) and (min-width: 801px) and (max-width: 1600px) {
            .mnmlwp-row.mnmlwp-row--hero {
                background-image: url(' . $mnmnlwp_1600 . ');
            }
        }

        @media screen and (orientation: landscape) and (max-width: 800px) {
            .mnmlwp-row.mnmlwp-row--hero {
                background-image: url(' . $mnmnlwp_800 . ');
            }
        }

        /* Portrait */

        @media screen and (orientation: portrait) {
            .mnmlwp-row.mnmlwp-row--hero {
                background-image: url(' . $mnmlwp_portrait . ');
            }
        }

        </style>';

        echo $style;
    }
}

add_action('wp_head', 'mnmlwp_get_hero_background_style');

if( ! function_exists( 'mnmlwp_get_hero_row' ) )
{
    function mnmlwp_get_hero_row()
    {
        $hero_height = absint( get_post_meta( get_the_ID(), '_mnmlwp_hero_height', true ) );
        $hero_overlay = get_post_meta( get_the_ID(), '_mnmlwp_hero_has_overlay', true );
        $hero_main_title = get_post_meta( get_the_ID(), '_mnmlwp_hero_main_title', true );
        $hero_subtitle = get_post_meta( get_the_ID(), '_mnmlwp_hero_subtitle', true );
        $hero_content = get_post_meta( get_the_ID(), '_mnmlwp_hero_content', true );
        $hero_main_title_color = get_post_meta( get_the_ID(), '_mnmlwp_hero_main_title_color', true );
        $hero_subtitle_color = get_post_meta( get_the_ID(), '_mnmlwp_hero_subtitle_color', true );
        $hero_content_color = get_post_meta( get_the_ID(), '_mnmlwp_hero_content_color', true );
        $hero_content_align = get_post_meta( get_the_ID(), '_mnmlwp_hero_content_align', true );
        $hero_title = get_post_meta( get_the_ID(), '_mnmlwp_hero_title', true ); // HTML content
        $hero_overlay_color_from = get_post_meta( get_the_ID(), '_mnmlwp_hero_overlay_color_from', true );
        $hero_overlay_color_to = get_post_meta( get_the_ID(), '_mnmlwp_hero_overlay_color_to', true );
        $hero_overlay_gradient_degrees = get_post_meta( get_the_ID(), '_mnmlwp_hero_overlay_gradient_degrees', true );
        $hero_overlay_style_background = $hero_overlay_color_from && $hero_overlay_color_to ? 'background:linear-gradient(' . $hero_overlay_gradient_degrees . 'deg, ' . $hero_overlay_color_from . ', ' . $hero_overlay_color_to . ');' : 'background:' . $hero_overlay_color_from . ';';
        $hero_overlay_style_background = get_post_meta( get_the_ID(), '_mnmlwp_hero_has_radial_gradient', true ) == 1 ? 'background:radial-gradient(' . $hero_overlay_color_from . ', ' . $hero_overlay_color_to . ');' : $hero_overlay_style_background;
        $hero_overlay_style_opacity = get_post_meta( get_the_ID(), '_mnmlwp_hero_overlay_opacity', true ) ? 'opacity:' . get_post_meta( get_the_ID(), '_mnmlwp_hero_overlay_opacity', true ) / 100 . ';' : '0.3;';
        $hero_classes = get_post_meta( get_the_ID(), '_mnmlwp_hero_has_skew', true ) == 1 ? 'skewed' : '';
        $hero_bg_position_horizontal = get_post_meta( get_the_ID(), '_mnmlwp_hero_background_position_horizontal', true );
        $hero_bg_position_vertical = get_post_meta( get_the_ID(), '_mnmlwp_hero_background_position_vertical', true );
        $hero_bg_attachment_fixed = get_post_meta( get_the_ID(), '_mnmlwp_hero_background_attachment_fixed', true );
        $hero_classes .= get_post_meta( get_the_ID(), '_mnmlwp_hero_background_attachment_fixed', true ) == 1 ? ' bg-attachment-fixed' : '';

        $html = '<div class="mnmlwp-row-hero-wrapper">';
        $html .= '<div class="mnmlwp-row mnmlwp-row--hero ' . $hero_classes . '" style="background-position:' . $hero_bg_position_vertical . ' ' . $hero_bg_position_horizontal . '">';

        if( ! empty( $hero_overlay ) ) {
            $html .= '<div class="mnmlwp-overlay" style="' . $hero_overlay_style_background . $hero_overlay_style_opacity . '"></div>';
        }

        $html .= '<div class="mnmlwp-column mnmlwp-column--hero" style="height:' . $hero_height . 'vh">
            <div class="mnmlwp-hero-inner" style="text-align:' . $hero_content_align . '">';
                $html .= ! empty( $hero_main_title ) ? '<div class="mnmlwp-hero-main-title" style="color:' . $hero_main_title_color . '">' . sanitize_text_field( $hero_main_title ) . '</div>' : '';
                $html .= ! empty( $hero_subtitle ) ? '<div class="mnmlwp-hero-subtitle" style="color:' . $hero_subtitle_color . '">' . sanitize_text_field( $hero_subtitle ) . '</div>' : '';
                $html .= ! empty( $hero_content ) ? '<div class="mnmlwp-hero-content" style="color:' . $hero_content_color . '">' . sanitize_text_field( $hero_content ) . '</div>' : '';
            $html .= '</div>
            <div class="hero-title">' . do_shortcode( $hero_title ) . '</div>
        </div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= mnmlwp_get_breadcrumb_html();

        return $html;
    }
}

/**
 * Convert hexdec color string to rgb(a) string
 */

function mnmlwp_hex2rgba($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
          return $default;

        //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
            $color = substr( $color, 1 );
        }

        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
                return $default;
        }

        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);

        //Check if opacity is set(rgba or rgb)
        if($opacity){
            if(abs($opacity) > 1)
                $opacity = 1.0;
            $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
            $output = 'rgb('.implode(",",$rgb).')';
        }

        //Return rgb(a) color string
        return $output;
}

/** Add Colorpicker Field to "Add New Category" Form **/

function mnmlwp_add_category_form_custom_fields( $taxonomy )
{
    echo '<div class="form-field">
        <label for="category_custom_color">' . esc_attr__('Color', 'mnmlwp') . '</label>
        <input name="cat_meta[color]" class="colorpicker" type="text" value="" />
        <p class="description">' . esc_attr__('Pick a Category Color', 'mnmlwp') . '</p>
    </div>';
}

add_action('category_add_form_fields', 'mnmlwp_add_category_form_custom_fields', 30 );

/**
 * Add Category Meta Fields
 */
function mnmlwp_add_category_meta_fields( $tag )
{
    $term_id = $tag->term_id;
    $cat_meta = get_option( "category_$term_id" );
    $color = isset( $cat_meta['color'] ) ? $cat_meta['color'] : '#444bb1';

    echo '<tr class="form-field">
        <th scope="row" valign="top"><label for="meta-color">' . esc_attr__('Category Color', 'mnmlwp') . '</label></th>
        <td>
            <div id="colorpicker">
                <input type="text" name="cat_meta[color]" class="colorpicker" size="3" style="width:79px" value="' . $color . '" />
            </div>
                <br />
            <span class="description"></span><br />
            </td>
    </tr>';
}

add_action('edit_category_form_fields', 'mnmlwp_add_category_meta_fields');

/**
 * Save Category Meta Fields
 */
function mnmlwp_save_category_meta_fields( $term_id )
{
    if ( isset( $_POST['cat_meta'] ) )
    {
        $term_id = $term_id;
        $cat_meta = get_option( "category_$term_id");
        $cat_keys = array_keys($_POST['cat_meta']);

        foreach ($cat_keys as $key) {
            if (isset($_POST['cat_meta'][$key])) {
                $cat_meta[$key] = sanitize_hex_color( $_POST['cat_meta'][$key] );
            }
        }

        update_option( "category_$term_id", $cat_meta );
    }
}

add_action('edited_category', 'mnmlwp_save_category_meta_fields');
add_action('created_category', 'mnmlwp_save_category_meta_fields', 11, 1);

/**
 * Meta Boxes for Posts/Pages
 */
function mnmlwp_add_meta_boxes()
{
    global $post;

    $screens = get_post_types();
    $post_type = get_post_type( $post->ID );

    foreach ( $screens as $screen )
    {
        if( $post_type === 'page' || $post_type === 'post' )
        {
            // Add Hide Page Title Option
            add_meta_box(
                'mnmlwp-hide-page-title',
                esc_html__( 'Hide Page Title?', 'mnmlwp' ),
                'mnmlwp_add_meta_boxes_hide_page_title_callback',
                $screen,
                'side',
                'low'
            );
            
            // Add Show Sidebar Option
            add_meta_box(
                'mnmlwp-show-sidebar',
                esc_html__( 'Show Sidebar?', 'mnmlwp' ),
                'mnmlwp_add_meta_boxes_show_sidebar_callback',
                $screen,
                'side',
                'low'
            );

            // Hero Title
            add_meta_box(
                'mnmlwp-hero-image',
                esc_html__( 'Hero Section', 'mnmlwp' ),
                'mnmlwp_add_meta_boxes_hero_callback',
                $screen
            );
        }

        // Hide Breadcrumbs
        if( get_theme_mod( 'mnmlwp_has_breadcrumbs', true ) ) {
            add_meta_box(
                'mnmlwp-hide-breadcrumbs',
                esc_html__( 'Hide Breadcrumbs?', 'mnmlwp' ),
                'mnmlwp_add_meta_boxes_hide_breadcrumb_callback',
                $screen
            );
        }

        // Hide Contact Row
        if( get_theme_mod( 'mnmlwp_show_contact_row', false ) ) {
            add_meta_box(
                'mnmlwp-hide-contact-row',
                esc_html__( 'Hide Contact Row?', 'mnmlwp' ),
                'mnmlwp_add_meta_boxes_hide_contact_row_callback',
                $screen
            );
        }
    }
}

add_action( 'add_meta_boxes', 'mnmlwp_add_meta_boxes' );

function mnmlwp_add_meta_boxes_show_sidebar_callback( $post )
{
    wp_nonce_field( 'mnmlwp_add_meta_boxes_nonce', 'mnmlwp_add_meta_boxes_nonce' );

    if( get_page_template_slug() === 'template-blank-page.php' || get_page_template_slug() === 'template-blank-page-hero.php' ) {
        echo __('This option is not available for the blank page template.', 'mnmlwp');
        return;
    }

    $mnmlwp_show_sidebar = get_post_meta( $post->ID, '_mnmlwp_show_sidebar', true );
    $mnmlwp_show_sidebar_by_default = get_theme_mod('mnmlwp_show_sidebar_by_default');
 
    if( $mnmlwp_show_sidebar === '1' ) {
        $checked = 'checked';
    } elseif( $mnmlwp_show_sidebar === '0' ) {
        $checked = '';
    } elseif( $mnmlwp_show_sidebar_by_default ) {
        $checked = 'checked';
    } else {
        $checked = '';
    }

    echo '<input type="checkbox" id="mnmlwp-show-sidebar" name="mnmlwp-show-sidebar" value="1" ' . $checked . '>&nbsp;' . esc_html__('Yes, show the sidebar.', 'mnmlwp');
}

function mnmlwp_add_meta_boxes_hide_page_title_callback( $post )
{
    if( get_page_template_slug() === 'template-blank-page.php' || get_page_template_slug() === 'template-blank-page-hero.php' ) {
        echo __('This option is not available for the blank page template.', 'mnmlwp');
        return;
    }

    $mnmlwp_hide_page_title = get_post_meta( $post->ID, '_mnmlwp_hide_page_title', true );
    $mnmlwp_hide_page_title_by_default = get_theme_mod('mnmlwp_hide_page_title_by_default');
 
    if( $mnmlwp_hide_page_title === '1' ) {
        $checked = 'checked';
    } elseif( $mnmlwp_hide_page_title === '0' ) {
        $checked = '';
    } elseif( $mnmlwp_hide_page_title_by_default ) {
        $checked = 'checked';
    } else {
        $checked = '';
    }

    echo '<input type="checkbox" id="mnmlwp-hide-page-title" name="mnmlwp-hide-page-title" value="1" ' . $checked . '>&nbsp;' . esc_html__('Yes, hide the page title.', 'mnmlwp');
}

function mnmlwp_add_meta_boxes_hide_breadcrumb_callback( $post )
{
    $theme_has_breadcrumbs = get_theme_mod( 'mnmlwp_has_breadcrumbs', true );
    $mnmlwp_hide_breadcrumbs = get_post_meta( $post->ID, '_mnmlwp_hide_breadcrumbs', true );
    $checked = $mnmlwp_hide_breadcrumbs == 1 ? 'checked' : '';
    $disabled = $theme_has_breadcrumbs ? '' : 'disabled="disabled"';

    echo '<input type="checkbox" id="mnmlwp-hide-breadcrumbs" name="mnmlwp-hide-breadcrumbs" value="1" ' . $disabled . ' ' . $checked . '>&nbsp;' . esc_html__('Check to hide the breadcrumb navigation on this page.', 'mnmlwp');

    if( ! $theme_has_breadcrumbs ) {
        echo '<p><strong>' . esc_html__('Attention', 'mnmlwp') . '</strong>:' . esc_html__('The breadcrumb navigation is globally disabled in the theme customization options.', 'mnmlwp') . '</p>';
    }
}

function mnmlwp_add_meta_boxes_hide_contact_row_callback( $post )
{
    $theme_has_contact_row = get_theme_mod( 'mnmlwp_has_contact_row', true );
    $mnmlwp_hide_contact_row = get_post_meta( $post->ID, '_mnmlwp_hide_contact_row', true );
    $checked = $mnmlwp_hide_contact_row == 1 ? 'checked' : '';
    $disabled = $theme_has_contact_row ? '' : 'disabled="disabled"';

    echo '<input type="checkbox" id="mnmlwp-hide-contact-row" name="mnmlwp-hide-contact-row" value="1" ' . $disabled . ' ' . $checked . '>&nbsp;' . esc_html__('Check to hide the contact row on this page.', 'mnmlwp');

    if( ! $theme_has_contact_row ) {
        echo '<p><strong>' . esc_html__('Attention', 'mnmlwp') . '</strong>:' . esc_html__('The contact row is globally disabled in the theme customization options.', 'mnmlwp') . '</p>';
    }
}

function mnmlwp_add_meta_boxes_hero_callback( $post )
{
    $hero_height = get_post_meta( $post->ID, '_mnmlwp_hero_height', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height', true ) : 75;
    $hero_height_measure = get_post_meta( $post->ID, '_mnmlwp_hero_height_measure', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height_measure', true ) : 'percent';
    $hero_height_tablet = get_post_meta( $post->ID, '_mnmlwp_hero_height_tablet', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height_tablet', true ) : 67;
    $hero_height_measure_tablet = get_post_meta( $post->ID, '_mnmlwp_hero_height_measure_tablet', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height_measure_tablet', true ) : 'percent';
    $hero_height_smartphone = get_post_meta( $post->ID, '_mnmlwp_hero_height_smartphone', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height_smartphone', true ) : 50;
    $hero_height_measure_smartphone = get_post_meta( $post->ID, '_mnmlwp_hero_height_measure_smartphone', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_height_measure_smartphone', true ) : 'percent';
    $hero_main_title = get_post_meta( $post->ID, '_mnmlwp_hero_main_title', true );
    $hero_subtitle = get_post_meta( $post->ID, '_mnmlwp_hero_subtitle', true );
    $hero_content = get_post_meta( $post->ID, '_mnmlwp_hero_content', true );
    $hero_main_title_color = get_post_meta( $post->ID, '_mnmlwp_hero_main_title_color', true );
    $hero_subtitle_color = get_post_meta( $post->ID, '_mnmlwp_hero_subtitle_color', true );
    $hero_content_color = get_post_meta( $post->ID, '_mnmlwp_hero_content_color', true );
    $hero_content_align = get_post_meta( $post->ID, '_mnmlwp_hero_content_align', true );
    $hero_title = get_post_meta( $post->ID, '_mnmlwp_hero_title', true ); // HTML content
    $has_overlay = get_post_meta( $post->ID, '_mnmlwp_hero_has_overlay', true );
    $has_overlay_checked = $has_overlay == 1 ? 'checked' : '';
    $hero_overlay_color_from = get_post_meta( $post->ID, '_mnmlwp_hero_overlay_color_from', true );
    $hero_overlay_color_to = get_post_meta( $post->ID, '_mnmlwp_hero_overlay_color_to', true );
    $hero_overlay_gradient_degrees = get_post_meta( $post->ID, '_mnmlwp_hero_overlay_gradient_degrees', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_overlay_gradient_degrees', true ) : 0;
    $hero_overlay_opacity = get_post_meta( $post->ID, '_mnmlwp_hero_overlay_opacity', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_overlay_opacity', true ) : '30';
    $has_radial_gradient = get_post_meta( $post->ID, '_mnmlwp_hero_has_radial_gradient', true );
    $has_radial_gradient_checked = $has_radial_gradient == 1 ? 'checked' : '';
    $has_skew = get_post_meta( $post->ID, '_mnmlwp_hero_has_skew', true );
    $has_skew_checked = $has_skew == 1 ? 'checked' : '';
    $background_position_horizontal = get_post_meta( $post->ID, '_mnmlwp_hero_background_position_horizontal', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_background_position_horizontal', true ) : 'center';
    $background_position_vertical = get_post_meta( $post->ID, '_mnmlwp_hero_background_position_vertical', true ) ? get_post_meta( $post->ID, '_mnmlwp_hero_background_position_vertical', true ) : 'center';
    $has_background_attachment_fixed = get_post_meta( $post->ID, '_mnmlwp_hero_background_attachment_fixed', true );
    $has_background_attachment_fixed_checked = $has_background_attachment_fixed == 1 ? 'checked' : '';

    // Hero fieldset
    $template = get_post_meta( $post->ID, '_wp_page_template', true );
    $has_hero_class = ( 'template-page-hero.php' === $template || 'template-post-hero.php' === $template || 'template-blank-page-hero.php' === $template ) ? 'mnmlwp-has-hero' : '';

    echo '<p id="mnmlwp-hero-fieldset-message" class="mnmlwp-last ' . $has_hero_class . '">' . __('If you would like to display a hero section please select the hero template in the post/page attributes.', 'mnmlwp') . '</p>';

    echo '<fieldset id="mnmlwp-hero-fieldset" class="' . $has_hero_class . '">';

        // Desktop
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-height">' . esc_html__('Hero section height', 'mnmlwp') . '</label>
        <input class="mnmlwp-hero-input" type="number" step="1" min="0" max="4096" id="mnmlwp-hero-height" name="mnmlwp-hero-height" value="' . $hero_height . '">';
        echo '<select style="vertical-align:top" id="mnmlwp-hero-height-measure" name="mnmlwp-hero-height-measure" />';

            foreach( array(
                'percent' => '%',
                'pixel' => 'px',
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $hero_height_measure ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select> <small>Desktop (1024px)</small></div>';
        
        // Tablet
        echo '<div class="mnmlwp-row"><input type="number" step="1" min="0" max="4096" id="mnmlwp-hero-height-tablet" name="mnmlwp-hero-height-tablet" value="' . $hero_height_tablet . '">';
        echo '<select style="vertical-align:top" id="mnmlwp-hero-height-measure-tablet" name="mnmlwp-hero-height-measure-tablet" />';

            foreach( array(
                'percent' => '%',
                'pixel' => 'px',
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $hero_height_measure_tablet ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select> <small>Tablet (768-1024px)</small></div>';
        
        // Smartphone
        echo '<div class="mnmlwp-row"><input type="number" step="1" min="0" max="4096" id="mnmlwp-hero-height-smartphone" name="mnmlwp-hero-height-smartphone" value="' . $hero_height_smartphone . '">';
        echo '<select style="vertical-align:top" id="mnmlwp-hero-height-measure-smartphone" name="mnmlwp-hero-height-measure-smartphone" />';

            foreach( array(
                'percent' => '%',
                'pixel' => 'px',
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $hero_height_measure_smartphone ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select> <small>Smartphone (320-768px)</small></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-main-title">' . esc_html__('Title', 'mnmlwp') . '</label>';
        echo '<input type="text" class="mnmlwp-input widefat" id="mnmlwp-hero-main-title" name="mnmlwp-hero-main-title" value="' . $hero_main_title . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-subtitle">' . esc_html__('Subtitle', 'mnmlwp') . '</label>';
        echo '<input type="text" class="mnmlwp-input widefat" id="mnmlwp-hero-subtitle" name="mnmlwp-hero-subtitle" value="' . $hero_subtitle . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-content">' . esc_html__('Content', 'mnmlwp') . '</label>';
        echo '<input type="text" class="mnmlwp-input widefat" id="mnmlwp-hero-content" name="mnmlwp-hero-content" value="' . $hero_content . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-main-title-color">' . esc_html__('Title color', 'mnmlwp') . '</label><input type="text" class="colorpicker" id="mnmlwp-hero-main-title-color" name="mnmlwp-hero-main-title-color" value="' . $hero_main_title_color . '"></div>';
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-subtitle-color">' . esc_html__('Subtitle color', 'mnmlwp') . '</label><input type="text" class="colorpicker" id="mnmlwp-hero-subtitle-color" name="mnmlwp-hero-subtitle-color" value="' . $hero_subtitle_color . '"></div>';
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-content-color">' . esc_html__('Content color', 'mnmlwp') . '</label><input type="text" class="colorpicker" id="mnmlwp-hero-content-color" name="mnmlwp-hero-content-color" value="' . $hero_content_color . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-content-align">' . esc_html__('Content alignment', 'mnmlwp') . '</label>';
        echo '<select id="mnmlwp-hero-content-align" name="mnmlwp-hero-content-align" />';

            foreach( array(
                'center' => 'Center (default)',
                'left' => 'Left',
                'right' => 'Right'
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $hero_content_align ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-title">' . esc_html__('Custom HTML', 'mnmlwp') . '</label>';
        echo '<textarea class="mnmlwp-input widefat" id="mnmlwp-hero-title" name="mnmlwp-hero-title" rows="10">' . $hero_title . '</textarea></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-has-overlay">' . esc_html__('Display colored overlay?', 'mnmlwp') . '</label>';
        echo '<input type="checkbox" id="mnmlwp-hero-has-overlay" name="mnmlwp-hero-has-overlay" value="1" ' . $has_overlay_checked . '></div>';
        
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-height">' . esc_html__('Gradient color 1', 'mnmlwp') . '</label><input type="text" class="colorpicker" id="mnmlwp-hero-overlay-color-from" name="mnmlwp-hero-overlay-color-from" value="' . $hero_overlay_color_from . '"></div>';
        
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-height">' . esc_html__('Gradient color 2', 'mnmlwp') . '</label><input type="text" class="colorpicker" id="mnmlwp-hero-overlay-color-to" name="mnmlwp-hero-overlay-color-to" value="' . $hero_overlay_color_to . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-overlay-gradient-degrees">' . esc_html__('Gradient angle (0-360)', 'mnmlwp') . '</label>';
        echo '<input type="number" step="1" min="0" max="360" id="mnmlwp-hero-overlay-gradient-degrees" name="mnmlwp-hero-overlay-gradient-degrees" value="' . $hero_overlay_gradient_degrees . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-height">' . esc_html__('Radial gradient?', 'mnmlwp') . '</label><input type="checkbox" id="mnmlwp-hero-has-radial-gradient" name="mnmlwp-hero-has-radial-gradient" value="1" ' . $has_radial_gradient_checked . '></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-overlay-gradient-degrees">' . esc_html__('Overlay opacity in percent (0-100%)', 'mnmlwp') . '</label>';
        echo '<input type="number" step="1" min="0" max="100" id="mnmlwp-hero-overlay-opacity" name="mnmlwp-hero-overlay-opacity" value="' . $hero_overlay_opacity . '"></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-overlay-gradient-degrees">' . esc_html__('Skew overlay?', 'mnmlwp') . '</label>';
        echo '<input type="checkbox" id="mnmlwp-hero-has-skew" name="mnmlwp-hero-has-skew" value="1" ' . $has_skew_checked . '></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-background-position-horizontal">' . esc_html__('Background position (vertical)', 'mnmlwp') . '</label>';
        echo '<select id="mnmlwp-hero-background-position-horizontal" name="mnmlwp-hero-background-position-horizontal" />';

            foreach( array(
                'center' => 'Center (default)',
                'top' => 'Top',
                'bottom' => 'Bottom'
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $background_position_horizontal ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select></div>';

        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-background-position-vertical">' . esc_html__('Background position (horizontal)', 'mnmlwp') . '</label>';
        echo '<select id="mnmlwp-hero-background-position-vertical" name="mnmlwp-hero-background-position-vertical" />';

            foreach( array(
                'center' => 'Center (default)',
                'left' => 'Left',
                'right' => 'Right'
            ) as $key => $val ) {
                ?><option value="<?php echo $key; ?>"<?php
                    if( $key === $background_position_vertical ) echo ' selected="selected"';
                ?>><?php echo $val; ?></option><?php
            }

        echo '</select></div>';
        
        echo '<div class="mnmlwp-row"><label class="mnmlwp-label" for="mnmlwp-hero-background-position-vertical">' . esc_html__('Fixed background position?', 'mnmlwp') . '</label>';
        echo '<input type="checkbox" id="mnmlwp-hero-background-attachment-fixed" name="mnmlwp-hero-background-attachment-fixed" value="1" ' . $has_background_attachment_fixed_checked . '></div>';

    echo '</fieldset>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id
 */
function mnmlwp_add_meta_boxes_save( $post_id )
{
    if ( ! isset( $_POST['mnmlwp_add_meta_boxes_nonce'] ) )
        return;

    if ( ! wp_verify_nonce( $_POST['mnmlwp_add_meta_boxes_nonce'], 'mnmlwp_add_meta_boxes_nonce' ) )
        return;

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;

    if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Sanitize user input.
    $data['mnmlwp-hero-height'] = isset( $_POST['mnmlwp-hero-height'] ) ? absint( str_replace(',', '.', $_POST['mnmlwp-hero-height'] ) ) : 75;
    $data['mnmlwp-hero-height-measure'] = isset( $_POST['mnmlwp-hero-height-measure'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-height-measure'] ) : 'percent';
    $data['mnmlwp-hero-height-tablet'] = isset( $_POST['mnmlwp-hero-height-tablet'] ) ? absint( str_replace(',', '.', $_POST['mnmlwp-hero-height-tablet'] ) ) : 67;
    $data['mnmlwp-hero-height-measure-tablet'] = isset( $_POST['mnmlwp-hero-height-measure-tablet'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-height-measure-tablet'] ) : 'percent';
    $data['mnmlwp-hero-height-smartphone'] = isset( $_POST['mnmlwp-hero-height-smartphone'] ) ? absint( str_replace(',', '.', $_POST['mnmlwp-hero-height-smartphone'] ) ) : 50;
    $data['mnmlwp-hero-height-measure-smartphone'] = isset( $_POST['mnmlwp-hero-height-measure-smartphone'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-height-measure-smartphone'] ) : 'percent';
    $data['mnmlwp-show-sidebar'] = isset( $_POST['mnmlwp-show-sidebar'] ) ? absint( $_POST['mnmlwp-show-sidebar'] ) : 0;
    $data['mnmlwp-hide-page-title'] = isset( $_POST['mnmlwp-hide-page-title'] ) ? absint( $_POST['mnmlwp-hide-page-title'] ) : 0;
    $data['mnmlwp-hide-breadcrumbs'] = isset( $_POST['mnmlwp-hide-breadcrumbs'] ) ? absint( $_POST['mnmlwp-hide-breadcrumbs'] ) : 0;
    $data['mnmlwp-hide-contact-row'] = isset( $_POST['mnmlwp-hide-contact-row'] ) ? absint( $_POST['mnmlwp-hide-contact-row'] ) : 0;
    $data['mnmlwp-hero-main-title'] = isset( $_POST['mnmlwp-hero-main-title'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-main-title'] ) : '';
    $data['mnmlwp-hero-subtitle'] = isset( $_POST['mnmlwp-hero-subtitle'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-subtitle'] ) : '';
    $data['mnmlwp-hero-content'] = isset( $_POST['mnmlwp-hero-content'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-content'] ) : '';
    $data['mnmlwp-hero-main-title-color'] = isset( $_POST['mnmlwp-hero-main-title-color'] ) ? sanitize_hex_color( $_POST['mnmlwp-hero-main-title-color'] ) : '';
    $data['mnmlwp-hero-subtitle-color'] = isset( $_POST['mnmlwp-hero-subtitle-color'] ) ? sanitize_hex_color( $_POST['mnmlwp-hero-subtitle-color'] ) : '';
    $data['mnmlwp-hero-content-color'] = isset( $_POST['mnmlwp-hero-content-color'] ) ? sanitize_hex_color( $_POST['mnmlwp-hero-content-color'] ) : '';
    $data['mnmlwp-hero-content-align'] = isset( $_POST['mnmlwp-hero-content-align'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-content-align'] ) : 'center';
    $data['mnmlwp-hero-title'] = isset( $_POST['mnmlwp-hero-title'] ) ? wp_kses_post( $_POST['mnmlwp-hero-title'] ) : '';
    $data['mnmlwp-hero-has-overlay'] = isset( $_POST['mnmlwp-hero-has-overlay'] ) ? absint( $_POST['mnmlwp-hero-has-overlay'] ) : 0;
    $data['mnmlwp-hero-overlay-color-from'] = isset( $_POST['mnmlwp-hero-overlay-color-from'] ) ? sanitize_hex_color( $_POST['mnmlwp-hero-overlay-color-from'] ) : '';
    $data['mnmlwp-hero-overlay-color-to'] = isset( $_POST['mnmlwp-hero-overlay-color-to'] ) ? sanitize_hex_color( $_POST['mnmlwp-hero-overlay-color-to'] ) : '';
    $data['mnmlwp-hero-overlay-gradient-degrees'] = isset( $_POST['mnmlwp-hero-overlay-gradient-degrees'] ) ? absint( $_POST['mnmlwp-hero-overlay-gradient-degrees'] ) : 0;
    $data['mnmlwp-hero-has-radial-gradient'] = isset( $_POST['mnmlwp-hero-has-radial-gradient'] ) ? absint( $_POST['mnmlwp-hero-has-radial-gradient'] ) : 0;
    $data['mnmlwp-hero-overlay-opacity'] = isset( $_POST['mnmlwp-hero-overlay-opacity'] ) ? absint( $_POST['mnmlwp-hero-overlay-opacity'] ) : 0;
    
    if( $data['mnmlwp-hero-overlay-opacity'] > 100 ) {
        $data['mnmlwp-hero-overlay-opacity'] = 100;
    }

    if( $data['mnmlwp-hero-overlay-opacity'] < 0 ) {
        $data['mnmlwp-hero-overlay-opacity'] = 0;
    }
    
    // Desktop
    if( $data['mnmlwp-hero-height-measure'] === 'percent' ) {
        if( $data['mnmlwp-hero-height'] > 100 ) {
            $data['mnmlwp-hero-height'] = 100;
        }
    } else {
        if( $data['mnmlwp-hero-height'] > 4096 ) {
            $data['mnmlwp-hero-height'] = 4096;
        }
    }
    
    // Tablet
    if( $data['mnmlwp-hero-height-measure-tablet'] === 'percent' ) {
        if( $data['mnmlwp-hero-height-tablet'] > 100 ) {
            $data['mnmlwp-hero-height-tablet'] = 100;
        }
    } else {
        if( $data['mnmlwp-hero-height-tablet'] > 2048 ) {
            $data['mnmlwp-hero-height-tablet'] = 2048;
        }
    }
    
    // Smartphone
    if( $data['mnmlwp-hero-height-measure-smartphone'] === 'percent' ) {
        if( $data['mnmlwp-hero-height-smartphone'] > 100 ) {
            $data['mnmlwp-hero-height-smartphone'] = 100;
        }
    } else {
        if( $data['mnmlwp-hero-height-smartphone'] > 2048 ) {
            $data['mnmlwp-hero-height-smartphone'] = 2048;
        }
    }
    
    if( $data['mnmlwp-hero-height'] < 0 ) {
        $data['mnmlwp-hero-height'] = 0;
    }

    $data['mnmlwp-hero-has-skew'] = isset( $_POST['mnmlwp-hero-has-skew'] ) ? absint( $_POST['mnmlwp-hero-has-skew'] ) : 0;
    $data['mnmlwp-hero-background-position-horizontal'] = isset( $_POST['mnmlwp-hero-background-position-horizontal'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-background-position-horizontal'] ) : '';
    $data['mnmlwp-hero-background-position-vertical'] = isset( $_POST['mnmlwp-hero-background-position-vertical'] ) ? sanitize_text_field( $_POST['mnmlwp-hero-background-position-vertical'] ) : '';
    $data['mnmlwp-hero-background-attachment-fixed'] = isset( $_POST['mnmlwp-hero-background-attachment-fixed'] ) ? absint( $_POST['mnmlwp-hero-background-attachment-fixed'] ) : '';

    update_post_meta( $post_id, '_mnmlwp_hero_height', $data['mnmlwp-hero-height'] );
    update_post_meta( $post_id, '_mnmlwp_hero_height_measure', $data['mnmlwp-hero-height-measure'] );
    update_post_meta( $post_id, '_mnmlwp_hero_height_tablet', $data['mnmlwp-hero-height-tablet'] );
    update_post_meta( $post_id, '_mnmlwp_hero_height_measure_tablet', $data['mnmlwp-hero-height-measure-tablet'] );
    update_post_meta( $post_id, '_mnmlwp_hero_height_smartphone', $data['mnmlwp-hero-height-smartphone'] );
    update_post_meta( $post_id, '_mnmlwp_hero_height_measure_smartphone', $data['mnmlwp-hero-height-measure-smartphone'] );
    update_post_meta( $post_id, '_mnmlwp_show_sidebar', $data['mnmlwp-show-sidebar'] );
    update_post_meta( $post_id, '_mnmlwp_hide_page_title', $data['mnmlwp-hide-page-title'] );
    update_post_meta( $post_id, '_mnmlwp_hide_breadcrumbs', $data['mnmlwp-hide-breadcrumbs'] );
    update_post_meta( $post_id, '_mnmlwp_hide_contact_row', $data['mnmlwp-hide-contact-row'] );
    update_post_meta( $post_id, '_mnmlwp_hero_main_title', $data['mnmlwp-hero-main-title'] );
    update_post_meta( $post_id, '_mnmlwp_hero_subtitle', $data['mnmlwp-hero-subtitle'] );
    update_post_meta( $post_id, '_mnmlwp_hero_content', $data['mnmlwp-hero-content'] );
    update_post_meta( $post_id, '_mnmlwp_hero_main_title_color', $data['mnmlwp-hero-main-title-color'] );
    update_post_meta( $post_id, '_mnmlwp_hero_subtitle_color', $data['mnmlwp-hero-subtitle-color'] );
    update_post_meta( $post_id, '_mnmlwp_hero_content_color', $data['mnmlwp-hero-content-color'] );
    update_post_meta( $post_id, '_mnmlwp_hero_content_align', $data['mnmlwp-hero-content-align'] );
    update_post_meta( $post_id, '_mnmlwp_hero_title', $data['mnmlwp-hero-title'] );
    update_post_meta( $post_id, '_mnmlwp_hero_has_overlay', $data['mnmlwp-hero-has-overlay'] );
    update_post_meta( $post_id, '_mnmlwp_hero_overlay_color_from', $data['mnmlwp-hero-overlay-color-from'] );
    update_post_meta( $post_id, '_mnmlwp_hero_overlay_color_to', $data['mnmlwp-hero-overlay-color-to'] );
    update_post_meta( $post_id, '_mnmlwp_hero_overlay_gradient_degrees', $data['mnmlwp-hero-overlay-gradient-degrees'] );
    update_post_meta( $post_id, '_mnmlwp_hero_has_radial_gradient', $data['mnmlwp-hero-has-radial-gradient'] );
    update_post_meta( $post_id, '_mnmlwp_hero_overlay_opacity', $data['mnmlwp-hero-overlay-opacity'] );
    update_post_meta( $post_id, '_mnmlwp_hero_has_skew', $data['mnmlwp-hero-has-skew'] );
    update_post_meta( $post_id, '_mnmlwp_hero_background_position_horizontal', $data['mnmlwp-hero-background-position-horizontal'] );
    update_post_meta( $post_id, '_mnmlwp_hero_background_position_vertical', $data['mnmlwp-hero-background-position-vertical'] );
    update_post_meta( $post_id, '_mnmlwp_hero_background_attachment_fixed', $data['mnmlwp-hero-background-attachment-fixed'] );
}

add_action( 'save_post', 'mnmlwp_add_meta_boxes_save' );

// Get Hero Section Height
function mnmlwp_get_hero_height()
{
    $template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    
    if( 'template-page-hero.php' !== $template && 'template-post-hero.php' !== $template && 'template-blank-page-hero.php' !== $template)
        return 75;
        
    $height_desktop = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height', true ) ) ? absint( get_post_meta( get_the_ID(), '_mnmlwp_hero_height', true ) ) : 75;
    $height_tablet = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_tablet', true ) ) ? absint( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_tablet', true ) ) : 67;
    $height_smartphone = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_smartphone', true ) ) ? absint( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_smartphone', true ) ) : 50;

    $height = array(
        'desktop' => $height_desktop,
        'tablet' => $height_tablet,
        'smartphone' => $height_smartphone,
    );
    
    return $height;
}

// Get Hero Section Height Measure
function mnmlwp_get_hero_height_measure()
{
    $template = get_post_meta( get_the_ID(), '_wp_page_template', true );
    
    if( 'template-page-hero.php' !== $template && 'template-post-hero.php' !== $template && 'template-blank-page-hero.php' !== $template )
        return 'percent';
        
    $measure_desktop = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure', true ) ) ? sanitize_text_field( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure', true ) ) : 'percent';
    $measure_tablet = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure_tablet', true ) ) ? sanitize_text_field( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure_tablet', true ) ) : 'percent';
    $measure_smartphone = ! empty( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure_smartphone', true ) ) ? sanitize_text_field( get_post_meta( get_the_ID(), '_mnmlwp_hero_height_measure_smartphone', true ) ) : 'percent';
        
    $measure = array(
        'desktop' => $measure_desktop,
        'tablet' => $measure_tablet,
        'smartphone' => $measure_smartphone,
    );
    
    return $measure;
}

/**
 * Get breadcrumb trail HTML
 * 
 * @since 0.6.0
 */
function mnmlwp_get_breadcrumb_html() {
    if( ! function_exists('breadcrumb_trail') ) {
        return;
    }

    ob_start();
    mnmlwp_breadcrumb_trail();
    $breadcrumb = ob_get_contents();
    ob_end_clean();

    return '<div class="mnmlwp-row mnmlwp-row--breadcrumbs">
        <div class="mnmlwp-column mnmlwp-column--breadcrumbs">
            <div class="mnmlwp-breadcrumbs">'
                . $breadcrumb .
            '</div>
        </div>
    </div>
    <div class="clear-columns"></div>';
}

/**
 * Get breadcrumb row
 * 
 * @since 0.6.0
 */
function mnmlwp_get_breadcrumb_row( $hero = false ) {
    global $post;

    if( ! isset( $post->ID ) ) {
        return;
    }

    if( function_exists('breadcrumb_trail') ):

        $templates = array(
            'template-blank-page.php',
            'template-blank-page-hero.php',
            'template-page-hero.php',
            'template-post-hero.php',
        );

        if( ! $hero && ( ! in_array( get_page_template_slug( $post->ID ), $templates ) ) ) {
            if( ( get_theme_mod( 'mnmlwp_has_breadcrumbs', false ) ) && ! get_post_meta( get_the_ID(), '_mnmlwp_hide_breadcrumbs', true ) ):
                if( ( ! is_front_page() ) || ( is_front_page() && get_theme_mod( 'mnmlwp_breadcrumbs_show_on_home', false ) ) ):
                    echo mnmlwp_get_breadcrumb_html();
                endif;
            endif;
        } else {
            
        }
    endif;
}
