<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Employee_model extends CI_Model
{
	function get_data()
  {
	 $this->db->select('tbl_employee.*,tbl_supervisor.sup_code,tbl_supervisor.full_name as sup_name');
	 $this->db->from('tbl_employee');
	 $this->db->join('tbl_supervisor', 'tbl_employee.supervisor_name = tbl_supervisor.sup_code', 'left');
     $this->db->where('tbl_employee.status!=', '2');
     $this->db->where('tbl_employee.user_type=', 1);
     $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
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
	     echo $this->db->last_query();
	   //  exit;
	     return $this->db->insert_id();
		}
  }
  
  function add_user($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_users',$data);
	     echo $this->db->last_query();
	   //  exit;
	     return $this->db->insert_id();
		}
  }
  
  function get_supervisor() 
  {
		 $this->db->select('*');
		 $this->db->where('status!=', '2');
		 $query = $this->db->get('tbl_supervisor');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
  }
  
  function edit_employee($data,$emp_code)
	{
		if(!empty($data))
		{
			 $this->db->where('emp_code',$emp_code);
             $this->db->update('tbl_employee', $data);
             //echo $this->db->last_query();exit;
			 return $this->db->affected_rows();
		}
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
  
  
  
  
  
  
}
