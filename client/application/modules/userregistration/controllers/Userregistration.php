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
           

                 $this->form_validation->set_rules('full_name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
                 $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]','trim|required');
                 $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
                 $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
                 $this->form_validation->set_rules('address_line1', 'Address', 'trim|required');
                 $this->form_validation->set_rules('city', 'City', 'trim|required');
                 $this->form_validation->set_rules('country', 'Country', 'trim|required');
                 $this->form_validation->set_rules('state', 'State', 'trim|required');
                 $this->form_validation->set_rules('post_code', 'Post Code', 'trim|required');
                 

                 if($this->form_validation->run() == true){
                    $lastid=$this->Registration_model->getLastid();

                    $usercode='CUST'.date('y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                    $data_customer['cust_code']=$usercode;
                    $hash_key=base64_encode(hash_hmac('sha256', $usercode.time(), true));
                    
                    
                    $data_customer['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;
	            	$profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_customer['full_name'])));
	            	$data_customer['profile_url']=$profile_url;
	            	
	            	
	            	$slug = $data_customer['profile_url'];
	            	$url=$this->Registration_model->check_url($slug);
                     $count=count($url);
                     if($count==0){
                        $profile_url=$slug;
                     }else{
                         $profile_url=$slug."-".$count;
                     }
                     
                    $data_customer['address_line1']= strip_tags($this->input->post('address_line1'));
	            	$data_customer['address_line2']= strip_tags($this->input->post('address_line2'));
	            	$data_customer['city']= ucwords(strip_tags($this->input->post('city'))) ;
	            	$data_customer['country']= ucwords(strip_tags($this->input->post('country'))) ;
	            	$data_customer['state']= ucwords(strip_tags($this->input->post('state'))) ;
	            	$data_customer['post_code']= $this->input->post('post_code') ;
	            	$data_customer['information']= ucwords(strip_tags($this->input->post('information'))) ; 
                    $data_customer['email']= $this->input->post('email_id');
                    $data_customer['mobile']= strip_tags($this->input->post('mobile'));
                    $data_customer['user_type']= '2';
                    $data_customer['created_on']=date('Y-m-d');
                   
                    //print_r($data_customer);

                    //user table data//

                    $data_user['user_code']=$usercode;
                    $password1=$this->input->post('password');
                    $data_user['password']=md5(strip_tags($this->input->post('password')));
                    $data_user['user_type']='2';
                    $data_user['full_name']=$data_customer['full_name'];
                    $data_user['profile_url']=$profile_url;
                    $data_user['email']=$data_customer['email'];
                    $data_user['mobile']=$data_customer['mobile'];
                    $data_user['ecode']= $hash_key;
                    $data_user['created_on']= $data_customer['created_on'];
                    //print_r($data_user);
                    $email_check=$this->Registration_model->email_check($data_user['email']);
                    $data_inserted_customer = $this->Registration_model->insert_customer($data_customer);
	                $data_inserted_users = $this->Registration_model->insert_user($data_user);
	                //echo $this->db->last_query();die();
                    if($email_check){
                    	
                        
                        $message="";
                        $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                        $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";
                        $message .='<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">Verify Your Account</h3>
			                <tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
			                  <tr><th style="text-align: left;">Full Name</th><td> '.$data_user['full_name'].'</td></tr>
			                  <tr><th style="text-align: left;">User Name</th><td>'.$data_user['email'].'</td></tr>
			                  <tr><th style="text-align: left;">Mobile</th><td>'.$data_user['mobile'].'</td></tr>
			                  <tr><th style="text-align: left;">Password</th><td>'.$password1.'</td></tr>
			               </table></div>';   
                        $message .='<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: center;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px;">Please verify your email id to complete the account creation process</h5>
            <a href="'.base_url().'client/userregistration/everify?hprk='.$hash_key.'" style="background-color: rgb(41, 48, 136);border-radius: 5px;color: rgb(255, 255, 255);display: table;font-size: 20px;line-height: 20px;margin: 37px auto 30px;;padding: 10px 30px;text-align: center;text-decoration: none">Confirm account</a></td></tr></table></div>';            
                        $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'><table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical ".date("Y")." . All Rights Reserved</p></td></tr></table></div></div></body>";  
                
                $subject = "Verify Your Account: Valogical";
                
                $headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="desuntechnology@gmail.com";   
                $to2= $data_user['email']; 
                

                if(mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad))  {
                   // echo $message;die();
                    $this->session->set_flashdata('success_msg', 'Your registration was successfully. Please check your email to verify your account');
                 redirect('client/login');
                }                      

                    }else{
                         $this->session->set_flashdata('error_msg', 'The given email already exists.');
                         redirect('client/login');
                    }

                    
                }

            } 

		
        $this->template->set_layout('layout_login', 'front');

        $this->template->build('registration');

    }

	 public function everify()
     {
     	//die("lp");
      $hprk=$_REQUEST['hprk'];
      $check=$this->Registration_model->check_user($hprk); 
      if($check){
      $update=$this->Registration_model->update_status($check->id,$hprk);     
      $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
          $data['msg'] = "1";
      }else{
      	 $data['msg'] = "0";
       //redirect('client/userregistration/invalidtoken');
      }
		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Everify | '.$site_name);

        $this->template->set_layout('layout_everify.php', 'front');

        $this->template->build('everify',$data);
    }
    public function invalidtoken()
    {
       $this->template->set_layout('layout_login', 'front');

        $this->template->build('invalidtoken');
    }






	

	

	

}

