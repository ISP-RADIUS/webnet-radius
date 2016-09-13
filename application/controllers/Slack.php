<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slack extends CI_Controller {

	public function index()
	{
		
	}

	public function accounts()
	{
		$accounts = $this->account_m->get_all();

		echo json_encode($accounts);
	}

}

/* End of file Slack.php */
/* Location: ./application/controllers/Slack.php */