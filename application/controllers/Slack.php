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

		// $username = "test";

		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			if($account):
				$account->active_until = $this->radcheck_m->get_by(array('attribute'=>'Expiration','username'=>$account->username))->value;

				$text = array(
						"text" => "Details for *". $account->username . "*",
						"attachments" => [
										array(
											"fields"=>[
												array(
													"title" => "Username",
													"value" => $account->username,
	                    							"short" => TRUE
												),
												array(
													"title" => "Expiration",
													"value" => $account->expiration_date,
	                    							"short" => TRUE
												),
												array(
													"title" => "Active Until",
													"value" => $account->active_until,
	                    							"short" => TRUE
												),
												array(
													"title" => "Extended",
													"value" => $account->extended_days . " days",
	                    							"short" => TRUE
												),


												],
										),

										
											
							],
					);

			else:
				$text = array(
						"text" => 'Invalid User',
					);
			endif;
		else:
			$text = array(
					"text" => 'You need to select a user',
				);
			
		endif;

		// $text = [ "item" =>  ["id", "123456", "name", "adam"]  ];

		$this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($text));
		// return json_encode($text);
	}

}

/* End of file Slack.php */
/* Location: ./application/controllers/Slack.php */