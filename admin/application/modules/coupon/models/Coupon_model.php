<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Coupon_model extends CI_Model

{

   

  function add_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_coupons',$data);
	     //echo $this->db->last_query(); die("here");
	     return $this->db->insert_id();
     	}

  }

  

  

  function get_data()
  {

	 $this->db->select('*');
	 $this->db->where('is_active!=', 2);
	 $query = $this->db->get('tbl_coupons');
	 $result = $query->result();
	 
	 return $result;


  }

	

	

  public function delete_row_data($id)

  {

  		$data['is_active']=2;

	  $this->db->where('id', $id);

	  $this->db->update('tbl_coupons', $data);

  }	

  

  

  

  

  

  function get_data_by_id($id)

  {

	 $this->db->select('*');

     $this->db->where('id', $id);

	 $query = $this->db->get('tbl_coupons');

	 $result = $query->result();

	 return $result;

	

  }

  

  

  function edit_data($data,$id)

	{

		if(!empty($data))

		{

			 $this->db->where('id',$id);

             $this->db->update('tbl_coupons', $data);

			 return $this->db->affected_rows();

			 /*$sql = $this->db->last_query();

	     echo $sql;die("here"); */

		}

	}

  

  

	

}

