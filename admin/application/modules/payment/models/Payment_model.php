<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Payment_model extends CI_Model
{
	function get_data()
	  {
		 $this->db->select('tbl_payment.*,tbl_customer.full_name as cust_name');
		 $this->db->from('tbl_payment');
		 $this->db->join('tbl_customer', 'tbl_payment.customer_code = tbl_customer.cust_code', 'left');
	     $query = $this->db->get(); 
		 $result = $query->result();
		 /*echo $this->db->last_query();
		 exit;*/
		return $result;
	}
   function get_data_by_id($id)
    {
	   $this->db->select('*');
       $this->db->where('id', $id);
	   $query = $this->db->get('tbl_payment');
	   $result = $query->result();
	   return $result;
   }
   
   
   function edit_data($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_payment', $data);
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
