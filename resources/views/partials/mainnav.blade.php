<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
            <a class="navbar-brand" href="{{url('/')}}"><img src="assets_front/images/res_logo.png" alt="logo"></a> <span class="toggle-order-now hidden-lg hidden-md"> <a href="#" class="btn btn_order_now">ORDER NOW</a> </span> </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <!--<li><a href="">All Restaurants</a></li>-->
                <li class="visible-lg visible-md"><a href="{{url('/restaurant/all')}}" class="btn btn_order_now">ORDER NOW</a></li>
                <li><a href="{{url('/checkout')}}">Cart</a></li>
            
                @if( Auth::check() )
	                <li><a href="{{url('visitor/orders')}}">My Orders</a></li>
    	            <li><a href="{{url('logout')}}">Logout</a></li>
                @else
        	        <li><a href="{{url('login')}}">Login</a></li>
                @endif
            </ul>
        </div>	
    </div>
</nav>
