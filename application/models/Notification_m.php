<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification_m extends MY_Model {

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($notification)
    {
        $notification['created_at'] = $notification['updated_at'] = date('Y-m-d H:i:s');
        return $notification;
    }

}

/* End of file Notification_m.php */
/* Location: ./application/models/Notification_m.php */

