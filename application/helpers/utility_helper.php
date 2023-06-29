<?php  if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
* @package     CLIRENT 1.0
* @subpackage  utility helper for frontend
*
* @copyright   Copyright (C) 2016 CLIRENT, Inc. All rights reserved.
*/
#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//start
#################################################################
if (! function_exists('is_front_logged_in_profile')) {
    function is_front_logged_in_profile()
    {
        $CI =& get_instance();
        $is_front_logged_in = $CI->session->userdata('is_front_logged_in');
        //print_r($CI->session);
        //echo $is_front_logged_in;
        //exit;
        if ($is_front_logged_in == true) {
            redirect('home');
        } else {
        }
    }
}
if (! function_exists('get_settings_data')) {
	function get_settings_data()
	{
		 $CI =& get_instance();
		/* $name = 'Sanjib Dandapat';
		 return $name;*/
		$CI->db->select('');
        $qry="SELECT * FROM settings_mng WHERE id=1";
        $query = $CI->db->query($qry);
        return $data_row_settings= $query->row_array();
        //print_r($data_row_settings); exit();
	
	}
}








#################################################################
//constractor checking for login and signup section,
//if get true then it will not come to sign/login page again,
//it will redirect to the account page
//end
#################################################################
#################################################################
//constractor checking for all page where user session is requried
//start
#################################################################
if (! function_exists('is_front_logged_in')) {
    function is_front_logged_in()
    {
        $CI =& get_instance();
        $is_front_logged_in = $CI->session->userdata('is_front_logged_in');
        if (!isset($is_front_logged_in) || $is_front_logged_in == false) {
            //redirect('home');
            redirect(base_url());
        }
    }
}
#################################################################
#################################################################

if (! function_exists('get_menu_list')) {
	function get_menu_list()
	{
		 $CI =& get_instance();
		$CI->db->select('');
        $qry="SELECT * FROM tbl_category where is_parent=1 AND status='1' order by orderid asc";
        $query = $CI->db->query($qry);
	    return $result = $query->result_array();
	 
	}
}
if (! function_exists('get_dropdownmenu_list')) {
	function get_dropdownmenu_list($parent_id)
	{
		//die($parent_id);
		 $CI =& get_instance();
		$CI->db->select('');
        $qry="SELECT * FROM tbl_category where is_parent=0 AND 	parent_cat=$parent_id AND status='1' ";
        //echo $qry;die("here");
        $query = $CI->db->query($qry);
	    return $result = $query->result_array();
	 
	}
}

if (! function_exists('get_user_data')) {
	function get_user_data($user_code)
	{
		$CI =& get_instance();
		//$user_code = $CI->session->userdata('user_code');
		//print_r($CI->session);die("here");
		
		$CI->db->select('');
        $qry="SELECT * FROM tbl_users where user_code='$user_code' ";
      //echo $qry;die("here");
        $query = $CI->db->query($qry);
       
	    return $result = $query->result_array();
	   
	 
	}
}




#################################################################
#################################################################

function force_ssl() {
    if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != "on") {
        $url = "https://". $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        redirect($url);
        exit;
    }
}


