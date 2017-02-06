<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Deal;

use App\User;
use App\Area;
use App\Restaurant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;


class CommonController extends Controller
{
    /*
    *
    */
    public function __construct()
    {
        parent::__construct();
    }
    
    
    /*
    *	Get Dishes by Restaurant
    */
    function get_dishes_by_restaurant(Request $request)
    {
        $dishes = Dish::all()->where('restaurant_id', $request->id);
        $dishes_data = ""; //[""=> "Select Dish"];

        foreach( $dishes as $dish ) {
            $dishes_data .= "<option value='".$dish->id."'>".$dish->dish_title."</option>";
        }
        
        return $dishes_data;
    }
    
    
    
    
    /*
    *	Get Deals by Restaurant
    */
    function get_deals_by_restaurant(Request $request)
    {
        $deals = Deal::all()->where('restaurant_id', $request->id);
        $deals_data = "";
        foreach($deals as $deal) {$deals_data .= "<option value='".$deal->id."'>".$deal->deal_title."</option>";}
        return $deals_data;
    }
    
    
    /*
    *	Get Dishes by Restaurant
    */
    function get_dishes_by_restaurantt(Request $request)
    {
        $dishes = Dish::all()->where('restaurant_id', $request->id);
        $dishes_data = "";
        $arr_dishes = explode(",", $request->dishes);
        
        foreach( $dishes as $dish ) {
            //$dishes_data[$dish->id] = $dish->dish_title;
            $dishes_data .= "<option value='".$dish->id."' ".(in_array($dish->id, $arr_dishes)?"selected":"").">".$dish->dish_title."</option>";
        }
        
        return $dishes_data;
    }
    
    
    
    
    /*
    *	Get Deals by Restaurant
    */
    function get_deals_by_restaurantt(Request $request)
    {
        $deals = Deal::all()->where('restaurant_id', $request->id);
        $deals_data = "";
        $arr_deals = explode(",", $request->deals);
        
        foreach($deals as $deal) {
            $deals_data .= "<option value='".$deal->id."' ".(in_array($deal->id, $arr_deals)?"selected":"").">".$deal->deal_title."</option>";
        }
        return $deals_data;
    }
    
    
    /**
    *
    *
    */
    function get_user_details_byid(Request $request)
    {
        $user = User::find($request->id);
        $return = "";
        
        //dd( $users );
        
        $counter = 0;
        //foreach($users as $user)
        //{
            $return .= '<div class="row">
                            <div class="col-sm-offset-1 col-sm-2">
                                <label for="address" class="text-right">Delivery Address:</label>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Delivery Address" id="address" value="'.$user->address.'">
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-2">
                            <label for="phone" class="text-right">Phone:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input class="form-control" placeholder="Phone" id="phone" name="phone" value="'.$user->phone.'" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-2">
                            <label for="cell" class="text-right">Cell:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input class="form-control" placeholder="Cell" id="cell" name="cell" value="'.$user->cell.'" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-2">
                            <label for="email" class="text-right">Email Address:</label>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input class="form-control" placeholder="Email Address" id="email" required="required" name="email" value="'.$user->email.'" type="email">
                            </div>
                        </div>
                    </div>';
        return $return;
    }
    
    
    /**
    *
    *	Get Restaurants By keyworkd
    */
    public function get_restaurants_bykeyword(Request $request)
    {
        $restaurants = Restaurant::where('title', 'like' ,'%'.$request->keyword.'%')->get();
        $options = "";
        
        foreach( $restaurants as $restaurant)
            $options .= "<option value='".$restaurant->id."'>".$restaurant->title."</option>";
        
        echo $options;
    }
    
    
    /**
    *
    *	Get Areas of Restaurants
    */
    public function get_restaurants_areas(Request $request)
    {
        $area_list = new Area();
        
        $areaList = $area_list->get_all_area_forrestaurant($request, $request->restaurant_id);
        $options = "";
        
        foreach( $areaList as $area)
            $options .= "<option value='".$area->id."'>".$area->area_name."</option>";
        
        echo $options;
    }
    
    /**
    *
    *	Get Areas of City
    */
    public function get_city_areas(Request $request)
    {
        $area_list = new Area();
        $areaList = Area::where("city_id", $request->city_id)->get(); 
        $options = "";
        
        foreach( $areaList as $area)
        {
            $options .= "<option value='".$area->id."'>".$area->area_name."</option>";
        }
        
        echo $options;
    }
    
    

    /**
    * Get Dishes and Deals
    */
    public function search_dishes_page(Request $request)
    {
        $dishes = Dish::where("restaurant_id", $request->restaurants)->get();
        $deals = Deal::where("restaurant_id", $request->restaurants)->get();
        
        return view("frontend.listings")->with("dishes", $dishes)->with("deals", $deals);
        
        
    }
    
    /**
    *
    */
    public function get_restaurants_insearch(Request $request)
    {
        if( $request->type == "false")
        {
            $restaurants = Restaurant::where("city_id", $request->city)
                                ->where("is_takeaway_only", $request->type)
                                ->whereRaw("FIND_IN_SET(".$request->area.",area_ids)")
                                ->get();
        } else {
            $restaurants = Restaurant::where("city_id", $request->city)
                                ->get();
        }
        
        return view("frontend.restaurants")->with([
                "restaurants" 	=> $restaurants,
                'area_id'		=> $request->area,
                'order_type'	=> ($request->type =="false") ? "Delivery" : "Takeaway",
            ]);
        
    }
	
	
	public function is_restaurant_area(Request $request)
	{
		
		$restaurants = Restaurant::whereRaw("FIND_IN_SET(".$request->restaurant_id.", area_ids)")
						->where("id", $request->restaurant_id)
						->get();
		
		
		if( count( $restaurants ) > 0 ){
			return $restaurants[0]->title;
		} else {
			return "No";	
		}
		
		
	}
    
}
