@extends('layouts.main')
@section('title', 'Menu of ' . $restaurants[0]->title)

@section('content')
<div class="outer_body no-padding">
    <div class="detail-bg parallax-window" data-parallax="scroll" data-image-src="assets_front/images/detail_page_bg.jpg">
        <div class="wrapper-box">
            <h2> <span>{{$restaurants[0]->title}}</span> - {{$restaurants[0]->City->city_name}} <br>
                {{$restaurants[0]->description}}<br />
                {{( count( $area ) > 0 ) ? $area[0]->area_name : ""}} </h2>
            <div class="img-res"> <img src="{{url('/assets/images/restaurants/')}}/{{$restaurants[0]->logo}}" alt="Restaurent image"> </div>
        </div>
    </div>
    

    <!--heading-res-nam-->
    <div class="heading-line">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                @if( count( $area ) > 0 )
	                @if( in_array( $area[0]->id, explode(",",$restaurants[0]->area_ids ) ) )
                    <h2>{{$restaurants[0]->title}} - {{$restaurants[0]->City->city_name}} can <span>deliver</span> to you at <span>{{$area[0]->area_name}}</span></h2>
                    @else
                    <h2>{{$restaurants[0]->title}} - {{$restaurants[0]->City->city_name}} cannot <span>deliver</span> to you at <span>{{$area[0]->area_name}}</span></h2>
                    @endif 
               @endif     
               </div>
            </div>
        </div>
    </div>
    
    <!--end heading-res-nam-->
    
    <div class="container">
        <div class="row"> 
            <!--detail sidebar-->
            <div class="col-md-3">
                <div class="detail-sidebar">
                    <nav class="navbar" id="sidebar_nav">
                        <h4>limited time offer</h4>
                        <ul class="nav">
                            <li><a href="#bahadur" class="page-scroll">2 bahadur meal</a></li>
                            <li><a href="#food-dep" class="page-scroll">2 food</a></li>
                            <li class="head-tag"><a href="javascript:;">Sandwiches</a></li>
                            <li><a href="#" class="page-scroll">2 bahadur meal</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!--detail sidebar end-->
            <div class="col-md-6">
                <div class="main-detail"> 
                
                
                @foreach($restaurants[0]->Deals as $deal )
                <div class="detail_box">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <h4>{{$deal->deal_title}}</h4>
                                <div class="small-detail">
                                    <h5> Exclusive Deal</h5>
                                    <p>{{$deal->description}}</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="cart-btn-box">
                                    <a href="#" class="btn btn_cart" data-order="{{$order_type}}" data-type="deal" data-id="{{$deal->id}}">Rs. <span class="cart-price">{{$deal->price}}</span> <i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                
                
                
                @if( !empty( $dish_ids ) ) 
                    @foreach( $categories as $category )
                    @if( in_array( $category->id, $dish_ids) )
                    <section id="bahadur"> 
                        <!--food-banner-->
                        <div class="food-banner"> <img src="assets_front/images/food-banner.jpg" alt="banner" class="img-responsive">
                            <h3>{{$category->category_title}}</h3>
                        </div>
                        <!--end banner--> 
                        <!--detail_box-->
                        <div class="detail_box">
                            <div class="row"> 
                            @foreach($restaurants[0]->Dishes as $dish )
                                @if( $dish->category_id == $category->id )
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="recipe_box"> <img src="{{url('/')}}/assets/images/dishes/{{$dish->picture}}" alt="recipe" class="img-responsive">
                                        <p>{{$dish->dish_title}}</p>
                                        
                                        <a href="#" class="btn btn_cart" data-order="{{$order_type}}" data-type="dish" data-id="{{$dish->id}}">Rs. <span class="cart-price">{{$dish->price}}</span> <i class="fa fa-shopping-cart"></i></a> </div>
                                </div>
                                @endif
                                @endforeach </div>
                        </div>
                        <!--detail_box end--> 
                    </section>
                    @endif
                    @endforeach	
                    @else
                    <h3>No Dishes or Deals Found</h3>
                    @endif </div>
            </div>
            <div class="col-md-3">
                <div class="cart-sidebar">
                    <div class="cart-sticker">
                        <h4>Estimated delivery time<span class="pull-right">45min</span></h4>
                    </div>
                    <div class="cart-sticker">
                        <h3>Your Order</h3>
                        
                        <?php $total = 0 ?>
                        @foreach( $cart as $c )
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
                                <p> <span class="quantity-value">{{$c->quantity}} <small>x</small></span> 
                                	{{( $c->item_type == "deal" ) ? $c->Deals[0]->deal_title : $c->Dishes[0]->dish_title}} <br>
                                    {{( $c->item_type == "deal" ) ? "Deal" : "Dish" }}</p>
                            </div>
                        </div>
                        
                        @endforeach
                        
                        
                        <h6> <span class="pull-left">subtotal</span> <span class="pull-right view-subtotal"> {{$total}} </span> </h6>
                        <h5><span class="pull-left">Delivery fee</span> <span class="pull-right">Free</span></h5>
                        <h2><span class="pull-left">Total</span> <span class="pull-right"><span>RS. </span><span class="view-total">{{$total}}</span></h2>
                        <div class="check_btn_box"> <a href="{{url('/')}}/checkout" class="btn btn-checkout btn-block"> proceed to check out</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('script')
<script>

	$(document).ready(function() {
        $(".btn_cart").click(function() {
			var obj    = $(this);
			
			var id     = $(obj).attr("data-id");
			var type   = $(obj).attr("data-type");
			var restid = "{{$restaurants[0]->id}}";
			var price  = $(obj).find(".cart-price").text();
			var order_type = $(obj).attr("data-order");
			
			var current_subtotal = $(".view-subtotal").text().trim();
			var current_total    = $(".view-total").text().trim();
			
			$.ajax({
				type: 'POST',
				url: "{{url('cart/add')}}",
				data:{
					'type': type,
					'id': id,
					'restaurant_id': restid,
					'area_id': '{{ ( count( $area ) > 0 ) ? $area[0]->id : 0}}',
					'order_type': order_type,
					'_token': '{{csrf_token()}}',
				},
				success: function (response) {
					$(response).insertBefore(".cart-sidebar .cart-sticker h6");
					$(".view-subtotal").text( parseInt(current_subtotal) + parseInt( price ) );
					
				},
				error:function () {
					
				}
			});
			
			return false;
		});
		
		
		
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
				error:function () {
					
				}
			});
			
			return false;
        });
    });
	
	
	
	/**
	 *
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
					var current_subtotal = $(".view-subtotal").text().trim();
					var current_total = $(".view-total").text().trim();
					
					if( action  == "plus" )
					{
						prev = parseInt(response) - 1;
					} else {
						prev = parseInt(response) + 1;
					}
					
					$(obj).parent().parent().find(".quantity-value" ).html( response + " <small>x</small>");
					var price = ( $(obj).parent().parent().find(".subtotal").val() / ( prev ) );
					$(obj).parent().parent().find(".subtotal").val( price * response );
					
					if( action  == "plus" )
					{
						current_subtotal =  parseInt(current_subtotal) + parseInt(price);
						current_total    = parseInt(current_total) + parseInt(price);	
					} else {
						current_subtotal = parseInt(current_subtotal) - parseInt(price);
						current_total    = parseInt(current_total) - parseInt(price);
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