<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class User extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        
		$this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('User_model');
    }
    //===================================================================
    public function index()
    {
        $data_get= $this->User_model->get_data();
        //echo $this->db->last_query();die();
		$data['alluser_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'User | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('user',$data);
	}
	
/*================================ Add Data===========================*/	
	
public function add()
{ //die("here");
		$data_class['user_type'] = $this->User_model->get_user_type();
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			/*echo "<pre>";
			print_r($_POST);
			print_r($_FILES);*/
			//die("here");
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('user_type', 'User Type', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$lastid=$this->User_model->getLastid();
	            $usercode='USER'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
	            $data_customer['cust_code']=$usercode;
	            
	            
	        	$data_customer['full_name']= strip_tags($this->input->post('full_name'));
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_customer['full_name'])));
	            $data_customer['profile_url']=$profile_url;
	            $data_customer['email']= strip_tags($this->input->post('email'));
	            $data_customer['registration_type']= strip_tags($this->input->post('registration_type'));
	            $data_customer['mobile']= $this->input->post('mobile');
	            
	            $data_customer['profile_bio']= $this->input->post('profile_bio');
	            $data_customer['is_feature_profile']= strip_tags($this->input->post('is_feature_profile'));
	            $data_customer['status']= $this->input->post('status');           
	            $data_customer['is_feature_profile']= '1';           
            
            
            
	             $data_customer['created_on']=date('Y-m-d');
	             $data['updated_on']=date('Y-m-d H:i:s');
              
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
                        $config['upload_path']          = '../uploads/users/profile_photo';

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
                            print_r($final_files_data);*/
                             $data_customer['profile_photo']= $final_files_data[0]['orig_name'];
                            
                           
                        }
                    }else{
                        $data_customer['profile_photo']= 'default.png';
                    }
                    
                    
            	  $this->load->library('upload');
                  if($_FILES['timeline_photo']['name']!='' || $_FILES['timeline_photo']['name']!=null)
                  {
                    $number_of_files_uploaded = count($_FILES['timeline_photo']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['timeline_photo']['name'];
                        $_FILES['userfile']['type']     = $_FILES['timeline_photo']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['timeline_photo']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['timeline_photo']['error'];
                        $_FILES['userfile']['size']     = $_FILES['timeline_photo']['size'];
                        $configs['upload_path']          = '../uploads/users/timeline_photo';

                        $configs['allowed_types']        = 'png|jpg|jpeg';
                        $configs['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($configs);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        
                        } else {
                            
                            $final_files_datas[] = $this->upload->data();
                            
                             $data_customer['timeline_photo']= $final_files_datas[0]['orig_name'];
                            //print_r($data_customer['timeline_photo']);die();
                           
                        }
                    }else{
                        $data_customer['timeline_photo']= 'default.png';
                    }
                
                /*echo "<pre>";
				print_r($data_customer);
				die("here2");*/
                    
                $data_user['user_code']=$usercode;
                $data_user['full_name']=$data_customer['full_name'];
                $data_user['profile_url']=$profile_url;
                $data_user['email']=$data_customer['email'];
                $data_user['mobile']=$data_customer['mobile'];
                $data_user['status']=$data_customer['status'];
                $data_user['is_email_verified']='1';
                $data_user['created_by']=$this->session->userdata('user_code');
                //echo $data_user['created_by'];die();
                $data_user['user_type']= $this->input->post('user_type');
                //echo $data_user['user_type'];die();
                $data_user['profile_photo']=$data_customer['profile_photo'];
                $data_user['created_on']=$data_customer['created_on'];
                $data_user['password']=md5(strip_tags($this->input->post('password')));
                
                $data_inserted_customer = $this->User_model->add_customer($data_customer);
                $data_inserted_users = $this->User_model->add_users($data_user);
                /*print_r($data_customer);
                print_r($data_user);exit;*/
                
                $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                         redirect('admin/user');
                    
             }
		}
		
      	$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Add User | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('adduser',$data_class);
}
	
/*================================ Edit ===========================*/	

public function edit($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/user');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
			
		}
	    $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Edit User | '.$site_name);
		$data_single = $this->User_model->get_data_by_id($user_code);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('edituser');
    }
	
/*================================ Delete Data ===========================*/	
	
/*public function delete_data($dataid)
    {
        $this->User_model->delete_row_data_users($dataid);
        $this->User_model->delete_row_data_customer($dataid);
        
		redirect('admin/user');
        exit;
    }*/
	
	


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
               $data_inserted = $this->User_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
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
               $data_inserted = $this->User_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }

    
         
    
}
