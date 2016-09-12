<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

		if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');

	}


	public function index()
	{
			

			$data = array(
					'subview'	=>	'ticket/dashboard',
			);

		

			// echo json_encode($this->account);
			$this->load->view('admin/layout', $data);
	}





}

/* End of file Ticket.php */
/* Location: ./application/controllers/Ticket.php */