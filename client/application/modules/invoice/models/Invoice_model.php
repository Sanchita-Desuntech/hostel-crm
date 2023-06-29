<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Invoice_model extends CI_Model
{
	function get_data($last_id)
  {
	 $this->db->select('tbl_invoice.*,tbl_customer.full_name as customer_name,tbl_customer.time_wallet as customer_time,tbl_package.package_name as pck_name');
	 $this->db->from('tbl_invoice');
	 $this->db->join('tbl_customer', 'tbl_invoice.customer_code = tbl_customer.cust_code', 'left');
	 $this->db->join('tbl_package', 'tbl_invoice.package_code = tbl_package.package_code', 'left');
     $this->db->where('tbl_invoice.id', $last_id);
     $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query(); 
	 exit;*/
	return $result;
  }
  function get_one_invoice($inv_no)
  {
    $this->db->select('tbl_invoice.*,tbl_customer.full_name as customer_name,tbl_customer.time_wallet as customer_time,tbl_package.package_name as pck_name');
     $this->db->from('tbl_invoice');
     $this->db->join('tbl_customer', 'tbl_invoice.customer_code = tbl_customer.cust_code', 'left');
     $this->db->join('tbl_package', 'tbl_invoice.package_code = tbl_package.package_code', 'left');
     $this->db->where('tbl_invoice.invoice_no', $inv_no);
     $query = $this->db->get(); 
     $result = $query->result();
     if ($query->num_rows() > 0){
          //die("greater");
          return $result;
      }
      else{
          //die("smaller");
          return false;
      }
      
  }
  
  function get_invoice($cust_code)
  {
	 $this->db->select('tbl_invoice.*,tbl_customer.full_name as customer_name,tbl_package.package_name as pck_name');
	 $this->db->from('tbl_invoice');
	 $this->db->join('tbl_customer', 'tbl_invoice.customer_code = tbl_customer.cust_code', 'left');
	 $this->db->join('tbl_package', 'tbl_invoice.package_code = tbl_package.package_code', 'left');
     $this->db->where('tbl_invoice.customer_code', $cust_code);
     $query = $this->db->get(); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit;*/
	return $result;
  }
  
  function add_invoice($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_invoice',$data);
	     return $this->db->insert_id();
		}
  }

  public function get_paypal_setup()
  {
  	 $this->db->select('*');
     $query = $this->db->get('tbl_paypal');
     $result = $query->result();
     /*echo $this->db->last_query();
     exit;*/
     return $result;
  }
  
  function coupon_data()
  {
  	 $this->db->select('*');
  	 $this->db->where('is_active', 1);
  	 $this->db->where('end_date>=', date('Y-m-d'));
     $query = $this->db->get('tbl_coupons');
     $result = $query->result();
      /*echo $this->db->last_query();
     exit;*/
     return $result;
  }
  function coupon_code_data($cp_code)
  {
  	 $this->db->select('*');
  	 $this->db->where('coupon_code', $cp_code);
     $query = $this->db->get('tbl_coupons');
     $result = $query->row();
      /*echo $this->db->last_query();
     exit;*/
     return $result;
  }
  
  function getLastid()
    {
	   $this->db->select('max(id) as lastid');
	    $query = $this->db->get('tbl_invoice');
	    $result = $query->row();
	    /*echo $this->db->last_query();
	    exit;*/
	    return $result;
   }
   
  
  function add_time_wallet($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_time_wallet',$data);
	     return $this->db->insert_id();
		}
  }
  function edit_customer($data,$cust_code)
	{
		if(!empty($data))
		{
			 $this->db->where('cust_code',$cust_code);
             $this->db->update('tbl_customer', $data);
             //echo $this->db->last_query();exit;
			 return $this->db->affected_rows();
		}
	}
	function edit_invoice($data,$id)
	{
		if(!empty($data))
		{
			 $this->db->where('id',$id);
             $this->db->update('tbl_invoice', $data);
             //echo $this->db->last_query();exit;
			 return $this->db->affected_rows();
		}
	}
	
	function get_data_by_id($package_code)
  	{
	 $this->db->select('*');
	 $this->db->where('package_code', $package_code);
     $query = $this->db->get('tbl_package'); 
	 $result = $query->result();
	 /*echo $this->db->last_query();
	 exit;*/
	 return $result;
	}
	
	public function delete_row_data($package_code)
	  {
	  	  $data['status']=2;
		  $this->db->where('package_code', $package_code);
		  $this->db->update('tbl_package', $data);
		  
	  }
  	
  	
   function paypal_order_data($data)
  {
	 if(!empty($data))
		{
	     $this->db->insert('tbl_payment',$data);
	     /*echo $this->db->last_query();
	     exit;*/
	     return $this->db->insert_id();
		}
  }
  
 
  function delete_one_invoice($inv_no)
  {
	
     $this->db->where('invoice_no', $inv_no);
     $this->db->delete('tbl_invoice');
     $afftectedRows=$this->db->affected_rows();
     return $afftectedRows;
  }
  
  
  
  
  
}
