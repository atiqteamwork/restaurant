<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use App\City;
use App\Area;
use App\MenuCategory;
use App\RestaurantMenu;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RestaurantController extends Controller
{
    /**
      *
      * Create a new controller instance.
      */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }



    /**
    *	Restaurants List Main Page
    */
    public function index()
    {
        $restaurant_list = Restaurant::all();
		
        $cities = City::all();
        $cities_data = [""=> "Select City"];
        foreach( $cities as $city ) {
            $cities_data[$city->id] = $city->city_name;
        }

        return view("restaurants.index")->with([
                "restaurants" => $restaurant_list,
                "cities"	=> $cities_data,
                ]);
    }



    /**
    *	Add new Restaurant Page
    */
    public function new_restaurant_page(Request $request)
    {
        $cities = City::all();

        $area_list = new Area();
        $areas = $area_list->get_all_area($request);

		$categories = MenuCategory::all();
		
        $cities_data = [];
        $areas_data = [];
		$categories_data = [];

        foreach( $cities as $city ) { $cities_data[$city->id] = $city->city_name; }
        foreach( $areas as $area ) { $areas_data[$area->id] = $area->area_name; }
		foreach( $categories as $category ) { $categories_data[$category->id] = $category->category_title; }

        return view("restaurants.new")->with([
				"cities" => $cities_data,
				"areas"  => $areas_data,
				"categories" => $categories_data,
				]);
    }


    /**
    *
    *	Save new Restaurant
    */
    public function add_new_restaurant(Request $request)
    {

        $input = [
            "title" 	=> $request->title,
            "email"		=> $request->email,
            "address"	=> $request->address,
            "phone_primary" => $request->phone_primary,
            "open_time" 	=> $request->open_time,
            "close_time"	=> $request->close_time,
        ];


        $rules = [
            'title' 	=> 'required|min:3',
            'email'		=> 'unique:restaurants,email',
            'address' 	=> 'required|min:30',
            'phone_primary' 	=> 'required',
            'open_time'		=> 'required|date_format:H:i',
            'close_time'	=> 'required|date_format:H:i',
        ];

        $messages =  [
            'title.required' 	=> 'Enter Restaurant Name.',
            'address.required' 	=> 'Enter Address for Delivery',
            'phone_primary.required' 	=> 'Enter Phone so delivery person can contact you.',
            'dated.required'	=> 'Date & Time Field is required',
        ];

        $validate = Validator::make($input,$rules, $messages);

        if($validate->passes())
        {		
			$logo_fileName 	 = "";
			$banner_fileName = "";
			
			if (Input::hasFile('logo'))
			{
				if (Input::file('logo')->isValid()) {
					$destinationPath = 'assets/images/restaurants';
					$extension = Input::file('logo')->getClientOriginalExtension();
					$logo_fileName = "logo_".date("YmdHis").rand(111,999).'.'.$extension;
					Input::file('logo')->move($destinationPath, $logo_fileName);
				  
				} else {
					return redirect()->back()
						->with("error", "Logo Could be Uploaded.")
						->withInput(Input::all());
				}
			}
			
			if (Input::hasFile('banner'))
			{
				if (Input::file('banner')->isValid()) {
					$destinationPath = 'assets/images/restaurants';
					$extension = Input::file('banner')->getClientOriginalExtension();
					$banner_fileName = "banner_".date("YmdHis").rand(111,999).'.'.$extension; 
					Input::file('banner')->move($destinationPath, $banner_fileName);
				  
				} else {
					return redirect()->back()
						->with("error", "Banner Could be Uploaded.")
						->withInput(Input::all());
				}
			}
			
			
            $areas = implode(",", $request->area_ids);
			$menu_categories = implode(",", $request->menu_categories);
            $restaurant = new Restaurant;

            $restaurant->city_id		= $request->city_id;
            $restaurant->title			= $request->title;
            $restaurant->description 	= $request->description;
            $restaurant->email 			= $request->email;
            $restaurant->address 		= $request->address;
            $restaurant->phone_primary 	= $request->phone_primary;
            $restaurant->phone_secondary =$request->phone_secondary;
            $restaurant->contact_person	= $request->contact_person;
            $restaurant->contact_phone	= $request->contact_phone;
            $restaurant->contact_email	= $request->contact_email;
            $restaurant->cell			= $request->cell;
			$restaurant->logo			= $logo_fileName;
			$restaurant->banner			= $banner_fileName;
            $restaurant->open_time 		= date("H:i:s", strtotime($request->open_time));
            $restaurant->close_time 	= date("H:i:s", strtotime($request->close_time));
            $restaurant->is_takeaway_only = $request->is_takeaway_only;
            $restaurant->area_ids = $areas;
			$restaurant->menu_categories = $menu_categories;
            $restaurant->outof_area_charges	= $request->outof_area_charges;

            $result = $restaurant->save();

            if( $result == 1 ) 
			{	
				foreach( $request->menu_categories as $category )
				{
					$menu = new RestaurantMenu();
					
					$menu->restaurant_id = $restaurant->id;
					$menu->menu_id		= $category;
					$response =  $menu->save();
					
					if( $response != 1 )
						return $response;
				}
				
				
				return redirect()->back()->with("success", "New Restaurant Added");
			
				
            } else {
                return redirect()->back()->with("error", "An Error Occured")->withInput(Input::all());
            }
        }
        else
        {
            $messages = $validate->messages();
            $messages = json_decode( $messages );
            $message_html = "";

            foreach($messages as $index => $value) {
                $message_html .=  "<p>".$value[0]."</p>";
            }


			return redirect()->back()->with("error", $message_html)->withInput(Input::all());
        }

    }


    /*
    *
    */
    function validateTime($time_value)
    {
        //echo $time_value."<bR>";
        echo date("h:i:s", strtotime( $time_value ));
        $pattern1 = '/^(0?\d|1\d|2[0-3]):[0-5]\d:[0-5]\d$/';
        $pattern2 = '/^(0?\d|1[0-2]):[0-5]\d\s(am|pm)$/i';

        if( preg_match($pattern1, $time_value) || preg_match($pattern2, $time_value) ) {
            echo "t";
        } else {
            echo "pp";
        }
    }

    /**
    *	Update Restaurant
    */
    public function update_restaurant(Request $request)
    {
        $restaurant = Restaurant::find($request->id);

        $restaurant->city_id		= $request->city_id;
        $restaurant->title			= $request->title;
        $restaurant->description 	= $request->description;
        $restaurant->email 			= $request->email;
        $restaurant->address 		= $request->address;
        $restaurant->phone_primary 	= $request->phone_primary;
        $restaurant->phone_secondary =$request->phone_secondary;
        $restaurant->contact_person	= $request->contact_person;
        $restaurant->contact_phone	= $request->contact_phone;
        $restaurant->contact_email	= $request->contact_email;
        $restaurant->cell			= $request->cell;
        $restaurant->open_time 		= date("h:i:s", strtotime($request->open_time));
        $restaurant->close_time 	= date("h:i:s", strtotime($request->close_time));
        $restaurant->is_takeaway_only = $request->is_takeaway_only;
        $restaurant->area_ids = serialize( $request->is_takeaway_only );
        $restaurant->outof_area_charges	= $request->outof_area_charges;
        $restaurant->status = $request->status;

        $result = $restaurant->save();

        if( $result == 1 ) {
            return redirect()->back()->with('status', 'Restaurant Updated');
        } else {
            return redirect()->back()->with('error', 'Error Generated while Updating Restaurant.');
        }
    }


    /**
    *	Fetch Restaurant by ID
    */
    public function fetch_by_id(Request $request)
    {
        $restaurant = Restaurant::find($request->id);
		$areas = Area::whereIn("id", explode(",",$restaurant->area_ids))->get();
		
		$restaurant_areas = "";
		
		foreach( $areas as $area )
		{
			$restaurant_areas .= "<span>".$area->area_name."</span>, ";
		}
		
        if( isset( $request->is_view ) ) {
            $returndata = '<div class="box-body">
            <table class="table table-bordered table-striped">
                <tr><th>Restaurant Name</th><td>'.$restaurant->title.'</td></tr>
				<tr><th>City</th><td>Faisalabad</td></tr>
				<tr><th>Areas</th><td>'.$restaurant_areas.'</td></tr>
                <tr><th>Description</th><td>'.$restaurant->description.'</td></tr>
                <tr><th>Email Address</th><td>'.$restaurant->email.'</td></tr>
                <tr><th>Address</th><td>'.$restaurant->address.'</td></tr>
                <tr><th>Primary Phone</th><td>'.$restaurant->phone_primary.'</td></tr>
                <tr><th>Secondary Phone</th><td>'.$restaurant->phone_secondary.'</td></tr>
                <tr><th>Cell Phone</th><td>'.$restaurant->cell.'</td></tr>
                <tr><th>Contact Person</th><td>'.$restaurant->contact_person.'</td></tr>
                <tr><th>Cotact Phone</th><td>'.$restaurant->contact_phone.'</td></tr>
                <tr><th>Contact Email</th><td>'.$restaurant->contact_email.'</td></tr>
                <tr><th>Opening Time</th><td>'.date("h:i:s a", strtotime($restaurant->open_time)).'</td></tr>
                <tr><th>Closing Time</th><td>'.date("h:i:s a", strtotime($restaurant->close_time)).'</td></tr>
                <tr><th>Restaurant Type</th><td>'.($restaurant->is_takeaway_only = 'true' ? 'Takeaway' : 'Delivery + Takeaway').'</td></tr>
            </table>
        </div>';


        } else {
            $cities = City::all();

            $city_option = "";
            foreach( $cities as $city ) {
                $city_option .= "<option value='".$city->id."' ".($restaurant->city_id == $city->id ? 'selected' :'').">".$city->city_name."</option>";
            }


            $returndata = '<div class="box-body">
          <input  type="hidden" name="id" id="id" value="' . $restaurant->id . '"/>
          <input type="hidden" name="old_title" id="old_title" value="' . $restaurant->title . '"/>
          
          <div class="form-group">
            <label>City</label>
            <select name="city_id" class="form-control">
              '.$city_option.'
            </select>
          </div>
		  
		  <div class="form-group">
		      <label>Logo</label>
			  <img width="40%" src="'.getenv('APP_URL').'/assets/images/restaurants'.'/'.$restaurant->logo.'" alt="Logo Image">
			  <input type="file" name="logo" id="logo"/>
          </div>
		  
		  <div class="form-group">
		      <label>Banner Image</label>
			  <img width="70%" src="'.getenv('APP_URL').'/assets/images/restaurants'.'/'.$restaurant->banner.'" alt="Logo Image">
			  <input type="file" name="logo" id="logo"/>
          </div>
                

          <div class="form-group">
            <label>Restaurant Name</label>
            <input class="form-control" type="text" name="title" id="title" value="'.$restaurant->title.'" required="required"/>
          </div>		  
          
          <div class="form-group">
            <label>Description</label>
            <input class="form-control" type="text" name="description" id="description" value="'.$restaurant->description.'"/>
          </div>
          
          <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" name="email" id="email" value="'.$restaurant->email.'" required="required"/>
          </div>
          
          
          <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" name="address" id="address" value="'.$restaurant->address.'" required="required"/>
          </div>
          
         <div class="form-group">
            <label>Primary Phone</label>
            <input class="form-control" type="text" name="phone_primary" id="phone_primary" value="'.$restaurant->phone_primary.'" required="required"/>
          </div>
          
          <div class="form-group">
            <label>Secondary Phone</label>
            <input class="form-control" type="text" name="phone_secondary" id="phone_secondary" value="'.$restaurant->phone_secondary.'"/>
          </div>
          
          <div class="form-group">
            <label>Cell Phone</label>
            <input class="form-control" type="text" name="cell" id="cell" value="'.$restaurant->cell.'"/>
          </div>
          
          <div class="form-group">
            <label>Contact Person</label>
            <input class="form-control" type="text" name="contact_person" id="contact_person" value="'.$restaurant->contact_person.'"/>
          </div>
          
          <div class="form-group">
            <label>Contact Phone</label>
            <input class="form-control" type="text" name="contact_phone" id="contact_phone" value="'.$restaurant->contact_phone.'"/>
          </div>
          
          <div class="form-group">
            <label>Contact Email</label>
            <input class="form-control" type="text" name="contact_email" id="contact_email" value="'.$restaurant->contact_email.'" required="required"/>
          </div>
          
          <div class="form-group">
            <label>Opening Time</label>
            <input class="form-control" type="time" name="open_time" id="open_time" value="'.$restaurant->open_time.'"/>
          </div>
          
          <div class="form-group">
            <label>Closing Time</label>
            <input class="form-control" type="time" name="close_time" id="close_time" value="'.$restaurant->close_time.'"/>
          </div>
          
          <div class="form-group">
            <label>Restaurant Type</label>
            <select name="is_takeaway_only" class="form-control">
              <option value="true" '.($restaurant->is_takeaway_only == "true"?"selected=selected":"").'>Takeaway Only</option>
              <option value="false" '.($restaurant->is_takeaway_only== "false"?"selected=selected":"").'>Delivery & Takeaway</option>
            </select>
          </div>
          
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
              <option value="Active" '.($restaurant->status == "Active"?"selected=selected":"").'>Active</option>
              <option value="Inactive" '.($restaurant->status == "Inactive"?"selected=selected":"").'>Inactive</option>
            </select>
          </div>
        </div>';
        }

        return $returndata;
    }


    /**
    * Delete Restaurant
    */
    public function delete_restaurant()
    {
        $restaurant_result = Restaurant::destroy( $_POST["restaurant_id"] );

        if( $restaurant_result == 1 ) {
            return "Success";
        } else {
            return $restaurant_result;	
        }	
    }

}
