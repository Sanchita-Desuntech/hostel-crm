<?php defined('BASEPATH') or die('No direct script access allowed');

class Footer_element{
	
	public function get_settings_data()
	{
		 $CI =& get_instance();
		 
		/* $name = 'Sanjib Dandapat';
		 return $name;*/
		 
		$CI->db->select(
        '
		'
        );
        $qry="SELECT * FROM settings_mng WHERE id=1";
        $query = $CI->db->query($qry);
        $data_row_settings= $query->result_array();
        //print_r($data_row_settings); exit();
		

	
	}
	
	
	
}