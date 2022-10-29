(function ($) {
    "use strict";
    $(".toggle-menu").on("click", function () {
        var $target = $("#" + $(this).data("target"));
        if ($target.length) {
            $target.toggleClass("opened");
            $(".sidebar-overlay").toggleClass("opened");
            $("body").toggleClass("menu-opened");
            $(".sidebar-overlay").attr("data-reff", $(this).data("target"));
        }
    });
    $(".sidebar-overlay").on("click", function () {
        var $target = $($(this).attr("data-reff"));
        if ($target.length) {
            $target.removeClass("opened");
            $("body").removeClass("menu-opened");
            $(this).removeClass("opened");
        }
    });
    $('.menu-toggle').on("click", function () {
        $(this).parents('li').children('.mobile-submenu-wrapper').slideToggle(300);
        return false;
    });
    if ($('#testimonial_slider').length > 0) {
        $("#testimonial_slider").owlCarousel({
            autoPlay: false,
            nav: true,
            margin: 30,
            pagination: false,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });
    }
    if ($('#our_doctor').length > 0) {
        $("#our_doctor").owlCarousel({
            autoPlay: false,
            nav: true,
            margin: 10,
            pagination: false,
            loop: true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                992: {
                    items: 6
                }
            }
        });
    }
    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }
    if ($('.header .dropdown').length > 0) {
        $('.header .dropdown').hover(function () {
            $(this).addClass('show').attr('aria-expanded', "true");
            $(this).find('.dropdown-menu').addClass('show');
        }, function () {
            $(this).removeClass('show').attr('aria-expanded', "false");
            $(this).find('.dropdown-menu').removeClass('show');
        });
    }
    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD/MM/YYYY'
        });
    }
    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }
})(jQuery);
