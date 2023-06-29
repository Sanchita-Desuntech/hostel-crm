<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Employeee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Employeee_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$emp_id = json_encode($this->session->userdata('user_code'));
    	
       $data_get= $this->Employeee_model->get_all_task_data($emp_id);
      $data_employee_task = $this->Employeee_model->get_data($emp_id);
      $data_urgent_task = $this->Employeee_model->get_urgent_task_data($emp_id);
       //echo $this->db->last_query();die();
		$data['allemployee_row']=$data_get;
		$data['allemployee_assigned_task']=$data_employee_task;
		$data['urgent_task']=$data_urgent_task;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Task | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('employee',$data);
	}
	
   public function viewtask($task_id)
    {
    	//$emp_id = json_encode($this->session->userdata('user_code'));
    	
       $data_get= $this->Employeee_model->get_data_by_taskcode($task_id);
       $data_get_all_service = $this->Employeee_model->get_all_service();
       $data_get_all_sypervisor = $this->Employeee_model->get_all_sypervisor();
       $data_get_all_employee = $this->Employeee_model->get_all_employee();
       // echo $this->db->last_query();die();
		$data['alltask_row']=$data_get;
		$data['service']=$data_get_all_service;
		$data['supervisor']=$data_get_all_sypervisor;
		$data['employee']=$data_get_all_employee;
		/*echo "<pre>";
		print_r($data);exit;*/
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Task | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('viewtask',$data);
	}
    //Chat Section
        public function chat($task_id)

    { 
    	//echo $task_id;die("here");
    	$emp_code=$this->session->userdata('user_code');

    	$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'View Task | '.$site_name);

		$data_single = $this->Employeee_model->get_data_by_taskcode($task_id);

		$data['alldata_row']=$data_single ;
		/*echo "data single msg";
		echo "<pre>";
		print_r($data_single);*/
		$data_msg_all = $this->Employeee_model->get_data_by_message($task_id,$emp_code);
		/*echo "data msg all";
		echo "<pre>";
		print_r($data_msg_all);die("here msg");*/
		$data['allmsg_row']=$data_msg_all ;
		
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('chat',$data);
	}
     
    
    public function msgsend()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
		/*print_r($_POST);		
		print_r($_FILES); die("kool");	*/
				$email=	$this->input->post('user_email') ;
				$data['send_user_id']= $this->input->post('send_user_id') ;
		        $data['receiver_user_id']= $this->input->post('receiver_user_id');
		        $data['message']= $this->input->post('message');
		        $data['task_code']= $this->input->post('task_code');
		        $data['currently_date']=date('Y-m-d');
		        $data['currently_time']=date('H:i:s');
		       /* die("lo");*/
		        
            	$this->load->library('upload');
                  if($_FILES['attach_file']['name']!='' || $_FILES['attach_file']['name']!=null)
                  {
                    $number_of_files_uploadeds = count($_FILES['attach_file']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['attach_file']['name'];
                        $_FILES['userfile']['type']     = $_FILES['attach_file']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['attach_file']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['attach_file']['error'];
                        $_FILES['userfile']['size']     = $_FILES['attach_file']['size'];
                        $config['upload_path']          = '../uploads/message_attach';

                        $config['allowed_types']        = 'png|jpg|jpeg|pdf|doc|docx|zip';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
                        //print_r($error);die("look");
                        } else {
                            
                            $final_files_data[] = $this->upload->data();
                             $data['attach_file']= $final_files_data[0]['file_name'];
                           //echo "op";die("look123");
                        }
                    }
                    //die("loop");
                    
	             
	             	
	                $data_insert = $this->Employeee_model->add_message($data);
	                if($data_insert)
	                {
                    	$message="";
                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";

                $message .='<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Message Details </h3>
                <tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
	                <tr><th style="text-align: left;">From</th><td> '.$this->session->userdata("full_name").'</td></tr>
	                <tr><th style="text-align: left;">Send Name</th><td>'.$data['receiver_user_id'].'</td></tr>
	                <tr><th style="text-align: left;">Task Name</th><td>'.$data['task_code'].'</td></tr>
	                <tr><th style="text-align: left;">Message</th><td>'.$data['message'].'</td></tr>
	                <tr><th style="text-align: left;">Current Date</th><td>'.$data['currently_date'].'</td></tr>
	                <tr><th style="text-align: left;">Current Time</th><td>'.$data['currently_time'].'</td></tr>
	                <tr>';
	                if(!empty($data["attach_file"])) {
	                 $message .='<th style="text-align: left;">Attach File</th>
	                 <td>
	                <a href='.base_url().'uploads/message_attach/'.$data["attach_file"].'>View</a>
	                </td>';
	            } else {
	            	 $message .='<td>
	                </td>';
	            }
	                 $message .='</tr>
	                </table></div>';

                $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical ".date("Y")." . All Rights Reserved</p></td></tr></table></div></div></body>";
//echo $message;die("here"); 
                
                $subject = "Message Sent Successfully: Valogical";
                
                $headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1= $email;   
                $to2= "info@Valogical.com"; 
                //die();
                

                if(mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad))  {
                    //echo $message;die("here"); 
                    $this->session->set_flashdata('success_msg', 'Message Submitted Successfully');
                 	redirect($_SERVER['HTTP_REFERER']);
                		}                      

                    }
   
			}

			$site_name=$this->config->item('site_name');

		    $this->template->set('title', 'Message | '.$site_name);

	        $this->template->set_layout('layout_main', 'front');

	        $this->template->build('chat');
		
	}

   //Profile
         public function profile()



    {

    	$user_code=$this->session->userdata('user_code');

    	//echo $user_code;

    	$data_get= $this->Employeee_model->get_profile_data($user_code);

    	//print_r($data_get);die("kl");

		$data['profile']=$data_get;



        $this->template->set('title','Profile  | '.$this->config->item('site_name'));

        

        

        if ($this->input->server('REQUEST_METHOD') == 'POST')

		{	

			/*echo "<pre>";

			print_r($_POST);

			print_r($_FILES);*/

			

            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');

            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');



             if ($this->form_validation->run() == TRUE) 

             {

             	$data_user['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;

	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_user['full_name'])));

	            $data_user['profile_url']=$profile_url;

	            $data_user['mobile']= $this->input->post('mobile');

	            $data_user['updated_on']=date('Y-m-d H:i:s');

              

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
							$profile_photo_name = $final_files_data[0]['orig_name'];	
                             $data_user['profile_photo']= $final_files_data[0]['orig_name'];

                            @unlink("../uploads/users/profile_photo/".$this->input->post('prev_link'));

                           

                        }

                    }else{

                        $data_user['profile_photo']= $this->input->post('prev_link');

                    }

                   // echo "<pre>";

                    //print_r($data_user);          

                

                $data_updated_users = $this->Employeee_model->edit_users($data_user,$user_code);
                $data_updated_employee = $this->Employeee_model->edit_employee($data_user,$user_code);
				
                //echo $this->db->last_query();die("pl");

                if($data_updated_users && $data_updated_employee){
                	 $this->session->set_userdata('full_name',ucwords(strip_tags($this->input->post('full_name'))));
                	 $this->session->set_userdata('profile_photo',$profile_photo_name);
                	 $this->session->set_userdata('mobile',$this->input->post('mobile'));
                	 $this->session->set_flashdata('success_msg', 'Profile edited successfully'); 

                redirect('admin/employee/profile');
                }else{
                	 $this->session->set_flashdata('err_msg', 'Profile edit failed'); 

                redirect('admin/employee/profile');
                }

               

                    

             }

		}



        $this->template->set_layout('layout_main', 'front');



        $this->template->build('profile',$data);

	}

	    ################################################################################
    //logout all server session for tesing
    ################################################################################
    public function logout()
    {
       
        $this->session->sess_destroy();
        //$this->index();
        redirect('admin/login');
    }
    ################################################################################
    //logout all server session for tesing
    ################################################################################
  
    
}
