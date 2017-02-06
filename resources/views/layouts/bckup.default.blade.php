
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
        <!--right side content-->
        <div class="main-contents login-page">
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
        <hr class="line-1">
        <div class="skin-clr">
                <p class="heading-set">Logo Color</p>
                <ul class="sel-color">
                <li><a href="javascript:;"  data-toggle="tooltip" title="Light blue" id="nav-0" class="nav-chang-color active Def-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Night rider" id="nav-1" class="nav-chang-color lblack-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Atomic" id="nav-2" class="nav-chang-color bleachedcedar-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Light gray" id="nav-10" class="nav-chang-color light-gray-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="dark grayish" id="nav-9" class="nav-chang-color dark-grayish-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Brown" id="nav-5" class="nav-chang-color lbrown-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Green" id="nav-3" class="nav-chang-color green-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Teal" id="nav-6" class="nav-chang-color teal-sidebar"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="dark blue" id="nav-7" class="nav-chang-color mblue-logo"></a></li>
                <li><a href="javascript:;"  data-toggle="tooltip" title="Pink" id="nav-8" class="nav-chang-color pink-sidebar"></a></li>
            </ul>
            </div>
        <hr class="line-1">
        <div class="skin-clr">
                <p class="heading-set">Sidebar Color</p>
                <ul class="sel-color">
                <li><a href="javascript:;" data-toggle="tooltip" title="Night rider " id="sidebar-0" class="active clr-hvr Def-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Atomic" id="sidebar-5" class="clr-hvr bleachedcedar-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Blue gray" id="sidebar-6" class="clr-hvr bluegray-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Light gray" id="sidebar-3" class="clr-hvr light-gray-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="White" id="sidebar-1" class="clr-hvr White-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Brown"  id="sidebar-7" class="clr-hvr lbrown-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Dark red" id="sidebar-9" class="clr-hvr darkenred-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Teal" id="sidebar-2" class="clr-hvr teal-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="moderate blue" id="sidebar-8" class="clr-hvr mblue-sidebar"></a></li>
                <li><a href="javascript:;" data-toggle="tooltip" title="Pink" id="sidebar-4" class="clr-hvr pink-sidebar"></a></li>
            </ul>
            </div>
        <hr class="line-1">
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
<!-- DataTables -->
<script src="assets/plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/dataTables/dataTables.bootstrap.min.js"></script>
<!--lib--> 
<script src="assets/js/lib.js"></script> 
<script src="assets/js/custom.js"></script>

@yield('script')