<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Courses extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Courses_model'); 
    }
    //===================================================================
    public function index()
    {
		
        $data['courses_list']= $this->Courses_model->get_courses();
		
       
        $data['pages_data'] = $this->Courses_model->get_sng_pages_data();
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
        $this->template->build('courses',$data);
    }
	
	
	function submit_msg()
	{
	$data['course_id']=$this->input->post('course_id');
	$data['rating']=$this->input->post('rating');
	$data['comment']=trim($this->input->post('comment'));
	$data['name']=$this->input->post('name');
	$data['email']=$this->input->post('email');
	//$data['profile_image']=$this->input->post('profile_image');
	$data['date']=date("Y-m-d h:i:sa");
	 $this->Courses_model->insert_comment_data($data);
	redirect('course/'.$this->input->post('url').'');
	}
	

	
	
	
	
	
	
	
	
}
