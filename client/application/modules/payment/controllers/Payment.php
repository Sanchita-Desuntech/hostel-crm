<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Payment extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Payment_model');
    }

    public function init()
    {
        $data = [
            'package_id' => $this->input->post('package_id'),
            'plan_duration' =>   $this->input->post('planItem'),
            'upgrade_status' => $this->input->post('upgrade_status'),
            'payment_gateway_provider' => $this->input->post('payment_gateway_provider')
        ];

        $this->Payment_model->initPayment($data); 
    }

    public function stripesuccess()
    {
        $site_name = $this->config->item('site_name');
		$this->template->set('title', 'Payment Success | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('stripesuccess');
    }

    public function stripecancel()
    {
        $site_name = $this->config->item('site_name');
		$this->template->set('title', 'Payment Success | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('stripecancel');
    }


    //===================================================================

    public function index()
    {
        $cust_code = $this->session->userdata('user_code');
        $data_get = $this->Payment_model->get_data($cust_code);
        //echo $this->db->last_query();die();
        $data['allpayment_row'] = $data_get;
        //print_r($data_get);exit;
        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Payment | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('payment', $data);
    }

    /*==========================Edit Service============================================*/

    public function viewpayment($id)

    {
        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('client/payment');
        }

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'View Payment | ' . $site_name);

        $data_single = $this->Payment_model->get_data_by_id($id);

        $data['allpayment_row'] = $data_single;

        //print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewpayment', $data);
    }
}
