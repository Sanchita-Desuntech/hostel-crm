<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Weblogin_model extends CI_Model
{

	/**
	 * Get data by customer
	 * 
	 * @param int $customer_id
	 * @return array[object]
	 */
	public function get_data($customer_id)
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$this->db->where('customer_id', $customer_id);
		$query = $this->db->get('tbl_weblogin');
		
		return $query->result();
	}

	function add_weblogin($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_weblogin', $data);
			/*echo $this->db->last_query();
		     exit;*/
			return $this->db->insert_id();
		}
	}

	function get_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_weblogin');
		$result = $query->result();
		return $result;
	}


	function edit_weblogin($data, $id)
	{
		if (!empty($data)) {
			$this->db->where('id', $id);
			$this->db->update('tbl_weblogin', $data);
			/*echo $this->db->last_query();
	    	 exit;*/
			return $this->db->affected_rows();
		}
	}
}
