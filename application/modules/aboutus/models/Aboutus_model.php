<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Aboutus_model extends CI_Model
{
	
	
   function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 2);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
	
}
