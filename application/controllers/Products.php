<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Product');
		$this->load->library('form_validation');
	}

	private function set_validation_rules()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required|regex_match[/^[0-9]+(\.[0-9]{1,2})?$/]');
		$this->form_validation->set_rules('inventory_count', 'Inventory Count', 'trim|required');
	}

	private function prepare_data_array()
    {
		date_default_timezone_set('Asia/Manila');
        return array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'price' => $this->input->post('price'),
            'inventory_count' => $this->input->post('inventory_count'),
            'created_at' => date('Y-m-d h:i:s A'),
            'updated_at' => date('Y-m-d h:i:s A')	);
    }

 	function index()
	{
		$data['products'] = $this->Product->get_products();
		$this->load->view('admin_product_dashboard', $data);
	}

	function user()
	{
		$this->load->view('user_product_dashboard');
	}

	function new()
	{
		$this->load->view('add_new');
	}

	function create()
	{
		$this->set_validation_rules();

		if ($this->form_validation->run() === FALSE) 
		{
			/* Validation failed, reload the create form with validation errors */
			$data['invalid'] = "Invalid adding the product";
			$this->load->view('add_new', $data);
			return;
		} 
		else 
		{
			/* Validation succeeded, proceed with creating the contact */
			$data = $this->prepare_data_array();
			$this->Product->create_product($data);

			/* Successfully added product */
			$data['success'] = "Successfully added product";
			$this->load->view('add_new', $data);
			return; // Stop further execution
		}
 	}

	function edit($id)
	{
		$data['product'] = $this->Product->get_product_by_id($id);
		$this->load->view('edit_product', $data);
	}

	function update($id)
	{
		$this->set_validation_rules();

		if ($this->form_validation->run() == FALSE) 
		{
			// Validation failed, reload the edit form with validation errors
			$data['product'] = $this->Product->get_product_by_id($id);
			$data['invalid'] = "Invalid saving the product";
			$this->load->view('edit_product', $data);
			return;
		} 
		else 
		{
			/* Validation succeeded, proceed with creating the contact */
			$data = $this->prepare_data_array();
			$this->Product->update_product($id, $data);

			/* Successfully added product */
			$data['product'] = $this->Product->get_product_by_id($id);
			$data['success'] = "Successfully saved new product";
			$this->load->view('edit_product', $data);
			return; // Stop further execution
		}
	}

	function delete($id)
	{
		$this->Product->delete_product($id);
		$data['products'] = $this->Product->get_products();
		$data['success'] = "Successfully deleted";
		$this->load->view('admin_product_dashboard', $data);
		return;
	}
}