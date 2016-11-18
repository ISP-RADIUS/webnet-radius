<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Accounts {

	protected $ci;

	public function __construct()
	{
		//Load Dependencies
		$this->ci =& get_instance();
        
		$this->ci->load->model('radacct_m');
		$this->ci->load->model('account_m');
		$this->ci->load->model('radreply_m');
		$this->ci->load->model('user_m');
		
	}

	public function get($logic = NULL)
	{
		if($logic==NULL):
			$accounts = $this->ci->account_m->get_all();
			return $accounts;
		else:
			switch ($logic) {
				case 'accounts created this month':
					$this->ci->db->where('created_at BETWEEN "'. date('Y-m-01 00:00:00') .'" and "'. date('Y-m-t 23:59:59').'"');
					$accounts = $this->ci->account_m->get_all();
					return $accounts;
						
					break;

				case 'online accounts':
					$accounts = $this->ci->radacct_m->get_many_by(array('AcctStopTime'=>NULL));
					return $accounts;
						
					break;

				case 'expired accounts':
					$this->ci->db->where("STR_TO_DATE(expiration_date, '%d %M %Y') <= NOW()");
					$accounts = $this->ci->account_m->get_all();
					return $accounts;
						
					break;
				
				default:
					# code...
					break;
			}



		endif;
	}

	


	public function status($username = NULL)
	{
		if($username):
			if($this->is_expired($username)):
				if($this->has_active_session($username)):
					return "extended";
				else:
					return "expired";
				endif;
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
			return $this->ci->radacct_m->get_by(array('username'=>$username,'AcctStopTime'=>NULL));
		endif;
	}

	public function is_online($username = NULL)
	{
		if($username):
			if($this->get_active_session($username)):
				return TRUE;
			else:
				return FALSE;
			endif;
		endif;
	}

	public function get_active_session($username = NULL)
	{
		if($username):
			return $this->ci->radacct_m->get_by(array('username'=>$username,'AcctStopTime'=>NULL));
		endif;
	}

	public function is_expired($username = NULL)
	{
		if($username):
			$account = $this->ci->account_m->get_by(array('username'=>$username));
			if(isset($account)):
				if (time() > strtotime($account->expiration_date)):
					return TRUE;
				else:
					return FALSE;
				endif;
			endif;
		endif;
	}

	public function expiring_in($days = NULL)
	{
		if(!$days) $days = 1;
		$this->ci->db->where("DATEDIFF(STR_TO_DATE(Value, '%d %M %Y'), NOW()) >= 0 AND DATEDIFF(STR_TO_DATE(Value, '%d %M %Y'), NOW()) <= '$days'");
		$accounts = $this->ci->radcheck_m->get_many_by(array('Attribute'=>'Expiration'));
		foreach ($accounts as $account) :
			$account->user = $this->ci->user_m->get_by(array('username'=>$account->username));
			$account->extended_days = $this->ci->account_m->get_by(array('username'=>$account->username))->extended_days;
		endforeach;

		return $accounts;
	
		
	}

	public function is_active($username = NULL)
	{
		if($username):
			$account = $this->ci->account_m->get_by(array('username'=>$username));
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
			$speed =  $this->ci->radreply_m->get_by(array('attribute'=>'Mikrotik-Rate-Limit', 'username'=>$username));
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
			$this->ci->db->order_by("AcctStopTime", "desc");
			$this->ci->db->limit('1');
			return $this->ci->radacct_m->get_by(array('username'=>$username));
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