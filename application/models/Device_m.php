<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device_m extends MY_Model {

	public $before_create = array( 'timestamps' );

    protected function timestamps($device)
    {
        $device['created_at'] = $device['updated_at'] = date('Y-m-d H:i:s');
        return $device;
    }

}

/* End of file Device_m.php */
/* Location: ./application/models/Device_m.php */