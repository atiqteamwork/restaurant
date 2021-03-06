<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('category_id');
			$table->integer('restaurant_id');
			$table->string('deal_title');
            $table->string('description');
            $table->string('price');
            $table->string('serve_quantity', 32)->default(1);
            $table->string('picture')->default('no-image.png');
			$table->string('availability')->default('Monday - Saturday');
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
        Schema::dropIfExists('deals');
    }
}
