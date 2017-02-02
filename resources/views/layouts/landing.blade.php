<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<base href="{{ getenv('APP_URL') }}" />
<title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="assets_front/css/bootstrap.min.css">
<link rel="stylesheet" href="assets_front/css/font-awesome.min.css">
<link rel="stylesheet" href="node_modules/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="node_modules/slick-slider/slick.css">
<link rel="stylesheet" href="assets_front/css/app.css">
@yield('styles')
</head>
<body>
<!--start navigation bar-->
<section class="content"> </section>
@include("partials.mainnav") 
<!--nav end--> 
<!--wrapper bg--> 

@yield('content') 

<!--end outer_body--> 

<!--javascript files--> 
<script src="assets_front/js/jquery.min.js"></script> 
<!--bootstrap--> 
<script src="assets_front/js/bootstrap.min.js"></script> 
<!--select 2--> 
<script src="node_modules/select2/dist/js/select2.js"></script> 
<!--javascript files--> 
<script src="assets_front/js/jquery.min.js"></script> 
<script src="node_modules/parallax/parallax.min.js"></script> 
<script src="node_modules/slick-slider/slick.min.js"></script> 
<!--app.js--> 
<script src="assets_front/dist/app.js"></script> 
@yield('script') 

<!--Start of Tawk.to Script--> 
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
	
    
});

</script> 
<!--End of Tawk.to Script-->

</body>
</html>