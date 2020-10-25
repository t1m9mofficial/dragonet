<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function login()
	{
		$email				=	$this->input->post('email');
		$password			=	$this->input->post('password');
		$query				=	$this->db->get_where('admin' , array('email' => $email , 'password' => $password));

		// MATCHES WITH THE USER TABLE
		if ($query->num_rows() > 0) 
		{
			$this->session->set_userdata('login_type' , 'admin');

			redirect(base_url() , 'refresh');
		}
		else 
			redirect(base_url() , 'refresh');
	}

	function logout()
	{
		$this->session->unset_userdata('login_type');
		
		redirect(base_url() , 'refresh');
	}
}
?>