<?php

class AdminController extends \BaseController {


	/* ////////// COMMON ADMIN METHODS \\\\\\\\\\\\\\\\\\\\\\*/

	/**
	 * Check for valid Admin acces
	 *
	*/
	public function is_validadmin( $username , $password ) {

		$settings = $this->get_campaign_settings();
		$validUsername = null;
		$validPassword = null;

		//Get valid Username and Password from settings
		foreach ($settings as $attr) {			
		    if ($attr->property  == 'admin_username')  $validUsername = $attr->value;
		    if ($attr->property  == 'admin_password')  $validPassword = $attr->value;
		}	

		return ( $username == $validUsername  &&  $password == $validPassword ) ? true : false;

	}



	/*
		Get Campaign Settings
	*/
	public function get_campaign_settings() {
		return DB::table('campaign_settings')->get();
	}




	/* ////////// REPORTS \\\\\\\\\\\\\\\\\\\\\\*/



	/*
		Get Total Reports
	*/
	public function get_total_reports() {
		$data = [
			'total_registrants' => $this->get_total_registrants()
		];
		return $data;
	}



	/*
		Get Total no. of registratns
	*/
	public function get_total_registrants() {
		return DB::table('registrants')->count();
	}






	/* ////////// DOWNLOADS \\\\\\\\\\\\\\\\\\\\\\*/
	/*
		Note :
		> mkdir /downloads
		> sudo chmod 777 downloads/
	*/

	/*
		Registrants report
	*/
	public function registrants_report() {

	    //CSV File Headers
	    $titles = array("FACEBOOK ID","FULL NAME","EMAIL","NRIC","MOBILE","DATE REGISTERED");	    		

	    //Database Fields
		$fields = [
			'registrants.fbid','registrants.fullname','registrants.email','registrants.ncic','registrants.mobile','registrants.date_registered'
		];

		$data = DB::table('registrants')
					->select($fields)
					->get();
	
		$table = $data;
		$filename = time() . '_tempfile.csv';
	    $file = fopen('downloads/' . $filename , 'w');    
	    $headerTitles = false;
	    foreach ($table as $row) {
	    	if ( !$headerTitles) {
				fputcsv($file, $titles);
				$headerTitles=true;
	    	}
	        fputcsv( $file, get_object_vars($row) );
	    }
	    fclose($file);		

		//$contents =  file_get_contents(URL::to('downloads/' . $filename));
		$contents =  file_get_contents('http:' . Config::get('facebook.BASE_URL').'downloads/' . $filename);

		return $contents;
		
	}

	
	

}