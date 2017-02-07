<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
	 
	//protected $redirectTo = "admin";
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	
	
	/*protected function redirectTo()
	{	
		if( Auth::check() )
		{
			if( Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
			{
				return "/admin";
			}
			
		} else {
			
		}
		
	}*/
	
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        parent::__construct();
    }



    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $identity = $request->get('username');
        $field = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field => $identity,
            'password' => $request->get('password'),
        ];
    }
	
	
	
	protected function authenticated( $user )
    {
       if( Auth::user()->role_id <= 2 )
	   		return redirect( url('/admin') );
			
		return redirect( url('/') );
    }


}
