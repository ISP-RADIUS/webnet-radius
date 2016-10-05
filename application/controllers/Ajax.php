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
		$radcheck = $this->radcheck_m->get_by(array('username'=>$username,'attribute'=>'Crypt-Password'));

    	if($this->radcheck_m->update($radcheck->id, array('value'=> crypt(time(), $password)))):
			echo date('M d, Y \a\t h:m a');
			//$this->change_log('password',$username, $radcheck->value, $password);
		else:
			echo FALSE;
		endif;


	}

	public function change_mac()
	{
		$username = $this->input->post('username');
		$mac = $this->input->post('mac');
		// $username ='prakashchhetri';
		// $mac = 'dsgas';

		// Validation to be done later
		$radcheck = $this->radcheck_m->get_by(array('username'=>$username,'attribute'=>'Calling-Station-Id'));

    	if($this->radcheck_m->update($radcheck->id, array('usemac'=> $mac))):
			echo date('M d, Y \a\t h:m a');
			//$this->change_log('mac',$username,$mac);
		else:
			echo FALSE;
		endif;


	}

	public function change_speed()
	{
		$username = $this->input->post('username');
		$speed = $this->input->post('speed');
		// $username ='prakashchhetri';
		// $speed = '284k/284k';

		// Validation to be done later
		$radreply = $this->radreply_m->get_by(array('username'=>$username,'attribute'=>'Mikrotik-Rate-Limit'));

    	if($this->radreply_m->update($radreply->id, array('value'=> $speed))):
			echo date('M d, Y \a\t h:m a');
			$this->change_log('speed',$username, $radreply->value, $speed);
		else:
			echo FALSE;
		endif;


	}

	public function change_log($attribute, $username, $old_value, $new_value)
	{
		$data = array(
				'changed_by'	=>	$this->session->userdata('user_id'),
				'username'		=>	$username,
				'attribute'		=>	$attribute,
				'old_value'		=>	$old_value,
				'new_value'		=>	$new_value
			);
		$this->changelog_m->insert($data);
	}

	public function change_ip()
	{
		$username = $this->input->post('username');
		$ip = $this->input->post('ip');
		$mac = $this->input->post('mac');

		
		$device = $this->device_m->get_by(array('username'=>$username));

		if($device):

	    	if($this->device_m->update($device->id, array('ip'=> $ip))):
				echo TRUE;
			else:
				echo FALSE;
			endif;
		else:
			if($this->device_m->insert(array('ip'=> $ip,'username'=>$username,'mac'=>$mac))):
				echo TRUE;
			else:
				echo FALSE;
			endif;
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
		// $status = 'offline';
		switch ($status) {
			case 'all':
				$accounts = $this->account_m->get_all();
				
				break;
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


	public function sessions($username = NULL)
	{
		
		$from = $this->input->post('start');
		$till = $this->input->post('end');
		$username = $this->input->post('username');

		$from = date("Y-m-d 00:00:00", strtotime($from));
		$till = date("Y-m-d 23:59:59", strtotime($till));

		if(empty($from) && empty($till)){
			$from = date('Y-m-1 00:00:00');
			$till = date('Y-m-t 23:59:59');
		}


		

		
		$query = $this->db->query("SELECT MIN(RadAcctId) AS RadAcctId, DATE(AcctStartTime) AS 'date', username as 'username',  SUM(AcctInputOctets) AS upload, SUM(AcctOutputOctets) AS download FROM radacct WHERE username = '$username' AND AcctStartTime BETWEEN '$from' AND '$till'   GROUP BY DATE(AcctStartTime)");
		$sessions = $query->result_object();

		$totalDownload = 0;
        $totalUpload = 0;
		foreach ($sessions as $session) {
			$totalDownload = $totalDownload + $session->download;
			$totalUpload = $totalUpload + $session->upload;
			$session->download = $this->formatSizeUnits($session->download);
			$session->upload = $this->formatSizeUnits($session->upload);
		}

		$data = array(
				'sessions'	=>	$sessions,
				'totalDownload'	=>	$this->formatSizeUnits($totalDownload),
				'totalUpload'	=>	$this->formatSizeUnits($totalUpload)
			);
		$this->load->view('admin/account/ajax_sessions', $data);
	}

	function formatSizeUnits($bytes)
    {
	        if ($bytes >= 1073741824)
	        {
	            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
	        }
	        elseif ($bytes >= 1048576)
	        {
	            $bytes = number_format($bytes / 1048576, 2) . ' MB';
	        }
	        elseif ($bytes >= 1024)
	        {
	            $bytes = number_format($bytes / 1024, 2) . ' kB';
	        }
	        elseif ($bytes > 1)
	        {
	            $bytes = $bytes . ' bytes';
	        }
	        elseif ($bytes == 1)
	        {
	            $bytes = $bytes . ' byte';
	        }
	        else
	        {
	            $bytes = '0 bytes';
	        }

	        return $bytes;
	}

	public function expiring_in()
	{
		$days = $this->input->post('days');
		$expiring_accounts = $this->accounts->expiring_in($days);
		$data = array(
				'expiring_accounts'	=>	$expiring_accounts,
			);
		$this->load->view('admin/dashboard/ajax_expiring_in', $data);
	}






}

/* End of file Ajax.php */
/* Location: ./application/controllers/Ajax.php */