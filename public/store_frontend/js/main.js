if ($(".hotProduct #owl-demo-related .product-wrapper").length) {
    $('.hotProduct #owl-demo-related').owlCarousel({
        nav: true,
        dots: false,
        margin: 10,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            }
        },
        pagination: false,
        slideSpeed: 800,
        addClassActive: true,
        scrollPerPage: false,
        touchDrag: true,
        loop: false,
    });
}
if ($(".design-product #owl-demo-related .product-wrapper").length) {
    $('.design-product #owl-demo-related').owlCarousel({
        nav: true,
        dots: false,
        margin: 10,
        responsive: {
            0: {
                items: 2
            },
            480: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 3
            }
        },
        pagination: false,
        slideSpeed: 800,
        addClassActive: true,
        scrollPerPage: false,
        touchDrag: true,
        loop: false,
    });
}
$(".home-slider").owlCarousel({
    navigation: false,
    slideSpeed: 300,
    paginationSpeed: 400,
    items: 1,
    itemsDesktop: false,
    itemsDesktopSmall: false,
    itemsTablet: false,
    itemsMobile: false,
    autoHeight: false,
});
$(".slider-mobile").owlCarousel({
    navigation: false,
    slideSpeed: 300,
    paginationSpeed: 400,
    items: 1,
    itemsDesktop: false,
    itemsDesktopSmall: false,
    itemsTablet: false,
    itemsMobile: false,
    autoHeight: false,
});
$('.cart-shop-btn').click(function() {
    $('.site-overlay').addClass('active');
    if ($('.site-overlay').hasClass('active')) {
        $('.site-overlay.active').click(function() {
            $(this).removeClass('active');
            $('.site-nav.style--sidebar').removeClass('active');
            $('.product-detail-main').removeClass('sidebar-move');
        });
    }
    $('.site-nav.style--sidebar').addClass('active');
    $('.product-detail-main').addClass('sidebar-move');
});
if ($(window).width() < 768) {
    $('.slider').addClass('slide-mobile');
    $('.slider').addClass('owl-carousel');
} else {
    $('.slider').removeClass('slide-mobile');
    $('.slider').removeClass('owl-carousel');
}