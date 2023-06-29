<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Supervisor extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Supervisor_model');
    }
    
    //===================================================================
    
    public function index()
    {
        $data_get= $this->Supervisor_model->get_data();
        //echo $this->db->last_query();die();
		$data['allsupervisor_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Supervisor | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('supervisor',$data);
	}
	
/*================================ Add Supervisor===========================*/	

	public function addsupervisor()

	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			/*echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			die("here");*/
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$lastid=$this->Supervisor_model->getLastid();
	            $usercode='SUP'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
	            $data_supervisor['sup_code']=$usercode;
	            $hash_key=base64_encode(hash_hmac('sha256', $usercode.time(), true));
	            
	        	$data_supervisor['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_supervisor['full_name'])));
	            $data_supervisor['profile_url']=$profile_url;
	            $slug = $data_supervisor['profile_url'];
	            $url=$this->Supervisor_model->check_url($slug);
                     $count=count($url);
                     if($count==0){
                        $profile_url=$slug;
                     }else{
                         $profile_url=$slug."-".$count;
                     }
	            $data_supervisor['email']= strip_tags($this->input->post('email'));
	            $data_supervisor['mobile']= $this->input->post('mobile');
	            $data_supervisor['status']= $this->input->post('status');
	            $data_supervisor['user_type']= 3;
	            $data_supervisor['created_on']=date('Y-m-d');
	            $data_supervisor['updated_on']=date('Y-m-d H:i:s');
              
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
                             $data_supervisor['profile_photo']= $final_files_data[0]['orig_name'];
                            
                           
                        }
                    }else{
                        $data_supervisor['profile_photo']= 'default.png';
                    } 
                    
                $data_user['user_code']=$usercode;
                $data_user['full_name']=$data_supervisor['full_name'];
                $data_user['profile_url']=$profile_url;
                $data_user['email']=$data_supervisor['email'];
                $data_user['mobile']=$data_supervisor['mobile'];
                $data_user['status']=$data_supervisor['status'];
                $data_user['user_type']=$data_supervisor['user_type'];
                $data_user['created_by']=$this->session->userdata('user_code');
                //echo $data_user['created_by'];die();
                $data_user['user_type']= 3;
                //echo $data_user['user_type'];die();
                $data_user['profile_photo']=$data_supervisor['profile_photo'];
                $data_user['ecode']= $hash_key;
                $data_user['created_on']=$data_supervisor['created_on'];
                $data_user['is_mobile_verified']='1';
                $data_user['password']=md5(strip_tags($this->input->post('password')));
                
                $email_check=$this->Supervisor_model->email_check($data_user['email']);
                if($email_check)
                {
	                $data_inserted_supervisor = $this->Supervisor_model->add_supervisor($data_supervisor);
	                $data_inserted_users = $this->Supervisor_model->add_user($data_user);
	                $message="";
	                
	                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                	$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/ico/logo.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'><a href='".base_url()."' style='text-decoration: none; font-size: 14px;'>Home</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."about-us' style='text-decoration: none; font-size: 14px;'>About Us</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."contact-us' style='text-decoration: none; font-size: 14px;'>Contact Us</a></li></ul></td></tr></table>";$subject = "Verify Your Account: Mirchi Chef";
                
                $headersad = "From: VALogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="info@crm.com";   
                $to2= $data_user['email']; 
               // mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad)

	                if($data_inserted_supervisor && $data_inserted_users)  {
	                   // echo $message;die();
	                    $this->session->set_flashdata('success_msg', 'Your registration was successfully. Please check your email to verify your account');
	                                    redirect('admin/supervisor');
	                }
	                
				}
				else{
                         $this->session->set_flashdata('error_msg', 'The given email already exists.');
                         redirect('admin/supervisor');
                    }
                    
             }
		}

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Supervisor | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addsupervisor');

	}
	
public function everify()
     {
      $hprk=$_REQUEST['hprk'];
      $check=$this->Supervisor_model->check_user($hprk); 
      if($check){
      $update=$this->Supervisor_model->update_status($check->id,$hprk);     
      $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
          redirect('admin/customer');
      }else{
      	echo "hi";
       //redirect('userregistration/invalidtoken');
      }

    }


	
/*================================ Edit ===========================*/	

public function editsupervisor($sup_code)

    {
    	
		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/supervisor/supervisor');	

		}
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{	
			/*echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			die("here");*/
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$data_supervisor['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_supervisor['full_name'])));
	            $data_supervisor['profile_url']=$profile_url;
	            $data_supervisor['email']= strip_tags($this->input->post('email'));
	            $data_supervisor['mobile']= $this->input->post('mobile');
	            $data_supervisor['status']= '1';
	            $data_supervisor['user_type']= 3;
	            
	            
            	$data_supervisor['created_on']=date('Y-m-d');
	            $data_supervisor['updated_on']=date('Y-m-d H:i:s');
              
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
                             $data_supervisor['profile_photo']= $final_files_data[0]['orig_name'];
                            @unlink("../uploads/users/profile_photo/".$this->input->post('prev_link'));
                           
                        }
                    }else{
                        $data_supervisor['profile_photo']= $this->input->post('prev_link');
                    } 
                    
                $data_user['full_name']=$data_supervisor['full_name'];
                $data_user['profile_url']=$profile_url;
                $data_user['email']=$data_supervisor['email'];
                $data_user['mobile']=$data_supervisor['mobile'];
                $data_user['status']='1';
                $data_user['created_by']=$this->session->userdata('user_code');
                //echo $data_user['created_by'];die();
                $data_user['user_type']= 3;
                //echo $data_user['user_type'];die();
                $data_user['profile_photo']=$data_supervisor['profile_photo'];
                
                
                
                $data_updated_supervisor = $this->Supervisor_model->edit_supervisor($data_supervisor,$sup_code);
                $data_updated_users = $this->Supervisor_model->edit_users($data_user,$sup_code);
                /*print_r($data_supervisor);
                print_r($data_user);exit;*/
                
                $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully'); 
                redirect('admin/supervisor');
                    
             }
		}
		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Supervisor | '.$site_name);

		$data_single = $this->Supervisor_model->get_data_by_id($sup_code);

		$data['allsupervisor_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editsupervisor',$data);

    }

	
/*================================ Delete Data ===========================*/	
	
public function delete_data($sup_code)
    {
        $this->Supervisor_model->delete_row_data($sup_code);
		redirect('admin/supervisor');
        exit;
    }
	
	


    public function inactive($sup_code)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_activated = $this->Supervisor_model->edit_supervisor($data,$sup_code);
               $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


    public function active($sup_code)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_activated = $this->Supervisor_model->edit_supervisor($data,$sup_code);
               $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }
    /*public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '1';
               $data_inserted = $this->Supervisor_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'supervisor edited Successfully'); 
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
               $data_inserted = $this->Supervisor_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'supervisor edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }*/

    
         
    
}
