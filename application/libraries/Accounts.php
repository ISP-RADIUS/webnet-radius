<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Accounts {



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