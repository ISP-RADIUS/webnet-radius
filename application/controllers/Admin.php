<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	




	public function access( $id = NULL )
	{

	

		$admins = $this->admin_m->get_all();

		$data = array(
				'subview'=> 'admin/access'
				);

		$this->load->view('admin/layout', $data);
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
