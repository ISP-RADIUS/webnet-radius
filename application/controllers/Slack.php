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
				echo json_encode($account);
			else:
				echo '{ "text: : "Invalid User" }';
			endif;
		else:
			echo '{ "text: : "You need to select a user" }';
		endif;
	}

}

/* End of file Slack.php */
/* Location: ./application/controllers/Slack.php */