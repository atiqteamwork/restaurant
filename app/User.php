<?php

namespace App;

use DB;

use Auth;

use Illuminate\Notifications\Notifiable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes;
    use EntrustUserTrait {
        EntrustUserTrait::restore insteadof SoftDeletes;
    }
    use Notifiable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
	protected $with = ['Restaurant', "City"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','full_name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }
	
	


    /**
     * Get the profile associated with the user.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
	
	
	/**
	 * Relation with Restaurant Table
	 **/
	public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', "restaurant_id");
    }
	
	
	/**
	 * Relation with City Table
	 **/
	public function city()
    {
        return $this->belongsTo('App\City', "city_id");
    }



    /**
     * Return list of All administrators or Staff.
     */
    public function get_users()
    {
      $adminslist = DB::table('users')
        ->join('roles', function ($join) {
          $join->on('users.role_id', '=', 'roles.id');
          //
          //
        })
        ->select( ["users.id as u_id", "users.full_name", "users.*","roles.*"] )
		->whereNull('deleted_at');
		//->orderby('roles.display_name');
		
		if( Auth::user()->role_id > 1 ) {
			$adminslist->where("role_id", ">=" ,Auth::user()->role_id)
			->where("restaurant_id", Auth::user()->restaurant_id);
		}
		
        $result = $adminslist->get();
   
   		
        return $result;
   }





    public function new_user($request)
    {
		//dd( $request );
		
		
        if ($request->firstname == '' || $request->lastname == '' || $request->email == '' || $request->password == '') {
            return 'Please fill all the required fields';
        } else {
            $email_exist = DB::table('users')
                ->where('email', $request->email)
                ->get();

            if (!empty($email_exist) && count($email_exist)) {
                return 'Email already registered';
            } else {
                DB::table('users')->insert([
                    'first_name' => $request->firstname,
                    'last_name' => $request->lastname,
                    'full_name' => $request->firstname . ' ' . $request->lastname,
                    'username' => $request->email,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'role_id' => "2",
                    'created_by' => Auth::user()->userid, //Auth::User->id,
                    'restaurant_id' => $request->restaurant,
                ]);

                return 'success';
            }
        }
    }



    /**
    *  Get Any user by providing user ID
    *
    *
    public function getUserById($request) {
        $admin_result = DB::table('users')
            ->where('id', $request->id)
            ->get();

        return $admin_result;
    }


    /**
    *  Update Admin/Staff by ID
    */
    public function updateAdminStaffById($request) {
        $admin_result = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'name'       => $request->first_name . " " . $request->last_name,
                'email'      => $request->email,
                'status'     => $request->status,
            ]);


        return $admin_result;

    }

   
}
