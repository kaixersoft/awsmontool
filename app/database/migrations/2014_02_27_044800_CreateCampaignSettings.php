<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignSettings extends Migration {


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Create Fangear Code Table
		Schema::create('campaign_settings', function($table)
		{						
			$table->engine = 'InnoDB';			
			$table->increments("id"); 
			$table->string("property");			
			$table->string('value');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("campaign_settings");
	}

}
