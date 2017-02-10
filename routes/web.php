<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respondto using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/admin', 'PagesController@home');
Route::get('/home/', 'PagesController@home');
Route::get('/', 'FrontendController@index');

Route::get('/landing', 'FrontendController@index2');


/**
 * User Routs
 */
Route::get('change_password', 'UsersController@change_password');
Route::put('update_password/{id}', 'UsersController@update_password');

Route::group(['middleware' => ['auth']], function() {

    Route::get('profile/{username}/edit', 'ProfileController@edit');
    Route::put('profile/{username}', 'ProfileController@update');

    Route::group(['middleware' => ['role:admin|restaurant|user'], 'prefix' => 'admin'], function() {
        Route::get('users', 'UsersController@index');
        Route::post('users/ajax', 'UsersController@ajax');
        Route::delete('users/{id}', 'UsersController@destroy');
		Route::delete('users/{id}/edit', 'UsersController@pulk');
        Route::resource('customers', 'CustomersController');
        Route::post('customers/ajax', 'CustomersController@ajax');
    });
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('admin/users', 'UsersController@get_users');
Route::resource('admin/users/ajax', 'UsersController@ajax');
Route::resource('admin/users/{id}/edit', 'UsersController@getAdminStaffById');
Route::resource('admin/users/new', 'UsersController@new_user');
Route::resource('admin/users/get_user_byid', 'UsersController@get_user_byid');
Route::resource('admin/users/update-user', 'UsersController@update_users');
Route::resource('admin/users/del', 'UsersController@delete_user');





/**
 *  
 *	Categories Routes
 */

Route::get('admin/categories', 'MenuCategoryController@index');
Route::resource('admin/category/new', 'MenuCategoryController@new_category');
Route::resource('admin/category/update', 'MenuCategoryController@update_category');
Route::resource('admin/category/fetch_by_id', 'MenuCategoryController@fetch_by_id');
Route::resource('admin/category/del', 'MenuCategoryController@delete_category');



/**
*	Areas Routes
*/
Route::get('admin/areas', 'AreaController@index');
Route::resource('admin/areas/new', 'AreaController@new_area');
Route::resource('admin/areas/update', 'AreaController@update_area');
Route::resource('admin/areas/fetch_by_id', 'AreaController@fetch_by_id');
Route::resource('admin/areas/del', 'AreaController@delete_area');
Route::resource('admin/area/update_restaurant_areas', 'AreaController@update_restaurant_areas');




/**
*	Cities Routes
*/
Route::get('admin/cities', 'CityController@index');
Route::resource('admin/city/new', 'CityController@new_city');
Route::resource('admin/city/fetch_by_id', 'CityController@fetch_by_id');
Route::resource('admin/city/del', 'CityController@delete_city');
Route::resource('admin/city/update', 'CityController@update_city');


/**
*
*	Restaurant Routes
*/
Route::get('admin/restaurants', 'RestaurantController@index');
Route::resource('admin/restaurant/new', 'RestaurantController@new_restaurant_page');
Route::post('admin/restaurant/add_new', 'RestaurantController@add_new_restaurant');
Route::resource('admin/restaurants/fetch_by_id', 'RestaurantController@fetch_by_id');
Route::resource('admin/restaurants/update', 'RestaurantController@update_restaurant');
Route::resource('admin/restaurant/del', 'RestaurantController@delete_restaurant');



/**
*
*	Restaurant Routes
*/
Route::get('admin/setting/front-page-image', 'SettingController@front_page_image');
Route::resource('admin/settings/update-frontpage-image', 'SettingController@update_frontpage_image');
Route::get('admin/setting/admin-email', 'SettingController@admin_email');
Route::resource('admin/settings/update-admin-email', 'SettingController@update_admin_email');

/**
*
*	Restaurant Menus
*/

Route::get('admin/restaurant-menus', 'DishesController@index');


Route::resource('admin/restaurants/fetch_dish_by_restaurant', 'DishesController@fetch_dish_by_restaurant');
Route::resource('admin/restaurant-menus/add_new', 'DishesController@add_new_dish');
Route::resource('admin/restaurant-menus/fetch_dish_byid', 'DishesController@fetch_dish_byid');
Route::resource('admin/restaurant-menu/update', 'DishesController@update_dish');
Route::resource('admin/restaurant-menu/del', 'DishesController@delete_dish');
Route::resource('get_restaurant_menus', 'DishesController@get_restaurant_menus');



/**
*
*	Restaurant Deals
*/

Route::get('admin/restaurant-deals', 'DealsController@index');
Route::resource('admin/restaurants/fetch_deal_by_restaurant', 'DealsController@fetch_deal_by_restaurant');
Route::resource('admin/restaurant-deal/add_new', 'DealsController@add_new_deal');
Route::resource('admin/restaurant-deal/fetch_deal_byid', 'DealsController@fetch_deal_byid');
Route::resource('admin/restaurant-deal/update', 'DealsController@update_deal');
Route::resource('admin/restaurant-deal/del', 'DealsController@delete_deal');


Route::get('admin/orders', 'OrdersController@index');
Route::resource('admin/orders/fetch_order_by_restaurant', 'OrdersController@fetch_order_by_restaurant');
Route::resource('admin/orders/search_filter', 'OrdersController@search_filter');
Route::resource('admin/orders/view_order_byid', 'OrdersController@view_order_byid');
Route::resource('admin/orders/new', 'OrdersController@new_order_page');
Route::resource('admin/orders/add_new', 'OrdersController@add_new_order');
Route::resource('admin/orders/edit', 'OrdersController@edit_page');
Route::resource('admin/orders/update_order', 'OrdersController@update_order');
Route::resource('admin/orders/del', 'OrdersController@delete_order');


Route::resource('c/get_dishes_r', 'CommonController@get_dishes_by_restaurant');
Route::resource('c/get_deals_r', 'CommonController@get_deals_by_restaurant');
Route::resource('c/get_users_p', 'CommonController@get_user_details_byid');
Route::resource('c/get_dishes_rt', 'CommonController@get_dishes_by_restaurantt');
Route::resource('c/get_deals_rt', 'CommonController@get_deals_by_restaurantt');
Route::resource('c/get_restaurants', 'CommonController@get_restaurants_bykeyword');
Route::resource('c/get_restaurant_areas', 'CommonController@get_restaurants_areas');
Route::resource('c/get_city_areas', 'CommonController@get_city_areas');
Route::resource('c/search_dishes', 'CommonController@search_dishes_page');



Route::get('session/get_it','SessionController@get_session');
Route::get('session/del','SessionController@destroy_session');

Route::resource('/restaurants/find', 'CommonController@get_restaurants_insearch');
Route::get('/search/{id}/{title}/{area_id}', 'FrontendController@search_dishes_page');
Route::resource('cart/check/delivery_area/', 'CommonController@is_restaurant_area');



/**
 *   Cart Routes
 */
Route::resource('cart/add', 'CartController@addto_main_cart');
Route::resource('cart/view', 'CartController@view_cart');
Route::post('cart/item/delete', 'CartController@delete_item');
Route::resource('cart/item/changequantity', 'CartController@change_quantity');
Route::post('cart/checkout/update', 'CartController@update_checkout');
Route::get('/checkout', 'CartController@checkout');

Route::resource('/checkout/proceed', 'CartController@proceed_checkout');

Route::resource('chat', 'ChatController');


Route::post('checkout/login', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@login');
Route::resource('restaurant/all', 'CommonController@top_restaurants');
Route::resource('html/restaurants/get_by_city', 'CommonController@get_restaurants_bycity');


Route::get('visitor/orders', 'VisitorController@index');
Route::resource('visitor/orders/search_filter', 'VisitorController@search_filter');
Route::resource('order_completed', 'CartController@order_completed');


Route::any('{catchall}', function() {
  echo "404";
})->where('catchall', '.*');
