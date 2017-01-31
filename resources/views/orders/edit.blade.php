@extends('layouts.layout')
@section('title', 'Edit Order')

@section('styles')
<link rel="stylesheet" type="text/css" href="assets/plugins/datetimepicker/jquery.datetimepicker.css"/ >
@stop

@section('content')

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Order</h3>
    </div>
    <!-- Areas-header -->  
    
    <div class="box-body">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Order</div>
            <div class="panel-body">
            	<div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
                <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
                
            	{{ Form::open(array('url' => 'admin/orders/update_order','id'=>'update_order')) }}
					{{Form::hidden('id', $order->id, ['id'=> 'id'])}}
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('restaurant_id', 'Restaurant Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('restaurants_id', $restaurants, $order->restaurant_id ,['class' => 'form-control', 'id'=> 'restaurants_id'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('menu_type', 'Menu Type:', ["class" => "text-right"])}}
                            </div>
                            
                            <?php
								$menuType = [
										"is_deal" => ($order->menutype == 'typedeal')?1:0,
										"is_dish" => ($order->menutype == 'typedish')?1:0,		
									];
									
							?>
                            
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::label('type_dish', 'Dish', ["class" => "text-right"])}}
    	                            	{{Form::radio('menu_type', 'typedish', $menuType["is_dish"], ['id'=>'type_dish', 'class'=>'menu_type'])}}
                                    
                                    {{Form::label('type_deal', 'Deal', ["class" => "text-right"])}}
	                                    {{Form::radio('menu_type', 'typedeal', $menuType["is_deal"], ['id'=>'type_deal', 'class'=>'menu_type'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('dish_id', 'Dish Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('dish_id[]', [], [] ,['class' => 'form-control basic-select2', 'id'=> 'dish_id', 'data-select1', 'multiple'=>'multiple'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('deal_id', 'Deal Name:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::select('deal_id[]', [], [] ,['class' => 'form-control basic-select2', 'id'=> 'deal_id', 'data-select1', 'multiple'=>'multiple'])}}
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
                                	{{Form::select('user_id', $users, $order->user_id ,['class' => 'form-control', 'id'=> 'user_id'])}}
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
                                        {{Form::Text('address', $order->address, ['class' => 'form-control', 'placeholder'=>'Delivery Address', 'id'=> 'address'])}}
                                    </div>
                                </div>
                            </div>
                        
                        	<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('phone', 'Phone:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('phone', $order->phone, ['class' => 'form-control', 'placeholder'=>'Phone', 'id'=> 'phone'])}}
                                </div>
                            </div>
                        </div>
                        
	                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('cell', 'Cell:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::Text('cell',$order->cell, ['class' => 'form-control', 'placeholder'=>'Cell', 'id'=> 'cell'])}}
                                </div>
                            </div>
                        </div>
                        
    	                    <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('email', 'Email Address:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::email('email',$order->email, ['class' => 'form-control', 'placeholder'=>'Email Address', 'id'=> 'email', 'required' => 'required'])}}
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
                                	{{Form::datetime('dated',$order->dated, ['class' => 'form-control', 'placeholder'=>"2016-12-31 01:30:00", 'id' => 'dated'])}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                {{Form::label('extra_charges', 'Any Extra Charges:', ["class" => "text-right"])}}
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                	{{Form::text('extra_charges',$order->extra_charges, ['class' => 'form-control', 'placeholder'=>'Any Extra Charges', 'id'=> 'extra_charges'])}}
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
                        
                        
                        {{Form::submit('Update Order',['class' => 'btn btn-primary'])}}
                                                
                        <hr>
                        
                    {{ Form::close() }}
            	
            </div>
        </div>
    </div>
</div>

@stop


@section('script') 
<!-- jQuery 2.2.3 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<!-- Bootstrape --> 
<script src='assets/plugins/bootstrap/js/bootstrap.min.js'></script> 
<script src='assets/plugins/angularjs/angular.js'></script>
<script src='assets/plugins/angularjs/angular-route.min.js'></script>
<script src='assets/plugins/angularjs/ng-map.min.js'></script>
<script src='assets/plugins/angularjs/angular-animate.min.js'></script>
<script src='assets/node_modules/select2/dist/js/select2.js'></script>");
<script src='assets/node_modules/angular-chart.js/dist/Chart.min.js'></script>");
<script src='assets/node_modules/angular-chart.js/dist/angular-chart.js'></script>");
<script src='assets/plugins/angularjs/ng-google-chart.js'></script>");
<script src='assets/plugins/angular-mappy/build/angular-mappy.js'></script>
<script src='assets/node_modules/angular-loading-bar/build/loading-bar.js'></script>
<script src='assets/js/angularScript.js'></script>
<script src='assets/js/custom.js'></script>

<script src="assets/plugins/datetimepicker/jquery.datetimepicker.min.js"></script>



<script>
	$(document).ready(function () {	
		
		var dataString = {
			'id': $("#restaurants_id").val(),
			'dishes': "<?=$dishes?>",
			'deals': "<?=$deals?>",
			'_token': $('input[name="_token"]').val()
		};
		

		$.ajax({
			type: "POST",
			url: "{{ url('/c/get_dishes_rt')}}",
			data: dataString,
			success: function ( response ) {
				$("#dish_id").html( response );
			}
		});
		
		
		$.ajax({
			type: "POST",
			url: "{{ url('/c/get_deals_rt')}}",
			data: dataString,
			success: function ( response ) {
				$("#deal_id").html( response );
			}
		});
		
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
		
		
		
		$("#update_order").on("submit", function(){			
			$.ajax({
				type: "POST",
				url: $(this).attr('action'), //"{{ url('/restaurant/add_new')}}",
				data: $(this).serialize(),
				success: function (response) {
					if (response == 'Success') {
						$(".alert-success span").html("Order Updated Successfully.");
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