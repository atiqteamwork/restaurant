<aside class="main-sidebar scroll-bar">
    <div class="logo text-center clearfix"> <a href="{{url('/')}}"> <img src="assets/images/logo.png" alt="logo"/> </a> <a href="javascript:;" class="menu-toggle hidden-lg pull-right"> <i></i> <i></i> <i></i> </a> </div>
    <nav>
        <ul class="sidebar-menu list-unstyled">
            <li class="nav-header"> <span>Navigations</span> </li>
            <!--<li> <a href="#ui-elements" onClick="return false" class="drop-link" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-puzzle-piece icon"></i> UI Elements <i class="fa fa-chevron-down arrow"></i> </a>
                <ul id="ui-elements" class="list-unstyled collapse sidebar-menu submenu">
                    <li> <a href="#"> <i class="fa fa-circle-o-notch icon"></i> </a> </li>
                </ul>
            </li> -->
            
            
            <!-- Administrator Panel Sidebar -->
            @if( isset( Auth::user()->role_id) && Auth::user()->role_id == 1 )
                <li> <a href="{{url('admin/cities')}}"> <i class="fa fa-location-arrow icon"></i> Cities </a> </li>
                <li> <a href="{{url('admin/areas')}}"> <i class="fa fa-location-arrow icon"></i> Areas </a> </li>
                <li> <a href="{{url('admin/categories')}}"> <i class="fa fa-bars icon"></i> Menu Categories </a> </li>
                
                <li> <a href="#ui-elements" onClick="return false" class="drop-link" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-cutlery icon"></i> Restaurants <i class="fa fa-chevron-down arrow"></i> </a>
                <ul id="ui-elements" class="list-unstyled collapse sidebar-menu submenu">
                
                        <li> <a href="{{url('admin/restaurants')}}"> <i class="fa fa-circle-o-notch icon"></i> Restaurant List</a> </li>
                
                    
                    <li> <a href="{{url('admin/restaurant-menus')}}"> <i class="fa fa-circle-o-notch icon"></i> Restaurant Menus</a> </li>
                    
                    <li> <a href="{{url('admin/restaurant-deals')}}"> <i class="fa fa-circle-o-notch icon"></i> Restaurant Deals</a> </li>
                </ul>
            </li>
                <li> <a href="{{url('admin/orders')}}"> <i class="fa fa-bars icon"></i> Orders </a> </li>
                
                
                
                
                <li> <a href="#ui-elements2" onClick="return false" class="drop-link" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-gears icon"></i> Settings <i class="fa fa-chevron-down arrow"></i> </a>
                <ul id="ui-elements2" class="list-unstyled collapse sidebar-menu submenu">
                        <li> <a href="{{url('admin/setting/front-page-image')}}"> <i class="fa fa-circle-o-notch icon"></i> Frontpage Image</a> </li>
                        <li> <a href="{{url('admin/setting/admin-email')}}"> <i class="fa fa-circle-o-notch icon"></i> Admin Email </a> </li>
                </ul>
            </li>
                
                
                
                
                
                
                
            @endif
             <!-- ./ Administrator Panel Sidebar -->
            
            
            
            @if( isset( Auth::user()->role_id) && Auth::user()->role_id == 2 )
                <li> <a href="{{url('admin/areas')}}"> <i class="fa fa-location-arrow icon"></i> Areas </a> </li>
                <li> <a href="#ui-elements" onClick="return false" class="drop-link" data-toggle="collapse" aria-expanded="false"> <i class="fa fa-cutlery icon"></i> Restaurants <i class="fa fa-chevron-down arrow"></i> </a>
                <ul id="ui-elements" class="list-unstyled collapse sidebar-menu submenu">
                    <li> <a href="{{url('admin/restaurant-menus')}}"> <i class="fa fa-circle-o-notch icon"></i> Restaurant Menus</a> </li>
                    
                    <li> <a href="{{url('/restaurant-deals')}}"> <i class="fa fa-circle-o-notch icon"></i> Restaurant Deals</a> </li>
                </ul>
            </li>
                <li> <a href="{{url('admin/orders')}}"> <i class="fa fa-bars icon"></i> Orders </a> </li>
            @endif
            
            
            
            
            <li> <a href="{{url('admin/users')}}"> <i class="fa fa-calendar icon"></i> Users </a> </li>
            <li class="nav-header"><span>Controls</span></li>
            <li> <a href="{{ url('/logout') }}"> <i class="fa fa-calendar icon"></i> Logout </a> </li>
            
            
        </ul>
    </nav>
</aside>
