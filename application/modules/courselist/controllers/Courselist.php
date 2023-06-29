<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Courselist extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
       $this->load->model('Courselist_model'); 
    }
    public function index()
    {
	    $limit = strip_tags($this->input->post('limit'));
		$start = strip_tags($this->input->post('start'));
       
        $data['num_of_row'] = $this->Courselist_model->countRow(); 
		if($data['num_of_row']> $start)
		{
		$data['courses_list']= $this->Courselist_model->get_courses($limit,$start);
		$this->load->view('courselist',$data);
		}
		else
		{
			echo '&nbsp;';
			exit;
		}
		
		
        
    }
	
	
	
	

	
	
	
	
	
	
	
	
}
