$(document).ready(function() {
    var banner = $('#slide-banner')
    banner.owlCarousel({
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 2500,
        dots: false,
        loop: true,
    });

    var slideContent = $('#owl-carousel-content')
    slideContent.owlCarousel({
        loop: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 4000,
        autoplayHoverPause: true,
        autoplaySpeed: 2500,
        dots: false,
    });

    var slideSale = $('#slide-sale')
    slideSale.owlCarousel({
        items: 5,
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });
    var slidePc = $('#slide-pc')
    slidePc.owlCarousel({
        items: 5,
        loop: true,
        dots: false,
        nav: false,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        autoplaySpeed: 1000,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }

    })
})

