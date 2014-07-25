<?php

use Aws\Common\Aws;
use Aws\S3\Exception\S3Exception;

//Credentials
use Aws\Common\Credentials\Credentials;


//EC2
use Aws\Ec2\Ec2Client;


class AwsController extends \BaseController {
	private $aws = false;
	private $ec2 = false;
	private $ec1 = false;
	private $s3 = false;

	public function __construct() {
		
		$credentials = new Credentials(
				Config::get('flokaws.KEY_ID'), 
				Config::get('flokaws.SECRET_KEY')
				);

		$credentials1 = new Credentials(
				Config::get('flokaws.KEY_ID1'), 
				Config::get('flokaws.SECRET_KEY1')
				);


		// Instantiate the client with the first credential set
		//$this->s3 = S3Client::factory(array('credentials' => $credentials));

		$this->ec1 = Ec2Client::factory(array(
				'credentials' => $credentials1,
				'region' =>  Config::get('flokaws.REGION')
				));


		$this->ec2 = Ec2Client::factory(array(
				'credentials' => $credentials,
				'region' =>  Config::get('flokaws.REGION')
				));


	}

	public function getTest() {

		$acnt2 = $this->ec2->DescribeInstances()['Reservations'];
		$acnt1 = $this->ec1->DescribeInstances()['Reservations'];
		return array(
			'act1' => $acnt1,
			'act2' => $acnt2
			);



	}

	public static function seeArray($data) {
		echo "<pre>";print_r($data);echo "</pre>";
	}


}