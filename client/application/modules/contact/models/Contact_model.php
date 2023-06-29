<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact_model extends CI_Model
{
	function get_data($cust_code)
	{
		 $this->db->select('*');
		 $this->db->where('status!=', '2');
		 $this->db->where('created_by', $cust_code);
		 $query = $this->db->get('tbl_contact');
		 $result = $query->result();
		 //echo $this->db->last_query();die();
		 return $result;
	}
	
	function add_contact($data)
	  {
		 if(!empty($data))
			{
		     $this->db->insert('tbl_contact',$data);
		     /*echo $this->db->last_query();
		     exit;*/
		     return $this->db->insert_id();
			}
	  }
	  
	  function get_data_by_id($id)
	  {
		 $this->db->select('*');
	     $this->db->where('id', $id);
		 $query = $this->db->get('tbl_contact');
		 $result = $query->result();
		 return $result;
		
	  }
  
  
  function edit_contact($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_contact', $data);
             /*echo $this->db->last_query();
	    	 exit;*/
			 return $this->db->affected_rows();
		}
	}
	
  
  
}
