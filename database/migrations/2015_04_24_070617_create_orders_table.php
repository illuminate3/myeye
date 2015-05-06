<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('material_product_id');
            $table->integer('sunglassesLense_id');
            $table->integer('user_id');
            $table->tinyInteger('count');
            $table->tinyInteger('active')->default(0);
            $table->tinyInteger('seen');
            //$table->foreign('material_product_id')->references('id')->on('material_product')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('orders');
	}

}
