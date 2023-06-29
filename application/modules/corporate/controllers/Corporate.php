<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Corporate extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

       $this->load->model('Corporate_model'); 

    }

    //===================================================================

    public function index()

    {

		

        $data['pages_data']= $this->Corporate_model->get_pages_data();

		

       	  $data['client_data']= $this->Corporate_model->get_client_logo();

		  

        $data['pages_data'] = $this->Corporate_model->get_sng_pages_data();

	    $meta_title = $data['pages_data'][0]->meta_title ;

		$meta_keyword = $data['pages_data'][0]->meta_keyword ;

		$meta_descrip  = $data['pages_data'][0]->meta_descrip  ;

	   

        $canonical_tag  = $data['pages_data'][0]->canonical_tag;

		$robot_index  = $data['pages_data'][0]->robot_index;

		$robotindex  = $data['pages_data'][0]->robotindex;

	   

        $this->template->set('title',$meta_title);

        $this->template->set('MetaKeyword',$meta_keyword );

        $this->template->set('MetaDescription',$meta_descrip );

	    $this->template->set('CanonicalTag',$canonical_tag );

		

		$this->template->set('RobotIndex',$robot_index );

		$this->template->set('MainIndex',$robotindex );

		

		

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('corporate-training',$data);

    }

	

	public function form_data_submit() 

	{

		

				

		$data['company_name']= strip_tags($this->input->post('cfname'));

		$data['email_id']= strip_tags($this->input->post('cemail'));

		$data['contact_no']= strip_tags($this->input->post('cphone'));

		$data['full_name']= strip_tags($this->input->post('cperson'));

		$data['website']= strip_tags($this->input->post('cwebsite'));

		$data['message_qry']= strip_tags($this->input->post('cmessage'));

		$data['qry_type'] = 'CORPORATE ENQUIRY';

		

		$this->Corporate_model->add_data($data);

		

		







// Admin Email

//$to_admin  = $res_admin->adminemail ; 

$to_admin  = 'inetworkexpertsbarasat@gmail.com'; 



//$to_admin  = 'sanjib6299@gmail.com'; 



// subject

$subject_admin = 'Corporate Training Enquiry | Educaff Pune';





$headers_admin  = 'MIME-Version: 1.0' . "\r\n";

$headers_admin .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers_admin .= 'From: info@educaffpune.in' . "\r\n" .

    'Reply-To:info@educaffpune.in' . "\r\n" .

    'X-Mailer: PHP/' . phpversion();

	

// message

$message_admin ='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">

    <tr>

        <td align="left" valign="top" style="padding-top:4%; background:#fcf8d9;">

           <h3>&nbsp;&nbsp;Educaff Pune</h3> 

        </td>

    </tr>

    <tr>

        <td align="left" valign="top" style="padding:2%; background:#fcf8d9;">

          Dear admin,<br />

           Corporate Training enquiry request received  From <br />

		   		   

		    <br>'.strip_tags($this->input->post('cfname')).'<br>'.strip_tags($this->input->post('cemail')).'<br>'.strip_tags($this->input->post('cphone')).' <br>'.strip_tags($this->input->post('cperson')).'<br>'.strip_tags($this->input->post('cwebsite')).'<br>'.strip_tags($this->input->post('cmessage')).'

        

        </td>

    </tr>

</table>';





mail($to_admin, $subject_admin, $message_admin, $headers_admin);

  

echo "Thank You for taking interest in Educaff Pune. We will get in touch with you shortly!";



		exit;

	

	}

	

	 

	

	

	

	

	

	

	

}

