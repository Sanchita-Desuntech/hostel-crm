<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	function get_sng_pages_data()
     {
 
	  $this->db->select('*');
      $this->db->where('id', 13);
      $query = $this->db->get('pages_mng');
	  $result = $query->result();
	  /*echo $this->db->last_query();
	  exit;*/
      return $result;
   }
	
	function validate()
	{
		
		//first check if the user exit into our new user_master table 
		//start
		$this->db->where('email', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_users');
		if($query->num_rows() > 0)
		{	
 			$row = $query->row();
			return $row;
			
		}
		
		
		
	}
	

	

				
}