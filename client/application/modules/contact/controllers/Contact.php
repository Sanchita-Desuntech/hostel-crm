<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Contact_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$cust_code=$this->session->userdata('user_code');
    	//echo $cust_code; 
        $data_get= $this->Contact_model->get_data($cust_code);
        //echo $this->db->last_query();die();
		$data['allcontact_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Contact | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('contact',$data);
	}
	
/*================================ Add Contact===========================*/	

	public function addcontact()

	{
		
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
	        $data['name']= ucwords(strip_tags($this->input->post('name'))) ;
	        $data['phone']=$this->input->post('phone');
	        $data['email']=$this->input->post('email');
	        $data['relation']=$this->input->post('relation');
	        $data['address']= strip_tags($this->input->post('address'));
	        $data['created_by']= $this->session->userdata('user_code');
	        
	        $data['status']= 0;
	        $data['created_on']=date('Y-m-d');
	        /*echo "<pre>";
	        print_r($data);
	        print_r($_FILES);
	        print_r($_POST);
			die("here");*/
	        
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email ', 'trim|required');
            $this->form_validation->set_rules('relation', 'Relation ', 'trim|required');
			
			if ($this->form_validation->run() == TRUE)
             {
             	$data_inserted = $this->Contact_model->add_contact($data);
                $this->session->set_flashdata('success_msg', 'Contact Added Successfully'); 
                redirect('client/contact');
             }
                
                    
             }
		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Contact | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addcontact');

	}


	
/*================================ Edit ===========================,*/	

public function editcontact($id)

    {
		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('client/contact/contact');	

		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			/*print_r($_POST);
			die("here");*/
			$data['name']= ucwords(strip_tags($this->input->post('name'))) ;
	        $data['phone']=$this->input->post('phone');
	        $data['email']=$this->input->post('email');
	        $data['relation']=$this->input->post('relation');
	        $data['address']= strip_tags($this->input->post('address'));
	        $data['created_on']=date('Y-m-d');
	        /*echo "<pre>";
	        print_r($data);
	        print_r($_FILES);
	        print_r($_POST);
			die("here");*/
	        
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email ', 'trim|required');
            $this->form_validation->set_rules('relation', 'Relation ', 'trim|required');
			
				if ($this->form_validation->run() == TRUE)
				{
					$data_updated = $this->Contact_model->edit_contact($data,$id);
	                $this->session->set_flashdata('success_msg', 'Contact Edited Successfully'); 
	                redirect('client/contact');
				}
                
                    
             }

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Contact | '.$site_name);

		$data_single = $this->Contact_model->get_data_by_id($id);

		$data['allcontact_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editcontact',$data);

    }


/*================================ View ===========================*/

public function viewtask($id)

    {
    	$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'View Task | '.$site_name);

		$data_single = $this->Task_model->get_data_by_id($id);

		$data['alltaskdata_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewtask',$data);
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
