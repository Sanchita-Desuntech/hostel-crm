<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Currency extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Currency_Model');
    }

    public function index()
    {
		$data['currency_list'] =  $this->Currency_Model->getCurrencyList();

        $this->template->set('title','Coupon  | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('list', $data);
    }

    public function create()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
            $this->form_validation->set_rules('currency_code', 'Currency Code', 'trim|required');
            $this->form_validation->set_rules('currency_value_wrt_inr', 'Currency Value', 'trim|required');
            
            if ($this->form_validation->run()) {

                $data = [
                    'currency_name' => $this->input->post('currency_name'),
                    'currency_code' => $this->input->post('currency_code'),
                    'currency_value_wrt_inr' => $this->input->post('currency_value_wrt_inr'),
                ];

                $this->Currency_Model->addCurrency($data);
                $this->session->set_flashdata('success_msg', 'Currency Added Successfully'); 
                redirect('admin/currency');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Add Currency | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('create');
    }

    public function edit($id)
    {
        $currency = $this->Currency_Model->findCurrencyById($id);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('currency_name', 'Currency Name', 'trim|required');
            $this->form_validation->set_rules('currency_code', 'Currency Code', 'trim|required');
            $this->form_validation->set_rules('currency_value_wrt_inr', 'Currency Value', 'trim|required');
            
            if ($this->form_validation->run()) {
                $data = [
                    'currency_name' => $this->input->post('currency_name'),
                    'currency_code' => $this->input->post('currency_code'),
                    'currency_value_wrt_inr' => $this->input->post('currency_value_wrt_inr'),
                ];

                $this->Currency_Model->updateCurrency($data, $id);
                $this->session->set_flashdata('success_msg', 'Currency Updated Successfully'); 
                redirect('admin/currency');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Add Currency | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edit', [
            'currency' => $currency
        ]);
    }

    public function delete($id)
    {
        $this->Currency_Model->deleteCurrency($id);
        $this->session->set_flashdata('success_msg', 'Currency Deleted Successfully'); 
        redirect('admin/currency');
    }
}