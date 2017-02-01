@extends('layouts.layout')
@section('title', 'Menu Categories')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Menu Categories</h3>
    </div>
    <!-- Category-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Menu Categories</div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary new-category-click" style="float:right" data-toggle="modal" data-target="#addnewcate">Add New</button>
                <table id="dataTable" data-dtable class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Category Name / Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($categoryList as $cate)
                    <tr id="{{$cate->id}}">
                        <td>{{$cate->category_title}}</td>
                        <td> @if($cate->status=='Active') <span class="label label-primary">{{$cate->status}}</span> @else <span class="label label-danger"> {{$cate->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-sm edit_cate_btn" type="submit" name="id" value="{{$cate->id}}"><i class="fa fa-edit " aria-hidden="true"></i></button>
                            <a href="#" class="btn btn-danger btn-sm del_btn" data-id="{{$cate->id}}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New Category Modal Start -->
<div id="addnewcate" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/category/new','id'=>'new_cate')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Category</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('category_title', 'Categry Name/Title')}}
                        {{Form::Text('category_title','', ['class' => 'form-control', 'placeholder'=>'Enter Category Name', 'required'=>'required'])}} </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Category Modal end--> 

<!-- Edit Category Modal Start -->
<div id="editcate" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/category/update', 'id'=>'update_cate')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body" id="editcatedata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Category Modal end-->

<div id="del_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Category</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_category_id" class="hidden"></button>
                    Are you sure you want to delete this category? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete_category" data-dismiss="modal">Delete</button>
            </div>
        </div>
    </div>
</div>
@stop


@section('script') 
<!-- jQuery 2.2.3 --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> 
<script>
        $(document).ready(function () {

			$(".new-category-click").click(function() {
                $(".alert").fadeOut(1);
            });

            /**
            *	Fetch Category Data and Put into Edit Model
            */
            $(".edit_cate_btn").click( function () {
                var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/category/fetch_by_id')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#editcatedata').html(data);
                        $('#editcate').modal("show");
                    }
                });
				
				return false;
				
            });


            /**
            * Trigger when Add new Category button pressed.
            */
            $("#new_cate").on('submit', function () {
				$.ajax({
                    type: "POST",
                    url: "{{ url('admin/category/new')}}",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response == 'Success') {
							
							$(".alert-success span").html( "New Category Added Successfully." );
							$(".alert-success").fadeIn(400);
							
							var mover = setInterval( function(){
								$("#addnewcate #category_title").val("");
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
            *	Trigger when update Category is pressed.
            */
            $("#update_cate").on('submit', function (e) {
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
						url: "{{ url('admin/category/update')}}",
						data: $(this).serialize(),
						success: function (response) {
							if (response == 'Success') {
								$(".alert-success span").html( "Category Updated Successfully." );
								$(".alert-success").fadeIn(400);
								
								var mover = setInterval( function(){
									window.location.reload();
									clearInterval( mover );		
								}, 2000);
							} else {
								$(".alert span").text( response );
								$(".alert").fadeIn(400);
							}
						}
					});
				}
				
                return false;
            });
            
			
			/**
            * Trigger when Delete Button is pressed. Will show Del Model
            */
            $(".del_btn").on('click',function () {
                var id = $(this).attr('data-id');
									
				$('#_category_id').val(id);
				$('#del_modal').modal('show');
				
				return false;
            });
			
			
			/**
             * Trigger when Delete button from model is pressed
             */
            $('#delete_category').on('click',function () {
                var id = $('#_category_id').val();
				
                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/category/del')}}",
                    data:{
                        'id':id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Category Delete Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#dataTable tr').each(function() {
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