<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Timewallet_model extends CI_Model
{
	function get_data($cust_code)
	{
		 $this->db->select('*');
		 $this->db->where('cus_id', $cust_code);
		 $query = $this->db->get('tbl_time_wallet');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
	}
  
  
}
