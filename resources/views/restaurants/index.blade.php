@extends('layouts.layout')
@section('title', 'Restaurants')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Restaurants</h3>
    </div>
    <!-- Restaurants-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Menu Restaurants</div>
            
             @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            
             @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            
            <div class="panel-body"> <a href="{{url('admin/restaurant/new')}}" class="btn btn-primary" style="float:right; display:block; clear:both;">Add New</a>
            
            
           
            
            
                <table id="dataTable" data-dtable class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Restaurant Name/Title</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($restaurants as $restaurant)
                    <tr id="{{$restaurant->id}}">
                        <td>{{$restaurant->title}}</td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->City->city_name}}</td>
                        <td> @if($restaurant->status=='Active') <span class="label label-primary">{{$restaurant->status}}</span> @else <span class="label label-danger"> {{$restaurant->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <a href="#" class="btn btn-success btn-sm view_Restaurant_button" data-id="{{$restaurant->id}}"><i class="fa fa-info" aria-hidden="true"></i></a>
                            <button class="btn btn-primary btn-sm edit_Restaurants_btn" type="submit" name="id" value="{{$restaurant->id}}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                            <a href="#" class="btn btn-danger btn-sm del_restaurant_btn" data-id="{{$restaurant->id}}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New Restaurants Modal Start --
<div id="addnewRestaurants" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurant/new','id'=>'new_restaurant')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Restaurants</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('title', 'Restaurant Name/Title')}}
                        {{Form::Text('title','', ['class' => 'form-control', 'placeholder'=>'Enter Restaurant Name/Title', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('city_id', 'City')}}
                        {{Form::select('city_id', $cities,null ,['class' => 'form-control'])}} </div>
                    <div class="form-group"> {{Form::label('description', 'description')}}
                        {{Form::Text('description','', ['class' => 'form-control', 'placeholder'=>'Enter Description'])}} </div>
                    <div class="form-group"> {{Form::label('address', 'Address')}}
                        {{Form::Text('address','', ['class' => 'form-control', 'placeholder'=>'Address', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('phone_primary', 'Primary Phone')}}
                        {{Form::Text('phone_primary','', ['class' => 'form-control', 'placeholder'=>'Enter Primary Phone', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('phone_secondary', 'Secondary Phone')}}
                        {{Form::Text('phone_secondary','', ['class' => 'form-control', 'placeholder'=>'Enter Secondary Phone'])}} </div>
                    <div class="form-group"> {{Form::label('open_time', 'Opening Time')}}
                        {{Form::Text('open_time','', ['class' => 'form-control', 'placeholder'=>'Enter Opening Time'])}} </div>
                    <div class="form-group"> {{Form::label('close_time', 'Closing Time')}}
                        {{Form::Text('close_time','', ['class' => 'form-control', 'placeholder'=>'Enter Closing Time'])}} </div>
                    <div class="form-group"> {{Form::label('is_takeaway_only', 'Restaurant Type')}}
                        {{Form::select('is_takeaway_only', ['1' => 'Takeaway Only', '0'=>'Delivery and Takeaway'],null ,['class' => 'form-control'])}} </div>
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
<div id="editRestaurants" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/restaurants/update', 'id'=>'update_Restaurants')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Restaurant</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
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

<div id="del_restaurant" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Restaurant</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_restaurant_id" class="hidden"></button>
                    Are you sure you want to delete this restaurant? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete_restaurant" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')

<!--jquery--> 
<script src="assets/plugins/jquery/jquery-2.2.4.min.js"></script> 


<script>
        $(document).ready(function () {
			
			$(".new-Restaurants-click").click(function() {
                $(".alert").fadeOut(1);
            });

            /**
            *	Fetch Restaurants Data and Put into Edit Model
            */
            $(".edit_Restaurants_btn").click( function () {
                var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/fetch_by_id')}}",
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
            *	Fetch Restaurants Data and VIEW
            */
            $(".view_Restaurant_button").click( function () {
                var dataString = {
					'id': $(this).attr("data-id"), 
					'_token': $('input[name="_token"]').val(),
					'is_view':"1",
				};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/fetch_by_id')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#viewRestaurantsdata').html(data);
                        $('#viewRestaurants').modal("show");
                    }
                });
				
				return false;
				
            });
			

            /**
            * Trigger when Add new Restaurants button pressed.
            *
            $("#new_Restaurants").on('submit', function () {
				$.ajax({
                    type: "POST",
                    url: "{{ url('admin/restaurants/new')}}",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response == 'Success') {
							window.location.reload();
						} else {
							$(".alert span").text( response );
							$(".alert").fadeIn(400);
						}
                    }
                });
				
				
                return false;
            });


            /**
            *	Trigger when update Restaurants is pressed.
            *
            $("#update_Restaurants").on('submit', function (e) {
				$.ajax({
					type: "POST",
					url: "{{ url('admin/restaurants/update')}}",
					data: $(this).serialize(),
					success: function (response) {
						if (response == 'Success') {
							window.location.reload();
						} else {
							$(".alert span").text( response );
							$(".alert").fadeIn(400);
						}
					}
				});
				
                return false;
            });
            

			/**
            * Trigger when Delete Button is pressed. Will show Del Model
            */
            $(".del_restaurant_btn").on('click',function () {
                var restaurant_id = $(this).attr('data-id');
				
				$('#_restaurant_id').val(restaurant_id);
				$('#del_restaurant').modal('show');
				return false;
            });

			
			/**
             * Trigger when Delete button from model is pressed
             */
            $('#delete_restaurant').on('click',function () {
                var restaurant_id = $('#_restaurant_id').val();
				
                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/restaurant/del')}}",
                    data:{
                        'restaurant_id':restaurant_id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Restaurant Delete Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#dataTable tr').each(function() {
								if ($(this).attr('id') == restaurant_id) {
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