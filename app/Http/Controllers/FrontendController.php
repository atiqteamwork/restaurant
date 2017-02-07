<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use App\City;
use App\Restaurant;
use App\Area;
use App\MenuCategory;

use App\Cart;
use	App\CartDetails;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    protected $session_key;
    
    /*
    *	
    */
    public function __construct()
    {
        parent::__construct();
    }
    

    /*
    *
    */
    public function index(Request $request)
    {	
        $cities = City::all();
        $cities_data = [];
        
        foreach( $cities as $city ) {
            $cities_data[$city->id] = $city->city_name;
        }
        
        return view("frontend.index")->with([
            'cities' => $cities_data,
			'restaurants' => Restaurant::limit(30)->get(),
        ]);
    }
    
    /**
     * Search Dish Page
     **/
    public function search_dishes_page($id, $title, $area_id, Request $request)
    {			
        $session_key = app('App\Http\Controllers\SessionController')->get_session( $request );
        $session_key = app('App\Http\Controllers\SessionController')->get_session( $request );
        
        $order_type = explode( "+" ,$title);
        $order_type = $order_type[ count( $order_type  ) -1];
        
        $restaurants = Restaurant::where("id", $id)->get();
        $categories  = MenuCategory::get();
        $cart		 = CartDetails::whereHas("Cart", function($query) use ($session_key) {
                            $query->where("session_key", $session_key)
							->where('status', 'Active');
                        })->get();
		
        if( !empty( $cart ) && count( $cart ) > 0 )
        {
            if( $cart[0]->Cart[0]->restaurant_id != $id ) {
                $cart_id = Cart::where("session_key", $session_key)->get();
            
                Cart::destroy( $cart_id[0]->id );
                CartDetails::where("cart_id", $cart_id[0]->id)->delete();
                
                $cart = CartDetails::whereHas("Cart", function($query) use ($session_key) {
                            $query->where("session_key", $session_key);
                        })->get();
            }
        }
		
		
        
        $area = Area::where("id", $area_id)->get();
		
        $dishes_ids = [];
        $deals_ids  = [];
        
        foreach( $restaurants[0]->Dishes as $dish)
            $dishes_ids[] = $dish->category_id;
        
        
        foreach( $restaurants[0]->Deals as $deal)
            $deals_ids[] = $deal->category_id;

        
        //dd( $restaurants );
        
        return view("frontend.listings2")->with([
                "restaurants"  	=> $restaurants,
                "categories"  	=> $categories,
                "area"     		=> $area,
                "dish_ids" 		=> $dishes_ids,
                "deal_ids" 		=> $deals_ids,
                "cart"			=> $cart,
                "order_type"	=> $order_type,
        ]);
    }
}
