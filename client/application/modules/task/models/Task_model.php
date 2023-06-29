<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Task_model extends CI_Model
{
	function get_data($cust_code)
	{
		 $this->db->select('tbl_task.*,tbl_service.*');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.service_code', 'left');
		 $this->db->where('tbl_task.customer_code', $cust_code);
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*echo "<pre>";
		 print_r($result);
		 echo $this->db->last_query();
		 exit;*/
		return $result;
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
	 * Record a conversation against a task
	 * 
	 * @param array $data
	 */
	public function addConversation($data)
	{
		$coversation_data = [
			'task_id' => $data['task_id'],
			'sender_id' => $this->session->userdata('user_id'),
			'is_qc_complete' => 1,
			'message' => trim($data['message']),
			'sent_on' => date('Y-m-d H:i:s'),
			'send_by' => 'client',
			'attachments' => json_encode($data['attachments'])
		];

		$this->db->insert('tbl_task_conversation', $coversation_data);

		// update task status to open
		$this->db->update('tbl_task', [
			'task_status' => 'Open'
		], ['id' => $data['task_id']]);
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
	
	function get_customer($cust_code)
	{
		 $this->db->select('*');
		 $this->db->where('status!=', '2');
		 $this->db->where('cust_code', $cust_code);
		 $query = $this->db->get('tbl_customer');
		 $result = $query->row();
		 //echo $this->db->last_query();die();
		 return $result;
	}
	
	function get_service()
	{
		 $this->db->select('*');
		 $this->db->where('ser_status!=', '2');
		 $query = $this->db->get('tbl_service');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
	}
   
   function add_task($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_task',$data);
	     /*echo $this->db->last_query();
	     exit;*/
	     return $this->db->insert_id();
		}
  }
  
  function getLastid()
    {
	   $this->db->select('max(id) as lastid');
	    $query = $this->db->get('tbl_task');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   }
   
   function get_data_by_id($task_id)
  {
	 	 $this->db->select('tbl_task.*,tbl_service.*');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.task_name', 'left');
		 $this->db->where('tbl_task.task_id', $task_id);
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*echo $this->db->last_query();
		 exit;*/
		 return $result;
	
  }
  
  function get_data_by_message($task_id,$cust_code)
  {
	 	 $sql = "SELECT `tbl_message`.*, `tbl_users`.`full_name` as `user_name`, `tbl_users`.`profile_photo` as `user_photo` FROM `tbl_message` LEFT JOIN `tbl_users` ON `tbl_message`.`send_user_id` = `tbl_users`.`user_code` WHERE (`tbl_message`.`send_user_id` = '".$cust_code."' OR `tbl_message`.`receiver_user_id` = '".$cust_code."') AND `tbl_message`.`task_code` = '".$task_id."' ORDER BY `tbl_message`.`id` ASC";

	 	 
		 $query = $this->db->query($sql);
		 return $query->result_array();	
  }
  
  
  function edit_data($data,$task_id)
	{
		if(!empty($data))
		{
			 $this->db->where('task_id',$task_id);
             $this->db->update('tbl_task', $data);
             /*echo $this->db->last_query();
	    	 exit;*/
			 return $this->db->affected_rows();
		}
	}
	
	function add_message($data)
	  {
		 if(!empty($data))
			{
		     $this->db->insert('tbl_message',$data);
		     return $this->db->insert_id();
			}
	  }
	
  
  
}
