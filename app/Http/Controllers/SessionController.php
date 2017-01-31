<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{

	public function get_session(Request $request){
				
		$session_key = "";
		
		if($request->session()->has('session_key'))
		{
			$session_key = $request->session()->get('session_key');
		} else {
			$request->session()->put('session_key', md5( date("Ymdhis").uniqid() ));
		}
		
		
		return $session_key;
		
	}	
	
	
	public function destroy_session(Request $request){
		$request->session()->forget('session_key');
	}
	
}
