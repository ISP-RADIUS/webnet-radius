<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model {
	public $before_create = array( 'timestamps' );

    protected function timestamps($user)
    {
        $user['created_at'] = $user['updated_at'] = date('Y-m-d H:i:s');
        return $user;
    }

    public function search($user) {
	    if(empty($user))
	       return array();

	    $result = $this->db->like('username', $user)
	             ->or_like('primary_phone', $user)
	             ->or_like('secondary_phone', $user)
	             ->or_like('tertiary_phone', $user)
	             ->or_like('first_name', $user)
	             ->or_like('last_name', $user)
	             ->get('users');

	    return $result->result();
	}


	



	public function get_first()
    {

		return $this->db->select('*')->order_by('id',"ASC")->limit(1)->get('users')->row();

    }

	

}

/* End of file User_m.php */
/* Location: ./application/models/User_m.php */