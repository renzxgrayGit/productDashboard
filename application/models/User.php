<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model 
{
	function index()
	{
		$this->load->view('login');
	}

	function create_user($data)
    {
        $sql = "INSERT INTO users (first_name, last_name, email, user_level, password, salt, created_at, updated_at) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $data = array(
                    $data['first_name'],
                    $data['last_name'],
                    $data['email'],
                    $data['user_level'],
                    $data['password'],
                    $data['salt'],
                    $data['created_at'],
                    $data['updated_at'] );

        $this->db->query($sql, $data);
    }

    function update_user_level($user_id, $user_level)
    {
        /* Execute SQL query to update user level */
        $sql = "UPDATE users SET user_level = 9 WHERE id = ?";
        $this->db->query($sql, array($user_id));
    }

	function check_email_exists($email)
    {
        $sql = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email)); 
        $row = $query->row_array();
        return $row['count'] > 0;   // Access 'count' as an array element
    }

    function login_user($email, $password) 
    {
        /* Run a SQL query to fetch user data based on email */
        $sql = "SELECT * FROM users WHERE email = ?";
        $query = $this->db->query($sql, $email);
        $user = $query->row();

        if ($user) // If user exist in database
        {
            /* Extract stored password and salt */
            $stored_password = $user->password;
            $salt = $user->salt;

            /* Hash the provided password with the same salt */
            $hashed_password = md5($password . $salt);

            /* Compare hashed passwords */
            if ($hashed_password === $stored_password) 
            {
                /* Passwords match, return user data */
                return $user;
            }
        }
        /* If user doesn't exist or passwords don't match, return false */
        return false;
    }

    function get_user_level($user_level)
    {
        $sql = "SELECT * FROM users WHERE user_level = ?";
        return $this->db->query($sql, $user_level)->row_array();
    }

    function get_user_id($user_id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        return $this->db->query($sql, $user_id)->row_array();
    }

    function update_information_model($id, $data)
    {
        $sql = "UPDATE users SET email = ?, first_name = ?, last_name = ?, updated_at = ? WHERE id = ?";
        return $this->db->query($sql, array($data['email'], $data['first_name'], $data['last_name'], $data['updated_at'], $id));    
    }

    function update_password_model($id, $data)
    {
        $sql = "UPDATE users SET password = ?, salt= ?, updated_at = ? WHERE id = ?";
        return $this->db->query($sql, array($data['password'], $data['salt'], $data['updated_at'], $id));    
    }
}
