<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 1);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   	 }
   	 
   	 function get_slider()
   	 {
   	 	
	    $this->db->select('*');
        $this->db->where('status', 1);
        $query = $this->db->get('homepage_banner');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
	 }
	 
	 function get_menu_list()
   	 {
   	 	
	    $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('is_parent', 1);
        $query = $this->db->get('tbl_category');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
	 }
	 function get_dropdownmenu_list()
   	 {
   	 	//echo $parent_id;die();
	    $this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('is_parent', 0);
        $this->db->where('is_feature', 1);
        $query = $this->db->get('tbl_category');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
	 }
	 
	 function get_post_data()
	  {
		 $this->db->select('*');
        $this->db->where('status', '1');
        $query = $this->db->get('tbl_movies');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
		
	  }  	 
   
	   
   
}
