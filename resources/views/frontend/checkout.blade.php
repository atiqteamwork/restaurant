@extends('layouts.main')
@section('title', 'Checkout')
@section('content')
<div class="outer_body no-padding"> 
    
    <!--heading-res-nam-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> </div>
            </div>
        </div>
    </div>
    <!--end heading-res-name-->
    
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1"> @if( !Auth::check() )
                {{ Form::open(array('url' => 'checkout/login','id'=>'checkout_login')) }}
                <input type="text" name="username" id="username" class="form-control" required="required" />
                <br />
                <input type="password" name="password" id="password" class="form-control" required="required" />
                <br />
                <input type="submit" class="btn btn-success" value="Login" />
                <br />
                {{ Form::close() }}
                @else <a href="{{url('/logout')}}">Logout</a> @endif </div>
        </div>
        
        
        
        <br /><br />
        
        
        {{ Form::open(array('url' => 'checkout/proceed','id'=>'checkout_proceed')) }}
        
        <div class="row">
            <div class="col-md-10 col-md-offset-1"> 
            	First Name: *
            	<input type="text" name="first_name" id="first_name" placeholder="First Name" required="required" class="form-control" value="{{Auth::check() ? Auth::user()->first_name : ''}}" />
                
                Last Name: *
                <input type="text" name="last_name" id="last_name" placeholder="Last Name" required="required" class="form-control" value="{{Auth::check() ? Auth::user()->last_name : ''}}" />
                
                Comapny:
                <input type="text" name="company" id="company" placeholder="Your Company Name" class="form-control" />
                
                Address: *
                <input type="text" name="address1" id="address1" placeholder="Street Address" class="form-control" value="{{Auth::check() ? Auth::user()->address : ''}}" required="required" />
                
                City: *
                <input type="text" name="city" id="city" placeholder="City" class="form-control" required="required" />
             
             Email Address: *   
                <input type="text" name="email" id="email" placeholder="Email Address" class="form-control" value="{{Auth::check() ? Auth::user()->email : ''}}" required="required" />
                
             Phone: *
                <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control" value="{{Auth::check() ? Auth::user()->phone : ''}}" required="required" />
                
                
             Cell: 
                <input type="text" name="cell" id="cell" placeholder="Cell Number" class="form-control" value="{{Auth::check() ? Auth::user()->cell : ''}}" />
                
                
                
            </div>
            
            <input type="hidden" name="user_id" value="{{Auth::check() ? Auth::user()->id : 0}}" />
            <input type="hidden" name="restaurant_id" value="{{$cart[0]->Cart[0]->restaurant_id}}" />
                        
        </div>
        <br /><br />
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="row">
            <div class="col-md-10 col-md-offset-1"> @if( !empty($cart) && count( $cart ) > 0 )
                <div class="cart-sidebar">
                    <div class="cart-sticker">
                        <h3>Your Order</h3>
                        <?php $total = 0 ?>
                        @foreach( $cart as $c )
                        
                        <input type="hidden" name="cart_id" value="{{$c->cart_id}}" />
                        
                        <?php $total = ($c->price * $c->quantity) + $total ?>
                        <div class="cart_detail">
                            <div class="overlay-shadow">
                                <div class="overlay-inner">
                                    <div class="close_btn">
                                        <input type="hidden" class="subtotal" data-quantity="{{$c->quantity}}" data-price="{{$c->price}}" value="<?php echo ($c->price * $c->quantity)?>" />
                                        
                                        <a href="#" class="remove-cart-item" data-manual="{{$c->id}}" data-id="{{$c->item_type}}"><i class="fa fa-times-circle"></i></a> </div>
                                </div>
                            </div>
                            <div class="plus"><a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="plus"><span>+</span></a></div>
                            <div class="minus"><a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="minus"><span>-</span></a> </div>
                            <div>
                                <p> <span class="quantity-value">{{$c->quantity}} <small>x</small></span> {{( $c->item_type == "deal" ) ? $c->Deals[0]->deal_title : $c->Dishes[0]->dish_title}} <br>
                                    {{( $c->item_type == "deal" ) ? "Deal" : "Dish" }}</p>
                            </div>
                        </div>
                        @endforeach
                        <h6> <span class="pull-left">subtotal</span> <span class="pull-right view-subtotal"> {{$total}} </span> </h6>
                        <h5><span class="pull-left">Delivery fee</span> <span class="pull-right">Free</span></h5>
                        <h2><span class="pull-left">Total</span> <span class="pull-right"><span>RS. </span><span class="view-total">{{$total}}</span></span></h2>
                        <div class="check_btn_box"> 
                        	<!--<a href="{{url('/checkout/')}}" class="btn btn-checkout btn-block"> proceed </a> -->
                            <input type="submit" class="btn btn-checkout btn-block" value="Proceed" />
                        </div>
                    </div>
                </div>
                @else
                <h4>Your Cart is empty <a href="{{url('/')}}">Click Here to Select Dish/Deal</a></h4>
                @endif </div>
        </div>
        <input type="hidden" name="net_amount" value="{{$total}}" />
        
        {{ Form::close() }}
        
    </div>
</div>
@stop

@section('script') 
<script>

	$(document).ready(function() {
		
		/**
		 * Remove Cart Item
		 **/
		$(".remove-cart-item").click(function() {
			var obj  = $(this);
			var id   = $(obj).attr("data-manual");
			var type = $(obj).attr("data-id");
			
			$.ajax({
				type: 'POST',
				url: "{{url('cart/item/delete')}}",
				data:{
					'id': id,
					'type': type,
					'_token': '{{csrf_token()}}'
				},
				success: function (response) {
					if( response == "Success" )
					{
						var this_total = $(obj).prev().val();
						var sub_total  = $(".view-subtotal").text() - this_total;
						
						$(".view-subtotal").text( sub_total );
						$(".view-total").text( sub_total );
						$(obj).parent().parent().parent().parent().fadeOut(200);
							
					} else {
						alert( response );
					}
				},
				error:function() {
					
				}
			});
			
			return false;
        });
    });
	
	
	
	/**
	 * Change Quantity
	 **/
	$(".change-quantity").click(function(){
		var obj    = $(this);
		var action = $(obj).attr("data-type");
		var id     = $(obj).attr("data-id");		
				
		$.ajax({
			type: 'POST',
			url: "{{url('cart/item/changequantity')}}",
			data:{
				'id': id,
				'action': action,
				'_token': '{{csrf_token()}}'
			},
			success: function (response) {
				if( response != "Error!" )
				{	
					var prev = 0;
					var current_subtotal = parseInt($(".view-subtotal").text().trim());
					var current_total    = parseInt($(".view-total").text().trim());
					
					if( action  == "plus" )
					{
						prev = parseInt(response) - 1;
					} else {
						prev = parseInt(response) + 1;
					}
					
					$(obj).parent().parent().find(".quantity-value" ).html( response + " <small>x</small>");
					var price = parseInt( $(obj).parent().parent().find(".subtotal").val() / ( prev ) );
					$(obj).parent().parent().find(".subtotal").val( price * response );
					
					if( action  == "plus" )
					{
						current_subtotal = current_subtotal + price;
						current_total    = current_total + price;
					} else {
						current_subtotal = current_subtotal - price;
						current_total    = current_total - price;
					}
					
					$(".view-subtotal").text( current_subtotal );
					$(".view-total").text( current_total );
					
				} else {
					alert( response );
				}
			},
			error:function () {
				
			}
		});
		
		
		return false;	
	});
	
	
</script> 
@stop