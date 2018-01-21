<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout_controller extends CI_Controller {
	public function index(){
		$this->load->helper('cookie');
		
		delete_cookie('login');

		$this->load->helper('url');
		redirect('/login/', 'refresh');
	}
}