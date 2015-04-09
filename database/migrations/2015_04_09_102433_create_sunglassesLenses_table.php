<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSunglassesLensesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sunglassesLenses', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('lense_id')->unsigned();
            $table->integer('material_product_id')->unsigned();
            $table->string('image_main_side',60);
            $table->string('image_main_front',60);
            $table->foreign('lense_id')->references('id')->on('lenses')->onDelete('cascade');
            $table->foreign('material_product_id')->references('id')->on('material_product')->onDelete('cascade');
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
		Schema::drop('sunglassesLenses');
	}

}
