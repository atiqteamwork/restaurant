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
    <link rel="stylesheet" href="assets_front/css/app.css">
    @yield('styles')
</head>
<body>
<!--start navigation bar-->
<section class="content">  </section>
@include("partials.mainnav")
<!--nav end-->
<!--wrapper bg-->

@yield('content')



<!--javascript files-->
<script src="assets_front/js/jquery.min.js"></script>
<!--bootstrap-->
<script src="assets_front/js/bootstrap.min.js"></script>
<!--select 2-->
<script src="node_modules/select2/dist/js/select2.js"></script>
<!--javascript files-->
<script src="assets_front/js/jquery.min.js"></script>
<!--app.js-->
<script src="assets_front/dist/app.js"></script>
@yield('script')
</body>
</html>