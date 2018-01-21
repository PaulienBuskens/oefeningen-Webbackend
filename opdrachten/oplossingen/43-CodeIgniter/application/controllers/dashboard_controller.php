<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller {

	private $isLoggedIn	=	false;
	private $userdata;

	public function __construct(){
		parent::__construct();
		$this->isLoggedIn	=	$this->validateUser();

	}

	public function index(){

		if ($this->isLoggedIn){
			$data['title']	=	"Dashboard";
			$data['user']	=	$this->userdata['email'];

			$this->load->view('dashboard/templates/dashboard_header', $data);
			$this->load->view('dashboard/dashboard_index', $data);
			$this->load->view('dashboard/templates/dashboard_footer', $data);
		}
	}

	public function validateUser(){
		$this->load->helper('cookie');
		$this->load->model('login_model');

		$rawCookieData	=	$this->input->cookie('login');

		$cookieData 	=	explode(',', $rawCookieData);

		// check cookies
		if (isset($cookieData[1])){
			$cookieEmail		=	$cookieData[0];
			$cookieHashedEmail	=	$cookieData[1];

			$this->userdata 	= 	$this->login_model->getUserData($cookieEmail);
			$dbData				=	$this->userdata;

			$dbSalt				=	$dbData['salt'];

			
			// Maak de hash via emailadres en de salt uit de database
			$hashedEmail 		=	hash('SHA512', $cookieEmail . $dbSalt);

			if ($cookieHashedEmail === $hashedEmail){
				return true;
			}
		}else{
			// Het login form
			$this->load->helper('url');
			redirect('/logout/', 'refresh');
		}
	}

}
