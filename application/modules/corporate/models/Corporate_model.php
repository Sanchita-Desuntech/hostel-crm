<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Corporate_model extends CI_Model
{
	
	
   function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 10);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
 
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',10);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }

   function get_client_logo()
     {
	  $this->db->select('*');
	  $query = $this->db->get('client_mng');
	  $result = $query->result();
      return $result;
   }
   
    function add_data($data)
     {
	  if(!empty($data))
		{
	     $this->db->insert('contact_mng',$data);
	     return $this->db->insert_id();
		}
   }
	
}
