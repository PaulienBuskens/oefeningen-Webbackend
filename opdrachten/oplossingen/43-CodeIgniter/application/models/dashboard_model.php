<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function getUserData($email)
	{

		$query = $this->db->get_where('users', array('email' => $email));

		return $query->row_array();
	}

}
