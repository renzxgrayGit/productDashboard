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

	private function set_validation_rules()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');
	}

	function index()
	{
		$this->load->view('login');
	}

	function register()
	{
		if (empty($_POST)) // Check if POST data is empty 
		{
			$this->load->view('register');
			return; // Stop further execution
		}

		$this->set_validation_rules();

		if ($this->form_validation->run() === FALSE) 
        {
           	/* Validation failed, reload the signup form with validation errors */
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
					'user_level' => $this->input->post('user_level'),
					'password' => $encrypted_password,
					'salt'=> $salt,
					'created_at' => date('Y-m-d h:i:a'),
					'updated_at' => date('Y-m-d h:i:a') );
			}
			$this->User->create_user($data);

			/* Pass success message to the view */
			$data['success'] = "Registration successful! You can now login.";
			$this->load->view('register', $data);

			/* Update user level if this is the first user (ID = 1) */
			$user_id = $this->db->insert_id(); // Get the ID of the inserted user
			if($user_id === 1)
			{
				/* Set user level to 9 for the first user */
				$this->User->update_user_level($user_id, 9);
			}
		}
	}

	function login()
	{
		if (empty($_POST)) // Check if POST data is empty
		{
			$this->load->view('login');
			return; // Stop further execution
		}

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');

		if ($this->form_validation->run() === FALSE) 
        {
           	/* Validation failed, reload the signup form with validation errors */
			$data['error'] = "Invalid credentials. Please try again.";
			$this->load->view('login', $data);
			return; // Stop further execution
        }
		else
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			/* Check if the user exists with the provided credentials */
			$user = $this->User->login_user($email, $password);

			if ($user) 
			{
				if($user->user_level == 9)
				{
					/* If login is successful, load the user dashboard */
					/* $this->load->view('admin_product_dashboard'); */
					redirect('dashboard/admin');
				}
				else
				{
					// $data['user'] = $user;
					redirect('dashboard');
				}
			}
			else
			{
				/* Validation failed, reload the signup form with validation errors */
				$data['error'] = "Invalid credentials. Please try again.";
				$this->load->view('login', $data);
				return; // Stop further execution
			}
		}
	}
}
