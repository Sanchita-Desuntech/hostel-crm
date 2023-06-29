<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Settings extends MX_Controller

{

    public function __construct()

    {
		parent::__construct();
		is_logged_in(); 	//common function for session checking.
		$this->load->library('form_validation');
		$this->load->model('Settings_model');
		$this->load->model('Unit_model');
		$this->load->model('Tax_model');
		$this->load->model('SMS_model');

    }

//===================================================================

    public function viewunit()

    {
    	$data_get= $this->Unit_model->get_data();
    	
		$data['unit']=$data_get;

        $this->template->set('title','Unit  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewunit',$data);
	}
	

	
/*================================ Add Unit===========================*/	
	public function addunit()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['name']= strip_tags($this->input->post('name'));
			$name=strip_tags($this->input->post('name'));
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
			$data['description']= strip_tags($this->input->post('description'));
			$data['status']= strip_tags($this->input->post('status'));
			
			 $this->form_validation->set_rules('name', 'Name', 'trim|required');
			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->Unit_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'Unit added Successfully'); 
                	redirect('admin/settings/viewunit');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Unit | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addunit');
	}


/*================================ Edit Unit===========================*/	



	public function editunit($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/settings/viewunit');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	       $data['name']= strip_tags($this->input->post('name'));
			$name=strip_tags($this->input->post('slug'));
			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
			$data['description']= strip_tags($this->input->post('description'));
			$data['status']= strip_tags($this->input->post('status'));
            
            
			 $this->form_validation->set_rules('name', 'Name', 'trim|required');
			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
          
            if ($this->form_validation->run() == TRUE) {
                  $data_inserted = $this->Unit_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Unit edited Successfully'); 
                redirect('admin/settings/viewunit');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Unit | '.$site_name);
		$data_single = $this->Unit_model->get_data_by_id($id);
		$data['unit']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editunit',$data);
    }
   
/*================================ Delete Unit===========================*/	
	
	public function delete_unit($dataid)
    {
        $this->Unit_model->delete_row_data($dataid);
		redirect('admin/settings/viewunit');
        exit;
    }

	

//===========================View Tax========================================

    public function viewtax()

    {
    	$data_get= $this->Tax_model->get_data();
    	
		$data['tax']=$data_get;

        $this->template->set('title','Tax  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewtax',$data);
	}
	

	
/*================================ Add Tax===========================*/	
	public function addtax()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['group_name']= strip_tags($this->input->post('group_name'));
			$data['rate']= strip_tags($this->input->post('rate'));
			$data['type']= strip_tags($this->input->post('type'));
			$data['status']= strip_tags($this->input->post('status'));			
			 $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
			 $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
			 $this->form_validation->set_rules('type', 'Type', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->Tax_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'Tax added Successfully'); 
                	redirect('admin/settings/viewtax');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Tax | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addtax');
	}	

	
/*================================ Edit Tax===========================*/	
	public function edittax($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/settings/viewtax');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       		$data['group_name']= strip_tags($this->input->post('group_name'));
			$data['rate']= strip_tags($this->input->post('rate'));
			$data['type']= strip_tags($this->input->post('type'));
			
			 $this->form_validation->set_rules('group_name', 'Group Name', 'trim|required');
			 $this->form_validation->set_rules('rate', 'Rate', 'trim|required');
			 $this->form_validation->set_rules('type', 'Type', 'trim|required');
          
            if ($this->form_validation->run() == TRUE) {
                  $data_inserted = $this->Tax_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'Tax edited Successfully'); 
                redirect('admin/settings/viewtax');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Tax | '.$site_name);
		$data_single = $this->Tax_model->get_data_by_id($id);
		$data['tax']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edittax',$data);
    }
   
/*================================ Delete Tax===========================*/
	
	public function delete_tax($dataid)
    {
        $this->Tax_model->delete_row_data($dataid);
		redirect('admin/settings/viewtax');
        exit;
    }
		

//===========================View SMS========================================

    public function viewsms()

    {
    	$data_get= $this->SMS_model->get_data();
    	
		$data['sms']=$data_get;

        $this->template->set('title','SMS  | '.$this->config->item('site_name'));

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewsms',$data);
	}

	
/*================================ Add SMS===========================*/	
	public function addsms()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['sender_name']= strip_tags($this->input->post('sender_name'));
			$data['smsprovider']= strip_tags($this->input->post('smsprovider'));
			$data['sender_id']= strip_tags($this->input->post('sender_id'));
			$data['smstype']= strip_tags($this->input->post('smstype'));
			$data['api']= strip_tags($this->input->post('api'));
			$data['username']= strip_tags($this->input->post('username'));
			$data['password']= strip_tags($this->input->post('password'));
			$data['is_active']= strip_tags($this->input->post('is_active'));
			$data['url']= strip_tags($this->input->post('url'));
			
			 $this->form_validation->set_rules('sender_name', 'Sender Name', 'trim|required');
			 $this->form_validation->set_rules('smsprovider', 'Smsprovider', 'trim|required');
			 $this->form_validation->set_rules('sender_id', 'Sender Id', 'trim|required');
			 $this->form_validation->set_rules('smstype', 'SMS Type', 'trim|required');
			 $this->form_validation->set_rules('api', 'API', 'trim|required');
			 $this->form_validation->set_rules('username', 'Username', 'trim|required');
			 $this->form_validation->set_rules('password', 'Password', 'trim|required');
			 $this->form_validation->set_rules('is_active', 'Is Active', 'trim|required');
			 $this->form_validation->set_rules('url', 'URL', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {
			  	
			  	  $data_inserted = $this->SMS_model->add_data($data);
			  	  $this->session->set_flashdata('success_msg', 'SMS added Successfully'); 
                	redirect('admin/settings/viewsms');
			  }
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add SMS | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addsms');
	}	
	
	/*================================ Edit Tax===========================*/	
	public function editsms($id)
	{
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/settings/viewsms');	
		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       		$data['sender_name']= strip_tags($this->input->post('sender_name'));
			$data['smsprovider']= strip_tags($this->input->post('smsprovider'));
			$data['sender_id']= strip_tags($this->input->post('sender_id'));
			$data['smstype']= strip_tags($this->input->post('smstype'));
			$data['api']= strip_tags($this->input->post('api'));
			$data['username']= strip_tags($this->input->post('username'));
			$data['password']= strip_tags($this->input->post('password'));
			$data['is_active']= strip_tags($this->input->post('is_active'));
			$data['url']= strip_tags($this->input->post('url'));
			
			 $this->form_validation->set_rules('sender_name', 'Sender Name', 'trim|required');
			 $this->form_validation->set_rules('smsprovider', 'Smsprovider', 'trim|required');
			 $this->form_validation->set_rules('sender_id', 'Sender Id', 'trim|required');
			 $this->form_validation->set_rules('smstype', 'SMS Type', 'trim|required');
			 $this->form_validation->set_rules('api', 'API', 'trim|required');
			 $this->form_validation->set_rules('username', 'Username', 'trim|required');
			 $this->form_validation->set_rules('password', 'Password', 'trim|required');
			 $this->form_validation->set_rules('is_active', 'Is Active', 'trim|required');
			 $this->form_validation->set_rules('url', 'URL', 'trim|required');
			 
            if ($this->form_validation->run() == TRUE) {
                  $data_inserted = $this->SMS_model->edit_data($data,$id);
                $this->session->set_flashdata('success_msg', 'SMS edited Successfully'); 
                redirect('admin/settings/viewsms');	
            }
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit SMS | '.$site_name);
		$data_single = $this->SMS_model->get_data_by_id($id);
		$data['sms']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editsms',$data);
    }
   
/*================================ Delete Tax===========================*/
	
	public function delete_sms($dataid)
    {
        $this->SMS_model->delete_row_data($dataid);
		redirect('admin/settings/viewsms');
        exit;
    }

}

