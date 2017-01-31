<?php

use Illuminate\Database\Seeder;
use App\Order;


class OrdersDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order1 = new Order();
        $order2 = new Order();
        $order3 = new Order();
        $order4 = new Order();

		
		/**
		*
		*	Order 1:
		*
        $order1->user_id 		= 4;
        $order1->restaurant_id	= 1;
        $order1->dated			= date("Y-m-d H:i:s");
        $order1->address		= 'Address of User';
        $order1->email			= 'newuser@gmail.com';
        $order1->phone			= '111-3584241';
        $order1->cell			= '0300-1234567';
        $order1->net_amount		= '0';
		$order1->menutype		= 'typedish';
		$order1->order_type		= 'Takeway';
        $order1->gst			= '16';
        $order1->total_amount   = "0";
        $order1->extra_charges  = 0;
		$order1->area_id        = 1;
        $order1->save();

        $order_id = $order1->id;

        DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'dish_id'	=> 1,
                'price'		=> '1200',
                'quantity'	=> '1'
            ]
        );

				
		$order1 = Order::find($order_id);
		$order1->net_amount		= '1200';
        $order1->total_amount   = "1392";
		$order1->save();
		
		
		
		
		
		/**
		*
		*	Order 2:
		*
		$order2->user_id 		= 3;
        $order2->restaurant_id	= 2;
        $order2->dated			= date("Y-m-d H:i:s", strtotime("2016-08-14 07:15:36"));
        $order2->address		= 'This is old order for testing purpose';
        $order2->email			= 'user@gmail.com';
        $order2->phone			= '111-3584241';
        $order2->cell			= '0300-1234567';
        $order2->net_amount		= '1650';
		$order2->menutype		= 'typedish';
		$order2->order_type		= 'Delivery';
        $order2->gst			= '16';
        $order2->total_amount   = "1868";
        $order2->extra_charges  = 0;
		$order2->area_id        = 2;
        $order2->save();

        $order_id = $order2->id;

        DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'dish_id'	=> 1,
                'price'		=> '950',
                'quantity'	=> '1'
            ]
        );
		
		DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'dish_id'	=> 3,
                'price'		=> '330',
                'quantity'	=> '2'
            ]
        );
		
		
		
		/**
		*
		*	Order 3:
		*
		$order3->user_id 		= 4;
        $order3->restaurant_id	= 2;
        $order3->dated			= date("Y-m-d H:i:s", strtotime("2016-11-14 07:15:36"));
        $order3->address		= 'Lorem Ipsum';
        $order3->email			= 'newuser@gmail.com';
        $order3->phone			= '1234567';
        $order3->cell			= '0300-7654321';
        $order3->net_amount		= '300';
		$order3->menutype		= 'typedish';
		$order3->order_type		= 'Delivery';
        $order3->gst			= '16';
        $order3->total_amount   = "300";
        $order3->extra_charges  = 0;
		$order3->area_id        = 5;
        $order3->save();

        $order_id = $order3->id;

        DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'dish_id'	=> 1,
                'price'		=> '100',
                'quantity'	=> '1'
            ]
        );
		
		DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'dish_id'	=> 3,
                'price'		=> '50',
                'quantity'	=> '4'
            ]
        );	
		
		
		
		
		
		/**
		*
		*	Order 3:
		*
		$order4->user_id 		= 3;
        $order4->restaurant_id	= 1;
        $order4->dated			= date("Y-m-d H:i:s", strtotime("2016-10-14 07:15:36"));
        $order4->address		= 'Lorem Ipsum';
        $order4->email			= 'newuser@gmail.com';
        $order4->phone			= '1234567';
        $order4->cell			= '0300-7654321';
        $order4->net_amount		= '930';
		$order4->menutype		= 'typedeal';
		$order4->order_type		= 'Delivery';
        $order4->gst			= '16';
        $order4->total_amount   = "930";
        $order4->extra_charges  = 0;
		$order4->area_id        = 4;
        $order4->save();

        $order_id = $order4->id;

        DB::table('order_details')->insert([
                'order_id'	=> $order_id,
                'deal_id'	=> 1,
                'price'		=> '930',
                'quantity'	=> '1'
            ]
        );*/
							
    }
}
