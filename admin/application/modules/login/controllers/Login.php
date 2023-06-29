<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('login_model');
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_error_delimiters("<span class='error_text'>", "</span>");
            $this->form_validation->set_message('alpha_space', 'Some strange character present in user name');
            $this->form_validation->set_rules('username', 'username', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run()) {
                if ($this->login_model->validate()) {

                    redirect('admin/home');


                    // $current_user_type = $this->session->userdata('user_type');

                    // if($current_user_type == USER_ADMIN || $current_user_type == USER_SUPERVISOR || $current_user_type == USER_EMPLOYEES) {

                    // }

                    // if ($this->session->userdata('user_type') == '4') {
                    //     redirect('admin/home');
                    // } elseif ($this->session->userdata('user_type') == '3') {
                    //     redirect('admin/supervisorr');
                    // } elseif ($this->session->userdata('user_type') == '2') {
                    //     $this->session->set_flashdata('error_login', "<span class='login_error_text_final'>You need to login from client login</span>");
                    //     redirect('admin/login');
                    // } elseif ($this->session->userdata('user_type') == '1') {
                    //     redirect('admin/employeee');
                    // }
                } else {
                    $this->session->set_flashdata('error_login', "<span class='login_error_text_final'>The username or password you have entered is incorrect. Please try using another email id or usercode.</span>");
                    redirect('admin/login');
                }
            }
        }

        $this->template->title('Clirnet', 'Clirnet');
        $this->template->set('metaDesc', 'Clirnet');
        $this->template->set('metaKeyword', 'Clirnet');
        $this->template->set_layout('layout_login', 'front');
        $this->template->build('login', []);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/login');
    }
}
