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
		$data = array(
				'subview'=>'billing/form',
				'user'	=>	$this->user,
			);	
		$this->load->view('admin/layout', $data);
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
