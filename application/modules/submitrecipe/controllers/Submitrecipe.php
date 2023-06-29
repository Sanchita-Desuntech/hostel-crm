<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Submitrecipe extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
       $this->load->model('Submitrecipe_model'); 
    }
    //===================================================================
    public function index()
    {
    	
    	$data['all_difficulty'] = $this->Submitrecipe_model->difficulty_allvalue();
    	$data['all_meal'] = $this->Submitrecipe_model->meal_allvalue();
    	$data['all_unit'] = $this->Submitrecipe_model->unit_allvalue();
    	
    	$data['recipe_category_data']= $this->Submitrecipe_model->get_recipe_category_data();
		
        //$data['pages_data']= $this->Submitrecipe_model->get_pages_data();
		
       
        $data['pages_data'] = $this->Submitrecipe_model->get_sng_pages_data();
        
		
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
		
		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{
			extract($_POST);
			extract($_FILES);
			//echo  "<pre>";
			//print_r($_POST);
			//print_r($_FILES);
			//echo "</pre>";die("hi");
			$lastid=$this->Submitrecipe_model->getLastid("tbl_recipe");
			//print_r($lastid);
			$recipe_code='RECP'.date('Y').str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
			//echo $recipe_code;die("here");
			//INSERT INSTUCTION
			for($i=0;$i<count($inst_name);$i++){
				$this->load->library('upload');
				$_FILES['userfile']['name']=$_FILES['ins_image']['name'][$i];
				$_FILES['userfile']['type'] = $_FILES['ins_image']['type'][$i];
                $_FILES['userfile']['tmp_name'] = $_FILES['ins_image']['tmp_name'][$i];
                $_FILES['userfile']['error']    = $_FILES['ins_image']['error'][$i];
                $_FILES['userfile']['size']     = $_FILES['ins_image']['size'][$i];
                $config['upload_path']          = '../uploads/recipe_image/instruction';
                $config['allowed_types']        = 'png|jpg|jpeg';
                $config['max_size']             = 100000;
                //$config['encrypt_name'] = TRUE;
                //$config['max_width']            = 1024;
                // $config['max_height']           = 768;
                $this->upload->initialize($config);	
                if (! $this->upload->do_upload()) {
                	$error = array('error' => $this->upload->display_errors()); 
				} else {
					$instruction['recipe_code']=$recipe_code;
					$instruction['name']=$inst_name[$i];
					$final_files_data[] = $this->upload->data();    
					$instruction['images']= $final_files_data[$i]['file_name'];
					$data_instuction_insert = $this->Submitrecipe_model->instruction_insert($instruction);
				}			 
				
			}
			//insert into ingradients
			
			for($ig=0;$ig<count($ing_name);$ig++){
				$ingradients['recipe_code']=$recipe_code;
				$ingradients['name']=$ing_name[$ig];
				$ingradients['quantity']=$ing_quantity[$ig];
				$ingradients['unit']=$ing_unit[$ig];
				$data_ingradients_insert = $this->Submitrecipe_model->ingradients_insert($ingradients);
			}
			
			
			//insert nutrituioin element
			
			for($ne=0;$ne<count($ne_name);$ne++){
				$nutrition['recipe_code']=$recipe_code;
				$nutrition['name']=$ne_name[$ne];
				$nutrition['quantity']=$ne_quantity[$ne];
				$nutrition['unit']=$ne_unit[$ne];
				$data_nutrition_insert = $this->Submitrecipe_model->nutrition_insert($nutrition);
			}
			
			
			//die("here");
			
			
			$data['recipe_code']= strip_tags($recipe_code);

			$name=strip_tags($this->input->post('recipe_name'));

			$data['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

			

			$data['recipe_name']= strip_tags($this->input->post('recipe_name'));

			$data['preparetion_time']= strip_tags($this->input->post('preparetion_time'));
			
			$data['user_code']=$this->session->user_code;

			$data['cook_time']= strip_tags($this->input->post('cook_time'));

			$data['serving_people']= strip_tags($this->input->post('serving_people'));

			$data['dificulty']= strip_tags($this->input->post('dificulty'));

			$data['type_of_meal']= strip_tags($this->input->post('type_of_meal'));
			
			$data['category']=json_encode($this->input->post('category'));			
			$data['recipe_type']=strip_tags($this->input->post('recipe_type'));			
			
			
		    
			//print_r($data['category']);die();
			$data['description']= $this->input->post('description');

			$data['is_approved']= '1';
			$data['status']= 0;

			$now = date('Y-m-d');

			$data['created_on'] =$now;
			$data['approve_on']=date('Y-m-d H:i:s');
						

			 $this->form_validation->set_rules('recipe_name', 'Recipe Name', 'trim|required');

			 $this->form_validation->set_rules('preparetion_time', 'Preparetion Time', 'trim|required');

			 $this->form_validation->set_rules('cook_time', 'Cook Time', 'trim|required');

			 $this->form_validation->set_rules('serving_people', 'Serving People', 'trim|required');

			 $this->form_validation->set_rules('dificulty', 'Dificulty', 'trim|required');

			 $this->form_validation->set_rules('type_of_meal', 'Type Of Meal', 'trim|required');

			 $this->form_validation->set_rules('description', 'Description', 'trim|required');
			 
					 $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['feature_image']['name']);



                    // Faking upload calls to $_FILE

                        $_FILES['userfile']['name']     = $_FILES['feature_image']['name'];

                        $_FILES['userfile']['type']     = $_FILES['feature_image']['type'];

                        $_FILES['userfile']['tmp_name'] = $_FILES['feature_image']['tmp_name'];

                        $_FILES['userfile']['error']    = $_FILES['feature_image']['error'];

                        $_FILES['userfile']['size']     = $_FILES['feature_image']['size'];

                        $config['upload_path']          = '../uploads/recipe_image';
                        $config['allowed_types']        = 'png|jpg|jpeg';

                        $config['max_size']             = 100000;
                        //$config['encrypt_name'] = TRUE;

                        //$config['max_width']            = 1024;

                        // $config['max_height']           = 768;

                        $this->upload->initialize($config);





                        if (! $this->upload->do_upload()) {

                         $error = array('error' => $this->upload->display_errors()); 

                        

                        } else {

                            

                            $final_files_data_recipe[] = $this->upload->data();

                            

                             $data['feature_image']= $final_files_data_recipe[0]['file_name'];
                            
                            

			  if ($this->form_validation->run() == TRUE) {

			  	

			  	  $data_inserted = $this->Submitrecipe_model->add_data($data);

			  	  $this->session->set_flashdata('success_msg', 'Recipe added Successfully'); 

                	//redirect('admin/recipe/viewrecipe');
                	redirect($_SERVER['HTTP_REFERER']);
                	
				}

			  }

			

		}
		
		
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('submitrecipe',$data);
    }
	
	
	 
	
	
	
	
	
	
	
}
