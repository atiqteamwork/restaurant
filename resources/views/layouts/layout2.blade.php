<!DOCTYPE html>
<html lang="en" data-ng-app="myApp">
    <head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    <!--Bootstrap-->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css"/>
    <!--lib-->
    <link rel="stylesheet" href="assets/css/lib.css"/>
    <link rel="stylesheet" href="assets/node_modules/select2/dist/css/select2.min.css"/>
    
    <!--app styles-->
    <link rel="stylesheet" href="assets/css/app.css"/>
    <link rel="icon" href="assets/images/fav.png" type="image/x-icon"/>
	    <!-- Data table -->
    <link rel="stylesheet" href="assets/dataTables/dataTables.bootstrap.min.css">
        
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    </head>
    <body data-ng-controller="loadingbar" onload="pscroll()">
<div class="wrapper" data-ng-controller="mainController"> 
        
        <!--navigation bar--> 
        @include("partials.sidebar"); 
        
        <!--right side content-->
        <div class="main-content">
        <div class="row"> 
                <!--announcements widget-->
                <div class="col-md-12">@yield('content')</div>
            </div>
        <footer>
                <div class="copyrights"> © Copyrights 2016 <a href="http://teamworktec.com/" target="_blank">Team Work</a> All Rights Reserved. </div>
            </footer>
    </div>
    </div>
<div class="modal fade" id="action-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Action Title</h4>
            </div>
                <div class="modal-body">
                <form>
                        <div class="form-group">
                        <label for="field1">Field 1</label>
                        <input type="text" class="form-control" id="field1" placeholder="Field 1">
                    </div>
                        <div class="form-group">
                        <label for="field2">Field 2</label>
                        <input type="text" class="form-control" id="field2" placeholder="Field 2">
                    </div>
                        <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                    </div>
                    </form>
            </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
    </div>
    </div>

<!--setting button-->
<div id="setting-card" style="display:none !important;">
        <div class="setting-btn"> <a  class="setting-box" id="setting-btn"> <i class="fa fa-gear icon-rotate"></i> </a> </div>
        <div class="config-box">
        <div class="name-bar">Layout Options</div>
        <hr class="line-1">
        <div class="float-header layout-mode text-center">
                <p class="heading-set">Floating Header</p>
                <div class="form-check">
                <div class="btn-group" data-toggle="buttons">
                        <label class="form-check-label floating-header btn btn-01" id="float-on"> On </label>
                        <label class="form-check-label floating-header btn btn-02 change-float" id="float-off"> Off </label>
                    </div>
            </div>
            </div>
        <hr class="line-1">
        <div class="layout-mode">
                <p class="heading-set">Theme Color</p>
                <div class="theme-ch text-center">
                <div class="btn-group" data-toggle="buttons">
                        <label class="l-size btn lDef-clr active" id="main-0">
                        <input type="radio" name="options" id="def-1" >
                        <span class="glyphicon glyphicon-ok"></span> </label>
                        <label class="l-size btn white-clr" id="main-1">
                        <input type="radio" name="options" id="white-1">
                        <span class="glyphicon glyphicon-ok"></span> </label>
                        <label class="l-size btn main-clr1" id="main-2">
                        <input type="radio" name="options" id="main-change-1">
                        <span class="glyphicon glyphicon-ok"></span> </label>
                        <label class="l-size btn main-clr2" id="main-3">
                        <input type="radio" name="options" id="main-change-2">
                        <span class="glyphicon glyphicon-ok"></span> </label>
                    </div>
            </div>
            </div>
        
        <div class="reset-btn">
                <button class="btn btn-reset" id="reset-changes">RESET</button>
            </div>
    </div>
    </div>
<!--end--> 
</body>
</html>
<!--jquery--> 
<script src="assets/plugins/jquery/jquery-2.2.4.min.js"></script> 

<script src='assets/plugins/perfect-scrollbar/js/perfect-scrollbar.min.js'></script>

<script src='assets/plugins/dataTables/dataTables.min.js'></script>

<script src='assets/plugins/dataTables/dataTables.bootstrap.min.js'></script>

<script src='assets/plugins/bootstrap/js/bootstrap.min.js'></script>

<script src='assets/plugins/bootstrap-switch-master/dist/js/bootstrap-switch.min.js'></script>

<script src='assets/plugins/angularjs/angular.js'></script>

<script src='assets/plugins/angularjs/angular-route.min.js'></script>

<script src='assets/plugins/angularjs/ng-map.min.js'></script>

<script src='assets/plugins/angularjs/angular-animate.min.js'></script>

<script src='assets/node_modules/amcharts/dist/amcharts.js'></script>

<script src='assets/node_modules/amcharts/dist/serial.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxcore.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxdatetimeinput.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxbuttons.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxscrollbar.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxcalendar.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxmaskedinput.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxdata.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxrangeselector.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxeditor.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxlistbox.js'></script>

<script src='assets/plugins/jqwidgets/scripts/jqxdropdownlist.js'></script>

<script src='assets/plugins/jqwidgets/scripts/globalize.js'></script>

<script src='assets/plugins/morris/raphael-min.js'></script>

<script src='assets/plugins/morris/morris.js'></script>

<script src='assets/plugins/wow/wow.js'></script>

<script src='assets/plugins/fullcalendar/lib/moment.min.js'></script>

<script src='assets/plugins/fullcalendar/lib/jquery-ui.custom.min.js'></script>

<script src='assets/plugins/fullcalendar/fullcalendar.min.js'></script>

<script src='assets/plugins/calendario/js/jquery.calendario.js'></script>

<script src='assets/plugins/calendario/js/data.js'></script>

<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek'></script>

<script src='assets/node_modules/lightbox2/dist/js/lightbox.min.js'></script>

<script src='assets/node_modules/select2/dist/js/select2.js'></script>

<script src='assets/plugins/formvalidation/dist/js/formValidation.min.js'></script>

<script src='assets/plugins/formvalidation/dist/js/framework/bootstrap.js'></script>

<script src='assets/plugins/drop-upload/dropupload.js'></script>

<script src='assets/node_modules/angular-chart.js/dist/Chart.min.js'></script>

<script src='assets/node_modules/angular-chart.js/dist/angular-chart.js'></script>

<script src='assets/plugins/angularjs/ng-google-chart.js'></script>

<script src='assets/plugins/sparkline/sparkline.min.js'></script>

<script src='assets/plugins/angular-mappy/build/angular-mappy.js'></script>

<script src='assets/plugins/angular-mappy/_mapdata.js'></script>

<script src='assets/node_modules/angular-loading-bar/build/loading-bar.js'></script>

<script src='assets/js/angularScript.js'></script>

<script src='assets/js/custom.js'></script>

@yield('script')