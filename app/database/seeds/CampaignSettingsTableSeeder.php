<?php

// CampaignTableSeeder.php    
class CampaignSettingsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('campaign_settings')->truncate();

        $campaignTable = [
            //Admin User Account
            ['property' => 'admin_username' , 'value' => 'dummy'],
            ['property' => 'admin_password' , 'value' => 'badass'],

            //Campaign End
            ['property' => 'campaign_end' , 'value' => '2014-03-07 11:59:59']

        ];
        DB::table('campaign_settings')->insert($campaignTable);
    }

}