<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Home extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');		
		
      	$this->load->model('Home_model');

    }

    //===================================================================

    public function index()

    {
    	
    	
    	
    	$data['get_home_slider'] = $this->Home_model->get_slider();
    	$data['menu_list'] = $this->Home_model->get_menu_list();
    	$data['post_list'] = $this->Home_model->get_post_data();
    	$data['drop_down_menulist'] = $this->Home_model->get_dropdownmenu_list();
    	
    	
		$data['pages_data'] = $this->Home_model->get_sng_pages_data();

		$meta_title = $data['pages_data'][0]->meta_title ;
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
		
		
		/*if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
		
			$email=$this->session->userdata('email');
			/*echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			die("here");
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
                            /*echo "<pre>";
                            print_r($final_files_data);
                             $data_user['profile_photo']= $final_files_data[0]['file_name'];
                            
                           
                        }
                    }else{
                        $data_user['profile_photo']= 'default.png';
                    }
                
                $data_inserted = $this->Home_model->edit_data($data_user,$email);  
                $this->session->set_userdata('full_name',$data_user['full_name']);
                $this->session->set_flashdata('success_msg', 'Profile Edited Successfully'); 
                redirect($_SERVER['HTTP_REFERER']);
                    
             }
		}
*/

		$this->template->set_layout('layout_main', 'front');

        $this->template->build('home',$data);
	}


	

	

	

}

