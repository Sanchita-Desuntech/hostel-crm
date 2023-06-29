<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Orderpackage extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
		
        $this->load->library('form_validation');
		$this->load->model('Orderpackage_model');
    }
    //===================================================================
    public function index()
    {
		$data_get= $this->Orderpackage_model->get_data();
		$data['allorderpackage_row']=$data_get;
		$this->template->set('title', 'Orderpackage | '.$this->config->item('site_name'));
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('orderpackage',$data);
    }
	
	

/*================================ Edit ===========================*/	
public function vieworderpackage($id)

    {
    	$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'View Orderpackage | '.$site_name);

		$data_single = $this->Orderpackage_model->get_data_by_id($id);

		$data['allorderpackage_row']=$data_single;
		//print_r($data_single);die("jh");

		$this->template->set_layout('layout_main', 'front');

        $this->template->build('view_orderpackage',$data);
	}

/*================================ Delete Data ===========================*/	
	
public function delete_data($dataid)
    {
        $this->Orderpackage_model->delete_row_data($dataid);
		redirect('admin/orderpackage');
        exit;
    }
	
	
	
	
}
