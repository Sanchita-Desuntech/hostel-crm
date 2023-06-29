<?php 
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Supervisor extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Supervisor_model');
    }

    //===================================================================
    public function index()
    {
        $data_get = $this->Supervisor_model->get_data();
        $data['allsupervisor_row'] = $data_get;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Supervisor | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('supervisor', $data);
    }

    public function addsupervisor()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            extract($_POST);
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


            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]', 'trim|required');

            if ($this->form_validation->run() == TRUE) {

                $lastid = $this->Supervisor_model->getLastid();
                $usercode = 'SUP' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
                $data_supervisor['sup_code'] = $usercode;
                $hash_key = base64_encode(hash_hmac('sha256', $usercode . time(), true));

                $data_supervisor['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_supervisor['full_name'])));
                $data_supervisor['profile_url'] = $profile_url;
                $slug = $data_supervisor['profile_url'];
                $url = $this->Supervisor_model->check_url($slug);
                $count = count($url);
                if ($count == 0) {
                    $profile_url = $slug;
                } else {
                    $profile_url = $slug . "-" . $count;
                }
                $data_supervisor['email'] = strip_tags($this->input->post('email'));
                $data_supervisor['mobile'] = $this->input->post('mobile');
                $data_supervisor['status'] = $this->input->post('status');
                $data_supervisor['user_type'] = 3;
                $data_supervisor['created_on'] = date('Y-m-d');

                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
                    $file_ext = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $file_ext;
                    $upload_dir = dirname(FCPATH) . '/uploads/users/profile_photo/';

                    if(move_uploaded_file( $_FILES['profile_photo']['tmp_name'], $upload_dir . $newName )) {
                        $data_supervisor['profile_photo'] = $newName;
                    }
                } else {
                    $data_supervisor['profile_photo'] = 'default.png';
                }

                $data_user['user_code'] = $usercode;
                $data_user['full_name'] = $data_supervisor['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_supervisor['email'];
                $data_user['mobile'] = $data_supervisor['mobile'];
                $data_user['status'] = $data_supervisor['status'];
                $data_user['user_type'] = $data_supervisor['user_type'];
                $data_user['created_by'] = $this->session->userdata('user_code');
                $data_user['user_type'] = USER_SUPERVISOR;
                $data_user['profile_photo'] = $data_supervisor['profile_photo'];
                $data_user['ecode'] = $hash_key;
                $data_user['created_on'] = $data_supervisor['created_on'];
                $data_user['is_mobile_verified'] = '1';

                $password =  $this->input->post('password');
                $data_user['password'] = md5($password);

                $user_id = $this->Supervisor_model->add_user($data_user);
                $data_supervisor['user_id'] = $user_id;
                $this->Supervisor_model->add_supervisor($data_supervisor);
                $this->Supervisor_model->saveModulePermissions($usercode, $this->input->post('module_actions'));

                $email_data = [
                    'full_name' => $data_user['full_name'],
                    'email' => $data_user['email'],
                    'mobile' => $data_user['mobile'],
                    'password' => $password,
                    'hash_key' => $hash_key
                ];

                // $this->Supervisor_model->sendNotificationEmails($email_data);
                $this->session->set_flashdata('success_msg', 'Supervisor added successfully');
                redirect('admin/supervisor');
            }
        }


        $data['system_module_permissions'] = $this->user_permission_model->getSystemModulePermissions();

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Add Supervisor | ' . $site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addsupervisor', $data);
    }

    public function everify()
    {
        $hprk = $_REQUEST['hprk'];
        $check = $this->Supervisor_model->check_user($hprk);
        if ($check) {
            $update = $this->Supervisor_model->update_status($check->id, $hprk);
            $this->session->set_flashdata('success_msg', 'Email is successfully verified. Please login to your account');
            echo "Thank You";
            die();
            // redirect('admin/employee');
        } else {
            echo "hi";
            //redirect('userregistration/invalidtoken');
        }
    }

    /*================================ Edit ===========================*/
    public function editsupervisor($sup_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect('admin/supervisor/supervisor');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            extract($_POST);
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules(
                'email', 'Email',
                    array(
                            'trim',
                            'required',
                            'valid_email',
                            array(
                                    'email_callable',
                                    function($email) use($sup_code)
                                    {
                                        $sql = "SELECT * FROM tbl_users WHERE user_code = ?";
                                        $user = $this->db->query($sql, [$sup_code])->row();

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

            if ($this->form_validation->run()) {
                $data_supervisor['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_supervisor['full_name'])));
                $data_supervisor['profile_url'] = $profile_url;
                $data_supervisor['email'] = strip_tags($this->input->post('email'));
                $data_supervisor['mobile'] = $this->input->post('mobile');
                $data_supervisor['status'] = '1';
                $data_supervisor['created_on'] = date('Y-m-d');
                $data_supervisor['updated_on'] = date('Y-m-d H:i:s');

                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
                    $file_ext = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $file_ext;
                    $upload_dir = dirname(FCPATH) . '/uploads/users/profile_photo/';

                    if(move_uploaded_file( $_FILES['profile_photo']['tmp_name'], $upload_dir . $newName )) {
                        $data_supervisor['profile_photo'] = $newName;
                    }
                }

                $data_user['full_name'] = $data_supervisor['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_supervisor['email'];
                $data_user['mobile'] = $data_supervisor['mobile'];
                $data_user['status'] = '1';
                $data_user['created_by'] = $this->session->userdata('user_code');

                $data_menu_access['menu_ids'] = json_encode($menu_name);
                $data_menu_access['user_id'] = $sup_code;

                $this->Supervisor_model->edit_supervisor($data_supervisor, $sup_code);
                $this->Supervisor_model->edit_users($data_user, $sup_code);
                $this->Supervisor_model->saveModulePermissions($sup_code, $this->input->post('module_actions'));
               
                $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully');
                redirect('admin/supervisor');
            }
        }

        $data_single = $this->Supervisor_model->get_data_by_id($sup_code);
        
        $data['allsupervisor_row'] = $data_single;
        $data['system_module_permissions'] = $this->user_permission_model->getSystemModulePermissions();
        $data['user_module_actions'] = $this->user_permission_model->getUserModuleActionIds($sup_code);

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Edit Supervisor | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editsupervisor', $data);
    }

    /*================================ Delete Data ===========================*/
    public function delete_data($sup_code)
    {
        $this->Supervisor_model->delete_row_data($sup_code);
        redirect('admin/supervisor');
        exit;
    }

    public function inactive($sup_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '0';
            $data_activated = $this->Supervisor_model->edit_supervisor($data, $sup_code);
            $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function active($sup_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '1';
            $data_activated = $this->Supervisor_model->edit_supervisor($data, $sup_code);
            $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function userpermission($sup_code)
    {
        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('admin/supervisor/supervisor');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            /*echo "<pre>";
			print_r($_POST);
			print_r($_FILES);
			die("here");*/
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data_supervisor['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_supervisor['full_name'])));
                $data_supervisor['profile_url'] = $profile_url;
                $data_supervisor['email'] = strip_tags($this->input->post('email'));
                $data_supervisor['mobile'] = $this->input->post('mobile');
                $data_supervisor['status'] = '1';
                $data_supervisor['user_type'] = 3;


                $data_supervisor['created_on'] = date('Y-m-d');
                $data_supervisor['updated_on'] = date('Y-m-d H:i:s');

                $this->load->library('upload');
                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
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


                    if (!$this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {

                        $final_files_data[] = $this->upload->data();
                        /*echo "<pre>";
                            print_r($final_files_data);*/
                        $data_supervisor['profile_photo'] = $final_files_data[0]['orig_name'];
                        @unlink("../uploads/users/profile_photo/" . $this->input->post('prev_link'));
                    }
                } else {
                    $data_supervisor['profile_photo'] = $this->input->post('prev_link');
                }

                $data_user['full_name'] = $data_supervisor['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_supervisor['email'];
                $data_user['mobile'] = $data_supervisor['mobile'];
                $data_user['status'] = '1';
                $data_user['profile_photo'] = $data_supervisor['profile_photo'];

                $data_updated_supervisor = $this->Supervisor_model->edit_supervisor($data_supervisor, $sup_code);
                $data_updated_users = $this->Supervisor_model->edit_users($data_user, $sup_code);


                $this->session->set_flashdata('success_msg', 'Supervisor edited Successfully');
                redirect('admin/supervisor');
            }
        }




        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Edit Supervisor | ' . $site_name);

        $data_single = $this->Supervisor_model->get_data_by_id($sup_code);

        $data['allsupervisor_row'] = $data_single;

        //print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('userpermission', $data);
    }

    public function myqc()
    {
        $data = [];

        $data['qclist'] = $this->Supervisor_model->getMyQc($_SESSION['user_id']);

        // echo '<pre>';
        // print_r($data);
        // die;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'My QC | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('myqc', $data);
    }

    public function allqc()
    {
        $data = [];

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'All QC | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('allqc', $data);
    }

}
