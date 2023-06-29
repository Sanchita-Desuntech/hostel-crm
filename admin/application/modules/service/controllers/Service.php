<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Service extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Service_model');
    }
    
    //===================================================================
    
    public function index()
    {
        $data_get= $this->Service_model->get_data();
        //echo $this->db->last_query();die();
		$data['allservice_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Service | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('service',$data);
	}
	
    /*================================ Add Service===========================*/	
    public function addservice()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
            $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required');
            $this->form_validation->set_rules('service_desp', 'Service Description', 'trim|required');
		
			if ($this->form_validation->run() == TRUE)
            {
                $lastid=$this->Service_model->getLastid();
                $sercode='SER'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                $data['service_id']=$sercode;
                $data['service_name']= ucwords(strip_tags($this->input->post('service_name'))) ;
                $data['service_type']= $this->input->post('service_type');
                $data['service_desp']= $this->input->post('service_desp');
                $data['ser_status']= $this->input->post('ser_status');
                $data['created_on']=date('Y-m-d');
                $data['updated_on']=date('Y-m-d H:i:s');

                $this->Service_model->add_data($data);
                $this->session->set_flashdata('success_msg', 'Service Added Successfully');

                redirect('admin/service');
            }
                
			
		}
		
		
		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Service | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addservice');
	}
	
	
    /*==========================Edit Service============================================*/
    public function editservice($id)
    {
    	if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/service/service');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
            $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required');
			$this->form_validation->set_rules('service_desp', 'Service Description', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) 
            {
                $data['service_name']= ucwords(strip_tags($this->input->post('service_name'))) ;
                
                $data['service_type']= $this->input->post('service_type');
                
                $data['ser_status']= $this->input->post('ser_status');
                $data['service_desp']= $this->input->post('service_desp');
                $data['updated_on']=date('Y-m-d H:i:s');

                $this->Service_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Service Edited Successfully'); 

                redirect('admin/service');
            }
		}

        $data_single = $this->Service_model->get_data_by_id($id);
		$data['allservice_row']=$data_single ;


		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Service | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editservice',$data);

    }
    
    /*================================ Delete Service===========================*/	
    public function delete_data($dataid)
    {

        $this->Service_model->delete_row_data($dataid);

		redirect('admin/service');

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
               $data['ser_status'] = '0';
               $data_activated = $this->Service_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Service Edited Successfully'); 
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
               $data['ser_status'] = '1';
               $data_activated = $this->Service_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Service Edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }
	
}
