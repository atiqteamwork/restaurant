<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    //
	
	protected $with = ["Cart", "Dishes", "Deals"];
	
	 /**
     * 
     */
    public function cart()
    {
       return $this->hasMany('App\Cart', "id", "cart_id");
    }
	
	/**
     * 
     */
    public function dishes()
    {
       return $this->hasMany('App\Dish', "id", "item_id");
    }
	
	/**
     * 
     */
    public function deals()
    {
       return $this->hasMany('App\Deal', "id", "item_id");
    }
	
}
