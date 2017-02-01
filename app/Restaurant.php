<?php

namespace App;

use DB;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	
	protected $with = ["Dishes", "Deals", "City", "Menus"];
	
    /**
	*	It will Load Restaurants Names with ID.
	*/
	function get_restaurent_names()
	{
		$restaurantList = DB::table('restaurants')
        ->select( ["id", "title", "address"] )
        ->get();
   
        return $restaurantList;
	}
	
	
	/**
	 *
	 **/
	public function dishes()
    {
        return $this->hasMany('App\Dish', "restaurant_id", "id");
    }
	
	/**
	 *
	 **/
	public function deals()
    {
        return $this->hasMany('App\Deal', "restaurant_id", "id");
    }
	
	/**
	 *
	 **/
	public function city()
    {
        return $this->hasOne('App\City', "id", "city_id");
    }
	
	/**
	 *
	 **/
	public function menus()
    {
        return $this->hasManyThrough('App\MenuCategory', 'App\RestaurantMenu', "restaurant_id", "id");
    }
}
