<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Employeee_model extends CI_Model
{
	function get_data($emp_id)
  {		
	 $this->db->select('tbl_task.*,tbl_customer.cust_code,tbl_customer.full_name as cus_name,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name,tbl_service.service_id,tbl_service.service_name as ser_name');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		 $this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		 $this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
	     $this->db->where('tbl_task.status!=', '2');
	     $this->db->where("(JSON_CONTAINS(tbl_task.emp_details, '$emp_id')) > ",'0');
	     $query = $this->db->get(); 
		 $result = $query->result();
		/* echo $this->db->last_query();
		 exit;*/
		return $result;	
  }
  		function get_all_task_data($emp_id)
  {		
	 $this->db->select('tbl_task.*,tbl_customer.cust_code,tbl_customer.full_name as cus_name,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name,tbl_service.service_id,tbl_service.service_name as ser_name');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_customer', 'tbl_task.customer_code = tbl_customer.cust_code', 'left');
		 $this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		 $this->db->join('tbl_service', 'tbl_task.service_code = tbl_service.service_id', 'left');
	     $this->db->where('tbl_task.status!=', '2');
	    
	     $query = $this->db->get(); 
		 $result = $query->result();
		/* echo $this->db->last_query();
		 exit;*/
		return $result;	
  }
    		function get_urgent_task_data($emp_id)
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
		/* echo $this->db->last_query();
		 exit;*/
		return $result;	
  }
  	function getLastid()
    {
	   $this->db->select('max(id) as lastid');
	    $query = $this->db->get('tbl_employee');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   }
   
   function add_employee($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_employee',$data);
	     //echo $this->db->last_query();
	   //  exit;
	     return $this->db->insert_id();
		}
  }
  
  function add_user($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_users',$data);
	     //echo $this->db->last_query();
	   //  exit;
	     return $this->db->insert_id();
		}
  }
  
  function get_supervisor() 
  {
		 $this->db->select('*');
		 $this->db->where('status!=', '2');
		 $this->db->where('status!=', '0');
		 $query = $this->db->get('tbl_supervisor');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
  }
  

	
	function edit_users($data,$emp_code)
	{
		if(!empty($data))
		{
			 $this->db->where('user_code',$emp_code);
             $this->db->update('tbl_users', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}
	function edit_employee($data,$emp_code)
	{
		if(!empty($data))
		{
			 $this->db->where('emp_code',$emp_code);
             $this->db->update('tbl_employee', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}
	function get_data_by_id($emp_code)
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
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
	
  	}
  	public function delete_row_data($emp_code)

  {

  	  $data['status']='2';

	  $this->db->where('emp_code', $emp_code);

	  $this->db->update('tbl_employee', $data);

	  

  }
  
  function check_url($url)
     {
   $this->db->select('*');
   $this->db->where('profile_url',$url);
    $query = $this->db->get('tbl_employee');
    $result = $query->result();
    /* echo $this->db->last_query();
     exit;*/
    return $result;
   }
   function email_check($email){
     $this->db->where('email',$email);
    $query = $this->db->get('tbl_users');
      if ($query->num_rows() > 0){
        //die("greter");
        return false;
    }
    else{
     // die("smaller");
        return true;
    }

   }
   function check_user($hprk)
   {
     $this->db->where('ecode',$hprk);
     $this->db->where('is_email_verified', '0');
    $query = $this->db->get('tbl_users');   
      if ($query->num_rows() > 0){
        //die("greter");
         $result = $query->row();
        return $result;
    }
    else{
     // die("smaller");
        return false;
    }
	}
	
	function update_status($id,$hprk){
          $data['is_email_verified']='1';
    $this->db->where('id',$id);
    $this->db->where('ecode',$hprk);
      $this->db->update('tbl_users', $data);
   }
    function get_data_by_taskcode($task_id)
  {
	 	 $this->db->select('tbl_task.*,tbl_service.*,tbl_users.email as user_email,tbl_users.full_name ');
		 $this->db->from('tbl_task');
		 $this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.service_code', 'left');
		 $this->db->join('tbl_users', 'tbl_users.user_code = tbl_task.customer_code', 'left');
		 $this->db->where('tbl_task.task_id', $task_id);
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*echo $this->db->last_query();
		 exit;*/
		 return $result;
	
  }
    function get_data_by_message($task_id,$emp_code)
  {
  	$sql = "SELECT `tbl_message`.*, `tbl_users`.`full_name` as `user_name`, `tbl_users`.`profile_photo` as `user_photo` FROM `tbl_message` LEFT JOIN `tbl_users` ON `tbl_message`.`send_user_id` = `tbl_users`.`user_code` WHERE  `tbl_message`.`task_code` = '".$task_id."' ORDER BY `tbl_message`.`id` ASC";

		 $query = $this->db->query($sql);
		/* echo $this->db->last_query();
		 exit;*/
		 //print_r($query) ;
		 return $query->result_array();
		 //print_r($return);die("kool");
	
  }
  
    function add_message($data)
	  {
	  	if(!empty($data))
			{
		     $this->db->insert('tbl_message',$data);
			// echo $this->db->last_query();
		 //     exit;
		     return $this->db->insert_id();
			}
	  }
  //Profile Section
    function get_profile_data($id)

  {

	 $this->db->select('*');

	 $this->db->where('user_type=', 1);
	 $this->db->where('user_code=', $id);

     $query = $this->db->get('tbl_users'); 

	 $result = $query->row();

	 /*echo $this->db->last_query();

	 exit;*/

	return $result;

	}

	function get_all_service(){
		
		$this->db->select('*');
		 $query = $this->db->get('tbl_service'); 
		 return $query->result_array();
	}
	  function get_all_sypervisor(){
			
			$this->db->select('*');
			 $query = $this->db->get('tbl_supervisor'); 
			 return $query->result_array();
		}
		 function get_all_employee(){
			
			$this->db->select('*');
			 $query = $this->db->get('tbl_employee'); 
			 return $query->result_array();
		}
  
}
