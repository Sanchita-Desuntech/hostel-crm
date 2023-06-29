<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Courses_model extends CI_Model
{
	
	
   function get_courses()
     {
	  
	 $this->db->select('*');
     $this->db->from('courses_mng');
	 $this->db->order_by("courses_mng.orderid","asc");
	 $query = $this->db->get();
	 $result = $query->result();
	 return $result;
	  
   }
    function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   
   function insert_comment_data($data)
   {
	   if(!empty($data))
		{
	$this->db->insert('master_comment',$data);
	
			return $this->db->insert_id();
		}
  
   }
}
