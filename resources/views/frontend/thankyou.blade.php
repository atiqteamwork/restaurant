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
                    <h2>Order Placed Successfully. You will get confirmation email with order details.</h2>
                    <h2>You order will be ready in 30-45 Minutes Depending on Order Type. </h2>
                </div>
            </div>
        </div>
    </div>
    <!--end heading-line--> 
    
    <!--checkout-update dismiss-->
    
    <!--end checkout-update dismiss-->
    <div class="container">
        <div class="info-checkout"></div>
    </div>
    
    <!--form fill-->
    <div class="container">
        
        <div class="row"> 
            <!-- Form Started Here --> 
            
            <div class="col-md-6">
                <div class="checkout-form">
                    <h2>billing details</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <p>{{$order->first_name}}</p>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <p>{{$order->last_name}}</p>
                                
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="dd">Company Name</label>
                                <p>{{$order->company}} </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="g">Area </label>
                               <p> {{$order->Area->area_name}} </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address1">Address </label>
                                <p>{{$order->address1}}</p>
                                <p>{{$order->address2}} </p>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="city">City </label>
                                <p>{{$order->City->city_name}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country </label>
                                <p>Pakistan</p>
                               </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Contact Info </label>
                                <p>{{$order->email}}</p>
                                <p>{{$order->phone}}</p>
                                <p>{{$order->cell}}</p>
                           </div>
                        </div>
                        <div class="col-md-12">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="checkout-form">
                    <h2>Shipping Address
                        
                    </h2>
                    <div class="row shipping-addresss">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipping_first_name">First name</label>
                                <p>{{$order->shipping_first_name}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipping_last_name">Last name </label>
                                <p>{{$order->shipping_last_name}} </p>
                           </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shipping_company">Company Name </label>
                                <p>{{$order->shipping_company}} </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="4">Area </label>
                                <p>{{$order->Area->area_name}}</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shipping_address1">Address </label>
                                <p>{{$order->shipping_address1}}</p>
                                <p>{{$order->shipping_address2}}</p>
                                
                           </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shipping_city">City </label>
								<p>{{$order->ShippingCity->city_name}}</p>
							</div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipping_country">Country </label>
                                <p>Pakistan</p> </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="shipping_email">Contact Info </label>
                                <p>{{$order->shipping_email}}</p>
                                <p>{{$order->shipping_phone}}</p>
                                <p>{{$order->shipping_cell}} </p>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="checkout-form">
                    <div class="form-group">
                        <label for="exampleTextarea">Other Note</label>
                        <p>{{$order->notes}}</p>
                    </div>
                </div>
            </div>
            

            <div class="col-md-12">
                <div class="checkout-form no-margin">
                    <h2>Your order </h2>
                </div>
            </div>
            <div class="col-md-12">
                <div class="table-responsive checkout-table">
                    <table class="table  table-border table-striped  table-responsive ">
                        <thead>
                            <tr>
                                <th class="text-left">Product</th>
                                <th  class="text-left">Price</th>
                                <th  class="text-left">Quantity</th>
                                <th  class="text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $total = 0 ?>
                        @if( !empty($order) && count( $order ) > 0 )
                            @foreach( $order->OrderDetail as $c )
								
                            <?php $total = ($c->price * $c->quantity) + $total ?>
                            <tr class="text-left">
                                <td><span class="table-pro-img"><img src="{{url('/assets/images/')}}/{{($c->dish_id == '0') ? 'deals/'.$c->Deals[0]->picture : 'dishes/'.$c->Dishes[0]->picture}}" alt="image" class="img-responsive"></span><span class="table-text-pro">{{($c->dish_id != 0) ? $c->Dishes[0]->dish_title : $c->Deals[0]->deal_title}}</span></td>
                                <td><span class="price-table">Rs. <span>{{$c->price}}</span></span></td>
                                <td class="pm-table"> <strong>{{$c->quantity}}</strong> </td>
                                <td><span class="table-text-pro item-total">Rs. <span><?php echo ($c->price * $c->quantity)?></span></span></td>
                            </tr>
                            @endforeach
                        @endif
                            </tbody>
                        
                    </table>

                    <div class="alert alert-danger" style="display:none"><strong>Alert!</strong> <span></span>
                    <a href="#" class="resend-checkout-form btn btn-submit">Ok</a>
                    </div>

                </div>
            </div>

            {{ Form::close() }} 
            <!-- ./ Form Ends Here --> 
            
        </div>
    </div>
    <div class="container">
        <div class="row">
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
    
    
    <!--end here--> 
</div>
<!--end outer_body--> 
@stop


@section('script') 
<script>

	$(document).ready(function() {
		
    });
	
</script> 
@stop 