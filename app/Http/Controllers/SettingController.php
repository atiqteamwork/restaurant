<?php

namespace App\Http\Controllers;

use App\Setting;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SettingController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
	
	
	/**
	 *	Show Setting to Change Front Page Background Image
	 **/
	public function front_page_image()
	{
		$image_path = frontpage_image_path();
		$settings = Setting::where("setting_name", "frontpage_background_image")->get();

		return view("settings.front_image")->with([	
				"image_path" => $image_path,
				"settings" => $settings
			]);
	}
	
	
	/**
	 *	Update Front Page Background Image
	 **/
	public function update_frontpage_image(Request $request)
	{
		if (Input::hasFile('image'))
		{
			if (Input::file('image')->isValid()) {
				
				$mask = 'assets_front/images/fbg_*.*';
				array_map('unlink', glob($mask));

				$destinationPath = 'assets_front/images'; // upload path
				$extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
				$image_fileName = "fbg_".date("Ymd").rand(11,99).'.'.$extension; // renameing image
				Input::file('image')->move($destinationPath, $image_fileName); // uploading file to given path
			  	$setting 		= Setting::find($request->setting_id);
				$setting->value = $image_fileName;
				$response 		= $setting->save();
				
							  			  
			} else {
				return redirect()->back()->with("error", "Image Could be Uploaded.");
			}
			
		} else {
			return redirect()->back()->with("status", "No Image Selected");
		}
		
		return redirect()->back()->with("status", "Image Changed Successfully.");
	}
	
	
	/**
	 *	Show Setting to Change Front Page Background Image
	 **/
	public function admin_email()
	{
		$settings = Setting::where("setting_name", "admin_email")->get();

		return view("settings.admin_email")->with("settings", $settings);
	}
	
	
	
	/**
	 *	Update Front Page Background Image
	 **/
	public function update_admin_email(Request $request)
	{
		if( isset( $request->setting_id ) ) {
			$setting  = Setting::find($request->setting_id);
		} else {
			$setting  = new Setting();
		}
		
		$setting->setting_name = "admin_email";
		$setting->value = $request->admin_email;
		
		$response = $setting->save();
		
		if( $response == 1 )
		{
			return redirect()->back()->with("status", "Admin Email Saved Successfully.");
		} else {
			return redirect()->back()->with("error", "An Error Occured. Please! try again.");
		}
	}
	
}
