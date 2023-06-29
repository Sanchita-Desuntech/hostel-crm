<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Login_model
 * 
 * @author Joy Kumar Bera<joy.desuntech@gmail.com>
 */
class Login_model extends CI_Model {
	
	/**
	 * Check user info and start session
	 * 
	 * @return bool
	 */
	public function validate()
	{
		$user_name_or_email = $this->input->post('username');
		$password = $this->input->post('password');

		// find user by email 
		$sql = "SELECT * 
		FROM tbl_users 
		WHERE email = ? AND status = ?
		ORDER BY id DESC";

		$user = $this->db->query($sql, [$user_name_or_email, '1'])->row();

		if( is_null($user) ) {
			// find user by user code
			$sql = "SELECT * 
			FROM tbl_users 
			WHERE user_code = ? AND status = ?
			ORDER BY id DESC";
	
			$user = $this->db->query($sql, [$user_name_or_email, '1'])->row();

			if(is_null($user)) {
				return false;
			}
		}

		// now check for password
		if( $user->password != md5($password) ) {
			return false;
		}

		// check for user role
		if($user->user_type == USER_CUSTOMER) {
			return false;
		}

		// init session
		$user_data = array(
			'user_id'			=> $user->id,
			'user_code'			=> $user->user_code,	
			'user_type'			=> $user->user_type,	
			'email' 			=> $user->email,			
			'mobile' 			=> $user->mobile,
			'user_name'     	=> $user->email,
			'full_name'     	=> $user->full_name,
			'profile_photo'     => $user->profile_photo,
			'is_logged_in' 		=> true,
			'permissions'		=> $this->user_permission_model->getUserPermission($user->id, $user->user_type)
		);

		$this->session->set_userdata($user_data);

		return true;
	}			
}