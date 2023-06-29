<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Users_model extends CI_Model
{
   /*function get_details_sng_pages_data()
     {
	  $this->db->select('*');
      $this->db->where('id', 4);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
      return $result;
   }*/
   function edit_data($data,$user_code)
	{
		if(!empty($data))
		{
			 $this->db->where('user_code',$user_code);
             $this->db->update('tbl_users', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}
	function get_data_by_usercode($usercode)
	  {
		 $this->db->select('*');
	     $this->db->where('user_code', $usercode);
		 $query = $this->db->get('tbl_users');
		 $result = $query->result();
		 //echo $this->db->last_query();die("jack");
		 return $result;
		
	  }
  
}
