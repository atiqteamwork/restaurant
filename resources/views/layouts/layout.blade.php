<!DOCTYPE html>
<html lang="en" data-ng-app="myApp">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--lib-->
    <link rel="stylesheet" href="assets/css/lib.css"/>
    <!--app styles-->
    <link rel="stylesheet" href="assets/css/app.css"/>
    <link rel="icon" href="assets/images/fav.png" type="image/x-icon"/>
    @yield('styles')
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>
<body data-ng-controller="loadingbar" onload="pscroll()">
<div class="wrapper" data-ng-controller="mainController">

    <!--navigation bar-->
    @include("partials.sidebar")

    <!--right side content-->
    <div class="main-content">
        @include("partials.topbar")
        <div class="row">
            <!--announcements widget-->
            <div class="col-md-12">@yield('content')</div>
        </div>
        <footer>
            <div class="copyrights"> © Copyrights 2016 <a href="http://teamworktec.com/" target="_blank">Team Work</a> All Rights Reserved. </div>
        </footer>
    </div>
</div>


<!--jquery-->
<script src="assets/plugins/jquery/jquery-2.2.4.min.js"></script>
<!--lib-->
<script src="assets/js/lib.js"></script>

<script src="assets/js/app.js"></script>

<script>
    $('.data-table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
    $('.select2').select2();

</script>

@yield('script')





</body>
</html>


