@extends('layouts.layout')
@section('title', 'Users')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Users</h3>
    </div>
    <!-- Users-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Users</div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary" style="float:right" data-toggle="modal" data-target="#addnewuser">Add New</button>
                <table id="userlistdatatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Cell</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($users as $user)
                    <tr id="{{$user->u_id}}">
                        <td>{{$user->full_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->cell}}</td>
                        <td><span class="label label-success"> {{$user->display_name}}</span></td>
                        <td>@if($user->status=='Active') <span class="label label-primary">{{$user->status}}</span> @else <span class="label label-danger"> {{$user->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-sm edit_user_btn" type="submit" name="id" value="{{$user->u_id}}"><i class="fa fa-edit " aria-hidden="true"></i></button>
                            @if( $user->role_id > Auth::user()->role_id) <a href="#" class="btn btn-danger del_user_btn" data-id="{{$user->u_id}}"><i class="fa fa-trash"></i></a> @endif </td>
                    </tr>
                    @endforeach
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New User Modal Start -->
<div id="addnewuser" class="modal fade"
         role="dialog"> {!! Form::open(array('url' => 'users/new','id'=>'new_user')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New User</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('first_name', 'First Name')}}
                        {{Form::Text('first_name','', ['class' => 'form-control', 'placeholder'=>'Enter First Name', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('last_name', 'Last Name')}}
                        {{Form::Text('last_name','', ['class' => 'form-control', 'placeholder'=>'Enter Last Name', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('email', 'Email Address')}}
                        {{Form::Email('email','', ['class' => 'form-control', 'placeholder'=>'Enter Email Address', 'required'=>'required'])}} <i id="email_message" style="color:red"></i></div>
                    <div class="form-group"> {{Form::label('password', 'Password')}}
                        {{Form::password('password', ['class' => 'form-control', 'placeholder'=>'Enter password', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('address', 'Address')}}
                        {{Form::Text('address','', ['class' => 'form-control', 'placeholder'=>'Address'])}} </div>
                    <div class="form-group"> {{Form::label('phone', 'Phone')}}
                        {{Form::Text('phone','', ['class' => 'form-control', 'placeholder'=>'Phone'])}} </div>
                    <div class="form-group"> {{Form::label('cell', 'Cell')}}
                        {{Form::Text('cell','', ['class' => 'form-control', 'placeholder'=>'Enter Cell'])}} </div>
                    <div class="form-group"> {{Form::label('role_id', 'Role')}}
                        <?php
							$roles = [["id"=> "1","title"=> "Adminsitrator"], ["id"=> "2", "title" => "Restaurant"],["id" => "3","title" => "Visitor"],];
							$role_options = [];

							foreach( $roles as $role ) {
								if( $role["id"] < Auth::user()->role_id ) {continue;}
								$role_options[ $role["id"] ] = $role["title"];
							};
						?>
                        {{Form::select('role_id', $role_options,null ,['class' => 'form-control'])}} </div>
                    <div class="form-group restaurant-box" style="display:none;"> {{Form::label('restaurant_id', 'Restaurant')}}
                        {{Form::select('restaurant_id', $restaurants, null ,['class' => 'form-control'])}} </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {!! Form::close() !!} </div>
</div>
<!--  New User Modal end--> 

<!-- Edit User Modal Start -->
<div id="edituser" class="modal fade" role="dialog"> {!! Form::open(array('url' => '/users/update-user', 'id'=>'update_user')) !!}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update User</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body" id="edituserdata"></div>
            <div class="form-group restaurant-box" style="display:none;"> {{Form::label('restaurant_id', 'Restaurant')}}
                {{Form::select('restaurant_id', [$restaurants],null ,['class' => 'form-control'])}} </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {!! Form::close() !!} </div>
</div>
<!--  New User Modal end-->

<div id="del_user" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete User</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_user_id" class="hidden"></button>
                    Are you sure you want to delete this user? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete_user" data-dismiss="modal">Delete</button>
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
            $('#userlistdatatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });


			var role_id = $("#role_id").val();
				
			if( role_id > 1 && role_id != 0) {
				$(".restaurant-box").fadeIn( 200 );
			} else {
				$(".restaurant-box").fadeOut( 200 );
			}

			$("#addnewuser").click(function() {
				$(".alert").fadeOut(1);
                //$("#new_user")[0].reset();
            });
			
            /**
            *	Fetch User Data and Put into Edit Model
            */
            $(".edit_user_btn").on("click", function () {
				//alert( "test" )
				//alert($(this).val());
				
                var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};

                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/users/get_user_byid')}}",
                    data: dataString,
                    cache: false,
                    success: function (data) {
                        $('#edituserdata').html(data);
                        $('#edituser').modal('toggle');
                    }
                });
            });


            /**
            * Trigger when Add new User button pressed.
            */
            $("#new_user").on('submit', function (e) {
				
				$.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function (response) {
												
                        if (response == 'Success') {
							//window.location.reload();
							$(".alert-success span").html( "New User Created" );
							$(".alert-success").fadeIn(400);
							$(".alert-danger").fadeOut(10);
							
							var mover = setInterval(function(){
								$("#new_user")[0].reset();
								window.location.reload();
							}, 2500);
						} else {
							//alert(response);
							$(".alert-danger span").html( response );
							$(".alert.alert-danger").fadeIn(400);
						}
                    }
                });
				
				

                return false;
            });


            /**
             * New User Ajax call back
             */
            function onsuccess(response, status) {
                if (response == 'Email already registered')
                    $('#email_message').html(response);

                if (response == 'Please fill all the required feilds') {
                }
                if (response == 'success') {
                    window.location.reload();

                }
            }


            /**
            *	Trigger when update User is pressed.
            */
            $("#update_user").on('submit', function (e) {
                /*var options = {
                    url: $(this).attr("action"),
                    success: onUpdateSuccessCallback,
                };

                $(this).ajaxSubmit(options);*/
				
				
				$.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response == 'Success') {
							$(".alert-success span").html( "User Updated Successfully." );
							$(".alert-success").fadeIn(400);
							$(".alert-danger").fadeOut(10);
							
							var mover = setInterval(function(){
								$("#new_user")[0].reset();
								window.location.reload();
							}, 2500);
						} else {
							alert(response);
							$(".alert-danger span").html( response );
							$(".alert.alert-danger").fadeIn(400);
						}
                    }
                });
				
				
				
                return false;
            });


            /**
            *	Callback function for User Update
            */
            function onUpdateSuccessCallback(response, status) {
                alert(response);
                /*if (response == 'Email already registered')
                    $('#email_message').html(response);

                if (response == 'Please fill all the required feilds') {
                }*/
                if (response == 'Success') {
                    window.location.reload();
                }
            }
			
			
			
			$("#role_id").change(function(){
				
				var role_id = $(this).val();
				
				if( role_id > 1 && role_id != 0) {
					$(".restaurant-box").fadeIn( 200 );
				} else {
					$(".restaurant-box").fadeOut( 200 );
				}
			});


			/**
            * Trigger when Delete Button is pressed. Will show Del Model
            */
            $(".del_user_btn").on('click',function () {
                var user_id = $(this).attr('data-id');
									
				$('#_user_id').val(user_id);
				$('#del_user').modal('show');
				
				return false;
            });

			/**
             * Trigger when Delete button from model is pressed
             */
            $('#delete_user').on('click',function () {
                var user_id = $('#_user_id').val();		
				

                $.ajax({
                    type: 'POST',
                    url: "{{url('/users/del')}}",
                    data:{
                        'user_id':user_id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						
						
						
						if (response == 'Success') {
							$(".alert-success span").html( "User Delete Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#userlistdatatable tr').each(function() {
								if ($(this).attr('id') == user_id) {
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