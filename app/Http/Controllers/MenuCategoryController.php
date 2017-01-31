<?php

namespace App\Http\Controllers;

use App\MenuCategory;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class MenuCategoryController extends Controller
{
    
    /**
      * Create a new controller instance.
      *
      * @return void
      */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }

    
    /**
     * Display the admin page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menucategory.index')->with('categoryList',MenuCategory::all());
    }



    /**
    *	Add new Menu/Deal Category
    *
    */

    public function new_category(Request $request)
    {
        $input = ["category_title" => $request->category_title];
        $rules = ['category_title' => 'unique:menu_categories,category_title|required|min:3'];

        $validate = Validator::make($input,$rules);

        if($validate->passes())
        {
            $category = new MenuCategory();
            $category->category_title = $request->category_title;
            $category_result = $category->save();

            if( $category_result == 1 ) {
                return "Success";
            } else {
                return $category_result;
            }
        }
        else
        {
            $messages = $validate->messages();
            return $messages->first('category_title');
        }
    }



    /**
    * Update Category Name/Title
    */
    public function update_category(Request $request)
    {
        $input = ["category_title" => $request->category_title];

        if( $request->old_title != $request->category_title ) {
            $rules = ['category_title' => 'unique:menu_categories,category_title|required|min:3'];
        } else {
            $rules = ['category_title' => 'required|min:3'];
        }

        $validate = Validator::make($input,$rules);

        if($validate->passes())
        {
            $category = MenuCategory::find( $request->id );

            $category->category_title = $request->category_title;
            $category->status = $request->status;
            $category_result = $category->save();

            if( $category_result == 1 ) {
                return "Success";
            } else {
                return $category_result;
            }
        }
        else
        {
            $messages = $validate->messages();
            return $messages->first('category_title');
        }
    }



    public function fetch_by_id(Request $request)
    {
        $category = MenuCategory::find( $request->id );
        /*$area_list = new Area();
        $area_result = $area_list->get_all_area($request);*/

        //dd( $category );

        $returndata = '<div class="box-body">
          <input type="hidden" name="id" id="id" value="' . $category->id . '"/>
          <input type="hidden" name="old_title" id="old_title" value="' . $category->category_title . '"/>
          <input type="hidden" name="old_status" id="old_status" value="' . $category->status . '"/>
          
          <div class="form-group">
            <label>Category Title</label>
            <input class="form-control" type="text" name="category_title" id="category_title" value="' . $category->category_title . '"/>
          </div>
          
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" id="status">
              <option value="Active" '.($category->status == "Active"?"selected=selected":"").'>Active</option>
              <option value="Inactive" '.($category->status == "Inactive"?"selected=selected":"").'>Inactive</option>
            </select>
          </div>
          
        </div>';

        return $returndata;
    }


    public function delete_category()
    {
        $category_result = MenuCategory::destroy( $_POST["id"] );

        if( $category_result == 1 ) {
            return "Success";	
        } else {
            return $category_result;	
        }	
    }

}
