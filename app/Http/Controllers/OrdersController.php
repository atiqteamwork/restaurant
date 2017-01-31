<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Validator;

use App\Order;
use App\OrderDetail;
use App\Restaurant;
use App\User;

use App\Dish;
use App\Deal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;


class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
		
    }
	
	
	
	/**
	*	INDEX
	*/
	public function index()
	{
		$user_role = Auth::user()->role_id;
		
		if( $user_role == 1 )
			return ($this->index_admin());
		else 
			return ($this->index_restaurant());
	}
	
	/**
	* Index page for Adminstartor Account
	*/
	public function index_admin()
	{
		$restaurants = Restaurant::get(['id', 'title']);
		$restaurants_data = [""=> "Select Restaurant"];
		
		foreach( $restaurants as $restaurant ) {
			$restaurants_data[$restaurant->id] = $restaurant->title;
		}
		
		return view("orders.index")->with("restaurants", $restaurants_data);
	}
	
	
	
	/**
	* Index page for Adminstartor Account
	*/
	public function index_restaurant()
	{
		return view("orders.rindex");
	}
	
	
	
	/**
	*
	*	Get Orders by Restaurants
	*/
	public function fetch_order_by_restaurant(Request $request)
	{
		$orders = new Order();
		$orders_data = $orders->fetch_orders_by_restaurants($request);
		
		//dd($orders_data);
		
		$return = '';
		
		if( !empty( $orders_data ) ) {
			foreach($orders_data as $order) {
				
				$label = "";
				if($order->status=='Pending'){
					$label = "label-success";
				}elseif($order->status=='Active'){
					$label = "label-primary";
				}
				
									
				$return .= "<tr id='".$order->id."'>
				<td>".$order->id."</td>
				<td>".$order->user_full_name."</td>
				
				<td>".$order->restaurant_title."</td>
				<td align='right'><strong>Net Amount: </strong> PKR ".$order->net_amount."<br><strong>G.S.T: </strong>".$order->gst."%<br><strong>Total Amount: </strong> PKR ".$order->total_amount."</td>
				<td><span class='label ".$label."'>".$order->status."</span></td>
				<td>
					<input type='hidden' name='_token' value='".csrf_token()."'>
						<a href='#' class='btn btn-success btn-sm view_order_button' data-id='".$order->id."'><i class='fa fa-info' aria-hidden='true'></i></a>
						<a class='btn btn-primary btn-sm edit_order_btn' data-id ='".$order->id."'><i class='fa fa-edit' aria-hidden='true'></i></a>
						<a href='#' class='btn btn-danger del_btn' data-id='".$order->id."'><i class='fa fa-trash'></i></a></td></tr>";
			}
		}
		
		return $return;
		
	}
	
	
	/**
	*
	*  Search Filter
	*/
	public function search_filter(Request $request)
	{
		$orders = new Order();		
		$search_result = $orders->search_filter($request);
		$return= "";
		
		if( !empty( $search_result ) ) {
			foreach($search_result as $order) {
				
				$label = "";
				
				if($order->status=='Pending'){
					$label = "label-success";
				}elseif($order->status=='Active'){
					$label = "label-primary";
				}

				$return .= "<tr id='".$order->id."'>
				<td>".$order->id."</td>
				<td>".$order->user_full_name."</td>				
				<td>".$order->restaurant_title."</td>
				<td align='right'><strong>Net Amount: </strong> PKR ".$order->net_amount."<br><strong>G.S.T: </strong>".$order->gst."%<br><strong>Total Amount: </strong> PKR ".$order->total_amount."</td>
				<td><span class='label ".$label."'>".$order->status."</span></td>
				<td>
					<input type='hidden' name='_token' value='".csrf_token()."'>
						<a href='#' class='btn btn-success btn-sm view_order_button' data-id='".$order->id."'><i class='fa fa-info' aria-hidden='true'></i></a>
						<a class='btn btn-primary btn-sm edit_order_btn' data-id ='".$order->id."'><i class='fa fa-edit' aria-hidden='true'></i></a>
						<a href='#' class='btn btn-danger del_btn' data-id='".$order->id."'><i class='fa fa-trash'></i></a>
				</td></tr>";
			}
		} else {
			$return .= "<tr id=''><td></td><td></td><td></td><td align='right'><strong>Net Amount: </strong> PKR <br><strong>G.S.T: </strong><br><strong>Total Amount: </strong> PKR </td><td><span class='label ".$label."'></span></td><td><input type='hidden' name='_token' value=''><a style='display:none !important;' href='#' class='btn btn-success btn-sm view_order_button' data-id=''><i class='fa fa-info' aria-hidden='true'></i></a><a class='btn btn-primary btn-sm edit_order_btn' data-id =''><i class='fa fa-edit' aria-hidden='true'></i></a><a href='#' class='btn btn-danger del_btn' data-id=''><i class='fa fa-trash'></i></a></td></tr>";	
		}
		
		return $return;
	}
	
	
	
	/**
	*
	* View Order by ID
	*/
	public function view_order_byid(Request $request)
	{
		$orders = new Order();
		$order_list = $orders->get_orders_byid($request);
		$return = "";		
		
		if( !empty( $order_list ) ) {

			$return = '<div class="row">
				<div class="col-md-6">
					<h4>Order Shipping Details</h4>
					<p><strong>Name: </strong>'.$order_list[0]->full_name.'<br>
						<strong>Address: </strong>'.$order_list[0]->order_address.'<br>
						<strong>Phone: </strong>'.$order_list[0]->order_phone.'<br>
						<strong>Cell: </strong>'.$order_list[0]->order_cell.'<br>
						<strong>Email: </strong>'.$order_list[0]->order_email.'</p>
				</div>
				<div class="col-md-6">
					<h4>Restaurant Details</h4>
					<p><strong>Restaurant Name: </strong>'.$order_list[0]->restaurant_title.'<br>
						<strong>Address: </strong>'.$order_list[0]->restaurant_address.'<br>
						<strong>Phone: </strong>'.$order_list[0]->restaurant_phone.'<br>
						<strong>Cell: </strong>'.$order_list[0]->restaurant_cell.'<br>
						<strong>Email: </strong>'.$order_list[0]->restaurant_email.'</p>
				</div>
			 </div>
			 <hr>
			 <div class="row">
				<div class="col-md-6">
					<h4>Order Details</h4>
					<p><strong>Order ID: </strong>'.$order_list[0]->id.'<br>
						<strong>Date: </strong>'.$order_list[0]->dated.'</p>
				</div>
				<div class="col-md-6 text-right"></div>
			 </div>';
			 
			 $return .= '<table id="OrderListTable" data-dtable class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Dish/Deal Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';
			 
			
			$item_total = 0;
			
			foreach($order_list as $order) {				
				$return .= '<tr>
                            <td>'.(!empty($order->dish_title)?$order->dish_title:$order->deal_title).'</td>
                            <td>'.$order->price.'</td>
                            <td>'.$order->quantity.'</td>
                            <td>'.($order->price * $order->quantity).'</td>
                        </tr>';
				$item_total += ($order->price * $order->quantity);
			}
			
			if( $item_total > 1000 ) 
			{
				$total_amount = round($item_total + ($item_total * $order_list[0]->gst / 100));
				$total_gst = round(($item_total * $order_list[0]->gst / 100));
			} else {
				$total_amount = $item_total;
				$total_gst = "Not Applicable";
			}
			
			
			$return .='</tbody></table>';
			
			$return .='<div class="row">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6 text-right">
					<h4>&nbsp;</h4>
					<p><strong>Net Amount: </strong>'.$item_total.'<br>
						<strong>G.S.T: &nbsp;&nbsp;&nbsp;</strong>'.$total_gst.'<br>
						<strong>Total Amount: </strong>'.$total_amount.'</p>
				</div>
			 </div>';
			
		} else {
			$return =  "";	
		}
		
		return $return;
	}
	
	
	

	
	
	/**
	* NEW Order Page
	*/
	public function new_order_page()
	{
		$user_role = Auth::user()->role_id;
		
		if( $user_role == 1) {
			
			$users = User::get(["id", "full_name", "email", "role_id"])->where("role_id",">",2);
			$users_data = [""=> "Select User"];
			
			$restaurants = Restaurant::get(['id', 'title']);
			$restaurants_data = [""=> "Select Restaurant"];
			
			foreach( $restaurants as $restaurant ) {
				$restaurants_data[$restaurant->id] = $restaurant->title;
			}
			
			foreach( $users as $user ) {
				$users_data[$user->id] = $user->full_name . " (". $user->email .")";
			}
			
			return view("orders.new")->with("restaurants", $restaurants_data)->with("users", $users_data);
		} else {
			$users = User::get(["id", "full_name", "email", "role_id", "restaurant_id"])
					->where("role_id",">",2)
					->where("restaurant_id" , Auth::user()->restaurant_id);

			$users_data = [""=> "Select User"];
			
			foreach( $users as $user ) {
				$users_data[$user->id] = $user->full_name . " (". $user->email .")";
			}
			
			return view("orders.rnew")->with("users", $users_data);
		}
	}
	
	
	
	
	
	/**
	*
	*	Add/Create New Order
	*/
	
	public function add_new_order(Request $request)
	{		
		$input = [
			"user_id" 	=> $request->user_id,
			"address" 	=> $request->address,
			"phone" 	=> $request->phone,
			"cell" 		=> $request->cell,
			"email"		=> $request->email,
			"dated"		=> $request->dated,
			"dish_id"	=> $request->dish_id,
			"deal_id"	=> $request->deal_id,
		];
		
		
		$rules = [
			'user_id' 	=> 'required',
			'address' 	=> 'required',
			'phone' 	=> 'required',
			'email'		=> 'required',
			'dated'		=> 'required|date_format:Y-m-d H:i:s|after:yesterday',
			/*'Dish_or_deal' => [
					'deal_id' => 'required_without:dish_id',
					'dish_id' => 'required_without:deal_id',
			],*/
		];
		
		$messages =  [
			'user_id.required' => 'Select a name from the list.',
			'address.required' => 'Enter Address for Delivery',
			'phone.required' 	=> 'Enter Phone so delivery person can contact you.',
			'dated.required'	=> 'Date & Time Field is required',
		];
		
		$validate = Validator::make($input,$rules, $messages);
		
		if($validate->passes()){
			$order = new Order();
		
			$order->user_id	= $request->user_id;
			$order->email	= $request->email;
			$order->phone	= $request->phone;
			$order->address	= $request->address;
			$order->cell	= $request->cell;
			$order->menutype = $request->menu_type;
			$order->extra_charges	= !empty($request->extra_charges)?$request->extra_charges:0;
			$order->restaurant_id	= isset($request->restaurants_id)?$request->restaurants_id:Auth::user()->restaurant_id;
			$order->dated	= date("Y-m-d H:i:s", strtotime( $request->dated ));
			$order->save();
			
			$order_id = $order->id;
			$net_total = 0;
			
			
			if( $order_id <= 0 ) {
				return "Error 101!";	
			}
			
			
			if( $request->menu_type == "typedeal")  {
				if( isset( $request->deal_id) && !empty( $request->deal_id ) ) {
					foreach( $request->deal_id as $deal) {
						$deal_data = Deal::find( $deal );
						DB::table('order_details')->insert([
								'order_id'	=> $order_id,
								'deal_id'	=> $deal,
								'price'		=> $deal_data->price,
								'quantity'	=> '1'
							]
						);
						
						$net_total += ($deal_data->price * 1);
					}
				}
			} else {
				if( isset( $request->dish_id) && !empty( $request->dish_id ) ) {
					foreach( $request->dish_id as $dish){
						$dish_data = Dish::find( $dish );
						DB::table('order_details')->insert([
								'order_id'	=> $order_id,
								'dish_id'	=> $dish,
								'price'		=> $dish_data->price,
								'quantity'	=> '1'
							]
						);
						
						$net_total += ($dish_data->price * 1);
					}
				}
			}
			
			
			$order = Order::find($order_id);
			$order->net_amount	= $net_total;
			$order->save();
			
			return "Success";
		} else  {		
			$messages = $validate->messages();
			$messages = json_decode( $messages );
			$message_html = "";
			
			foreach($messages as $index => $value) {
				$message_html .=  "<p>".$value[0]."</p>";
			}
			
			return $message_html;
		}
		
		
	}
	
	
	
	/**
	*
	*
	*/
	public function edit_page(Request $request)
	{

		$user_role = Auth::user()->role_id;
		
		if( $user_role == 1) {
			$order	= Order::find( $request->order_id );
			$order_d = new Order();
			$order_details = $order_d->fetch_details_byid($request);
				
				
			$users = User::get(["id", "full_name", "email", "role_id"])->where("role_id",">",2);
			$users_data = [""=> "Select User"];
			
			$restaurants = Restaurant::get(['id', 'title']);
			$restaurants_data = [""=> "Select Restaurant"];
			
			foreach( $restaurants as $restaurant ) {
				$restaurants_data[$restaurant->id] = $restaurant->title;
			}
			
			foreach( $users as $user ) {
				$users_data[$user->id] = $user->full_name . " (". $user->email .")";
			}
			
			
			$deals_data = "";//[""=> "Select Deals"];
			
			foreach( $order_details as $order_d ) {
				if( $order_d->deal_id > 0) {
					$deals_data .= $order_d->deal_id.",";
					//$deals_data[$order_d->deal_id] = $order_d->deal_title;
				}
			}
			
			$dishes_data = "";//[""=> "Select Dish"];
			
			foreach( $order_details as $order_d ) {
				if( $order_d->dish_id > 0) {
					$dishes_data .= $order_d->dish_id.",";
					//$dishes_data[$order_d->dish_id] = $order_d->dish_title;
				}
			}		
			
			return view("orders.edit")
				->with("order", $order)
				->with('order_details', $order_details)
				->with("restaurants", $restaurants_data)
				->with("deals", $deals_data)
				->with("dishes", $dishes_data)
				->with('users', $users_data);
		} else {
			
			$order	= Order::find( $request->order_id );
			$order_d = new Order();
			$order_details = $order_d->fetch_details_byid($request);
				
			$users = User::get(["id", "full_name", "email", "role_id", "restaurant_id"])
				->where("role_id",">",2)
				->where("restaurant_id" , Auth::user()->restaurant_id);

			$users_data = [""=> "Select User"];
			
			
			foreach( $users as $user ) {
				$users_data[$user->id] = $user->full_name . " (". $user->email .")";
			}
			
			
			$deals_data = "";//[""=> "Select Deals"];
			
			foreach( $order_details as $order_d ) {
				if( $order_d->deal_id > 0) {
					$deals_data .= $order_d->deal_id.",";
					//$deals_data[$order_d->deal_id] = $order_d->deal_title;
				}
			}
			
			$dishes_data = "";//[""=> "Select Dish"];
			
			foreach( $order_details as $order_d ) {
				if( $order_d->dish_id > 0) {
					$dishes_data .= $order_d->dish_id.",";
					//$dishes_data[$order_d->dish_id] = $order_d->dish_title;
				}
			}		
			
			return view("orders.redit")
				->with("order", $order)
				->with('order_details', $order_details)
				->with("deals", $deals_data)
				->with("dishes", $dishes_data)
				->with('users', $users_data);
			
		}
		
	
		
	}
	
	
	
	public function update_order(Request $request)
	{
				
		$input = [
			"user_id" 	=> $request->user_id,
			"address" 	=> $request->address,
			"phone" 	=> $request->phone,
			"cell" 		=> $request->cell,
			"email"		=> $request->email,
			"dated"		=> $request->dated,
			"dish_id"	=> $request->dish_id,
			"deal_id"	=> $request->deal_id,
		];
		
		
		$rules = [
			'user_id' 	=> 'required',
			'address' 	=> 'required',
			'phone' 	=> 'required',
			'email'		=> 'required',
			'dated'		=> 'required|date_format:Y-m-d H:i:s|after:yesterday',
			/*'Dish_or_deal' => [
					'deal_id' => 'required_without:dish_id',
					'dish_id' => 'required_without:deal_id',
			],*/
		];
		
		$messages =  [
			'user_id.required' => 'Select a name from the list.',
			'address.required' => 'Enter Address for Delivery',
			'phone.required' 	=> 'Enter Phone so delivery person can contact you.',
			'dated.required'	=> 'Date & Time Field is required',
		];
		
		$validate = Validator::make($input,$rules, $messages);
		
		if($validate->passes()){
			$order = Order::find( $request->id );
			
			$order->user_id	= $request->user_id;
			$order->email	= $request->email;
			$order->phone	= $request->phone;
			$order->address	= $request->address;
			$order->cell	= $request->cell;
			$order->menutype = $request->menu_type;
			$order->extra_charges	= $request->extra_charges;
			$order->restaurant_id	= isset($request->restaurants_id)?$request->restaurants_id:Auth::user()->restaurant_id;
			$order->dated	= date("Y-m-d H:i:s", strtotime( $request->dated ));
			$order->save();
			
			$order_id = $request->id;
			$net_total = 0;
			
			if( $order_id <= 0 ){
				return "Error 101!";	
			}
			
			OrderDetail::where('order_id', $order_id)->delete();
			
			
			if( $request->menu_type == "typedeal")  {
				if( isset( $request->deal_id) && !empty( $request->deal_id ) ) {
					foreach( $request->deal_id as $deal) {
						$deal_data = Deal::find( $deal );
						DB::table('order_details')->insert([
								'order_id'	=> $order_id,
								'deal_id'	=> $deal,
								'price'		=> $deal_data->price,
								'quantity'	=> '1'
							]
						);
						
						$net_total += ($deal_data->price * 1);
					}
				}
			} else {
				if( isset( $request->dish_id) && !empty( $request->dish_id ) ) {
					foreach( $request->dish_id as $dish){
						$dish_data = Dish::find( $dish );
						DB::table('order_details')->insert([
								'order_id'	=> $order_id,
								'dish_id'	=> $dish,
								'price'		=> $dish_data->price,
								'quantity'	=> '1'
							]
						);
						
						$net_total += ($dish_data->price * 1);
					}
				}
			}
			
			$order = Order::find($order_id);
			$order->net_amount	= $net_total;
			$order->total_amount = "0";
			$order->save();
			
			return "Success";
		} else {
			$messages = $validate->messages();
			$messages = json_decode( $messages );
			$message_html = "";
			
			foreach($messages as $index => $value) {
				$message_html .=  "<p>".$value[0]."</p>";
			}
			
			return $message_html;
		}
			
	}


	public function delete_order(Request $request)
	{
		$return1 = Order::destroy( $request->id );
		$return2 = OrderDetail::where('order_id', $request->id)->delete();
		
		//echo $return1. " | ". $return2;
		
		if( $return1 && $return2)
		{
			echo "Success";
		}else{
			return "Records Could not be deleted";	
		}
	}
	
	
	
	
	
	
	
	
}
