<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	






	public function index()
	{

		$this->load->library('excel');
		$sql = $this->account_m->get_all();
		$this->excel->to_excel($sql, 'test'); 

		die();

		$expiring_accounts =  $this->accounts->expiring_in(1);
		$accounts = array(
					'this_month' =>	$this->accounts->get('accounts created this month'),
					'online' =>	$this->accounts->get('online accounts'),
					'expired' =>	$this->accounts->get('expired accounts'),
			);
		$data = array(
				'subview'	=>	'dashboard/index',
				'expiring_accounts'	=>	$expiring_accounts,
				'sidebar'	=>	FALSE,
				'accounts'	=>	$accounts,
		);



		

		$this->load->view('admin/layout', $data);
	}

	

	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */