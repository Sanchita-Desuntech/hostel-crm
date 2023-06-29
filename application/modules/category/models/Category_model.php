<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Category_model extends CI_Model
{
	
	function get_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 3);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   /*function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }*/
   
   function get_cat_data($slug)
     {
	  $this->db->select('*');
      $this->db->where('slug', $slug);
      $query = $this->db->get('tbl_category');
	  $result = $query->row();
	  //echo $this->db->last_query();die();
      return $result;
   }
   
   function get_post_data($slug)
	{
			$this->db->select('tbl_movies.*,tbl_category.id, tbl_category.cat_name');
		  	$this->db->from('tbl_movies');
	      	$this->db->join('tbl_category', 'tbl_category.id = tbl_movies.movie_category', 'left');
	       	$this->db->where('tbl_category.status=','1');
	       	$this->db->where('tbl_category.slug',$slug);
	       	$this->db->where('tbl_movies.status=',1);
		  	$query = $this->db->get();
		  	$result = $query->result();
		  	//echo $this->db->last_query();die();
		 	return $result;
		
	}
   
   
   
  
}
