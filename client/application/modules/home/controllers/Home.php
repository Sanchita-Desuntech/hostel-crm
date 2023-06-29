<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Home extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        
    }
    //===================================================================
    public function index()
    {
		
       
        
        $this->template->set('title','Home');
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('home');
    }
	

	
	
	
	
	
	
	
	
	
	
}
