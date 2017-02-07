<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('description')->nullable();
            $table->string('address');
            $table->string('phone_primary', 48);
            $table->string('phone_secondary', 48)->nullable();
            $table->string('cell', 24)->nullable();
			$table->string('email')->unique();
			$table->string('contact_person')->nullable();
			$table->string('contact_phone')->nullable();
			$table->string('contact_email')->nullable();
			$table->time('open_time')->nullable();
			$table->time('close_time')->nullable();
			$table->enum('is_takeaway_only', ["true", "false"])->default("false");
			$table->integer('city_id')->default("0");
			$table->string('area_ids')->nullable();
			$table->string('menu_categories')->nullable();
			$table->integer('order_time')->default("30");
			$table->string('outof_area_charges')->nullable();
			$table->integer('gst')->default('16');
            $table->string('logo')->default('v-logo.png');
			$table->string('banner')->default('blog-post.jpg');
			$table->string('ip', '16')->nullable();
			$table->enum('status', ["Active", "Inactive"])->default("Active");
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->timestamps();
			$table->rememberToken();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
