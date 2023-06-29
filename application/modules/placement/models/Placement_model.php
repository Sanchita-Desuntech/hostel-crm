<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Placement_model extends CI_Model
{
	
	
   function get_all_data()
     {
	  $this->db->select('*');
	  $this->db->order_by("id", "DESC");
 /*     $this->db->where('id', 2);*/
		
      $query = $this->db->get('success_mng');
	  $result = $query->result();
      return $result;
   }

    function get_all_placement_data()
     {
    $this->db->select('*');
    $this->db->order_by("id", "DESC");
      $query = $this->db->get('placementc_mng');
    $result = $query->result();
      return $result;
   }
 
   function get_placesuc_data($slug)
     {
	  $this->db->select('*');
      $this->db->where('slug',$slug);
		
      $query = $this->db->get('success_mng');
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
   
     function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id',6);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
}
