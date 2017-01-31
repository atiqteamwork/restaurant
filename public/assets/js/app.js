

// sidebar color
$(document).ready(function(){
   $('#sidebar-0').on('click',function () {
      $('.main-sidebar').css("background-color", "#333333");
      $('.sidebar-menu li a').css("color", "#ffffff");
      // $('.main-sidebar nav .sidebar-menu.submenu').css("background-color", "#404040");
   });
   $('#sidebar-1').on('click',function () {
      $('.main-sidebar').css({"background-color":"white","color":"#ffffff"});
      $('.main-sidebar nav .sidebar-menu li a').css("color", "#444444");
      $('.sidebar-menu li a .label-number').css("color", "#ffffff");
   });
   $('#sidebar-2').on('click',function () {
      $('.main-sidebar').css("background-color", "#008c7f ");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-3').on('click',function () {
      $('.main-sidebar').css("background", "#9B9B9B");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-4').on('click',function () {
      $('.main-sidebar').css("background", "#501D89");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-5').on('click',function () {
      $('.main-sidebar').css("background", "#37474f ");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-6').on('click',function () {
      $('.main-sidebar').css("background", "#607d8b");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-7').on('click',function () {
      $('.main-sidebar').css("background", "#734920");
      $('.sidebar-menu li a').css("color", "#ffffff");

   });
   $('#sidebar-8').on('click',function () {
      $('.main-sidebar').css("background", "#465487");
      $('.sidebar-menu li a').css("color", "#ffffff");
   });
   $('#sidebar-9').on('click',function () {
      $('.main-sidebar').css("background", "#ac5353");
      $('.sidebar-menu li a').css("color", "#ffffff");
      // $('.main-sidebar nav .sidebar-menu.submenu').css("background-color", "#5c3a1a");

   });
});
// end

// theme change color
$(document).ready(function(){
   $('#def-1').on('change',function () {
      $('.main-content').css("background", "#edf0f5");

   });

   $('#white-1').on('change',function () {
      $('.main-content').css("background", "#ffffff");
   });

   $('#main-change-1').on('change',function () {
      $('.main-content').css({"background": "rgba(0,0,0,0.1)"});

   });
   $('#main-change-2').on('change',function () {
      $('.main-content').css("background", "#ddd");
   });
});
// end

//floating header
$(document).ready(function(){
   $('#float-on').on('click',function () {
      $('#floating-header').addClass("floating-cls");
   });

   $('#float-off').on('click',function () {
      $('#floating-header').removeClass("floating-cls");
   });
   $('.floating-header').click(function() {
      $('.floating-header').removeClass("change-float");
      $(this).addClass("change-float");
   });
});

// end
// reset button
$(document).ready(function () {
   $("#reset-changes").on('click', function () {
      $('.main-content').css("background", "#edf0f5");
      $('.main-sidebar').css("background-color", "#333333");
      $('.sidebar-menu li a').css("color", "#ffffff");
      $('.main-sidebar .logo').css({"background-color": "#1b93e1","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#1b93e1"});

// logo
      $('#nav-1').removeClass("active");
      $('#nav-2').removeClass("active");
      $('#nav-3').removeClass("active");
      $('#nav-5').removeClass("active");
      $('#nav-6').removeClass("active");
      $('#nav-7').removeClass("active");
      $('#nav-8').removeClass("active");
      $('#nav-9').removeClass("active");
      $('#nav-10').removeClass("active");
      $('#nav-0').addClass("active");

// sidebar

      $('#sidebar-1').removeClass("active");
      $('#sidebar-2').removeClass("active");
      $('#sidebar-3').removeClass("active");
      $('#sidebar-4').removeClass("active");
      $('#sidebar-5').removeClass("active");
      $('#sidebar-6').removeClass("active");
      $('#sidebar-7').removeClass("active");
      $('#sidebar-8').removeClass("active");
      $('#sidebar-9').removeClass("active");
      $('#sidebar-0').addClass("active");

// theme color

      $('#main-1').removeClass("active");
      $('#main-2').removeClass("active");
      $('#main-3').removeClass("active");
      $('#main-0').addClass("active");


// floating header
      $('#floating-header').removeClass("floating-cls");
      $('#float-on').removeClass("change-float");
      $('#float-off').addClass("change-float");
   });
});
// end



$(window).resize(function() {
   if ($(window).width() < 992) {
      $("#setting-card").addClass('active');
   }

});

if ($(window).width() < 992) {
   $("#setting-card").addClass('active');
}

$(window).resize(function() {
   if ($(window).width() < 1200) {
      $('#floating-header').removeClass("floating-cls");
      $('#float-on').removeClass("change-float");
      $('#float-off').addClass("change-float");   }

});


$(window).resize(function() {
   if ($(window).width() > 992) {
      $("#setting-card").removeClass('active');
   }

});

if ($(window).width() > 992) {
   $("#setting-card").removeClass('active');
}




// setting card
$(document).ready(function(){

   $("#setting-btn").on('click', function () {

      $(this).closest("#setting-card").toggleClass("active");
   });
   $('a.clr-hvr').click(function() {
      $('a.clr-hvr').removeClass("active");
      $(this).addClass("active");
   });
   $('a.nav-chang-color').click(function() {
      $('a.nav-chang-color').removeClass("active");
      $(this).addClass("active");
   });
});
// end
// logo color

$(document).ready(function(){
   $('#nav-0').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#1b93e1","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#1b93e1"});

   });
   $('#nav-1').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#333333","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#333333"});

   });
   $('#nav-2').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#37474f","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#37474f"});


   });
   $('#nav-5').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#37474f","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#37474f"});


   });
   $('#nav-3').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#4caf50","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#4caf50"});


   });
   $('#nav-6').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#008c7f","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#008c7f"});

   });
   $('#nav-7').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#465487","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#465487"});

   });
   $('#nav-8').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#501D89","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#501D89"});
      // $('.main-sidebar nav .sidebar-menu li a').hover(function () {
      //    $(this).css("background-color", "#501D89");
      // }, function(){
      //    $(this).css("background-color", "transparent");
      // });
      // $(".main-sidebar nav .sidebar-menu li").click(function () {
      //    $(this).toggleClass("add-color8");
      // });
   });
   $('#nav-9').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#773d4a","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#773d4a"});


   });
   $('#nav-10').on('click',function () {
      $('.main-sidebar .logo').css({"background-color": "#9B9B9B","border-bottom": "none"});
      $('.main-sidebar nav .nav-header').css({"border-bottom": "none", "background-color": "#9B9B9B"});
   });
});


// end
$(document).ready(function () {
   $('[data-toggle="tooltip"]').tooltip();

   $(".sidebar-menu li .drop-link").on('click', function () {
      $(this).toggleClass("active");
   });
   $(".main-sidebar nav .sidebar-menu.submenu li a").on('click',function () {
      $(".main-sidebar nav .sidebar-menu.submenu li a.active").removeClass("active");
      $(this).addClass("active");
   });



   $(".menu-toggle").on('click', function () {
      $(".sidebar-menu").toggleClass("display-menu");
   });

   if ($(window).width() < 1200) {
      $(".sidebar-menu li a").on('click', function () {
         if($(this).hasClass("drop-link")){

         }else{
            $(".sidebar-menu").removeClass("display-menu");
            $(".main-sidebar li a").removeClass("active");
            $(".main-sidebar nav .sidebar-menu.submenu").removeClass("in");
         }

      });
   };


   $(window).resize(function() {
      if ($(window).width() < 1200) {
         $(".sidebar-menu li a").on('click', function () {
            if($(this).hasClass("drop-link")){

            }else{
               $(".sidebar-menu").removeClass("display-menu");
               $(".main-sidebar li a").removeClass("active");
               $(".main-sidebar nav .sidebar-menu.submenu").removeClass("in");
            }

         });
      }

   });




   /*full calendar*/
   $('#calendar').fullCalendar({
      defaultDate: '2016-06-12',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
         {
            title: 'All Day Event',
            start: '2016-06-01'
         },
         {
            title: 'Long Event',
            start: '2016-06-07',
            end: '2016-06-10'
         },
         {
            id: 999,
            title: 'Repeating Event',
            start: '2016-06-09T16:00:00'
         },
         {
            id: 999,
            title: 'Repeating Event',
            start: '2016-06-16T16:00:00'
         },
         {
            title: 'Conference',
            start: '2016-06-11',
            end: '2016-06-13'
         },
         {
            title: 'Meeting',
            start: '2016-06-12T10:30:00',
            end: '2016-06-12T12:30:00'
         },
         {
            title: 'Lunch',
            start: '2016-06-12T12:00:00'
         },
         {
            title: 'Meeting',
            start: '2016-06-12T14:30:00'
         },
         {
            title: 'Happy Hour',
            start: '2016-06-12T17:30:00'
         },
         {
            title: 'Dinner',
            start: '2016-06-12T20:00:00'
         },
         {
            title: 'Birthday Party',
            start: '2016-06-13T07:00:00'
         },
         {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: '2016-06-28'
         }
      ]
   });



});



function pscroll() {
   var el = document.querySelector('.scroll-bar');
   Ps.initialize(el);
};

















