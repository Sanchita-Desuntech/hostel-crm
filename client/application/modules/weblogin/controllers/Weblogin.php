<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Weblogin extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Weblogin_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$customer_id = $this->session->userdata('customer_id');
        $data_get= $this->Weblogin_model->get_data($customer_id);

		$data['allweblogin_row']=$data_get;
	
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Weblogin | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('weblogin',$data);
	}
	
    /*================================ Add weblogin===========================*/	
	public function addweblogin()
	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
	        $data['email']=$this->input->post('email');
	        $data['website']=$this->input->post('website');
	        $data['password']=md5($this->input->post('password'));
	        
	        $data['created_by']= $this->session->userdata('user_code');
	        $data['customer_id']= $this->session->userdata('user_code');
	        
	        $data['status']= 0;
	        $data['created_on']=date('Y-m-d');
	        /*echo "<pre>";
	        print_r($data);
	        print_r($_FILES);
	        print_r($_POST);
			die("here");*/
	        
			$this->form_validation->set_rules('website', 'Website ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email ', 'trim|required');
            $this->form_validation->set_rules('password', 'Password ','required|min_length[8]|alpha_numeric', 'trim|required');
			
			if ($this->form_validation->run() == TRUE)
             {
             	$data_inserted = $this->Weblogin_model->add_weblogin($data);
                $this->session->set_flashdata('success_msg', 'Weblogin Added Successfully'); 
                redirect('client/weblogin');
             }
                
                    
             }
		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Weblogin | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addweblogin');

	}
	
/*================================ Edit weblogin===========================*/	
	
public function editweblogin($id)

    {
		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('client/weblogin');	

		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			/*print_r($_POST);
			die("here");*/
			$data['email']=$this->input->post('email');
	        $data['website']=$this->input->post('website');
	        
	        
	        $data['updated_on']=date('Y-m-d H:i:s');
	        $data['updated_by']= $this->session->userdata('user_code');
	        /*echo "<pre>";
	        print_r($data);
	        print_r($_FILES);
	        print_r($_POST);
			die("here");*/
	        
			$this->form_validation->set_rules('website', 'Website ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email ', 'trim|required');
            
			
				if ($this->form_validation->run() == TRUE)
				{
					$data_updated = $this->Weblogin_model->edit_weblogin($data,$id);
	                $this->session->set_flashdata('success_msg', 'Weblogin Edited Successfully'); 
	                redirect('client/weblogin');
				}
                
                    
             }

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Weblogin | '.$site_name);

		$data_single = $this->Weblogin_model->get_data_by_id($id);

		$data['allweblogindata_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editweblogin',$data);

    }
	
/*================================ Delete Data ===========================*/	
	
/*public function delete_data($dataid)
    {
        $this->Task_model->delete_row_data($dataid);
		redirect('client/task');
        exit;
    }
	
	


    public function inactive($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_activated = $this->Task_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Task Edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


    public function active($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_activated = $this->Task_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Task Edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }
    public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '1';
               $data_inserted = $this->Employee_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Employee edited Successfully'); 
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
               $data_inserted = $this->Employee_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Employee edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }*/

    
         
    
}
