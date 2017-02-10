<?php

namespace App;

use DB;
use Auth;
	
use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    
	protected $with = ["City"];
	
	public function city(){
        return $this->belongsTo('App\City');
    }
	
	
	/**
	*	Model Method to Get All Areas
	*/
	public function get_all_area($request) {
		if( isset( $request->id ) ) {
			$area_result = DB::table('areas as a')
				->join('cities as b', function ($join) {
				  $join->on('a.city_id', '=', 'b.id');
				})
				->select(["a.id as id", "a.area_name", "b.city_name", "a.status"])
				->orderby("a.area_name")
				->where('a.id', $request->id)
				->get();
		} else {
			$area_result = DB::table('areas as a')
				->join('cities as b', function ($join) {
				  $join->on('a.city_id', '=', 'b.id');
				})
				->select(["a.id as id", "a.area_name", "b.city_name", "a.status" ])
				->orderby("a.area_name")
				->get();
		}
        return $area_result;
    }
	
	
	
	/**
	*	Model Method to Get All Areas
	*/
	public function get_all_area_forrestaurant($request, $rest_id = 0) 
	{		
		/*
			SELECT GROUP_CONCAT(a.area_name) FROM restaurants i, areas a 
WHERE FIND_IN_SET(a.id, i.area_ids) 
GROUP BY i.area_ids
		*/
		
		$restaurant_id = ($rest_id<=0)?Auth::user()->restaurant_id:$rest_id;
		//echo $restaurant_id;
			
		$area_ids = DB::table('restaurants as a')
				->select(["a.area_ids"])
				->where('a.id', $restaurant_id)
				->get();
		
		$area_data = "";
		foreach( $area_ids as $area ) {
			$area_data = explode(",", $area->area_ids);
		}
		
		$area_result = DB::table('areas as a')
			->join('cities as b', function ($join) {
			  $join->on('a.city_id', '=', 'b.id');
			})
			->select(["a.id as id", "a.area_name", "b.city_name", "a.status"])
			->whereIn('a.id', $area_data )
			->get();

        return $area_result;
    }
	
}
