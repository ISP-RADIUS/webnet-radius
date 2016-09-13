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
				switch ($this->accounts->status($account->username)) {
					case 'online':
						$color = "#84ce84";
						break;

					case 'expired':
						$color = "#d97572";
						break;

					case 'extended':
						$color = "#e8b976";
						break;

					case 'offline':
						$color = "#d6d6d6";
						break;
					
					default:
						# code...
						break;
				}

				$text = array(
						"text" => "Details for *". $account->username . "*",
						"attachments" => [
										array(
											"color"=> $color,
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

												array(
													"title" => "Status",
													"value" => $this->accounts->status($account->username),
	                    							"short" => TRUE
												),
												


												],
										),

										
											
							],
					);

			else:
				$text = array(
						"text" => 'No user with that username. Try again.',
					);
			endif;
		else:
			$text = array(
					"text" => 'You need to select a user. type " /account username ." eg: /account test',
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