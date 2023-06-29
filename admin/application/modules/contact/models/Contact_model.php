<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact_model extends CI_Model
{
   

  function get_data()
  {
	 $this->db->select('*');
     $this->db->order_by("id","DESC");
	 $query = $this->db->get('contact_mng');
	 $result = $query->result();
	 return $result;
	
  }
	
	
  public function delete_row_data($ids)
  {
	  $this->db->where('id', $ids);
	  $this->db->delete('contact_mng');
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('contact_mng');
	 $result = $query->result();
	 return $result;
	
  }
  
  
 
  
  
	
}
