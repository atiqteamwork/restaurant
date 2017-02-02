@extends('layouts.landing')
@section('title', 'Hello Food')

@section('content')
<div class="wrapper_bg">
<div class="wrapper-box">
        <h2>order <span>takeaway</span> or delivery now</h2>
        <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
        <div class="container">
            
            <div class="row">
                <div class="col-md-offset-2 col-md-9 col-sm-12 col-xs-12 col-md-offset-3">
                    {{ Form::open(array('url' => '/restaurants/find','id'=>'searchrestaurants')) }}
                    
                    <div class="row">
                        <div class="col-md-3 col-sm-12 no-padding">
                            <div class="res-ser">
                            	{{Form::Select('city', $cities, null, ['class' => 'search-res form-control', 'id' => 'city', 'multiple' => 'multiple', 'required' => 'required'])}}
                            </div></div>
                            
                        <div class="col-md-4 col-sm-12 no-padding"> <div class="form-group">
                        	{{Form::Select('type', ['true' =>'Takeaway', 'false' => 'Delivery + Takeaway'], null, ['class' => 'search-type form-control', 'id' => 'type', 'multiple' => 'multiple', 'required' => 'required'])}}
                        </div>
                        </div>
                        
                        <div class="col-md-3 col-sm-12 no-padding"> <div class="form-group">
                        	{{Form::Select('area', [], null, ['class' => 'search-area form-control', 'id' => 'areas', 'multiple' => 'multiple', 'required' => 'required'])}}
                        </div>
                        </div>
                        
                        <div class="col-md-2 col-sm-12 no-padding" >
                            <div class="search_btn"><a href="#"><button class="btn btn-search">SEARCH</button></a></div>
                        </div>
                    </div>
                    
                    {{ Form::close() }}
                    
                </div>
            </div>
            
        </div>
    </div>
</p>
@stop
@section('script')
<script>
	$(document).ready(function() {
		
		/**
		*	
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
					$("#areas").html(response);
				},
				error:function () {
					
				}
			});
        });
		
		
		
		//var test = $("#restaurant_id").val();		
		
		/**
		*
		*
        $('#restaurant_text').keyup(function () {
			var keyword = $(this).val();
			var len		= keyword.length;
			
			if( len >= 3) {
				$.ajax({
					type: 'POST',
					url: "{{url('c/get_restaurants')}}",
					data:{
						'keyword': keyword,
						'_token': '{{csrf_token()}}'
					},
					success: function (response) {
						$("#restaurants").html(response);
					},
					error:function () {
						
					}
				});
			}
		});
		
		
		/**
		*	
		*
		$("#restaurants").change(function() {			
			var restaurant_id = $(this).val();
			
			$.ajax({
				type: 'POST',
				url: "{{url('c/get_restaurant_areas')}}",
				data:{
					'restaurant_id': restaurant_id,
					'_token': '{{csrf_token()}}'
				},
				success: function (response) {
					$("#areas").html(response);
				},
				error:function () {
					
				}
			});
        });
		
		
		/**
		*
		*
		$("#search_dishes").on("submit", function(){
	
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'), // "{{url('c/get_restaurants')}}",
				data:$(this).serialize(),
				success: function (response) {
					alert( "Test" );
				},
				error:function () {
					alert("Some error");
				}
			});
			
			
			return false;	
		})*/
		
    });
	
</script>
@stop