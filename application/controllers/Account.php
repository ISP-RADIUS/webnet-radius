<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

		if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');

		$username =  $this->uri->segment(2);
		$account = $this->account_m->get_by(array('username'=>$username));
		if($account && isset($username)):
			$this->account 							= 	$this->account_m->get_by(array('username'=>$username));
			$this->account->status					=	$this->accounts->status($username);
			$this->account->speed					=	$this->accounts->speed($username);
			$this->account->client_ip 				= 	$this->accounts->get_client_ip($username);
			$this->account->public_ip 				= 	$this->accounts->get_public_ip($username);
			$this->account->mac_address 			= 	$this->accounts->get_mac_address($username);
			
			$this->account->user 					= 	$this->user_m->get_by(array('username'=>$username));

			$this->account->active_until			=	$this->radcheck_m->get_by(array('Attribute'=>'Expiration','username'=>$username))->value;

			$this->account->session = (object)[];
			$this->account->session->current		=	$this->accounts->has_active_session($username);
			if(!$this->account->session->current):
				$this->account->session->last		=	$this->accounts->last_active_session($username);
			endif;

			$device = $this->device_m->get_by(array('username'=>$account->username));
			if(!$device):
				$this->account->device = NULL;
			else:
				$this->account->device = $device;
			endif;
		
		else:
			$this->account = "";
		endif;

	}


	



	// List all your items
	public function index( $username = NULL )
	{

		if($username):
			$account = $this->account_m->get_by(array('username'=>$username));
			
			if($account):
				$account->user = $this->user_m->get_by(array('username'=>$username));
				$account->status = $this->accounts->status($username);

				$data = array(
						'subview'	=>	'account/dashboard',
						'account'	=>	$this->account,
				);

				$this->load->view('admin/layout', $data);

			endif;
		else:
			/*
				List all users
			*/
			$query = $this->db->order_by('username', 'DESC');
			$accounts = $this->account_m->get_all();
			foreach ($accounts as $account):
				$account->user = $this->user_m->get_by(array('username'=>$account->username));
				$account->status	=	$this->accounts->status($account->username);
			endforeach;

			$data = array(
					'subview'	=>	'account/all',
					'sidebar'	=>	FALSE,
					'accounts'	=>	$accounts,
			);

			$this->load->view('admin/layout', $data);

		endif;
	}

	public function user_details()
	{
		$data = array(
					'subview'	=>	'account/user_details',
					'account'	=>	$this->account,
					'user'		=>	$this->account->user,
			);

		$this->load->view('admin/layout', $data);
	}

	public function sessions($username = NULL)
	{
		$from = date('Y-m-1');
		$till = date('Y-m-t');
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
				'subview'	=>	'account/sessions',
				'account'	=>	$this->account,
				'sessions'	=>	$sessions,
				'totalDownload'	=>	$this->formatSizeUnits($totalDownload),
				'totalUpload'	=>	$this->formatSizeUnits($totalUpload)
		);
		$this->load->view('admin/layout', $data);
	}

	public function payments($username = NULL)
	{

		$payments = $this->payment_m->get_many_by(array('username'=>$username));
		$total_rows = $payments = $this->payment_m->get_many_by(array('username'=>$username));
		$total_rows = count($total_rows);
		$per_page = 10;
		$offset = $this->uri->segment(4);
		$this->db->order_by('created_at','DESC');
		$this->db->limit($per_page);
		$this->db->offset($offset);
		$payments = $this->payment_m->get_many_by(array('username'=>$username));
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'account/'.$username.'/payments';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['last_link'] = ' First';
		$config['last_link'] = ' Last';
		$config['next_link'] = ' > ';
		$config['prev_link'] = ' < ';
		$this->pagination->initialize($config);
		$page_nav = $this->pagination->create_links();
		foreach ($payments as $payment):
			$payment->sender = $this->admin_m->get($payment->created_by);
		endforeach;
		$data = array(
					'subview'	=>	'account/payments',
					'account'	=>	$this->account,
					'payments'	=>	$payments,
					'page_nav'	=>	$page_nav,
			);

		

		$this->load->view('admin/layout', $data);
	}
	

	public function notifications($username=NULL)
	{
		$notifications = $this->notification_m->get_many_by(array('username'=>$username));

		$total_rows = $notifications = $this->notification_m->get_many_by(array('username'=>$username));
		$total_rows = count($total_rows);
		
		$per_page = 10;
		$offset = $this->uri->segment(4);


		$this->db->order_by('created_at','DESC');
		$this->db->limit($per_page);
		$this->db->offset($offset);
		$notifications = $this->notification_m->get_many_by(array('username'=>$username));

		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'account/'.$username.'/notifications';
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['full_tag_open'] = '<div class="pagination">';
		$config['full_tag_close'] = '</div>';
		$config['last_link'] = ' First';
		$config['last_link'] = ' Last';
		$config['next_link'] = ' > ';
		$config['prev_link'] = ' < ';
		$this->pagination->initialize($config);
		$page_nav = $this->pagination->create_links();

		foreach ($notifications as $notification):
			$notification->sender = $this->admin_m->get($notification->created_by);
		endforeach;
		$data = array(
					'subview'			=>	'account/notifications',
					'account'			=>	$this->account,
					'notifications'		=>	$notifications,
					'page_nav'			=>	$page_nav,		
			);

		$this->load->view('admin/layout', $data);
	}

	

	public function settings($username=NULL)
	{

		$data = array(
					'subview'	=>	'account/settings',
					'account'	=>	$this->account,
			);
		$this->load->view('admin/layout', $data);

	}

	public function json($username = NULL)
	{
		echo "<pre>";
		var_dump($this->account);
	}


	

	function formatSizeUnits($bytes)
    {
	        if ($bytes >= 1073741824):
	            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
	        elseif ($bytes >= 1048576):
	            $bytes = number_format($bytes / 1048576, 2) . ' MB';
	        elseif ($bytes >= 1024):
	            $bytes = number_format($bytes / 1024, 2) . ' kB';
	        elseif ($bytes > 1):
	            $bytes = $bytes . ' bytes';
	        elseif ($bytes == 1):
	            $bytes = $bytes . ' byte';
	        else:
	        	$bytes = '0 bytes';
	        endif;

	        return $bytes;
	}

	public function search(){
		// get the search query
		$q = $this->input->get('q');

		// search usernames, names, phone no, address etc
		$users = $this->user_m->search($q);

		if(count($users)==1):
			//  if only one result is found, redirect to the user matching the search query
			redirect(base_url().'account/'.$users[0]->username );
		endif;

		// if more than one user are found, show the list of users
		
		foreach ($users as $user):
			$accounts[] = $this->account_m->get_by(array('username'=>$user->username));
		endforeach;


		if(!empty($accounts)):
			$accounts = (object) $accounts;
			foreach ($accounts as $account) {
				$account->status = $this->accounts->status($account->username);
				$account->user = $this->user_m->get_by(array('username'=>$account->username));
				// var_dump($account); # code...
			}
		else:

			$accounts = $this->account_m->get_all();
			foreach ($accounts as $account):
				$account->user = $this->user_m->get_by(array('username'=>$account->username));
				$account->status	=	$this->accounts->status($account->username);
			endforeach;

		endif;


		
		$data = array(
			'subview'=> 'account/all',
			'accounts'=>$accounts
			);

		$this->load->view('admin/layout', $data);

	}


	public function ping()
	{
		$t = $this->load->library('ping', array('host'=>'103.1.92.82'));
		// $host = 'www.example.com';
	
		$this->ping->setHost('www.google.com');
		$latency = $this->ping->ping();
		if ($latency !== false) {
		  print 'Latency is ' . $latency . ' ms';
		}
		else {
		  print 'Host could not be reached.';
		}


	}



}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */
