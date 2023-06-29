<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Course extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Course_model'); 
    }
    //===================================================================
    public function index()
    {
		
		
	if( $this->uri->segment(2) )
		{ 
		  $slugdata = $this->uri->segment(2);
		}
	else
		{                            
	
		}		
		
     $data['course_data']= $this->Course_model->get_course_data($slugdata);
	
	 $course_id = $data['course_data'][0]->id;
	 $course_related_id = $data['course_data'][0]->related_courses;
	 $course_name = strip_tags($data['course_data'][0]->course_name);
	 $course_description = strip_tags($data['course_data'][0]->course_description);
	 $course_lecturer_id = $data['course_data'][0]->lecturer_id;
	
	//echo $data['course_data'][0]->id; exit();
      $data['get_course_data']= $this->Course_model->get_all_course_comment($data['course_data'][0]->id);
	 
	 $data['course_related_data']= $this->Course_model->get_all_course_data($course_related_id);
	 $data['get_latest_course_data']= $this->Course_model->get_latest_course_data();
	 $data['upcoming_course_data']= $this->Course_model->get_upcoming_course_data();
	 $data['training_data']= $this->Course_model->get_training_course_data($course_id);
	 $data['syllabus_data']= $this->Course_model->get_syllabus_course_data($course_id);
	 $data['batches_data']= $this->Course_model->get_batches_course_data($course_id);
	 $data['lecturer_data_cs'] = $this->Course_model->get_lecturer_course_data($course_lecturer_id);
	 $data['all_lecturer'] = $this->Course_model->get_all_lecturer($course_lecturer_id);
	 
	 
	
    $data['training_num_row'] = $this->Course_model->countTrainingRow($course_id); 
    $data['syllabus_num_row'] = $this->Course_model->count_syllabus_Row($course_id); 
	
	   $data['sidebar_data'] = $this->Course_model->get_course_side_data(); 
	 
	 $data['comment_num_row'] = $this->Course_model->countCommentRow($course_id); 
	 
     //$data['single_course_data']=$data['course_data'][0]->id;
     //echo $this->db->last_query();;
   
   
   
        $meta_title =  strip_tags($data['course_data'][0]->meta_title); 
		$meta_keyword = strip_tags($data['course_data'][0]->meta_keyword) ;
		$meta_descrip  = strip_tags($data['course_data'][0]->meta_descrip)  ;
	    $canonical_tag  = strip_tags($data['course_data'][0]->canonical_tag) ;
		 $robot_index  = strip_tags($data['course_data'][0]->robot_index) ;
		 $robotindex  = $data['course_data'][0]->robotindex;
   
	
        $this->template->set('title',$meta_title);
        $this->template->set('MetaKeyword',$meta_keyword );
        $this->template->set('MetaDescription',$meta_descrip );
	    $this->template->set('CanonicalTag',$canonical_tag );
		$this->template->set('RobotIndex',$robot_index );
		$this->template->set('MainIndex',$robotindex );
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('course',$data);
    }
	

	
	
	
	
	
	
	
	
}
