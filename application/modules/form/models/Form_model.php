<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Form_model extends CI_Model
{
	
	
   function add_data($data)
     {
	  if(!empty($data))
		{
			//print_r($data); exit();
	     $this->db->insert('contact_mng',$data);
	     return $this->db->insert_id();
		}
   }
   
  
 
 
   
}
