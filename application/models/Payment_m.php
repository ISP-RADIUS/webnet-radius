<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_m extends MY_Model {

	protected $soft_delete = TRUE;

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($payment)
    {
        $payment['created_at'] = $payment['updated_at'] = date('Y-m-d H:i:s');
        return $payment;
    }

}

/* End of file Payment_m.php */
/* Location: ./application/models/Payment_m.php */