<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies
		$username =  $this->uri->segment(2);
		if(isset($username)):
			$this->user = $this->user_m->get_by(array('username'=>$username));
		else:
			$this->user = "";
		endif;

	}

	// List all your items
	public function index( $offset = 0 )
	{

		$data = array(
				'subview'=>'billing/form'
			);	
		$this->load->view('admin/layout', $data);
	}

	// Add a new item
	public function add_sale()
	{

		if(!empty($this->input->post())):
			// validation to be done later

		// var_dump($_POST);
		// die();
			$username = $this->input->post('username');

			$account = $this->account_m->get_by(array('username'=>$this->input->post('username')));

			if(!$account):
				die('Couldnt Process because the user was not found');
			endif;

			$credit = $this->input->post('amount_received');
			$remaining_balance = $this->input->post('remaining_balance');

			$lastTransaction = $this->transaction_m->get_last();
			$transactionBalance = $lastTransaction->balance + $credit;

			$transactionDescription = array(
									'username' 		=> 		$this->input->post('username'),
									// 'channel'		=>		$this->input->post('channel'),
									'description'	=>		$this->input->post('description'),
									'payment_for'	=>		$this->input->post('payment_for'),
				);

			$transactionData = array(
							'created_by'		=>	$this->session->userdata('user_id'),
							'credit'			=>	$this->input->post('amount_received'),
							'debit'				=>	0,
							'balance'			=>	$transactionBalance,
							// 'channel' 			=>	$this->input->post('channel'),
							'description'		=>	serialize($transactionDescription),

				);

			
			

			// calculate the total account balance
			$accountBalance = $account->balance  + $remaining_balance;

			

			// update the account balance
			$this->account_m->update($account->id, array('balance'=>$accountBalance));

			
			// insert data into transaction
			$this->transaction_m->insert($transactionData);


			$paymentData = array(
							'created_by'		=>	$this->session->userdata('user_id'),
							'username'			=>	$this->input->post('username'),
							'payment_for'		=>	$this->input->post('payment_for'),
							'total_amount'		=>	$this->input->post('total_amount'),
							'amount_received'	=>	$this->input->post('amount_received'),
							'remaining_balance'	=>	$this->input->post('remaining_balance'),
							'description'		=>	$this->input->post('description'),

				);

			if($payment_id = $this->payment_m->insert($paymentData)):

				// save the transaction

				// display all customers
				redirect(base_url().'billing'.$username.'/add_sale?status=success');
			else:
				// if database insertion failed, display error
				redirect(base_url().'database_error');
			endif;

			

		else:
			$data = array(
					'user'		=>	$this->user,
					'subview'	=>	'billing/form',
				);

			$this->load->view('admin/layout', $data);
		endif;
	


		// $data = array(
		// 		'subview'=>'billing/form',
		// 		'user'	=>	$this->user,
		// 	);	
		// $this->load->view('admin/layout', $data);
	}

	//Update one item
	public function update( $id = NULL )
	{

	}

	//Delete one item
	public function delete( $id = NULL )
	{

	}

	
}

/* End of file Billing.php */
/* Location: ./application/controllers/Billing.php */
