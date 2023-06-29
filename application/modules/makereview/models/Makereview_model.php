<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Makereview_model extends CI_Model
{
	
	function get_sng_pages_data()
    {
	  $this->db->select('*');
      $this->db->where('id', 14);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
   
   function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 6);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }
	
	
	function add_review($data)

  {

	 if(!empty($data))

		{

	     $this->db->insert('tbl_comment_reviews',$data);

	     return $this->db->insert_id();
	     /*echo $this->$db->last_query();
	     die("here");*/

		}

  }
	function get_data($slug,$table)
	{
		  $this->db->select('*');
	      $this->db->where('slug', $slug);
	      $query = $this->db->get($table);
		  $result = $query->row();
			return $result;
	}
	
	function get_logged($refcode,$usercode)
	  {
	  	$this->db->select('*');
		$this->db->where('ref_code', $refcode);
		$this->db->where('user_code', $usercode);
		$this->db->where('rate!=', 0);
		$query = $this->db->get('tbl_comment_reviews');
		$result = $query->row();
		//print_r ($result); die();
		//echo $this->db->last_query();exit;
		return $result;
	  }
  	 
  	
	
}
