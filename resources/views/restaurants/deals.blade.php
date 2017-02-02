@extends('layouts.layout')
@section('title', 'Deals')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Deals</h3>
    </div>
    <!-- Deal-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Deals</div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary new-deal-click" style="float:right" data-toggle="modal" data-target="#addnewDeal">Add New</button>
                <div class="form-group"> {{Form::select('restaurants_list', $restaurants,null ,['class' => 'form-control', 'id'=> 'restaurants_list'])}} </div>
                <table id="DealListTable" data-dtable class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Deal Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @if( !empty( $deals ) )
                    @foreach($deals as $deal)
                    <tr id="{{$deal->id}}">
                        <td>{{$deal->deal_title}}</td>
                        <td>{{$deal->category_id}}</td>
                        <td>{{$deal->description}}</td>
                        <td>{{$deal->price}}</td>
                        <td> @if($deal->status=='Active') <span class="label label-primary">{{$deal->status}}</span> @else <span class="label label-danger"> {{$deal->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" class="btn btn-success btn-sm view_deal_button" data-id="{{$deal->id}}"><i class="fa fa-info" aria-hidden="true"></i></a> <a class="btn btn-primary btn-sm edit_deal_btn" data-id="{{$deal->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New deals Modal Start -->
<div id="addnewDeal" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurant-deal/add_new', 'files'=> true, 'id'=>'new_deal')) }}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Deal</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('deal_title', 'Deal Name/Title')}}
                        {{Form::Text('deal_title','', ['class' => 'form-control', 'placeholder'=>'Enter Deal Name/Title', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('category_id', 'Deal Category')}}
                        {{Form::select('category_id',$categories,null ,['class' => 'form-control'])}}</div>
                    <div class="form-group"> {{Form::label('restaurant_id', 'Restaurant')}}
                        {{Form::select('restaurant_id',$restaurants,null, ['class' => 'form-control'])}}</div>
                    <div class="form-group"> {{Form::label('description', 'description')}}
                        {{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Enter Description'])}} </div>
                    <div class="form-group"> {{Form::label('price', 'Price')}}
                        {{Form::number('price','', ['class' => 'form-control', 'placeholder'=>'0', 'required'=>'required'])}} </div>
                    
                    <!--<div class="form-group"> {{Form::label('serve_quantity', 'Serve Quantity')}}
                        {{Form::Text('serve_quantity','', ['class' => 'form-control', 'placeholder'=>'Serve Quantity', 'required'=>'required'])}} </div>-->
                    
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
<div id="editRestaurants" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurant-deal/update', 'id'=>'update_Deal')) }}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
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

<!-- View Deal Modal Start -->
<div id="viewDeal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">View Deal Details</h4>
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
<!--./ View Deal Modal end-->

<div id="del_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Deal</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_deal_id" class="hidden"></button>
                    Are you sure you want to delete this Deal? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger delete_deal" id="delete_deal" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
@stop


@section('script')
<script>
		$(document).ready(function () {
			var r_default_id = $("#restaurants_list").val();
			
			if( r_default_id > 0 ) {
				var dataString = {'id': r_default_id, '_token': $('input[name="_token"]').val()};
				
				$.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/fetch_deal_by_restaurant')}}",
                    data: dataString,
                    success: function ( response ) {						
						$("#DealListTable tbody").html( response );
                    }
                });		
			}
			


			$("#restaurants_list").on("change", function () {			
                var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/fetch_deal_by_restaurant')}}",
                    data: dataString,
                    success: function ( response ) {						
						$("#DealListTable tbody").html( response );
                    }
                });
            });
				

			/*** Will Show Model to Add new Deal ***/
			$(".new-deal-click").click(function() {
				$("#new_deal")[0].reset();
                $(".alert").fadeOut(1);
            });

			
			/**
            * Trigger when Add new Restaurants button pressed.
            */
            $("#new_deal").on('submit', function () {
				var formData = new FormData( $("#new_deal")[0] );
				
				$form_go = false;
				
				var cat_id = $("#new_deal #category_id").val();
				var res_id = $("#new_deal #restaurant_id").val();
				
				if( cat_id > 0 ) {
					$form_go = true;
				} else {
					$("#new_deal #category_id").focus();
					return false;	
				}
				
				
				if( res_id > 0 ) {
					$form_go = true;
				} else {
					$("#new_deal #restaurant_id").focus();	
					return false;
				}
				
				
				
				if( $form_go ) {
					$.ajax({
						type: "POST",
						url: "{{ url('admin/restaurant-deal/add_new')}}",
						data: formData,
						contentType: false,
						processData: false,
						/*headers: {
							'X-CSRF-Token': $('input[name="_token"]').val(),
						},*/
						success: function (response) {
							if (response == 'Success') {
								$(".alert-success span").html( "New Deal Added Successfully." );
								$(".alert-success").fadeIn(400);
								
								var mover = setInterval( function(){
									
									window.location.reload();
									clearInterval( mover );
									
									$("#new_deal")[0].reset();
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
			$( '#DealListTable' ).on( 'click', '.edit_deal_btn', function () {
				var dataString = {
						'id': $(this).attr("data-id"),
						'_token': $('input[name="_token"]').val()
					};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurant-deal/fetch_deal_byid')}}",
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
            $("#update_Deal").on('submit', function (e) {
				var formData = new FormData( $("#update_Deal")[0] );
				
				$.ajax({
					type: "POST",
					url: "{{url('admin/restaurant-deal/update')}}",
					//data: $(this).serialize(),
					data: formData,
					contentType: false,
					processData: false,
					success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Deal Updated Successfully." );
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
			$( '#DealListTable' ).on( 'click', '.del_btn', function () {
                var id = $(this).attr('data-id');
				$('#_deal_id').val(id);
				$('#del_modal').modal('show');
				
				return false;
            });
			
			
			
			/**
             * Trigger when Delete button from model is pressed
             */
			$( '#del_modal' ).on( 'click', '#delete_deal', function () {
                var id = $('#_deal_id').val();
								
                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/restaurant-deal/del')}}",
                    data:{
                        'id':id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Deal Deleted Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#DealListTable tr').each(function() {
								if ($(this).attr('id') == id) {
									$(this).remove();
								}else{}
							});
							
						} else {
							$(".alert-danger span").html( response );
							$(".alert-danger").fadeIn(400);
						}
						
                    },
                    error:function () {
                        
                    }
                });
            });
			
        });
    </script> 
@stop