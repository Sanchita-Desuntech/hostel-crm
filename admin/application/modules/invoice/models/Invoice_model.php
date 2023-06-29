<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Invoice_model extends CI_Model
{
	function get_data()
	{
		$this->db->select('tbl_invoice.*,tbl_customer.full_name as customer_name,tbl_package.package_name as pck_name');
		$this->db->from('tbl_invoice');
		$this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_invoice.customer_code', 'left');
		$this->db->join('tbl_package', 'tbl_package.package_code = tbl_invoice.package_code', 'left');
		$this->db->order_by('tbl_invoice.id', 'asc');
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

			if ($this->db->insert('tbl_cust_invoice', $data)) {
				//$this->db->insert_id();
				$response = [
					'success' => true,
					'message' => $this->db->insert_id(),
				];
				return $response;
			}
			$response = [
				'success' => false,
				'message' => $this->db->_error_message(),
			];
			return $response;
			//echo $this->db->last_query(); exit;
		}
	}
}
