<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->integer('restaurant_id');
			
			$table->string('first_name', 128)->nullable();
			$table->string('last_name', 128)->nullable();
			$table->string('company')->nullable();
			$table->string('email');
			$table->string('address1');
			$table->string('address2');
			$table->string('phone');
			$table->string('cell')->nullable();
			$table->string('city', 128)->nullable();
			
			$table->string('shipping_first_name', 128)->nullable();
			$table->string('shipping_last_name', 128)->nullable();
			$table->string('shipping_company')->nullable();
			$table->string('shipping_email');
			$table->string('shipping_address1');
			$table->string('shipping_address2');
			$table->string('shipping_phone');
			$table->string('shipping_cell')->nullable();
			$table->string('shipping_city', 128)->nullable();
			
			$table->string('notes')->nullable();
			$table->datetime('dated');
			$table->integer('net_amount')->default(0);
			$table->integer('gst')->default(0);
			$table->integer('area_id')->default(0);
			$table->enum('menutype', ['typedish', 'typedeal'])->default("typedish");
			$table->string('order_type'); //->default("Takeway");
			$table->integer('total_amount')->default(0);
			$table->integer('extra_charges')->default(0);
			$table->enum('status', ["Pending", "Under Review", "Verified", "Delivered", "Returned"])->default("Pending");
            $table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->rememberToken();
        });
		
		
		
		
		
		Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('order_id');
			$table->integer('dish_id')->default(0);
			$table->integer('deal_id')->default(0);
			$table->integer('price');
			$table->integer('quantity');
			$table->enum('status', ["Active", "Inactive"])->default("Active");
            $table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->rememberToken();
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
		Schema::dropIfExists('order_details');
    }
}
