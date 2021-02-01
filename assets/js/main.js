// Main JS File for mnmlWP Theme

jQuery(document).ready(function($) {

    // Animation speed
    let animSpeed = 180;

    // Navigation timeout
    var navTimer = 180;
    var navTimeout;

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

    // Main Navigation Desktop
    function initiateNav() {
        $('nav#main ul li.menu-item-has-children').off('mouseenter').off('mouseleave').off('touchend');

        if( ! isMobile() && ! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('nav#main ul li.menu-item-has-children').on('mouseenter mouseleave', function(e) {
                var submenu = $(this).find('ul.sub-menu').eq(0);

                if (e.type === 'mouseleave') {
                    toggleSubMenu(submenu, e.type);
                } else {
                    navTimeout = setTimeout(function () {
                        toggleSubMenu(submenu);
                    }, navTimer);
                }
            });
        }

        // Main Navigation Mobile > 767
        else if( ! isMobile() && /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $('nav#main ul li.menu-item-has-children').off('mouseenter').off('mouseleave').off('touchend');

            $('nav#main ul li.menu-item-has-children').on({
                 touchend: function(e) {
                    var submenu = $(this).find('ul.sub-menu').eq(0);

                    if( ! $(this).hasClass('mnmlwp-mobile-active') ) {
                        e.preventDefault();

                        if ( ! $(this).parents('ul').parents('ul').length ) {
                            closeActiveNavItems();
                        }

                        $(this).addClass('mnmlwp-mobile-active');
                        toggleSubMenu(submenu);
                        return false;
                    }
                }
            });
        }
    }

    initiateNav();

    // Toggle sub menu
    function toggleSubMenu( item, event = null ) {
        clearTimeout(navTimeout);
        switch(mnmlwp_globals.nav_animation) {
            case 'fade':
                if (event === 'mouseleave') {
                    item.stop(true, true).fadeOut(animSpeed);
                } else {
                    item.stop(true, true).fadeToggle(animSpeed);
                }
                break;
            default:
                if (event === 'mouseleave') {
                    item.stop(true, true).slideUp(animSpeed);
                } else {
                    item.stop(true, true).slideToggle(animSpeed);
                }
                break;
        }
    }

    // Close active menu items
    function closeActiveNavItems() {
        $('nav#main ul li.menu-item-has-children').removeClass('mnmlwp-mobile-active');

        if( ! isMobile() ) {
            toggleSubMenu( $('ul.sub-menu:visible') );
        } else {
            $('ul.sub-menu').show(0);
        }
    }

    // Click anywhere closes open navigation
    $('body').on('touchend', function(e) {
        if( ! isMobile() ) {
            if( ! $(e.target).closest('nav#main ul li').length) {
                closeActiveNavItems();
                checkNavigation();
            }
        }
    });

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

    // Hamburger Navigation
    var $hamburger = $('.hamburger');

    $hamburger.on('click', function(e) {
        $hamburger.toggleClass('is-active');
        switch(mnmlwp_globals.nav_animation) {
            case 'fade':
                $('nav#main').stop().fadeToggle(animSpeed);
                break;
            default:
                $('nav#main').stop().slideToggle(animSpeed);
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
                checkNavigation();
                initiateNav();
                window_width = $(window).width();
                resizeHeroSection();
            }
        }, 250);
    });

    function checkNavigation() {
        if( isMobile() ) {
            $hamburger.removeClass('is-active');
            $('nav#main').hide(0);
            $('ul.sub-menu').css({'display' : 'block', 'height' : 'auto'});
        } else {
            $('nav#main').show(0);
            $('ul.sub-menu').hide(0);
        }
    }

    // Lazy Loading
    $('img.lazy').lazyload({
        effect: 'fadeIn',
        effectspeed: 200,
        skip_invisible: false,
        threshold : 400
    });

    // Searchform
    $('form#searchform').on('submit', function() {
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
