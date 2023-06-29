<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Orderpackage_model extends CI_Model
{
  
  function get_data()
  {
	 $this->db->select('tbl_payment.*,tbl_customer.full_name as customer_name');
	 $this->db->from('tbl_payment');
	 $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_payment.customer_code', 'left');
	 $this->db->order_by('tbl_payment.create_at' , DESC);
	 $query = $this->db->get(); 
	 $result = $query->result();
	 // echo $this->db->last_query();
	 // exit;
	return $result;
	
  }
	
	
  public function delete_row_data($id)
  {
	  $this->db->where('id', $id);
	  $this->db->delete('tbl_payment');
  }	
  
  
  
  
  
  function get_data_by_id($id)
  {
  	 $this->db->select('tbl_payment.*,tbl_customer.*');
	 $this->db->from('tbl_payment');
	 $this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_payment.customer_code', 'left');
	 $this->db->where('tbl_payment.id', $id);
	 $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
	
  }
  
  
  
  
  
	
}
