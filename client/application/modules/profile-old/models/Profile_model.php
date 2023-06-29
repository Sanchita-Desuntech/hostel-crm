<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Profile_model extends CI_Model

{

  

  function get_data($cust_code)

  {

	 $this->db->select('tbl_users.*,tbl_customer.*');

	 $this->db->from('tbl_users');

	 $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_users.user_code', 'left');

	 $this->db->where('tbl_customer.cust_code', $cust_code);

     $this->db->where('tbl_users.user_type=', 2);

     $this->db->where('tbl_customer.user_type=', 2);

     $query = $this->db->get(); 

	 $result = $query->row();

	 /*echo $this->db->last_query();

	 exit;*/

	return $result;

	

  }

	

	function edit_customer($data,$cust_code)

	{

		if(!empty($data))

		{

			 $this->db->where('cust_code',$cust_code);

             $this->db->update('tbl_customer', $data);

			 return $this->db->affected_rows();

			 /*$sql = $this->db->last_query();

	     echo $sql;die("here"); */

		}

	}

	

	function edit_user($data,$cust_code)

	{

		if(!empty($data))

		{

			 $this->db->where('user_code',$cust_code);

             $this->db->update('tbl_users', $data);

			 return $this->db->affected_rows();

			 /*$sql = $this->db->last_query();

	     echo $sql;die("here"); */

		}

	}

  

  

	

}

