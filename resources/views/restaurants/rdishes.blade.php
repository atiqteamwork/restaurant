@extends('layouts.layout')
@section('title', 'Dishes')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Dishes</h3>
    </div>
    <!-- Dish-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
        
            <div class="panel-heading">Dishes</div>
            <div class="panel-body">
            	
                <button type="button" class="btn btn-primary new-dish-click" style="float:right" data-toggle="modal" data-target="#addnewDish">Add New</button>
            	<input type="hidden" name="restaurant_id" id="restaurant_id" value="{{Auth::user()->restaurant_id}}" />
                <table id="dishes" data-dtable class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Dish Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @if( !empty( $dishes ) )
                    @foreach($dishes as $dish)
                    <tr id="{{$dish->id}}">
                        <td>{{$dish->dish_title}}</td>
                        <td>{{$dish->category_id}}</td>
                        <td>{{$dish->description}}</td>
                        <td>{{$dish->price}}</td>
                        <td> @if($dish->status=='Active') <span class="label label-primary">{{$dish->status}}</span> @else <span class="label label-danger"> {{$dish->status}}</span> @endif </td>
                        <td>
                            <a href="#" class="btn btn-success btn-sm view_Dish_button" data-id="{{$dish->id}}"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <a class="btn btn-primary btn-sm edit_Dish_btn" data-id="{{$dish->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New dishs Modal Start -->
<div id="addnewDish" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurant-menus/add_new', 'files'=> true, 'id'=>'new_dish')) }}
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Dish</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('dish_title', 'Dish Name/Title')}}
                        {{Form::Text('dish_title','', ['class' => 'form-control', 'placeholder'=>'Enter Dish Name/Title', 'required'=>'required'])}} </div>

                    <div class="form-group"> {{Form::label('category_id', 'Dish Category')}}
                        {{Form::select('category_id',$categories,null ,['class' => 'form-control'])}}</div>
                        
                    <div class="form-group"> {{Form::label('description', 'description')}}
                        {{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Enter Description'])}} </div>

                    <div class="form-group"> {{Form::label('price', 'Price')}}
                        {{Form::number('price','', ['class' => 'form-control', 'placeholder'=>'0', 'required'=>'required'])}} </div>

                    <div class="form-group"> {{Form::label('serve_quantity', 'Serve Quantity')}}
                        {{Form::Text('serve_quantity','', ['class' => 'form-control', 'placeholder'=>'Serve Quantity', 'required'=>'required'])}} </div>
                        
                    <div class="form-group"> {{Form::label('picture', 'Picture')}}<br />
                        {{Form::file('picture')}}
                        
                        </div>
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
<div id="editRestaurants" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurant-menu/update', 'id'=>'update_Dish')) }}

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


<!-- View Dish Modal Start -->
<div id="viewDish" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Dish Details</h4>
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
<!--./ View Dish Modal end--> 




<div id="del_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Dish</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <button type="button" name="del_id" id="_dish_id" class="hidden"></button>
                        Are you sure you want to delete this Dish?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger delete_dish" id="delete_dish" data-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


@stop


@section('script')
<script>
		$(document).ready(function () {
            $('#dishes').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });



			var r_default_id = $("#restaurant_id").val();
			
			if( r_default_id > 0 )
			{
				var dataString = {'id': r_default_id, '_token': $('input[name="_token"]').val()};
				
				$.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/fetch_dish_by_restaurant')}}",
                    data: dataString,
                    success: function ( response ) {						
						$("#dishes tbody").html( response );
                    }
                });		
			}
			
			
			
				

			/*** Will Show Model to Add new Dish ***/
			$(".new-dish-click").click(function() {
				$("#new_dish")[0].reset();
                $(".alert").fadeOut(1);
            });

			
			/**
            * Trigger when Add new Restaurants button pressed.
            */
            $("#new_dish").on('submit', function () {
				var formData = new FormData( $("#new_dish")[0] );
				$form_go = false;
				
				var cat_id = $("#new_dish #category_id").val();
				
				if( cat_id > 0 ) {
					$form_go = true;
				} else {
					$("#new_dish #category_id").focus();
					return false;
					
				}
				
				
				if( $form_go ) {
					$.ajax({
						type: "POST",
						url: "{{ url('admin/restaurant-menus/add_new')}}",
						data: formData,
						contentType: false,
						processData: false,
						/*headers: {
							'X-CSRF-Token': $('input[name="_token"]').val(),
						},*/
						success: function (response) {
							if (response == 'Success') {
								$(".alert-success span").html( "New Dish Added Successfully." );
								$(".alert-success").fadeIn(400);
								
								var mover = setInterval( function(){
									$("#addnewcate #category_title").val("");
									window.location.reload();
									clearInterval( mover );
									
									$("#new_dish")[0].reset();
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
			$( '#dishes' ).on( 'click', '.edit_Dish_btn', function () {
				var dataString = {
						'id': $(this).attr("data-id"),
						'_token': $('input[name="_token"]').val()
					};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurant-menus/fetch_dish_byid')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#editRestaurantsdata').html(data);
                        $('#editRestaurants').modal("show");
                    }
                });
				
				return false;
			});
			
			
			
			/**
            *	Trigger when update Restaurants is pressed.
            */
            $("#update_Dish").on('submit', function (e) {
				var formData = new FormData( $("#update_Dish")[0] );
				
				
				$.ajax({
					type: "POST",
					url: "{{url('admin/restaurant-menu/update')}}",
					//data: $(this).serialize(),
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Dish Updated Successfully." );
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
			$( '#dishes' ).on( 'click', '.del_btn', function () {
                var id = $(this).attr('data-id');
				$('#_dish_id').val(id);
				$('#del_modal').modal('show');
				
				return false;
            });
			
			
			
			
			
			/**
             * Trigger when Delete button from model is pressed
             */
            //$('#delete_dish').on('click',function () {
			$( '#del_modal' ).on( 'click', '#delete_dish', function () {
                var id = $('#_dish_id').val();
								
                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/restaurant-menu/del')}}",
                    data:{
                        'id':id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Dish Deleted Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#dishes tr').each(function() {
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
            *
            $(".view_Dish_button").click( function () {
                var dataString = {
					'id': $(this).attr("data-id"), 
					'_token': $('input[name="_token"]').val(),
					'is_view':"1",
				};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/view_dish_byid')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#viewRestaurantsdata').html(data);
                        $('#viewRestaurants').modal("show");
                    }
                });
				
				return false;
				
            });*/
			

        });
    </script> 
@stop