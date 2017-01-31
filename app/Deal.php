<?php

namespace App;

use DB;
use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
	function fetch_deal_by_restaurant($request)
	{
		$deals = DB::table('deals as a')
        ->join('menu_categories as b', function ($join) {
          $join->on('b.id', '=', 'a.category_id');
        })
        ->select( ["a.*", "b.category_title"] )
        ->where('a.restaurant_id', $request->id)
        ->get();
   
        return $deals;	
	}
	
	
	function fetch_deal_byid($request)
	{
		$deals = DB::table('deals as a')
        ->join('menu_categories as b', function ($join) {
          $join->on('b.id', '=', 'a.category_id');
        })
		->join('restaurants as c', function ($join) {
          $join->on('c.id', '=', 'a.restaurant_id');
        })
        ->select( ["a.*", "b.category_title", "c.title as restaurant_title"])
        ->where('a.id', $request->id)
        ->get();
   
        return $deals;	
	}
}
