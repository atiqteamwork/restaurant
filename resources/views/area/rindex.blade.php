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
            <div class="panel-heading">Area of Delivery</div>
            <div class="panel-body">
                <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
                <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
                {{ Form::open(array('url' => 'admin/area/update_restaurant_areas','id'=>'new_order')) }}
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('area_ids', 'Dish Name:', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::select('area_ids[]', $allareas, $areas_selected,['class' => 'form-control basic-select2', 'id'=> 'area_ids', 'data-select1', 'multiple'=>'multiple'])}} </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-offset-1 col-sm-2"> {{Form::label('dish_id', 'Dish Name:', ["class" => "text-right"])}} </div>
                    <div class="col-sm-8">
                        <div class="form-group"> {{Form::submit('Update Areas',['class' => 'btn btn-primary'])}} </div>
                    </div>
                </div>
                {{ Form::close() }} </div>
        </div>
    </div>
</div>

<!-- New Area Modal Start -->
<div id="addnewarea" class="modal fade" role="dialog"> {{ Form::open(array('url' => 'admin/areas/new','id'=>'new_area')) }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">New Area</h4>
            </div>
            <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span></div>
            <div class="alert alert-success" style="display:none"><strong>Success!</strong> <span></span></div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group"> {{Form::label('area_name', 'Area Name')}}
                        {{Form::Text('area_name','', ['class' => 'form-control', 'placeholder'=>'Enter Area Name', 'required'=>'required'])}} </div>
                    <div class="form-group"> {{Form::label('city_id', 'City')}}
                        {{Form::select('city_id', ['1' => 'Faisalabad'],null ,['class' => 'form-control'])}} </div>
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
<script>
	$(document).ready(function () {
		$("#new_order").on('submit', function () {
							
			$.ajax({
				type: "POST",
				url: $(this).attr("action"),// "{{ url('/areas/fetch_by_id')}}",
				data: $(this).serialize(),
				success: function (response) {
					if( response == "Success" ) {
						$(".alert-success span").html("Areas Updated Successfully.");
						$(".alert-success").slideDown(400);
					} else {
						$(".alert-danger span").html(response);
						$(".alert-danger").slideDown(400);
					}
					
					var imover = setInterval(function(){
						$(".alert").slideUp(500);
						
						clearInterval( imover );
					}, 2500);
				}
			});
					
			return false;
		});
	
	});
</script> 
@stop