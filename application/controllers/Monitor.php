<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitor extends CI_Controller {

	public function index()
	{
		
				$accounts = $this->account_m->get_all();



				

				$servers = array();
				foreach ($accounts as $account) {

					$device = $this->device_m->get_by(array('username'=>$account->username));
					if(!$device):
						$ip = '0.0.0.0';
					else:
						$ip = $device->ip;
					endif;


					
					$servers[$ip] = array(
					        'ip' => $ip,
					        'port' => 80,
					        'info' => 'Hosted by The Cloud',
					        'purpose' => 'Web Search'
					    );
					   
				}		

				$data = array(
						'accounts'	=>	$servers,
				);



				$this->load->view('admin/monitor/index', $data);

	}

	public function device_ip()
	{
		

		$host = $this->input->get('host');
		// $host = "dshgadfhasdhas.com";
		$response = $this->ping($host, 80, 10);  

		echo json_encode($response);


	}



	public function ping($host, $port, $timeout) { 
	  $tB = microtime(true); 
	  $fP = @fSockOpen($host, $port, $errno, $errstr, $timeout); 
	  if (!$fP) { 
	  	 $response = array(
	  			'status' => false,
	  	);
	  	return $response;
	  } 
	  $tA = microtime(true); 
	  $response = array(
	  			'status' => true,
	  			'ttl'	=>	 round((($tA - $tB) * 1000), 0)." ms"
	  	);
	  return $response;
	}

	


	

}

/* End of file Monitor.php */
/* Location: ./application/controllers/Monitor.php */