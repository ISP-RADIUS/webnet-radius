<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	






	public function index()
	{
		$expiring_accounts =  $this->accounts->expiring_in(1);
		$data = array(
				'subview'	=>	'dashboard/index',
				'expiring_accounts'	=>	$expiring_accounts,
				'sidebar'	=>	FALSE,
		);

	

		$this->load->view('admin/layout', $data);
	}

	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */