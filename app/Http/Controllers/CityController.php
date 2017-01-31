<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     *
     **/
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        parent::__construct();
    }


    /**
     *
     **/
    public function index(Request $request)
    {
        $cities = City::all();
        return view('city.index')->with('cities',$cities);
    }


    /**
     *
     **/
    public function delete_city(Request $request)
    {
        $response = City::destroy( $request->city_id );

        if( $response == 1)
        {
            return "Success";
        } else {

        }
    }
}
