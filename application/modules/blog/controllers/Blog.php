<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Blog extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();
        
        $this->load->library('session');
        
        $this->load->library('form_validation');

      	$this->load->model('Blog_model'); 

    }

    //===================================================================

    public function index()
    {
    	$data['blog_single_data']= $this->Blog_model->get_single_blog_data($slugdata);
    	$data['blog_category_data']= $this->Blog_model->get_blog_category_data();
    	
    	if( $this->uri->segment(2) )
		{ 
				$slugdata = $this->uri->segment(2);
				
				if($slugdata == 'category')
				{
					echo "Listing Blog";
				}
				
				else if($slugdata == 'featured')
				{
					$data['blog_featured_data'] = $this->Blog_model->get_featured_blog_data();
					//$data['add_comments'] = $this->Blog_model->addcomments();
					
					$data['pages_data'] = $this->Blog_model->get_sng_pages_data();

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

			        $this->template->build('featured_blog',$data);
					
				}
				else
				{
					$data['blog_single_data']= $this->Blog_model->get_single_blog_data($slugdata);
					$data['blog_comments']= $this->Blog_model->get_all_comments($data['blog_single_data'][0]->blog_code);
					$data['comment_count']= $this->Blog_model->count_comments($data['blog_single_data'][0]->blog_code);
					
					$data['pages_data'] = $this->Blog_model->get_details_sng_pages_data();
					  /*echo "<pre>";
					  print_r($data);die();*/
					  
					$meta_title = $data['blog_single_data'][0]->meta_title. ' | '. $data['pages_data'][0]->meta_title;
					$meta_keyword = $data['blog_single_data'][0]->meta_keyword ;
					$meta_descrip  = $data['blog_single_data'][0]->meta_descrip  ;
			        $canonical_tag  = $data['blog_single_data'][0]->canonical_tag  ;
					$robot_index  = $data['blog_single_data'][0]->robot_index  ;
					$robotindex  = $data['blog_single_data'][0]->robotindex  ;
				   
			        $this->template->set('title',$meta_title);
			        $this->template->set('MetaKeyword',$meta_keyword );
			        $this->template->set('MetaDescription',$meta_descrip );
				    $this->template->set('CanonicalTag',$canonical_tag );
					$this->template->set('RobotIndex',$robot_index );
					$this->template->set('MainIndex',$robotindex );
					
					if ($this->input->server('REQUEST_METHOD') == 'POST')

					{
						$data_comments['description']= strip_tags($this->input->post('description'));
			            $data_comments['type']= 'B';
			            $data_comments['user_code']=$this->session->user_code;
			            $data_comments['ref_code']= strip_tags($this->input->post('ref_code'));
			            $data_comments['parent']= strip_tags($this->input->post('parent'));
			            $data_comments['rate_on']=date('Y-m-d H:i:s');
			            $data_comments['status']= 0;
			           
			            
			            $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 			
			 			if ($this->form_validation->run() == TRUE) 
			 			{
							$data_inserted = $this->Blog_model->add_comments($data_comments);

					  	  	$this->session->set_flashdata('success_msg', 'Comment added Successfully'); 

		                	redirect($_SERVER['HTTP_REFERER']);

			  			}
					}
					$this->template->set_layout('layout_main', 'front');

			        $this->template->build('blog_single',$data);
				}
		  		
			 }
		else
		{    
			                        
			$data['blog_data']= $this->Blog_model->get_blog_data();
			$data['blog_category_data']= $this->Blog_model->get_blog_category_data();			
			
    		$data['pages_data'] = $this->Blog_model->get_sng_pages_data();

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

	        $this->template->build('blog',$data);
		}	
    	

    }
    
    public function category()
    {
		$slugcategory = $this->uri->segment(3);
		
				$data['category_data']= $this->Blog_model->get_category_data($slugcategory);
				//$data['blog_data']= $this->Blog_model->get_blog_data();
				$data['blog_category_data']= $this->Blog_model->get_blog_category_data();
				
					
		    	$data['pages_data'] = $this->Blog_model->get_sng_pages_data();

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
		        $this->template->build('category_blog',$data);
	}
	
	public function addcomments()
	{
		
	}
    
}

