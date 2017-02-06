<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RestaurantMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,25) as $index) {
            DB::table('restaurant_menus')->insert([
                'restaurant_id'    => rand(1,4),
                'menu_id'  => rand(1,4),
            ]);
        }
    }
}
