<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Type_model extends CI_Model
{
   
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_user_type',$data);
	     return $this->db->insert_id();
	     //echo $this->db->last_query();("here");
		}
  }
  
  
  function get_data()
  {
  	 
	 $this->db->select('*');
	 $this->db->where('status!=', 2);
	 $this->db->where('id!=', 4);
	 $query = $this->db->get('tbl_user_type');
	 $result = $query->result();
	 return $result;
	
  }
  
  function get_pages()
  {
  	 
	 $this->db->select('*');
	 $query = $this->db->get('pages_mng');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
  	  $data['status']='2';
	  $this->db->where('id', $id);
	  $this->db->update('tbl_user_type', $data);
	  
  }	
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
     
	  $this->db->where('id', $id);
	 $query = $this->db->get('tbl_user_type');
	 $result = $query->result();
	 return $result;
	
  }
  
  
  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_user_type', $data);
            // echo $this->db->last_query();
             //exit;
			return $this->db->affected_rows();
		}
	}
	

  
  
	
}
