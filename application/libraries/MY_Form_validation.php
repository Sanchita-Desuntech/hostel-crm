<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  class MY_Form_validation extends CI_Form_validation
  {
		public $CI; //This for the HMVC fix for form validetion liberi
		
		
		public function __construct($rules = array())
		{
		parent::__construct($rules);
		}
		
		
		function run($module = '', $group = '')
         {
       (is_object($module)) AND $this->CI = &$module;
        return parent::run($group);
         }
		
		
		
		public function alpha_dash_space($str)
		// Debmalya: Only allows alphabets and space. 
		//It allows space which CI's inbuilt alpha did not. 
		//It allows a blank entry which suits me fine		
		{
		return ( !preg_match("/^([-a-z0-9- ])+$/i", $str) ) ? FALSE : TRUE;
		}
		
		public function valid_phone($str)
		// Debmalya: Only allows alphabets and space. 
		//It allows space which CI's inbuilt alpha did not. 
		//It allows a blank entry which suits me fine		
		{
		return ( !preg_match("/^([a-z0-9\(\)\-+ ])+$/i", $str) ) ? FALSE : TRUE;
		}
		
		public function alpha_space($str)
		// Debmalya: Only allows alphabets and space. 
		//It allows space which CI's inbuilt alpha did not. 
		//It allows a blank entry which suits me fine
		{
		return ( !preg_match("/^([a-z ])+$/i", $str) ) ? FALSE : TRUE;
		}
		
  }
?>