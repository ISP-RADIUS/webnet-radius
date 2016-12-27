<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extendlog_m extends MY_Model {

	public $_table = 'extend_log';
	protected $soft_delete = TRUE;

	// timestamp
	public $before_create = array( 'timestamps' );

    protected function timestamps($extend_log)
    {
        $extend_log['created_at'] = $extend_log['updated_at'] = date('Y-m-d H:i:s');
        return $extend_log;
    }

}

/* End of file Extendlog_m.php */
/* Location: ./application/models/Extendlog_m.php */