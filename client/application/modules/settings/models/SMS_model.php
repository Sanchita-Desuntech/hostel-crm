<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class SMS_model extends CI_Model

{

   function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_sms_settings',$data);
	     return $this->db->insert_id();
		}
  }

  function get_data()
  {

	 $this->db->select('*');
	 $this->db->where('is_active!=', 2);
	 $query = $this->db->get('tbl_sms_settings');
	 $result = $query->result();
	 return $result;

  }



  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('tbl_sms_settings');
	 $result = $query->result();
	 return $result;

  }

  

  

  function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_sms_settings', $data);
			 return $this->db->affected_rows();
		}

	}
	
	public function delete_row_data($id)
	  {
	  	  $data['is_active']=2;
		  $this->db->where('id', $id);
		  $this->db->update('tbl_sms_settings', $data);
	  }	


  

	

}

