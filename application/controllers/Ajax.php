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
					//$plan_price = $this->pricing_m->get_by();
				break;
			
			default:
				# code...
				break;
		}
	}

}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */