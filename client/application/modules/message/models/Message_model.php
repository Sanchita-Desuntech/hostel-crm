<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Message_model extends CI_Model
{
	function get_data($cust_code)
	{
		 $this->db->select('tbl_message.*,tbl_task.*,tbl_service.service_name');
		 $this->db->from('tbl_message');
		 $this->db->join('tbl_task', 'tbl_task.task_id = tbl_message.task_code', 'left');
		 $this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.task_name', 'left');
		 $this->db->where('tbl_message.receiver_user_id', $cust_code);
		 $this->db->or_where('tbl_message.send_user_id', $cust_code);
		 $this->db->group_by("task_code");
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*print_r($result); die("lp");
		 echo $this->db->last_query();
		 exit;*/
		return $result;		 
	}
	
	public function SendTxtMessage($data){
  		$res = $this->db->insert($this->Table, $data ); 
 		if($res == 1)
 			return true;
 		else
 			return false;
	}
	  
}
