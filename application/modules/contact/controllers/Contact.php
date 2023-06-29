<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Contact extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Contact_model'); 
    }
    //===================================================================
    public function index()
    {
		
        $data['pages_data']= $this->Contact_model->get_pages_data();
       
       
	   	$data['pages_data'] = $this->Contact_model->get_sng_pages_data();
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
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{
			$name= strip_tags($this->input->post('name'));
			$email= strip_tags($this->input->post('email'));
			$phone= strip_tags($this->input->post('phone'));
			$comments= strip_tags($this->input->post('comments'));
			
				$message ="";
				$message = 'Hi,';
				$message .= "<br/>";
				$message .= '<h3>New Enquiry Received. Please find the details below:</h3><br/><br/>';
				$message .= "First Name: ".$name."<br/>";
				$message .= "Email: ".$email."<br/>";
				$message .= "Phone: ".$phone."<br/>";
				$message .= "Message: ".$comments."<br/>";
				$message .= "<br/><br/>";
				$message .= "Regards,<br/>";
				$message .= "Enquiry: Mirchi Chef";
                $subject = "Enquiry: Mirchi Chef"; 
                
                $headersad = "From: Mirchi Chef <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/".phpversion();    
                $to1="desuntechnology@gmail.com";
                

                if(mail($to1,$subject,$message,$headersad))  {
                   // echo $message;die();
                    $this->session->set_flashdata('success_msg', 'Thank You For Contact Us');
                                    
                }                      

           }
			
	
	   
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('contact',$data);
	
	}
	
	
	
	
	
	
	
	
}
