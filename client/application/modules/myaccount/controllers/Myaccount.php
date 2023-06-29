<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Myaccount extends MX_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('utility');

		$this->load->library('form_validation');
		$this->load->library('form_validation');

		$this->load->model('Myaccount_model');
	}

	//===================================================================
	public function index()
	{
		$user_code = $this->session->userdata('user_code');

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');

			$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[8]|alpha_numeric', 'trim|required');

			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');

			if ($this->form_validation->run() == TRUE) {
				$old_password = md5($this->input->post('old_password'));

				$check = $this->Myaccount_model->check_password($old_password, $user_code);

				if ($check) {
					$data['password'] = md5($this->input->post('new_password'));
					$this->Myaccount_model->update_user($data, $user_code);
					$this->session->set_flashdata('success_msg', 'Password successfully updated');
					redirect('client/myaccount');
				} else {
					$this->session->set_flashdata('err_msg', 'Old password doesnot matched');
					redirect('client/myaccount');
				}
			}
		}

		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Change Password | '.$site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('myaccount');
	}
}
