<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Course_model extends CI_Model
{
	
	
   function get_course_data($slugdata)
     {
	  $this->db->select('*');
      $this->db->where('course_slug',$slugdata);
		
      $query = $this->db->get('courses_mng');
	  $result = $query->result();
      return $result;
   }
   
  function get_latest_course_data()
     {
	  $this->db->select('*');
      $this->db->where('is_latest','yes');
		
      $query = $this->db->get('courses_mng');
	  $result = $query->result();
      return $result;
   }
   
     function get_upcoming_course_data()
     {
	  $this->db->select('*');
      $this->db->where('is_upcoming','yes');
		
      $query = $this->db->get('courses_mng');
	  $result = $query->result();
      return $result;
   }
   
   
    function get_all_course_data($course_related_id)
     {
		  
		  $ids = explode(',', $course_related_id);
		  $this->db->select('*');
		  $this->db->where_in('id',$ids);
		  $query = $this->db->get('courses_mng');
		  $result = $query->result();
		  return $result;
		
   }
 
   function get_training_course_data($id)
   {
	      $this->db->select('*');
		  $this->db->where('course_id',$id);
		  $query = $this->db->get('training_mng');
		  $result = $query->result();
		  return $result;
   }
   
   function countTrainingRow($id) // Num Rows Check
        {
		   $query = $this->db->query("SELECT * FROM training_mng WHERE course_id='".$id."' ");
			return $query->num_rows();
		}
   
   function get_syllabus_course_data($id)
   {
	      $this->db->select('*');
		  $this->db->where('course_id',$id);
		  $query = $this->db->get('syllabus_mng');
		  $result = $query->result();
		  return $result;
   }
   
    function count_syllabus_Row($id) // Num Rows Check
        {
		   $query = $this->db->query("SELECT * FROM syllabus_mng WHERE course_id='".$id."' ");
			return $query->num_rows();
		}
   
   function get_batches_course_data($id)
   {
	      $this->db->select('*');
		  $this->db->where('course_id',$id);
		  $query = $this->db->get('batches_mng');
		  $result = $query->result();
		  return $result;
   }
    function get_lecturer_course_data($id)
   {
	      $this->db->select('*');
		  $this->db->where('id',$id);
		  $query = $this->db->get('lecturer_mng');
		  $result = $query->result();
		  return $result;
   }
   function get_all_lecturer()
   {
	      $this->db->select('*');
		  $query = $this->db->get('lecturer_mng');
		  $result = $query->result();
		  return $result;
   }
   
   
   function get_all_course_comment($course_id)
   {
	   
	      $this->db->select('*');
		  $this->db->where('course_id',$course_id);
		   $this->db->where('status',1);
		  $query = $this->db->get('master_comment');
		  $result = $query->result();
		  // echo $this->db->last_query();
	// exit;
		  return $result;
   }
   
    function countCommentRow($course_id) // Num Rows Check
        {
		   $query = $this->db->query("SELECT * FROM master_comment WHERE course_id='".$course_id."' AND status=1 ");
			return $query->num_rows();
		}
   
   
    function get_course_side_data()
   {
	      $this->db->select('*');
		  $this->db->where('id',1);
		  $query = $this->db->get('crssidebar_mng');
		  $result = $query->result();
		  return $result;
   }
   
   
}
