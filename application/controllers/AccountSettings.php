<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountSettings extends CI_Controller {

	public function index()
	{
		
	}

	public function extend()
	{

		if(!empty($this->input->post())):
			

			// if called, these valus MUST be passed via post
			$daysToExtend			=		$this->input->post('days');
			$username				=		$this->input->post('username');
			$reason					=		$this->input->post('reason');

			// Display error if the submitted user in not found
			$user = $this->user_m->get_by(array('username'=>$username));
			if(!$user):
				die('Could not retrive data for the user. Please check the username again.');
			endif;


			/*
				CALCULATING DATA
			*/
				// Current RadCheck Expiration
				$currentExpirationDate	=		$this->radcheck_m->get_by(array('username'=>$username,'attribute'=>'Expiration'))->value;
				
				$datetimecurrentExpirationDate = new DateTime($currentExpirationDate);
				$datetimeToday = new DateTime(date('d M Y'));

				$interval = $datetimeToday->diff($datetimecurrentExpirationDate);
				$remainingActiveDays = $interval->format('%R%a');

				$remainingActiveDays = intval($remainingActiveDays);
				if ($remainingActiveDays < 0):
					$remainingActiveDays = 0;
				elseif($remainingActiveDays >=0 ):
					$remainingActiveDays =  str_replace("+","", $remainingActiveDays);
				endif;

				$newExpirationDate = date('d M Y', strtotime('+'.$remainingActiveDays.' days', strtotime(date('d M Y'))));
				$newExpirationDate 		= 		date('d M Y', strtotime('+'.$daysToExtend.' days', strtotime($newExpirationDate)));

				// Get total extended days for this user, and if found, add current extended days to it
				$account = $this->account_m->get_by(array('username'=>$username));
				$totalExtendedDays = $account->extended_days + $daysToExtend;

				// Extend Log Data
				$extendData = array(
							'extended_by'		=>		$this->session->userdata('user_id'),
							'username'			=>		$username,
							'days'				=>		$daysToExtend,
							'reason'			=>		$reason,
				);

			/*
				END CALCULATION
			*/

			/*
				STORING CHANGES INTO DATABASE 
			*/
				// store the account change details in account table
				$this->account_m->update($account->id, array('extended_days'=>$totalExtendedDays,'updated_at'=>date("Y-m-d H:i:s")));			

				// update the new expiration date in radcheck so that account remains active
				$radcheck = $this->radcheck_m->get_by(array('username'=>$username,'attribute'=>'Expiration'));
				$this->radcheck_m->update($radcheck->id, array('value'=>$newExpirationDate));

				// log each extend request
				$this->extendlog_m->insert($extendData);

			/*
				END STORING CHANGES INTO DATABASE
			*/

			
			// Dynamic Redirect
			redirect(base_url() .'account/'.$username.'/settings?status=success','refresh');

		else:
			redirect(base_url() .'account/'.$username.'/settings?status=success','refresh');
		endif;

	}


	public function change_ip(){

		$username = $this->input->post('username');
		$ip = $this->input->post('ip');
		$mac = $this->input->post('mac');

		
		$device = $this->device_m->get_by(array('username'=>$username));

		if($device):

	    	if($this->device_m->update($device->id, array('ip'=> $ip))):
				redirect(base_url() .'account/'.$username.'/settings?status=success','refresh');
			else:
				redirect(base_url() .'account/'.$username.'/settings?status=failed','refresh');
			endif;
		else:
			if($this->device_m->insert(array('ip'=> $ip,'username'=>$username,'mac'=>$mac))):
				redirect(base_url() .'account/'.$username.'/settings?status=success','refresh');
			else:
				redirect(base_url() .'account/'.$username.'/settings?status=failed','refresh');
			endif;
		endif;
	}


	public function test()
	{

		echo "sgs";
	}
}

/* End of file AccountSettings.php */
/* Location: ./application/controllers/AccountSettings.php */