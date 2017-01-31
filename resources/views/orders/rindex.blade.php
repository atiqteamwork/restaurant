@extends('layouts.layout')
@section('title', 'Orders')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Orders</h3>
    </div>
    <!-- Order-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Orders</div>
            <div class="panel-body">
                <!--<button type="button" class="btn btn-primary new-order-click" style="float:right" data-toggle="modal" data-target="#addnewOrder">Add New</button>-->
                
                <a href="{{url('admin/orders/new')}}" class="btn btn-primary" style="float:right">Add New</a>
                <div class="clear"></div>
                
                {{ Form::open(array('url' => 'admin/orders/search_filter', 'id'=>'search_filter')) }}
                
			<input type="hidden" name="restaurant_id" id="restaurant_id" value="{{Auth::user()->restaurant_id}}" /> 
                
                <div class="form-group" style="float:right"> 
                	{{Form::label('filter_previous_year', 'Previous Year')}}
    		            {{Form::radio('filter', 'filter_previous_year', false, ['id'=>'filter_previous_year', 'class'=>'filters'])}}
                        
                    {{Form::label('filter_this_year', 'This Year')}}
                		{{Form::radio('filter', 'filter_this_year', false, ['id'=>'filter_this_year', 'class' =>'filters'])}}
               </div>
               
               <div class="clear"></div>
               
               <div class="form-group" style="float:right">
                	{{Form::label('filter_previous_month', 'Previous Month')}}
    		            {{Form::radio('filter', 'filter_previous_month', false, ['id'=>'filter_previous_month', 'class'=>'filters'])}}
                        
                    {{Form::label('filter_this_month', 'This Month')}}
                		{{Form::radio('filter', 'filter_this_month', false, ['id'=>'filter_this_month', 'class'=>'filters'])}}
               </div>
               
               <div class="clear"></div>
               
               <div class="form-group" style="float:right">
                	{{Form::label('filter_previous_week ', 'Previous Week')}}
    		            {{Form::radio('filter', 'filter_previous_week', false, ['id'=>'filter_previous_week', 'class'=>'filters'])}}
                        
                    {{Form::label('filter_this_week ', 'This Week')}}
                		{{Form::radio('filter', 'filter_this_week', false, ['id'=>'filter_this_week', 'class'=>'filters'])}}
               </div>
               
               <div class="clear"></div>
               
               <div class="form-group" style="float:right;">
                	{{Form::label('filter_between', 'Between 2 Dates')}}
    		            {{Form::radio('filter', 'filter_between', false, ['id'=>'filter_between', 'class'=>'filter_between filters'])}}
                    <div class="clear"></div>
                   <span style="display:none;" class="fromto_date_panel clear">
                    {{Form::label('from_date', 'From Date')}}
                		{{Form::date('from_date','', ['class' => 'form-control', 'placeholder'=>'2016-12-31'])}}
                    <br />
                    {{Form::label('to_date', 'To Date')}}
                		{{Form::date('to_date','', ['class' => 'form-control', 'placeholder'=>'2016-12-31'])}}
                    </span>
               </div>
               <div class="clear"></div>
               
               <div class="form-group" style="float:right">
	               <input type="submit" class="btn btn-success" value="Search" />
               </div>
               
               {{ Form::close() }}
               
                             
               
               
                
                <table id="OrderListTable" data-dtable class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ord ID</th>
                            <th>User</th>
                            <th>Restaurant</th>
                            <th>Amounts</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @if( !empty( $orders ) )
                    @foreach($orders as $order)
                    <tr id="{{$order->id}}">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td> @if($order->status=='Active') <span class="label label-primary">{{$order->status}}</span> @else <span class="label label-danger"> {{$order->status}}</span> @endif </td>
                        <td><a href="#" class="btn btn-success btn-sm view_order_button" data-id="{{$order->id}}"><i class="fa fa-info" aria-hidden="true"></i></a> <a class="btn btn-primary btn-sm edit_order_btn" data-id="{{$order->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New Order Modal Start -->
<div id="addneworder" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/orders/add_new', 'files'=> true, 'id'=>'new_order')) }}
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Order</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('order_title', 'Order Name/Title')}}
                        {{Form::Text('order_title','', ['class' => 'form-control', 'placeholder'=>'Enter Order Name/Title', 'required'=>'required'])}} </div>
                    
                    <div class="form-group"> {{Form::label('description', 'description')}}
                        {{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Enter Description'])}} </div>
                    <div class="form-group"> {{Form::label('price', 'Price')}}
                        {{Form::number('price','', ['class' => 'form-control', 'placeholder'=>'0', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('serve_quantity', 'Serve Quantity')}}
                        {{Form::Text('serve_quantity','', ['class' => 'form-control', 'placeholder'=>'Serve Quantity', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('picture', 'Picture')}}<br />
                        {{Form::file('picture')}} </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Restaurants Modal end--> 

<!-- Edit Restaurants Modal Start -->
<div id="editRestaurants" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/orders/update', 'id'=>'update_order')) }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Restaurant</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body" id="editRestaurantsdata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Restaurants Modal end--> 

<!-- View Restaurants Modal Start -->
<div id="viewRestaurants" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Restaurant Details</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="modal-body" id="viewRestaurantsdata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <!--<button type="submit" class="btn btn-primary">Save</button>--> 
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--./ View Restaurants Modal end--> 

<!-- View Order Modal Start -->
<div id="vieworder" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Order Details</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="modal-body" id="viewRestaurantsdata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <!--<button type="submit" class="btn btn-primary">Save</button>--> 
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--./ View Order Modal end-->

<div id="del_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Order</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_order_id" class="hidden"></button>
                    Are you sure you want to delete this Order? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger delete_order" id="delete_order" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>

<form id="edit_order_form" action="orders/edit" method="post">
	<input type="hidden" value="" name="order_id" id="__order_id" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@stop


@section('script') 
<!-- jQuery 2.2.3 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
<!-- Bootstrape --> 
<script src='assets/plugins/bootstrap/js/bootstrap.min.js'></script> 
<!-- DataTables --> 
<script src='assets/plugins/dataTables/dataTables.min.js'></script> 
<script src='assets/plugins/dataTables/dataTables.bootstrap.min.js'></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
		$(document).ready(function () {
            $('#OrderListTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
			
			
			$( "#from_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
			$( "#to_date" ).datepicker({ dateFormat: 'yy-mm-dd' });
			
			var r_default_id = $("#restaurant_id").val();
			
			if( r_default_id > 0 )
			{
				var dataString = {'id': r_default_id, '_token': $('input[name="_token"]').val()};
				
				$.ajax({
                    type: "POST",
                    url: "{{ url('admin/orders/fetch_order_by_restaurant')}}",
                    data: dataString,
                    success: function ( response ) {						
						$("#OrderListTable tbody").html( response );
                    }
                });		
			}

			
			/*
			*
			*	On change of Restaurant Filter
			*/
			$("#restaurants_list").on("change", function () {
						
                var dataString = {
						'id': $(this).val(), 
						'_token': $('input[name="_token"]').val()
				};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/orders/fetch_order_by_restaurant')}}",
                    data: dataString,
                    success: function ( response ) {						
						$("#OrderListTable tbody").html( response );
                    }
                });
            });
				

			/*** Will Show Model to Add new Order ***/
			$(".new-order-click").click(function() {
				$("#new_order")[0].reset();
                $(".alert").fadeOut(1);
            });

			
			/**
            * Trigger when Add new Restaurants button pressed.
            */
            $("#new_order").on('submit', function () {
				var formData = new FormData( $("#new_order")[0] );
				$form_go = false;
				
				var res_id = $("#new_order #restaurant_id").val();
				
			
				
				if( res_id > 0 ) {
					$form_go = true;
				} else {
					$("#new_order #restaurant_id").focus();	
					return false;
				}
				
				
				
				if( $form_go ) {
					$.ajax({
						type: "POST",
						url: "{{ url('admin/orders/add_new')}}",
						data: formData,
						contentType: false,
						processData: false,
						/*headers: {
							'X-CSRF-Token': $('input[name="_token"]').val(),
						},*/
						success: function (response) {
							if (response == 'Success') {
								$(".alert-success span").html( "New Order Added Successfully." );
								$(".alert-success").fadeIn(400);
								
								var mover = setInterval( function(){
									window.location.reload();
									clearInterval( mover );
									
									$("#new_order")[0].reset();
								}, 2000);
							} else {
								$(".alert-danger span").text( response );
								$(".alert-danger").fadeIn(400);
							}
						}
					});	
				}
				
                return false;
            });
			
			
			
			
			
			
			/**
            *	Fetch Restaurants Data and Put into Edit Model
            */
			$( '#OrderListTable' ).on( 'click', '.edit_order_btn', function () {
				var id = $(this).attr("data-id");
				
				/*var dataString = {
						'id': $(this).attr("data-id"),
						'_token': $('input[name="_token"]').val()
					};*/
				
				$("#edit_order_form #__order_id").val( id );
				
				$("#edit_order_form").submit();
				
				return false;
			});
			
			
			
			/**
            *	Trigger when update Restaurants is pressed.
            */
            $("#update_order").on('submit', function (e) {
				var formData = new FormData( $("#update_order")[0] );
				
				
				$.ajax({
					type: "POST",
					url: "{{url('admin/orders/update')}}",
					//data: $(this).serialize(),
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Order Updated Successfully." );
							$(".alert-success").fadeIn(400);
							
							var mover = setInterval( function(){
								window.location.reload();
								clearInterval( mover );		
							}, 2000);
						} else {
							$(".alert-danger span").text( response );
							$(".alert-danger").fadeIn(400);
						}
					}
				});
				
                return false;
            });
			
			
			
			
			/**
            * Trigger when Delete Button is pressed. Will show Del Model
            */
            //$(".del_btn").on('click',function () {
			$( '#OrderListTable' ).on( 'click', '.del_btn', function () {
                var id = $(this).attr('data-id');
				$('#_order_id').val(id);
				$('#del_modal').modal('show');
				
				return false;
            });
			
			
			
			
			
			/**
             * Trigger when Delete button from model is pressed
             */
            //$('#delete_order').on('click',function () {
			$( '#del_modal' ).on( 'click', '#delete_order', function () {
                var id = $('#_order_id').val();
				
				//alert( id );

                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/orders/del')}}",
                    data:{
                        'id':id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Order Deleted Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#OrderListTable tr').each(function() {
								if ($(this).attr('id') == id) {
									$(this).remove();
								}else{}
							});
							
							/*var mover = setInterval( function(){
								window.location.reload();
								clearInterval( mover );		
							}, 3000);*/
						} else {
							$(".alert-danger span").html( response );
							$(".alert-danger").fadeIn(400);
						}
						
                    },
                    error:function () {
                        
                    }
                });
            });
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/**
            *	Fetch Restaurants Data and VIEW
            */
            //$(".view_order_button").on("click", function () {
			$( '#OrderListTable' ).on( 'click', '.view_order_button', function () {
                var dataString = {
					'id': $(this).attr("data-id"), 
					'_token': $('input[name="_token"]').val(),
					'is_view':"1",
				};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/orders/view_order_byid')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#viewRestaurantsdata').html(data);
                        $('#viewRestaurants').modal("show");
                    }
                });
				
				return false;
				
            });
			
			
	
			$(".filters").click(function() {
				if($(".filter_between").is(':checked')) { 
					$(".fromto_date_panel").slideDown(200);	
				} else {
					$(".fromto_date_panel").slideUp(200);	
				}
            });
			
			
			
			/**
            * Trigger when Add new Restaurants button pressed.
            */
            $("#search_filter").on('submit', function () {
				$.ajax({
					type: "POST",
					url: $(this).attr('action'), // "{{ url('admin/orders/add_new')}}",
					data: $(this).serialize(),
					success: function (response) {
						$("#OrderListTable tbody").html( response );
					}
				});	

				
                return false;
            });
			
			
			

        });
    </script> 
@stop