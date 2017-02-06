<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="assets_front/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_front/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/perfect-scrollbar/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" href="node_modules/slick-slider/slick.css">
    <link rel="stylesheet" href="assets_front/css/app.css">
    @yield('styles')
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body data-spy="scroll">
<!--start navigation bar-->
@include("partials.mainnav")
<!--end nav-->
<!--outer_body-->
@yield('content') 
<!--end outer_body-->
<!-- start footer-->
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
<!--end footer-->
<!--javascript files-->
<script src="assets_front/js/jquery.min.js"></script>
<script src="assets_front/js/bootstrap.min.js"></script>
<script src="node_modules/parallax/parallax.min.js"></script>
<script src="node_modules/scroll-speed/scroll-speed-js.js"></script>
<script src="node_modules/slick-slider/slick.min.js"></script>
<script src="assets_front/dist/app.js"></script>
@yield('script')
<!--end -->
</body>
</html>