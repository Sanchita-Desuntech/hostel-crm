<?php if (! defined('BASEPATH'))
 {    
exit('No direct script access allowed');
}
class Settings extends MX_Controller
{   
 public function __construct()    
 {		
 parent::__construct();		
is_logged_in(); 	//common function for session checking.		
$this->load->library('form_validation');		
$this->load->model('Settings_model');    }
//===================================================================    
public function index()    
{    	
   
    
    if($this->input->server('REQUEST_METHOD') == 'POST'){
    	extract($_POST);
    	/*echo "<pre>";
    	print_r($_POST);die();*/
    	$data['send_new_reg_and_chat_trans_email']= ucwords(strip_tags($this->input->post('send_new_reg_and_chat_trans_email')));
    	$data['payment_and_paypal_email']= ucwords(strip_tags($this->input->post('payment_and_paypal_email')));
    	$data['new_task_email']= ucwords(strip_tags($this->input->post('new_task_email')));
    	$data['paypal_secret_key']= ucwords(strip_tags($this->input->post('paypal_secret_key')));
    	$data['paypal_business_email']= ucwords(strip_tags($this->input->post('paypal_business_email')));
    	$data['paypal_business_name']= ucwords(strip_tags($this->input->post('paypal_business_name')));
    	$data['paypal_url']= ucwords(strip_tags($this->input->post('paypal_url')));
    	$data['paypal_status']= ucwords(strip_tags($this->input->post('paypal_status')));
    	$data['currency_code']= ucwords(strip_tags($this->input->post('currency_code')));
    	
    			$data_update = $this->Settings_model->update_data($data);
                if($data_update){
                	$this->session->set_flashdata('success_msg', 'Settings updated successfully'); 
                	redirect('admin/settings');
                }else{
                	$this->session->set_flashdata('err_msg', 'Settings update failed'); 
                	redirect('admin/settings');
                }

    }
    
    $data_settings = $this->Settings_model->get_data();
    $data['settings'] = $data_settings;
    $this->template->set('title','Setting  | '.$this->config->item('site_name'));    
        $this->template->set_layout('layout_main', 'front');        
        $this->template->build('settings',$data);
        	}
      }