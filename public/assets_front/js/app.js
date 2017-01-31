$(document).ready(function () {
    $(".search-res").select2({
        placeholder: "Select City..",
        allowClear: true,
        maximumSelectionSize: 1

    }).on('select2-opening', function(e) {
        if ($(this).select2('val').length > 0) {
            e.preventDefault();
        }
    });
    $(".search-area").select2({
        placeholder: "Select Area..",
        allowClear: true,
        maximumSelectionSize: 1

    });
});

(function($) {
    jQuery.scrollSpeed = function(step, speed, easing) {
        var $document = $(document),
            $window = $(window),
            $body = $('html, body'),
            option = easing || 'default',
            root = 0,
            scroll = false,
            scrollY,
            scrollX,
            view;

        if (window.navigator.msPointerEnabled)
            return false;

        $window.on('mousewheel DOMMouseScroll', function(e) {

            var deltaY = e.originalEvent.wheelDeltaY,
                detail = e.originalEvent.detail;
            scrollY = $document.height() > $window.height();
            scrollX = $document.width() > $window.width();
            scroll = true;

            if (scrollY) {

                view = $window.height();

                if (deltaY < 0 || detail > 0)

                    root = (root + view) >= $document.height() ? root : root += step;

                if (deltaY > 0 || detail < 0)

                    root = root <= 0 ? 0 : root -= step;

                $body.stop().animate({

                    scrollTop: root

                }, speed, option, function() {

                    scroll = false;

                });
            }

            if (scrollX) {

                view = $window.width();

                if (deltaY < 0 || detail > 0)

                    root = (root + view) >= $document.width() ? root : root += step;

                if (deltaY > 0 || detail < 0)

                    root = root <= 0 ? 0 : root -= step;

                $body.stop().animate({

                    scrollLeft: root

                }, speed, option, function() {

                    scroll = false;

                });
            }

            return false;

        }).on('scroll', function() {

            if (scrollY && !scroll) root = $window.scrollTop();
            if (scrollX && !scroll) root = $window.scrollLeft();

        }).on('resize', function() {

            if (scrollY && !scroll) view = $window.height();
            if (scrollX && !scroll) view = $window.width();

        });
    };

    jQuery.easing.default = function (x,t,b,c,d) {

        return -c * ((t=t/d-1)*t*t*t - 1) + b;
    };

})(jQuery);

$(function() {
    jQuery.scrollSpeed(50, 700);
});

if ($(window).width() > 992) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 570) {
            $("#sidebar_nav").addClass("sidebar_fixed");
        }
        else {
            $("#sidebar_nav").removeClass("sidebar_fixed");
        }
    });

    var container = document.getElementById('sidebar_nav');
    Ps.initialize(container);
}




$(window).resize(function() {
    if ($(window).width() > 992) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 570) {
                $("#sidebar_nav").addClass("sidebar_fixed");
            }
            else {
                $("#sidebar_nav").removeClass("sidebar_fixed");
            }
        });
    }
    else{
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            if (scroll >= 570) {

                $("#sidebar_nav").removeClass("sidebar_fixed");
            }
            else{
                $("#sidebar_nav").removeClass("sidebar_fixed");

            }
        });
    }
    var container = document.getElementById('sidebar_nav');
    Ps.initialize(container);
});

$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});


