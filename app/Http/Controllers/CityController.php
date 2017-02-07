<?php

namespace App\Http\Controllers;

use Validator;
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
	
	
	/**
    *  Controller Method to Add New City
    */
    public function new_city(Request $request)
    {
		
		
		$input = [
            "city_name" 	=> $request->city_name,
        ];


        $rules = [
            'city_name' 		=> 'unique:cities,city_name|required|min:3',
        ];

        $messages =  [
            'city_name.required' => 'Enter Restaurant Name.',
            'city_name.unique' 	 => 'City Name Already Exists',
        ];

        $validate = Validator::make($input,$rules, $messages);

        if($validate->passes())
        {
			$city = new City();
			$city->city_name = $request->city_name;
			$response = $city->save();
	
			if( $response == 1 ) {
				return "Success";
			} else {
				return $response;
			}
		} else {
			$messages = $validate->messages();
            $messages = json_decode( $messages );
            $message_html = "";

            foreach($messages as $index => $value) {
                $message_html .=  "<p>".$value[0]."</p>";
            }

            return $message_html;
		}
		
		
		
		
        
    }
	
	
	/**
    *	Get City by City_id
    */
    public function fetch_by_id(Request $request)
    {
        $city_result = City::find( $request->id );
		
		
        $returndata = '<div class="box-body">
          <input  type="hidden" name="id" id="id" value="' . $city_result->id . '"/>
          <input type="hidden" name="old_title" id="old_title" value="' . $city_result->city_title . '"/>
          <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type="text" name="city_name" id="city_name" value="' . $city_result->city_name . '"/>
          </div>
          
		  <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="Active" '.($city_result->status == "Active" ? "selected" : "").'>Active</option>
              <option value="Inactive" '.($city_result->status == "Inactive" ? "selected" : "").'>Inactive</option>
            </select>
          </div>
		  		            
        </div>';

        return $returndata;
    }
	

	/**
    *  Controller Method to Update New City
    */
    public function update_city(Request $request)
    {
        $city = City::find( $request->id );
        $city->city_name = $request->city_name;
        $city->status 	 = $request->status;
        $city_result 	 = $city->save();

        if( $city_result == 1 ) {
            return "Success";	
        } else {
            return $city_result;	
        }	
    }	
}
