<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Coursesearch extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coursesearch_model'); 
		
    }
    //===================================================================
    public function index()
    {	
    /*  $this->load->view("ajax_post_view");*/
    }

	public function search_data() 
	{
		 $coursename = strip_tags($this->input->post('coursename'));
		
		 $result = $this->Coursesearch_model->search_course_data($coursename);
		 
		
		 if($result)
        {
            $data['courses_list']= $result;
           echo $this->load->view('coursesearch',$data,true);
        }
		 else
		 {
			 echo '<font color="#FFFFFF">No Course Found</font>';
		 }
		
	  	exit;
	
	}
	
	
	
	
	
	
	
}
