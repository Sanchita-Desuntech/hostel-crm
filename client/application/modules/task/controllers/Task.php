<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Task extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();     //common function for session checking.

        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Task_model');
    }

    //===================================================================

    public function index()
    {
        $cust_code = $this->session->userdata('user_code');
        $data_get = $this->Task_model->get_data($cust_code);

        $data['alltask_row'] = $data_get;

        $site_name = $this->config->item('site_name');
        $this->template->set('title', 'Task | ' . $site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('task', $data);
    }

    public function details($task_id)
	{
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Task Details | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('details', [
			'task' => $this->Task_model->getTaskDetails($task_id),
            'site_name' => $site_name,
            'comments'   => $this->Task_model->getTaskComments($task_id)
		]);
	}

    public function conversation()
    {
        $data = [
			'task_id' => $this->input->post('task_id'),
			'task_code' => $this->input->post('task_code'),
			'message' => $this->input->post('message'),
		];

		if( $data['message'] == '' ) {
			$this->session->set_flashdata('err_msg', 'Message is required');
			redirect('client/task/details/'.$data['task_code']);
		}
        
        $attach_files = [];
		if( !empty($_FILES['chat_attachments']['name']) ) {
			$attachment_name = $_FILES['chat_attachments']['name'];
			$file_ext = pathinfo($attachment_name, PATHINFO_EXTENSION);
			$newName = uniqid() . '.' . $file_ext;
			$upload_dir = UPLOAD_DIR . '/chat/';
			if(move_uploaded_file( $_FILES['chat_attachments']['tmp_name'], $upload_dir . $newName )) {
                $attach_files[] = $newName;
			}
		}
		$data['attachments'] = $attach_files;

        $this->Task_model->addConversation($data);
		$this->session->set_flashdata('success_msg', 'Message send successfully');
		redirect('client/task/details/'.$data['task_code']);
    }

    /*================================ Add Task===========================*/
    public function addtask()
    {
        // print_r($_FILES);
        //     print_r($_POST);
        //     die("here");
        $cust_code = $this->session->userdata('user_code');
        $data_class['customer'] = $this->Task_model->get_customer($cust_code);
        // print_r($data_class['customer']);
        // echo $data_class['customer']->time_wallet; 
        // die("kol");
        $data_class['res_service'] = $this->Task_model->get_service();
        $get_data = $this->Task_model->get_data($cust_code);
        //print_r($get_data); die("lop");

        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            $lastid = $this->Task_model->getLastid();
            $taskcode = 'TASK' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);
            $data['task_id'] = $taskcode;
            $data['task_name'] = ucwords(strip_tags($this->input->post('task_name')));
            $data['service_code'] = $this->input->post('service_code');
            //$data['service_name']= ucwords(strip_tags($this->input->post('service_name'))) ;
            $data['task_desp'] = $this->input->post('task_desp');
            //$data['service_name']= $this->input->post('service_name');
            $data['customer_code'] = $this->session->userdata('user_code');
            $data['task_priority'] = $this->input->post('task_priority');
            $data['task_status'] = 'Not Assigned';
            $data['status'] = 0;
            $data['created_on'] = date('Y-m-d');
            //       echo "<pre>";
            //       print_r($data);
            //  print_r($_FILES);
            //       print_r($_POST);
            //die("here");
            $this->load->library('upload');
            if ($_FILES['attach_file']['name'] != '' || $_FILES['attach_file']['name'] != null) {
                $number_of_files_uploadeds = count($_FILES['attach_file']['name']);

                // Faking upload calls to $_FILE
                $_FILES['userfile']['name']     = $_FILES['attach_file']['name'];
                $_FILES['userfile']['type']     = $_FILES['attach_file']['type'];
                $_FILES['userfile']['tmp_name'] = $_FILES['attach_file']['tmp_name'];
                $_FILES['userfile']['error']    = $_FILES['attach_file']['error'];
                $_FILES['userfile']['size']     = $_FILES['attach_file']['size'];
                $config['upload_path']          = '../uploads/task';

                $config['allowed_types']        = 'png|jpg|jpeg|pdf|doc|docx|zip';
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
                    $data['attach_file'] = $final_files_data[0]['file_name'];
                    // @unlink("../uploads/message_attach/".$this->input->post('prev_link'));

                }
            }

            $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
            $this->form_validation->set_rules('task_priority', 'Task Priority ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                if ($data_class['customer']->time_wallet == '0') {
                    $this->session->set_flashdata('err_msg', 'You have no balance in time wallet.Please recharge.');
                    redirect('client/task/addtask');
                } else {
                    $data_inserted = $this->Task_model->add_task($data);
                }
                if ($data_inserted) {
                    $message = "";
                    $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                    $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";
                    $message .= '<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Task Details </h5></td></tr>
	                <tr><th style="text-align: left;">Customer Name</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
	                <tr><th style="text-align: left;">Task Name</th><td>' . $data['task_name'] . '</td></tr>
	                <tr><th style="text-align: left;">Task Description</th><td>' . $data['task_desp'] . '</td></tr>
	                <tr><th style="text-align: left;">Attach File</th><td><a href=' . base_url() . 'uploads/task/' . $data["attach_file"] . '>View</a></td></tr>
	                </table></div>';

                    $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
                        <table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical © " . date("Y") . " . All Rights Reserved</p></td></tr></table></div></div></body>";
                    //echo $message;
                    $subject = $this->session->userdata('full_name') . ' created a new task ';
                    //echo $subject;die("here");
                    $headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
                    $headersad .= "MIME-Version: 1.0" . "\r\n";
                    $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headersad .= "X-Mailer: PHP/" . phpversion();
                    $to1 = "desuntechnology@gmail.com";
                    $to3 = "info@Valogical.com";
                    $to2 = $this->session->userdata('email');

                    if (mail($to2, $subject, $message, $headersad) && mail($to1, $subject, $message, $headersad) && mail($to3, $subject, $message, $headersad)) {

                        $this->session->set_flashdata('success_msg', 'Task Added Successfully');
                        redirect('client/task');
                    }
                } else {
                    $this->session->set_flashdata('error_msg', 'Task is not posted');
                    redirect('client/task');
                }
            }
        }
        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Add Task | ' . $site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addtask', $data_class);
    }


    /*================================ Edit ===========================*/

    public function edittask($task_id)

    {
        $cust_code = $this->session->userdata('user_code');
        $data['customer'] = $this->Task_model->get_customer($cust_code);
        $data['res_service'] = $this->Task_model->get_service();
        //echo "<pre>";print_r($data['res_service']);



        if ($this->uri->segment(3) == "") {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically');

            redirect('client/task');
        }

        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            /*print_r($_POST);
			die("here");*/
            $this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
            $this->form_validation->set_rules('task_priority', 'Task Priority ', 'trim|required');

            if ($this->form_validation->run() == TRUE) {
                $data_task['task_name'] = ucwords(strip_tags($this->input->post('task_name')));
                $data_task['service_code'] = $this->input->post('service_code');
                $data_task['task_desp'] = $this->input->post('task_desp');
                $data_task['task_priority'] = $this->input->post('task_priority');
                $data_task['updated_on'] = date('Y-m-d H:i:s');

                $this->load->library('upload');
                if ($_FILES['attach_file']['name'] != '' || $_FILES['attach_file']['name'] != null) {
                    $number_of_files_uploadeds = count($_FILES['attach_file']['name']);

                    // Faking upload calls to $_FILE
                    $_FILES['userfile']['name']     = $_FILES['attach_file']['name'];
                    $_FILES['userfile']['type']     = $_FILES['attach_file']['type'];
                    $_FILES['userfile']['tmp_name'] = $_FILES['attach_file']['tmp_name'];
                    $_FILES['userfile']['error']    = $_FILES['attach_file']['error'];
                    $_FILES['userfile']['size']     = $_FILES['attach_file']['size'];
                    $config['upload_path']          = '../uploads/task';

                    $config['allowed_types']        = 'png|jpg|jpeg|pdf|doc|docx|zip';
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
                        $data_task['attach_file'] = $final_files_data[0]['file_name'];
                        // @unlink("../uploads/message_attach/".$this->input->post('prev_link'));

                    }
                }
            }
            $data_updated = $this->Task_model->edit_data($data_task, $task_id);
            if ($data_updated) {
                $message = "";
                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";
                $message .= '<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Task Details </h5></td></tr>
                    <tr><th style="text-align: left;">Customer Name</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
                    <tr><th style="text-align: left;">Task Name</th><td>' . $data_task['task_name'] . '</td></tr>
                    <tr><th style="text-align: left;">Task Description</th><td>' . $data_task['task_desp'] . '</td></tr>
                    <tr><th style="text-align: left;">Attach File</th><td><a href=' . base_url() . 'uploads/task/' . $data_task["attach_file"] . '>View</a></td></tr>
                    </table></div>';

                $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
                    <table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical © " . date("Y") . " . All Rights Reserved</p></td></tr></table></div></div></body>";
                //echo $message;
                $subject = $this->session->userdata('full_name') . ' updated this task ';
                //echo $subject;die("here");
                $headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/" . phpversion();
                $to1 = "desuntechnology@gmail.com";
                $to3 = "info@Valogical.com";
                $to2 = $this->session->userdata('email');

                if (mail($to2, $subject, $message, $headersad) && mail($to1, $subject, $message, $headersad) && mail($to3, $subject, $message, $headersad)) {

                    $this->session->set_flashdata('success_msg', 'Task Updated Successfully');
                    redirect('client/task');
                }
            } else {
                $this->session->set_flashdata('error_msg', 'Task is not posted');
                redirect('client/task');
            }
        }

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'Edit Task | ' . $site_name);

        $data_single = $this->Task_model->get_data_by_id($task_id);

        $data['alltaskdata_row'] = $data_single;

        //print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('edittask', $data);
    }


    /*================================ View ===========================*/

    public function viewtask($task_id)

    {
        $cust_code = $this->session->userdata('user_code');
        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'View Task | ' . $site_name);

        $data_single = $this->Task_model->get_data_by_id($task_id);

        $data['alldata_row'] = $data_single;

        $data_msg_all = $this->Task_model->get_data_by_message($task_id, $cust_code);

        $data['allmsg_row'] = $data_msg_all;

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewtask', $data);
    }

    public function msgsend()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            //
            /*print_r($_POST);
			print_r($_FILES);
			die("here");*/
            $data['send_user_id'] = $this->input->post('send_user_id');
            $data['receiver_user_id'] = $this->input->post('receiver_user_id');
            $data['message'] = $this->input->post('message');
            $data['task_code'] = $this->input->post('task_code');
            $data['currently_date'] = date('Y-m-d');
            $data['currently_time'] = date('H:i:s');
            //die("lo");

            $this->load->library('upload');
            if ($_FILES['attach_file']['name'] != '' || $_FILES['attach_file']['name'] != null) {
                $number_of_files_uploadeds = count($_FILES['attach_file']['name']);

                // Faking upload calls to $_FILE
                $_FILES['userfile']['name']     = $_FILES['attach_file']['name'];
                $_FILES['userfile']['type']     = $_FILES['attach_file']['type'];
                $_FILES['userfile']['tmp_name'] = $_FILES['attach_file']['tmp_name'];
                $_FILES['userfile']['error']    = $_FILES['attach_file']['error'];
                $_FILES['userfile']['size']     = $_FILES['attach_file']['size'];
                $config['upload_path']          = '../uploads/message_attach';

                $config['allowed_types']        = 'png|jpg|jpeg|pdf|doc|docx|zip';
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
                    $data['attach_file'] = $final_files_data[0]['file_name'];
                    // @unlink("../uploads/message_attach/".$this->input->post('prev_link'));

                }
            } //die("loop");



            $data_insert = $this->Task_model->add_message($data);
            if ($data_insert) {
                $message = "";
                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";

                $message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Message Details </h3>
                <tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
	                <tr><th style="text-align: left;">From</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
	               
	                <tr><th style="text-align: left;">Task Name</th><td>' . $data['task_code'] . '</td></tr>
	                <tr><th style="text-align: left;">Message</th><td>' . $data['message'] . '</td></tr>
	                <tr><th style="text-align: left;">Current Date</th><td>' . $data['currently_date'] . '</td></tr>
	                <tr><th style="text-align: left;">Current Time</th><td>' . $data['currently_time'] . '</td></tr>
	                <tr>';
                if (!empty($data["attach_file"])) {
                    $message .= '<th style="text-align: left;">Attach File</th>
                     <td>
                    <a href=' . base_url() . 'uploads/message_attach/' . $data["attach_file"] . '>View</a>
                    </td>';
                } else {
                    $message .= '<td>
                    </td>';
                }
                $message .= '</tr>
                    </table></div>';

                $message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
                <table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical " . date("Y") . " . All Rights Reserved</p></td></tr></table></div></div></body>";
                //echo $message;

                $subject = "Message Sent Successfully: Valogical";
                $headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
                $headersad .= "MIME-Version: 1.0" . "\r\n";
                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headersad .= "X-Mailer: PHP/" . phpversion();
                $to1 = "bswnth79@gmail.com";
                $to2 = $this->session->userdata('email');

                if (mail($to2, $subject, $message, $headersad) && mail($to1, $subject, $message, $headersad)) {
                    //echo $message;die("here"); 
                    $this->session->set_flashdata('success_msg', 'Message Submitted Successfully');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            // else{
            //         $this->session->set_flashdata('error_msg', 'The given email already exists.');
            //         redirect('client/login');
            // }


        }

        $site_name = $this->config->item('site_name');

        $this->template->set('title', 'View Task | ' . $site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('viewtask');
    }


}
