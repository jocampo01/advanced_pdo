$(function() {
    'use strict';
    
    // preloader
    $(".preloader").fadeOut();

    // sidebar
    $('.sidebar').sideNav( {
        edge: 'left'
    }
    );
    // slider
    $(".slide-show").owlCarousel( {
        items: 1, navigation: true, slideSpeed: 1000, dots: true, paginationSpeed: 400, singleItem: true, autoplay: false, loop: true
    }
    );

    // magnific popup
    $('.portfolio').each(function() {
        // the containers for all your galleries
        $(this).magnificPopup( {
            delegate: '.myPortfo', // the selector for gallery item
            type: 'image', gallery: {
                enabled: true
            }
        }
        );
    }
    );

    // testimonial
    $(".testimonial").owlCarousel( {
        items: 1, navigation: true, slideSpeed: 1000, dots: true, paginationSpeed: 400, singleItem: true, loop: true
    }
    );

    // tabs
    $('ul.tabs').tabs();
    // collapse

    $('.collapsible').collapsible();
}

);