@extends('layouts.layout')
@section('title', 'Create Order')

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Create Order</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">New Order</div>
            <div class="panel-body">
            	<div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
                <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            
            	{{ Form::open(array('url' => 'admin/orders/add_new','id'=>'new_order')) }}
                        
                        <!--<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label class="text-right" style="color: #F00">Preparing Multiple Select box</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select class="basic-select2 form-control" multiple="multiple" data-select1>
                                        <option selected value="AK">Alaska</option>
                                        <option value="HI">Hawaii</option>
                                        <option selected="selected" value="CA">California</option>
                                        <option value="NV">Nevada</option>
                                        <option value="OR">Oregon</option>
                                        <option value="WA">Washington</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="CO">Colorado</option>
                                        <option value="ID">Idaho</option>
                                        <option value="MT">Montana</option>
                                        <option value="NE">Nebraska</option>
                                        <option value="NM">New Mexico</option>
                                        <option value="ND">North Dakota</option>
                                        <option value="UT">Utah</option>
                                        <option selected="selected" value="WY">Wyoming</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="IL">Illinois</option>
                                        <option value="IA">Iowa</option>
                                        <option value="KS">Kansas</option>
                                        <option value="KY">Kentucky</option>
                                        <option value="LA">Louisiana</option>
                                        <option value="MN">Minnesota</option>
                                        <option value="MS">Mississippi</option>
                                        <option value="MO">Missouri</option>
                                        <option value="OK">Oklahoma</option>  
                                    </select>
                                </div>
                            </div>
                        </div>-->
                        
                        <!--<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('', 'TEST:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	<input id="datetimepicker" class="form-control" autocomplete="off" type="text" value="Lorem Ipsum">
                                </div>
                            </div>
                        </div>-->
                        
                        
                        
                         <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('restaurant_id', 'Restaurant Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('restaurants_id', $restaurants,null ,['class' => 'form-control', 'id'=> 'restaurants_id'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('menu_type', 'Menu Type:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::label('type_dish', 'Dish', ["class" => "text-right"])}}
    	                            	{{Form::radio('menu_type', 'typedish', true, ['id'=>'type_dish', 'class'=>'menu_type'])}}
                                    
                                    {{Form::label('type_deal', 'Dish', ["class" => "text-right"])}}
	                                    {{Form::radio('menu_type', 'typedeal', false, ['id'=>'type_deal', 'class'=>'menu_type'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('dish_id', 'Dish Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('dish_id[]', [],null ,['class' => 'form-control basic-select2', 'id'=> 'dish_id', 'data-select1', 'multiple'=>'multiple'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('deal_id', 'Deal Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('deal_id[]', [],null ,['class' => 'form-control basic-select2', 'id'=> 'deal_id', 'data-select1', 'multiple'=>'multiple'])}}
                                </div>
                            </div>
                        </div>
                        
                        <hr />
                        
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('user_id', 'Deliver To:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('user_id', $users, null ,['class' => 'form-control', 'id'=> 'user_id'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="user_fetch">
                        	<div class="row">
                                <div class="col-sm-offset-1 col-sm-2">
                                    {{Form::label('address', 'Delivery Address:', ["class" => "text-right"])}}
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        {{Form::Text('address','', ['class' => 'form-control', 'placeholder'=>'Delivery Address', 'id'=> 'address', 'required'=>'required'])}}
                                    </div>
                                </div>
                            </div>
                        
                        	<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('phone', 'Phone:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('phone','', ['class' => 'form-control', 'placeholder'=>'Phone', 'id'=> 'phone', 'required'=>'required'])}}
                                </div>
                            </div>
                        </div>
                        
	                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('cell', 'Cell:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('cell','', ['class' => 'form-control', 'placeholder'=>'Cell', 'id'=> 'cell'])}}
                                </div>
                            </div>
                        </div>
                        
    	                    <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('email', 'Email Address:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::email('email','', ['class' => 'form-control', 'placeholder'=>'Email Address', 'id'=> 'email', 'required' => 'required'])}}
                                </div>
                            </div>
                        </div>
                        </div>
                        
                        <hr />
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('dated', 'Date &amp; Time:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::datetime('dated','', ['class' => 'form-control', 'placeholder'=>"2016-12-31 01:30:00", 'id' => 'dated'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('extra_charges', 'Any Extra Charges:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::text('extra_charges','', ['class' => 'form-control', 'placeholder'=>'Any Extra Charges', 'id'=> 'extra_charges'])}}
                                </div>
                            </div>
                        </div>
                        
                        
                        <!--<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('description', 'Description:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Description'])}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	
                                </div>
                            </div>
                        </div> -->
                        
                        
                        
                        <hr>
                        
                        
                        {{Form::submit('Create New Order',['class' => 'btn btn-primary'])}}
                                                
                        <hr>
                        
                    {{ Form::close() }}
            	
            </div>
        </div>
    </div>
</div>

@stop


@section('script')

<script>
	$(document).ready(function () {	
		
		if($("#type_deal").is(':checked')) { 
				$("#dish_id").parent().parent().parent().slideUp(200);
				$("#deal_id").parent().parent().parent().slideDown(200);
			} else {
				$("#deal_id").parent().parent().parent().slideUp(200);
				$("#dish_id").parent().parent().parent().slideDown(200);
			}
		
		$("#restaurants_id").change(function() {
			var obj = $(this);
			
			var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};

			$.ajax({
				type: "POST",
				url: "{{ url('/c/get_dishes_r')}}",
				data: dataString,
				success: function ( response ) {
					$("#dish_id").html( response );
				}
			});
			
			
			$.ajax({
				type: "POST",
				url: "{{ url('/c/get_deals_r')}}",
				data: dataString,
				success: function ( response ) {
					$("#deal_id").html( response );
				}
			});
			
			
			$(obj).parent().parent().parent().fadeOut(800);
			
			
        });
		
		
		$("#user_id").change(function() {
			var dataString = {
				'id': $(this).val(), 
				'_token': $('input[name="_token"]').val()
			};


			$.ajax({
				type: "POST",
				url: "{{ url('/c/get_users_p')}}",
				data: dataString,
				success: function ( response ) {						
					$(".user_fetch").html(response);
				}
			});
						
			
        });
		
	
		$(".menu_type").click(function() {
			if($("#type_deal").is(':checked')) { 
				$("#dish_id").parent().parent().parent().slideUp(200);
				$("#deal_id").parent().parent().parent().slideDown(200);
			} else {
				$("#deal_id").parent().parent().parent().slideUp(200);
				$("#dish_id").parent().parent().parent().slideDown(200);
			}
		});	
		
		
		
		$("#new_order").on("submit", function(){			
			$.ajax({
				type: "POST",
				url: $(this).attr('action'), //"{{ url('/restaurant/add_new')}}",
				data: $(this).serialize(),
				success: function (response) {
					if (response == 'Success') {
						$(".alert-success span").html("New Order Created Successfully.");
						$(".alert-success").fadeIn(400);
						
						var mover = setInterval(function(){
							location.href = "{{url('admin/orders')}}";	
						}, 2500);
						//
					} else {
						$(".alert-danger span").text( response );
						$(".alert-danger").fadeIn(400);
					}
					
					
				}
			});
			
			return false;
		});
		
		
		//jQuery('#datetimepicker').datetimepicker();
	});
</script> 
@stop