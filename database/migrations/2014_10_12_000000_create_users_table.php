<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('username', 30)->unique();
            $table->string('password');
			$table->string('address')->nullable();
			$table->string('phone')->nullable();
			$table->string('cell')->nullable();
			$table->integer('restaurant_id')->default("0");
			$table->integer('role_id');
            $table->string('avatar')->default('no-image.png');
			$table->string('ip', '16')->nullable();
			$table->enum('status', ["Active", "Inactive"])->default("Active");
            $table->timestamps();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('users');
    }
}
