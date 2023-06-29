<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('performemailotpsend'))
{
	
	
		function performemailotpsend($email,$otp) 
		{
			
			
			
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			$CI =& get_instance();
			$CI->load->library(array('mailgun'));
			$CI->load->library(array('parser'));
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			//print_r($CI->lang->lang());contact@bookallads.com
			//echo 'zzzzzzzzzzzz';
			
			$data['email'] 	   			= $email;
			$data['SITE_TITLE'] 		= 'Service Portal';
			$data['base_url'] 			= base_url();
			$data['name'] 				= $CI->session->userdata['first_name']." ".$CI->session->userdata['last_name'];
			$data['otp'] 				= $otp;
		
			
			
			
			$email_txt = $CI->parser->parse('email/email_send_email_otp',$data,true);
			
			/*$CI->email->from('noreply@serviceportal.com','Service Portal');
			$CI->email->to($email);
			$CI->email->subject('OTP For Email Change - '.$email);
			$CI->email->message($email_txt);*/
			
			
			
			if($CI->mailgun->send([
			'from' => "clirnet.com team <no-reply@clirnetmail.com>",
			'to' => "".$email."",
			'subject' => "OTP For Email Change - ".$email."",
			'html' => $email_txt
			]))
			{
			
 			return true;
				
			}
			else
			{
				
			return false;
			}
			
			
			
			
		 
		 }
}








if ( ! function_exists('performsendnewaskclir'))
{
	
	
		function performsendnewaskclir($first_name,$last_name,$mem_id,$question,$company,$speciality) 
		{
			
			
			
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			$CI =& get_instance();
			$CI->load->library(array('email'));
			$CI->load->library(array('parser'));
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			//print_r($CI->lang->lang());contact@bookallads.com
			//echo 'zzzzzzzzzzzz';
			
			$data['question'] 	   						= $question;
			$data['speciality'] 					= $speciality;
			$data['company'] 						= $company;
			$data['first_name'] 						= $first_name;
			$data['last_name'] 						= $last_name;
			$data['memid'] 						= $mem_id;
			$email_txt = $CI->parser->parse('email/email_send_new_askclir_to_admin',$data,true);
			$CI->email->from('noreply@serviceportal.com','Service Portal');
			$CI->email->to('askclir@clirnet.com');
			//$CI->email->to('pbiswas90@gmail.com');
			$CI->email->subject('New question ask for AskCLIR From Dr. '.$first_name." ".$last_name);
			$CI->email->message($email_txt);
			//$CI->email->message('Dr.'.$first_name.' '.$last_name.'('.$mem_id.') Added A New Askclir ');
			if($CI->email->send())
			{
				return true;
			}
			
			else
			{
				return false;
			}
			
			
			
		 
		 
		 }
}
####################################################################	
####################################################################


if ( ! function_exists('performsendsessionnewregistration'))
{
	
	
		function performsendsessionnewregistration($first_name,$last_name,$mem_id,$topic,$session_doc_id,$notes,$mobile,$session_id) 
		{
			
			
			
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			$CI =& get_instance();
			$CI->load->library(array('email'));
			$CI->load->library(array('parser'));
			###########################################################
			//This part should be common for all notification functions
			###########################################################
			//print_r($CI->lang->lang());contact@bookallads.com
			//echo 'zzzzzzzzzzzz';
			
			
			$data['topic'] 	   						= $topic;
			$data['session_doc_id'] 					= $session_doc_id;
			$data['notes'] 						= $notes;
			$data['first_name'] 						= $first_name;
			$data['last_name'] 						= $last_name;
			$data['memid'] 						= $mem_id;
			$data['mobile'] 						= $mobile;
			$email_txt = $CI->parser->parse('email/email_send_new_session_registration_to_admin',$data,true);
			$CI->email->from('noreply@serviceportal.com','Service Portal');
			$CI->email->to('masterconsult@clirnet.com');
			//$CI->email->to('pbiswas90@gmail.com');
			$CI->email->subject('Master Session Registration Request ['.$session_id.'] From Dr. '.$first_name." ".$last_name);
			$CI->email->message($email_txt);
			//$CI->email->message('Dr.'.$first_name.' '.$last_name.'('.$mem_id.') Added A New Askclir ');
			if($CI->email->send())
			{
				return true;
			}
			
			else
			{
				return false;
			}
			
			
			
		 
		 
		 }
}





