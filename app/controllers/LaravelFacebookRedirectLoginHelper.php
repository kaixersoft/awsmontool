<?php
/*
Laravel doesn't use native php session, here's what they've suggested

Ref :  https://github.com/facebook/facebook-php-sdk-v4/issues/39#issuecomment-42363729
*/
class LaravelFacebookRedirectLoginHelper extends \Facebook\FacebookRedirectLoginHelper
{
  
  //overwrite $_SESSION
  protected function storeState($state)
  {
    Session::put('state', $state);
  }

  protected function loadState()
  {
  	$this->state = Session::get('state');
    return $this->state;
  }


  //Overwrite $_GET
  protected function isValidRedirect()
  {

	return $this->getCode() && Input::has('state')
        && Input::get('state') == $this->state;

  }



  protected function getCode()
  {
    return Input::has('code') ? Input::get('code') : null;
  }


  //Fix for state value from Auth redirect not equal to session stored state value
  //Get FacebookSession via User access token from code
  public function getAccessTokenDetails($app_id,$app_secret,$redirect_url,$code)
  {
	 
	    $token_url = "https://graph.facebook.com/oauth/access_token?"
	      . "client_id=" . $app_id . "&redirect_uri=" . urlencode($redirect_url)
	      . "&client_secret=" . $app_secret . "&code=" . $code;
	 
	    $response = file_get_contents($token_url);
	    $params = null;
	    parse_str($response, $params);
	 
	    return $params;
   }


}