<?php if (! defined('BASEPATH')) 
{   
 exit('No direct script access allowed');
 }
 class Settings_model extends CI_Model
 {     
 
 function get_data()
 {
 	 $this->db->select('*');
	 $query = $this->db->get('tbl_setting');
	 $result = $query->result();
	 return $result;
 }
 
   function update_data($data)
	{
		if(!empty($data))
		{
             $this->db->update('tbl_setting', $data);
            // echo $this->db->last_query();
             //exit;
			return $this->db->affected_rows();
		}
	}
 
 }