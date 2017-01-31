<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Restaurant;

class RestaurantDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurant1 = new Restaurant();
        $restaurant2 = new Restaurant();
		$restaurant3 = new Restaurant();
		$restaurant4 = new Restaurant();
		$restaurant5 = new Restaurant();

        $restaurant1->title = "SAMS Chiken";
        $restaurant1->address = "D Ground, Faisalabad";
        $restaurant1->phone_primary = "123456";
        $restaurant1->phone_secondary = "987654";
        $restaurant1->email = "sams@sams.com.pk";
        $restaurant1->is_takeaway_only = "false";
        $restaurant1->open_time = "13:00";
        $restaurant1->close_time = "02:00";
        $restaurant1->city_id = 1;
        $restaurant1->area_ids = "1,5,9,4";
        $restaurant1->outof_area_charges = "200";
        $restaurant1->contact_person = "Mr. Contact Person";
		$restaurant1->logo = "v-logo.png";
        $restaurant1->save();


        $restaurant2->title = "Fork & knives";
        $restaurant2->address = "Kohnoor Plaza, Jaranwala Road, Faisalabad";
        $restaurant2->phone_primary = "5454566";
        $restaurant2->phone_secondary = "45654654";
        $restaurant2->email = "contact@fandk.com.pk";
        $restaurant2->is_takeaway_only = "false";
        $restaurant2->open_time = "12:00";
        $restaurant2->close_time = "03:00";
        $restaurant2->city_id = 1;
        $restaurant2->area_ids = "1,5,9,4,2,6";
        $restaurant2->outof_area_charges = "500";
        $restaurant2->contact_person = "Customer Care";
		$restaurant2->logo = "v-logo.png";
        $restaurant2->save();
		
		
		$restaurant3->title = "PizzaHut";
        $restaurant3->address = "Near Excise Office, Faisalabad.";
        $restaurant3->phone_primary = "1954165495";
        $restaurant3->phone_secondary = "151654654";
        $restaurant3->email = "info@pizzahut.pk";
        $restaurant3->is_takeaway_only = "true";
        $restaurant3->open_time = "12:00";
        $restaurant3->close_time = "03:00";
        $restaurant3->city_id = 1;
        $restaurant3->area_ids = "1,5,9,4,2,6";
        $restaurant3->outof_area_charges = "300";
        $restaurant3->contact_person = "Customer Care";
		$restaurant3->logo = "v-logo.png";
        $restaurant3->save();
		
		$restaurant4->title = "Pizza on phone";
        $restaurant4->address = "Nowhere in Faisalabad.";
        $restaurant4->phone_primary = "000000";
        $restaurant4->phone_secondary = "000000";
        $restaurant4->email = "info@pizzanowhere.com.pk";
        $restaurant4->is_takeaway_only = "true";
        $restaurant4->open_time = "12:00";
        $restaurant4->close_time = "03:00";
        $restaurant4->city_id = 1;
        $restaurant4->area_ids = "4,2,6";
        $restaurant4->outof_area_charges = "125";
        $restaurant4->contact_person = "Customer Care";
		$restaurant4->logo = "v-logo.png";
        $restaurant4->save();

    }
}
