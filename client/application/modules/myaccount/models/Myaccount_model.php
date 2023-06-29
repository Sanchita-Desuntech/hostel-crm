<?php if (!defined('BASEPATH')) {

	exit('No direct script access allowed');
}

class Myaccount_model extends CI_Model
{

	function check_password($password, $user_code)
	{

		$this->db->select('*');

		$this->db->where('user_code', $user_code);

		$this->db->where('password', $password);

		$query = $this->db->get('tbl_users');

		if ($query->num_rows() > 0) {

			$result = $query->row();
			//echo $this->db->last_query();exit;

			return $result;
		}
	}

	public function update_user($data_user, $user_code)
	{
		$this->db->where('user_code', $user_code);
		$this->db->update('tbl_users', $data_user);

		$this->db->update('tbl_customer', [
			'is_first_pass_changed' => 1
		], ['cust_code' => $user_code]);

		$_SESSION['is_first_pass_changed'] = 1;
	}
}
