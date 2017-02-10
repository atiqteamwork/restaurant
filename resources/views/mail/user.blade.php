<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="{{ getenv('APP_URL') }}" />
    <title>Order</title>
</head>
<body style="background-color: white;">
<div style="background-color: #333333; width: 800px; border-top: 3px solid #2299dd; float: left; height: 75px;">
    <div style="margin-top: 10px;">
        <div style="float: left; margin-left: 20px;">
            <a href="#"><img src="http://teamworktec.com/demo/restaurant/public/assets/images/online/logo.jpg"/> </a>
        </div>

        <div style="float: right; margin-right: 20px;">
            <ul style="list-style:none">
                <li style="display:inline-block; margin-left:5px; cursor:pointer; list-style:none;"><img src="http://teamworktec.com/demo/restaurant/public/assets/images/online/facebook.jpg"></li>
                <li style="display: inline-block; margin-left: 5px; cursor: pointer;"><img src="http://teamworktec.com/demo/restaurant/public/assets/images/online/twitter.jpg"></li>
                <li style="display: inline-block; margin-left: 5px; cursor: pointer;"><img src="http://teamworktec.com/demo/restaurant/public/assets/images/online/google.jpg"></li>
            </ul>
        </div>

        <div style="float: left; text-transform: capitalize;">
            <h1 style="color: #2299dd; margin-top: 10px; margin-bottom: 4px;">TeamWork Restaurant</h1>
            
            
            <div style="float: left; width: 100%;">
            <table style="width: 50%; border-collapse: collapse;">
                
                <tr style="background-color: #ffffff;">
                <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Order #</td>
                <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{$order->id}}</td>
                </tr>
                    
           
                <tr style="background-color: #ffffff;">         
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">To</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping') ? $order->shipping_first_name . ' '. $order->shipping_last_name : $order->first_name . ' '. $order->last_name}}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Address</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')? $order->shipping_address1 :$order->address1}}</td>
                </tr>
                
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;"></td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')? $order->shipping_address2 :  $order->address2}}</td>
                </tr>
                
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">City</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')? $order->City->city_name :$order->City->city_name}}</td>
                </tr>
                
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Area</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;"></td>
                </tr>
                
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Phone</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')?$order->shipping_phone:$order->phone}}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Cell</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')? $order->shipping_cell :$order->cell}}</td>
                </tr>
                <tr style="background-color: #ffffff;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">Email</td>
                    
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($order->shipping_location == 'Shipping')? $order->shipping_email :$order->email}}</td>
                </tr>
                
            </table>
            
        </div>
        
        <br>
        <br>
        <br>    
            

        </div>
<br><br><br>
        <div style="float: left; width: 100%;">
        	
        
            <table style="  width: 100%; border-collapse: collapse;">
                <tr style=" border: 1px solid #dddddd;">
                    <th style=" border: 1px solid #dddddd; color: #000; font-size: 18px;padding: 10px; width:10%">Sr No.</th>
                    <th style=" border: 1px solid #dddddd; color: #000; font-size: 18px;">Name</th>
                    <th style=" border: 1px solid #dddddd; color: #000; font-size: 18px;">Price</th>
                    <th style=" border: 1px solid #dddddd; color: #000; font-size: 18px;">Quantity</th>
                    
                   <th style=" border: 1px solid #dddddd; color: #000; font-size: 18px;">Total</th>
                    
                </tr>
                <?php $counter = 1; $total = 0; ?>
                @foreach( $order->OrderDetail as $od )
                
                <tr style="background-color: #efefef;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{$counter++}}</td>
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;">{{($od->deal_id != 0) ? $od->Deals[0]->deal_title : $od->Dishes[0]->dish_title}}</td>
                    <td  style="text-align: right; padding:12px; border: 1px solid #dddddd;">{{$od->price}}</td>
                    <td  style="text-align: right; padding:12px; border: 1px solid #dddddd;">{{$od->quantity}}</td>
                    <td  style="text-align: right; padding:12px; border: 1px solid #dddddd;"><?php echo $od->price * $od->quantity; ?></td>
                    
                    <?php $total +=  ($od->price * $od->quantity); ?>
                </tr>
                
                @endforeach
                
                
                <tr style="background-color: #efefef;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;"></td>
                    
                    <th  style="text-align: left; padding:12px; border: 1px solid #dddddd;" colspan="2">Order Total</th>
                    
                    <th  style="text-align: right; padding:12px; border: 1px solid #dddddd;" colspan="2">{{$total}}</th>
                    
                </tr>
                
                <tr style="background-color: #efefef;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;"></td>
                    
                    <th  style="text-align: left; padding:12px; border: 1px solid #dddddd;" colspan="2">G.S.T</th>
                    
                    <th  style="text-align: right; padding:12px; border: 1px solid #dddddd;" colspan="2"><?php $gst = round(($order->Restaurant["gst"] / 100) * $total); echo $gst; $net_total = $total + $gst?></th>
                    
                </tr>
                
                <tr style="background-color: #efefef;">
                    <td  style="text-align: left; padding:12px; border: 1px solid #dddddd;"></td>
                    
                    <th  style="text-align: left; padding:12px; border: 1px solid #dddddd;" colspan="2">Total</th>
                    
                    <th  style="text-align: right; padding:12px; border: 1px solid #dddddd;" colspan="2">{{$net_total}}</th>
                    
                </tr>
                
                
                
                
            </table>
            <footer style="background-color: #000; padding: 10px;">
                <h1 style="color: #fff; text-align: center">Taste the difference</h1>
                <p style="color: #fff; text-align: center; line-height: 25px;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                    you need to be sure there isn't anything embarrassing hidden in the middle of text.  </p>

            </footer>
        </div>
    </div>
</div>






</body>
</html>