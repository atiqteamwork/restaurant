@extends('layouts.main')
@section('title', 'Restaurants Page')

@section('content')
<div class="outer_body no-padding"> 
    <!--start check_out_box-->
    <div class="check_out_box parallax-window" data-parallax="scroll" data-image-src="{{url('/assets_front/images/list-img-bg.png')}}">
        <div class="wrapper-box">
            <h2> Order from {{count($restaurants)}} <span>RESTAURENT.</span> </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <!--end check_out_box--> 
    
    <!--heading-line-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2></h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-line-->
    <div class="container">
        <div class="crumbs">
            <h2 class="pull-left">Restaurants</h2>
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
                    <div class="res-logo"> <img src="{{getenv('APP_URL')}}assets/images/restaurants/{{$restaurant->banner}}" alt="restaurent img">
                        <div class="overflow-outer">
                            <div class="overflow-inner">
                                <div class="deliver-mint"><a href="#">delivers in 30 minutes</a></div>
                                <div class="tak-div"> <a href="javascript:;" class="tak-order"><i class="fa fa-check-circle"></i> Takeaway order</a> <br>
                                    <a href="javascript:;" class="del-order"><i class="fa {{$restaurant-> 	is_takeaway_only ? 'fa-check-circle' : 'fa-times-circle'}} "></i> deliver order</a> </div>
                                <div class="next-btn"><a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}"><i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="pull-left detail-res">
                            <h4><a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}">{{$restaurant->title}}</a></h4>
                            <p> 
                            	@foreach( $restaurant->Menus as $menus )
                                	{{$menus->category_title}},
                                @endforeach
                                
                                @foreach( $restaurant->Menus as $menus )
                                	{{$menus->category_title}},
                                @endforeach
                                @foreach( $restaurant->Menus as $menus )
                                	{{$menus->category_title}},
                                @endforeach
                            
                             </p>
                        </div>
                        <div class="pull-right"> 
                            <!--Rating section will be here--> 
                            <a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}" class="btn btn-sm btn-success">Select</a> </div>
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

@section('script') 
 
@stop 