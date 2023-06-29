<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Profile extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

        $this->load->library('session');

		$this->load->model('Profile_model');

    }

    //===================================================================

    //===================================================================



    public function index()



    {

    	$cust_code=$this->session->userdata('user_code');

    	//echo $cust_code;die("kl");

    	$data_get= $this->Profile_model->get_data($cust_code);

    	

		$data['profile']=$data_get;
		//$data['all_package']= $this->Profile_model->get_package();
		/*print_r($data['all_package']);
		echo $data['all_package'][0]->package_hours; die("kl");*/


        $this->template->set('title','Profile  | '.$this->config->item('site_name'));

        

        

        if ($this->input->server('REQUEST_METHOD') == 'POST')

		{	
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');

            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

			$this->form_validation->set_rules('preference', 'Preference', 'trim|required');



             if ($this->form_validation->run() == TRUE) 

             {
             	$data_customer['full_name']= ucwords(strip_tags($this->input->post('full_name'))) ;

	            $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_customer['full_name'])));
	            $data_customer['profile_url']=$profile_url;
	            $data_customer['dob']= $this->input->post('dob');
	            $data_customer['preference']= $this->input->post('preference');
	            $data_customer['mobile']= $this->input->post('mobile');
                $data_customer['address_line1']= $this->input->post('address_line1');
                $data_customer['address_line2']= $this->input->post('address_line2');
                $data_customer['city']= $this->input->post('city');
                $data_customer['state']= $this->input->post('state');
                $data_customer['country']= $this->input->post('country');
                $data_customer['post_code']= $this->input->post('post_code');
                $data_customer['information']= $this->input->post('information');
	            $data_customer['updated_on']=date('Y-m-d H:i:s');

              //print_r($data_customer);die("here");

             $this->load->library('upload');

                  if($_FILES['profile_photo']['name']!='' || $_FILES['profile_photo']['name']!=null)

                  {
                    $number_of_files_uploadeds = count($_FILES['profile_photo']['name']);
                    // Faking upload calls to $_FILE
                        $_FILES['userfile']['name']     = $_FILES['profile_photo']['name'];
                        $_FILES['userfile']['type']     = $_FILES['profile_photo']['type'];
                        $_FILES['userfile']['tmp_name'] = $_FILES['profile_photo']['tmp_name'];
                        $_FILES['userfile']['error']    = $_FILES['profile_photo']['error'];
                        $_FILES['userfile']['size']     = $_FILES['profile_photo']['size'];
                        $config['upload_path']          = '../uploads/users/profile_photo';
                        $config['allowed_types']        = 'png|jpg|jpeg';
                        $config['max_size']             = 100000;
                        //$config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $this->upload->initialize($config);
                        if (! $this->upload->do_upload()) {
                         $error = array('error' => $this->upload->display_errors());
                        } else {

                            

                            $final_files_data[] = $this->upload->data();

                            /*echo "<pre>";

                            print_r($final_files_data);*/

                             $data_customer['profile_photo']= $final_files_data[0]['orig_name'];

                            @unlink("../uploads/users/profile_photo/".$this->input->post('prev_link'));

                           

                        }

                    }else{

                        $data_customer['profile_photo']= $this->input->post('prev_link');

                    } 

                    

                $data_user['full_name']=$data_customer['full_name'];

                $data_user['profile_url']=$profile_url;

                $data_user['mobile']=$data_customer['mobile'];

                $data_user['updated_on']=$data_customer['updated_on'];

                $data_user['is_mobile_verified']='1';

                $data_user['created_by']=$this->session->userdata('user_code');

                $data_user['profile_photo']=$data_customer['profile_photo'];

                /*print_r($data_customer);

                print_r($data_user);*/

                

                

                $data_updated_customer = $this->Profile_model->edit_customer($data_customer,$cust_code);

                //echo $this->db->last_query();die("pl");

                $data_updated_users = $this->Profile_model->edit_user($data_user,$cust_code);

                //echo $this->db->last_query();die("pl");
                $data_get_session= $this->Profile_model->get_data($cust_code);
              

                $data_session = array(      
            'mobile'            => $data_get_session->mobile,
            'full_name'         => $data_get_session->full_name,
            'profile_photo'     => $data_get_session->profile_photo,
            );
            $this->session->set_userdata($data_session);
            //print_r($this->session->userdata);die("lk");
 



                $this->session->set_flashdata('success_msg', 'Profile edited Successfully'); 

                redirect('client/profile');

                    

             }

		}



        $this->template->set_layout('layout_main', 'front');



        $this->template->build('profile',$data);

	}

	



	

}

