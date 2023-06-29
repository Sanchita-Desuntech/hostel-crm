<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Media extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Media_model');
    }
    //===================================================================
    public function index()
    {
		
       
        $data_get= $this->Media_model->get_data();
		$data['alldata_row']=$data_get;
        $this->template->set('title', 'Media');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('media',$data);
    
	
	
	}
	
	
/*================================ Add Data===========================*/	
	
public function addmedia()
    {
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['title']= strip_tags($this->input->post('title'));
			
			$data['video_url']= strip_tags($this->input->post('video_url'));
			$data['media_type']= strip_tags($this->input->post('media_type'));
			$data['status']= 0;
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('media_type', 'media_type', 'trim|required');
			
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }
            if ($err_flag==0) {
                
                    $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/media';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);

                      
                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						  $data_inserted = $this->Media_model->add_data($data);
						
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							 $data['image_src']= $final_files_data[0]['file_name'];
                            
                            $data_inserted = $this->Media_model->add_data($data);
                           
                        }
                    

                $this->session->set_flashdata('success_msg', 'Data added Successfully'); 
                redirect('admin/media');				
               
            } else {
				
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				redirect('admin/media/addmedia');
              
            }
		}
		
		else{
	    $this->template->set('title', 'Add Media');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addmedia');
		}
    }
	
/*================================ Edit ===========================*/	

public function editmedia($id)
    {
		if($this->uri->segment(3)=="")
		{
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
			redirect('admin/media');	
		}
		if ($this->input->server('REQUEST_METHOD') == 'POST')
		{
       
	        $data['title']= strip_tags($this->input->post('title'));
		
			$data['video_url']= strip_tags($this->input->post('video_url'));
			$data['media_type']= strip_tags($this->input->post('media_type'));
			
            
            $err_flag=0;
            $err_val=0;
            $this->form_validation->set_rules('title', 'title', 'trim|required');
			$this->form_validation->set_rules('media_type', 'media_type', 'trim|required');
          
            if ($this->form_validation->run() == false) {
                $err_flag=1;
            }
            if ($err_flag==0) {
                
                    $this->load->library('upload');
                    $number_of_files_uploaded = count($_FILES['image_src']['name']);

                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['image_src']['name'];
                        $_FILES['userfile']['type']     = $_FILES['image_src']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['image_src']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['image_src']['error'];
                        $_FILES['userfile']['size']     = $_FILES['image_src']['size'];
                        $config['upload_path']          = '../uploads/media';

                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);


                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors()); 
						
                        } else {
							
                            $final_files_data[] = $this->upload->data();
							
							 $data['image_src']= $final_files_data[0]['file_name'];
                            
                            
                           
                        }
                    
                $data_inserted = $this->Media_model->edit_data_image($data,$id);
                $this->session->set_flashdata('success_msg', 'Data edited Successfully'); 
                redirect('admin/media');				
               
            } else {
				
				$this->session->set_flashdata('err_msg', 'Fill All The Fields');  
				$this->template->set('title', 'Edit Media');
				$data_single = $this->Media_model->get_data_by_id($id);
				$data['single_data']=$data_single ;
				$this->template->set_layout('layout_main', 'front');
				$this->template->build('editmedia',$data);
              
            }
		}
		
		else{
	    $this->template->set('title', 'Edit Media');
		$data_single = $this->Media_model->get_data_by_id($id);
		$data['single_data']=$data_single ;
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editmedia',$data);
		}
    }
	
/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid,$data_image)
    {
        $this->Media_model->delete_row_data($dataid);
		$path_file = '../uploads/media/'.base64_decode($data_image);
		unlink($path_file);
		redirect('admin/media');
        exit;
    }
			
	
	
	
	
	
	
	
	
}
