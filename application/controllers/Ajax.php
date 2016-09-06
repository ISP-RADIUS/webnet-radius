<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function index()
	{
		
	}

	public function change_password()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		// $username ='prakashchhetri';
		// $password = 'dsgas';

		// Validation to be done later
		$radcheck = $this->radcheck_m->get_by(array('username'=>$username));

    	if($this->radcheck_m->update($radcheck->id, array('value'=> crypt(time(), $password)))):
		echo date('M d, Y \a\t h:m a');
		else:
			echo FALSE;
		endif;


	}

	public function change_mac()
	{
		$username = $this->input->post('username');
		$mac = $this->input->post('mac');
		// $username ='prakashchhetri';
		// $password = 'dsgas';

		// Validation to be done later
		$radcheck = $this->radcheck_m->get_by(array('username'=>$username));

    	if($this->radcheck_m->update($radcheck->id, array('usemac'=> $mac))):
		echo date('M d, Y \a\t h:m a');
		else:
			echo FALSE;
		endif;


	}

	public function calculate_price()
	{

		

		$sale_of = $this->input->post('sale_of');
		$username = $this->input->post('username');
		switch ($sale_of) {
			case 'internet':
				if($username):
					


				endif;
				break;
			
			default:
				# code...
				break;
		}
	}

	public function accounts()
	{
		$status = $this->input->post('status');
		// $status = 'extended';
		switch ($status) {
			case 'online':
				$accounts = $this->radacct_m->get_many_by(array('AcctStopTime'=>NULL));
				
				break;

			case 'expired':
				$this->db->where("STR_TO_DATE(Value, '%d %M %Y') <= NOW()");
				$accounts = $this->radcheck_m->get_many_by(array('Attribute'=>'Expiration' ));
				
				break;

			case 'extended':
				$accounts = $this->account_m->get_many_by(array('extended_days > '=>0 ));
				
				
				break;
			
			default:
						$accounts = $this->account_m->get_all();

				break;
		}
		foreach ($accounts as $account):
		endforeach;

		$data = array(
				'accounts'	=>	$accounts,
				'status'	=>	$status,
			);
		$this->load->view('admin/account/ajax', $data);
	}






}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */