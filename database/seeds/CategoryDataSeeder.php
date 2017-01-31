<?php

use App\MenuCategory;

use Illuminate\Database\Seeder;

class CategoryDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new MenuCategory();
        $category2 = new MenuCategory();
        $category3 = new MenuCategory();
        $category4 = new MenuCategory();

        $category1->category_title = "Fast Food";
        $category1->save();

        $category2->category_title = "Extra Value Meals";
        $category2->save();

        $category3->category_title = "Sandwiches";
        $category3->status = "Inactive";
        $category3->save();

        $category4->category_title = "Happy Meal";
        $category4->save();
    }
}
