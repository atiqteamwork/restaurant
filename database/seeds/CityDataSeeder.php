<?php

use Illuminate\Database\Seeder;
use App\City;

use Carbon\Carbon;

class CityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        *	Seeder for City
        */
		
		DB::table('cities')->insert([
			'city_name'  => 'Faisalabad',
			'created_at' => Carbon::now(),
			'created_by' => 1,
        ]);
		
		DB::table('cities')->insert([
            'city_name'  => 'Lahore',
			'created_at' => Carbon::now(),
			'created_by' => 1,
        ]);
		
		DB::table('cities')->insert([
            'city_name'  => 'Islamabad',
			'created_at' => Carbon::now(),
			'created_by' => 1,
        ]);
    }
}
