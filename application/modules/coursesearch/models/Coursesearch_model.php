<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Coursesearch_model extends CI_Model
{
	
	
   function search_course_data($coursename)
     {
	             $this->db->like('course_name',$coursename);
                 $query = $this->db->get('courses_mng');
				 
                 return $query->result();
     }
   
  
 
 
   
}
