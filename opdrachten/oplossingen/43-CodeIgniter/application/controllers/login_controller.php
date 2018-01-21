<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller{

	private $userdata;

	public function __construct(){
		parent::__construct();

		$this->load->helper('form');
	}

	//login form
	public function index(){
		$data['title']	=	'Loginformulier';

		// Controleer: post geset is
		if ($this->input->post() !== FALSE){
			$data['message']	=	$this->validateForm();
		}

		//loginpagina
		$this->load->view('templates/header', $data);
		$this->load->view('login/login_index', $data);
		$this->load->view('templates/footer', $data);
	}

	public function validateForm(){
		//helper form-validatie
		$this->load->library('form_validation');

		$this->form_validation->set_message('required', 'Het %s-veld is verplicht.');
		$this->form_validation->set_message('valid_email', 'Het %s-veld bevat geen geldig e-mailadres.');

		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'paswoord', 'required');

		if ($this->form_validation->run() === TRUE){
			$email 		=	$this->input->post('email');
			$password	=	$this->input->post('password');

			$validUser 	=	$this->validateUser($email, $password);

			// Controleer of juiste gegevens ingevuld
			if ( $validUser ){
				$this->load->helper('cookie');

				$hashedEmail	=	hash('SHA512', $this->userdata['email'] . $this->userdata['salt']);
				$cookieValue	=	$this->userdata['email'] . ',' . $hashedEmail;

				$cookie = array(
				    'name'   => 'login',
				    'value'  => $cookieValue,
				    'expire' => 3600
				);

				$this->input->set_cookie($cookie);

				$this->load->helper('url');
				redirect('/dashboard/', 'refresh');
			}else{
				
				$message['type']	=	'error';
				$message['body']	=	'Het paswoord/emailadres zijn niet correct. Probeer opnieuw.';
				
				return $message;
			}
		}
		return false;
	}

	public function validateUser($inputEmail, $inputPassword){
		$this->load->model('login_model');

		$this->userdata		=	$this->login_model->getUserData($inputEmail);
		$dbData				=	$this->userdata;

		$dbPassword	=	$dbData['password'];
		$dbSalt		=	$dbData['salt'];

		$hashedInputPassword	=	hash('SHA512', $inputPassword . $dbSalt);

		if ($hashedInputPassword === $dbPassword){
			return true;
		}else{
			return false;
		}
	}

}