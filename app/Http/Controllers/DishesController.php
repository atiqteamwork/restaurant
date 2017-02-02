<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use App\Dish;
use App\MenuCategory;
use App\RestaurantMenu;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DishesController extends Controller
{
    protected $user_role = 0;
    
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    
    /**
    *	Show List of Restuarants on Dishes page
    */
    public function index()
    {	
        $this->user_role = Auth::user()->role_id;
        
        if( $this->user_role == 1 )
            return ($this->index_admin());
        else 
            return ($this->index_restaurant());
    }
    
	
	
    
    /*
    *	Dishes Page for Administrator
    */
    public function index_admin()
    {

        $restaurants = Restaurant::get(['id', 'title']);
		//dd( $restaurants );
				
		
        $categories  = MenuCategory::get(['id', 'category_title']);
        
        $restaurants_data = [""=> "Select Restaurant"];
        $categories_data = [""=> "Select Dish Category"];
        
        foreach( $restaurants as $restaurant ) {
            $restaurants_data[$restaurant->id] = $restaurant->title;
        }
        
        foreach( $categories as $category ) {
            $categories_data[$category->id] = $category->category_title;
        }
        
        return view("restaurants.dishes")
            ->with("restaurants", $restaurants_data)
            ->with("categories", $categories_data);	
    }
    
    
    /*
    *	Dishes Page for Restaurant
    */
    public function index_restaurant()
    {
        $categories  = MenuCategory::get(['id', 'category_title']);
        $categories_data = [""=> "Select Dish Category"];
            
        foreach( $categories as $category ) {
            $categories_data[$category->id] = $category->category_title;
        }
        
        return view("restaurants.rdishes")->with("categories", $categories_data);	
    }
        
    
    /**
    *
    */
    public function fetch_dish_by_restaurant(Request $request)
    {
        $dishes = new Dish;
        $dishes_data = $dishes->fetch_dish_by_restaurant( $request );
        
        
        //dd( $dishes_data );
        $return = '';
        
        if( !empty( $dishes_data ) ) {
            foreach($dishes_data as $dish) {
                $label = ($dish->status=='Active')?"label-primary":"label-danger";
                
                $return .= "<tr id='".$dish->id."'>
                <td>".$dish->dish_title."</td>
                <td>".$dish->category_title."</td>
                <td>".$dish->description."</td>
                <td>".$dish->price."</td>
                <td><span class='label ".$label."'>".$dish->status."</span></td>
                <td>
                    <input type='hidden' name='_token' value='".csrf_token()."'>
                        <a style='display:none !important;' href='#' class='btn btn-success btn-sm view_Dish_button' data-rest='".$dish->restaurant_id."' data-id='".$dish->id."'>
                            <i class='fa fa-info' aria-hidden='true'></i>
                        </a>
                        <a class='btn btn-primary btn-sm edit_Dish_btn' data-rest='".$dish->restaurant_id."' data-id ='".$dish->id."'><i class='fa fa-edit' aria-hidden='true'></i></a>
                        <a href='#' class='btn btn-danger del_btn' data-id='".$dish->id."'><i class='fa fa-trash'></i></a>
                </td></tr>";
            }
        } else{
            $return .= "<tr id=''><td></td><td></td><td></td><td></td><td><span class='label'></span></td><td><input type='hidden' name='_token' value=''><a style='display:none !important;' href='#' class='btn btn-success btn-sm view_Dish_button' data-id=''><i class='fa fa-info' aria-hidden='true'></i></a><a class='btn btn-primary btn-sm edit_Dish_btn' data-id =''><i class='fa fa-edit' aria-hidden='true'></i></a><a href='#' class='btn btn-danger del_btn' data-id=''><i class='fa fa-trash'></i></a></td></tr>";
        }
        
        return $return;
    }
    
    
    /**
    *
    */
    public function fetch_dish_byid(Request $request)
    {
        $dishes_data = Dish::find($request->id);
        $restaurant_data = Restaurant::all("id", "title");		//	Fetch Restaurants for Select box
		$category_data = RestaurantMenu::where("restaurant_id", $request->rest_id)->get();	//Fetch Categories for Select box


		
        $restaurant_options = "";
        $category_options = "";



        foreach ($category_data as $item){
            $category_options .= '<option value="'.$item->MenuCategory->id.'">'.$item->MenuCategory->category_title.'</option>';
        }
        
        $returndata = "";
        if( isset( $_POST['is_view'] ) ) {
                
        } else {
			
            foreach( $restaurant_data as $restaruant) {
                $restaurant_options .= "<option value='".$restaruant->id."' ".($restaruant->id==$dishes_data->restaurant_id?'selected':'').">".$restaruant->title."</option>";	
            }

            
            // Prepare Html to send back for Edit Model
            $returndata = '<div class="box-body">
          <input type="hidden" name="id" id="id" value="' . $dishes_data->id . '"/>
          <input type="hidden" name="old_title" id="old_title" value="' . $dishes_data->dish_title . '"/>
          <input type="hidden" name="old_status" id="old_status" value="' . $dishes_data->status . '"/>
          
          <div class="form-group">
            <label>Dish Title</label>
            <input class="form-control" type="text" name="dish_title" id="dish_title" value="'.$dishes_data->dish_title . '"/>
          </div>
          
        ';
          
          if( Auth::user()->role_id == 1) {
              $returndata .= '<div class="form-group">
                <label>Restaurant</label>
                <select name="restaurant_id" class="form-control fetch_cat" id="restaurant_id">'.$restaurant_options.'</select>
              </div>';
          } else {
              $returndata .= '<input type="hidden" name="restaurant_id" id="restaurant_id" value="'.Auth::user()->restaurant_id.'">';
          }

          $returndata .='

            <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control menu_list" id="category_id">"'.$category_options.'"</select>
          </div>

            <div class="form-group">
                <label>Description</label>
                    <input class="form-control" type="text" name="description" id="description" value="'                            .$dishes_data->description . '"/>
            </div>
          
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="text" name="price" id="price" value="'.$dishes_data->price . '"/>
          </div>
          
          <div class="form-group">
            <label>Serve Quantity</label>
            <input class="form-control" type="text" name="serve_quantity" id="serve_quantity" value="'.$dishes_data->serve_quantity . '"/>
          </div>
          
          <div class="form-group">
            <label>Dish Picture</label>
            <img src="assets/images/dishes/'.$dishes_data->picture.'" alt="No Picture" width="200">
        </div>
          
          <div class="form-group">
            <label>New Image </label>
        
            <input type="file" name="picture" id="picture" value="Select File">
          </div>
          
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" id="status">
              <option value="Active" '.($dishes_data->status == "Active"?"selected=selected":"").'>Active</option>
              <option value="Inactive" '.($dishes_data->status == "Inactive"?"selected=selected":"").'>Inactive</option>
            </select>
          </div>		  
        </div>';

        return $returndata;
        }
        
    }
    
    
    /**
    *
    *	Add new Dish
    */
    public function add_new_dish(Request $request)
    {
        /*$input = [
            'category_id' => Input::file('required|numeric')
        ];
        $rules = array('picture' => 'required',);
        /*$validator = Validator::make($file, $rules);
          
        if ($validator->fails()) {
            dd( $validator );
        } else {
            echo "fsafsaf";
        }
        
        exit;*/
        
        
        if (Input::hasFile('picture'))
        {
            if (Input::file('picture')->isValid()) {
                $destinationPath = 'assets/images/dishes'; // upload path
                $extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
                $fileName = date("YmdHis").rand(111,999).'.'.$extension; // renameing image
                Input::file('picture')->move($destinationPath, $fileName); // uploading file to given path
              
            } else {
                return "File Could be Uploaded.";
            }
        }
        
        
        $dish = new Dish;
        
        $dish->category_id	= $request->category_id;
        $dish->dish_title 	= $request->dish_title;
        $dish->description 	= $request->description;
        $dish->price 		= $request->price;
        $dish->serve_quantity = $request->serve_quantity;
        $dish->restaurant_id=isset($request->restaurant_id)?$request->restaurant_id:Auth::user()->restaurant_id;
        
        if( isset( $fileName ) && !empty( $fileName ) ) {
            $dish->picture		= $fileName;	
        }
        
        $return = $dish->save();
        
        if( $return == 1 ) {
            return "Success";
        } else {
            return $return;	
        }
        //}
    }
    
    
    /**
    *	Update Dish
    */
    public function update_dish(Request $request)
    {
        /*$file = array('picture' => Input::file('picture'));
        $rules = array('picture' => 'trim',);
        $validator = Validator::make($file, $rules);		  
        if ($validator->fails()) {
            $messages = $validator->messages();
            return $messages->first('picture');
        } else {*/
        
        if (Input::hasFile('picture'))
        {
            if (Input::file('picture')->isValid()) {
                $destinationPath = 'assets/images/dishes'; // upload path
                $extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
                $fileName = date("YmdHis").rand(111,999).'.'.$extension; // renameing image
                Input::file('picture')->move($destinationPath, $fileName); // uploading file to given path
              
            } else {
                return "File Could be Uploaded.";
            }
        }
        
            /*if (Input::file('picture')->isValid()) {
                $destinationPath = 'assets/images/dishes'; // upload path
                $extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
                $fileName = date("YmdHis").rand(111,999).'.'.$extension; // renameing image
                Input::file('picture')->move($destinationPath, $fileName); // uploading file to given path
                        
            } else {
                echo "File Could be Uploaded.";
            }*/
            
            $dish = Dish::find($request->id);
        
            $dish->dish_title		= $request->dish_title;
            $dish->category_id		= $request->category_id;
            $dish->restaurant_id 	= $request->restaurant_id;
            $dish->price 			= $request->price;
            $dish->serve_quantity 	= $request->serve_quantity;
            $dish->description 		= $request->description;
            $dish->status 			= $request->status;
            
            if( isset( $fileName ) && !empty( $fileName ) ) {
                $dish->picture		= $fileName;	
            }
            
            $result = $dish->save();
            
            if( $result == 1 ) {
                return "Success";
            } else {
                return $result;	
            }	
            
        //}		
    }
    
    
    /**
    * Delete Dish
    */	
    public function delete_dish(Request $request)
    {
        $dish_result = Dish::destroy( $request->id );
        
        if( $dish_result == 1 ) {
            return "Success";	
        } else {
            return $dish_result;	
        }
    }

    public function get_restaurant_menus(Request $request){
     $menu_list = RestaurantMenu::where('restaurant_id', 1)->get();
        $options ="";

        foreach ($menu_list as $item){
            $options .= '<option value="'.$item->MenuCategory->id.'">'.$item->MenuCategory->category_title.'</option>';
        }

        return $options;

    }

    
}
