<?php

if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $CI = &get_instance();        
        $is_logged_in = $CI->session->userdata('is_logged_in');

        if (!isset($is_logged_in) || $is_logged_in == false) {
            redirect('admin/home');
        }
    }
}


if( !function_exists('has_user_permission') ) {
    /**
     * Check if user has the permission to perform the action
     * 
     * @param string $permission
     * @return bool
     * @author Joy Kumar Bera<joy.desuntech@gmail.com>
     */
    function has_user_permission($permission) {
        $CI = &get_instance();        
        $user_permission = $CI->session->userdata('permissions');

        if( !in_array($permission, $user_permission) ) {
            return false;
        }

        return true;
    }
}