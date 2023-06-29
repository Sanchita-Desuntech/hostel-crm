<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Supervisor_model extends CI_Model
{
	function get_data()
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
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
  }
  	
  	function getLastid()
    {
	   $this->db->select('max(id) as lastid');
	    $query = $this->db->get('tbl_supervisor');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   }
   
   function add_supervisor($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_supervisor',$data);
	     /*echo $this->db->last_query();
	     exit;*/
	     return $this->db->insert_id();
		}
  }
  
  function add_user($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_users',$data);
	     /*echo $this->db->last_query();
	     exit;*/
	     return $this->db->insert_id();
		}
  }
  
  function edit_supervisor($data,$sup_code)
	{
		if(!empty($data))
		{
			 $this->db->where('sup_code',$sup_code);
             $this->db->update('tbl_supervisor', $data);
             //echo $this->db->last_query();
			 return $this->db->affected_rows();
		}
	}
	
	function edit_users($data,$sup_code)
	{
		if(!empty($data))
		{
			 $this->db->where('user_code',$sup_code);
             $this->db->update('tbl_users', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}
	function get_data_by_id($sup_code)
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
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
	
  	}
  	public function delete_row_data($sup_code)

  {

  	  $data['status']='2';

	  $this->db->where('sup_code', $sup_code);

	  $this->db->update('tbl_supervisor', $data);

	  

  }
  function check_url($url)
     {
   $this->db->select('*');
   $this->db->where('profile_url',$url);
    $query = $this->db->get('tbl_supervisor');
    $result = $query->result();
    // echo $this->db->last_query();
    // exit;
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
   function check_user($hprk){
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
