<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class UsersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Administrator';
        $admin->description  = 'User with full privileges';
        $admin->save();

        $manager = new Role();
        $manager->name         = 'restaurant';
        $manager->display_name = 'Restaurant';
        $manager->description  = 'User related to Restaurant';
        $manager->save();

        $customer = new Role();
        $customer->name         = 'visitor';
        $customer->display_name = 'visitor';
        $customer->description  = 'Site Visitor';
        $customer->save();


        /*
        *	Seeder for Admins
        */
        $adminUser1 = new User();

        $adminUser1->first_name  = 'Admin';
        $adminUser1->last_name   = 'User';
        $adminUser1->full_name   = 'Admin User';
        $adminUser1->username    = 'admin@restaurant.com';
        $adminUser1->email       = 'admin@restaurant.com';
        $adminUser1->password    = bcrypt('admin');
		$adminUser1->address	 = "Susan Road, Madina Town";
		$adminUser1->city_id	 = 1;
        $adminUser1->role_id     = '1';
        $adminUser1->restaurant_id  = 0;
        $adminUser1->created_by  = '1';
        $adminUser1->save();
        $adminUser1->roles()->attach($admin->id);


        /*
        *	Seeder for Restaurant
        */
        $restaurantUser1 = new User();
        $restaurantUser1->first_name    = 'Restaurant';
        $restaurantUser1->last_name     = '';
        $restaurantUser1->full_name     = 'Restaurant';
        $restaurantUser1->username      = 'mark@restaurant.com';
        $restaurantUser1->email         = 'mark@restaurant.com';
        $restaurantUser1->password      = bcrypt('restaurant');
		$restaurantUser1->address	 	= "Kohnoor Plaza, Jaranwala Road, Faisalabad";
		$restaurantUser1->city_id	 	= 1;
        $restaurantUser1->role_id       = '2';
        $restaurantUser1->restaurant_id = '1';
        $restaurantUser1->created_by         = '1';
        $restaurantUser1->save();
        $restaurantUser1->roles()->attach($manager->id);


       
        /*
        *	Seeder for Customer/User
        */
        $visitorUser1 = new User();
        $visitorUser1->first_name    = 'User';
        $visitorUser1->last_name     = 'Visitor';
        $visitorUser1->full_name     = 'User Visitor';
        $visitorUser1->username      = 'user@user.com';
        $visitorUser1->email         = 'user@user.com';
        $visitorUser1->password      = bcrypt('user');
		$visitorUser1->address      = "Susan Road, Madina Town, Faisalabad.";
		$visitorUser1->city_id	 	= 1;
		$visitorUser1->phone      	= '111-111-111';
		$visitorUser1->cell			= '0300-1234567';
        $visitorUser1->role_id       = '3';
        $visitorUser1->restaurant_id = 0;
        $visitorUser1->created_by      = '1';
        $visitorUser1->save();
        $visitorUser1->roles()->attach($customer->id);
		
		$visitorUser2 = new User();
        $visitorUser2->first_name    = 'New';
        $visitorUser2->last_name     = 'User';
        $visitorUser2->full_name     = 'New User';
        $visitorUser2->username      = 'newuser@user.com';
        $visitorUser2->email         = 'newuser@user.com';
        $visitorUser2->password      = bcrypt('user');
		$visitorUser2->address      = "Gulbahar colony, Satiana Road, Faisalabad.";
		$visitorUser2->city_id	 	= 1;
		$visitorUser2->phone      	= '041-864154';
		$visitorUser2->cell			= '0300-9876432';
        $visitorUser2->role_id       = '3';
        $visitorUser2->restaurant_id = 0;
        $visitorUser2->created_by      = '1';
        $visitorUser2->save();
        $visitorUser2->roles()->attach($customer->id);

        
    }
}
