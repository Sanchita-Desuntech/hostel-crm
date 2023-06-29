<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class User_model extends CI_Model
{
	
	function getLastid()
     {
   $this->db->select('max(id) as lastid');
    $query = $this->db->get('tbl_customer');
    $result = $query->row();
    /*echo $this->db->last_query();
    exit;*/
    return $result;
   }
	
	function add_customer($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_customer',$data);
	     //echo $this->db->last_query();die();
	     return $this->db->insert_id();
	     
		}
  }
  
  function add_users($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_users',$data);
	     //echo $this->db->last_query();die();
	     return $this->db->insert_id();
	     
		}
  }
  
  function get_user_type() 
  {
		 $this->db->select('*');
		 $this->db->where('status!=', 2);
		 $query = $this->db->get('tbl_user_type');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
  }
   
  function get_data()
  {
	 $this->db->select('tbl_users.*,tbl_customer.*');
	 $this->db->from('tbl_users');
	 $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_users.user_code', 'left');
     $this->db->where('tbl_users.user_type', 3);
     $this->db->where('tbl_users.status!=', '2');
     
     $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
  }
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get('tbl_customer');
	 $result = $query->result();
	 //print_r($result);exit;
	 return $result;
	
  }
  
  
  public function delete_row_data_customer($id)

  {

  	  $data['status']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_customer', $data);
		echo $this->db->last_query();
	  

  }
  
  public function delete_row_data_users($id)

  {

  	  $data['status']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_users', $data);
echo $this->db->last_query();die();
	  

  }	
  
  
  function edit_customer($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_customer', $data);
             echo $this->db->last_query();
			 return $this->db->affected_rows();
		}
	}
	
	function edit_users($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_users', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}	

	
}
