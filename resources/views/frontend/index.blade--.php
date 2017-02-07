<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>Hello Food</title>
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
<div class="wrapper_bg parallax-window" data-parallax="scroll" data-image-src="assets_front/images/index_bg.jpg">
    <div class="wrapper-box">
        <h2>order <span>takeaway</span> or delivery now</h2>
        <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
        <div class="container">
        <div class="search_boxs">
            <!--search_boxs-->
        <div class="row">
                <div class="col-md-offset-2 col-md-8 col-sm-12 col-xs-12 col-md-offset-2">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 no-padding">
                            <div class="select-res">
                                <select id="select-restaurent" placeholder="Select/type city...">
                                    <option value="">Select/type city...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 no-padding">
                            <div class="select-type">
                                <select id="select-type" placeholder="select type...">
                                    <option value="">select type...</option>
                                    <option value="TAK">Takeaway</option>
                                    <option value="DEl">Deliver</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-3 col-sm-12 no-padding">
                            <div class="select-area">
                                <select id="select-area" placeholder="Select/type Area...">
                                    <option value="">Select/type area...</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-2 col-sm-12 no-padding" >
                            <div class="search_btn"><a href="#"><button class="btn btn-search">SEARCH</button></a></div>
                        </div>
                        </div>
                    </div>

                </div>
            <!--end here-->
            </div>
        </div>
    </div>
</div>
<!--heading line-->
<div class="heading-line">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>McDonald's - Satyana can <span>deliver</span> to you at Madina Town (Faislabad)</h2>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="detail-sidebar">
                <nav class="navbar">
                    <h4>Category</h4>
                    <ul class="nav">
                        <li><a href="#bahadur" class="page-scroll">accoesser</a></li>
                        <li><a href="#food-dep" class="page-scroll">smart phone</a></li>
                        <li class="head-tag">Sandwiches</li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                        <li><a href="#" class="page-scroll">watch</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-9">
            <!--R_choice_box-->
            <section id="bahadur">
                <!--R_choice_box-->
                    <div class="R_choice_box box_border">
                        <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-1.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    </div>
                <!--end-->
            </section>
            <!--end-->
            <!--R_choice_box-->
            <section id="food-dep">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-2.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->

            <!--R_choice_box-->
            <section id="fdsfd">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-3.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->

            <!--R_choice_box-->
            <section id="lk">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-4.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->
            <!--R_choice_box-->
            <section id="dvs">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-1.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->
            <!--R_choice_box-->
            <section id="csd">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-2.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->

            <!--R_choice_box-->
            <section id="foodd-dep">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-3.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->

            <!--R_choice_box-->
            <section id="fosod-dep">
                <!--R_choice_box-->
                <div class="R_choice_box box_border">
                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="img-box">
                                <a href="#">
                                    <img class="img-responsive" src="assets_front/images/index-res-4.png" alt="restaurent logo">
                                </a>
                            </div>
                            <div class="detail-res">
                                <h4><a href="#">KFC -D ground</a></h4>
                                <p>fried chicken,fast food</p>
                                    <span class="star-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                        (663)
                                    </span>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="deliver-mint"><a href="#">delivers <span>in 60min</span></a></div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="tak-div">
                                <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> takeaway order</a>
                                <a href="#" class="del-order"><i class="fa fa-times-circle"></i> deliver order</a>

                            </div>
                        </div>
                        <div class="col-lg-1 col-md-6 col-sm-6">
                            <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <!--end-->
            </section>
            <!--end-->
        </div>
    </div>
</div>

<hr class="check-border">
<div class="container">
    <div class="logo-slider-heading text-center">
        <h2>our amazing clients </h2>
    </div>
</div>
<div class="container">
    <div class="row logo-slider">
        <div class="col-md-3">
            <a href="#">
                <div class="client-logo">
                    <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="client-logo">
                    <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="client-logo">
                    <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="client-logo">
                    <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive">
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="#">
                <div class="client-logo">
                    <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive">
                </div>
            </a>
        </div>
    </div>
</div>
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

<!--javascript files-->
<script src="assets_front/js/jquery.min.js"></script>

<!--bootstrap-->
<script src="assets_front/js/bootstrap.min.js"></script>
<!--jquery-easing-->

<script src="node_modules/parallax/parallax.min.js"></script>

<!--perfect-scrollbar-->
<script src="node_modules/perfect-scrollbar/js/scrollbar.jquery.min.js"></script>

<!--slick.min.js-->
<script src="node_modules/slick-slider/slick.min.js"></script>

<!--app js-->
<script src="assets_front/dist/app.js"></script>

<!--Selectize-->
<script src="node_modules/selectize.js-master/dist/js/standalone/selectize.min.js"></script>

<script>

$(document).ready(function () {
	$(".logo-slider").slick({
		dots: false,
		arrows: true,
		infinite: true,
		slidesToShow: 4,
		autoplaySpeed: 2000,
		autoplay: true,
		slidesToScroll: 1,
	
		responsive: [{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3
			}
		}, {
			breakpoint: 768,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2
			}
		}, {
			breakpoint: 480,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}]
	});
	
});


    var xhr;
    var select_city, $select_city;

    $select_state = $('#select-restaurent').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                alert("selectbox 1");
                
            });
        }
    });
    $select_state = $('#select-type').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                
            });
        }
    });
    $select_state = $('#select-area').selectize({
        onChange: function(value) {
            if (!value.length) return;
            select_city.disable();
            select_city.clearOptions();
            select_city.load(function(callback) {
                
            });
        }
    }); 
</script>
</body>
</html>