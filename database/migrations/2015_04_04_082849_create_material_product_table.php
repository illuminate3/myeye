<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('material_product', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('price')->unsigned();
            $table->string('image_item_front',60);
            $table->string('image_item_side',60);
            $table->string('image_main_side',60);
            $table->string('image_main_front',60);
            $table->tinyInteger('slide_show')->default(0);
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->tinyInteger('active')->default(1);
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
		Schema::drop('material_product');
	}

}
