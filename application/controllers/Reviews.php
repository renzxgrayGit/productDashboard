<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller 
{
    function __construct() 
	{
		parent::__construct();
		$this->load->model('Review');
		$this->load->library('form_validation');
	}

    function show($id)
    {
        $action = $this->input->post('action'); // hidden input field named 'action'
		if ($action === 'create_review')	
		{
			$this->create_review($id);	// Handle create_review()
		}
        elseif ($action === 'create_reply')
        {
            $this->create_reply($id);	// Handle create_reply()
        }
    }

	private function create_review($id)
	{
        $this->form_validation->set_rules('review', 'Review', 'required');

        if ($this->form_validation->run() == FALSE) 
		{
			/* Validation failed, reload the edit form with validation errors */
            redirect('products/show/' . $id);
		} 
		else 
		{
            date_default_timezone_set('Asia/Manila');
            $data =  array(
                    'review' => $this->input->post('review'),
                    'product_id' => $id,
                    'created_at' => date('Y-m-d h:i:s A'),
                    'updated_at' => date('Y-m-d h:i:s A')	);

            $user_id = $this->session->userdata('user_id');
            $this->Review->create_review($data, $user_id);
            redirect('products/show/' . $id);
        }
	}

    private function create_reply($id)
	{
        $this->form_validation->set_rules('reply', 'Reply', 'required');

        if ($this->form_validation->run() == FALSE) 
		{
			/* Validation failed, reload the edit form with validation errors */
            redirect('products/show/' . $id);
		} 
		else 
		{
            date_default_timezone_set('Asia/Manila');
            $data =  array(
                    'reply' => $this->input->post('reply'),
                    'product_id' => $id,
                    'review_id' =>  $this->input->post('review_id'),
                    'created_at' => date('Y-m-d h:i:s A'),
                    'updated_at' => date('Y-m-d h:i:s A')	);

            $user_id = $this->session->userdata('user_id');
            $this->Review->create_reply($data, $user_id);
            redirect('products/show/' . $id);
        }
	}
}