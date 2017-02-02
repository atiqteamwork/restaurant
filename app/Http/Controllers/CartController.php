<?php

namespace App\Http\Controllers;

use Auth;

use App\Cart;
use App\CartDetails;
use App\Order;
use App\OrderDetail;
use App\Restaurant;
use App\Dish;
use App\Deal;
use App\City;

use Carbon\Carbon;

use Illuminate\Http\Request;

use App\Mail\OrderSaved;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
    *
    */
    public function __construct(Request $request)
    {	
        parent::__construct();
    }


    /**
    *
    */
    public function addto_main_cart(Request $request)
    {
        $session_key = app('App\Http\Controllers\SessionController')->get_session( $request );
        $session_key = app('App\Http\Controllers\SessionController')->get_session( $request );

        $cart = Cart::all()->where("session_key", $session_key);

        if( empty( $cart ) || count( $cart ) <= 0 ) {
            $cart = new Cart();

            $cart->user_id         =  isset(Auth::user()->id) ? Auth::user()->id : 0;
            $cart->session_key     =  $session_key;
            $cart->dated           =  date('Y-m-d H:i:s');
            $cart->restaurant_id   =  $request->restaurant_id;
            $cart->extra_charges   =  0;
            $cart->order_type	   =  $request->order_type;
            $cart->save();

            $cart_id = $cart->id;

        } else {
            $c_id = 0;

            foreach( $cart as $c )
                $c_id = $c->id;

            $cart_update 				 = Cart::find( $c_id );
            $cart_update->user_id 		 = isset(Auth::user()->id) ? Auth::user()->id : 0;
            $cart_update->restaurant_id	 = $request->restaurant_id;
            $cart_id 	= $cart_update->save();
            $cart_id 	= $c_id;
        }

        $cartDetails_check = CartDetails::where("item_id", $request->id)
                                    ->where("item_type", $request->type)
                                    ->where("cart_id", $cart_id)
                                    ->get();

        if( !empty($cartDetails_check ) && count( $cartDetails_check ) > 0 ) {
            $cartDetails       = CartDetails::find( $cartDetails_check[0]->id );
            $previous_quantity = $cartDetails_check[0]->quantity;

        } else {
            $cartDetails       = new CartDetails();
            $previous_quantity = 0;

        }

        if( $request->type == "dish" )
            $product = Dish::find($request->id);
        else
            $product = Deal::find($request->id);

        $cartDetails->cart_id    =  $cart_id;
        $cartDetails->item_id    =  $request->id;
        $cartDetails->price      =  $product->price;
        $cartDetails->quantity   =  $previous_quantity + 1;
        $cartDetails->item_type  =  $request->type;

        $cartDetails->save();

        if( $request->type == "deal" )
        {
            $item_name = $product->deal_title;
        } else {
            $item_name = $product->dish_title;
        }

        $html = '<div class="cart_detail">
                    <div class="overlay-shadow">
                        <div class="overlay-inner">
                            <div class="close_btn"><a href="#" class="remove-cart-item" data-manual="'.$request->id.'" data-id="'.$request->type.'"><i class="fa fa-times-circle"></i></a> </div>
                        </div>
                    </div>
                    <div class="plus"><a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="plus"><span>+</span></a></div>
                    <div class="minus"><a href="#" data-id="{{$c->id}}" class="change-quantity" data-type="minus"><span>-</span></a> </div>
                    <div>
                        <p> <span>1 <small>x</small></span> 
                            '.$item_name.' <br>
                            '.strtoupper($request->type).'</p>
                    </div>
                </div>';

        return $html;
    }


    /**
    *
    */
    public function view_cart(Request $request)
    {

    }

    /**
     * Delete Item from Cart
     **/
    public function delete_item( Request $request )
    {
        $response = CartDetails::destroy( $request->id );

        if( $response == 1 )
        {
            return "Success";
        } else {
            return "Error";
        }
    }


    /**
     *	Change Quantity of Cart
     **/
    public function change_quantity(Request $request)
    {
        $item  = CartDetails::find( $request->id );
        $prev_quantity  = $item->quantity;

        if($request->action == "plus")
        {
            $prev_quantity += 1;
        } else {
            $prev_quantity -= 1;
        }

        $item->quantity = $prev_quantity;
        $response 		= $item->save();

        if( $response == 1 )
        {
            return $prev_quantity;
        } else {
            return "Error!";
        }
    }



    /**
     *	Checkout
     **/
    public function checkout(Request $request)
    {
        $session_key = app('App\Http\Controllers\SessionController')->get_session( $request );

        $cart = CartDetails::whereHas("Cart", function($query) use ($session_key) {
                            $query->where("session_key", $session_key);
                        })->get();
						
        if( empty( $cart ) || count( $cart ) <= 0 ) {
			return redirect(url('/'));
        } else {
			
			$cities = City::all();
			$cities_data = [];
			foreach( $cities as $city ) {
				$cities_data[$city->id] = $city->city_name;
			}
			
            return view("frontend.checkout")->with([
					"cart" => $cart,
					"cities" => $cities_data,
					]);
        }


    }


    /**
     *
     **/
    public function proceed_checkout( Request $request )
    {
		
        //dd( $request );

        $cart  = CartDetails::whereHas("Cart", function($query) use ($request) {
                            $query->where("id", $request->cart_id);
                        })->get();

        $restaurant = Restaurant::where("id", $request->restaurant_id)->get();
        //dd( $restaurant[0]->gst );

        $gst = round($request->net_amount * ($restaurant[0]->gst / 100));
        $extra_charges = 0;

        $order = new Order();
        $order->user_id 		= Auth::check() ? Auth::user()->id : 0;
        $order->restaurant_id   = $request->restaurant_id;
        $order->first_name      = $request->first_name;
        $order->last_name       = $request->last_name;
        $order->company			= $request->company;
        $order->address        	= $request->address1;
        $order->city			= $request->city;
        $order->email           = $request->email;
        $order->phone          	= $request->phone;
        $order->cell			= $request->cell;
        $order->dated			= Carbon::now();
        $order->net_amount		= $request->net_amount;
        $order->gst				= $gst;
        $order->total_amount 	= $request->net_amount + $gst + $extra_charges;
        $order->order_type		= $cart[0]->Cart[0]->order_type;
        $response1 = $order->save();


        $order_id =  $order->id;


        


        if( $response1 )
        {
            foreach( $cart as $c)
            {
				$orderdetails = new OrderDetail();
				
                if( $c->item_type == "deal" )
                {
                    $deal_id = $c->item_id;
                    $dish_id = 0;
                } else {
                    $deal_id = 0;
                    $dish_id = $c->item_id;
                }

                $orderdetails->order_id = $order_id;
                $orderdetails->dish_id	= $dish_id;
                $orderdetails->deal_id	= $deal_id;
                $orderdetails->price	= $c->price;
                $orderdetails->quantity	= $c->quantity;
                $response2 = $orderdetails->save();

                if( !$response2 ) {
                    return "An Error Generated in Order Placement.";
                }
				
            }
        } else {
            return "An Error Generated! Please! try again.";
        }

        if( $response1 && $response2 )
        {
			$order = Order::findOrFail($order_id);
			
			/*$emails = ['atiq@teamwork.com.pk', 'atiq@teamwork.com.pk'];
			
			Mail::send("mail.index", [], function($message) use ($emails)
			{    
				$message->to($emails)->subject('Your Order Saved');
			});
			
			/*Mail::to("atiq@teamwork.com.pk","atiq@teamwork.com.pk")->send( new OrderSaved( $order ) );
			
			return count( Mail::failures() );*/
			
			
			
			/*if( count(Mail::failures()) > 0 ) {
			   echo "There was one or more failures. They were: <br />";
			   foreach(Mail::failures as $email_address) {
				   echo " - $email_address <br />";
				}
			
			} else {
				echo "No errors, all sent successfully!";
			}*/
			
			Mail::to("atiq@teamwork.com.pk","atiq@teamwork.com.pk")->send( new OrderSaved( $order ) );
			
			if( count( Mail::failures() ) <= 0 )
			{
				return "Email Sent Successfully";
			} else {
				foreach(Mail::failures as $email_address) {
				   echo " - $email_address <br />";
				}	
			}
			
        }


    }


	public function update_checkout(Request $request)
	{
		$counter = 0;
		
		$ids = explode(",", $request->id);
		$quantity = explode(",", $request->quantity);
		
		foreach( $ids as $id)
		{
			if( $counter >= count( $quantity )-1 ) continue;
			
			$cart = CartDetails::find($id);
			$cart->quantity = $quantity[$counter++];
			$response = $cart->save();
			 	
		}
		
		if( $response == 1 )
		{
			return 'Success';	
		}
		
	}
}
