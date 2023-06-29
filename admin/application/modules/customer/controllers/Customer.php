<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}


class Customer extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Customer_model');
    }

    public function datatable()
    {
        $search_query = $_GET['search']['value'];
        $limit = $_GET['length'];
        $offset = $_GET['start'];

        $data = $this->Customer_model->getCustomers(
            $search_query,
            $limit,
            $offset
        );

        $data = [
            'draw' => (int)$_GET['draw'],
            'recordsTotal' => $data['recordsTotal'],
            'recordsFiltered' => $data['recordsFiltered'],
            'data' => $data['data']
        ];

        echo json_encode($data);
        die;
    }

    public function index()
    {
        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Customer | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('customer', []);
    }

    /*================================ Add Customer===========================*/

    public function addcustomer()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules(
                'email', 'Email',
                    array(
                            'required',
                            'valid_email',
                            array(
                                    'email_callable',
                                    function($email)
                                    {
                                        $result = $this->db->query("SELECT * FROM tbl_users WHERE email = ? AND not_archived = 1", [$email])->row();
                                        if( !is_null($result) ) {
                                            $this->form_validation->set_message('email_callable', 'Email already exists');
                                            return false;
                                        } 
                        
                                        return true;
                                    }
                            )
                    )
            );
            
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|numeric|exact_length[10]', [
                'exact_length' => 'Mobile should contain 10 digits.'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', 'trim|required');
            $this->form_validation->set_rules('preference', 'Preference', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $lastid = $this->Customer_model->getLastid();
                $usercode = 'CUST' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                $data_customer['cust_code'] = $usercode;
                $hash_key = base64_encode(hash_hmac('sha256', $usercode . time(), true));
                $data_customer['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_customer['full_name'])));
                $data_customer['profile_url'] = $profile_url;
                $slug = $data_customer['profile_url'];
                $url = $this->Customer_model->check_url($slug);
                $count = count($url);
                if ($count == 0) {
                    $profile_url = $slug;
                } else {
                    $profile_url = $slug . "-" . $count;
                }
                $data_customer['email'] = strip_tags($this->input->post('email'));
                $data_customer['mobile'] = $this->input->post('mobile');
                $data_customer['status'] = $this->input->post('status');

                $time_wallet = $this->input->post('time_wallet');
                if (is_null($time_wallet) || $time_wallet == '') {
                    $time_wallet = 0;
                }

                $data_customer['time_wallet'] = $time_wallet;

                $data_customer['dob'] = $this->input->post('dob');
                $data_customer['preference'] = $this->input->post('preference');
                $data_customer['user_type'] = '2';
                $data_customer['created_on'] = date('Y-m-d');
                $data_customer['updated_on'] = date('Y-m-d H:i:s');
                $data_customer['current_package'] = $this->input->post('current_package');

                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {

                    $file_ext = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $file_ext;
                    $upload_dir = UPLOAD_DIR . '/users/profile_photo/';

                    if(move_uploaded_file( $_FILES['profile_photo']['tmp_name'], $upload_dir . $newName )) {
                        $data_customer['profile_photo'] = $newName;
                    }
                } else {
                    $data_customer['profile_photo'] = 'default.png';
                }

                $data_user['user_code'] = $usercode;
                $data_user['full_name'] = $data_customer['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_customer['email'];
                $data_user['mobile'] = $data_customer['mobile'];
                $data_user['status'] = $data_customer['status'];
                $data_user['user_type'] = $data_customer['user_type'];
                $data_user['is_email_verified'] = '0';
                $data_user['created_by'] = $this->session->userdata('user_code');
                $data_user['user_type'] = 2;
                $data_user['profile_photo'] = $data_customer['profile_photo'];
                $data_user['ecode'] = $hash_key;
                $data_user['created_on'] = $data_customer['created_on'];
                $data_user['is_mobile_verified'] = '1';

                $password =  $this->input->post('password');
                $data_user['password'] = md5($password);

                $data_inserted_user = $this->Customer_model->add_user($data_user);
                $data_customer['user_id'] = $data_inserted_user;
                $this->Customer_model->add_customer($data_customer);

                $email_data = [
                    'full_name' => $data_user['full_name'],
                    'email' => $data_user['email'],
                    'mobile' => $data_user['mobile'],
                    'time_wallet' => $data_customer['time_wallet'],
                    'password' => $password,
                    'preference' => $data_customer['preference'],
                    'hash_key' => $hash_key
                ];

                $this->Customer_model->notifyUserByEmail($email_data);

                $this->session->set_flashdata('success_msg', 'Customer added successfully');
                redirect('admin/customer');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Add Customer | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addcustomer', [
            'packages' => $this->Customer_model->getPackages()
        ]);
    }

    public function everify()
    {
        $hprk = $_REQUEST['hprk'];
        $check = $this->Customer_model->check_user($hprk);
        if ($check) {
            $update = $this->Customer_model->update_status($check->id, $hprk);
            $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
            $data['msg'] = "1";
        } else {
            $data['msg'] = "0";
            //redirect('userregistration/invalidtoken');
        }
        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Everify | ' . $site_name);

        $this->template->set_layout('layout_everify.php', 'front');

        $this->template->build('everify', $data);
    }

    ///////////////////////////////////////////////////
    //////////    View Customer      ////////////////////	
    ///////////////////////////////////////////////////	


    public function viewcustomer($cust_code)

    {
        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('admin/customer');
        }





        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Customer Details| ' . $site_name);

        $data_single = $this->Customer_model->get_data_by_id($cust_code);
        $data_task = $this->Customer_model->get_customer_task_data($cust_code);
        $data_payment = $this->Customer_model->get_customer_payment_data_by_id($cust_code);
        $data['singlecustomer_row'] = $data_single;
        $data['alltask_row'] = $data_task;
        $data['allpaymentdata_row'] = $data_payment;
        /*	echo "<pre>";
		print_r($data_single);die();*/

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewcustomer', $data);
    }

    public function editcustomer($cust_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect('admin/customer');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');

            $this->form_validation->set_rules(
                'email', 'Email',
                    array(
                            'required',
                            'valid_email',
                            array(
                                    'email_callable',
                                    function($email) use($cust_code)
                                    {
                                        $sql = "SELECT * FROM tbl_users WHERE user_code = ?";
                                        $user = $this->db->query($sql, [$cust_code])->row();

                                        if( $user->email == $email ) {
                                            return true;
                                        } else {
                                            // check new email available or not
                                            $result = $this->db->query("SELECT * 
                                            FROM tbl_users 
                                            WHERE email = ? AND not_archived = 1", [$email])->row();

                                            if( !is_null($result) ) {
                                                $this->form_validation->set_message('email_callable', 'Email already exists');
                                                return false;
                                            } else{
                                                return true;
                                            }
                                        }
                                    }
                            )
                    )
            );

            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('preference', 'Preference', 'trim|required');

            if ($this->form_validation->run()) {
                $data_customer['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_customer['full_name'])));
                $data_customer['profile_url'] = $profile_url;
                $data_customer['email'] = strip_tags($this->input->post('email'));
                $data_customer['mobile'] = $this->input->post('mobile');
                $data_customer['time_wallet'] = $this->input->post('time_wallet');
                $data_customer['user_type'] = USER_CUSTOMER;
                $data_customer['time_wallet'] = $this->input->post('time_wallet');
                $data_customer['dob'] = $this->input->post('dob');
                $data_customer['preference'] = $this->input->post('preference');
                $data_customer['updated_on'] = date('Y-m-d H:i:s');

                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
                    $file_ext = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $file_ext;
                    $upload_dir = UPLOAD_DIR . '/users/profile_photo/';

                    if(move_uploaded_file( $_FILES['profile_photo']['tmp_name'], $upload_dir . $newName )) {
                        $data_customer['profile_photo'] = $newName;
                    }
                }

                $data_user['full_name'] = $data_customer['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_customer['email'];
                $data_user['mobile'] = $data_customer['mobile'];
                $data_user['user_type'] = USER_CUSTOMER;
                $data_user['is_email_verified'] = '1';
                $data_user['created_by'] = $this->session->userdata('user_code');

                $data_user['profile_photo'] = $data_customer['profile_photo'];
                $data_user['updated_on'] = $data_customer['updated_on'];
                $data_user['is_mobile_verified'] = '1';
                $data_user['is_email_verified'] = '1';

                $this->Customer_model->edit_customer($data_customer, $cust_code);
                $this->Customer_model->edit_users($data_user, $cust_code);


                $this->session->set_flashdata('success_msg', 'Customer Edited Successfully');
                redirect('admin/customer');
            }
        }




        $data_single = $this->Customer_model->get_data_by_id($cust_code);

        $data['allcustomer_row'] = $data_single;


        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Edit Customer | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editcustomer', $data);
    }


    /*================================ Delete Data ===========================*/

    /////////////////////////////
    ///////////////////////////////



    public function viewtask($task_id)

    {

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Task View | ' . $site_name);

        $data_single = $this->Customer_model->get_customer_task_data_by_id($task_id);


        $data['alltaskdata_row'] = $data_single;

        /*echo "<pre>";
		print_r($data_single);die();*/

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewtask', $data);
    }

    public function viewpayment($id)

    {
        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('admin/customer');
        }


        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'View Customer Payment | ' . $site_name);

        $data_single = $this->Customer_model->get_payment_data_by_id($id);

        $data['allpayment_row'] = $data_single;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewpayment', $data);
    }

    public function weblogin($cust_id)
    {
        $data_get = $this->Customer_model->get_weblogin_data($cust_id);

        $data['customer_id'] = $cust_id;
        $data['customer_weblogin_row'] = $data_get;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Weblogin | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('weblogin', $data);
    }

    public function addweblogin($cust_id)
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('website', 'Website ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Or Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password ', 'required|min_length[8]');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'email' => $this->input->post('email'),
                    'website' => $this->input->post('website'),
                    'password' => $this->input->post('password'),
                    'cust_code' => $cust_id
                ];

                $this->Customer_model->add_weblogin($data);
                $this->session->set_flashdata('success_msg', 'Weblogin Added Successfully');

                redirect('admin/customer');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Add Weblogin | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addweblogin');
    }


    /*================================ Edit weblogin===========================*/
    public function editweblogin($id)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect('admin/customer');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('website', 'Website ', 'trim|required');
            $this->form_validation->set_rules('email', 'Email Or Username', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'email' => $this->input->post('email'),
                    'website' =>  $this->input->post('website'),
                    'password' =>  $this->input->post('password')
                ];

                $this->Customer_model->edit_single_weblogin($data, $id);
                $this->session->set_flashdata('success_msg', 'Weblogin Edited Successfully');
                redirect('admin/customer');
            }
        }


        $data_single = $this->Customer_model->get_single_weblogin_data_by_id($id);

        $data['singleweblogindata_row'] = $data_single;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Edit Weblogin | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editweblogin', $data);
    }

    public function delete_data($cust_code)
    {
        $this->Customer_model->delete_row_data($cust_code);
        redirect('admin/customer');
        exit;
    }

    public function inactive($cust_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '0';
            $data_activated = $this->Customer_model->edit_customer($data, $cust_code);
            $this->session->set_flashdata('success_msg', 'customer edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function active($cust_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '1';
            $data_activated = $this->Customer_model->edit_customer($data, $cust_code);
            $this->session->set_flashdata('success_msg', 'customer edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    /*public function featured($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '1';
               $data_inserted = $this->customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'customer edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);             
        }
    }

    
    public function normal($id)
    {
        if($this->uri->segment(3)=="")
        {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 
            redirect($_SERVER['HTTP_REFERER']);
        }
        else
        {
               $data['is_feature_profile'] = '0';
               $data_inserted = $this->customer_model->edit_data($data,$id);
               $this->session->set_flashdata('success_msg', 'customer edited Successfully'); 
              redirect($_SERVER['HTTP_REFERER']);              
        }
    }*/
}
