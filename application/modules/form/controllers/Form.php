<?php if (! defined('BASEPATH')) {



    exit('No direct script access allowed');



}



class Form extends MX_Controller



{



    public function __construct()



    {



        parent::__construct();



        $this->load->model('Form_model'); 



		



    }



    //===================================================================



    public function index()



    {	



    /*  $this->load->view("ajax_post_view");*/



    }







	public function form_data_submit() 



	{



		$data['full_name']= strip_tags($this->input->post('full_name'));



		$data['email_id']= strip_tags($this->input->post('email_id'));



		$data['contact_no']= strip_tags($this->input->post('contact_no'));



		$data['city_nm']= strip_tags($this->input->post('city_nm'));



		$data['area_nm']= strip_tags($this->input->post('area_nm'));

		

		date_default_timezone_set("ASIA/kolkata");

        $nowdate =  date("d-m-Y h:i:s a");

		

		$data['addon'] = $nowdate ;



		if($this->input->post('qry_type')!=''){



		$data['qry_type']= strip_tags($this->input->post('qry_type'));



		}



		



		if($this->input->post('message_qry')!=''){



		$data['message_qry']= strip_tags($this->input->post('message_qry'));



		}



			



		if($this->input->post('subject_qry')!=''){



		$data['subject_qry']= strip_tags($this->input->post('subject_qry'));



		}



		



		if($this->input->post('course_name')!=''){



		$data['coursename']= strip_tags($this->input->post('course_name')); 



		}



		



		$this->Form_model->add_data($data);



		



		















// Admin Email







$to_admin  = 'inetworkexpertsbarasat@gmail.com'; 



//$to_admin  = 'sanjib6299@gmail.com'; 





$subject_admin = $data['qry_type'].' | Educaff ';











$headers_admin  = 'MIME-Version: 1.0' . "\r\n";



$headers_admin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";



$headers_admin .= 'From: info@educaffpune.in' . "\r\n" .



    'Reply-To:info@educaffpune.in' . "\r\n" .



    'X-Mailer: PHP/' . phpversion();







$message_admin ='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">



    <tr>



        <td align="left" valign="top" style="padding-top:4%; background:#fcf8d9;">



           <h3>&nbsp;&nbsp;Educaff Bangalore</h3> 



        </td>



    </tr>



    <tr>



        <td align="left" valign="top" style="padding:2%; background:#fcf8d9;">



          Dear admin,<br />



           Contact Enquiry request received  From <br />



		    <br>'.strip_tags($this->input->post('full_name')).'<br>'.strip_tags($this->input->post('email_id')).'<br>'.strip_tags($this->input->post('contact_no')).' <br>'.$data['subject_qry'].'<br>'.$data['message_qry'].'<br>'.$data['coursename'].'<br>'.$data['area_nm'].'



        



        </td>



    </tr>



</table>';











mail($to_admin, $subject_admin, $message_admin, $headers_admin);



  



echo "Thank You for taking interest in Educaff. We will get in touch with you shortly!";







		exit;



	



	}



	



	



	



	



	



	



	



}



