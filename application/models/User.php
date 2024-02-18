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
        $sql = "INSERT INTO users (first_name, last_name, email, password, salt, created_at, updated_at) 
				VALUES (?, ?, ?, ?, ?, ?, ?)";
        $data = array(
                    $data['first_name'],
                    $data['last_name'],
                    $data['email'],
                    $data['password'],
                    $data['salt'],
                    $data['created_at'],
                    $data['updated_at'] );

        return $this->db->query($sql, $data);
    }

	function check_email_exists($email)
    {
        $sql = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
        $query = $this->db->query($sql, array($email)); 
        $row = $query->row_array();
        return $row['count'] > 0;   // Access 'count' as an array element
    }
}
