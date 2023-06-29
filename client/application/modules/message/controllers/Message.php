<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Message extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Message_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$cust_code=$this->session->userdata('user_code');
    	//echo $cust_code; 
        $data_get= $this->Message_model->get_data($cust_code);
        //echo $this->db->last_query();die();
		$data['allmessage_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Message | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('message',$data);
	}
	
	public function message_details()
    {
        $cust_code=$this->session->userdata('user_code');
    	//echo $cust_code; 
        $data_get= $this->Message_model->get_data($cust_code);
        //echo $this->db->last_query();die();
		$data['allmessage_row']=$data_get;
		//print_r($data_get);exit;
        $site_name=$this->config->item('site_name');
        $this->template->set('title', 'Message Details | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('message_details',$data);
	}
	
/*================================ Add Message===========================*/	

	public function send_text_message(){
		
		print_r($_POST);
		print_r($_FILES);
		die("here");
			$data['send_user_id']= strip_tags($this->input->post('send_user_id')) ;
	        $data['message']=$this->input->post('message');
	        $data['receiver_user_id']=$this->session->userdata('user_code');
	        $data['currently_date']= date('Y-m-d');
	        $data['currently_time']= date('H:i:s');
	        //die("kl");
	        if($_FILES["attach_file"]["name"]!='' || $_FILES["attach_file"]["name"]!=null)  
           {  
                $config['upload_path'] = '../uploads/message_attach';  
                $config['allowed_types'] = 'png|jpg|jpeg|pdf|doc';  
                $this->load->library('upload', $config);  
                if(!$this->upload->do_upload('attach_file'))  
                {  
                     echo $this->upload->display_errors();
                     $response = array(
                'status' => 'error',
                'message' => $this->upload->display_errors()
           		 );

                }  
                else  
                {  
                     $data_image = $this->upload->data();  
                     $data['attach_file']= $data_image['file_name'];
                }  
                
                
           }  //die("kl");
	        $data_inserted = $this->Task_model->SendTxtMessage($data);
	        /*print_r($data_inserted);
	        echo $this->db->last_query();exit;*/ 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	


    
         
    
}
