<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
 	public function run()
    {
        //Campaign Settings Seeder
        $this->call('CampaignSettingsTableSeeder');
        $this->command->info('Campaign Settings table seeded!');        

        
    }

}