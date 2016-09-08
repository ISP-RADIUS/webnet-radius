<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	






	public function index()
	{
		$data = array(
				'subview'	=>	'dashboard/index',
				'sidebar'	=>	FALSE,
		);

	

		$this->load->view('admin/layout', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */