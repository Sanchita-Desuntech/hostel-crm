<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Democlass_model extends CI_Model
{
	
	
   function get_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 12);
		
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
 
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',12);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }

	   function get_address_data()
     {
    $this->db->select('*');
      $query = $this->db->get('addressmng_mng ');
    $result = $query->result();
      return $result;
   }
   
   
     function get_center_data()
     {
	  $this->db->select('*');
      $query = $this->db->get('educenter_mng');
	  $result = $query->result();
      return $result;
   }
   
}
