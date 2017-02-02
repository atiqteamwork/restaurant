@extends('layouts.main')
@section('title', 'Checkout')
@section('content') 

<!--outer_body-->
<div class="outer_body no-padding"> 
    <!--start check_out_box-->
    <div class="check_out_box parallax-window" data-parallax="scroll" data-image-src="{{url('/assets_front/images/check-out-img.png')}}">
        <div class="wrapper-box">
            <h2> Order Food Delivery From your <span>Favorite</span> Restaurants </h2>
            <p>delivering to your door</p>
        </div>
    </div>
    <!--end check_out_box--> 
    
    <!--heading-line-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2> - <span>deliver</span> to you at </h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-line--> 
    
    <!--checkout-update dismiss-->
    <div class="container">
        <div class="alert checkout-update alert-dismissable">
            <h2 class="pull-left"> <span><i class="fa fa-exclamation-circle"></i></span> returing customer? </h2>
            <span class="pull-right"><a href="#" data-dismiss="alert" aria-label="close"><i class="fa fa-close"></i></a></span> </div>
    </div>
    <!--end checkout-update dismiss-->
    <div class="container">
        <div class="info-checkout"> If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section. </div>
    </div>
    
    <!--form fill-->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-4 col-md-4 col-sm-12 col-md-offset-4">
                <div class="checkout-form"> @if( !Auth::check() )
                    {{ Form::open(array('url' => 'checkout/login','id'=>'checkout_login')) }}
                    <div class="form-group">
                        <label for="email">Email <span>*</span></label>
                        {{Form::Text('username','', ['class' => 'form-control', 'placeholder'=>'Your Registered Email ID', 'required'=>'required', 'id'=> 'username'])}} </div>
                    <div class="form-group">
                        <label for="password">Password <span>*</span></label>
                        {{Form::Password('password', ['class' => 'form-control', 'placeholder'=>'Password', 'required'=>'required', 'id' => 'password'])}} </div>
                    <!--<div class="checkbox">
                                <input type="checkbox" id="c1" name="cc" checked />
                                <label for="c1"><span></span>Remeber Me</label>
                            </div>-->
                    <input type="submit" value="Login Now" class="btn btn-submit">
                    <!--<a href="#" class="btn btn-submit">LOGIN NOW</a>--> 
                    {{ Form::close() }}
                    @else
                    <h2>{{Auth::user()->name}}</h2>
                    @endif </div>
                <hr class="check-border">
                <div class="row">
                    <div class="col-md-6">
                        <div class="info-checkout"> <i class="fa fa-user"></i> register an account? </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-checkout"> <i class="fa fa-unlock"></i> lost your password </div>
                    </div>
                </div>
            </div>
            <hr class="check-border">
            
            <!-- Form Started Here -->
            {{ Form::open(array('url' => 'checkout/proceed','id'=>'checkout_proceed')) }}
            
            <div class="col-md-6">
                <div class="checkout-form">
                    <h2>billing details</h2>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First name<span>*</span></label>
                                {{Form::Text('first_name',(Auth::check() ? Auth::user()->first_name : ''), ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'first_name'])}} </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last name <span>*</span></label>
                                {{Form::Text('last_name', Auth::check() ? Auth::user()->last_name : '', ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'last_name'])}} </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dd">Company Name</label>
                                {{Form::Text('company', '', ['class' => 'form-control', 'placeholder'=>'', 'id'=> 'company'])}} </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="g">Area <span>*</span></label>
                                <input type="text" class="form-control" id="g">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address1">Address <span>*</span></label>
                                {{Form::Text('address1', Auth::check() ? Auth::user()->address : '', ['class' => 'form-control margin-btm', 'placeholder'=>'', 'required'=>'required', 'id'=> 'address1'])}}
                                
                                {{Form::Text('address2', '', ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'address2'])}} </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="city">City <span>*</span></label>
                                {{Form::Select('city', $cities, Auth::check() ? Auth::user()->City->id : 0, ['class' => 'search-res form-control', 'id' => 'city', 'required' => 'required'])}} </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country <span>*</span></label>
                                {{Form::Text('country', 'Pakistan', ['class' => 'form-control', 'readonly'=>'readonly', 'id'=> 'country'])}} </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Contact Info <span>*</span></label>
                                {{Form::Email('email', Auth::check() ? Auth::user()->email : '', ['class' => 'form-control margin-btm', 'placeholder'=>'Email Address', 'required'=>'required', 'id'=> 'email'])}}
                                {{Form::Text('phone', Auth::check() ? Auth::user()->phone : '', ['class' => 'form-control margin-btm', 'placeholder'=>'Phone Number', 'required'=>'required', 'id'=> 'phone'])}}
                                {{Form::Text('cell', Auth::check() ? Auth::user()->cell : '', ['class' => 'form-control', 'placeholder'=>'Cell Number (Optional)', 'id'=> 'cell'])}} </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox">
                                <input type="checkbox" id="c2" name="cc" checked/>
                                <label for="c2"><span></span>Create An Account?</label>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form">
                    <h2>Ship to Different Address ?
                        <label>
                            <input type="checkbox">
                        </label>
                    </h2>
                    
                        <div class="row shipping-addresss">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_first_name">First name<span>*</span></label>
                                    {{Form::Text('shipping_first_name',(Auth::check() ? Auth::user()->first_name : ''), ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'shipping_first_name'])}} </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_last_name">Last name <span>*</span></label>
                                    {{Form::Text('shipping_last_name', Auth::check() ? Auth::user()->last_name : '', ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'shipping_last_name'])}} </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shipping_company">Company Name <span>*</span></label>
                                    {{Form::Text('shipping_company', '', ['class' => 'form-control', 'placeholder'=>'', 'id'=> 'shipping_company'])}} </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="4">Area <span>*</span></label>
                                    <input type="text" class="form-control" id="4">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shipping_address1">Address <span>*</span></label>
                                    {{Form::Text('shipping_address1', Auth::check() ? Auth::user()->address : '', ['class' => 'form-control margin-btm', 'placeholder'=>'', 'required'=>'required', 'id'=> 'shipping_address1'])}}
                                    
                                    {{Form::Text('shipping_address2', '', ['class' => 'form-control', 'placeholder'=>'', 'required'=>'required', 'id'=> 'shipping_address2'])}} </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shipping_city">City <span>*</span></label>
                                    {{Form::Select('shipping_city', $cities, Auth::check() ? Auth::user()->City->id : 0, ['class' => 'search-res form-control', 'id' => 'shipping_city', 'required' => 'required'])}} </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="shipping_country">Country <span>*</span></label>
                                    {{Form::Text('shipping_country', 'Pakistan', ['class' => 'form-control', 'readonly'=>'readonly', 'id'=> 'shipping_country'])}} </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shipping_email">Contact Info <span>*</span></label>
                                    {{Form::Email('shipping_email', Auth::check() ? Auth::user()->email : '', ['class' => 'form-control margin-btm', 'placeholder'=>'Email Address', 'required'=>'required', 'id'=> 'shipping_email'])}}
                                    {{Form::Text('shipping_phone', Auth::check() ? Auth::user()->phone : '', ['class' => 'form-control margin-btm', 'placeholder'=>'Phone Number', 'required'=>'required', 'id'=> 'shipping_phone'])}}
                                    {{Form::Text('shipping_cell', Auth::check() ? Auth::user()->cell : '', ['class' => 'form-control', 'placeholder'=>'Cell Number (Optional)', 'id'=> 'shipping_cell'])}} </div>
                            </div>
                        </div>
                    
                </div>
            </div>
            
            {{ Form::close() }}
            <!-- ./ Form Ends Here -->
            
            <div class="col-md-12">
                <div class="checkout-form">
                    <form action="">
                        <div class="form-group">
                            <label for="exampleTextarea">Other Note</label>
                            <textarea class="form-control" id="exampleTextarea" rows="4" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="checkout-form no-margin">
                    <h2>Your order </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive checkout-table">
                    <table class="table  table-border table-striped  table-responsive ">
                        <thead>
                            <tr>
                                <th class="text-left">Product</th>
                                <th  class="text-left">price</th>
                                <th  class="text-left">quantity</th>
                                <th  class="text-left">total</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        @if( !empty($cart) && count( $cart ) > 0 )
                        <?php $total = 0 ?>
                        @foreach( $cart as $c )
                        <input type="hidden" name="cart_id" class="cart_id" value="{{$c->cart_id}}" />
                        <?php $total = ($c->price * $c->quantity) + $total ?>
                        <tr class="text-left">
                            <input type="hidden" class="item-id" name="item_id[]" value="{{$c->id}}">
                            <td><span class="table-pro-img"><img src="{{url('/assets/images/')}}/{{($c->item_type == 'deal') ? 'deals/'.$c->Deals[0]->picture : 'dishes/'.$c->Dishes[0]->picture}}" alt="image" class="img-responsive"></span><span class="table-text-pro">{{ ($c->item_type == "deal") ? $c->Deals[0]->deal_title : $c->Dishes[0]->dish_title}}</span></td>
                            <td><span class="price-table">Rs. <span>{{$c->price}}</span></span></td>
                            <td class="pm-table"><a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="minus"><span class="inc-dec-pro"><i class="fa fa-minus"></i></span></a> {{Form::Number('quantity[]', $c->quantity, ['class' => 'select-two quantity-value'])}} <a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="plus"><span class="inc-dec-pro"><i class="fa fa-plus"></i></span></a></td>
                            <td><span class="table-text-pro item-total">Rs. <span><?php echo ($c->price * $c->quantity)?></span></span></td>
                        </tr>
                        @endforeach
                        @endif
                            </tbody>
                        
                    </table>
                    <a href="#" class="btn btn-submit update-cart">Update Cart</a>
                    <p class="tempo"></p>
                </div>
            </div>
            <div class="col-md-offset-8 col-md-4">
                <div class="table-responsive checkout-table2">
                    <div class="table-total">
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td><strong>Cart Subtotal</strong></td>
                                    <td><strong>Rs. <span class="sub-total">{{$total}}</span></strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Shipping and Handling</strong></td>
                                    <td class="green"> Free Shipping</td>
                                </tr>
                                <tr>
                                    <td><strong>Order Total</strong></td>
                                    <td><span class="red">Rs. <span class="order-total">{{$total}}</span></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="check-border">
    <div class="container">
        <div class="logo-slider-heading text-center">
            <h2>our amazing clients </h2>
        </div>
    </div>
    <div class="container">
        <div class="row logo-slider">
            <div class="col-md-3"> <a href="#">
                <div class="client-logo"> <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive"> </div>
                </a> </div>
            <div class="col-md-3"> <a href="#">
                <div class="client-logo"> <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive"> </div>
                </a> </div>
            <div class="col-md-3"> <a href="#">
                <div class="client-logo"> <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive"> </div>
                </a> </div>
            <div class="col-md-3"> <a href="#">
                <div class="client-logo"> <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive"> </div>
                </a> </div>
            <div class="col-md-3"> <a href="#">
                <div class="client-logo"> <img src="assets_front/images/client-logo.png" alt="logo" class="img-responsive"> </div>
                </a> </div>
        </div>
    </div>
    <!--end here--> 
</div>
<!--end outer_body--> 
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
						
						$(obj).parent().find(".quantity-value" ).val( response );
						
						var price = parseInt( $(obj).parent().parent().find(".price-table span").text() );
						
						$(obj).parent().parent().find(".item-total span").text( price * response );
						$(obj).parent().parent().find(".subtotal").val( price * response );
						
						if( action  == "plus" )
						{
							$(".sub-total").text( parseInt($(".sub-total").text()) + price );
							$(".order-total").text( parseInt($(".order-total").text()) + price );
						} else {
							$(".sub-total").text( parseInt($(".sub-total").text()) - price );
							$(".order-total").text( parseInt($(".order-total").text()) - price );
						}
						
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
		
		
		
		
		$(".update-cart").click(function() {
			var type = "";
			var id = "";
			var quantity = "";
			
			$(".item-id").each(function(index, element) {
				id   = id +  $(this).val() + ",";
				type = type + $(this).attr("data-type") + ",";
				quantity = quantity + $(this).parent().find(".quantity-value").val() + ",";
            });
			
			
			
			$.ajax({
				type: 'POST',
				url: "{{url('cart/checkout/update/')}}",
				data:{
					'id': id,
					'quantity': quantity,
					'_token': '{{csrf_token()}}'
				},
				success: function (response) {
					if( response == "Success" )
					{
						window.location.reload();
							
					} else {
						//alert( response );
						$(".tempo").html(response);
					}
				},
				error:function() {
					
				}
			});
			
			return false;
        });
		
		
    });
	
	
</script> 
@stop 