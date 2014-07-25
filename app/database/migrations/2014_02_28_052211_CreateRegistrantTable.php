<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrantTable extends Migration {


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrants', function($table)
		{			
			$table->engine = 'InnoDB';						
			$table->increments("id"); 
			$table->bigInteger("fbid");
			$table->string("fullname" , 250);	
			$table->string("email", 50);	
			$table->string("ncic", 50);			
			$table->string("mobile", 50);						
			$table->dateTime('date_registered');

		    //Add indexes
		    $table->unique('fbid');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("registrants");
	}


}
