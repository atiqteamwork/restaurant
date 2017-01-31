@extends('layouts.main')
@section('title', 'Index Page Hello Food')

@section('content')

<div class="outer_body no-padding">
    <div class="detail-bg">
        
    </div>
    <!--heading-res-nam-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-res-nam-->

    <div class="container">
        <div class="row">
            <!--detail sidebar-->
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
            <!--detail sidebar end-->
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
</div>

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
