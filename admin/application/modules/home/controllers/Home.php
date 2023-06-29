<?php 
if (!defined('BASEPATH')) {

    exit('No direct script access allowed');
}

class Home extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();     //common function for session checking.

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Home_model');

        // echo '<pre>';
        // print_r($_SESSION);
        // die;

        // $action = $this->uri->rsegment(2);

        // if( $action == 'index' ) {
        //     if(has_user_permission('view.dashboard')) {
        //         echo 'You have no permission to view the page';
        //         die;
        //     }
        // }

        // $this->session->set_flashdata('permission_error', 'Dev on fire');
    }

    //===================================================================
    public function index()
    {
        $data_get = $this->Home_model->get_data();
        $data_get_urgent_task = $this->Home_model->get_urgent_task_data();

        $data['alltask_row'] = $data_get;
        $data['allurgenttask_row'] = $data_get_urgent_task;

        $this->template->set('title', 'Home');

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('home', $data);
    }
}
