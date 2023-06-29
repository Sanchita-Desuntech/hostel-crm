<?php if (! defined('BASEPATH')) {
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
            $this->form_validation->set_rules('email', 'email', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if ($this->form_validation->run()) {
                try {
                    $data = [
                        'email' => $this->input->post('email'),
                        'password' => $this->input->post('password')
                    ];
                    $this->login_model->initSession($data);
                    redirect('client/home');
                } catch( \Exception $e ) {
                    $this->session->set_flashdata('error_login', "<span class='login_error_text_final'>". $e->getMessage() ."</span>");
                    redirect('client/login');
                }
            }
        }

        $this->template->title('Client', 'Client');
        $this->template->set('metaDesc', 'Client');
        $this->template->set('metaKeyword', 'Client');
        $this->template->set_layout('layout_login', 'front');
        $this->template->build('login', []);
    }
    
    ################################################################################
    //logout all server session for tesing
    ################################################################################
    public function logout()
    {
       
        $this->session->sess_destroy();
        //$this->index();
        redirect('client/login');
    }
    ################################################################################
    //logout all server session for tesing
    ################################################################################
   
    
    
    
    
    
    
}
