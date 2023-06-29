<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home_model extends CI_Model
{
   	function get_data()
	{
		 $this->db->select('tbl_task.*,tbl_customer.cust_code,tbl_customer.full_name as cus_name,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name,tbl_service.service_id,tbl_service.service_name as ser_name');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		 $this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		 $this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
	     $this->db->where('tbl_task.status!=', '2');
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*echo $this->db->last_query();
		 exit;*/
		return $result;
	}
	function get_urgent_task_data()
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
		 /*echo $this->db->last_query();
		 exit;*/
		return $result;
	}
  
	
	
}
