<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Order;

class VisitorController extends Controller
{
    
	/**
	 *
	 **/
	public function __construct()
    {
        $this->middleware('auth');
     
	    parent::__construct();
    }
	
	
	/**
	 *
	 **/
	public function index()
	{
		$orders = Order::where("user_id", Auth::user()->id)->get();
		
		return view("frontend.user.orders")->with("orders", $orders);
	}
	
	
	
	/**
    *
    *  Search Filter
    */
    public function search_filter(Request $request)
    {
        //$orders = new Order();		
        //->search_filter_user($request);
				
		$filter 	= $request->filter;
		$from_date 	= "";
		$to_date 	= "";
		
		$result = Order::where("user_id", Auth::user()->id);
		
		switch( $filter )
		{
			case "filter_previous_year":
				$result = $result->whereYear('dated', '=', date("Y", strtotime("-1 Year")));
				break;
			
			case "filter_this_year":
				$result = $result->whereYear('dated', '=', date("Y"));
				break;
				
			case "filter_previous_month":
				$result = $result->whereYear('dated', '=', date("Y"));
				$result = $result->whereMonth('dated', '=', date("m", strtotime("-1 Month")));
				break;
				
			case "filter_this_month":
				$result = $result->whereYear('dated', '=', date("Y"));
				$result = $result->whereMonth('dated', '=', date("m"));
				break;
				
			case "filter_previous_week":	
				$from_date  = strtotime("last sunday midnight", strtotime("-1 week +1 day"));
				$to_date    = strtotime("next sunday",$from_date);
				
				$from_date  = date("Y-m-d",$from_date);
				$to_date    = date("Y-m-d",$to_date);
				
				$result     = $result->whereBetween('dated', [$from_date, $to_date]);
				break;
				
			case "filter_this_week":	
				$from_date = strtotime("last sunday midnight");
				$to_date   = strtotime("next sunday",$from_date);
				
				$from_date = date("Y-m-d",$from_date);
				$to_date   = date("Y-m-d",$to_date);
				
				$result = $result->whereBetween('dated', [$from_date, $to_date]);
				break;
				
			case "filter_between":
				$from_date = date("Y-m-d", strtotime($request->from_date));
				$to_date   = date("Y-m-d", strtotime($request->to_date));
				
				$result    = $result->whereBetween('dated', [$from_date, $to_date]);
				break;
		}
		
		//dd( $result->get() );
		
        $return= "";
        $label = "";
		
        if( !empty( $search_result ) ) {
            foreach($search_result as $order) {
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
	
	
}
