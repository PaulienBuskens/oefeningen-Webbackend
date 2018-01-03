<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller 
{

	// Variabele om userdata in op te slagen
	private $userdata;

	public function __construct()
	{
		parent::__construct();

		$this->load->helper('form');
	}

	// Load login form
	public function index()
	{
		$data['title']	=	'Loginformulier';

		// Controleer of de post geset is
		//		wanneer deze geset is, zal het een waarde bevatten, daarvoor niet per se een TRUE
		//		wanneer deze niet geset is, zal het de waarde FALSE bevatten
		if ($this->input->post() !== FALSE)
		{
			$data['message']	=	$this->validateForm();
		}

		// Laad de loginpagina
		$this->load->view('templates/header', $data);
		$this->load->view('login/login_index', $data);
		$this->load->view('templates/footer', $data);
	}

	// Validate submission of form
	public function validateForm()
	{
		// Laad de helper voor form-validatie
		$this->load->library('form_validation');

		// Custom validation
		$this->form_validation->set_message('required', 'Het %s-veld is verplicht.');
		$this->form_validation->set_message('valid_email', 'Het %s-veld bevat geen geldig e-mailadres.');

		// Zet de regels voor de velden
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'paswoord', 'required');

		// Als het formulier klopt mag er een redirect uitgevoerd worden naar het dashboard.
		if ($this->form_validation->run() === TRUE)
		{
			$email 		=	$this->input->post('email');
			$password	=	$this->input->post('password');

			$validUser 	=	$this->validateUser($email, $password);

			// Controleer of de gebruiker met de juiste gegevens heeft ingelogd.
			if ( $validUser )
			{
				$this->load->helper('cookie');

				$hashedEmail	=	hash('SHA512', $this->userdata['email'] . $this->userdata['salt']);
				$cookieValue	=	$this->userdata['email'] . ',' . $hashedEmail;

				// Set cookie
				$cookie = array(
				    'name'   => 'login',
				    'value'  => $cookieValue,
				    'expire' => 3600
				);

				$this->input->set_cookie($cookie);

				$this->load->helper('url');
				redirect('/dashboard/', 'refresh');
			}
			else
			{
				
				$message['type']	=	'error';
				$message['body']	=	'Het paswoord/emailadres zijn niet correct. Probeer opnieuw.';
				
				return $message;
			}
			
		}

		return false;
	}

	// Check if user is valid
	//	Returnt user data als het valid is
	public function validateUser($inputEmail, $inputPassword)
	{
		$this->load->model('login_model');

		// Fetch data from database, based on e-mail
		// Haal data uit de database gebaseerd op het e-mailadres
		$this->userdata		=	$this->login_model->getUserData($inputEmail);
		$dbData				=	$this->userdata;

		$dbPassword	=	$dbData['password'];
		$dbSalt		=	$dbData['salt'];

		// Create hash based on input 
		// Maak de hash met het emailadres dat uit het formulier komt en de salt dat uit de database komt
		$hashedInputPassword	=	hash('SHA512', $inputPassword . $dbSalt);

		if ($hashedInputPassword === $dbPassword)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}