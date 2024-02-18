<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->library('form_validation');
	}
	function index()
	{
		$this->load->view('login');
	}

	function register()
	{
		/* Check if POST data is empty */
		if (empty($_POST)) {
			$this->load->view('register');
			return; // Stop further execution
		}

		/* Set validation rules */
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() === FALSE) 
        {
           	// Validation failed, reload the signup form with validation errors
			$data['error'] = 'Validation failed. Please check your input.';
			$this->load->view('register', $data);
			return; // Stop further execution
        }
		else
        {
			date_default_timezone_set('Asia/Manila');

			/* Encrypt the password using md5 */
			$password = ($this->input->post('password'));
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($password . '' . $salt);

			/* Check if email or contact number already exists */
			$email_exists = $this->User->check_email_exists($this->input->post('email'));

			if ($email_exists)
			{
				/* If email or contact number already exists, display error message */
				$data['error'] = "Email already exists.";
				$this->load->view('register', $data);
				return; 
			} 
			else 
			{
				/* If email is unique, proceed to user registration */
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'password' => $encrypted_password,
					'salt'=> $salt,
					'created_at' => date('Y-m-d h:i:a'),
					'updated_at' => date('Y-m-d h:i:a') );
			}
			$this->User->create_user($data);

			/* Pass success message to the view */
			$data['success'] = "Registration successful! You can now login.";
			$this->load->view('register', $data);
		}
	}	
}
