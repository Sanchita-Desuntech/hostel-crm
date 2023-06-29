<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Contact_model');
    }
    //===================================================================
    public function index()
    {
		
       
        $data_get= $this->Contact_model->get_data();
		$data['alldata_row']=$data_get;
        $this->template->set('title', 'Contact | '.$this->config->item('site_name'));
    
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('contact',$data);
    
	
	
	}
	
	

/*================================ Edit ===========================*/	

public function detailscontact($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/contact');	
		}
		
		
		
	   $this->template->set('title', 'Contact | '.$this->config->item('site_name'));
		$data_single = $this->Contact_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('detailscontact',$data);
		
    }
	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid)
    {
        $this->Contact_model->delete_row_data($dataid);
		
		redirect('admin/contact');
        exit;
    }
			
	
	
	
	
	
	
	
	
}
