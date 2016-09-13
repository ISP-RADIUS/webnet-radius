<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slack extends CI_Controller {

	public function index()
	{
		
	}

	public function accounts()
	{
		$accounts = $this->account_m->get_all();

		$text = "";
		foreach ($accounts as $account):
			$text .= $account->username . "\n";
		endforeach;

		

		echo json_encode($text);
	}

	public function account()
	{
		$username = $this->input->post('text');


		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			if($account):
				$account->active_until = $this->radcheck_m->get_by(array('attribute'=>'Expiration','username'=>$account->username))->value;

				$text = array(
						'text' => 'Active Unil: ' . $account->active_until,
					);

			else:
				$text = array(
						'text' => 'Invalid User',
					);
			endif;
		else:
			$text = array(
					'text' => 'You need to select a user',
				);
			
		endif;
		return json_encode($text);
	}

}

/* End of file Slack.php */
/* Location: ./application/controllers/Slack.php */