@extends('layouts.main')
@section('title', 'Hello Food')

@section('content') 

<!--wrapper bg-->

<div class="wrapper_bg">
    <div class="wrapper-box">
        <h2>order <span>takeaway</span> or delivery now</h2>
        <p>Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.</p>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-9 col-sm-12 col-xs-12 col-md-offset-3"> {{ Form::open(array('url' => '/restaurants/find','id'=>'searchrestaurants')) }}
                    <div class="row">
                        <div class="col-md-3 col-sm-12 no-padding">
                            <div class="res-ser"> {{Form::Select('city', $cities, null, ['class' => 'search-res form-control', 'id' => 'city', 'multiple' => 'multiple',  'required' => 'required'])}} </div>
                        </div>
                        <div class="col-md-4 col-sm-12 no-padding">
                            <div class="form-group"> {{Form::Select('type', ['true' =>'Takeaway', 'false' => 'Delivery + Takeaway'], null, ['class' => 'search-type form-control', 'id' => 'type', 'multiple' => 'multiple', 'required' => 'required'])}} </div>
                        </div>
                        <div class="col-md-3 col-sm-12 no-padding">
                            <div class="form-group"> {{Form::Select('area', [], null, ['class' => 'search-area form-control', 'id' => 'select-areas', 'multiple' => 'multiple', 'required' => 'required'])}} </div>
                        </div>
                        <div class="col-md-2 col-sm-12 no-padding" >
                            <div class="search_btn"><a href="#">
                                <button class="btn btn-search">SEARCH</button>
                                </a></div>
                        </div>
                    </div>
                    {{ Form::close() }} </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script') 

<script>
	$(document).ready(function() {
				
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
		
		
    });
	
</script> 
@stop