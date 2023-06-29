<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Movies extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');

      	$this->load->model('Movies_model'); 

    }

    //===================================================================

    public function index()
    {
    	
    	if( $this->uri->segment(2) )
			{ 
				 $slugdata = $this->uri->segment(2);
				 //print_r($slugdata);die("here");
				 $data['movie_single_data'] = $this->Movies_model->get_single_movie_data($slugdata);
		    	 $data['related_movie'] = $this->Movies_model->get_related_video($data['movie_single_data']->movie_type);
		    	 
		    	 
		    	 $data['pages_data'] = $this->Movies_model->get_details_sng_pages_data();
					  /*echo "<pre>";
					  print_r($data);die();*/
					  
					$meta_title = $data['movie_single_data']->movies_slug. ' | '. $data['pages_data'][0]->meta_title;
					$this->template->set('title',$meta_title);
			        $this->template->set('MetaKeyword',$meta_keyword );
			        $this->template->set('MetaDescription',$meta_descrip );
				    $this->template->set('CanonicalTag',$canonical_tag );
					$this->template->set('RobotIndex',$robot_index );
					$this->template->set('MainIndex',$robotindex );
				 
				 $this->template->set_layout('layout_main', 'front');
				 $this->template->build('movies_single',$data);
			}
			else
			{
				$data['pages_data'] = $this->Movies_model->get_sng_pages_data();

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

		        $this->template->build('movies', $data);
			}
		
    	
		
		
			
    		
		}
    
    
	
	
    
}

