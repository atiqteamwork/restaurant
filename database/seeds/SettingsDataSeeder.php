<?php

use Illuminate\Database\Seeder;

use App\Setting;

class SettingsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		//	Fronpage Background Image
        $setting1 = new Setting();
	        $setting1->setting_name = 'frontpage_background_image';
	        $setting1->value        = 'index_bg.jpg';
        $setting1->save();
		
		$setting2 = new Setting();
	        $setting2->setting_name = 'admin_email';
	        $setting2->value        = 'atiq@teamwork.com.pk';
        $setting2->save();
    }
}
