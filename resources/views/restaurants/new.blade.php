@extends('layouts.layout')
@section('title', 'Add New Restaurant')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add New Restaurant</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">New Restaurant</div>
            <div class="panel-body">
            
           	@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
                <div class="alert alert-danger" id="alertdanger" style="display:none"><strong>Alert!</strong> <span></span></div>
                <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
                {{ Form::open( ['url' => 'admin/restaurant/add_new', 'files'=> true, 'id'=>'new_restaurant'] ) }}
                <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('city_id', 'City', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Select('city_id', $cities, null ,['class' => 'form-control select2', 'id' => 'cities'])}} </div>
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('logo', 'Logo')}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::File('logo')}} </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('banner', 'Banner')}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::File('banner')}} </div>
                    </div>
                </div>
                
                
                
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('title', 'Restaurant Name:', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('title','', ['class' => 'form-control', 'placeholder'=>'Enter Restaurant Name/Title', 'required'=>'required'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('description', 'Description:', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Description'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('email', 'Email Address', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Email('email','', ['class' => 'form-control', 'placeholder'=>'Email Address', 'required'=>'required'])}} </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('address', 'Address', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('address','', ['class' => 'form-control', 'placeholder'=>'Enter Address', 'required'=>'required'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('phone_primary', 'Primary Phone', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('phone_primary','', ['class' => 'form-control', 'placeholder'=>'Primary Phone', 'required'=>'required'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('phone_secondary', 'Secondary Phone', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('phone_secondary','', ['class' => 'form-control', 'placeholder'=>'Secondary Phone'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('cell', 'Cell Phone', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::Text('cell','', ['class' => 'form-control', 'placeholder'=>'Cell Phone'])}} </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('contact_person', 'Contact Person', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::text('contact_person','', ['class' => 'form-control', 'placeholder'=>'Contact Person'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('contact_phone', 'Contact Phone', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::number('contact_phone','', ['class' => 'form-control', 'placeholder'=>'Contact Phone'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('contact_email', 'Contact Email', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::email('contact_email','', ['class' => 'form-control', 'placeholder'=>'Contact Email'])}} </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('open_time', 'Opening Time', ["class" => "text-right"])}} </div>
                    <div class="col-sm-6">
                        <div class="form-group"> 
                        	<!--<input type="time" class="form-control" id='time' />-->
                            {{Form::time('open_time','', ['class' => 'form-control', 'placeholder'=>'12:00 pm', 'required'=>'required'])}}
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group"> <em> i.e 12:00 pm</em> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('close_time', 'Closing Time', ["class" => "text-right"])}} </div>
                    <div class="col-sm-6">
                        <div class="form-group"> {{Form::time('close_time','', ['class' => 'form-control', 'placeholder'=>'12:00 am', 'required'=>'required'])}} </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group"> <em>i.e 12:00 am</em> </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('is_takeaway_only', 'Restaurant Type', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::select('is_takeaway_only', ['true' =>'Takeaway Only', "false"=>'Delivery and Takeaway'],null ,['class' => 'form-control'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2">
                        <label class="text-right">Menu/Cuisine</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::select('menu_categories[]', $categories,null ,['class' => 'select2 form-control', 'data-select1', "multiple" => "multiple"])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2">
                        <label class="text-right">Areas</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::select('area_ids[]', [],null ,['class' => 'select2 form-control', 'data-select1', "multiple" => "multiple", 'id' => 'select-areas'])}} </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> 
                    	<!--{{Form::label('outof_area_charges', 'Outside Area Charges', ["class" => "text-right"])}} -->
                        </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::hidden('outof_area_charges','0', [])}} </div>
                    </div>
                </div>
                <hr>
                {{Form::submit('Save Restaurant',['class' => 'btn btn-primary'])}}
                <hr>
                {{ Form::close() }} </div>
        </div>
    </div>
</div>
@stop


@section('script') 
<!--jquery--> 
<script src="assets/plugins/jquery/jquery-2.2.4.min.js"></script> 
<script>
	$(document).ready(function () {	
		
		
		var city_id = $("#cities").val();			
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
		
		
		$("#cities").change(function() {	
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
		
		
		/*$("#new_restaurant").on("submit", function(){
			var formData = new FormData( $("#new_dish")[0] );
			
			$.ajax({
				type: "POST",
				url: "{{ url('admin/restaurant/add_new')}}",
				data: formData,
				contentType: false,
				processData: false,
				headers: {
							'X-CSRF-Token': $('input[name="_token"]').val(),
						},
				success: function (response) {
					if (response == 'Success') {
						$(".alert-success").html("New Restaurant Created!");
						
						var imover = setInterval(function(){
							location.href = "{{ url('admin/restaurants')}}";
						}, 2500);
						
					} else {
						$('html, body').animate({
							scrollTop: $( "#alertdanger" ).offset().top
						}, 500);
						$(".alert-danger span").html( response );
						$(".alert-danger").fadeIn(400);
					}
				}
			});
			
			return false;
		});*/
	});
</script> 
@stop