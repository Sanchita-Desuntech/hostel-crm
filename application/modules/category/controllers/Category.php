<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Category extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');

      	$this->load->model('Category_model'); 

    }

    //===================================================================

    public function index()
    {
    	//$data['get_post']= $this->Category_model->get_post_data();
    	if( $this->uri->segment(2) )
		{ 
				 $slugdata = $this->uri->segment(2);
				 //print_r($slugdata);die("here");
				 $data['get_cat']= $this->Category_model->get_cat_data($slugdata);
				 $data['get_post']= $this->Category_model->get_post_data($data['get_cat']->slug);
				 
				 $data['pages_data'] = $this->Category_model->get_sng_pages_data();

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
				 $this->template->build('movies',$data);
		}
	
	}
		
    
    
    
}

