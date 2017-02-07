<?php

namespace App;

use DB;
use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
	
	protected $with = ["Restaurant", 'OrderDetail', 'City', 'Area', 'ShippingCity'];
	
	/**
	 *	
	 **/
	public function restaurant()
    {
       return $this->hasOne('App\Restaurant', "id", "restaurant_id");
    }
	
	
	 /**
     * 
     */
    public function orderdetail()
    {
       return $this->hasMany('App\OrderDetail', "order_id", "id");
    }
	
	/**
	 *
	 **/
	public function city()
    {
        return $this->belongsTo('App\City', "city", "id");
    }
	
	/**
	 *
	 **/
	public function shippingcity()
    {
        return $this->belongsTo('App\City', "shipping_city", "id");
    }
	
	
	/**
	 *
	 **/
	public function area()
    {
        return $this->belongsTo('App\Area', "area_id", "id");
    }
	
	/**
	 *
	 **/
	public function user()
    {
        return $this->belongsTo('App\User', "user_id", "id");
    }
	
    
	/*
	*
	*/
	function fetch_orders_by_restaurants($request)
	{		
		$orders = DB::table('orders as a')
			->join('users as b', function ($join) {
				$join->on('b.id', '=', 'a.user_id');
			})
			->join('restaurants as c', function ($join) {
				$join->on('c.id', '=', 'a.restaurant_id');
			})
			->select( ["a.id as id", "a.address as order_address", "a.phone as order_phone","a.email as order_email","a.cell as order_cell", "a.status as status", "a.net_amount","a.gst","a.total_amount", "b.full_name as user_full_name", "c.title as restaurant_title", "c.phone_primary as restaurant_phone", "c.cell as restaurant_cell", "c.address as restaurant_address", "c.email as restaurant_email"] )

			->where('a.restaurant_id', $request->id)
			->get();
   
        return $orders;
	}
		
		
		
	
	/**
	*	Search by Filters
	**/
	function search_filter($request)
	{
		$restaurant_id =(Auth::user()->role_id == 1 ) ? $request->restaurants_list : Auth::user()->restaurant_id;
	
		$filter = $request->filter;
		$from_date = "";
		$to_date = "";
		
		
		$result = DB::table('orders as a')
			->join('users as b', function ($join) {
				$join->on('b.id', '=', 'a.user_id');
			})
			->join('restaurants as c', function ($join) {
				$join->on('c.id', '=', 'a.restaurant_id');
			})
			->select( ["a.id as id", "a.address1 as order_address", "a.phone as order_phone","a.email as order_email","a.cell as order_cell", "a.status as status", "a.net_amount","a.gst","a.total_amount", "a.dated", "b.full_name as user_full_name", "c.title as restaurant_title", "c.phone_primary as restaurant_phone", "c.cell as restaurant_cell", "c.address as restaurant_address", "c.email as restaurant_email"] );
			
			if( isset( $request->restaurants_list ) && !empty( $request->restaurants_list ) )
			{
				$result->where('a.restaurant_id', $request->restaurants_list);	
			} else {
				if( Auth::user()->role_id != 1 ) {
					$result->where('a.restaurant_id', Auth::user()->restaurant_id);
				}
			}
			
		
		
			/// Conditional Where for Query Builder
			switch( $filter )
			{
				case "filter_previous_year":
					$result->whereYear('a.dated', '=', date("Y", strtotime("-1 Year")));
					break;
				
				case "filter_this_year":
					$result->whereYear('a.dated', '=', date("Y"));
					break;
					
				case "filter_previous_month":
					$result->whereYear('a.dated', '=', date("Y"));
					$result->whereMonth('a.dated', '=', date("m", strtotime("-1 Month")));
					break;
					
				case "filter_this_month":
					$result->whereYear('a.dated', '=', date("Y"));
					$result->whereMonth('a.dated', '=', date("m"));
					break;
					
				case "filter_previous_week":	
					$from_date = strtotime("last sunday midnight", strtotime("-1 week +1 day"));
					$to_date = strtotime("next sunday",$from_date);
					
					$from_date = date("Y-m-d",$from_date);
					$to_date = date("Y-m-d",$to_date);
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
					
				case "filter_this_week":	
					$from_date = strtotime("last sunday midnight");
					$to_date = strtotime("next sunday",$from_date);
					
					$from_date = date("Y-m-d",$from_date);
					$to_date = date("Y-m-d",$to_date);
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
					
				case "filter_between":
					$from_date = date("Y-m-d", strtotime($request->from_date));
					$to_date = date("Y-m-d", strtotime($request->to_date));
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
				
			}
			
			$orders = $result->get();
			//dd($orders);
			return $orders;
	}
	
	
	function search_filter_user($request)
	{	
	
		$filter 	= $request->filter;
		$from_date 	= "";
		$to_date 	= "";
		
		
		$result = DB::table('orders as a')
			->join('users as b', function ($join) {
				$join->on('b.id', '=', 'a.user_id');
			})
			->join('restaurants as c', function ($join) {
				$join->on('c.id', '=', 'a.restaurant_id');
			})
			->select( ["a.id as id", "a.address1 as order_address", "a.phone as order_phone","a.email as order_email","a.cell as order_cell", "a.status as status", "a.net_amount","a.gst","a.total_amount", "a.dated", "b.full_name as user_full_name", "c.title as restaurant_title", "c.phone_primary as restaurant_phone", "c.cell as restaurant_cell", "c.address as restaurant_address", "c.email as restaurant_email"] );
			
			/*if( isset( $request->restaurants_list ) && !empty( $request->restaurants_list ) )
			{
				$result->where('a.restaurant_id', $request->restaurants_list);	
			} else {
				if( Auth::user()->role_id != 1 ) {
					$result->where('a.restaurant_id', Auth::user()->restaurant_id);
				}
			}*/
			
		
		
			/// Conditional Where for Query Builder
			/*switch( $filter )
			{
				case "filter_previous_year":
					$result->whereYear('a.dated', '=', date("Y", strtotime("-1 Year")));
					break;
				
				case "filter_this_year":
					$result->whereYear('a.dated', '=', date("Y"));
					break;
					
				case "filter_previous_month":
					$result->whereYear('a.dated', '=', date("Y"));
					$result->whereMonth('a.dated', '=', date("m", strtotime("-1 Month")));
					break;
					
				case "filter_this_month":
					$result->whereYear('a.dated', '=', date("Y"));
					$result->whereMonth('a.dated', '=', date("m"));
					break;
					
				case "filter_previous_week":	
					$from_date = strtotime("last sunday midnight", strtotime("-1 week +1 day"));
					$to_date = strtotime("next sunday",$from_date);
					
					$from_date = date("Y-m-d",$from_date);
					$to_date = date("Y-m-d",$to_date);
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
					
				case "filter_this_week":	
					$from_date = strtotime("last sunday midnight");
					$to_date = strtotime("next sunday",$from_date);
					
					$from_date = date("Y-m-d",$from_date);
					$to_date = date("Y-m-d",$to_date);
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
					
				case "filter_between":
					$from_date = date("Y-m-d", strtotime($request->from_date));
					$to_date = date("Y-m-d", strtotime($request->to_date));
					
					$result->whereBetween('a.dated', [$from_date, $to_date]);
					break;
				
			}*/
			
			$orders = $result->get();
			dd($orders);
			return $orders;
	}
	

	/**
	*
	*/
	function get_orders_byid($request)
	{
		$orders = DB::table('orders as a')
			->join('order_details as b', function ($join) {
				$join->on('b.order_id', '=', 'a.id');
			})
			->leftjoin('dishes as e', function ($join) {
				$join->on('e.id', '=', 'b.dish_id');
			})
			->leftjoin('deals as f', function ($join) {
				$join->on('f.id', '=', 'b.deal_id');
			})
			->join('users as d', function ($join) {
				$join->on('d.id', '=', 'a.user_id');
			})
			->join('restaurants as c', function ($join) {
				$join->on('c.id', '=', 'a.restaurant_id');
			})
			->select( ["a.id as id", "a.address as order_address", "a.phone as order_phone","a.email as order_email","a.cell as order_cell", "a.status as status", "a.net_amount","a.gst","a.total_amount", "a.dated", "e.dish_title", "f.deal_title", "b.price", "b.quantity", "d.full_name", "c.title as restaurant_title", "c.phone_primary as restaurant_phone", "c.cell as restaurant_cell", "c.address as restaurant_address", "c.email as restaurant_email"] )
			->where('a.id', $request->id)
			//->where('deal_id','>','0')
			->get();

		return $orders;
			
	}
	
	/**
	*
	*/
	function fetch_details_byid($request)
	{
		$order_details = DB::table('order_details as a')
			/*->join('order_details as b', function ($join) {
				$join->on('b.order_id', '=', 'a.id');
			})*/
			->leftjoin('dishes as b', function ($join) {
				$join->on('b.id', '=', 'a.dish_id');
			})
			->leftjoin('deals as c', function ($join) {
				$join->on('c.id', '=', 'a.deal_id');
			})
			/*->join('users as d', function ($join) {
				$join->on('d.id', '=', 'a.user_id');
			})
			->join('restaurants as c', function ($join) {
				$join->on('c.id', '=', 'a.restaurant_id');
			})*/
			->select( ["a.id as id", "dish_id", "deal_id", "b.dish_title", "c.deal_title", "a.price", "a.quantity"] )
			->where('a.order_id', $request->order_id)
			->get();
		return $order_details;
			
	}
	
}
