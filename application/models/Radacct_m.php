<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Radacct_m extends MY_Model {

	public $_table = 'radacct';


	public function custom()
	{
		$sql = "SELECT MIN(RadAcctId) AS RadAcctId, DATE(AcctStartTime) AS 'date', SUM(AcctInputOctets) AS download, SUM(AcctOutputOctets) AS upload FROM radacct GROUP BY DATE(AcctStartTime)";

		$query = $this->db->query($sql);

		return $query->result_array();

	}

}

/* End of file Radacct_m.php */
/* Location: ./application/models/Radacct_m.php */