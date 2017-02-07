<?php

use Illuminate\Database\Seeder;
use App\Dish;

use Faker\Factory as Faker;

class DishesDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$dish1 = new Dish();
	        $dish1->category_id  	= '2';
    	    $dish1->restaurant_id   = '1';
	        $dish1->dish_title   	= 'Zinger Special';
        	$dish1->description    	= '';
    	    $dish1->price       	= '250';
			$dish1->picture       	= 'recipe-2.jpg';
	        $dish1->serve_quantity	= '1';
    	    $dish1->availability    = 'Monday to Friday';
        $dish1->save();

		$dish2 = new Dish();
	        $dish2->category_id  	= '1';
    	    $dish2->restaurant_id   = '1';
        	$dish2->dish_title   	= 'Kharai Goshat';
	        $dish2->description    	= '';
    	    $dish2->price       	= '1400';
			$dish2->picture       	= 'recipe-2.jpg';
	        $dish2->serve_quantity	= '1 KG';
    	    $dish2->availability    = 'Monday to Friday';
        $dish2->save();

		$dish3 = new Dish();
	        $dish3->category_id  	= '1';
    	    $dish3->restaurant_id   = '2';
        	$dish3->dish_title   	= 'Pizza';
    	    $dish3->description    	= '';
	        $dish3->price       	= '650';
			$dish3->picture       	= 'recipe-2.jpg';
        	$dish3->serve_quantity	= '1 Regular';
    	    $dish3->availability    = 'Monday to Friday';
        $dish3->save();


		$dish4 = new Dish();
	        $dish4->category_id  	= '2';
    	    $dish4->restaurant_id   = '2';
        	$dish4->dish_title   	= 'Kharai Goshat Spicy Special';
	        $dish4->description    	= '';
    	    $dish4->price       	= '1350';
			$dish4->picture       	= 'recipe-2.jpg';
	        $dish4->serve_quantity	= '1 KG';
    	    $dish4->availability    = 'Monday to Friday';
        $dish4->save();
		
		
		$faker = Faker::create();
		
		foreach (range(1,50) as $index) {
            DB::table('dishes')->insert([
                'category_id'    => rand(1,4),
                'restaurant_id'  => rand(1,4),
                'dish_title'     => $faker->sentence(3),
                'description'    => $faker->paragraph(2),
				'price'			 => rand(111,2500),
				'picture'  		=> 'recipe-2.jpg',
				'serve_quantity' => '1',
				'availability'   => 'Monday to Friday',
            ]);
        }
    }
}
