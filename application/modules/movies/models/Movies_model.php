<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Movies_model extends CI_Model
{
	
	function get_sng_pages_data()
    {
	  $this->db->select('*');
      $this->db->where('id', 3);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
	  /*echo $this->db->last_query();
	  exit();*/
      return $result;
   	}
   function get_details_sng_pages_data()
   {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   function get_single_movie_data($slug)
   {
   		$this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('movies_slug',$slug);
        $query = $this->db->get('tbl_movies');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
	}
	function get_related_video($movie_type)
	{
		$this->db->select('*');
        $this->db->where('status', '1');
        $this->db->where('movie_type',$movie_type);
        $query = $this->db->get('tbl_movies');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
        return $result;
	}
   
	
   
  
}
