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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <label for="city">Select City</label>
                        <p class="city_error"></p>
                        {{Form::Select('city', $cities, null, ['class' => 'search-res form-control search-now', 'id' => 'city', 'required' => 'required'])}} </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="select-areas">Select Area</label>
                        <p class="area_error"></p>
                        {{Form::Select('area', [], null, ['class' => 'search-area form-control search-now', 'id' => 'select-areas', 'required' => 'required'])}} </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="type">Type (Takeaway/Delivery)</label>
                        <p class="type_error"></p>
                        {{Form::Select('type', ['true' =>'Takeaway', 'false' => 'Delivery + Takeaway'], null, ['class' => 'search-type form-control search-now', 'id' => 'type', 'required' => 'required'])}} </div>
                </div>
            </div>
        </div>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <div class="row restaurants-list"> 
            
            <!--restaurent-list-box--> 
            @if( !empty( $restaurants ) && count($restaurants) > 0 )
            @if( !isset( $order_type ) )
            <?php $order_type = "Takeaway"; ?>
            @endif
            
            @if( !isset( $area_id ) )
            <?php $area_id = 0 ?>
            @endif
            @foreach( $restaurants as $restaurant )
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="restaurent-list-box box_border">
                    <div class="res-logo"> <img src="{{getenv('APP_URL')}}assets/images/restaurants/{{$restaurant->banner}}" alt="restaurent img">
                        <div class="overflow-outer">
                            <div class="overflow-inner">
                                <div class="deliver-mint"><a href="#">delivers in 30 minutes</a></div>
                                <div class="tak-div"> <a href="javascript:;" class="tak-order"><i class="fa fa-check-circle"></i> Takeaway order</a> <br>
                                    <a href="javascript:;" class="del-order"><i class="fa {{$restaurant-> 	is_takeaway_only ? 'fa-check-circle' : 'fa-times-circle'}} "></i> deliver order</a> </div>
                                <div class="next-btn"><a class="open_page" href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}"><i class="fa fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="detail">
                        <div class="pull-left detail-res">
                            <h4><a class="open_page" href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}">{{$restaurant->title}}</a></h4>
                            <p>fried chicken,fast food</p>
                        </div>
                        <div class="pull-right"> 
                            <!--Rating section will be here--> 
                            <a href="search/{{$restaurant->id}}/{{urlencode($restaurant->title). "+".urlencode($order_type)}}/{{$area_id}}" class="btn btn-sm btn-success open_page">Select</a> </div>
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
<script> 
 	$(document).on("click", ".open_page", function()
	{
		var city_id = $("#city").val();
		var area_id = $("#select-areas").val();
		var type_id = $("#type").val();	
			
		if (typeof city_id === "undefined" || city_id == null) {
			$(".city_error").text("Select City").focus();		
			return false;
		}
		
		if (typeof area_id === "undefined" || area_id == null) { 
			$(".area_error").text("Select Area").focus();
			return false; 
		}
		
		if (typeof type_id === "undefined" || type_id == null) { 
			$(".type_error").text("Select Type").focus();
			return false; 
		}
			
			
	});
 
 	$(document).ready(function() 
	{
		/**
		*	Check for Filters on Pageload or Refresh
		*/
		var city_id = $("#city").val();
		var area_id = $("#select-areas").val();
		var type_id = $("#type").val();
		
		show_restaurants(city_id, area_id, type_id);
		
		$(".open_page").click(function(){
			var city_id = $("#city").val();
			var area_id = $("#select-areas").val();
			var type_id = $("#type").val();	
			
			if (typeof city_id === "undefined" || city_id == null) { return false; }
			if (typeof area_id === "undefined" || area_id == null) { return false; }
			if (typeof type_id === "undefined" || type_id == null) { return false; }
		});
		
		
        /**
		*	Get Areas According to City
		*/
		$("#city").change(function() {	
			var city_id = $(this).val();
						
			$.ajax({
				type: 'POST',
				url: "{{url('c/get_city_areas')}}",
				data:{
					'city_id': city_id,
					'_token': '{{csrf_token()}}'
				},
				success: function (response) {
					$("#select-areas").html(response);
				},
				error:function () {
					
				}
			});
			
        });
		
		$(".search-now").change(function() 
		{	
			var city_id = $("#city").val();
			var area_id = $("#select-areas").val();
			var type_id = $("#type").val();
			show_restaurants(city_id, area_id, type_id);
        });
    });
	
	
	
	
	/**
	 *
	 */
	function show_restaurants(city_id, area_id, type_id)
	{	
		if (typeof city_id === "undefined" || city_id == null) { city_id = 0; }
		if (typeof area_id === "undefined" || area_id == null) { area_id = 0; }
		if (typeof type_id === "undefined" || type_id == null) { type_id = false; }
					
		$.ajax({
			type: 'POST',
			url: "{{url('html/restaurants/get_by_city')}}",
			data:{
				'city_id': city_id,
				'area_id': area_id,
				'type_id': type_id,
				'_token': '{{csrf_token()}}'
			},
			success: function (response) {
				$(".restaurants-list").html(response);
			},
			error:function (responseData) {
				$(".restaurants-list").html(responseData.responseText);
			}
		});
		
		return false;
	}
 </script> 
@stop 