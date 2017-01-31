<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>Hello Food</title>
    <link rel="stylesheet" href="assets_front/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_front/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="assets_front/css/app.css">
</head>
<body>
<!--start navigation bar-->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="assets_front/images/res_logo.png" alt="logo"></a>
                        <span class="toggle-order-now hidden-lg hidden-md">
                            <a href="#" class="btn btn_order_now">ORDER NOW</a>
                        </span>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">About</a></li>
                <li><a href="#">Team</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Contact</a></li>
                <li class="visible-lg visible-md"><a href="#" class="btn btn_order_now">ORDER NOW</a></li>
            </ul>
        </div>
    </div>
</nav>
<!--nav end-->
<!--wrapper bg-->
<div class="wrapper_bg">
    <div class="wrapper-box">
        <h2>order <span>takeaway</span> or delivery now</h2>
        <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 no-padding">
                            <div class="res-ser">
                                <select class="search-res form-control" multiple="multiple">
                                    <option>Nevada</option>
                                    <option>Nevada</option>
                                    <option>Nevada</option>
                                    <option>Nevada</option>
                                    <option>Nevada</option>
                                    <option>Nevada</option>

                                </select>
                            </div></div>
                        <div class="col-md-5 col-sm-12 no-padding"> <div class="form-group">
                            <select class="search-area form-control" multiple="multiple" data-select1>
                                <option value="HI">Hawaii</option>
                                <option value="NV">Nevada</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2 col-sm-12 no-padding" >
                            <div class="search_btn"><a href="#"><button class="btn btn-search">SEARCH</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



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
</body>
</html>