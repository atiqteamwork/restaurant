<?php

namespace App\Http\Controllers;

use URL;
use Auth;

use App\Role;
use App\Http\Requests;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Home page
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        //echo URL::previous()."<br>".url('/login');
		
        //exit;

        if( Auth::check() && URL::previous() != url('/login'))
        {
			if (strpos(URL::previous(), '_debugbar') !== false) {
				return view('pages.home');
			}
			
			return redirect(URL::previous());
        } 
        
        return view('pages.home');	
        
    }

}
