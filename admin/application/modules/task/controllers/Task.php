<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Task extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('Task_model');
	}

	public function index()
	{
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Task | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('task');
	}

	public function datatable()
    {
        $search_query = $_GET['search']['value'];
        $limit = $_GET['length'];
        $offset = $_GET['start'];
		$user_type = $this->input->get('user_type');

        $data = $this->Task_model->getTasks(
            $search_query,
            $limit,
            $offset,
			$user_type
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

	public function mytask()
	{
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Task | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('mytask');
	}

	public function addtask()
	{
		$data_class['customer'] = $this->Task_model->get_customer();
		$data_class['supervisor'] = $this->Task_model->get_supervisor();
		$data_class['service'] = $this->Task_model->get_service();
		$data_class['employee'] = $this->Task_model->get_employee();

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
			$this->form_validation->set_rules('consume_time', 'Time', 'trim|required');
			$this->form_validation->set_rules('sup_name', 'Supervisor Name', 'trim|required');
			$this->form_validation->set_rules('customer_code', 'Customer Name', 'trim|required');
			$this->form_validation->set_rules('task_priority', 'Task Priority ', 'trim|required');
			$this->form_validation->set_rules('task_status', 'Task Status', 'trim|required');

			if($this->form_validation->run()) {
				$data = [
					'task_name' => $this->input->post('task_name'),
					'task_priority' => $this->input->post('task_priority'),
					'task_desp' => $this->input->post('task_desp'),
					'service_code' => $this->input->post('service_code'),
					'consume_time' => $this->input->post('consume_time'),
					'sup_name' => $this->input->post('sup_name'),
					'customer_code' => $this->input->post('customer_code'),
					'emp_details' => $this->input->post('emp_details'),
					'task_status' => $this->input->post('task_status'),
				];

				$attach_files = [];
				if( !empty($_FILES['attach_file']['name']) ) {
					$total_attachments = count($_FILES['attach_file']['name']);

					for($i = 0; $i < $total_attachments; $i++) {
						$attachment_name = $_FILES['attach_file']['name'][$i];
						$file_ext = pathinfo($attachment_name, PATHINFO_EXTENSION);
						$newName = uniqid() . '.' . $file_ext;
						$upload_dir = UPLOAD_DIR . '/task/';

						if(move_uploaded_file( $_FILES['attach_file']['tmp_name'][$i], $upload_dir . $newName )) {
							$attach_files[] = $newName;
						}
					}
				}
				$data['attach_file'] = $attach_files;

				$this->Task_model->add_task($data);

				$this->session->set_flashdata('success_msg', 'Task added successfully');
				return redirect('admin/task');

				// now send emails




				// echo '<pre>';
				// print_r($_POST);
				// die;


				// $lastid = $this->Task_model->getLastid();
				// $taskcode = 'TASK' . date('y') . str_pad($lastid->lastid, 6, "0", STR_PAD_LEFT);

				// $task_name = ucwords($this->input->post('task_name'));
				// $task_hours = $this->input->post('task_hours');

				// $data['task_id'] = $taskcode;
				// $data['task_name'] = ucwords($this->input->post('task_name'));
				// $data['task_by'] = $this->input->post('task_by');
				// $data['service_code'] = $this->input->post('service_code');
				// $data['sup_name'] = $this->input->post('sup_name');
				// $data['task_hours'] = '0';
				// $data['emp_details'] = json_encode($this->input->post('emp_details'));
				// $data['customer_code'] = $this->input->post('customer_code');
				// $data['consume_time'] = $this->input->post('consume_time');
				// $data['task_priority'] = $this->input->post('task_priority');
				// $data['task_desp'] = $this->input->post('task_desp');
				// $data['task_status'] = $this->input->post('task_status');
				// $data['status'] = 1;
				// $date = date('Y-m-d H:i:s');
				// $data['created_on'] = $date;

				

				// $data_customer_name = $this->Task_model->get_customer_name($data['customer_code']);
				// $data_service_name = $this->Task_model->get_service_name($data['service_code']);
				// $data_supervisor_name = $this->Task_model->get_supervisor_name($data['sup_name']);
				// $data_single_name = json_decode($data['emp_details']);
				// $emp_name = array();
				// foreach ($data_single_name as $res_name) {
				// 	$data_employee_name = $this->Task_model->get_employee_name($res_name);
				// 	array_push($emp_name, $data_employee_name);
				// }

				
				// $data_supervisor_mail = $this->Task_model->get_supervisor_mail($data['sup_name']);
				// $data_customer_mail = $this->Task_model->get_customer_mail($data['customer_code']);
				// $employee_details = json_decode($data['emp_details']);
				// $emp = array();
				// foreach ($employee_details as $res_email) {
				// 	$data_employee_mail = $this->Task_model->get_employee_mail($res_email);
				// 	array_push($emp, $data_employee_mail);
				// }

				// if ($data_inserted) {
				// 	$message = "";
				// 	$message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
				// 	$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";

				// 	$message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Message Details </h3>
                // 		<tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
	            //     <tr><th style="text-align: left;">From</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
	            //     <tr><th style="text-align: left;">Task Name</th><td>' . $task_name . '</td></tr>
	            //     <tr><th style="text-align: left;">Service Name</th><td>' . $data_service_name->service_name . '</td></tr>
	            //     <tr><th style="text-align: left;">Expected Task Hours</th><td>' . $task_hours . '</td></tr>
	            //      <tr><th style="text-align: left;">Supervisor Name</th><td>' . $data_supervisor_name->full_name . '</td></tr>
	            //       <tr><th style="text-align: left;">Customer Name</th><td>' . $data_customer_name->full_name . '</td></tr>
	            //     <tr><th style="text-align: left;">Current Date</th><td>' . $date . '</td></tr>
	            //     <tr><th style="text-align: left;">Employee Details</th><td>';
				// 	foreach ($emp_name as $res_emp_name) {
				// 		foreach ($res_emp_name as $res_emp_names) {
				// 			$name = $res_emp_names->full_name;
				// 			$message .=	 $name . " ";
				// 		}
				// 	}
				// 	$message .= '</td></tr>
	            //     <tr>
	            //     </table></div>';

				// 	$message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
				// 		<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical " . date("Y") . " . All Rights Reserved</p></td></tr></table></div></div></body>";

				// 	$subject = "Message Sent Successfully: Valogical";

				// 	$headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
				// 	$headersad .= "MIME-Version: 1.0" . "\r\n";
				// 	$headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				// 	$headersad .= "X-Mailer: PHP/" . phpversion();
				// 	$to1 = $data_supervisor_mail->email;
				// 	$to2 = "info@Valogical.com";
				// 	$to3 = $data_customer_mail->email;

				// 	// foreach ($emp as $res_emp_mails) {
				// 	// 	foreach ($res_emp_mails as $res_emp_mail) {
				// 	// 		mail($res_emp_mail->email, $subject, $message, $headersad);
				// 	// 	}
				// 	// }

				// 	// if (mail($to1, $subject, $message, $headersad) && mail($to2, $subject, $message, $headersad) && mail($to3, $subject, $message, $headersad)) {
						
				// 	// }

				// 	$this->session->set_flashdata('success_msg', 'Task added successfully');
				// 	redirect('admin/task');
				// }
			}
		}

		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Add Task | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('addtask', $data_class);
	}

	public function edittask($task_id)
	{
		if ($this->uri->segment(3) == "") {
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
			redirect('admin/task/task');
		}

		$data['customer'] = $this->Task_model->get_customer();
		$data['supervisor'] = $this->Task_model->get_supervisor();
		$data['service'] = $this->Task_model->get_service();
		$data['employee'] = $this->Task_model->get_employee();
	
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->form_validation->set_rules('task_name', 'Task Name', 'trim|required');
			$this->form_validation->set_rules('consume_time', 'Time', 'trim|required');
			$this->form_validation->set_rules('sup_name', 'Supervisor Name', 'trim|required');
			if($this->form_validation->run()) {
				$data = [
					'task_name' => $this->input->post('task_name'),
					'task_priority' => $this->input->post('task_priority'),
					'task_desp' => $this->input->post('task_desp'),
					'service_code' => $this->input->post('service_code'),
					'consume_time' => $this->input->post('consume_time'),
					'sup_name' => $this->input->post('sup_name'),
					'customer_code' => $this->input->post('customer_code'),
					'emp_details' => $this->input->post('emp_details'),
					'task_status' => $this->input->post('task_status'),
				];

				$attach_files = [];
				if( !empty($_FILES['attach_file']['name']) ) {
					$total_attachments = count($_FILES['attach_file']['name']);
					for($i = 0; $i < $total_attachments; $i++) {
						$attachment_name = $_FILES['attach_file']['name'][$i];
						$file_ext = pathinfo($attachment_name, PATHINFO_EXTENSION);
						$newName = uniqid() . '.' . $file_ext;
						$upload_dir = UPLOAD_DIR . '/task/';

						if(move_uploaded_file( $_FILES['attach_file']['tmp_name'][$i], $upload_dir . $newName )) {
							$attach_files[] = $newName;
						}
					}
				}
				$data['attach_file'] = $attach_files;

				$this->Task_model->edit_task($data, $task_id);
				$this->session->set_flashdata('success_msg', 'Task Edited Successfully');

				redirect('admin/task');



				// $customer_code = $this->input->post('customer_code');
				// $service_name = $this->input->post('service_name');
				// $task_name    = ucwords(strip_tags($this->input->post('task_name')));
				// $task_hours   = $this->input->post('task_hours');
	
				// $data_task['task_name'] = ucwords(strip_tags($this->input->post('task_name')));
				// $data_task['sup_name'] = strip_tags($this->input->post('sup_name'));
				// $data_task['task_hours'] = '0';
				// $data['task_by'] = $this->input->post('task_by');
				// $data['service_code'] = $this->input->post('service_code');
				// $data_task['emp_details'] = json_encode($this->input->post('emp_details'));
				// $data_task['task_desp'] = $this->input->post('task_desp');
				// $data_task['task_priority'] = $this->input->post('task_priority');
				// $data_task['consume_time'] = $this->input->post('consume_time');
				// $data_task['task_status'] = $this->input->post('task_status');
				// $data_task['status'] = 1;
				// $date_time = date('Y-m-d H:i:s');
				// $data_task['updated_on'] = $date_time;
	
				// $this->load->library('upload');
				// if (!empty($_FILES['attach_file']['name']['0'])) {
				// 	$a = array();
	
				// 	$number_of_files_uploadeds = count($_FILES['attach_file']['name']);
				// 	for ($i = 0; $i < $number_of_files_uploadeds; $i++) {
				// 		// Faking upload calls to $_FILE
				// 		$_FILES['userfile']['name']     = $_FILES['attach_file']['name'][$i];
				// 		$_FILES['userfile']['type']     = $_FILES['attach_file']['type'][$i];
				// 		$_FILES['userfile']['tmp_name'] = $_FILES['attach_file']['tmp_name'][$i];
				// 		$_FILES['userfile']['error']    = $_FILES['attach_file']['error'][$i];
				// 		$_FILES['userfile']['size']     = $_FILES['attach_file']['size'][$i];
				// 		$config['upload_path']          = '../uploads/task';
	
				// 		$config['allowed_types']        = 'png|jpg|jpeg|pdf|doc|docx|zip';
				// 		$config['max_size']             = 100000;
				// 		$this->upload->initialize($config);
	
				// 		if ($this->upload->do_upload()) {
				// 			$final_files_data[] = $this->upload->data();
				// 			array_push($a, $final_files_data[$i]['file_name']);
				// 		}
				// 	}
	
				// 	$data_task['attach_file'] = json_encode($a);
				// } else {
				// 	$data_task['attach_file'] = $this->input->post('prev_link');
				// }

				
				// $data_supervisor_mail = $this->Task_model->get_supervisor_mail($data_task['sup_name']);
				// $data_supervisor_name = $this->Task_model->get_supervisor_name($data_task['sup_name']);
				// $data_customer_mail = $this->Task_model->get_customer_mail($customer_code);
				// $data_customer_name = $this->Task_model->get_customer_name($customer_code);

				// $emp_details = $this->input->post('emp_details');

				// if ($data_updated) {
				// 	$message = "";
				// 	$message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
				// 	$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";

				// 	$message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Message Details </h3>
	            //     <tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
		        //         <tr><th style="text-align: left;">From</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
		        //         <tr><th style="text-align: left;">Task Name</th><td>' . $task_name . '</td></tr>
		        //         <tr><th style="text-align: left;">Service Name</th><td>' . $service_name . '</td></tr>
		        //         <tr><th style="text-align: left;">Expected Task Hours</th><td>' . $task_hours . '</td></tr>
		        //          <tr><th style="text-align: left;">Supervisor Name</th><td>' . $data_supervisor_name->full_name . '</td></tr>
		        //           <tr><th style="text-align: left;">Customer Name</th><td>' . $data_customer_name->full_name . '</td></tr>
		        //         <tr><th style="text-align: left;">Current Date</th><td>' . $date_time . '</td></tr>
		        //         <tr><th style="text-align: left;">Employee Details</th><td>';
				// 	foreach ($emp_details as $emp_detail) {
				// 		$data_employee_names = $this->Task_model->get_employee_name($emp_detail);
					
				// 		foreach ($data_employee_names as $data_employee_name) {
				// 			$message .=  $data_employee_name->full_name . ' ';
				// 		}
				// 	}

				// 	$message .=  '</td></tr>
		        //         <tr>
		        //         </table></div>';

				// 	$message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
				// 		<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical " . date("Y") . " . All Rights Reserved</p></td></tr></table></div></div></body>";

				// 	$subject = "Message Sent Successfully: Valogical";

				// 	$headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
				// 	$headersad .= "MIME-Version: 1.0" . "\r\n";
				// 	$headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				// 	$headersad .= "X-Mailer: PHP/" . phpversion();
				// 	$to1 = $data_supervisor_mail->email;
				// 	$to2 = "info@Valogical.com";
				// 	$to3 = $data_customer_mail->email;

				// 	// foreach ($emp_details as $emp_detail) {
				// 	// 	$data_employee_mails = $this->Task_model->get_employee_mail($emp_detail);
				// 	// 	foreach ($data_employee_mails as $data_employee_mail) {
				// 	// 		$to4 = $data_employee_mail->email;
				// 	// 		$emp_mail_send = mail($to4, $subject, $message, $headersad);
				// 	// 	}
				// 	// }

				// 	// if (mail($to1, $subject, $message, $headersad) && mail($to2, $subject, $message, $headersad) && mail($to3, $subject, $message, $headersad) && $emp_mail_send) {
				// 	// 	//echo $message;die("here"); 
						
				// 	// }
				// }

				// $this->session->set_flashdata('success_msg', 'Task Edited Successfully');

				// if($_SESSION['user_type'] == 3) {
				// 	// supervisor
				// 	redirect('admin/supervisorr/task');
				// } else {
				// 	redirect('admin/task');
				// }
			}
		}

		$data_single = $this->Task_model->get_data_by_id($task_id);
		$data['alltaskdata_row'] = $data_single;

		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Edit Task | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('edittask', $data);
	}

	public function conversationEmployee()
	{
		$data = [
			'task_id' => $this->input->post('task_id'),
			'task_code' => $this->input->post('task_code'),
			'qc_checker_id' => $this->input->post('qc_checker_id'),
			'message' => $this->input->post('message'),
			'conversation_id' => $this->input->post('conversation_id')
		];

		if( $data['qc_checker_id'] == '' ) {
			$this->session->set_flashdata('err_msg', 'Quality checker is required');
			redirect('admin/task/details/'.$data['task_code']);
		}

		if( $data['message'] == '' ) {
			$this->session->set_flashdata('err_msg', 'Message is required');
			redirect('admin/task/details/'.$data['task_code']);
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

		$this->Task_model->saveConersationForEmployee($data);
		$this->session->set_flashdata('success_msg', 'Message send successfully');
		redirect('admin/task/details/'.$data['task_code']);
	}

	public function conversationSupervisor()
	{
		$data = [
			'task_id' => $this->input->post('task_id'),
			'task_code' => $this->input->post('task_code'),
			'message' => $this->input->post('message'),
			'conversation_id' => $this->input->post('conversation_id'),
			'send_to_customer' => $this->input->post('send_to_customer')
		];

		if( $data['message'] == '' ) {
			$this->session->set_flashdata('err_msg', 'Message is required');
			redirect('admin/task/details/'.$data['task_code']);
		}

		$attach_files = [];
		if( !empty($_FILES['chat_attachments']['name']) ) {
			$attachment_name = $_FILES['chat_attachments']['name'];
			$file_ext = pathinfo($attachment_name, PATHINFO_EXTENSION);
			$newName = uniqid() . '.' . $file_ext;
			$upload_dir = UPLOAD_DIR . '/chat/';
			if(move_uploaded_file($_FILES['chat_attachments']['tmp_name'], $upload_dir . $newName )) {
				$attach_files[] = $newName;
			}
		}

		$data['attachments'] = $attach_files;

		$this->Task_model->saveConversationForSupervisorOrAdmin($data);
		$this->session->set_flashdata('success_msg', 'Message send successfully');
		redirect('admin/task/details/'.$data['task_code']);
	}

	/*================================ Delete Data ===========================*/
	public function delete_data($dataid)
	{
		$this->Task_model->delete_row_data($dataid);
		redirect('admin/task');
		exit;
	}

	public function inactive($id)
	{
		if ($this->uri->segment(3) == "") {
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data['status'] = '0';
			$this->Task_model->edit_data($data, $id);
			$this->session->set_flashdata('success_msg', 'Task Edited Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function active($id)
	{
		if ($this->uri->segment(3) == "") {
			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically');
			redirect($_SERVER['HTTP_REFERER']);
		} else {
			$data['status'] = '1';
			$this->Task_model->edit_data($data, $id);
			$this->session->set_flashdata('success_msg', 'Task Edited Successfully');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function details($task_id)
	{
		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'Task Details | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');

		$last_message = [];
		if( $_SESSION['user_type'] == USER_EMPLOYEES ) {
			$emp_id = $_SESSION['user_id'];
			$last_message = $this->Task_model->getLastMessage($task_id, $emp_id);
		}

		if( $_SESSION['user_type'] == USER_SUPERVISOR ) {
			if( isset($_GET['is_qc_required']) && isset($_GET['conversation_id']) ) {
				$last_message = $this->Task_model->findMessageByConversationId($_GET['conversation_id']);
			}
		}
		
		$this->template->build('details', [
			'task' => $this->Task_model->getTaskDetails($task_id),
			'qcCheckers' => $this->Task_model->getAllSystemUsers(),
			'comments'   => $this->Task_model->getTaskComments($task_id),
			'last_message' => $last_message
		]);
	}

	public function viewtask($task_id)
	{
		$cust_code = $this->session->userdata('user_code');


		$data_single = $this->Task_model->get_data_by_taskcode($task_id);

		$data['alldata_row'] = $data_single;

		$data_msg_all = $this->Task_model->get_data_by_message($task_id, $cust_code);

		$data['allmsg_row'] = $data_msg_all;

		$site_name = $this->config->item('site_name');
		$this->template->set('title', 'View Task | ' . $site_name);
		$this->template->set_layout('layout_main', 'front');
		$this->template->build('viewtask', $data);
	}

	public function msgsend()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			//print_r($_FILES); die("kool");	
			$email =	$this->input->post('user_email');
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
					$data['attach_file'] = $final_files_data[0]['file_name'];
				}
			}

			$data_insert = $this->Task_model->add_message($data);
			if ($data_insert) {
				$message = "";
				$message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
				$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";

				$message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Message Details </h3>
                <tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
	                <tr><th style="text-align: left;">From</th><td> ' . $this->session->userdata("full_name") . '</td></tr>
	                <tr><th style="text-align: left;">Send Name</th><td>' . $data['receiver_user_id'] . '</td></tr>
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
				//echo $message;die("here"); 

				$subject = "Message Sent Successfully: Valogical";

				$headersad = "From: Valogical <noreply@rkshopkart.com>" . "\r\n";
				$headersad .= "MIME-Version: 1.0" . "\r\n";
				$headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headersad .= "X-Mailer: PHP/" . phpversion();
				$to1 = $email;
				$to2 = "info@Valogical.com";
				//die();


				if (mail($to2, $subject, $message, $headersad) && mail($to1, $subject, $message, $headersad)) {
					//echo $message;die("here"); 
					$this->session->set_flashdata('success_msg', 'Message Submitted Successfully');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}

		$site_name = $this->config->item('site_name');

		$this->template->set('title', 'Message | ' . $site_name);

		$this->template->set_layout('layout_main', 'front');

		$this->template->build('viewtask');
	}
}
