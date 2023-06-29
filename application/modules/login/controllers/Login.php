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
        $this->load->model('Login_model');
    }
    
    public function index()
    { 
        //is_logged_in_profile(); //common function for session checking.
        //$this->form_validation->set_message('required', 'Please fill this field');
         if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
            	/*print_r($_POST);
            	die("here");*/
                $this->form_validation->set_error_delimiters("<span class='error_text'>", "</span>");
		        $this->form_validation->set_message('alpha_space', 'Some strange character present in user name');
		        $this->form_validation->set_rules('username', 'Username', 'trim|required');
		        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		        if ($this->form_validation->run() == true) {
		             if ($row = $this->Login_model->validate()) {
		                if($row->is_email_verified=='1'){
		                     $data = array(
		            'user_code'         => $row->user_code, 
		            'user_type'         => $row->user_type, 
		            'email'             => $row->email,         
		            'mobile'            => $row->mobile,
		            'user_name'         => $row->email,
		            'full_name'         => $row->full_name,
		            'is_front_logged_in'      => true,
		            );
		            $this->session->set_userdata($data);
		                redirect('home');
		            }else{
		                $this->session->set_flashdata('error_login', "Your email is not verified.Please verify your email before login.");
		                redirect('login');
		            }
		               
		            } else {
		                
		                $this->session->set_flashdata('error_login', "The username or password you have entered is incorrect.");
		                redirect('login');
		            }
            
        		}
            }
       
        $data['pages_data'] = $this->Login_model->get_sng_pages_data();
        //print_r($data['pages_data']);die("here");
        $meta_title = $data['pages_data'][0]->meta_title ;
        //echo $meta_title;die("here");
        $meta_keyword = $data['pages_data'][0]->meta_keyword ;
        $meta_descrip  = $data['pages_data'][0]->meta_descrip  ;
        $canonical_tag  = $data['pages_data'][0]->canonical_tag  ;
        $robot_index  = $data['pages_data'][0]->robot_index  ;
        $robotindex  = $data['pages_data'][0]->robotindex  ;

        $this->template->set('title',$meta_title);
        $this->template->set('MetaKeyword',$meta_keyword );
        $this->template->set('MetaDescription',$meta_descrip );
        $this->template->set('CanonicalTag',$canonical_tag );
        $this->template->set('RobotIndex',$robot_index );
        $this->template->set('MainIndex',$robotindex );
        
            $this->template->set_layout('layout_main', 'front');
            $this->template->build('login', $data);
    }
    
    #########################################+-
    #######################################
    //logout all server session for tesing
    ################################################################################
    public function logout()
    {
       
        $this->session->sess_destroy();
        //$this->index();
        redirect('login');
    }
    ################################################################################
    //logout all server session for tesing
    ################################################################################
   
    
    
    
    
    
    
}
