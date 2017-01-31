<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function ajax_login( Request $request )
	{
		dd( $request );
	}
}
