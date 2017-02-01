@if( !isset( Auth::user()->id ))
  <script>
    window.location.href = "{{ url('/login')}}";
  </script>
@endif

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
        <div class="row" id="floating-header">
            <div class="col-sm-4">
                <!--<div class="top-widgets orangeBG">
                    <div class="action-icons">
                        <ul class=" list-unstyled noPadding noMargin">
                            <li class="">
                                <a href="#" onclick="return false" data-toggle="dropdown" >
                                    <i class="fa fa-tasks">
                                        <span class="redBG">9</span>
                                    </i>
                                </a>
                                <ul class="list-unstyled dropdown-menu action-dropdown noMargin">
                                    <li class="drop-header redBG">
                                        <span>9 new tasks</span>
                                    </li>
                                    <li><a href="#" onclick="return false">New Applicatin Release</a></li>
                                    <li><a class="unread" href="#" onclick="return false">Update contacts</a></li>
                                    <li><a href="#" onclick="return false">Application Development</a></li>
                                    <li><a href="#" onclick="return false">Delete Old User</a></li>
                                    <li><a class="unread" href="#" onclick="return false">Generate Salary Slips</a></li>
                                    <li><a href="#" onclick="return false">Remove bugs from project</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#" onclick="return false" data-toggle="dropdown" >
                                    <i class="fa fa-envelope-o">
                                        <span class="blueBG">4</span>
                                    </i>
                                </a>
                                <ul class="dropdown-menu action-dropdown list-unstyled email-drop noMargin">
                                    <li class="drop-header blueBG">
                                        <span>4 new messages</span>
                                    </li>
                                    <li>
                                        <a href="#" onclick="return false">
                                            <img src="assets/images/avatar01.png" alt="avatar">
                                            <div class="email-cont">
                                                <strong>Aamish S</strong>
                                                Sent you direct message
                                                <span class="time-stat">Just now</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="unread clearfix" href="#" onclick="return false">
                                            <img src="assets/images/avatar02.png" alt="avatar">
                                            <div class="email-cont">
                                                <strong>Jannie Jane</strong>
                                                lorem lipsum lipset
                                                <span class="time-stat">1 hour ago</span>
                                            </div>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" onclick="return false">
                                            <img src="assets/images/avatar03.png" alt="avatar">
                                            <div class="email-cont">
                                                <strong></strong>
                                                lorem lipsum lipset
                                                <span class="time-stat">8 hour ago</span>
                                            </div>

                                        </a>
                                    </li>


                                    <li>
                                        <a href="#" onclick="return false">
                                            <img src="assets/images/avatar03.png" alt="avatar">
                                            <div class="email-cont">
                                                <strong></strong>
                                                lorem lipsum lipset
                                                <span class="time-stat">8 hour ago</span>
                                            </div>

                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li>
                                <a href="#" onclick="return false" data-toggle="dropdown">
                                    <i class="fa fa-bell-o">
                                        <span class="greenBG">2</span>
                                    </i>
                                </a>
                                <ul class="list-unstyled dropdown-menu action-dropdown noMargin">
                                    <li class="drop-header greenBG">
                                        <span>2 new alerts</span>
                                    </li>
                                    <li><a href="#" onclick="return false">New Applicatin Release</a></li>
                                    <li><a class="unread" href="#" onclick="return false">Update contacts</a></li>
                                    <li><a  href="#" onclick="return false">Application Development</a></li>
                                    <li><a href="#" onclick="return false">Delete Old User</a></li>
                                    <li><a class="unread" href="#" onclick="return false">Generate Salary Slips</a></li>
                                    <li><a href="#" onclick="return false">Remove bugs from project</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>-->
            </div>

            <div class="col-sm-4 hidden-xs">
                <!--<div class="top-widgets redBG">
                    <div class="search-top-widget">
                        <form role="search">
                            <div class="input-group noMargin">
                                <input type="text" class="form-control" placeholder="Search">
                                <a href="javascript:;" class="input-group-addon"><i class="fa fa-search"></i> </a>
                            </div>
                        </form>
                    </div>
                </div>-->
            </div>
            
            <div class="col-sm-4">
                <!--<div class="top-widgets blueBG">
                    <div class="profile-widget">
                        <a href="#" onclick="return false" data-toggle="dropdown">
                            <i class="fa fa-user user-pic"></i>
                            <i class="user-name">
                            	@if( isset( Auth::user()->id) )
                                {{Auth::user()->full_name}}
                                @endif
                            
                            </i>
                            <i class="fa fa-gear user-setting"></i>
                        </a>
                        <ul class="list-unstyled dropdown-menu user-setting-drop action-dropdown noMargin">
                            <li class="drop-header orangeBG">
                                <span>User Setting</span>
                            </li>
                            <li><a href="#/profile"><i class="fa fa-user"></i> My Profile </a></li>
                            <li><a class="unread" href="#/mailbox2"><i class="fa fa-envelope-o"></i> My Inbox</a></li>
                            <li><a  href=""><i class="fa fa-tasks"></i> My Tasks</a></li>
                            <li><a href=""><i class="fa fa-bell"></i> My Alerts</a></li>
                            <li><a href=""><i class="fa fa-gear"></i> Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a class="unread" href=""><i class="fa fa-sign-out"></i> Log Out</a></li>
                            <li><a href="javascript:;"><i class="fa fa-lock"></i> Lock Screen</a></li>
                        </ul>

                    </div>


                </div>-->
            </div>
        </div>
        <div class="page-links">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" onclick="return false">Home</a> <i class="fa fa-angle-right"></i></li>
            </ol>
        </div>





        <!-- <div data-ng-view> </div>-->
       
        

        <footer>
            <div class="copyrights">
                © Copyrights 2016 <a href="http://teamworktec.com/" target="_blank">Team Work</a> All Rights Reserved.
            </div>
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
    <div class="setting-btn">
        <a  class="setting-box" id="setting-btn">
            <i class="fa fa-gear icon-rotate"></i>
        </a>
    </div>
    <div class="config-box">
        <div class="name-bar">Layout Options</div>
        <hr class="line-1">
        <div class="float-header layout-mode text-center">
            <p class="heading-set">Floating Header</p>
            <div class="form-check">

                <div class="btn-group" data-toggle="buttons">
                    <label class="form-check-label floating-header btn btn-01" id="float-on">
                        On
                    </label>
                <label class="form-check-label floating-header btn btn-02 change-float" id="float-off">
                    Off
                </label>
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
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="l-size btn white-clr" id="main-1">
                        <input type="radio" name="options" id="white-1">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="l-size btn main-clr1" id="main-2">
                        <input type="radio" name="options" id="main-change-1">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
                    <label class="l-size btn main-clr2" id="main-3">
                        <input type="radio" name="options" id="main-change-2">
                        <span class="glyphicon glyphicon-ok"></span>
                    </label>
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
        <div class="reset-btn">
            <button class="btn btn-reset" id="reset-changes">RESET</button>
        </div>
    </div>
</div>
    <!--end-->
    <!--jquery-->
    <script src="assets/plugins/jquery/jquery-2.2.4.min.js"></script>
    <!--lib-->
    <script src="assets/js/lib.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>