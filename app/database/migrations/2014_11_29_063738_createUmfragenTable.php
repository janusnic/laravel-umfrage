<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmfragenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('umfragen', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')
				->nullable();
			$table->integer('author_id')
				->nullable();
			for($i = 1; $i < 21; $i++)
			{
				$table->string('question' . $i);
			}
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
		Schema::drop('umfragen');
	}

}
