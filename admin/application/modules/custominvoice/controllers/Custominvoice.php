<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
class Custominvoice extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in(); 	//common function for session checking.

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Custominvoice_model');
	}

	//===================================================================

	public function index()
	{
		$data_get = $this->Custominvoice_model->get_data();
		//echo $this->db->last_query();die();
		$data['allinvoice_row'] = $data_get;
		//print_r($data_get);exit;
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Invoice | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('custominvoice', $data);
	}

	/*================================ Add Invoice===========================*/

	public function addcustominvoice()

	{
		$data_class['customer'] = $this->Custominvoice_model->get_customer();
		$data_class['service'] = $this->Custominvoice_model->get_service();

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('inv_descrp', 'Description', 'required');

			if ($this->form_validation->run() == TRUE) {
				$invoicecode = 'INV' . rand(111, 999) . date('m') . date('y');
				$data['invoice_code'] = $invoicecode;

				$trans_id = 'TRANS' . rand(11111, 99999);
				$data['trans_code'] = $trans_id;
				$data['service_code'] = $this->input->post('service_code');
				$data['customer_name'] = $this->input->post('customer_name');
				$data['inv_date'] = $this->input->post('inv_date');
				$data['status'] = $this->input->post('status');
				$data['amount'] = $this->input->post('amount');
				$data['inv_descrp'] = $this->input->post('inv_descrp');
				$data['payment_method'] = $this->input->post('pay_method');
				$data['create_date'] = date('Y-m-d H:i:s');
				$data['created_by']  = $this->session->userdata('user_code');

				$data_inserted = $this->Custominvoice_model->add_data($data);
				$this->session->set_flashdata('success_msg', 'Data added Successfully');
				redirect('admin/custominvoice');
			}
		}

		$site_name = $this->config->item('site_name');

		$this->template->set('title', 'Add Custom Invoice | ' . $site_name);

		$this->template->set_layout('layout_main', 'front');

		$this->template->build('addcustominvoice', $data_class);
	}

	public function customprint($id)
	{
		$data_get = $this->Custominvoice_model->get_data_to_print($id);
		//echo $this->db->last_query();die();
		$data['printing_data'] = $data_get;
		//print_r($data_get);exit;
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Print Invoice | ' . $site_name);
		$this->template->set_layout('layout_print', 'front');
		$this->template->build('invprint', $data);
	}
}
