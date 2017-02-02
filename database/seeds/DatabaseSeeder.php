<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersDataSeeder::class);
        $this->call(CityDataSeeder::class);
        $this->call(AreaDataSeeder::class);
        $this->call(RestaurantDataSeeder::class);
        $this->call(CategoryDataSeeder::class);
        $this->call(DishesDataSeeder::class);
        $this->call(DealsDataSeeder::class);
        $this->call(OrdersDataSeeder::class);
        $this->call(RestaurantMenusSeeder::class);

    }
}
