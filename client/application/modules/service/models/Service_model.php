<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Service_model extends CI_Model
{
	function get_data()
	  {
		 {
	   	$this->db->select('*');
	   	$this->db->where('ser_status!=', '2');
	    $query = $this->db->get('tbl_service');
	    $result = $query->result();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   		}
	  }
  
  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_service',$data);
	     /*echo $this->db->last_query();
	     exit;*/
	     return $this->db->insert_id();
		}
  }
  
  
  
  function getLastid()
    {
	   $this->db->select('max(id) as lastid');
	    $query = $this->db->get('tbl_service');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   }
   
   function get_data_by_id($id)
    {
	   $this->db->select('*');
       $this->db->where('id', $id);
	   $query = $this->db->get('tbl_service');
	   $result = $query->result();
	   return $result;
   }
   
   
   function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_service', $data);
             //echo $this->db->last_query();die();
			 return $this->db->affected_rows();
		}
	}
	
	public function delete_row_data($id)
  	{
  	  $data['ser_status']=2;
	  $this->db->where('id', $id);
	  $this->db->update('tbl_service', $data);
	  
 	 }	

  
  
  
  
  
}
