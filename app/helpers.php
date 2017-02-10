<?php

use App\Setting;

if (!function_exists('flash')) {
    function flash($title = null, $message = null)
    {
        $flash = app('App\Http\Flash');

        if (func_num_args() == 0) {
            return $flash;
        }

        return $flash->info($title, $message);
    }
}


if (!function_exists('set_active')) {
    function set_active($path, $active = 'active') {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
}


if (!function_exists('frontpage_image_path')) {
	function frontpage_image_path()
	{
		$settings = Setting::get();
		$image_path = "";
		
		foreach( $settings as $setting ){
			if( $setting->setting_name == "frontpage_background_image" ){
				$image_path = getenv('APP_URL')."assets_front/images/".$setting->value;
			}
		}
		
		return  $image_path;
	}
}


if (!function_exists('get_admin_email')) {
	function get_admin_email()
	{
		$settings = Setting::where("setting_name", "admin_email")->get();
		return $settings[0]->value;
	}
}