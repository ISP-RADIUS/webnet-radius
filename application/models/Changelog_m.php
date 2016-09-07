<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changelog_m extends MY_Model {

	public $_table = 'change_log';

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($account)
    {
        $account['created_at'] = $account['updated_at'] = date('Y-m-d H:i:s');
        return $account;
    }
}

/* End of file Changelog_m.php */
/* Location: ./application/models/Changelog_m.php */