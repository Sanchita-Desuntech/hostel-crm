<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Type extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Type_model');
		
    }
//==========================view type=========================================
	public function index()
    {
		//$data_get= $this->Advertise_model->get_join_data();
		
		$data_get= $this->Type_model->get_data();
		$data['type']=$data_get;
		/*echo "<pre>";
		print_r($data); die();*/
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Type | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('type',$data);
    
	
	
	}
	
/*================================ Add type===========================*/	
/*	public function addtype()
	{
		//$data_class['get_all_pages']=$this->Type_model->get_pages();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			print_r($_POST);die();
			$data['type_name']= ucwords(strip_tags($this->input->post('type_name')));
			$data['status']= 0;
			
			 $this->form_validation->set_rules('type_name', 'Movie Type', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Type_model->add_data($data);
                  $this->session->set_flashdata('success_msg', 'Type added Successfully'); 
                	redirect('admin/type/type');
                	
				}
			  	
			 
			 
			
		}
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Add Type | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addtype');
	}*/
	
/*================================ Edit type ===========================*/

	public function edittype($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/type/type');	
		}
		//$data_class['get_all_pages']=$this->Type_model->get_pages();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			//print_r($_POST);die();
			$data['type_name']= ucwords(strip_tags($this->input->post('type_name')));
			$data['status']= 0;	
			
			 $this->form_validation->set_rules('type_name', 'Movie Type', 'trim|required');
			 
			  if ($this->form_validation->run() == TRUE) {

                  $data_inserted = $this->Type_model->edit_data($data,$id);
                  $this->session->set_flashdata('success_msg', 'Type edited Successfully'); 
                	redirect('admin/type/type');
                	
				}
			  	
			 
			 
			
		}
		
		
		$site_name=$this->config->item('site_name');
	    $this->template->set('title', 'Edit Type | '.$site_name);
		$data_single = $this->Type_model->get_data_by_id($id);
		$data_class['type']=$data_single ;
		//print_r($data_single);die();
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edittype',$data_class);
    }
	
/*================================ Delete type===========================*/
	
	public function delete_type($dataid)
    {
        $this->Type_model->delete_row_data($dataid);
		redirect($_SERVER['HTTP_REFERER']);   
      
    }
    
/*===================== Inactive=======================================*/
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
               $data_inserted = $this->Type_model->edit_data($data,$id);
               //echo $this->db->last_query();die("heremnjjm");
               $this->session->set_flashdata('success_msg', 'Type edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

/*=====================Active =======================================*/

  public function active($id)
    {
    	//die($id);
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_inserted = $this->Type_model->edit_data($data,$id);
               //echo $this->db->last_query();die("here");
               $this->session->set_flashdata('success_msg', 'Type edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }		
    
}