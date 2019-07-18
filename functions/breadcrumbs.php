<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists('mnmlwp_breadcrumb_trail') )
{
    function mnmlwp_breadcrumb_trail()
    {
        $args = array(
        	'container'       => 'nav',
        	'before'          => '',
        	'after'           => '',
        	'browse_tag'      => 'h2',
        	'list_tag'        => 'ul',
        	'item_tag'        => 'li',
        	'show_on_front'   => get_theme_mod( 'mnmlwp_breadcrumbs_show_on_home', false ) ? true : false,
        	'network'         => false,
        	'show_title'      => true,
        	'show_browse'     => false,
        	'labels' => array(
        		'browse'              => esc_html__( 'Browse:&nbsp;',                         'mnmlwp' ),
        		'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'mnmlwp' ),
        		'home'                => esc_html__( 'Home',                                  'mnmlwp' ),
        		'error_404'           => esc_html__( '404 Not Found',                         'mnmlwp' ),
        		'archives'            => esc_html__( 'Archives',                              'mnmlwp' ),
        		// Translators: %s is the search query.
        		'search'              => esc_html__( 'Search results for: %s',                'mnmlwp' ),
        		// Translators: %s is the page number.
        		'paged'               => esc_html__( 'Page %s',                               'mnmlwp' ),
        		// Translators: %s is the page number.
        		'paged_comments'      => esc_html__( 'Comment Page %s',                       'mnmlwp' ),
        		// Translators: Minute archive title. %s is the minute time format.
        		'archive_minute'      => esc_html__( 'Minute %s',                             'mnmlwp' ),
        		// Translators: Weekly archive title. %s is the week date format.
        		'archive_week'        => esc_html__( 'Week %s',                               'mnmlwp' ),

        		// "%s" is replaced with the translated date/time format.
        		'archive_minute_hour' => '%s',
        		'archive_hour'        => '%s',
        		'archive_day'         => '%s',
        		'archive_month'       => '%s',
        		'archive_year'        => '%s',
        	),
        	'post_taxonomy' => array(
        		// 'post'  => 'post_tag', // 'post' post type and 'post_tag' taxonomy
        		// 'book'  => 'genre',    // 'book' post type and 'genre' taxonomy
        	),
        	'echo'            => true
        );
        
        breadcrumb_trail( $args );
    }
}
