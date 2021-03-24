<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->longText('description');
			$table->float('price');
			$table->integer('remain');
			$table->string('image', 200);
			$table->integer('category_id')->unsigned();
			$table->integer('active')->default('1');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}