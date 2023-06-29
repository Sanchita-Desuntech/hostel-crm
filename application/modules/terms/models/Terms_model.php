<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Terms_model extends CI_Model
{
	
	
   function get_sng_pages_data()
	{
	  $this->db->select('*');
      $this->db->where('id',9);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
	  /*echo $this->db->last_query();
	  exit;*/
      return $result;
   }

	
}
