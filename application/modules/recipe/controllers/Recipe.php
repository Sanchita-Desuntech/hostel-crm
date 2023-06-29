<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Recipe extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');

      	$this->load->model('Recipe_model'); 

    }

    //===================================================================

    public function index()

    {
    	$data['recipe_single_data']= $this->Recipe_model->get_single_recipe_data($slugdata);
    	$data['recipe_category_data']= $this->Recipe_model->get_recipe_category_data();
    	
    	
    	if( $this->uri->segment(2) )
		{ 
			 $slugdata = $this->uri->segment(2);
			 
			 if($slugdata=='category')
			 {
			 	redirect(base_url());
			 	
			 }
			 else if($slugdata=='featured')
			 {
			 	
				$data['featured_recipe_data']= $this->Recipe_model->get_recipe_featured_data();
				$data['recipe_category_data']= $this->Recipe_model->get_recipe_category_data();
					
					
		    	$data['pages_data'] = $this->Recipe_model->get_sng_pages_data();

			    $meta_title = $data['recipe_category_data'][0]->recipe_name. ' | '. $data['pages_data'][0]->meta_title; ;
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
		        $this->template->build('featured_recipe',$data);
			 	
			 }
			 else
			 {
			 	 
				  //Single Recipe show
				  $data['recipe_single_data']= $this->Recipe_model->get_single_recipe_data($slugdata);
				  $data['count_review_data']= $this->Recipe_model->count_review($data['recipe_single_data'][0]->recipe_code);
				  
				  $data['recipe_comments']= $this->Recipe_model->get_all_comments($data['recipe_single_data'][0]->recipe_code);
				  $data['comment_count']= $this->Recipe_model->count_comments($data['recipe_single_data'][0]->recipe_code);
				  
				  $data['pages_data'] = $this->Recipe_model->get_details_sng_pages_data();
				  /*echo "<pre>";
				  print_r($data);die();*/
				  
				$meta_title = $data['recipe_single_data'][0]->recipe_name. ' | '. $data['pages_data'][0]->meta_title;
				$meta_keyword = $data['recipe_single_data'][0]->meta_keyword ;
				$meta_descrip  = $data['recipe_single_data'][0]->meta_descrip  ;
		        $canonical_tag  = $data['recipe_single_data'][0]->canonical_tag  ;
				$robot_index  = $data['recipe_single_data'][0]->robot_index  ;
				$robotindex  = $data['recipe_single_data'][0]->robotindex  ;
			   
		        $this->template->set('title',$meta_title);
		        $this->template->set('MetaKeyword',$meta_keyword );
		        $this->template->set('MetaDescription',$meta_descrip );
			    $this->template->set('CanonicalTag',$canonical_tag );
				$this->template->set('RobotIndex',$robot_index );
				$this->template->set('MainIndex',$robotindex );
				
				if ($this->input->server('REQUEST_METHOD') == 'POST')

					{
						$data_comments['description']= strip_tags($this->input->post('description'));
			            $data_comments['type']= 'R';
			            $data_comments['user_code']=$this->session->user_code;
			            $data_comments['ref_code']= strip_tags($this->input->post('ref_code'));
			            $data_comments['parent']= strip_tags($this->input->post('parent'));
			            $data_comments['rate_on']=date('Y-m-d H:i:s');
			            $data_comments['status']= 0;
			            $data_comments['rate']= 0;			           
			            
			            $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 			
			 			if ($this->form_validation->run() == TRUE) 
			 			{
							$data_inserted = $this->Recipe_model->add_comments($data_comments);

					  	  	$this->session->set_flashdata('success_msg', 'Comment added Successfully'); 

		                	redirect($_SERVER['HTTP_REFERER']);

			  			}
					}

				
		        $this->template->set_layout('layout_main', 'front');
		        $this->template->build('recipe_single',$data);
			 }
			
		
		}
		    	
	else
		{                            
			
		$data['recipe_data']= $this->Recipe_model->get_recipe_data();
		
		$data['recipe_category_data']= $this->Recipe_model->get_recipe_category_data();
		
			
    	$data['pages_data'] = $this->Recipe_model->get_sng_pages_data();

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
        $this->template->build('recipe',$data);
        
		}	
    	

    }
    
    public function category()
    {
    	$slugcategory = $this->uri->segment(3);
    	
    			$data['category_data']= $this->Recipe_model->get_category_recipe_data($slugcategory);
				$data['recipe_data']= $this->Recipe_model->get_recipe_data();
				
					
		    	$data['pages_data'] = $this->Recipe_model->get_sng_pages_data();

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
		        $this->template->build('category_recipe',$data);
		        
		      

    }
  /*  public function featured()
    {
    	$slugFeature = $this->uri->segment(3);
    	echo $slugFeature;
		echo 'Single Feature View---';
	
    }*/
}

