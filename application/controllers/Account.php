<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$username =  $this->uri->segment(2);
		if(isset($username)):
			$this->account 							= 	$this->account_m->get_by(array('username'=>$username));
			$this->account->status					=	$this->status($username);
			$this->account->speed					=	$this->speed($username);
			$this->account->client_ip 				= 	$this->get_client_ip($username);
			$this->account->public_ip 				= 	$this->get_public_ip($username);
			$this->account->mac_address 					= 	$this->get_mac_address($username);
			
			$this->account->user 					= 	$this->user_m->get_by(array('username'=>$username));

			
			


			$this->account->session = (object)[];
			$this->account->session->current		=	$this->has_active_session($username);
			if(!$this->account->session->current):
				$this->account->session->last		=	$this->last_active_session($username);
			endif;
			



			// echo json_encode($this->account);

			// die();

			
		else:
			$this->account = "";
		endif;
	


	}

	public function json($username = NULL)
	{
		echo json_encode($this->account);
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


			$data = array(
					'subview'	=>	'account/dashboard',
					'account'	=>	$this->account,
			);

		

			// echo json_encode($this->account);
			$this->load->view('admin/layout', $data);

		else:
			/*
				List all users
			*/
			$accounts = $this->account_m->get_all();
			foreach ($accounts as $account):
				$account->status	=	$this->status($account->username);
			endforeach;

			


			$data = array(
					'subview'	=>	'account/all',
					'sidebar'	=>	FALSE,
					'accounts'	=>	$accounts,
			);

		

			$this->load->view('admin/layout', $data);

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
					'account'	=>	$this->account,
			);

		

		$this->load->view('admin/layout', $data);

	}

	public function status($username = NULL)
	{
		if($username):
			if($this->is_expired($username)):
				return "expired";
			
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

	public function speed($username = NULL)
	{
		if($username):
			$speed =  $this->radreply_m->get_by(array('attribute'=>'Mikrotik-Rate-Limit', 'username'=>$username));
			switch ($speed->value) {
				case '284k/284k':
					return "256 kbps";
					break;

				case '512k/512k':
					return "512 kbps";
					break;

				case '1M/1M':
					return "1 mbps";
					break;
				
				default:
					return FALSE;
					break;
			}
		endif;
		
	}

	public function last_active_session($username = NULL)
	{
		if($username):
			// All sessions for this month
			$this->db->order_by("AcctStopTime", "desc");
			$this->db->limit('1');
			return $this->radacct_m->get_by(array('username'=>$username));
		endif;
		
	}

	public function get_client_ip($username = NULL)
	{
		if($this->has_active_session($username)):
			$active_session = $this->has_active_session($username);
			return $active_session->FramedIPAddress;
		elseif($this->last_active_session($username)): 
			$last_session = $this->last_active_session($username);
			return $last_session->FramedIPAddress;
		endif;

		
	}

	public function get_public_ip($username = NULL)
	{
		if($this->has_active_session($username)):
			$active_session = $this->has_active_session($username);
			return $active_session->NASIPAddress;
		elseif($this->last_active_session($username)): 
			$last_session = $this->last_active_session($username);
			return $last_session->NASIPAddress;
		endif;

		
	}

	public function get_mac_address($username = NULL)
	{
		if($this->has_active_session($username)):
			$active_session = $this->has_active_session($username);
			return $active_session->CallingStationId;
		elseif($this->last_active_session($username)): 
			$last_session = $this->last_active_session($username);
			return $last_session->CallingStationId;
		endif;

		
	}



}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
