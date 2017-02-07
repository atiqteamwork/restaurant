<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use App\Deal;
use App\MenuCategory;
use App\RestaurantMenu;
use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DealsController extends Controller
{
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
    * INDEX
    * @return void
    */
    public function index()
    {
        $this->user_role = Auth::user()->role_id;

        if( $this->user_role == 1 )
            return ($this->index_admin());
        else
            return ($this->index_restaurant());
    }


    /**
    *	Show List of Restuarants on Deals page
    */
    public function index_admin()
    {
        $restaurants = Restaurant::get(['id', 'title']);
        $categories  = MenuCategory::get(['id', 'category_title']);

        $restaurants_data = ["0"=> "Select Restaurant"];
        $categories_data = ["0"=> "Select Deal Category"];

        foreach( $restaurants as $restaurant ) {
            $restaurants_data[$restaurant->id] = $restaurant->title;
        }

        foreach( $categories as $category ) {
            $categories_data[$category->id] = $category->category_title;
        }

        return view("restaurants.deals")
            ->with("restaurants", $restaurants_data)
            ->with("categories", $categories_data);
    }


    /**
    *
    */
    public function index_restaurant()
    {
        $categories  = MenuCategory::get(['id', 'category_title']);
        $categories_data = ["0"=> "Select Deal Category"];

        foreach( $categories as $category ) {
            $categories_data[$category->id] = $category->category_title;
        }

        return view("restaurants.rdeals")->with("categories", $categories_data);
    }


    /**
    *
    *
    */
    public function fetch_deal_by_restaurant(Request $request)
    {
        $deals = new Deal;
        $deals_data = $deals->fetch_deal_by_restaurant( $request );

        $return = '';

        if( !empty( $deals_data ) ) {
            foreach($deals_data as $deal) {
                $label = ($deal->status=='Active')?"label-primary":"label-danger";

                $return .= "<tr id='".$deal->id."'>
                <td>".$deal->deal_title."</td>
                <td>".$deal->category_title."</td>
                <td>".$deal->description."</td>
                <td>".$deal->price."</td>
                <td><span class='label ".$label."'>".$deal->status."</span></td>
                <td>
                    <input type='hidden' name='_token' value='".csrf_token()."'>
                        <a style='display:none !important;' href='#' class='btn btn-success btn-sm view_deal_button' data-id='".$deal->id."'>
                            <i class='fa fa-info' aria-hidden='true'></i>
                        </a>
                        <a class='btn btn-primary btn-sm edit_deal_btn' data-rest='".$deal->restaurant_id."' data-id ='".$deal->id."'><i class='fa fa-edit' aria-hidden='true'></i></a>
                        <a href='#' class='btn btn-danger del_btn' data-id='".$deal->id."'><i class='fa fa-trash'></i></a>
                </td></tr>";
            }
        }

        return $return;
    }


    /**
    *
    */
    public function add_new_deal(Request $request)
    {
        if (Input::hasFile('picture')) {
            if (Input::file('picture')->isValid()) {
                $destinationPath = 'assets/images/deals'; // upload path
                $extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
                $fileName = date("YmdHis").rand(111,999).'.'.$extension; // renameing image
                Input::file('picture')->move($destinationPath, $fileName); // uploading file to given path

            } else {
                echo "File Could be Uploaded.";
            }
        }

        $deal = new Deal;

        $deal->category_id	= $request->category_id;
        $deal->deal_title 	= $request->deal_title;
        $deal->description 	= $request->description;
        $deal->price 		= $request->price;
        $deal->serve_quantity = "1";
        $deal->restaurant_id = isset($request->restaurant_id)?$request->restaurant_id:Auth::user()->restaurant_id;

        if( isset( $fileName ) && !empty( $fileName ) ) {
            $deal->picture		= $fileName;
        }

        $return = $deal->save();

        if( $return == 1 ) {
            return "Success";
        } else {
            return $return;
        }

    }


    /**
    *	Fetch Deal by ID
    */
    public function fetch_deal_byid(Request $request)
    {
        $deals = new Deal;

        $deals_data 		= $deals->fetch_deal_byid( $request );	//	Fetch Deals
        $restaurant_data 	= Restaurant::all("id", "title");		//	Fetch Restaurants for Select box
        $category_data 		= RestaurantMenu::where("restaurant_id", $request->rest_id)->get();

        $restaurant_options = "";
        $category_options 	= "";

        if( isset( $_POST['is_view'] ) ) {

        } else {
            foreach( $restaurant_data as $restaruant) {
                $restaurant_options .= "<option value='".$restaruant->id."' ".($restaruant->id==$deals_data[0]->restaurant_id?'selected':'').">".$restaruant->title."</option>";
            }

            foreach ($category_data as $item){
                $category_options .= '<option value="'.$item->MenuCategory->id.'">'.$item->MenuCategory->category_title.'</option>';
            }

            // Prepare Html to send back for Edit Model
            $returndata = '<div class="box-body">
          <input type="hidden" name="id" id="id" value="' . $deals_data[0]->id . '"/>
          <input type="hidden" name="old_title" id="old_title" value="' . $deals_data[0]->deal_title . '"/>
          <input type="hidden" name="old_status" id="old_status" value="' . $deals_data[0]->status . '"/>
          <div class="form-group">
            <label>Deal Title</label>
            <input class="form-control" type="text" name="deal_title" id="deal_title" value="'.$deals_data[0]->deal_title . '"/>
          </div>
          ';

          if( Auth::user()->role_id == 1) {
              $returndata .= '<div class="form-group">
                <label>Restaurant</label>
                <select name="restaurant_id" class="form-control fetch_cat" id="restaurant_id">
                    '.$restaurant_options.'
                </select>
              </div>';
          } else {
              $returndata .= '<input type="hidden" name="restaurant_id" id="restaurant_id" value="'.Auth::user()->restaurant_id.'">';
          }

          $returndata .= '	
		  <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control menu_list" id="category_id">"'.$category_options.'"</select>
          </div>
		  	  
		  	  
		  <div class="form-group">
          <label>Description</label>
            <input class="form-control" type="text" name="description" id="description" value="'.$deals_data[0]->description.'"/>
          </div>
          
          <div class="form-group">
            <label>Price</label>
            <input class="form-control" type="text" name="price" id="price" value="'.$deals_data[0]->price.'"/>
          </div>
          <div class="form-group">
            <label>Deal Picture</label>
            <img src="assets/images/deals/'.$deals_data[0]->picture.'" alt="No Picture" width="200">
          </div>
          <div class="form-group">
            <label>New Image </label>
            <input type="file" name="picture" id="picture" value="Select File">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" id="status">
              <option value="Active" '.($deals_data[0]->status == "Active"?"selected=selected":"").'>Active</option>
              <option value="Inactive" '.($deals_data[0]->status == "Inactive"?"selected=selected":"").'>Inactive</option>
            </select>
          </div>
        </div>';

        return $returndata;
        }
    }


    /**
    *	Update Deal
    */
    public function update_deal(Request $request)
    {
        if (Input::hasFile('picture'))	{
            if (Input::file('picture')->isValid()) {
                $destinationPath = 'assets/images/deals'; // upload path
                $extension = Input::file('picture')->getClientOriginalExtension(); // getting image extension
                $fileName = date("YmdHis").rand(111,999).'.'.$extension; // renameing image
                Input::file('picture')->move($destinationPath, $fileName); // uploading file to given path
            } else {
                return "File Could be Uploaded.";
            }
        }

        $deal = Deal::find($request->id);

        $deal->deal_title		= $request->deal_title;
        $deal->category_id		= $request->category_id;
        $deal->restaurant_id 	= $request->restaurant_id;
        $deal->price 			= $request->price;
        //$deal->serve_quantity 	= $request->serve_quantity;
        $deal->description 		= $request->description;
        $deal->status 			= $request->status;

        if( isset( $fileName ) && !empty( $fileName ) ) {
            $deal->picture		= $fileName;
        }

        $result = $deal->save();

        if( $result == 1 ) {
            return "Success";
        } else {
            return $result;
        }
    }


    /*
    *
    */
    public function delete_deal(Request $request)
    {
        $deal_result = Deal::destroy( $request->id );

        if( $deal_result == 1 ) {
            return "Success";	
        } else {
            return $deal_result;	
        }	
    }

}
