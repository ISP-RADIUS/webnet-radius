<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies


	}

	// List all your items
	public function index( $username = NULL )
	{
		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			if(isset($account)):
				$account->user = $this->user_m->get_by(array('username'=>$username));
			endif;
			$account->status = $this->status($username);


			echo json_encode($account);

		else:
			/*
				List all users
			*/

		endif;
	}

	// Add a new item
	public function add()
	{

	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

	public function settings($username=NULL)
	{


		$data = array(
					'subview'	=>	'account/settings',
			);

		$this->load->view('admin/layout', $data);

	}

	public function status($username = NULL)
	{
		if($username):
			if($this->is_expired($username)):
				return "expired";
			elseif ($this->is_active($username)):
				return "active";
			elseif($this->has_active_session($username)):
				return "online";
			else:
				return "offline";
			endif;

		endif;
	}

	public function has_active_session($username = NULL)
	{
		if($username):
			return $this->radacct_m->get_by(array('username'=>$username,'AcctStopTime'=>NULL));
		endif;
	}

	public function is_expired($username = NULL)
	{
		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			if(isset($account)):
				if (time() > strtotime($account->expiration_date)):
					return TRUE;
				else:
					return FALSE;
				endif;
			endif;

			
		endif;
	}

	public function is_active($username = NULL)
	{
		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			if(isset($account)):
				if (time() <= strtotime($account->expiration_date)):
					return TRUE;
				else:
					return FALSE;
				endif;
			endif;

			
		endif;
	
	}
}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
