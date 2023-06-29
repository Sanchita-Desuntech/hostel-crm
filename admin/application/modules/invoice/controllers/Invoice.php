<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Invoice extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();     //common function for session checking.

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Invoice_model');
    }

    //===================================================================

    public function index()
    {
        $data_get = $this->Invoice_model->get_data();
        //echo $this->db->last_query();die();
        $data['allinvoice_row'] = $data_get;
        //print_r($data_get);exit;
        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Invoice | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('invoice', $data);
    }

    /*================================ Add Invoice===========================*/

    public function addinvoice()

    {
        $data_class['customer'] = $this->Invoice_model->get_customer();
        $data_class['service'] = $this->Invoice_model->get_service();

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
                $data['create_date'] = date('Y-m-d H:i:s');

                $data_inserted = $this->Invoice_model->add_data($data);

                /* echo "<pre>";
                print_r($data_inserted);
                die; */

                if ($data_inserted['success'] == true) {
                    $this->session->set_flashdata('success_msg', 'Data added Successfully');
                    redirect('admin/invoice');
                } else {
                    $this->session->set_flashdata('err_msg', $data_inserted['message']);
                }
            }
        }

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Add Invoice | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addinvoice', $data_class);
    }
    /*================================ Edit ===========================*/

    public function editinvoice($invoice_code)

    {
        $data_class['customer'] = $this->Invoice_model->get_customer();
        $data_class['service'] = $this->Invoice_model->get_service();

        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('admin/invoice/invoice');
        }

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
                $data['create_date'] = date('Y-m-d H:i:s');

                $data_updated = $this->Invoice_model->edit_data($data, $invoice_code);
                $this->session->set_flashdata('success_msg', 'Invoice edited Successfully');
                // redirect('admin/invoice'); 
            }
        }




        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Edit invoice | ' . $site_name);

        $data_single = $this->Invoice_model->get_data_by_id($invoice_code);

        $data_class['allinvoice_row'] = $data_single;

        //print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editinvoice', $data_class);
    }







    public function unpaid($invoice_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '0';
            $data_activated = $this->Invoice_model->edit_data($data, $invoice_code);
            $this->session->set_flashdata('success_msg', 'customer edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function paid($invoice_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '1';
            $data_activated = $this->Invoice_model->edit_data($data, $invoice_code);
            $this->session->set_flashdata('success_msg', 'customer edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    /*public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '1';
               $data_inserted = $this->Invoice_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'customer edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function normal($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '0';
               $data_inserted = $this->Invoice_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'customer edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }*/
}
