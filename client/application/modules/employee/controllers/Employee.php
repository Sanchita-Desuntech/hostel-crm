<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Employee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Employee_model');
    }
    
    //===================================================================
    
    public function index()
    {
        $data_get= $this->Employee_model->get_data();
        //echo $this->db->last_query();die();
		$data['allemployee_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Employee | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('employee',$data);
	}
	
/*================================ Add Employee===========================*/	

	public function addemployee()

	{
		$data_class['supervisor'] = $this->Employee_model->get_supervisor();
		
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
			$this->form_validation->set_rules('supervisor_name', 'Supervisor', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$lastid=$this->Employee_model->getLastid();
	            $usercode='EMP'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
	            $data_employee['emp_code']=$usercode;
	            $hash_key=base64_encode(hash_hmac('sha256', $usercode.time(), true));
	            
	        	$data_employee['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_employee['full_name'])));
	            $data_employee['profile_url']=$profile_url;
	            $slug = $data_employee['profile_url'];
	            $url=$this->Employee_model->check_url($slug);
	            //print_r($url) ;die();
                     $count=count($url);
                     if($count==0){
                       $profile_url=$slug;
                     }else{
                      $profile_url=$slug."-".$count;
                     }
	            $data_employee['email']= strip_tags($this->input->post('email'));
	            $data_employee['mobile']= $this->input->post('mobile');
	            $data_employee['status']= $this->input->post('status');
	            $data_employee['supervisor_name']= $this->input->post('supervisor_name');
	            $data_employee['user_type']= 1;
            	$data_employee['created_on']=date('Y-m-d');
	            $data_employee['updated_on']=date('Y-m-d H:i:s');
              
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
                             $data_employee['profile_photo']= $final_files_data[0]['orig_name'];
                            
                           
                        }
                    }else{
                        $data_employee['profile_photo']= 'default.png';
                    } 
                    
                $data_user['user_code']=$usercode;
                $data_user['full_name']=$data_employee['full_name'];
                $data_user['profile_url']=$profile_url;
                $data_user['email']=$data_employee['email'];
                $data_user['mobile']=$data_employee['mobile'];
                $data_user['ecode']= $hash_key;
                $data_user['status']=$data_employee['status'];
                $data_user['user_type']=$data_employee['user_type'];
                $data_user['created_by']=$this->session->userdata('user_code');
                //echo $data_user['created_by'];die();
                $data_user['user_type']= 1;
                //echo $data_user['user_type'];die();
                $data_user['profile_photo']=$data_employee['profile_photo'];
                $data_user['created_on']=$data_employee['created_on'];
                $data_user['is_mobile_verified']='1';
                $data_user['password']=md5(strip_tags($this->input->post('password')));
               // echo $data_user['email'];
              //  print_r($data_user);
                //print_r($data_employee);die();
                               
                $email_check=$this->Employee_model->email_check($data_user['email']);
                
                if($email_check)
                {
 				$data_inserted_employee = $this->Employee_model->add_employee($data_employee);
                $data_inserted_users = $this->Employee_model->add_user($data_user);
                $message="";
	                
	                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                	$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/ico/logo.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'><a href='".base_url()."' style='text-decoration: none; font-size: 14px;'>Home</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."about-us' style='text-decoration: none; font-size: 14px;'>About Us</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."contact-us' style='text-decoration: none; font-size: 14px;'>Contact Us</a></li></ul></td></tr></table>";$subject = "Verify Your Account: Mirchi Chef";
                
                $headersad = "From: VALogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="info@crm.com";   
                $to2= $data_user['email']; 
              //  mail($to2,$subject,$message,$headersad)
 				//mail($to1,$subject,$message,$headersad)
	                if($data_inserted_employee && $data_inserted_users)  {
	                   // echo $message;die();
	                    $this->session->set_flashdata('success_msg', 'Your registration was successfully. Please check your email to verify your account');
	                                    redirect('admin/employee');
	              }else{
				  	echo "error";
				  } 
				}
                else{
                         $this->session->set_flashdata('error_msg', 'The given email already exists.');
                         redirect('admin/employee');
                    }
                    
			}
		}

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Employee | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addemployee',$data_class);

	}
	
public function everify()
     {
      $hprk=$_REQUEST['hprk'];
      $check=$this->Employee_model->check_user($hprk); 
      if($check){
      $update=$this->Employee_model->update_status($check->id,$hprk);     
      $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
          redirect('admin/employee');
      }else{
      	echo "hi";
       //redirect('userregistration/invalidtoken');
      }

    }


	
/*================================ Edit ===========================*/	

public function editemployee($emp_code)

    {
    	$data['supervisor'] = $this->Employee_model->get_supervisor();

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/employee');	

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
			$this->form_validation->set_rules('supervisor_name', 'Supervisor', 'trim|required');

             if ($this->form_validation->run() == TRUE) 
             {
             	$data_employee['full_name']= ucwords(strip_tags($this->input->post('full_name')));
	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_employee['full_name'])));
	            $data_employee['profile_url']=$profile_url;
	            $data_employee['email']= strip_tags($this->input->post('email'));
	            $data_employee['mobile']= $this->input->post('mobile');
	            $data_employee['supervisor_name']= $this->input->post('supervisor_name');
	            $data_employee['user_type']= 1;
	            $data_employee['updated_on']=date('Y-m-d H:i:s');
              
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
                             $data_employee['profile_photo']= $final_files_data[0]['orig_name'];
                            @unlink("../uploads/users/profile_photo/".$this->input->post('prev_link'));
                           
                        }
                    }
                    
                $data_user['full_name']=$data_employee['full_name'];
                $data_user['profile_url']=$profile_url;
                $data_user['email']=$data_employee['email'];
                $data_user['mobile']=$data_employee['mobile'];
                $data_user['user_type']=$data_employee['user_type'];
                $data_user['is_email_verified']='1';
                $data_user['created_by']=$this->session->userdata('user_code');
                //echo $data_user['created_by'];die();
                $data_user['user_type']= 1;
                //echo $data_user['user_type'];die();
                $data_user['profile_photo']=$data_employee['profile_photo'];
                $data_user['updated_on']=$data_employee['updated_on'];
                $data_user['is_mobile_verified']='1';
                $data_user['is_email_verified']='1';
                
                $data_updated_employee = $this->Employee_model->edit_employee($data_employee,$emp_code);
                $data_updated_users = $this->Employee_model->edit_users($data_user,$emp_code);
                /*print_r($data_updated_employee);die("here");
                print_r($data_user);exit;*/
                
                $this->session->set_flashdata('success_msg', 'Employee Edited Successfully'); 
                         redirect('admin/employee');
                    
             }
		}
		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Employee | '.$site_name);

		$data_single = $this->Employee_model->get_data_by_id($emp_code);

		$data['allemployee_row']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editemployee',$data);

    }

	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid)
    {
        $this->Employee_model->delete_row_data($dataid);
		redirect('admin/employee');
        exit;
    }
	
	


    public function inactive($emp_code)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '0';
               $data_activated = $this->Employee_model->edit_employee($data,$emp_code);
               $this->session->set_flashdata('success_msg', 'Employee Edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }


    public function active($emp_code)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['status'] = '1';
               $data_activated = $this->Employee_model->edit_employee($data,$emp_code);
               $this->session->set_flashdata('success_msg', 'Employee Edited Successfully'); 
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
