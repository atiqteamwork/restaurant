@extends('layouts.default')

@section('content')
<div class="outer_body no-padding"> 
    <!--start check_out_box-->
    <div class="check_out_box M-bottom-30 parallax-window" data-parallax="scroll" data-image-src="../assets/images/check-out-img.png">
        <div class="wrapper-box">
            <h2> Order Food Delivery From your <span>Favorite</span> Restaurants </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <div class="container">
        <div class="crumbs">
            <h2 class="pull-left"></h2>
            <ol class="breadcrumb pull-right">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="active">My Orders</li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 col-md-offset-2"> 
                <!--login Form-->
                <div class="checkout-form"> {{ Form::open(array('url' => 'visitor/orders/search_filter', 'id'=>'search_filter')) }}
                    
                    <div class="form-group " style="float:right"> {{Form::label('filter_previous_year', 'Previous Year')}}
                        {{Form::radio('filter', 'filter_previous_year', false, ['id'=>'filter_previous_year', 'class'=>'filters'])}}
                        
                        {{Form::label('filter_this_year', 'This Year')}}
                        {{Form::radio('filter', 'filter_this_year', false, ['id'=>'filter_this_year', 'class' =>'filters'])}} </div>
                    <div class="clear"></div>
                    <div class="form-group" style="float:right"> {{Form::label('filter_previous_month', 'Previous Month')}}
                        {{Form::radio('filter', 'filter_previous_month', false, ['id'=>'filter_previous_month', 'class'=>'filters'])}}
                        
                        {{Form::label('filter_this_month', 'This Month')}}
                        {{Form::radio('filter', 'filter_this_month', false, ['id'=>'filter_this_month', 'class'=>'filters'])}} </div>
                    <div class="clear"></div>
                    <div class="form-group" style="float:right"> {{Form::label('filter_previous_week ', 'Previous Week')}}
                        {{Form::radio('filter', 'filter_previous_week', false, ['id'=>'filter_previous_week', 'class'=>'filters'])}}
                        
                        {{Form::label('filter_this_week ', 'This Week')}}
                        {{Form::radio('filter', 'filter_this_week', false, ['id'=>'filter_this_week', 'class'=>'filters'])}} </div>
                    <div class="clear"></div>
                    <div class="form-group" style="float:right;"> {{Form::label('filter_between', 'Between 2 Dates')}}
                        {{Form::radio('filter', 'filter_between', false, ['id'=>'filter_between', 'class'=>'filter_between filters'])}}
                        <div class="clear"></div>
                        <span style="display:none;" class="fromto_date_panel clear"> {{Form::label('from_date', 'From Date')}}
                        {{Form::date('from_date','', ['class' => 'form-control', 'placeholder'=>'2016-12-31'])}} <br />
                        {{Form::label('to_date', 'To Date')}}
                        {{Form::date('to_date','', ['class' => 'form-control', 'placeholder'=>'2016-12-31'])}} </span> </div>
                    <div class="clear"></div>
                    <div class="form-group" style="float:right">
                        <input type="submit" class="btn btn-success" value="Search" />
                    </div>
                    {{ Form::close() }} </div>
                <table id="OrderListTable" data-dtable class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Ord ID</th>
                            <th>Restaurant</th>
                            <th>Toal Amounts (Inc GST)</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                    @if( !empty( $orders ) )
                    @foreach($orders as $order)
                    <tr id="{{$order->id}}">
                        <td>{{$order->id}}</td>
                        <td>{{$order->Restaurant->title}}</td>
                        <td>PKR {{$order->total_amount}}</td>
                        <td> @if($order->status=='Active') <span class="label label-primary">{{$order->status}}</span> @else <span class="label label-danger"> {{$order->status}}</span> @endif</td>
                        <td> <!--<a href="#" class="btn btn-success btn-sm view_order_button" data-id="{{$order->id}}"><i class="fa fa-info" aria-hidden="true"></i></a> <a class="btn btn-primary btn-sm edit_order_btn" data-id="{{$order->id}}"><i class="fa fa-edit" aria-hidden="true"></i></a>--></td>
                    </tr>
                    @endforeach
                    @endif
                        </tbody>
                    
                </table>
                <hr class="check-border">
                <div class="row">
                    <div class="col-md-6"> </div>
                    <div class="col-md-6">
                        <div class="info-checkout"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script') 
<script>
	$(document).ready(function() {
        $('#OrderListTable').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false
		});
			
		
		/**
		* Trigger when Add new Restaurants button pressed.
		*/
		$("#search_filter").on('submit', function () {
			$.ajax({
				type: "POST",
				url: $(this).attr('action'),
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