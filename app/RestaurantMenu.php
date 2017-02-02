<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    public function MenuCategory(){
        return $this->belongsTo('App\MenuCategory', 'menu_id');
    }
}
