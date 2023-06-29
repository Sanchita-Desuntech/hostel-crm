<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Payment_model extends CI_Model
{
	/**
	 * Init payments
	 */
	public function initPayment($data)
	{
		if( $data['payment_gateway_provider'] == 'CHECKOUT USING STRIPE' ) {
			$this->initStripePayment($data);
		} else {
			$this->initPayPalPayPayment($data);
		}
	}

	/**
	 * Init stripe payments
	 * 
	 * @param array $data
	 */
	private function initStripePayment($data)
	{
		$customer_choosen_currency_code = $_SESSION['customer_choosen_currency_code'];

		// find package
		$sql = "SELECT * FROM tbl_package WHERE id = ?";
		$package =  $this->db->query($sql, [$data['package_id']])->row();

		// find currency rate
		$sql = "SELECT * FROM tbl_currency_master WHERE currency_code = ?";
		$currency = $this->db->query($sql, [$customer_choosen_currency_code])->row();

		$plan_amount = round(floatval($package->package_price) / floatval($currency->currency_value)) * intval($data['plan_duration']);

		$data['plan_amount'] = $plan_amount;
		$data['plan_currency'] = $customer_choosen_currency_code;
		$data['payment_gateway'] = 'stripe';
		
		$plan_info = $this->createPlan($data);

		$stripe = new \Stripe\StripeClient($_ENV['STRIPE_SECRET_KEY']);

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [
				[
					'price_data' => [
						'currency' => strtolower($customer_choosen_currency_code),
						'product_data' => [
							'name' => $package->package_name,
						],
						'unit_amount' => $plan_amount * 100,
					],
					'quantity' => 1
				]
            ],
			
            'mode' => 'payment',
            'success_url' => base_url('client/payment/stripesuccess'),
            'cancel_url' => base_url('client/payment/stripecancel'),
			'payment_intent_data' => [
				'metadata' => [
					'invoice_id' => $plan_info['invoice_id'],
					'plan_id'    => $plan_info['plan_id']
				],
			]
        ]);
        header("HTTP/1.1 303 See Other");
        header("Location: " . $checkout_session->url);
	}

	private function initPayPalPayPayment($data)
	{

	}

	/**
	 * Create a new plan
	 * 
	 * @param array $data
	 */
	private function createPlan($data)
	{
		$this->db->trans_start();

		// find package
		$sql = "SELECT * FROM tbl_package WHERE id = ?";
		$package =  $this->db->query($sql, [$data['package_id']])->row();

		$plan_data = [
			'customer_id' => $_SESSION['user_id'],
			'plan_id' 	=> $data['package_id'],
			'plan_name' => $package->package_name,
			'plan_duration' => $data['plan_duration'],
			'plan_amount' 	=> $data['plan_amount'],
			'plan_currency' => $data['plan_currency'],
		];

		$this->db->insert('tbl_customer_plan', $plan_data);

		$plan_id = $this->db->insert_id();

		$_SESSION['current_session_plan_id'] = $plan_id;

		$sql = "SELECT IFNULL( MAX(id), 0) AS total FROM tbl_cust_invoice";
		$lastRow = $this->db->query($sql)->row();

		$lastRow = intval($lastRow->total) + 1;
		$invoice_code = 'INV-'. str_pad($lastRow, 6, STR_PAD_LEFT);

		$invoice_data = [
			'inv_status' => 'unpaid',
			'customer_plan_id' => $plan_id,
			'invoice_code' => $invoice_code,
			'customer_id' => $_SESSION['user_id'],
			'descripton' => $package->package_desp,
			'amount' =>  $data['plan_amount'],
			'payment_gateway' => $data['payment_gateway'],
			'payment_currency' => $data['plan_currency'],
			'inv_date' => date('Y-m-d'),
			'created_by' => $_SESSION['user_id']
		];

		$this->db->insert('tbl_cust_invoice', $invoice_data);

		$invoice_id = $this->db->insert_id();

		$_SESSION['current_session_invoice_id'] = $invoice_id;

		$this->db->trans_complete();

		return [
			'invoice_id' => $invoice_id,
			'plan_id' => $plan_id
		];
	}

	function get_data($cust_code)
	{
		$this->db->select('*');
		$this->db->where('customer_code', $cust_code);
		$query = $this->db->get('tbl_payment');
		$result = $query->result();
		
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


	function edit_data($data, $id)
	{
		if (!empty($data)) {
			$this->db->where('id', $id);
			$this->db->update('tbl_payment', $data);
			//echo $this->db->last_query();die();
			return $this->db->affected_rows();
		}
	}

	public function delete_row_data($id)
	{
		$data['ser_status'] = 2;
		$this->db->where('id', $id);
		$this->db->update('tbl_service', $data);
	}
}
