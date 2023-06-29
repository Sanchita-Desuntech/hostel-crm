<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Package_model extends CI_Model
{
	/**
	 * Get plans 
	 * 
	 * @return array
	 */
	public function get_data()
	{
		$sql = "SELECT * FROM tbl_package WHERE deleted_at IS NULL";
		return $this->db->query($sql)->result();
	}

	function getLastid()
	{
		$this->db->select('max(id) as lastid');
		$query = $this->db->get('tbl_package');
		$result = $query->row();

		return $result;
	}


	function add_data($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_package', $data);

			return $this->db->insert_id();
		}
	}

	function edit_data($data, $package_code)
	{
		if (!empty($data)) {
			$this->db->where('package_code', $package_code);
			$this->db->update('tbl_package', $data);
			
			return $this->db->affected_rows();
		}
	}

	function get_data_by_id($package_code)
	{
		$this->db->select('*');
		$this->db->where('package_code', $package_code);
		$query = $this->db->get('tbl_package');
		$result = $query->result();
	
		return $result;
	}

	public function delete_row_data($package_code)
	{
		$data['deleted_at'] = date('Y-m-d H:i:s');
		$this->db->where('package_code', $package_code);
		$this->db->update('tbl_package', $data);
	}
}
