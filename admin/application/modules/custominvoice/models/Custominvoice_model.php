<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Custominvoice_model extends CI_Model
{
	function get_data()
	{
		$this->db->select('tbl_cust_invoice.*,tbl_customer.full_name as customer_name,tbl_service.service_name as ser_name,tbl_users.full_name as created_by_name');
		$this->db->from('tbl_cust_invoice');
		$this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_cust_invoice.customer_name', 'left');
		$this->db->join('tbl_users', 'tbl_users.user_code = tbl_cust_invoice.created_by', 'left');
		$this->db->join('tbl_service', 'tbl_service.service_id = tbl_cust_invoice.service_code', 'left');
		$this->db->order_by('tbl_cust_invoice.id', 'asc');
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();die();
		return $result;
	}

	function get_data_to_print($id)
	{
		$this->db->select('tbl_cust_invoice.*,tbl_customer.full_name as customer_name,tbl_service.service_name as ser_name,tbl_users.full_name as created_by_name');
		$this->db->from('tbl_cust_invoice');
		$this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_cust_invoice.customer_name', 'left');
		$this->db->join('tbl_users', 'tbl_users.user_code = tbl_cust_invoice.created_by', 'left');
		$this->db->join('tbl_service', 'tbl_service.service_id = tbl_cust_invoice.service_code', 'left');
		$this->db->where('tbl_cust_invoice.id=', $id);
		$query = $this->db->get();
		$result = $query->result();
		//echo $this->db->last_query();die();
		return $result;
	}


	function get_customer()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_customer');
		$result = $query->result();
		//echo $this->db->last_query();die();
		return $result;
	}

	function get_service()
	{
		$this->db->select('*');
		$this->db->where('ser_status!=', 2);
		$query = $this->db->get('tbl_service');
		$result = $query->result();
		//echo $this->db->last_query();die();
		return $result;
	}


	function edit_data($data, $invoice_code)
	{
		if (!empty($data)) {
			$this->db->where('invoice_code', $invoice_code);
			$this->db->update('tbl_cust_invoice', $data);
			//echo $this->db->last_query();exit;
			return $this->db->affected_rows();
		}
	}


	function get_data_by_id($invoice_code)
	{
		$this->db->select('*');
		$this->db->where('invoice_code', $invoice_code);
		$query = $this->db->get('tbl_cust_invoice');
		$result = $query->result();
		//echo $this->db->last_query();die();
		return $result;
	}

	function add_data($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_cust_invoice', $data);
			//echo $this->db->last_query(); exit;
			return $this->db->insert_id();
		}
	}
}
