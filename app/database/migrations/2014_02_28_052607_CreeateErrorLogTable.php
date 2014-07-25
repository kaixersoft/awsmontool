<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreeateErrorLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('error_logs', function($table)
		{			
			$table->engine = 'InnoDB';						
			$table->increments("id");
			$table->string('function_name');						 
			$table->mediumText('message');			
			$table->dateTime('date_happen');

		    //Add indexes


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("error_logs");
	}


}
