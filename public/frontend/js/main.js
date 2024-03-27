(function($) {
    "use strict";
    $('#mobile-menu').meanmenu({
        meanMenuContainer: '.mobile-menu',
        meanScreenWidth: "992"
    });
    var top_offset = $('.header-area').height() - 10;
    $('.main-menu nav ul').onePageNav({
        currentClass: 'active',
        scrollOffset: top_offset,
    });
    $(".breadcrumbs-section").css('background', function() {
        var bg = ('url(' + $(this).data("bg") + ') no-repeat center center');
        return bg;
    });
    $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $(".header-sticky").removeClass("sticky");
        } else {
            $(".header-sticky").addClass("sticky");
        }
    });
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 3
            },
            992: {
                items: 5
            }
        }
    })
    $('.popup-image').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });
    $('.popup-video').magnificPopup({
        type: 'iframe'
    });
    $('.grid').imagesLoaded(function() {
        var $grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });
    });
    $.scrollUp({
        scrollName: 'scrollUp',
        topDistance: '300',
        topSpeed: 300,
        animation: 'fade',
        animationInSpeed: 200,
        animationOutSpeed: 200,
        scrollText: '<i class="fa fa-angle-up"></i>',
        activeOverlay: false,
    });
    new WOW().init();
    $('.recent-item ul').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        infinite: true,
        width: '100%',
        centerMode: true,
        variableWidth: true,
        speed: 300,
        slidesToShow: 3,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                dots: false,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
                centerPadding: '30',
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        }, {
            breakpoint: 769,
            settings: {
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }, {
            breakpoint: 480,
            settings: {
                width: '100%',
                variableWidth: true,
                responsive: true,
                dots: false,
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
})(jQuery);