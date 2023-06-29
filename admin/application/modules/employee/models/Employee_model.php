<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Employee_model extends CI_Model
{
	public function get_data()
	{
		$this->db->select('tbl_employee.*,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name');
		$this->db->from('tbl_employee');
		$this->db->join('tbl_supervisor', 'tbl_employee.supervisor_name = tbl_supervisor.sup_code', 'left');
		$this->db->where('tbl_employee.status!=', '2');
		$this->db->where('tbl_employee.user_type=', 1);
		$this->db->order_by("tbl_employee.created_on", "desc");

		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	 /**
	 * Save module persmission respect to the iser
	 * 
	 * @param string $user_code
	 * @param array $actions
	 */
	public function saveModulePermissions($user_code, $actions)
	{
		// find user id based on user code
		$sql = "SELECT id AS user_id 
			FROM tbl_users 
			WHERE user_code = ?";
		
		$result = $this->db->query($sql, [$user_code])->row();

		$user_id = $result->user_id;

		// delete existing permission first
		$sql = $this->db->delete('tbl_user_module_permission', [
			'user_id' => $user_id
		]);

		foreach($actions as $action_id) {

			$sql = "INSERT INTO tbl_user_module_permission(user_id, module_id, action_id)
			SELECT ? AS user_id, module_id, id AS action_id 
			FROM tbl_module_action
			WHERE id = ?";

			$this->db->query($sql, [$user_id, $action_id]);
		}
	}
	
	public function getLastid()
	{
		$this->db->select('max(id) as lastid');
		$query = $this->db->get('tbl_employee');
		$result = $query->row();
		/*echo $this->db->last_query();
	    exit;*/
		return $result;
	}

	/**
	 * Get current emp code
	 * 
	 * @return string
	 */
	public function getCurrentEmpCode()
	{
		$lastid = $this->getLastid();
		return 'EMP' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
	}

	public function add_employee($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_employee', $data);
			//echo $this->db->last_query();
			//  exit;
			return $this->db->insert_id();
		}
	}

	public function add_user($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_users', $data);
			return $this->db->insert_id();
		}
	}

	public function get_supervisor()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_supervisor');
		$result = $query->result();

		return $result;
	}

	public function edit_employee($data, $emp_code)
	{
		if (!empty($data)) {
			$this->db->where('emp_code', $emp_code);
			$this->db->update('tbl_employee', $data);
			return $this->db->affected_rows();
		}
	}

	public function edit_users($data, $emp_code)
	{
		if (!empty($data)) {
			$this->db->where('user_code', $emp_code);
			$this->db->update('tbl_users', $data);
			return $this->db->affected_rows();
		}
	}

	public function get_data_by_id($emp_code)
	{
		$this->db->select('tbl_users.*,tbl_employee.*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_employee', 'tbl_employee.emp_code = tbl_users.user_code', 'left');
		$this->db->where('tbl_employee.emp_code', $emp_code);
		$this->db->where('tbl_users.status!=', '2');
		$this->db->where('tbl_users.user_type=', 1);
		$this->db->where('tbl_employee.user_type=', 1);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function delete_row_data($emp_code)
	{
		$this->db->update('tbl_employee', [
			'status' => '2'
		], ['emp_code' => $emp_code]);

		$this->db->update('tbl_users', [
			'status' => '2',
			'deleted_at' => date('Y-m-d H:i:s')
		], ['user_code' => $emp_code]);
	}

	public function check_url($url)
	{
		$this->db->select('*');
		$this->db->where('profile_url', $url);
		$query = $this->db->get('tbl_employee');
		$result = $query->result();
		/* echo $this->db->last_query();
     exit;*/
		return $result;
	}
	public function email_check($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		if ($query->num_rows() > 0) {
			//die("greter");
			return false;
		} else {
			// die("smaller");
			return true;
		}
	}
	public function check_user($hprk)
	{
		$this->db->where('ecode', $hprk);
		$this->db->where('is_email_verified', '0');
		$query = $this->db->get('tbl_users');
		if ($query->num_rows() > 0) {
			//die("greter");
			$result = $query->row();
			return $result;
		} else {
			// die("smaller");
			return false;
		}
	}

	public function update_status($id, $hprk)
	{
		$data['is_email_verified'] = '1';
		$this->db->where('id', $id);
		$this->db->where('ecode', $hprk);
		$this->db->update('tbl_users', $data);
	}
}
