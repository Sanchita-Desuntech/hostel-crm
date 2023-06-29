<?php if (!defined('BASEPATH')) {

    exit('No direct script access allowed');
}

class Profile extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Profile_model');
    }


    public function index()
    {
        $user_code = $this->session->userdata('user_code');
        $profileData = $this->Profile_model->getUserProfile($user_code);

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data_user['full_name'] = ucwords(strip_tags($this->input->post('full_name')));
                $profile_url = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data_user['full_name'])));
                $data_user['profile_url'] = $profile_url;
                $data_user['mobile'] = $this->input->post('mobile');

                if ($_FILES['profile_photo']['name'] != '' || $_FILES['profile_photo']['name'] != null) {
                    $file_ext = pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION);
                    $newName = uniqid() . '.' . $file_ext;
                    $upload_dir = dirname(FCPATH) . '/uploads/users/profile_photo/';

                    if(move_uploaded_file( $_FILES['profile_photo']['tmp_name'], $upload_dir . $newName )) {
                        $data_user['profile_photo'] = $newName;
                    }
                }

                $this->Profile_model->edit_user($data_user, $user_code);

                $this->session->set_userdata('full_name', ucwords(strip_tags($this->input->post('full_name'))));
                $this->session->set_userdata('profile_photo', $data_user['profile_photo']);
                $this->session->set_flashdata('success_msg', 'Profile edited successfully');
                redirect('admin/profile');
            }
        }

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Profile | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('profile', [
            'profile' => $profileData
        ]);
    }
}
