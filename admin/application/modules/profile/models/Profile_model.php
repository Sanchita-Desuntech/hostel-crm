<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Profile_model extends CI_Model
{
	/**
	 * Get user profile data
	 * 
	 * @param string $user_code
	 * @return object
	 */
	public function getUserProfile($user_code)
	{
		$sql = "SELECT * FROM tbl_users WHERE user_code = ?";
		return $this->db->query($sql, [$user_code])->row_array();
	}


	public function get_data()
	{
		$this->db->select('*');
		$this->db->where('user_type=', 4);
		$query = $this->db->get('tbl_users');
		$result = $query->row();

		return $result;
	}

	public function edit_user($data, $user_code)
	{
		if (!empty($data)) {
			$this->db->where('user_code', $user_code);
			$this->db->update('tbl_users', $data);
		}
	}
}
