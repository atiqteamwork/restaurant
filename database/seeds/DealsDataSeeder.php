<?php

use Illuminate\Database\Seeder;
use App\Deal;

use Faker\Factory as Faker;

class DealsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deal1 = new Deal();
        $deal2 = new Deal();
        $deal3 = new Deal();
        $deal4 = new Deal();

        $deal1->category_id  	= '1';
        $deal1->restaurant_id   = '1';
        $deal1->deal_title   	= 'Pizza Deal 1';
        $deal1->description    	= '1 Large Pizza, 1 Small Pizza, 1 1.5 Litter Drink';
        $deal1->price       	= '1499';
        $deal1->serve_quantity	= '1';
        $deal1->availability    = 'Monday to Saturday: 07 PM to 01 AM';
        $deal1->save();

        $deal2->category_id  	= '1';
        $deal2->restaurant_id   = '1';
        $deal2->deal_title   	= 'Pizza Deal 2';
        $deal2->description    	= '2 Large Pizza, 1 1.5 Litter Drink';
        $deal2->price       	= '1999';
        $deal2->serve_quantity	= '1';
        $deal2->availability    = 'Monday to Saturday: 07 PM to 01 AM';
        $deal2->save();



        $deal3->category_id  	= '1';
        $deal3->restaurant_id   = '2';
        $deal3->deal_title   	= 'Launch Deal';
        $deal3->description    	= '1 Zinger Burger, French Fries, 1 regular drink';
        $deal3->price       	= '450';
        $deal3->serve_quantity	= '1';
        $deal3->availability    = 'Monday to Saturday: 06 PM to 02 AM';
        $deal3->save();

        $deal4->category_id  	= '2';
        $deal4->restaurant_id   = '2';
        $deal4->deal_title   	= 'Launch Deal Family Package';
        $deal4->description    	= '4 Zinger Burger, 4 French Fries, 4 regular drink, 1 litter Icebar';
        $deal4->price       	= '1859';
        $deal4->serve_quantity	= '1';
        $deal4->availability    = 'All Week 06 PM to 02 AM';
        $deal4->save();
		
		
		$faker = Faker::create();
		
		foreach (range(1,15) as $index) {
            DB::table('deals')->insert([
                'category_id'    => rand(1,4),
                'restaurant_id'  => rand(1,4),
                'deal_title'     => $faker->sentence(3),
                'description'    => $faker->paragraph(2),
				'price'			 => rand(111,2500),
				'serve_quantity' => '1',
				'availability'   => 'All Week 06 PM to 02 AM',
            ]);
        }
    }
}
