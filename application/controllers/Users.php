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
		$this->session->sess_destroy();
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
			/* Encrypt the password using md5 */
			$password = ($this->input->post('password'));
			$salt = bin2hex(openssl_random_pseudo_bytes(22));
			$encrypted_password = md5($password . '' . $salt);

			/* Check if email already exists */
			$email_exists = $this->User->check_email_exists($this->input->post('email'));

			if ($email_exists)
			{
				/* If email already exists, display error message */
				$data['error'] = "Email already exists.";
				$this->load->view('register', $data);
				return; 
			} 
			else 
			{
				/* If email is unique, proceed to user registration */
				date_default_timezone_set('Asia/Manila');
				$data = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'user_level' => $this->input->post('user_level'),
					'password' => $encrypted_password,
					'salt'=> $salt,
					'created_at' => date('Y-m-d h:i:s A'),
					'updated_at' => date('Y-m-d h:i:s A') );
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
				/* Store user ID and user level in session */
				$this->session->set_userdata('user_id', $user->id);
				$this->session->set_userdata('user_level', $user->user_level);

				if($user->user_level == 9)
				{
					/* If login is successful, load the user dashboard */
					/* $this->load->view('admin_product_dashboard'); */
					redirect('dashboard/admin');
				}
				else
				{
					/* Redirect to the user dashboard and pass the user ID as a parameter */
					redirect('dashboard/user');
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

	function edit()
	{
		/* Check if user level is 9 (admin) */
		if ($this->session->userdata('user_level') == 9) 
		{
			/* $user_level = 9; */
			$user_level = $this->session->userdata('user_level');
			$data['admin'] = $this->User->get_user_level($user_level);
			$this->load->view('admin_profile', $data);
		}
		// Check if user level is 1 (user)
		elseif ($this->session->userdata('user_level') == 1) 
		{
			$user_id = $this->session->userdata('user_id');
			// Fetch user data using user ID
			$data['user'] = $this->User->get_user_id($user_id);
			$this->load->view('user_profile', $data);
		}
		// Handle other user levels or unauthorized access
		else 
		{
			// Redirect or show an error message
		}
	}

	function update($id)
	{
		$action = $this->input->post('action'); // hidden input field named 'action'

		if ($action === 'information')	
		{
			$this->update_information($id);	// Handle information change 
		}
		elseif ($action === 'password')	
		{
			$this->update_password($id); // Handle password change
		}
	}
	
	private function update_information($id)
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == FALSE) 
		{
			// Validation failed, reload the edit form with validation errors
			$data['admin'] = $this->User->get_user_id($id);
			$data['invalid'] = "Invalid saving the information";
			$this->load->view('admin_profile', $data);
			return;
		} 
		else 
		{
			/* Validation succeeded, proceed with creating the new users */
			date_default_timezone_set('Asia/Manila');
			$data =  array(
					'email' => $this->input->post('email'),
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'updated_at' => date('Y-m-d h:i:s A')	);
			
			$this->User->update_information_model($id, $data);

			/* Successfully saved new info users */
			$data['admin'] = $this->User->get_user_id($id);
			$data['success'] = "Successfully saved new information";
			$this->load->view('admin_profile', $data);
			return; // Stop further execution
		}
	}

	private function update_password($id)
    {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

		if ($this->form_validation->run() == FALSE) {
			/* Validation failed, reload the form with validation errors */
			$data['admin'] = $this->User->get_user_id($id);
			$data['invalid_password'] = "Invalid password or password not mached";
			$this->load->view('admin_profile', $data);
			return;
		} 
		else 
		{
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');

			/* Check if the old password matches the user's current password */
			$user = $this->User->get_user_id($id);
			$stored_password = $user['password'];
			$salt = $user['salt'];
			$hashed_old_password = md5($old_password . $salt);

			if ($hashed_old_password !== $stored_password) 
			{
				/* Old password does not match, display error */
				$data['admin'] = $this->User->get_user_id($id);
				$data['invalid_password'] = "Incorrect old password";
				$this->load->view('admin_profile', $data);
				return;
			}

			/* Update the password */
			$new_salt = bin2hex(openssl_random_pseudo_bytes(22));
			$hashed_new_password = md5($new_password . $new_salt);

			date_default_timezone_set('Asia/Manila');
			$data = array(
				'password' => $hashed_new_password,
				'salt' => $new_salt,
				'updated_at' => date('Y-m-d h:i:s A')
			);

			$this->User->update_password_model($id, $data);

			/* Password changed successfully */
			$data['admin'] = $this->User->get_user_id($id);
			$data['success_password'] = "Password changed successfully";
			$this->load->view('admin_profile', $data);
			return;
		}
    }
}
