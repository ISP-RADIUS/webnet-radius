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
						"text" => 'Active Unil: ' . $account->active_until,
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

		$text = '{
				    "text": "Details about ramkpl",
				    "attachments": [
				      
				        {
				            "fields": [
				                {
				                    "title": "Username",
				                    "value": "ramkpl",
				                    "short": true
				                },
				                {
				                    "title": "Expiration",
				                    "value": "12 Aug 2015",
				                    "short": true
				                },
								 {
				                    "title": "Active Until",
				                    "value": "16 Aug 2015",
				                    "short": true
				                },
								 {
				                    "title": "Extended",
				                    "value": "3 Days",
				                    "short": true
				                }
				            ]
				      
				        
				        }
				    ]
				}';
		echo json_encode($text);
	}

}

/* End of file Slack.php */
/* Location: ./application/controllers/Slack.php */