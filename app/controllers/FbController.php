<?php

use Facebook\GraphSessionInfo;
use Facebook\FacebookSession;
use Facebook\FacebookCurl;
use Facebook\FacebookHttpable;
use Facebook\FacebookCurlHttpClient;
use Facebook\FacebookResponse;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;
use Facebook\FacebookRequest;
use Facebook\FacebookSDKException;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\GraphUser;
use Facebook\GraphObject;


//Laravel doesn't use Native PHP $_SESSION
//Re-Implement Facebook Session Saving
use LaravelFacebookRedirectLoginHelper;

class FbController extends \BaseController {


	public function auth() {

		//Initialize
		FacebookSession::setDefaultApplication(Config::get('facebook.AppId'),Config::get('facebook.AppSecret'));	
		//Authentication via Redirect ( for website )
		$helper = new LaravelFacebookRedirectLoginHelper(Config::get('facebook.BASE_URL'));		
		$scope = explode(',',Config::get('facebook.FB_PERMISSION'));
		$loginUrl = $helper->getLoginUrl($scope);

		try {
		  $session = $helper->getSessionFromRedirect();
		} catch(FacebookRequestException $ex) {
		  // When Facebook returns an error
			var_dump($ex);
		} catch(\Exception $ex) {
		  // When validation fails or other local issues
			var_dump($ex);
		}

		//still no session found
		if (!isset($session)) {
			
			//try to get session from code return by Auth dialog		  
			if ( Input::has('code') && !isset($session) ) {

				$userAccessToken = $helper->getAccessTokenDetails(
						Config::get('facebook.AppId'),
						Config::get('facebook.AppSecret'),
						Config::get('facebook.BASE_URL'),
						Input::get('code')
					)['access_token'];

				//Set Facebook Session using UserAccessToken
				$session = new FacebookSession($userAccessToken);

			} else {

				//Authorize the app first
				echo "<script>top.location.href = top.location.href='". $loginUrl ."';</script>";	  
			} 
			
		}


		
		if ($session) {
			echo "<p>we have valid session now</p>";
			
			$me = (new FacebookRequest(
					  $session, 'GET', '/me'
					))
					->execute()
					->getGraphObject(GraphUser::className());

			echo "<pre>";
			print_r($me);
			echo "</pre>";

			echo "Facebook User AccessToken : " . $session->getToken();

		} else {
			echo "<p>NO valid session now</p>";
		}


	}


}

