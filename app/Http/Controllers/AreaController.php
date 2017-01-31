<?php

namespace App\Http\Controllers;

use Auth;
use App\Area;
use App\Restaurant;

use App\City;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class AreaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
		
	
	/**
	*	Load All Areas
	*/
	public function index(Request $request)
	{
		$this->user_role = Auth::user()->role_id;
		
		$cities = City::all();
		$cities_data = [""=> "Select City"];
		foreach( $cities as $city ) {
			$cities_data[$city->id] = $city->city_name;
		}
		
		if( $this->user_role == 1 )
		{
			$area_list = new Area();
    	    $areaList = $area_list->get_all_area($request);
	        return view('area.index')->with([
				'areaList' => $areaList,
				'cities'	=> $cities_data,
				]);	
			
			
		} else {
			$area_list = new Area();
    	    $areaList = $area_list->get_all_area_forrestaurant($request);			
			$allareas = $area_list->get_all_area($request);
			
			$allareas_data = [""=> "Select Restaurant"];
			$areas_selected = [];
		
			foreach( $allareas as $allarea ) {
				$allareas_data[$allarea->id] = $allarea->area_name;
			}
			
			foreach( $areaList as $al ) {
				$areas_selected[] = $al->id;
			}
			
			
	        return view('area.rindex')->with([
					'allareas' => $allareas_data,
					'areas_selected' => $areas_selected,
					'cities'	=> $cities_data,
					]);
		}
		
	}
		
	
	/**
	*	Get Area by area_id
	*/
	public function fetch_by_id(Request $request)
	{
		$area_result = Area::find( $request->id );
		
		$cities = City::all();
		
		$city_option = "";
		foreach( $cities as $city ) {
			$city_option .= "<option value='".$city->id."' ".($area_result->city_id == $city->id ? 'selected' :'').">".$city->city_name."</option>";
		}
		
		
		

        $returndata = '<div class="box-body">
          <input  type="hidden" name="id" id="id" value="' . $area_result->id . '"/>
		  <input type="hidden" name="old_title" id="old_title" value="' . $area_result->area_title . '"/>
          <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type="text" name="area_name" id="area_name" value="' . $area_result->area_name . '"/>
          </div>
          
          <div class="form-group">
            <label>City</label>
            <select name="city_id" class="form-control">
              '.$city_option.'
            </select>
          </div>
		  
		  <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="Active" '.($area_result->status == "Active" ? "selected" : "").'>Active</option>
			  <option value="Inactive" '.($area_result->status == "Inactive" ? "selected" : "").'>Inactive</option>
            </select>
          </div>
        </div>';

        return $returndata;
	}
	
	
	/**
	*  Controller Method to Add New Area
	*/
	public function new_area(Request $request)
	{
		$area = new Area();
		$area->area_name = $request->area_name;
		$area->city_id = $request->city_id;
		$category_result = $area->save();

		if( $category_result == 1 ) {
			return "Success";
		} else {
			return $category_result;	
		}		
	}
	
	
	/**
	*  Controller Method to Update New Area
	*/
	public function update_area(Request $request)
	{
		$area = Area::find( $request->id );	
		$area->area_name = $request->area_name;
		$area->city_id = $request->city_id;
		$area->status = $request->status;
		$area_result = $area->save();

        if( $area_result == 1 ) {
            return "Success";	
        } else {
            return $area_result;	
        }	
	}
	
	
	/**
	*
	*/
	public function delete_area()
	{
		$area_result = Area::destroy( $_POST["area_id"] );
		
		if( $area_result == 1 ) {
            return "Success";	
        } else {
            return $area_result;	
        }	
	}
	
	
	/**
	*
	*/
	public function update_restaurant_areas(Request $request)
	{
		$restaurant = Restaurant::find(Auth::user()->restaurant_id);
		$areas = implode(",", $request->area_ids);
			
		$restaurant->area_ids = $areas;
		$result = $restaurant->save();
		
		if( $result == 1 ) {
            return "Success";	
        } else {
            return $result;	
        }
		
	}
	
	
}
