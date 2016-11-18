<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index( $offset = 0 )
	{

	}

	// Add a new item
	public function make()
	{
		$department = $this->input->get('department');
		$purpose = $this->input->get('purpose');

		$user = $this->user_m->get_by(array('username'=>'prakashchhetri'));

		




		$data = array(
				'subview'	=>	'call/make',
				'department'	=>	$department,
				'purpose'		=>	$purpose,
				'user'			=>	$user,
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

/* End of file Call.php */
/* Location: ./application/controllers/Call.php */
