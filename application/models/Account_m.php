<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_m extends MY_Model {

	protected $soft_delete = TRUE;

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($account)
    {
        $account['created_at'] = $account['updated_at'] = date('Y-m-d H:i:s');
        return $account;
    }

    public function expiring()
    {
    	$this->db->where("DATEDIFF(STR_TO_DATE(Value, '%d %M %Y'), NOW()) = 1");
    	return $this->radcheck_m->get_many_by(array('Attribute'=>'Expiration'));
    }


    

 

}

/* End of file Account_m.php */
/* Location: ./application/models/Account_m.php */