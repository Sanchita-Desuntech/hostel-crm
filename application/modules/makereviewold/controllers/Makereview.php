<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Makereview extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
                
        $this->load->library('form_validation');

      	$this->load->model('Makereview_model'); 

    }

    //===================================================================

    public function index()

    {
    	if( $this->uri->segment(2) )
		{
			 $slugdata = $this->uri->segment(2);
			 $type='r';
			
			 $data['data']= $this->Makereview_model->get_data($slugdata,$type);
			 
			 //print_r($data);die();
			 $user=$this->session->user_code;
			 $data['log_data']= $this->Makereview_model->get_logged($data['data']->recipe_code,$user);
			 if(empty($data['log_data'])){
			 	if ($this->input->server('REQUEST_METHOD') == 'POST')			  
					{
						$data_reviews['description']= strip_tags($this->input->post('description'));
			            $data_reviews['type']= 'R';
			            $data_reviews['user_code']=$this->session->user_code;
			            $data_reviews['ref_code']= strip_tags($this->input->post('ref_code'));
			            $data_reviews['title']= strip_tags($this->input->post('title'));
			            $data_reviews['rate']= strip_tags($this->input->post('star'));
			            $data_reviews['rate_on']=date('Y-m-d H:i:s');
			            $data_reviews['status']= 0;
			            //print_r($data_reviews); die("here");
			           
			            $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 			
			 			if ($this->form_validation->run() == TRUE) 
			 			{
			 				//print_r($data_reviews); die("here");
							$data_inserted = $this->Makereview_model->add_review($data_reviews);

					  	  	$this->session->set_flashdata('success_msg', 'Thank you for your rating.Your rating has been sucessfully submited');

		                	//redirect($_SERVER['HTTP_REFERER']);

			  			}
					}
			 }else{
			 	$this->session->set_flashdata('err_msg', 'Sorry!!You already rated this item...');
			 }
			 
			 $data['pages_data'] = $this->Makereview_model->get_sng_pages_data();

			    $meta_title = $data['data']->recipe_name. ' | '. $data['pages_data'][0]->meta_title;
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
       		 $this->template->build('makereview',$data);
		}
		
		else
		{
			die("hi");
		}


	}
	
}

