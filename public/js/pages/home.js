$(document).ready(function() {
    $('.slide').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        prevArrow: '.arrow_prev',
        nextArrow: '.arrow_next'
    });
    $('#single-item').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
    });

    });
