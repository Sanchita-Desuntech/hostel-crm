<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	/**
	 * Init customer session
	 * 
	 * @param array $data
	 * @throws \Exception
	 */
	public function initSession($data)
	{
		// find user by email
		$sql = "SELECT tbl_users.*, tbl_customer.id AS customer_id, tbl_customer.is_first_pass_changed
		FROM tbl_users
		INNER JOIN tbl_customer ON tbl_customer.user_id = tbl_users.id
		WHERE tbl_users.email = ? AND tbl_users.status = ?";
		$customer = $this->db->query($sql, [ $data['email'], '1' ])->row();

		if( is_null($customer) ) {
			throw new \Exception("No user found with this email");
		}

		// check user role is customer or not
		if( $customer->user_type != 2 ) {
			throw new \Exception("No user found with this email");
		}

		// check password
		if( $customer->password != md5($data['password']) ) {
			throw new \Exception("Password does not match");
		}

		$data = array(
			'is_logged_in' 		=> true,
			'customer_id'		=> $customer->customer_id,
			'user_code'			=> $customer->user_code,	
			'user_id'			=> $customer->id,
			'user_type'			=> $customer->user_type,	
			'email' 			=> $customer->email,			
			'mobile' 			=> $customer->mobile,
			'user_name'     	=> $customer->email,
			'full_name'     	=> $customer->full_name,
			'profile_photo'     => $customer->profile_photo,
			'is_first_pass_changed' => $customer->is_first_pass_changed
		);

		$this->session->set_userdata($data);
	}	
}