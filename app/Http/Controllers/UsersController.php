<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Restaurant;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class UsersController extends Controller
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
    *
    *
    */
    public function index()
    {
        return view("users.index");
    }


    /**
     * Display the users page according to type (Admin, Staff, Client etc).
     *
     * @return \Illuminate\Http\Response
     */
    public function get_users()
    {
        $user_list 		= new User();
        $users 			= $user_list->get_users();
        $restaurants 	= Restaurant::all(); //
        //$roles			= Roles::all( ["id", "display_name"] );

        //echo "<pre>"; print_r( $user_list ); echo "</pre>";

        $restaurant_data = [];
        //$roles_data	= [];


        foreach( $restaurants as $rest ) {
            if( Auth::user()->role_id > 1 && $rest->id != Auth::user()->restaurant_id ) { continue; }

            $restaurant_data[$rest->id] = $rest->title . " (" . $rest->address . ")";
        }


        /*foreach( $roles as $role ) {
            $roles_data[$role->id] = $role->display_name;
        }*/


        return view('users.index')
                ->with('users',$users)
                ->with('restaurants',$restaurant_data);
    }




    /**
     * Save New User
     *
     * Type paramerter:
     */
    public function new_user(Request $request){

        $input = [
            "first_name" 	=> $request->first_name,
            "last_name" 	=> $request->last_name,
            "email" 		=> $request->email,
            "password" 		=> $request->password,
        ];


        $rules = [
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' 	=> 'unique:users,email|required|min:5',
            'password' => 'required|min:6',
        ];

        $validate = Validator::make($input,$rules);


        if($validate->passes()){
            $restaurant_id = ($request->role_id == 1)?"0":$request->restaurant_id;
            $new_user = new User();

            $new_user->first_name 	= $request->first_name;
            $new_user->last_name 	= $request->last_name;
            $new_user->full_name 	= $request->firstname . " " . $request->last_name;
            $new_user->email		= $request->email;
            $new_user->username		= $request->email;
            $new_user->password		= bcrypt($request->password);
            $new_user->address 		= $request->address;
            $new_user->phone		= $request->phone;
            $new_user->cell 		= $request->cell;
            $new_user->role_id 		= $request->role_id;
            $new_user->restaurant_id = $restaurant_id;
            $result = $new_user->save();
            $new_user->roles()->attach($new_user->role_id);

            if( $result == 1 or empty( $result ) ) {
                return "Success";
            } else {
                return $result;
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


     /*
    *  Update Admin/Staff by Id
    *
    */
    public function update_users(Request $request) 
    {

        //dd($request);

        $validated = true;
        $restaurant_id = ($request->role_id == 1)?"0":$request->restaurant_id;

        if( isset( $request->password ) && !empty( $request->password ) ) {
            $input = ["password" => $request->password,];
            $rules = ['password' => 'required|min:6',];
            $validate = Validator::make($input,$rules);

            //echo $request->password . "<bR>";

            if($validate->passes()){
                $validated = true;
            } else {
                $messages = $validate->messages();
                dd( $messages );
                $validated = false;
                return $messages->first('password');
            }
        }


        if( $validated ) {
            $user = User::find($request->id);

            $user->first_name 	= $request->first_name;
            $user->last_name 	= $request->last_name;
            $user->full_name 	= $request->firstname . " " . $request->last_name;
            if( isset( $_POST['password'] ) && !empty( $_POST['password'] ) ) {
                $user->password		= bcrypt($request->password);
            }
            $user->address 		= $request->address;
            $user->phone		= $request->phone;
            $user->cell 		= $request->cell;
            $user->role_id 		= $request->role_id;
            $user->restaurant_id = $restaurant_id;
            $user->status		= $request->status;

            $result = $user->save();

            if( $result == 1 || empty( $result ) ) {
                return "Success";
            }elseif( $result == 0 ) {
                return "Nothing to Update";
            } else {
                return $result;
            }
        }


    }



    /*
    *  Get User data by id
    *
    */
    public function get_user_byid(Request $request) 
    {
        //$user = new User();
        $user_result = User::find( $request->id ); // $admin->getUserById($request);

        $roles = [["id"=> "1","title"=> "Adminsitrator"], ["id"=> "2", "title" => "Restaurant"],["id" => "3","title" => "Visitor"],];
        $role_options = "";
        foreach( $roles as $role ) {
            if( $role["id"] < Auth::user()->role_id ) {continue;}

            $role_options .= '<option value="'.$role["id"].'" '.(($user_result->role_id==$role["id"])?"selected=selected":"").'>'.$role["title"].'</option>';
        };

        $returndata = '<div class="box-body">
          <input  type="hidden" name="id" id="id" value="' . $user_result->id . '"/>
          <div class="form-group">
            <label>First Name</label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="' . $user_result->first_name . '"/>
          </div>
          
          <div class="form-group">
            <label>Last Name</label>
            <input class="form-control" type="text" name="last_name" id="last_name" value="' . $user_result->last_name . '"/>
          </div>
          
          <div class="form-group">
            <label>Email Address</label>
            <input class="form-control" readonly="readonly" type="text" name="email" id="email" value="' . $user_result->email . '"/>
          </div>
          
          
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" id="password" value=""/>
          </div>
          
          
          <div class="form-group">
            <label>Address</label>
            <input class="form-control" type="text" name="address" id="address" value="'.$user_result->address.'"/>
          </div>
          
          
          <div class="form-group">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" id="phone" value="'.$user_result->phone.'"/>
          </div>
          
          
          <div class="form-group">
            <label>Cell</label>
            <input class="form-control" type="text" name="cell" id="cell" value="'.$user_result->cell.'"/>
          </div>
          
          
          <div class="form-group">
            <label>Role</label>
            <select name="role_id" class="form-control" id="role_id">'.$role_options.'</select>
          </div>
          
          
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" id="status">
              <option value="Active" '.($user_result->status == "Active"?"selected=selected":"").'>Active</option>
              <option value="Inactive" '.($user_result->status == "Inactive"?"selected=selected":"").'>Inactive</option>
            </select>
          </div>
          
        </div>';

        return $returndata;
    }





    public function delete_user(Request $request)
    {
        $user_result = User::destroy( $request->user_id );

        if( $user_result == 1 || $user_result == 0) {
            return "Success";	
        } else {
            return $user_result;	
        }	
    }


   /**
     * Display listing of the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax()
    {
        $actions = '<div class="btn-group btn-group-justified">
            <div class="btn-group" role="group">
            <a class="btn btn-primary btn-xs edit_admin_btn" data-id="{{$id}}" href="#">
                    <i class="glyphicon glyphicon-edit"></i>
                </a>
            </div>
            <div class="btn-group" role="group">
                <a href="#" class="btn btn-danger btn-xs" data-delete data-token="{{ csrf_token() }}" data-action="{{ url(\'/admin/users/\'.$id) }}">
                    <i class="glyphicon glyphicon-trash"></i>
                </a>
            </div>
        </div>';
        return Datatables::eloquent(User::with('roles'))
                ->addColumn('actions', $actions)->make(true);
    }


    /**
    *
    *	Edit Users List
    *
    */
    public function edit()
    {
        echo Auth::user()->role_id;
    }


    /**
     * Display a change password form.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        $user = Auth::user();
        $profile = Auth::user()->profile;

        return view('users.change_password', ['usr' => $user, 'profile' => $profile]);
    }

    /**
     * Update the specified user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_password($id, Request $request)
    {
        if ($id != Auth::user()->id) {
            flash()->error('Access Denied!', 'You don\'t have permission to perform the action');
            return redirect('/profile/'.Auth::user()->username);
        }

        $this->validate($request, [
            'current' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        $user = User::findOrFail($id);

        $current = bcrypt($request->current);
        $data['password'] = bcrypt($request->password);

        if ( ! Hash::check($request->current, $user->password)) {
            flash()->error('Current Password Error!', 'Plesae type the correct current password.');
            return redirect('/change_password');
        }

        $user->update($data);

        flash()->success('Success!', 'Your password has successfully changed.');
        return redirect('/profile/'.$user->username);
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ) {
        User::destroy($request->user_id);

        if ( $request->ajax() ) {
            return response(['status' => 'success', 'message' => 'User successfully deleted,']);
        }

        flash()->success('Success!', 'User successfully deleted.');
        return redirect('/admin/users');
    }

}
