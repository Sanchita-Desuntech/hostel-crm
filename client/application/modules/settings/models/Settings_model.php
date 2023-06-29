<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Settings_model extends CI_Model

{

   

  function get_data()
  {

	 $this->db->select('*');
     $this->db->where('id', 1);
	 $query = $this->db->get('settings_mng');
	 $result = $query->result();
	 return $result;

  }



  function get_data_by_id($id)
  {
	 $this->db->select('*');
	 $this->db->where('id', $id);
	 $query = $this->db->get('settings_mng');
	 $result = $query->result();
	 return $result;

  }

  

  

  function edit_data_image($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('settings_mng', $data);
			 return $this->db->affected_rows();
		}

	}


  

	

}

