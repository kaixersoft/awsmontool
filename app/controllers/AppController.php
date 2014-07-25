<?php

class AppController extends \BaseController {





	/*
		Check is User have previously registered
	*/
	public function getUserExists() {
		$data = Input::all(true); //Enable XSS filtering
		$fbId = $data['fbid'];		

		$isThere = DB::table('registrants')
                    ->where('fbid', '=', $fbId)
                    ->count();

		$exists = ( $isThere == '0' ) ? 'no' : 'yes';       

		$endOfCampaign = ($this->is_campaign_end()) ? 'yes' : 'no';

		return Response::json(array(
		    		'exists' => $exists,
		    		'endcampaign' => $endOfCampaign,
	    			'fbib' => $fbId
		));			

	}



	/*
		Register an Entry
	*/
	public function getRegister() {

		$data = Input::all(true); //Enable XSS filtering

		$fbId = (isset($data['fbid'])) ? $data['fbid'] : null;
		$name = $data['name'];
		$mobile = $data['mobile'];
		$nric = $data['nric'];
		$email = $data['email'];						

		//check for missing facebook Id
		if ( is_null($fbId)) {
   			return Response::json(array(
    			'status' => 'failed',
    			'msg' => "Please allow the application to continue"
    		));				
		}


		//Get Server Timestamp base on application timezone
		$appTimeStamp = $this->get_app_timestamp();				

		//Save Registration details and get Reg_Id
		try {	

				$newRegId = DB::table('registrants')->insertGetId(
					array(
						'fbid' => $fbId ,
						'fullname' => $name ,
						'email' => $email ,
						'ncic' => $nric ,
						'mobile' => $mobile ,																																		
						'date_registered' => $appTimeStamp
						)
				);

				return Response::json(array(
		    		'insertid' => $newRegId,
	    			'status' => 'success',
	    			'msg' => 'Successfully Registered a user'
		    	));	

		} catch(Exception $e) {			

   			return Response::json(array(
    			'status' => 'failed',
    			'msg' => $e->getMessage()
    		));												   		
		}

	}







	/*
		Check if Campaign Ends
	*/
	public function is_campaign_end() {

		$campaign_end_date = null;
		$settings = $this->get_campaign_settings();

		//Get Campaign End
		foreach ($settings as $attr) {			
		    if ($attr->property  == 'campaign_end')  $campaign_end_date = $attr->value;
		}		

		$end = strtotime($campaign_end_date);
		$now = strtotime( $this->get_app_timestamp() );

		return ( $now >= $end ) ? true :false;
		
	}



	/*
		Get Campaign Settings
	*/
	public function get_campaign_settings() {
		return DB::table('campaign_settings')->get();
	}








	/*
		Log Error message found	
	*/
	protected function app_log_error($functionName, $message){
		$timeStamp = $this->get_app_timestamp();
		DB::table('error_logs')->insert(
			array(
				'function_name' => $functionName,
				'message' => $message ,
				'date_happen' => $timeStamp
				)
		);
	}


	/*
		Get new Server Date base on application timezone
	*/
	protected function get_app_timestamp() {
		date_default_timezone_set(Config::get('facebook.APP_TIMEZONE'));
		return date('Y-m-d H:i:s');
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return Response::json(array(
			'name' => 'Xerxis Anthony B. Alvar',
			'email' => 'kaixersoft@gmail.com'
		));
	}


     

}