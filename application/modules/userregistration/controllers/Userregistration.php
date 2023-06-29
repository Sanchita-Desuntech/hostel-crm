<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Userregistration extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
         $this->load->library('form_validation');

      	$this->load->model('Registration_model'); 

    }

    //===================================================================

    public function index()

    {
            if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
            	/*print_r($_POST);
            	die("here");*/
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

                if($this->form_validation->run() == TRUE){
                    $lastid=$this->Registration_model->getLastid();

                    $usercode='USER'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                    $hash_key=base64_encode(hash_hmac('sha256', $usercode.time(), true));

                    //user table data//

                    $data_user['user_code']=$usercode;
                    $data_user['password']=md5(strip_tags($this->input->post('password')));
                    $data_user['user_type']='2';
                    //$data_user['full_name']=$data_customer['full_name'];
                    //$data_user['profile_url']=$profile_url;
                    $data_user['created_on']=date('Y-m-d');
                    $data_user['profile_photo']='default.png';
                    $data_user['email']=strip_tags($this->input->post('email'));
                     $data_user['ecode']= $hash_key;
                   // print_r($data_user);die();
                    $email_check=$this->Registration_model->email_check($data_user['email']);
                    if($email_check){
                        $this->Registration_model->insert_user($data_user);

                        $message="";
                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/logo.png' style='width: 25%;'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'><a href='".base_url()."' style='text-decoration: none; font-size: 14px;'>Home</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."about-us' style='text-decoration: none; font-size: 14px;'>About Us</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."contact-us' style='text-decoration: none; font-size: 14px;'>Contact Us</a></li></ul></td></tr></table>";
                $message .= "<table width='100%' background='".base_url()."themes/front/images/bg/bkg2.jpg' style='height: auto;'><tbody><tr><td valign='top' style='height: 20px; text-align: center;'><h1 style='margin: 45px 0 0;;color: #fff;font-size: 60px;'><img src='".base_url()."themes/front/images/bg/info.png' style='background-color: rgb(255, 255, 255);border-radius: 50%;padding: 0px;width: 150px;'></h1><h1 style='margin: 0;color: #000;line-height: 20px;'>Confirm your account</h1><h4 style='margin: 0;color: #000;line-height: 56px;'></h4></td></tr></tbody></table>";   
                $message .='<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: center;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px;">Please verify your email id to complete the account creation process</h5>
            <a href="'.base_url().'userregistration/everify?hprk='.$hash_key.'" style="background-color: rgb(41, 48, 136);border-radius: 5px;color: rgb(255, 255, 255);display: table;font-size: 20px;line-height: 20px;margin: 37px auto 30px;;padding: 10px 30px;text-align: center;text-decoration: none">Confirm account</a></td></tr></table></div>';            
                
            
            
                $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>OML Plus © ".date("Y")." . All Rights Reserved</p></td></tr></table></div></div></body>"; 
//echo $message;die("jack");
                
                $subject = "Verify Your Account: OML Plus";
                
                $headersad = "From: OML Plus <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="desuntechnology@gmail.com";   
                $to2= $data_user['email']; 
                

                if(mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad))  {
                   // echo $message;die();
                    $this->session->set_flashdata('success_msg', 'Your registration was successfully. Please check your email to verify your account');
                                    redirect('user-registration');
                }  
                else{
					$this->session->set_flashdata('success_msg', 'Your registration was successfully. Please check your email to verify your account');
				}                   

                    }else{
                         $this->session->set_flashdata('error_msg', 'The given email already exists.');
                         redirect('user-registration');
                    }

                    
                }

            }
  //       die("here");
  
  			$data['pages_data'] = $this->Registration_model->get_sng_pages_data();
	     //print_r($data['pages_data']);die("here");

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

 
		
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('registration');

    }

	 public function everify()
     {
      $hprk=$_REQUEST['hprk'];
      $check=$this->Registration_model->check_user($hprk); 
      if($check){
      $update=$this->Registration_model->update_status($check->id,$hprk);     
      $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
          redirect('login');
      }else{
      	echo "hi";
       //redirect('userregistration/invalidtoken');
      }

    }
    
    /*public function invalidtoken()
    {
       $this->template->set_layout('layout_main', 'front');

        $this->template->build('invalidtoken');
    }*/






	

	

	

}

