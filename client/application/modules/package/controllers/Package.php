<?php
if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Package extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Package_model');
	}

	//===================================================================

	public function index()
	{
		$availableCurrency = $this->Package_model->getAvailableCurrency();
		$default_currency = $availableCurrency[0]->currency_code;


		if (isset($_GET['currency_code']) && !empty($_GET['currency_code'] != '')) {
			$default_currency = $_GET['currency_code'];
		}

		$_SESSION['customer_choosen_currency_code'] = $default_currency;

		$data['packages'] = $this->Package_model->getActivePackagesByCurrency($default_currency);
		$data['availableCurrency'] =  $availableCurrency;
		$data['selectedCurrency'] = $default_currency;

		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Package | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('package', $data);
	}

	public function checkout()
	{
		$package_id = $this->input->get('package_id');

		$data = [];
		$data['plan_info'] = $this->Package_model->getCheckoutPlanInfo($package_id, $_SESSION['customer_choosen_currency_code']);
		$data['package_info'] =  $this->Package_model->getPackageById($package_id);
		$data['package_id'] = $package_id;

		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Checkout | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('checkout', $data);
	}

	/*================================ Add Package===========================*/

	public function get_discount()
	{
		extract($_POST);
		$coupon_data = $this->Package_model->coupon_code_data($coupon_code);
		// print_r($coupon_data);
		$min_cart_value = $coupon_data->min_cart_value;
		$max_cart_value = $coupon_data->max_cart_value;
		$cust_code = $this->session->userdata('user_code');
		$previously_coupon_use = $this->Package_model->coupon_type($cust_code, $coupon_code);
		// echo $coupon_data->redemption;
		// echo $this->db->last_query();die("here");
		///echo $previously_coupon_use;
		if ($coupon_data->redemption == 'one_time') {
			if (!$previously_coupon_use) {
				if ($coupon_data->dis_type == 'Discount') {
					if ($price >= $min_cart_value && $price <= $max_cart_value) {
						$discount = $coupon_data->discount_amount / 100;
						$total_discount_amount = $discount * $price;
						//$array['discount'] = $coupon_data->discount_amount;
						$array['net_price'] = $price - $total_discount_amount;
						$array['coupon_type'] = 'Discount';
						$array['net_hours'] = $hours;

						$this->output
							->set_content_type('application/json')
							->set_output(json_encode($array));
					} else {
						echo "nodiscount";
					}
				} else {
					if ($price >= $min_cart_value && $price <= $max_cart_value) {
						$coupon_hours = $coupon_data->time_add;
						$array['net_hours'] = $hours + $coupon_hours;
						$array['coupon_type'] = 'Time';
						$array['net_price'] = $price;

						$this->output
							->set_content_type('application/json')
							->set_output(json_encode($array));
					} else {
						echo "notime";
					}
				}
			} else {
				echo "noapply";
			}
		} else {
			if ($coupon_data->dis_type == 'Discount') {
				if ($price >= $min_cart_value && $price <= $max_cart_value) {
					$discount = $coupon_data->discount_amount / 100;
					$total_discount_amount = $discount * $price;
					//$array['discount'] = $coupon_data->discount_amount;
					$array['net_price'] = $price - $total_discount_amount;
					$array['coupon_type'] = 'Discount';
					$array['net_hours'] = $hours;

					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($array));
				} else {
					echo "nodiscount";
				}
			} else {
				if ($price >= $min_cart_value && $price <= $max_cart_value) {
					$coupon_hours = $coupon_data->time_add;
					$array['net_hours'] = $hours + $coupon_hours;
					$array['coupon_type'] = 'Time';
					$array['net_price'] = $price;

					$this->output
						->set_content_type('application/json')
						->set_output(json_encode($array));
				} else {
					echo "notime";
				}
			}
		}
	}

	/*================================ Edit ===========================*/

	public function paypal_return()
	{
		$cust_code = $this->session->userdata('user_code');
		$data_get = $this->Package_model->get_data();

		if ($this->uri->segment(3) == "") {

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

			redirect('client/package');
		}

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$data['time_wallet'] = $data_get[0]->package_hours;
			$trans_code = 'TRANS' . rand(00000, 99999);
			$data_time_wallet['trans_id'] = $trans_code;
			$data_time_wallet['hours'] = $data_get[0]->package_hours;
			$data_time_wallet['purpose'] = 'Credited';
			$data_time_wallet['cus_id'] = $cust_code;
			$data_time_wallet['create_time'] = date('Y-m-d');

			$this->form_validation->set_rules('time_wallet', 'Time Wallet ', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$data_updated = $this->Package_model->edit_customer($data, $cust_code);
				$data_added = $this->Package_model->add_time_wallet($data_time_wallet);
				//$this->session->set_flashdata('success_msg', 'Contact Edited Successfully'); 
				redirect('client/return');
			}
		}

		$this->template->set_layout('layout_main', 'front');
		$this->template->build('return', $data_get);
	}

	public function paypal_cancel()
	{


		$this->template->set_layout('layout_main', 'front');
		$this->template->build('cancel');
	}
}
