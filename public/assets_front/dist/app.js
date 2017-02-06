/*if ($(document).ready(function() {
        $(".search-res").select2({
            placeholder: "Select/Type City...",
            allowClear: !0,
            maximumSelectionSize: 1
        }).on("select2-opening", function(e) {
            $(this).select2("val").length > 0 && e.preventDefault()
        }), $(".search-area").select2({
            placeholder: "Select/Type Area...",
            allowClear: !0,
            maximumSelectionSize: 1
        }), $(".search-type").select2({
            placeholder: "Select Type",
            allowClear: !0,
            maximumSelectionSize: 1
        })
    }), function(e) {
        jQuery.scrollSpeed = function(i, n, o) {
            var t, a, l, r = e(document),
                s = e(window),
                d = e("html, body"),
                c = o || "default",
                u = 0,
                f = !1;
            return !window.navigator.msPointerEnabled && void s.on("mousewheel DOMMouseScroll", function(e) {
                var o = e.originalEvent.wheelDeltaY,
                    w = e.originalEvent.detail;
                return t = r.height() > s.height(), a = r.width() > s.width(), f = !0, t && (l = s.height(), (o < 0 || w > 0) && (u = u + l >= r.height() ? u : u += i), (o > 0 || w < 0) && (u = u <= 0 ? 0 : u -= i), d.stop().animate({
                    scrollTop: u
                }, n, c, function() {
                    f = !1
                })), a && (l = s.width(), (o < 0 || w > 0) && (u = u + l >= r.width() ? u : u += i), (o > 0 || w < 0) && (u = u <= 0 ? 0 : u -= i), d.stop().animate({
                    scrollLeft: u
                }, n, c, function() {
                    f = !1
                })), !1
            }).on("scroll", function() {
                t && !f && (u = s.scrollTop()), a && !f && (u = s.scrollLeft())
            }).on("resize", function() {
                t && !f && (l = s.height()), a && !f && (l = s.width())
            })
        }, jQuery.easing.default = function(e, i, n, o, t) {
            return -o * ((i = i / t - 1) * i * i * i - 1) + n
        }
    }(jQuery), $(function() {
        jQuery.scrollSpeed(50, 700)
    }), $(window).width() > 992) {
    $(window).scroll(function() {
        var e = $(window).scrollTop();
        e >= 570 ? $("#sidebar_nav").addClass("sidebar_fixed") : $("#sidebar_nav").removeClass("sidebar_fixed")
    });
    var container = document.getElementById("sidebar_nav");
    Ps.initialize(container)
}
$(window).resize(function() {
    $(window).width() > 992 ? $(window).scroll(function() {
        var e = $(window).scrollTop();
        e >= 570 ? $("#sidebar_nav").addClass("sidebar_fixed") : $("#sidebar_nav").removeClass("sidebar_fixed")
    }) : $(window).scroll(function() {
        var e = $(window).scrollTop();
        e >= 570 ? $("#sidebar_nav").removeClass("sidebar_fixed") : $("#sidebar_nav").removeClass("sidebar_fixed")
    });
    var e = document.getElementById("sidebar_nav");
    Ps.initialize(e)
}), $(function() {
    $("a.page-scroll").bind("click", function(e) {
        var i = $(this);
        $("html, body").stop().animate({
            scrollTop: $(i.attr("href")).offset().top
        }, 1500, "easeInOutExpo"), e.preventDefault()
    })
});

*/




/*$(document).ready(function () {
$(".logo-slider").slick({
    dots: false,
    arrows: true,
    infinite: true,
    slidesToShow: 4,
    autoplaySpeed: 2000,
    autoplay: true,
    slidesToScroll: 1,

    responsive: [{
        breakpoint: 992,
        settings: {
            dots: false,
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3
        }
    }, {
        breakpoint: 768,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 2
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
    }]
});
});



$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});*/


var container = document.getElementById('sidebar_nav');
Ps.initialize(container);

if ($(window).width() > 992) {
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll >= 2300) {
            $("#sidebar_nav").removeClass("sidebar_fixed");
        }
        else if(scroll >= 570) {
            $("#sidebar_nav").addClass("sidebar_fixed");
        }
        else {
            $("#sidebar_nav").removeClass("sidebar_fixed");
        }
    });
}


$(window).resize(function() {
    if ($(window).width() > 992) {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll >= 2300) {
                $("#sidebar_nav").removeClass("sidebar_fixed");
            }
            else if(scroll >= 570) {
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

});

