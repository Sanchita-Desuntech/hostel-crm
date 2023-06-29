<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Resetpassword extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
         $this->load->library('form_validation');

      	$this->load->model('Reset_model'); 
        $this->load->library('session');

    }

    //===================================================================

    public function index()

    {		

		//die("here");
      if ($this->input->server('REQUEST_METHOD') == 'POST')
            {
            	//print_r($_POST);die("jack");
               $username= strip_tags($this->input->post('username'));
                if ($row = $this->Reset_model->email_check($username)) 
                {
                  $data_customer['retrieval_key'] = base64_encode(hash_hmac('sha256', $data_customer['email'], true));
                  $data_customer['date']=date("Y-m-d H:i:s");

                    $data_customer['status']=1;
                    $data_customer['customer_id_fk']=$row->user_code;
                    //echo "$row->user_code"; die("now");
                    $insert=$this->Reset_model->add_data($data_customer,'tbl_pass_recovery');
                    $message="";
                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/ico/logo.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'><a href='".base_url()."' style='text-decoration: none; font-size: 14px;'>Home</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."about-us' style='text-decoration: none; font-size: 14px;'>About Us</a></li><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block;'><a href='".base_url()."contact-us' style='text-decoration: none; font-size: 14px;'>Contact Us</a></li></ul></td></tr></table>";
                $message .= "<table width='100%' background='".base_url()."themes/front/images/bg/bkg2.jpg' style='height: auto;'><tbody><tr><td valign='top' style='height: 20px; text-align: center;'><h1 style='margin: 45px 0 0;;color: #fff;font-size: 60px;'><img src='".base_url()."themes/front/images/bg/info.png' style='background-color: rgb(255, 255, 255);border-radius: 50%;padding: 0px;width: 150px;'></h1><h1 style='margin: 0;color: #000;line-height: 20px;'>Confirm your account</h1><h4 style='margin: 0;color: #000;line-height: 56px;'></h4></td></tr></tbody></table>";   
                $message .='<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: center;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px;">You have requested that your password be reset. In order to complete this process, please follow the link below. If you did not submit this request to change your password, then you may ignore this email. </h5>
            <a href="'.base_url().'resetpassword/password?hprk='.$data_customer['retrieval_key'].'" style="background-color: rgb(41, 48, 136);border-radius: 5px;color: rgb(255, 255, 255);display: table;font-size: 20px;line-height: 20px;margin: 37px auto 30px;;padding: 10px 30px;text-align: center;text-decoration: none">Reset Password</a></td></tr></table></div>';            
                
            
            
                $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>OML Plus © ".date("Y")." . All Rights Reserved</p></td></tr></table></div></div></body>"; 
echo $message;die("here");

                $subject = "Reset Your Password: OML Plus";
                
                $headersad = "From: OML Plus <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="desuntechnology@gmail.com";   
                $to2= $row->email;
                if(mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad))  {


                   $this->session->set_flashdata('success_msg', 'Please confirm the request to reset your password by clicking the link sent to your email address.');
                     redirect('resetpassword');
                }


                 
                }else{
                  $this->session->set_flashdata('error_msg', 'The given email already exists.');
                     redirect('resetpassword');
                }
            }



            $data['pages_data'] = $this->Reset_model->get_sng_pages_data();

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

        $this->template->build('reset');

    }
    public function password()
    {
        $hprk=$_REQUEST['hprk'];
        $check=$this->Reset_model->check_user($hprk); 
         if($check){
          $_SESSION['cust_id']=$check->customer_id_fk;

           /*$data['pages_data'] = $this->Reset_model->get_sng_pages_data();

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
    $this->template->set('MainIndex',$robotindex );*/

         $this->template->set_layout('layout_main', 'front');

        $this->template->build('setpassword');
         }else{
          redirect('resetpassword/invalidtoken');
         }
    }

     public function setpassword()
    {
      if ($this->input->server('REQUEST_METHOD') == 'POST')
            { 
//print_r($_POST); die("hereb");
               $this->form_validation->set_rules('new_password', 'Password', 'trim|required');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[new_password]');
                  if($this->form_validation->run() == TRUE)
                  {
                    $data['password']= md5($this->input->post('new_password'));
                      $cust_id=$this->input->post('user_code');
                      //echo "$cust_id"; die("hbv hjb");
                      $update=$this->Reset_model->update_password($data,$cust_id);
                      $update_status=$this->Reset_model->update_status($cust_id);
                        unset($_SESSION['user_code']);
                      $this->session->set_flashdata('success_msg', 'You have successfully reset your password.');
                     	//redirect('home');


                  }
            }

             /*$data['pages_data'] = $this->Reset_model->get_sng_pages_data();

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
    $this->template->set('MainIndex',$robotindex );*/

         $this->template->set_layout('layout_main', 'front');

        $this->template->build('setpassword');
    }
    
     /*public function invalidtoken()
    {
       $this->template->set_layout('layout_main', 'front');

        $this->template->build('invalidtoken');
    }
*/
	 





	

	

	

}

