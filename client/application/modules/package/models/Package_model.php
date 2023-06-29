<?php 
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Package_model extends CI_Model
{
	
	/**
	 * Get package by id
	 * 
	 * @param int $package_id
	 */
	public function getPackageById($package_id)
	{
		$sql = "SELECT * FROM tbl_package WHERE id = ?";

		return $this->db->query($sql, [$package_id])->row_array();
	}

	/**
	 * Get plan list for different months
	 * 
	 * @param int $package_id
	 * @param string $currency_code
	 */
	public function getCheckoutPlanInfo($package_id, $currency_code)
	{
		$periods = [
			1,
			3,
			6,
			12
		];

		// find plan
		$sql = "SELECT * FROM tbl_package WHERE id = ?";
		$package = $this->db->query($sql, [$package_id])->row();

		// find currency rate
		$sql = "SELECT * FROM tbl_currency_master WHERE currency_code = ?";
		$currency = $this->db->query($sql, [$currency_code])->row();

		$plan_info = [];
		foreach( $periods as $period ) {
			$data = [];
			$data['period_length'] = $period;
			$data['period_length_in_text'] = $period . ' month';
			
			$plan_amount = round(floatval($package->package_price) / floatval($currency->currency_value)) * $period;
			$data['plan_amount_in_text'] = strtoupper($currency->currency_code) . ' ' . $plan_amount . '/MO';

			$plan_info[] = $data;
		}

		return $plan_info;
	}

	/**
	 * Get available currency
	 * 
	 * @return array
	 */
	public function getAvailableCurrency()
	{
		// find currency rate
		$sql = "SELECT * FROM tbl_currency_master ORDER BY currency_code ASC";
		return $this->db->query($sql)->result();
	}

	/**
	 * Get all active packages
	 * 
	 * @return array
	 */
	public function getActivePackagesByCurrency($currency="AUD")
	{
		$sql = "SELECT * 
		FROM tbl_package 
		WHERE deleted_at IS NULL";

		$packages = $this->db->query($sql)->result();

		// find currency rate
		$sql = "SELECT * FROM tbl_currency_master WHERE currency_code = ?";
		$currencyData = $this->db->query($sql, [$currency])->row();

		foreach($packages as $package) {
			$package->currency = $currencyData->currency_code;
			$package->package_amount = round(floatval($package->package_price) / floatval($currencyData->currency_value));
		}

		return $packages;
	}

	public function get_paypal_payment()
	{
		$this->db->select('*');
		$query = $this->db->get('tbl_paypal');
		$result = $query->result();
		
		return $result;
	}

	function coupon_data()
	{
		$this->db->select('*');
		$this->db->where('is_active', 1);
		$this->db->where('end_date>=', date('Y-m-d'));
		$query = $this->db->get('tbl_coupons');
		$result = $query->result();
	
		return $result;
	}
	function coupon_code_data($cp_code)
	{
		$this->db->select('*');
		$this->db->where('coupon_code', $cp_code);
		$query = $this->db->get('tbl_coupons');
		$result = $query->row();
	
		return $result;
	}

	function getLastid()
	{
		$this->db->select('max(id) as lastid');
		$query = $this->db->get('tbl_package');
		$result = $query->row();
		
		return $result;
	}


	function add_time_wallet($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_time_wallet', $data);
			return $this->db->insert_id();
		}
	}

	function edit_customer($data, $cust_code)
	{
		if (!empty($data)) {
			$this->db->where('cust_code', $cust_code);
			$this->db->update('tbl_customer', $data);
			
			return $this->db->affected_rows();
		}
	}

	function get_data_by_id($package_code)
	{
		$this->db->select('*');
		$this->db->where('package_code', $package_code);
		$query = $this->db->get('tbl_package');
		$result = $query->result();
		
		return $result;
	}

	public function delete_row_data($package_code)
	{
		$data['status'] = 2;
		$this->db->where('package_code', $package_code);
		$this->db->update('tbl_package', $data);
	}


	function paypal_order_data($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_payment', $data);
		
			return $this->db->insert_id();
		}
	}

	function coupon_type($customer_code, $coupon_code)
	{
		$this->db->select('*');
		$this->db->where('customer_code', $customer_code);
		$this->db->where('coupon_code', $coupon_code);
		$query = $this->db->get('tbl_invoice');
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
}
