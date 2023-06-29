<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Package extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();     //common function for session checking.

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Package_model');
    }

    //===================================================================

    public function index()
    {
        $data_get = $this->Package_model->get_data();
       
        $data['allpackage_row'] = $data_get;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Package | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('package', $data);
    }

    /*================================ Add Package===========================*/


    public function addpackage()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
           
            $this->form_validation->set_rules('package_name', 'Package Name', 'trim|required');
            $this->form_validation->set_rules('package_hours', 'Package Hours', 'trim|required');
            $this->form_validation->set_rules('package_price', 'Package Price', 'trim|required');

            if ($this->form_validation->run()) {


                $lastid = $this->Package_model->getLastid();
                $packcode = 'PACK' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                $data['package_code'] = $packcode;
    
                $data['package_name'] = ucwords($this->input->post('package_name'));
    
                $data['package_desp'] = $this->input->post('package_desp');
                $data['package_hours'] = $this->input->post('package_hours');
                $data['package_price'] = $this->input->post('package_price');
                $data['created_on'] = date('Y-m-d');
                $data['updated_on'] = date('Y-m-d H:i:s');
    
                $data['status'] = strip_tags($this->input->post('status'));

                $this->Package_model->add_data($data);
                $this->session->set_flashdata('success_msg', 'Package Added Successfully');

                redirect('admin/package/package');
            }
        }

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Add Package | ' . $site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addpackage');
    }

    /*================================ Edit ===========================*/

    public function editpackage($package_code)

    {

        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('admin/package/package');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('package_name', 'Package Name', 'trim|required');
            $this->form_validation->set_rules('package_hours', 'Package Hours', 'trim|required');
            $this->form_validation->set_rules('package_price', 'Package Price', 'trim|required');

            if ($this->form_validation->run()) {

                $data['package_name'] = ucwords($this->input->post('package_name'));
                $data['package_desp'] = $this->input->post('package_desp');
                $data['package_hours'] = $this->input->post('package_hours');
                $data['package_price'] = $this->input->post('package_price');
                $data['status'] = $this->input->post('status');

                $this->Package_model->edit_data($data, $package_code);

                $this->session->set_flashdata('success_msg', 'Package Edited Successfully');

                redirect('admin/package/package');
            }
        }






        $data_single = $this->Package_model->get_data_by_id($package_code);

        $data['allpackage_row'] = $data_single;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Edit Package | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editpackage', $data);
    }



    /*================================ Delete Package===========================*/



    public function delete_data($package_code)
    {
        $this->Package_model->delete_row_data($package_code);
        redirect('admin/package/package');
    }

    public function inactive($package_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '0';
            $data_activated = $this->Package_model->edit_data($data, $package_code);
            $this->session->set_flashdata('success_msg', 'Package Edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function active($package_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '1';
            $data_activated = $this->Package_model->edit_data($data, $package_code);
            $this->session->set_flashdata('success_msg', 'Package Edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
