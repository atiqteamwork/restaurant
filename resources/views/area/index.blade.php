@extends('layouts.layout')
@section('title', 'Areas')

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Areas</h3>
    </div>
    <!-- Areas-header -->
    
    <div class="box-body">
        <div class="panel panel-default table-panel">
            <div class="panel-heading">Menu Categories</div>
            <div class="panel-body">
                <button type="button" class="btn btn-primary new-category-click" style="float:right" data-toggle="modal" data-target="#addnewarea">Add New</button>
                <table id="dataTable" class="table table-bordered table-striped data-table">
                    <thead>
                        <tr>
                            <th>Area Name</th>
                            <th>City Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($areaList as $area)
                    <tr id="{{$area->id}}">
                        <td>{{$area->area_name}}</td>
                        <td>{{$area->City->city_name}}</td>
                        <td> @if($area->status=='Active') <span class="label label-primary">{{$area->status}}</span> @else <span class="label label-danger"> {{$area->status}}</span> @endif </td>
                        <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-primary btn-sm edit_area_btn" type="submit" name="id" value="{{$area->id}}"><i class="fa fa-edit " aria-hidden="true"></i></button>
                            <a href="#" class="btn btn-danger btn-sm del_area_btn" data-id="{{$area->id}}"><i class="fa fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                        </tbody>
                    
                </table>
            </div>
        </div>
    </div>
</div>

<!-- New Area Modal Start -->
<div id="addnewarea" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/areas/new','id'=>'new_area')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Area</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('area_name', 'Area Name')}}
                        {{Form::Text('area_name','', ['class' => 'form-control', 'placeholder'=>'Enter Area Name', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('city_id', 'City')}}
                        {{Form::select('city_id', $cities,null ,['class' => 'form-control'])}} </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Area Modal end--> 

<!-- Edit Area Modal Start -->
<div id="editarea" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/areas/update', 'id'=>'update_area')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Area</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body" id="editareadata"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
        {{ Form::close() }} </div>
</div>
<!--  New Area Modal end-->

<div id="del_area" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete Area</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <button type="button" name="del_id" id="_area_id" class="hidden"></button>
                    Are you sure you want to delete this area? </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" id="delete_area" data-dismiss="modal">Delete</button>
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

			$(".new-category-click").click(function() {
                $(".alert").fadeOut(1);
            });
		
            /**
            *	Fetch Area Data and Put into Edit Model
            */
            $(".edit_area_btn").click( function () {
                var dataString = {'id': $(this).val(), '_token': $('input[name="_token"]').val()};
				
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/areas/fetch_by_id')}}",
                    data: dataString,
                    success: function (data) {
						$(".alert").fadeOut(1);
                        $('#editareadata').html(data);
                        $('#editarea').modal("show");
                    }
                });
				
				return false;
				
            });


            /**
            * Trigger when Add new Area button pressed.
            */
            $("#new_area").on('submit', function () {
				$.ajax({
                    type: "POST",
                    url: $(this).attr("action"), // "{{ url('admin/areas/new')}}",
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response == 'Success') {
							$(".alert-success span").html( "New Area Added Successfully." );
							$(".alert-success").fadeIn(400);
							
							var mover = setInterval( function(){
								window.location.reload();
								clearInterval( mover );		
							}, 2000);
						} else {
							$(".alert-danger span").html( response );
							$(".alert-danger").fadeIn(400);
						}
                    }
                });
				
                return false;
            });


            /**
            *	Trigger when update Area is pressed.
            */
            $("#update_area").on('submit', function (e) {
				
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
						url: $(this).attr("action"), // "{{ url('admin/areas/update')}}",
						data: $(this).serialize(),
						success: function (response) {
							if (response == 'Success') {
								
								$(".alert-success span").html( "Area Updated Successfully." );
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

                //$(this).ajaxSubmit(options);
                return false;
            });

			
			/**
            * Trigger when Delete Button is pressed. Will show Del Model
            */
            $(".del_area_btn").on('click',function () {
                var area_id = $(this).attr('data-id');
				$('#_area_id').val(area_id);
				$('#del_area').modal('show');
				return false;
            });

			
			/**
             * Trigger when Delete button from model is pressed
             */
            $('#delete_area').on('click',function () {
                var area_id = $('#_area_id').val();

                $.ajax({
                    type: 'POST',
                    url: "{{url('admin/areas/del')}}",
                    data:{
                        'area_id':area_id,
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
						if (response == 'Success') {
							$(".alert-success span").html( "Area Delete Successfully." );
							$(".alert-success").fadeIn(400);
							
							$('#dataTable tr').each(function() {
								if ($(this).attr('id') == area_id) {
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