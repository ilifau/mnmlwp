// Main JS File for mnmlWP Theme

jQuery(document).ready(function($) {

    // Animation speed
    let animSpeed = 180;

    // Get Viewport Width
    function isMobile() {
        return $(window).width() <= 767;
    }

    var window_width = $(window).width();
    
    // Get Viewport Type
    function getViewportType() {
        if( window_width < 768 ) return 'smartphone';
        if( window_width < 1024 ) return 'tablet';
        if( window_width > 1023 ) return 'desktop';
    }

    // Valuemeter
    $('.valuemeter').on('inview', function(event, isInView) {
        if (isInView) {
            var value = $(this).find('.valuemeter-item-value').not('.activated');

            value.addClass('activated').width('0').stop().css('opacity', '.33').animate({
                width   : [value.attr('data-value') + '%', 'swing'],
                opacity : [1, 'swing'],

            }, 1500 + Math.ceil(Math.random() * 800));
        }
    });

    // Add tabindex="0" to main menu links without href
    $('nav#main ul li a:not([href])').attr('tabIndex', 0);

    // Hamburger Navigation
    var $hamburger = $('.hamburger');

    $hamburger.on('click', function(e) {
        $hamburger.toggleClass('is-active');
        switch(mnmlwp_globals.nav_animation) {
            case 'fade':
                $('.mnmlwp-row--nav-mobile nav#main').stop().fadeToggle(animSpeed);
                break;
            default:
                $('.mnmlwp-row--nav-mobile nav#main').stop().slideToggle(animSpeed);
                break;
        }
    });
    
    // Resize Hero Section
    function resizeHeroSection() {
        var viewport_type = getViewportType();
        
        if( ! viewport_type )
            viewport_type = 'desktop';
            
        var hero_height = mnmlwp_globals.hero_height[viewport_type];
        var measure = mnmlwp_globals.hero_height_measure[viewport_type];

        if( measure === 'percent') {
            
            var subtract = $('.mnmlwp-row.mnmlwp-row--header').outerHeight(); // Subtract header/nav height
            
            if( mnmlwp_globals.nav_position !== 'inside_header' ) {
                 subtract += $('.mnmlwp-row.mnmlwp-row--nav').outerHeight();
            }
            
            hero_height = $(window).height() * hero_height/100; // Convert vh to px

            $('.mnmlwp-column.mnmlwp-column--hero').css('height', hero_height - subtract + 1 + 'px');
        } else {
            $('.mnmlwp-column.mnmlwp-column--hero').css('height', hero_height + 'px');
        }
    }
    
    resizeHeroSection();
    
    // Window Resize
    $(window).on('resize', function () {
        clearTimeout(window.resizedFinished);

        window.resizedFinished = setTimeout(function() {
            if( $(window).width() !== window_width ) {
                window_width = $(window).width();
                resizeHeroSection();
            }
        }, 250);
    });

    // Lazy Loading
    $('img.lazy').lazyload({
        effect: 'fadeIn',
        effectspeed: 200,
        skip_invisible: false,
        threshold : 400
    });

    // Searchform
    $('form.mnmlwp-searchform').on('submit', function() {
        if( $(this).find( $('input#s') ).val() === '' ) {
            $(this).find( $('input#s') ).focus();
            return false;
        }
    });
    
});

jQuery(window).load(function() {
    var $ = jQuery;

    // Loading layer
    $('.mnmlwp-loading-layer').fadeOut(200);
});
