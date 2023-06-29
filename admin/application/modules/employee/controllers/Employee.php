<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Employee extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Employee_model');
    }

    //===================================================================

    public function index()
    {
        $data_get = $this->Employee_model->get_data();

        $data['allemployee_row'] = $data_get;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Employee | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('employee', $data);
    }

    /*================================ Add Employee===========================*/

    public function addemployee()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $this->form_validation->set_rules('full_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|trim');

            if ($this->form_validation->run()) {
                $data_employee = [];
                $usercode = $this->Employee_model->getCurrentEmpCode();
                $data_employee['emp_code'] = $usercode;
                $hash_key = base64_encode(hash_hmac('sha256', $data_employee['emp_code'] . time(), true));

                $data_employee['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_employee['full_name'])));
                $data_employee['profile_url'] = $profile_url;
                $slug = $data_employee['profile_url'];
                $url = $this->Employee_model->check_url($slug);
       
                $count = count($url);
                if ($count == 0) {
                    $profile_url = $slug;
                } else {
                    $profile_url = $slug . "-" . $count;
                }

                $supervisor_name = $this->input->post('supervisor_name');

                if($supervisor_name == '') {
                    $supervisor_name = NULL;
                }

                $user_email = $this->input->post('email');

                if( $user_email == '' ) {
                    $user_email = NULL;
                }

                $data_employee['email'] = strip_tags($user_email);
                $data_employee['mobile'] = $this->input->post('mobile');
                $data_employee['status'] = $this->input->post('status');
                $data_employee['supervisor_name'] =  $supervisor_name;
                $data_employee['user_type'] = 1;
                $data_employee['created_on'] = date('Y-m-d');
                $data_employee['updated_on'] = date('Y-m-d H:i:s');

                $this->load->library('upload');
                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
                    $_FILES['userfile']['name']     = $_FILES['profile_photo']['name'];
                    $_FILES['userfile']['type']     = $_FILES['profile_photo']['type'];
                    $_FILES['userfile']['tmp_name'] = $_FILES['profile_photo']['tmp_name'];
                    $_FILES['userfile']['error']    = $_FILES['profile_photo']['error'];
                    $_FILES['userfile']['size']     = $_FILES['profile_photo']['size'];
                    $config['upload_path']          = '../uploads/users/profile_photo';

                    $config['allowed_types']        = 'png|jpg|jpeg';
                    $config['max_size']             = 100000;
                    $this->upload->initialize($config);


                    if (!$this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());
                    } else {

                        $final_files_data[] = $this->upload->data();
                        $data_employee['profile_photo'] = $final_files_data[0]['orig_name'];
                    }
                } else {
                    $data_employee['profile_photo'] = 'default.png';
                }

                $data_user['user_code'] = $usercode;
                $data_user['full_name'] = $data_employee['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = (is_null($data_employee['email']) || $data_employee['email'] == '' )  ? NULL : $data_employee['email'];
                $data_user['mobile'] = $data_employee['mobile'];
                $data_user['ecode'] = $hash_key;
                $data_user['status'] = $data_employee['status'];
                $data_user['user_type'] = $data_employee['user_type'];
                $data_user['created_by'] = $this->session->userdata('user_code');
                $data_user['user_type'] = 1;
                $data_user['profile_photo'] = $data_employee['profile_photo'];
                $data_user['created_on'] = $data_employee['created_on'];
                $data_user['is_mobile_verified'] = '1';
                $data_user1['password1'] = $this->input->post('password');
                $data_user['password'] = md5($data_user1['password1']);

                $this->Employee_model->email_check($data_user['email']);

                $data_inserted_users = $this->Employee_model->add_user($data_user);

                $data_employee['user_id'] = is_null($data_inserted_users) ? 0 : $data_inserted_users;
                $data_employee['address'] = $this->input->post('address');

                $this->Employee_model->add_employee($data_employee);

                $this->Employee_model->saveModulePermissions($data_user['user_code'], $this->input->post('module_actions'));

                $this->session->set_flashdata('success_msg', 'Employee added successfully. New Employee Code Is :- ' . $usercode);
                redirect('admin/employee');               
            }
        }

        $data['supervisor'] = $this->Employee_model->get_supervisor();
        $data['system_module_permissions'] = $this->user_permission_model->getSystemModulePermissions();

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Add Employee | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('addemployee', $data);
    }

    public function everify()
    {
        $hprk = $_REQUEST['hprk'];
        $check = $this->Employee_model->check_user($hprk);
        if ($check) {
            $update = $this->Employee_model->update_status($check->id, $hprk);
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

    public function editemployee($emp_code)
    {
        $data = [];
    
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect('admin/employee');
        }


        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('full_name', 'Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data_employee['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_employee['full_name'])));
                $data_employee['profile_url'] = $profile_url;

                $supervisor_name = $this->input->post('supervisor_name');

                if($supervisor_name == '') {
                    $supervisor_name = NULL;
                }

                $user_email = $this->input->post('email');

                if( $user_email == '' ) {
                    $user_email = NULL;
                } else {
                    $user_email = strip_tags($user_email);
                }

                $data_employee['email'] =  $user_email;
                $data_employee['mobile'] = $this->input->post('mobile');
                $data_employee['supervisor_name'] = $supervisor_name;
                $data_employee['address'] = $this->input->post('address');
                $data_employee['user_type'] = USER_EMPLOYEES;
                $data_employee['updated_on'] = date('Y-m-d H:i:s');

                $this->load->library('upload');
                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {

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


                    if ($this->upload->do_upload()) {
                        $final_files_data[] = $this->upload->data();
                        $data_employee['profile_photo'] = $final_files_data[0]['orig_name'];
                        @unlink("../uploads/users/profile_photo/" . $this->input->post('prev_link'));
                    }
                }

                $data_user['full_name'] = $data_employee['full_name'];
                $data_user['profile_url'] = $profile_url;
                $data_user['email'] = $data_employee['email'];
                $data_user['mobile'] = $data_employee['mobile'];
                $data_user['is_email_verified'] = '1';
                $data_user['user_type'] = USER_EMPLOYEES;
                $data_user['profile_photo'] = $data_employee['profile_photo'];
                $data_user['updated_on'] = $data_employee['updated_on'];
                $data_user['is_mobile_verified'] = '1';
                $data_user['is_email_verified'] = '1';

                $this->Employee_model->edit_employee($data_employee, $emp_code);
                $this->Employee_model->edit_users($data_user, $emp_code);
                $this->Employee_model->saveModulePermissions($emp_code, $this->input->post('module_actions'));

                $this->session->set_flashdata('success_msg', 'Employee edited successfully');
                redirect('admin/employee');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Edit Employee | ' . $site_name);
        $data_single = $this->Employee_model->get_data_by_id($emp_code);

        $data['allemployee_row'] = $data_single;
        $data['system_module_permissions'] = $this->user_permission_model->getSystemModulePermissions();
        $data['user_module_actions'] = $this->user_permission_model->getUserModuleActionIds($emp_code);

        $this->template->set_layout('layout_main', 'front');
        $this->template->build('editemployee', $data);
    }

    /*================================ Delete Data ===========================*/

    public function delete_data($dataid)
    {
        $this->Employee_model->delete_row_data($dataid);
        redirect('admin/employee');
        exit;
    }

    public function inactive($emp_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '0';
            $data_activated = $this->Employee_model->edit_employee($data, $emp_code);
            $this->session->set_flashdata('success_msg', 'Employee Edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function active($emp_code)
    {
        if ($this->uri->segment(3) == "") {
            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $data['status'] = '1';
            $data_activated = $this->Employee_model->edit_employee($data, $emp_code);
            $this->session->set_flashdata('success_msg', 'Employee Edited Successfully');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}
