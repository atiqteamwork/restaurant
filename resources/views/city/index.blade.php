@extends('layouts.layout')
@section('title', 'Cities')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Cities</h3>
    </div>
    <!-- Cities-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Menu Categories</div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary new-category-click" style="float:right" data-toggle="modal" data-target="#addnewcity">Add New</button>
                <table id="citylistdatatable" class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($cities as $city)
                    <tr id="{{$city->id}}">
                        <td>{{$city->city_name}}</td>
                        <td> @if($city->status=='Active') <span class="label label-primary">{{$city->status}}</span> @else <span class="label label-danger"> {{$city->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-sm edit_city_btn" type="submit" name="id" value="{{$city->id}}"><i class="fa fa-edit " aria-hidden="true"></i></button></td>
                    </tr>
                    @endforeach
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New City Modal Start -->
<div id="addnewcity" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/city/new','id'=>'new_city')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New City</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('city_name', 'City Name')}}
                        {{Form::Text('city_name','', ['class' => 'form-control', 'placeholder'=>'Enter City Name', 'required'=>'required'])}} </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New city Modal end--> 

<!-- Edit City Modal Start -->
<div id="editcity" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/city/update', 'id'=>'update_city')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update City</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body" id="editcitydata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New City Modal end-->

<div id="del_city" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete City</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_city_id" class="hidden"></button>
                    Are you sure you want to delete this city? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete_city" data-dismiss="modal">Delete</button>
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
		$(".new-category-click").click(function(){  $(".alert").fadeOut(1); });
	
		/**
		*	Fetch City Data and Put into Edit Model
		*/
		$(".edit_city_btn").click( function () {
			var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};
			
			$.ajax({
				type: "POST",
				url: "{{ url('admin/city/fetch_by_id')}}",
				data: dataString,
				success: function (data) {
					$(".alert").fadeOut(1);
					$('#editcitydata').html(data);
					$('#editcity').modal("show");
				}
			});
			
			return false;
		});


		/**
		* Trigger when Add new City button pressed.
		*/
		$("#new_city").on('submit', function () {
			$.ajax({
				type: "POST",
				url: $(this).attr("action"),
				data: $(this).serialize(),
				success: function (response) {
					if (response == 'Success') {
						$(".alert-success span").html( "New City Added Successfully." );
						$(".alert-success").fadeIn(400);
						
						var mover = setInterval( function(){
							window.location.reload();
							clearInterval( mover );		
						}, 1000);
					} else {
						$(".alert-danger span").html( response );
						$(".alert-danger").fadeIn(400);
					}
				}
			});
			
			return false;
		});


		/**
		*	Trigger when update City is pressed.
		*/
		$("#update_city").on('submit', function (e) {
			
			var old_title = $("#old_title").val();
			var new_title = $("#update_cate #category_title").val();
			
			var old_status = $("#old_status").val();
			var new_status = $("#update_cate #status").val();
			
			if( new_title == old_title && old_status == new_status ) {
				$(".alert span").text( "You have'nt changed anything." );
				$(".alert").fadeIn(400);
				
			} else {
				$.ajax({
					type: "POST",
					url: $(this).attr("action"),
					data: $(this).serialize(),
					success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "City Updated Successfully." );
							$(".alert-success").fadeIn(400);
							
							var mover = setInterval( function(){
								window.location.reload();
								clearInterval( mover );		
							}, 1000);
							
						} else {
							$(".alert span").text( response );
							$(".alert").fadeIn(400);	
						}
					}
				});
			}

			return false;
		});

	});
</script> 
@stop