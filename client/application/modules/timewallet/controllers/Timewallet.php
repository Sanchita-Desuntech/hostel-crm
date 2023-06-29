<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Timewallet extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Timewallet_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$cust_code=$this->session->userdata('user_code');
    	//echo $cust_code; 
        $data_get= $this->Timewallet_model->get_data($cust_code);
        //echo $this->db->last_query();die();
		$data['alltimewallet_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Time Wallet | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('timewallet',$data);
	}
    
}
