<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('session_key');
			$table->datetime('dated');
            $table->integer('restaurant_id');
            $table->string('extra_charges');
			$table->string('order_type'); //->default("Takeway");
			$table->integer('area_id')->default('0');
			$table->enum('status', ["Active", "Inactive", 'Ordered'])->default("Active");
            $table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->rememberToken();
        });
		
		Schema::create('cart_details', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('cart_id');
			$table->integer('item_id');
			$table->integer('price');
			$table->integer('quantity');
			$table->string('details')->nullable();
			$table->enum('item_type', ["dish", "deal"])->default("dish");
			$table->enum('status', ["Active", "Inactive"])->default("Active");
            $table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
		Schema::dropIfExists('cart_details');
    }
}
