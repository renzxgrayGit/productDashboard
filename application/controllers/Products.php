<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
 	function index()
	{
		
	}

	function user_dashboard()
	{
		$this->load->view('user_product_dashboard');
	}
}