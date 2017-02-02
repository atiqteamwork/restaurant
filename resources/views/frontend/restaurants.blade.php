@extends('layouts.main')
@section('title', 'Index Page Hello Food')

@section('content')

<div class="outer_body no-padding">
    <!--start check_out_box-->
    <div class="check_out_box parallax-window" data-parallax="scroll" data-image-src="{{url('/')}}/assets/images/list-img-bg.png">
        <div class="wrapper-box">
            <h2>
                Order from {{count($restaurants)}} <span>RESTAURENT.</span>
            </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <!--end check_out_box-->

    <!--heading-line-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>McDonald's - Satyana can <span>deliver</span> to you at Madina Town (Faislabad)</h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-line-->
    <div class="container">
        <div class="crumbs">
            <h2 class="pull-left">Breadcrumbs</h2>
            <ol class="breadcrumb pull-right">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">Restaurants</li>
            </ol>
        </div>
    </div>

    <div class="container">
        <div class="row">
            
            <!--restaurent-list-box-->
            @if( !empty( $restaurants ) && count($restaurants) > 0 )
            	@foreach( $restaurants as $restaurant )
		            <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="restaurent-list-box box_border">
                            <div class="res-logo">
                                <img src="{{getenv('APP_URL')}}assets/images/restaurants/{{$restaurant->banner}}" alt="restaurent img">
                                <div class="overflow-outer">
                                    <div class="overflow-inner">
                                        <div class="deliver-mint"><a href="#">delivers in minutes</a></div>
                                        <div class="tak-div">
                                            <a href="#" class="tak-order"><i class="fa fa-check-circle"></i> Takeaway order</a>
                                            <br>
                                            <a href="#" class="del-order"><i class="fa {{$restaurant-> 	is_takeaway_only ? 'fa-check-circle' : 'fa-times-circle'}} "></i> deliver order</a>
        
                                        </div>
                                        <div class="next-btn"><a href="#"><i class="fa fa-angle-right"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <div class="pull-left detail-res">
                                    <h4><a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}">{{$restaurant->title}}</a></h4>
                                    <p>fried chicken,fast food</p>
                                </div>
                                <div class="pull-right">
                                        <!--Rating section will be here-->
                                        <a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}" class="btn btn-sm btn-success">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
            	@endforeach
            @endif
            <!--end restaurent-list-box-->
            
        </div>
    </div>
    <!--end heading-line-->

</div>

@stop


@section('contents')

<!--<div class="outer_body no-padding">
    <div class="detail-bg">
        
    </div>
    <!--heading-res-nam--
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-res-nam--

    <div class="container">
        <div class="row">
            <!--detail sidebar--
            <div class="col-md-2">
                <div class="detail-sidebar">
                    <nav class="navbar" id="sidebar_nav">
                        <h4>limited time offer</h4>
                        <ul class="nav">
                            <li><a href="#bahadur" class="page-scroll">2 bahadur meal</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--detail sidebar end--
            <div class="col-md-7">
                <div class="main-detail">
                    <div class="detail_box">
                        @foreach( $restaurants as $restaurant )
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <h4>{{$restaurant->title}}</h4>
                                <div class="small-detail">
                                    <p>{{$restaurant->address}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="cart-btn-box">
                                    <a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}" class="btn btn_cart" data-id="{{$restaurant->id}}">View <i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    
                </div>
            </div>

            <div class="col-md-3">
                <div class="cart-sidebar">
                    <div class="cart-sticker">
                        <h4><span class="pull-right"></span></h4>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>-->

@stop

@section('script')
	<script>
    	$(document).ready(function() {
            /*$(".btn_cart").click(function() {
                var obj = $(this);
				var rid = $(obj).attr("data-id");
							
            });*/
        });
    </script>
@stop
