<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_m extends MY_Model {

	protected $soft_delete = TRUE;

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($transaction)
    {
        $transaction['created_at'] = $transaction['updated_at'] = date('Y-m-d H:i:s');
        return $transaction;
    }

    public function get_last()
    {

		return $this->db->select('*')->order_by('id',"desc")->limit(1)->get('transactions')->row();

    }


    

}

/* End of file Transaction_m.php */
/* Location: .//private/var/folders/4q/zwy7rwxs2pbgrxp3x8k7vc6h0000gn/T/fz3temp-2/Transaction_m.php */