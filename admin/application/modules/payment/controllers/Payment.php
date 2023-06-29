<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Payment extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Payment_model');
    }
    
    //===================================================================
    
    public function index()
    {
        $data_get= $this->Payment_model->get_data();
        //echo $this->db->last_query();die();
		$data['allpayment_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Payment | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('payment',$data);
	}
	
/*==========================Edit Service============================================*/

public function viewpayment($id)

    {
    	if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/payment');	

		}
		
		/*if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			die("here");
            $this->form_validation->set_rules('service_name', 'Service Name', 'trim|required');
			
			
			/*if ($this->form_validation->run() == TRUE) 
             {
             	$data['service_name']= ucwords(strip_tags($this->input->post('service_name'))) ;
	            
	            $data['service_type']= $this->input->post('service_type');
	            
	            $data['ser_status']= $this->input->post('ser_status');
	            $data['service_desp']= strip_tags($this->input->post('service_desp'));
	            $data['updated_on']=date('Y-m-d H:i:s');
             }
                $data_updated = $this->Service_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Service Edited Successfully'); 
                redirect('client/service');
			
			
		}*/
		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Payment | '.$site_name);

		$data_single = $this->Payment_model->get_data_by_id($id);

		$data['allpayment_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewpayment',$data);

    }
/*================================ Delete Service===========================*/	

/*public function delete_data($dataid)

    {

        $this->Service_model->delete_row_data($dataid);

		redirect('admin/service');

        exit;

    }*/
	
	
	
	
	/*public function inactive($id)
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
	*/
}
