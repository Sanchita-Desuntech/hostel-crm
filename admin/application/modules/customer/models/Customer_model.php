<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Customer_model extends CI_Model
{
	public function get_data()
	{
		$this->db->select('*');
		$this->db->where('status!=', '2');
		$query = $this->db->get('tbl_customer');
		$result = $query->result();

		return $result;
	}

	/**
	 * Get customer data
	 * 
	 * @param string $search_query
	 * @param int $limit
	 * @param int $offset
	 * @return array
	 */
	public function getCustomers($search_query, $limit, $offset)
	{
		$data = [];

		$search_sql = " WHERE 1 AND tbl_users.user_type = 2 AND tbl_users.status <> '2' ";

		// find total record
		$sql = "SELECT IFNULL(COUNT(tbl_customer.id), 0) AS total
		FROM tbl_customer
		INNER JOIN tbl_users ON tbl_users.id = tbl_customer.user_id
		$search_sql";

		$result = $this->db->query($sql)->row();

		$data['recordsTotal'] = $result->total;

		if (!empty($search_query)) {
			parse_str($search_query, $params);

			$search_arr = [];
			if (isset($params['customerName']) && !empty($params['customerName'])) {
				$search_arr[] = "tbl_users.full_name LIKE '%" . $params['customerName'] . "%'";
			}

			if (isset($params['customerEmail']) && !empty($params['customerEmail'])) {
				$search_arr[] = "tbl_users.email LIKE '%" . $params['customerEmail'] . "%'";
			}

			if (
				isset($params['joinedFrom']) && !empty($params['joinedFrom'])
				&&
				isset($params['joinedTo']) && !empty($params['joinedTo'])
			) {
				$search_arr[] = "tbl_users.created_on BETWEEN '" . $params['joinedFrom'] . "' AND '" . $params['joinedTo'] . "'";
			}

			if (isset($params['customerMobile']) && !empty($params['customerMobile'])) {
				$search_arr[] = "tbl_users.mobile LIKE '%" . $params['customerMobile'] . "%'";
			}

			if (!empty($search_arr)) {
				$search_extended_sql = implode(' OR ', $search_arr);
				$search_sql .= " AND ( $search_extended_sql )";
			}
		}

		// find filtered records
		$sql = "SELECT COUNT(tbl_customer.id) AS total
			FROM tbl_customer
			INNER JOIN tbl_users ON tbl_users.id = tbl_customer.user_id
			$search_sql";

		$result = $this->db->query($sql)->row();

		$data['recordsFiltered'] = $result->total;

		$sql = "SELECT tbl_customer.cust_code, tbl_users.full_name AS name, tbl_users.mobile, tbl_users.email, 
			tbl_customer.time_wallet, tbl_customer.profile_photo, tbl_customer.status,
			tbl_customer.created_on
			FROM tbl_customer
			INNER JOIN tbl_users ON tbl_users.id = tbl_customer.user_id
			$search_sql
			LIMIT $limit
			OFFSET $offset";

		$customers =  $this->db->query($sql)->result();

		foreach ($customers as $customer) {


			$photo_url = base_url('uploads/users/profile_photo/'.$customer->profile_photo);

			$customer->profile_photo = '<img src="'.$photo_url.'" width="80px" height="80px">';

			if ($customer->status == 0) {
				$url = base_url('admin/customer/active' . $customer->cust_code);
				$customer->status = '<a href="' . $url . '" class="btn btn-danger">Inactive</a>';
			} else {
				$url = base_url('admin/customer/inactive' . $customer->cust_code);
				$customer->status = '<a href="' . $url . '" class="btn btn-success">Active</a>';
			}


			$action = '';
			$url = base_url('admin/customer/viewcustomer/' . $customer->cust_code);
			$action .= '<a href="' . $url . '" class="btn btn-success"><i class="fa fa-eye"></i></a>';
			$action .= '&nbsp;';

			$url = base_url('admin/customer/editcustomer/' . $customer->cust_code);
			$action .= '<a href="' . $url . '" class="btn btn-info"><i class="fa fa-edit"></i></a>';
			$action .= '&nbsp;';

			$url = base_url('admin/customer/delete_data/' . $customer->cust_code);
			$action .= '<a href="' . $url . '" class="btn btn-danger"><i class="fa fa-times"></i></a>';

			$customer->action = $action;
		}


		$data['data'] = $customers;

		return $data;
	}

	/**
	 * Get list of packages
	 * 
	 * @return array
	 */
	public function getPackages()
	{
		$sql = "SELECT * FROM tbl_package WHERE status = 1";
		return $this->db->query($sql)->result();
	}

	public function get_customer_task_data($cust_code)
	{
		$this->db->select('tbl_task.*,tbl_service.*');
		$this->db->from('tbl_task');
		$this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.service_code', 'left');
		$this->db->where('tbl_task.customer_code', $cust_code);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function getLastid()
	{
		$this->db->select('max(id) as lastid');
		$query = $this->db->get('tbl_customer');
		$result = $query->row();

		return $result;
	}

	public function get_customer_task_data_by_id($task_id)
	{
		$this->db->select('tbl_task.*,tbl_service.service_id,tbl_service.service_name,tbl_service.service_type,tbl_service.ser_status,tbl_supervisor.full_name as supervisor_name');
		$this->db->from('tbl_task');
		$this->db->join('tbl_service', 'tbl_service.service_id = tbl_task.service_code', 'left');
		$this->db->join('tbl_supervisor', 'tbl_task.sup_name = tbl_supervisor.sup_code', 'left');
		$this->db->where('tbl_task.task_id', $task_id);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function get_customer_payment_data_by_id($cust_code)
	{
		$this->db->select('tbl_payment.*,tbl_users.full_name');
		$this->db->from('tbl_payment');
		$this->db->join('tbl_users', 'tbl_payment.customer_code = tbl_users.user_code', 'left');
		$this->db->where('tbl_payment.customer_code', $cust_code);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	/**
	 * Add new customer
	 * 
	 * @param array $data
	 * @return null|int
	 */
	public function add_customer($data)
	{
		if (!empty($data)) {

			$package_id = $data['current_package'];

			unset($data['current_package']);

			// check if package id present
			$this->db->insert('tbl_customer', $data);
			$customer_id = $this->db->insert_id();
			if (!is_null($package_id) && !empty($package_id)) {

				// find package info
				$sql = "SELECT * FROM tbl_package WHERE id = $package_id";
				$package = $this->db->query($sql)->row();

				$this->db->insert('tbl_cust_invoice', [
					'invoice_code' => strtoupper(uniqid('INV-')),
					'trans_code' => strtoupper(uniqid('TXN-')),
					'service_code' => $package->package_code,
					'package_id' => $package_id,
					'customer_id' => $customer_id,
					'customer_name' => $data['full_name'],
					'amount' => $package->package_price,
					'payment_method' => 'N/A',
					'inv_date' => date('Y-m-d'),
					'create_date' => date('Y-m-d'),
					'comments' => 'Added from admin panel'
				]);

				$ref_id = $this->db->insert_id();

				$this->db->update('tbl_customer', [
					'active_invoice_id' => $ref_id
				], array('id' => $customer_id));
			}

			return $customer_id;
		}
	}

	public function add_user($data)
	{
		if (!empty($data)) {
			$this->db->insert('tbl_users', $data);
			return $this->db->insert_id();
		}
	}


	/**
	 * Notify user by email
	 * 
	 * @param array $email_data
	 */
	public function notifyUserByEmail($email_data)
	{
		$message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
		$message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='" . base_url() . "themes/front/images/logo2.png'></h3></td><td style='text-align: center;'></td></tr></table>";
		$message .= '<table><h3 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">Your account created successfully</h3>
				<tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"></td></tr>
		<tr><th style="text-align: left;">Full Name</th><td> ' . $email_data['full_name'] . '</td></tr>
		<tr><th style="text-align: left;">Email</th><td>' . $email_data['email'] . '</td></tr>
		<tr><th style="text-align: left;">Mobile</th><td>' . $email_data['mobile'] . '</td></tr>
		<tr><th style="text-align: left;">Password</th><td>' . $email_data['password'] . '</td></tr>
		<tr><th style="text-align: left;">Time Wallet</th><td>' . $email_data['time_wallet'] . '</td></tr>
		<tr><th style="text-align: left;">Preference</th><td>' . $email_data['preference'] . '</td></tr>
		</table></div>';

		$message .= '<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: center;">
		<a href="' . base_url() . 'client/login" style="background-color: rgb(41, 48, 136);border-radius: 5px;color: rgb(255, 255, 255);display: table;font-size: 20px;line-height: 20px;margin: 37px auto 30px;;padding: 10px 30px;text-align: center;text-decoration: none">Click here to login</a></td></tr></table></div>';

		$message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
		<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>Valogical " . date("Y") . " . All Rights reserved</p></td></tr></table></div></div></body>";

		$subject = "Account created successfully - Valogical";

		$mail = new \PHPMailer\PHPMailer\PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = \PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = $_ENV['EMAIL_HOST'];                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = $_ENV['EMAIL_USERNAME'];                     //SMTP username
			$mail->Password   = $_ENV['EMAIL_PASSWORD'];                               //SMTP password
			$mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom($_ENV['EMAIL_USERNAME'], 'Valogical');
			$mail->addAddress($email_data['email']);
			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body    = $message;

			return $mail->send();
		} catch (Exception $e) {
			// echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function edit_customer($data, $cust_code)
	{
		if (!empty($data)) {
			$this->db->where('cust_code', $cust_code);
			$this->db->update('tbl_customer', $data);

			return $this->db->affected_rows();
		}
	}

	public function edit_users($data, $cust_code)
	{
		if (!empty($data)) {
			$this->db->where('user_code', $cust_code);
			$this->db->update('tbl_users', $data);
			return $this->db->affected_rows();
		}
	}

	public function get_data_by_id($cust_code)
	{
		$this->db->select('tbl_users.*,tbl_customer.*');
		$this->db->from('tbl_users');
		$this->db->join('tbl_customer', 'tbl_customer.cust_code = tbl_users.user_code', 'left');
		$this->db->where('tbl_customer.cust_code', $cust_code);
		$this->db->where('tbl_users.status!=', '2');
		$this->db->where('tbl_users.user_type=', 2);
		$this->db->where('tbl_customer.user_type=', 2);
		$query = $this->db->get();
		$result = $query->result();

		return $result;
	}

	public function delete_row_data($cust_code)
	{
		$this->db->update('tbl_customer', [
			'status' => '2'
		], ['cust_code' => $cust_code]);

		$this->db->update('tbl_users', [
			'status' => '2',
			'deleted_at' => date('Y-m-d H:i:s')
		], ['user_code' => $cust_code]);
	}

	public function check_url($url)
	{
		$this->db->select('*');
		$this->db->where('profile_url', $url);
		$query = $this->db->get('tbl_customer');
		$result = $query->result();
		// echo $this->db->last_query();
		// exit;
		return $result;
	}
	public function email_check($email)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');
		if ($query->num_rows() > 0) {
			//die("greter");
			return false;
		} else {
			// die("smaller");
			return true;
		}
	}

	public function check_user($hprk)
	{
		$this->db->where('ecode', $hprk);
		$this->db->where('is_email_verified', '0');
		$query = $this->db->get('tbl_users');
		if ($query->num_rows() > 0) {
			//die("greter");
			$result = $query->row();
			return $result;
		} else {
			// die("smaller");
			return false;
		}
	}

	public function update_status($id, $hprk)
	{
		$data['is_email_verified'] = '1';
		$this->db->where('id', $id);
		$this->db->where('ecode', $hprk);
		$this->db->update('tbl_users', $data);
	}

	public function get_payment_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_payment');
		$result = $query->result();
		return $result;
	}

	/**
	 * Get customer weblogin details
	 * 
	 * @param string $cust_code
	 */
	public function get_weblogin_data($cust_id)
	{

		$sql = "SELECT tbl_weblogin.*, tbl_customer.full_name
		FROM tbl_weblogin
		JOIN tbl_customer ON tbl_customer.id = tbl_weblogin.customer_id
		WHERE tbl_customer.cust_code = ?";

		return $this->db->query($sql, [$cust_id])->result();
	}

	/**
	 * Add web login
	 * 
	 * @param array $data
	 * @return int
	 */
	public function add_weblogin($data)
	{
		// find customer id
		$sql = "SELECT * FROM tbl_customer WHERE cust_code = ?";
		$customerInfo = $this->db->query($sql, [$data['cust_code']])->row();

		$this->db->insert('tbl_weblogin', [
			'email' => $data['email'],
			'website' => $data['website'],
			'password' => $data['password'],
			'created_by' =>  $this->session->userdata('user_code'),
			'customer_id' => $customerInfo->id,
			'created_on' => date('Y-m-d'),
			'status' => 1
		]);

		return $this->db->insert_id();
	}

	/**
	 * Edit weblogin
	 * 
	 * @param array $data
	 * @param int $id
	 * @return int
	 */
	public function edit_single_weblogin($data, $id)
	{
		$this->db->update('tbl_weblogin', [
			'email' => $data['email'],
			'website' => $data['website'],
			'password' => $data['password'],
			'updated_by' => $this->session->userdata('user_code')
		], ['id' => $id]);

		return $this->db->affected_rows();
	}

	public function get_single_weblogin_data_by_id($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('tbl_weblogin');
		$result = $query->result();

		return $result;
	}
}
