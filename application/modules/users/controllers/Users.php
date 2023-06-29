<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Users extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');
        
      	$this->load->model('Users_model'); 

    }

    //===================================================================

    public function index()
    {
    	/*if($this->session->userdata('is_front_logged_in')!=true)
    	{
			redirect();
		}*/
    	
    	
			
			$user_code = $this->session->userdata('user_code');
			
			$data_single['get_user_data'] = $this->Users_model->get_data_by_usercode($user_code);
			//print_r($data_single['get_user_data']); die("here");
			
			if ($this->input->server('REQUEST_METHOD') == 'POST')
				{	
			
				
	            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
				$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

	             if ($this->form_validation->run() == TRUE) 
	             {
		        	$data_user['full_name']= strip_tags($this->input->post('full_name'));
		            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_user['full_name'])));
		            $data_user['profile_url']=$profile_url;
		            $data_user['mobile']= $this->input->post('mobile');      
	            	
	              
	             $this->load->library('upload');
	                  if($_FILES['profile_photo']['name']!='' || $_FILES['profile_photo']['name']!=null)
	                  {
	                    $number_of_files_uploadeds = count($_FILES['profile_photo']['name']);

	                    // Faking upload calls to $_FILE
	                        $_FILES['userfile']['name']     = $_FILES['profile_photo']['name'];
	                        $_FILES['userfile']['type']     = $_FILES['profile_photo']['type'];
	                        $_FILES['userfile']['tmp_name'] = $_FILES['profile_photo']['tmp_name'];
	                        $_FILES['userfile']['error']    = $_FILES['profile_photo']['error'];
	                        $_FILES['userfile']['size']     = $_FILES['profile_photo']['size'];
	                        $config['upload_path']          = './uploads/users/profile_photo';

	                        $config['allowed_types']        = 'png|jpg|jpeg';
	                        $config['max_size']             = 100000;
	                        //$config['max_width']            = 1024;
	                        // $config['max_height']           = 768;
	                        $this->upload->initialize($config);


	                        if (! $this->upload->do_upload()) {
	                         $error = array('error' => $this->upload->display_errors()); 
	                        } else {
	                            
	                            $final_files_data[] = $this->upload->data();
	                            @unlink("./uploads/users/profile_photo/".$this->input->post('prev_link'));
	                            
	                            $data_user['profile_photo']= $final_files_data[0]['file_name'];
	                            	
	                           
	                        }
	                    }else{
	                    	if($this->input->post('prev_link')=='')
	                    	{
								$data_user['profile_photo']= 'default.png';
							}
	                        else
	                        {
								$data_user['profile_photo']= $this->input->post('prev_link');
							}
	                    }
	                
	                $data_update = $this->Users_model->edit_data($data_user,$user_code);             
	                $this->session->set_flashdata('success_msg', 'Profile Edited Successfully'); 
	                redirect($_SERVER['HTTP_REFERER']);
	                    
	             }
	             
			}

			
			
			
			$this->template->set_layout('layout_main', 'front');

        	$this->template->build('get_user',$data_single);
		

		
		
	}
	
    	

  
}

