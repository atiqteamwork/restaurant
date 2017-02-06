<?php

namespace App;

use DB;
use Auth;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	protected $with = ["Dishes", "Deals",];
     /**
     * 
     */
    public function Order()
    {
       return $this->belongsTo('App\Order', "order_id", "id");
    }
	
	/**
	 *
	 **/
	public function dishes()
    {
        return $this->hasMany('App\Dish', "id", "dish_id");
    }
	
	/**
	 *
	 **/
	public function deals()
    {
        return $this->hasMany('App\Deal', "id", "deal_id");
    }
}
