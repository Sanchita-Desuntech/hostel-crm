<?php 

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Task_model extends CI_Model
{
	public function get_data()
	{
		$this->db->select('tbl_task.*,tbl_customer.cust_code,tbl_customer.full_name as cus_name,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name,tbl_service.service_id,tbl_service.service_name as ser_name');
		$this->db->from('tbl_task');
		$this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		$this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		$this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
		$this->db->where('tbl_task.status!=', '2');
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	/**
	 * Get last message
	 * 
	 * @param string $task_id
	 * @param int $emp_id
	 * @return array
	 */
	public function getLastMessage($task_id, $emp_id)
	{
		$sql = "SELECT tbl_task_conversation.* 
		FROM tbl_task_conversation
		INNER JOIN tbl_task ON tbl_task.id = tbl_task_conversation.task_id
		WHERE tbl_task.task_id = ? AND sender_id = ?
		ORDER BY sent_on DESC 
		LIMIT 1";

		return $this->db->query($sql, [$task_id, $emp_id])->row_array();
	}

	/**
	 * Get all system users except customers
	 * 
	 * @return array
	 */
	public function getAllSystemUsers()
	{
		$sql = "SELECT tbl_users.id AS user_id, tbl_users.full_name 
		FROM tbl_users
		JOIN tbl_user_type ON tbl_user_type.id = tbl_users.user_type
		WHERE tbl_user_type.type_name <> 'Customer'";

		return $this->db->query($sql)->result();
	}

	/**
	 * Get all task details
	 * 
	 * @param string $task_id
	 * @return object
	 */
	public function getTaskDetails($task_id)
	{
		$sql = "SELECT * FROM tbl_task WHERE task_id = ?";		
		$task = $this->db->query($sql, [$task_id])->row_array();

		if( !is_null($task) ) {
			// find customer details
			$sql = "SELECT * FROM tbl_customer
			WHERE cust_code = ?";

			$result = $this->db->query($sql, [$task['customer_code']])->row_array();

			$task['customer_details'] = $result;
		}

		return $task;
	}

	/**
	 * Get tasks list
	 * 
	 * @param string $search_query
	 * @param int $limit
	 * @param int $offset
	 * @param int $user_type
	 * 
	 * @return array
	 */
	public function getTasks($search_query, $limit, $offset, $user_type)
	{
		$data = [];

		$search_sql = " WHERE 1 AND tbl_task.status <> '2' ";

		// check if user type set or not
		if(!is_null($user_type) && !empty($user_type)) {
			$current_user_id = $_SESSION['user_id'];
			if($user_type == USER_SUPERVISOR) {
				$search_sql .= ' AND tbl_task.supervisor_id = ' . $current_user_id;
			}
		}

		$sql = "SELECT IFNULL(COUNT(tbl_task.id), 0 ) AS total
		FROM
			`tbl_task`
		LEFT JOIN `tbl_customer` ON `tbl_task`.`customer_code` = `tbl_customer`.`cust_code`
		LEFT JOIN `tbl_supervisor` ON `tbl_task`.`sup_name` = `tbl_supervisor`.`sup_code`
		LEFT JOIN `tbl_service` ON `tbl_task`.`service_code` = `tbl_service`.`service_id`";

		if(!is_null($user_type) && !empty($user_type)) {
			$current_user_id = $_SESSION['user_id'];
			if($user_type == USER_EMPLOYEES) {
				$sql .= " INNER JOIN tbl_task_employee ON tbl_task_employee.task_id = tbl_task.id ";
				$sql .= " INNER JOIN tbl_employee ON tbl_employee.id = tbl_task_employee.employee_id";
				$search_sql .= ' AND tbl_employee.user_id = ' . $current_user_id;
			}
		}
		
		$sql = $sql . $search_sql;
	
		$result = $this->db->query($sql)->row();
		$data['recordsTotal'] = $result->total;

		if( !empty($search_query) ) {
			parse_str($search_query, $params);

			$search_arr = [];
			if(isset($params['taskId']) && !empty($params['taskId'])) {
				$search_arr[] = "tbl_task.task_id LIKE '%". $params['taskId'] ."%'";
			}

			if(isset($params['taskName']) && !empty($params['taskName'])) {
				$search_arr[] = "tbl_task.task_name LIKE '%". $params['taskName'] ."%'";
			}

			if(
				isset($params['taskFrom']) && !empty($params['taskFrom'])
				&&
				isset($params['taksTo']) && !empty($params['taksTo'])
				) {
				$search_arr[] = "tbl_task.created_on BETWEEN '".$params['taskFrom']."' AND '". $params['taksTo'] ."'";
			}

			if(isset($params['taskStatus']) && !empty($params['taskStatus'])) {
				$search_arr[] = "tbl_task.task_status = '".$params['taskStatus']."'";
			}

			if(isset($params['taskPriority']) && !empty($params['taskPriority'])) {
				$search_arr[] = "tbl_task.task_priority = '".$params['taskPriority']."'";
			}

			if( !empty($search_arr) ) {
				$search_extended_sql = implode(' OR ', $search_arr);
				$search_sql .= " AND ( $search_extended_sql )";
			}
		}

		// find filtered records
		$sql = "SELECT IFNULL(COUNT(tbl_task.id), 0 ) AS total
		FROM
			`tbl_task`
		LEFT JOIN `tbl_customer` ON `tbl_task`.`customer_code` = `tbl_customer`.`cust_code`
		LEFT JOIN `tbl_supervisor` ON `tbl_task`.`sup_name` = `tbl_supervisor`.`sup_code`
		LEFT JOIN `tbl_service` ON `tbl_task`.`service_code` = `tbl_service`.`service_id`";

		if(!is_null($user_type) && !empty($user_type)) {
			$current_user_id = $_SESSION['user_id'];
			if($user_type == USER_EMPLOYEES) {
				$sql .= " INNER JOIN tbl_task_employee ON tbl_task_employee.task_id = tbl_task.id ";
				$sql .= " INNER JOIN tbl_employee ON tbl_employee.id = tbl_task_employee.employee_id";
			}
		}

		$sql = $sql . $search_sql;
				
		$result = $this->db->query($sql)->row();
		$data['recordsFiltered'] = $result->total;

		$sql = "SELECT
			`tbl_task`.*,
			`tbl_customer`.`cust_code`,
			`tbl_customer`.`full_name` AS `cus_name`,
			`tbl_supervisor`.`sup_code`,
			`tbl_supervisor`.`full_name` AS `sup_name`,
			`tbl_service`.`service_id`,
			`tbl_service`.`service_name` AS `ser_name`
		FROM
			`tbl_task`
		LEFT JOIN `tbl_customer` ON `tbl_task`.`customer_code` = `tbl_customer`.`cust_code`
		LEFT JOIN `tbl_supervisor` ON `tbl_task`.`sup_name` = `tbl_supervisor`.`sup_code`
		LEFT JOIN `tbl_service` ON `tbl_task`.`service_code` = `tbl_service`.`service_id`";

		if(!is_null($user_type) && !empty($user_type)) {
			$current_user_id = $_SESSION['user_id'];
			if($user_type == USER_EMPLOYEES) {
				$sql .= " INNER JOIN tbl_task_employee ON tbl_task_employee.task_id = tbl_task.id ";
				$sql .= " INNER JOIN tbl_employee ON tbl_employee.id = tbl_task_employee.employee_id";
			}
		}

		$sql = $sql . $search_sql . ' LIMIT '. $limit . ' OFFSET ' . $offset;

		$tasks = $this->db->query($sql)->result();

		foreach($tasks as $task) {
			if($task->task_status == 'Open') {
				$task->task_status = '<span class="label label-success">Open</span>';
			} else if($task->task_status == 'Follow Up') {
				$task->task_status = '<span class="label label-info">Follow Up</span>';
			} else if($task->task_status == 'Response Needed') {
				$task->task_status = '<span class="label label-default">Response Needed</span>';
			} else if($task->task_status == 'In Progress') {
				$task->task_status = '<span class="label label-warning">In Progress</span>';
			} else if($task->task_status == 'Pipeline') {
				$task->task_status = '<span class="label label-danger">Pipeline</span>';
			} else {
				$task->task_status = '<span class="label label-success">Recurring</span>';
			}

			if($task->task_priority == 'Normal') {
				$task->task_priority = '<span class="label label-info">Normal</span>';
			} else {
				$task->task_priority = '<span class="label label-warning">Urgent</span>';
			}

			$action = '';
			$url = base_url('admin/task/details/'. $task->task_id);
			$action .= '<a href="'.$url.'" class="btn btn-success"><i class="fa fa-eye"></i></a>';
			$action .= '&nbsp;';

			if($_SESSION['user_type'] == USER_ADMIN || $_SESSION['user_type'] == USER_SUPERVISOR) {
				$url = base_url('admin/task/edittask/'. $task->task_id);
				$action .= '<a href="'.$url.'" class="btn btn-info"><i class="fa fa-edit"></i></a>';
				$action .= '&nbsp;';	
			}

			$task->action = $action;
		}
		$data['data'] = $tasks;

		return $data;
	}

	public function get_urgent_task_data()
	{
		$this->db->select('tbl_task.*,tbl_customer.cust_code,tbl_customer.full_name as cus_name,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name,tbl_service.service_id,tbl_service.service_name as ser_name');
		$this->db->from('tbl_task');
		$this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		$this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		$this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
		$this->db->where('tbl_task.status!=', '2');
		$this->db->where('tbl_task.task_priority =', 'Urgent');
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function get_customer()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_customer');
		$result = $query->result();

		return $result;
	}
	public function get_service_name($service_id)
	{
		$this->db->select('service_name');
		$this->db->where('service_id', $service_id);
		$query = $this->db->get('tbl_service');
		$result = $query->row();

		return $result;
	}
	public function get_customer_name($cust_code)
	{
		$this->db->select('full_name');
		$this->db->where('cust_code', $cust_code);
		$query = $this->db->get('tbl_customer');
		$result = $query->row();

		return $result;
	}
	public function get_supervisor_name($sup_code)
	{
		$this->db->select('full_name');
		$this->db->where('sup_code', $sup_code);
		$query = $this->db->get('tbl_supervisor');
		$result = $query->row();

		return $result;
	}
	public function get_customer_mail($cust_code)
	{
		$this->db->select('email');
		$this->db->where('cust_code', $cust_code);
		$query = $this->db->get('tbl_customer');
		$result = $query->row();

		return $result;
	}
	public function get_supervisor_mail($sup_code)
	{
		$this->db->select('email');
		$this->db->where('sup_code', $sup_code);
		$query = $this->db->get('tbl_supervisor');
		$result = $query->row();

		return $result;
	}

	public function get_supervisor()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_supervisor');
		$result = $query->result();
		return $result;
	}

	public function get_service()
	{
		$this->db->select('*');
		$query = $this->db->get('tbl_service');
		$result = $query->result();

		return $result;
	}


	public function get_employee()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_employee');
		$result = $query->result();

		return $result;
	}

	public function get_employee_mail($emp_code)
	{
		$this->db->select('email');
		$this->db->where('emp_code', $emp_code);
		$query = $this->db->get('tbl_employee');
		$result = $query->result();

		return $result;
	}
	public function get_employee_name($emp_code)
	{
		$this->db->select('full_name');
		$this->db->where('emp_code', $emp_code);
		$query = $this->db->get('tbl_employee');
		$result = $query->result();

		return $result;
	}

	public function add_task($data)
	{
		$final_data = $data;

		// generate taskid
		$last_task_id = $this->getLastid();
		$final_data['task_id'] = 'TASK' . date('y') . str_pad($last_task_id->lastid, 6, "0", STR_PAD_LEFT);
		$final_data['emp_details'] = json_encode($final_data['emp_details']);
		$final_data['created_on'] = date('Y-m-d');
		$final_data['status'] = 1;
		$final_data['attach_file'] = json_encode($final_data['attach_file']);

		// find customer id
		$sql = "SELECT id AS customer_id FROM tbl_users WHERE user_code = ?";
		$result = $this->db->query($sql, [$data['customer_code']])->row();
		$final_data['customer_id'] = $result->customer_id;

		// find supervisor id
		$sql = "SELECT id AS supervisor_id FROM tbl_users WHERE user_code = ?";
		$result = $this->db->query($sql, [$data['sup_name']])->row();
		$final_data['supervisor_id'] = $result->supervisor_id;

		$this->db->insert('tbl_task', $final_data);

		$task_id = $this->db->insert_id();

		foreach($data['emp_details'] as $emp_code) {
			$sql = "INSERT INTO tbl_task_employee(task_id, employee_id)
			SELECT ? AS task_id, id AS employee_id FROM tbl_employee 
			WHERE emp_code = ?";

			$this->db->query($sql, [$task_id, $emp_code]);
		}

		// send mail to customer an employee

		// insert auto replay here

		return $task_id;
		
	}

	/**
	 * Update task data
	 * 
	 * @param array $data
	 * @param string $task_id
	 */
	public function edit_task($data, $task_id)
	{
		// find current task
		$sql = "SELECT * FROM tbl_task WHERE task_id = ?";
		$task = $this->db->query($sql, [$task_id])->row();

		$final_data = $data;
		$final_data['updated_on'] = date('Y-m-d H:i:s');

		if( !empty($data['attach_file']) ) {
			$new_attachments = array_merge(json_decode($task->attach_file, true), $data['attach_file']);
			$final_data['attach_file'] = json_encode($new_attachments);
		} else {
			unset($final_data['attach_file']);
		}

		if( !empty($data['emp_details']) ) {
			$final_data['emp_details'] = json_encode($data['emp_details']);

			// remove previous emp
			$sql = "DELETE 
			FROM tbl_task_employee
			WHERE task_id = ?";
			$this->db->query($sql, [$task->id]);

			foreach($data['emp_details'] as $emp_code) {
				$sql = "INSERT INTO tbl_task_employee(task_id, employee_id)
				SELECT ? AS task_id, id AS employee_id FROM tbl_employee 
				WHERE emp_code = ?";
	
				$this->db->query($sql, [$task->id, $emp_code]);
			}
		} else {
			unset($final_data['emp_details']);
		}

		$this->db->where('task_id', $task_id);
		$this->db->update('tbl_task', $final_data);

		return $this->db->affected_rows();
	}

	/**
	 * Get conversation by id
	 * 
	 * @param int $conversation_id
	 * @return array
	 */
	public function findMessageByConversationId($conversation_id)
	{
		$sql = "SELECT * 
		FROM tbl_task_conversation
		WHERE id = ?";

		return $this->db->query($sql, [$conversation_id])->row_array();
	}

	/**
	 * Save supervisor or admin conversation
	 * 
	 * @param array $data
	 */
	public function saveConversationForSupervisorOrAdmin($data)
	{
		$conversation_id = $data['conversation_id'];

		if( !is_null($conversation_id) && $conversation_id != '' ) {
			// update previous conversation
			$sql = "SELECT * FROM tbl_task_conversation WHERE id = ?";
			$coversation = $this->db->query($sql, [$conversation_id])->row();

			$attachments = json_decode($coversation->attachments, true);
			$final_attachments = array_merge($attachments, $data['attachments']);

			$is_qc_complete = 0;

			if( !is_null($data['send_to_customer']) ) {
				$is_qc_complete = 1;
			}

			$this->db->update('tbl_task_conversation', [
				'message' => $data['message'],
				'attachments' => json_encode($final_attachments),
				'qc_checker_id' =>  $this->session->userdata('user_id'),
				'is_qc_complete' => $is_qc_complete
			], ['id' => $conversation_id]);

		} else {
			$sql = "SELECT tbl_users.id AS customer_id
			FROM tbl_task
			JOIN tbl_users
			ON tbl_users.user_code = tbl_task.customer_code
			WHERE tbl_task.id = ?";
			$task = $this->db->query($sql, [$data['task_id']])->row();
			
			$coversation_data = [
				'task_id' => $data['task_id'],
				'sender_id' => $this->session->userdata('user_id'),
				'reciver_id' => $task->customer_id,
				'is_qc_complete' => 1,
				'qc_checker_id' => NULL,
				'message' => trim($data['message']),
				'is_qc_required' => 0,
				'send_by' => 'executive',
				'attachments' => json_encode($data['attachments']),
				'sent_on' => date('Y-m-d H:i:s')
			];
	
			$this->db->insert('tbl_task_conversation', $coversation_data);
		}
	}

	/**
	 * Save conversation for employee
	 * 
	 * @param array $data
	 */
	public function saveConersationForEmployee($data)
	{
		// check if conversation id not null
		$conversation_id = $data['conversation_id'];

		if( !is_null($conversation_id) && $conversation_id != '' ) {
			// update previous conversation
			$sql = "SELECT * FROM tbl_task_conversation WHERE id = ?";
			$coversation = $this->db->query($sql, [$conversation_id])->row();

			$attachments = json_decode($coversation->attachments, true);
			$final_attachments = array_merge($attachments, $data['attachments']);

			$this->db->update('tbl_task_conversation', [
				'message' => $data['message'],
				'attachments' => json_encode($final_attachments),
				'qc_checker_id' => $data['qc_checker_id'],
				'sent_on' => date('Y-m-d H:i:s')
			], ['id' => $conversation_id]);
		} else {
			$sql = "SELECT tbl_users.id AS customer_id
			FROM tbl_task
			JOIN tbl_users
			ON tbl_users.user_code = tbl_task.customer_code
			WHERE tbl_task.id = ?";
			$task = $this->db->query($sql, [$data['task_id']])->row();
			
			$coversation_data = [
				'task_id' => $data['task_id'],
				'sender_id' => $this->session->userdata('user_id'),
				'reciver_id' => $task->customer_id,
				'is_qc_complete' => 0,
				'qc_checker_id' => $data['qc_checker_id'],
				'message' => trim($data['message']),
				'is_qc_required' => 1,
				'send_by' => 'executive',
				'attachments' => json_encode($data['attachments']),
				'sent_on' => date('Y-m-d H:i:s')
			];
	
			$this->db->insert('tbl_task_conversation', $coversation_data);
		}
	}

	/**
	 * Get task comments
	 * 
	 * @param string $task_id
	 * @return array
	 */
	public function getTaskComments($task_id)
	{
		$sql = "SELECT
			c.send_by,
			c.message,
			c.attachments,
			c.sent_on,
			u1.full_name AS sender_name,
			u2.full_name AS reciver_name,
			UPPER(LEFT(u1.full_name,1)) AS sender_name_start_with
		FROM tbl_task_conversation AS c
		INNER JOIN tbl_task AS t ON t.id = c.task_id
		LEFT JOIN tbl_users AS u1 ON u1.id = c.sender_id
		LEFT JOIN tbl_users AS u2 ON u2.id = c.reciver_id
		WHERE t.task_id = ? AND c.is_qc_complete = ?
		ORDER BY c.sent_on ASC";

		return $this->db->query($sql, [$task_id, 1])->result();
	}

	public function getLastid()
	{
		$this->db->select('max(id) as lastid');
		$query = $this->db->get('tbl_task');
		$result = $query->row();
	
		return $result;
	}

	public function get_data_by_id($task_id)
	{
		$this->db->select('tbl_task.*,tbl_customer.*,tbl_service.service_name');
		$this->db->from('tbl_task');
		$this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		$this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
		$this->db->where('tbl_task.task_id', $task_id);
		$query = $this->db->get();
		
		return $query->result();
	}
	
	public function get_data_by_taskcode($task_id)
	{
		$this->db->select('tbl_task.*,tbl_service.*,tbl_users.email as user_email,tbl_users.full_name as full_name,tbl_customer.time_wallet as time_balance');
		$this->db->from('tbl_task');
		$this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.task_name', 'left');
		$this->db->join('tbl_users', 'tbl_users.user_code = tbl_task.customer_code', 'left');
		$this->db->join('tbl_customer', 'tbl_users.user_code = tbl_customer.cust_code', 'left');
		$this->db->where('tbl_task.task_id', $task_id);
		$query = $this->db->get();
		$result = $query->result();
		
		return $result;
	}

	public function get_data_by_message($task_id, $cust_code)
	{
		$sql = "SELECT `tbl_message`.*, `tbl_users`.`full_name` as `user_name`, `tbl_users`.`profile_photo` as `user_photo` FROM `tbl_message` LEFT JOIN `tbl_users` ON `tbl_message`.`send_user_id` = `tbl_users`.`user_code` WHERE  `tbl_message`.`task_code` = '" . $task_id . "' ORDER BY `tbl_message`.`id` ASC";
		$query = $this->db->query($sql);
		
		return $query->result_array();
	}
	
	public function add_message($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_message', $data);
			return $this->db->insert_id();
		}
	}

	

	public function delete_row_data($id)
	{
		$data['status'] = '2';
		$this->db->where('id', $id);
		$this->db->update('tbl_task', $data);
	}
}
