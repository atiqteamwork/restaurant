<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>@yield('title')</title>
    <!--Styles files-->
    <link rel="stylesheet" href="assets_front/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_front/css/font-awesome.min.css">
    <!--perfect-scrollbar-->
    <link rel="stylesheet" href="node_modules/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <!--Slick-->
    <link rel="stylesheet" href="node_modules/slick-slider/slick.css">
    <!--selectize-->
    <link rel="stylesheet" href="node_modules/selectize.js-master/dist/css/selectize.css">
    <!--app-->
    <link rel="stylesheet" href="assets_front/css/app.css">
    <!--end here-->
    @yield('styles')
</head>
<body>

<section class="content"> </section>
@include("partials.mainnav") 
<!--nav end--> 
<!--wrapper bg--> 

@yield('content') 

<footer class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="address">
                    <i class="fa fa-phone"></i>
                    <p>3333 222 1111 <br>
                        1 800 1234 Hello</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address">
                    <i class="fa fa-envelope-o"></i>
                    <p>hello@huge.com <br>
                        Info@huge.com</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address">
                    <i class="fa fa-map-marker"></i>
                    <p>99 Barnard St - Suite 111 <br>
                        United States - GA 22222 </p>
                </div>
            </div>
            <div class="col-sm-12">
                <span class="social-icon">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-twitter-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-pinterest-square"></i></a>
                </span>
            </div>
            <div class="col-sm-12">
                <div class="copyright">
                    <h4>&copy; <a href="#">Hello food</a></h4>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--end outer_body--> 









<!--javascript files--
<script src="assets_front/js/jquery.min.js"></script>
<!--bootstrap--
<script src="assets_front/js/bootstrap.min.js"></script>
<!--jquery-easing--
<script src="node_modules/scrolling-effect/jquery-easing.min.js"></script>
<!--slick.min.js--
<script src="node_modules/slick-slider/slick.min.js"></script>
<!--perfect-scrollbar--
<script src="node_modules/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>
<!--Selectize--
<script src="node_modules/selectize.js-master/dist/js/standalone/selectize.min.js"></script>
<!--end Selectize--
<script src="node_modules/parallax/parallax.min.js"></script>

<!--app js--
<script src="assets_front/dist/app.js"></script>

<script type="text/javascript">
    /*var xhr;
    var select_city, $select_city;

    $select_state = $('#select-restaurent').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                    url: 'http://www.corsproxy.com/api.sba.gov/geodata/primary_city_links_for_state_of/' + value + '.json',
                    success: function(results) {
                        select_city.enable();
                        callback(results);
                    },
                    error: function() {
                        callback();
                    }
                })
            });
        }
    });
    $select_state = $('#select-type').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                    url: 'http://www.corsproxy.com/api.sba.gov/geodata/primary_city_links_for_state_of/' + value + '.json',
                    success: function(results) {
                        select_city.enable();
                        callback(results);
                    },
                    error: function() {
                        callback();
                    }
                })
            });
        }
    });
    $select_state = $('#select-area').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                xhr && xhr.abort();
                xhr = $.ajax({
                    url: 'http://www.corsproxy.com/api.sba.gov/geodata/primary_city_links_for_state_of/' + value + '.json',
                    success: function(results) {
                        select_city.enable();
                        callback(results);
                    },
                    error: function() {
                        callback();
                    }
                })
            });
        }
    });
</script>

<!--Start of Tawk.to Script--
 
<script type="text/javascript">

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script");
var s0=document.getElementsByTagName("script")[0];

s1.async=true;
s1.src='https://embed.tawk.to/58917f5fcbbbd10a6560b862/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');

s0.parentNode.insertBefore(s1,s0);


})();


$(document).ready(function() {
	var mover = setInterval(function(){
		
		$("iframe").each(function(index, element) {
			var obj = $(this);
			$(obj).contents().find("body").find("#popoutChat").hide(1);
			var html = $(obj).contents().find("body").find(".thin").next("b").text();
			
			if( html == "tawk.to" )
			{
				html = "Teamwork";
			}
			
			$(obj).contents().find("body").find(".thin").next("b").text(html);

			
		});	
	}, 10);
	
    
});*/

</script>-->

@yield('script')




</body>
</html>