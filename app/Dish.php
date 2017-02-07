<?php

namespace App;

use DB;
use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Dish extends Model
{
	
//	protected $with = ["Restaurant"];
	
	/**
	 *
	 **
	public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id');
    }
	
	
	/**
	*
	*/
	function fetch_dish_by_restaurant($request)
	{
		$dishes = DB::table('dishes as a')
        ->join('menu_categories as b', function ($join) {
          $join->on('b.id', '=', 'a.category_id');
        })
        ->select( ["a.*", "b.category_title"] )
        ->where('a.restaurant_id', $request->id)
        ->get();
   
        return $dishes;	
	}
	
	/**
	*
	*/
	function fetch_dish_byid($request)
	{
		$dishes = DB::table('dishes as a')
        ->join('menu_categories as b', function ($join) {
          $join->on('b.id', '=', 'a.category_id');
        })
		->join('restaurants as c', function ($join) {
          $join->on('c.id', '=', 'a.restaurant_id');
        })
        ->select( ["a.*", "b.category_title", "c.title as restaurant_title"])
        ->where('a.id', $request->id)
        ->get();
   
        return $dishes;	
	}
}
