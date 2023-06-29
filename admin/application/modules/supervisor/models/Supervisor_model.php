<?php 

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Supervisor_model extends CI_Model
{
	public function get_data()
	{
		$this->db->select('tbl_users.*,tbl_supervisor.*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_supervisor', 'tbl_supervisor.sup_code = tbl_users.user_code', 'left');
		$this->db->where('tbl_users.status!=', '2');
		$this->db->where('tbl_supervisor.status!=', '2');
		$this->db->where('tbl_users.user_type=', 3);
		$this->db->where('tbl_supervisor.user_type=', 3);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	/**
	 * Get all QC by supervisor id
	 * 
	 * @return array
	 */
	public function getMyQc($supservisor_id)
	{
		$sql = "SELECT 
			tbl_task_conversation.id AS conversation_id,
			tbl_task_conversation.is_qc_required,
			tbl_task.task_id, 
			tbl_task.task_name,
			tbl_users.full_name AS customer_name,
			tbl_task.task_status,
			0 AS tpc,
			tbl_task.created_on AS start_date,
			(
				SELECT u.full_name
				FROM tbl_users u
				INNER JOIN tbl_task_conversation c ON c.qc_checker_id = u.id
				INNER JOIN tbl_task AS t ON t.id = tbl_task_conversation.task_id
				WHERE c.id <= tbl_task_conversation.id AND t.id = tbl_task.id
				ORDER BY c.id DESC
				LIMIT 1
			) AS last_modified
		FROM tbl_task_conversation
		INNER JOIN tbl_task ON tbl_task.id = tbl_task_conversation.task_id
		INNER JOIN tbl_users ON tbl_users.id = tbl_task.customer_id
		WHERE tbl_task_conversation.qc_checker_id = ? AND tbl_task_conversation.is_qc_complete = ?";

		return $this->db->query($sql, [$supservisor_id, 0])->result();
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
		$query = $this->db->get('tbl_supervisor');
		$result = $query->row();

		return $result;
	}

	public function add_supervisor($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_supervisor', $data);
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

	public function sendNotificationEmails($data_user) 
	{
		$message = "";
		$message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
		$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'></td></tr></table>";

		$message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">Verify Your Account</h3>
			<tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
		  <tr><th style="text-align: left;">Full Name</th><td> ' . $data_user['full_name'] . '</td></tr>
		  <tr><th style="text-align: left;">User Name</th><td>' . $data_user['email'] . '</td></tr>
		  <tr><th style="text-align: left;">Mobile</th><td>' . $data_user['mobile'] . '</td></tr>
		  <tr><th style="text-align: left;">Password</th><td>' . $data_user['password'] . '</td></tr></table></div>';
		$message .= '<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: center;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px;">Please verify your email id to complete the account creation process</h5>
			<a href="' . base_url() . 'admin/supervisor/everify?hprk=' . $data_user['hash_key'] . '" style="background-color: rgb(41, 48, 136);border-radius: 5px;color: rgb(255, 255, 255);display: table;font-size: 20px;line-height: 20px;margin: 37px auto 30px;;padding: 10px 30px;text-align: center;text-decoration: none">Confirm account</a></td></tr></table></div>';

		$message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
				<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Grievance " . date("Y") . " . All Rights reserved</p></td></tr></table></div></div></body>";

		$subject = "Verify Your Account: Valogical";
		$headersad = "From: VALogical <noreply@rkshopkart.com>" . "\r\n";
		$headersad .= "MIME-Version: 1.0" . "\r\n";
		$headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headersad .= "X-Mailer: PHP/" . phpversion();

		$to1 = "info@crm.com";
		$to3 = "desuntechnology@gmal.com";
		$to2 = $data_user['email'];

		mail($to2, $subject, $message, $headersad);
		mail($to1, $subject, $message, $headersad);
		mail($to3, $subject, $message, $headersad);
	}

	public function edit_supervisor($data, $sup_code)
	{
		if (!empty($data)) {
			$this->db->where('sup_code', $sup_code);
			$this->db->update('tbl_supervisor', $data);
			//echo $this->db->last_query();
			return $this->db->affected_rows();
		}
	}

	public function edit_users($data, $sup_code)
	{
		if (!empty($data)) {
			$this->db->where('user_code', $sup_code);
			$this->db->update('tbl_users', $data);

			return $this->db->affected_rows();
		}
	}
	
	public function get_data_by_id($sup_code)
	{
		$this->db->select('tbl_users.*,tbl_supervisor.*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_supervisor', 'tbl_supervisor.sup_code = tbl_users.user_code', 'left');
		$this->db->where('tbl_supervisor.sup_code', $sup_code);
		$this->db->where('tbl_users.status!=', '2');
		$this->db->where('tbl_users.user_type=', 3);
		$this->db->where('tbl_supervisor.user_type=', 3);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	/**
	 * Delete supervisor
	 * 
	 * @param string $sup_code
	 */
	public  function delete_row_data($sup_code)
	{
		$this->db->update('tbl_supervisor', [
			'status' => '2'
		], ['sup_code' => $sup_code]);

		$this->db->update('tbl_users', [
			'status' => '2',
			'deleted_at' => date('Y-m-d H:i:s')
		], ['user_code' => $sup_code]);
	}

	public function check_url($url)
	{
		$this->db->select('*');
		$this->db->where('profile_url', $url);
		$query = $this->db->get('tbl_supervisor');
		$result = $query->result();

		return $result;
	}
	public function email_check($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');

		return ($query->num_rows() > 0) ? true : false;
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

	public function get_child_menu()
	{
		$this->db->select('*');
		$query = $this->db->get('tbl_menu_child');
		$result = $query->result();
		/*echo $this->db->last_query();
	 exit;*/
		return $result;
	}
	public function get_access_child_menu_details($sup_code)
	{
		$this->db->select('*');
		$this->db->where('user_id=', $sup_code);
		$query = $this->db->get('tbl_menu_access');
		$result = $query->result();
		/*echo $this->db->last_query();
	 exit;*/
		return $result;
	}
	public function menu_access_permission_update($data_menu_access, $sup_code)
	{
		if (!empty($data_menu_access) && !empty($sup_code)) {

			$this->db->select('*');
			$this->db->where('user_id=', $sup_code);
			$query = $this->db->get('tbl_menu_access');
			$result = $query->result();

			if (!empty($result)) {
				$this->db->where('user_id', $sup_code);
				$this->db->update('tbl_menu_access', $data_menu_access);
			} else {
				$this->db->insert('tbl_menu_access', $data_menu_access);
				return $this->db->insert_id();
			}
		}
	}

	public function add_menu_access($data_menu_access)
	{
		if (!empty($data_menu_access)) {
			$this->db->insert('tbl_menu_access', $data_menu_access);
			return $this->db->insert_id();
			echo $this->db->last_query();
			exit;
		}
	}
}
