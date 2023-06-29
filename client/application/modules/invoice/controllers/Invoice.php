<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class Invoice extends MX_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in(); 	//common function for session checking.
        
        $this->load->library('session');
        $this->load->library('form_validation');
		$this->load->model('Invoice_model');
    }
    
    //===================================================================
    
    public function index()
    {
    	$cust_code=$this->session->userdata('user_code');
        $data_get= $this->Invoice_model->get_invoice($cust_code);
        $data['get_allinvoice_row']=$data_get;
		
		$site_name=$this->config->item('site_name');
        $this->template->set('title', 'Invoice | '.$site_name);
        $this->template->set_layout('layout_main', 'front');
        $this->template->build('invoice_table',$data);
	}
	
/*================================ Add Invoice===========================*/	

	public function generate_invoice()
   {
		extract($_POST);
		$invoice_code='VL-INV'.rand(00000,99999);
		$data['invoice_no'] = $invoice_code;
		$data['coupon_code'] = $coupon_code;
		$data['package_hours'] = $hours;
		$data['coupon_type'] = $coupon_type;
		$data['customer_code'] = $customer_code;
		$data['package_code'] = $package_code;
		$data['package_amount'] = $price;
		$data_added = $this->Invoice_model->add_invoice($data);		
		if($data_added)
             	{
             		//die("here");
					$message="";
	                $message = "<body style='background-color: #ECEFF1;font-family: 'Roboto', sans-serif;'><div class='page' style='width: 600px;margin: 0 auto;'><div class='page-head' style='background-color: #fff;border-radius: 3px;'>";
	                $message .= "<table width='100%'><tr><td style='text-align: center;'><h3 style='margin: 0;color: #293088;line-height: 60px;font-size: 28px;float: left;'><img src='".base_url()."themes/front/images/logo2.png'></h3></td><td style='text-align: center;'><ul style='padding: 0;margin:0;'><li style='list-style: none; color: #757575; margin-right: 8px; display: inline-block; margin-top: 10px;'></li></ul></td></tr></table>";
	                $message .='<table><tr><td style="padding: 10px 79px;color: #75758E; text-align: left;"><h5 style="font-size: 16px;font-weight: 400;line-height: 23px; text-align: center;">The Package Details </h5></td></tr>
	                <tr><th style="text-align: left;">Invoice No.</th><td> '.$data['invoice_no'].'</td></tr>
	                <tr><th style="text-align: left;">Customer Name</th><td> '.$this->session->userdata("full_name").'</td></tr>
	                <tr><th style="text-align: left;">Coupon Code</th><td>'.$data['coupon_code'].'</td></tr>
	                <tr><th style="text-align: left;">Package Hours</th><td>'.$data['package_hours'].'</td></tr>
	                <tr><th style="text-align: left;">Coupon Type</th><td>'.$data['coupon_type'].'</td></tr>
	                <tr><th style="text-align: left;">Package Amount</th><td>'.$data['package_amount'].'</td></tr>

	                <tr><th style="text-align: left;">Package code</th><td>'.$data['package_code'].'</td></tr>
	                </table></div>';
	                
            		$message .= "<div class='footer' style='width: 600px;background-color: #ECEFF1;'>
<table width='100%'><tr><td><p style='color: rgb(143, 143, 143);margin-bottom: 0;font-size: 14px; padding-left:3px;'>CRM © ".date("Y")." . All Rights Reserved</p></td></tr></table></div></div></body>"; 
	                //echo $message;die("here");
	                $subject = 'Invoice for Your Order'.$data['package_code'];
                //echo $subject;
	                $headersad = "From: CRM <noreply@rkshopkart.com>" . "\r\n";
	                $headersad .= "MIME-Version: 1.0" . "\r\n";
	                $headersad .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	                $headersad .= "X-Mailer: PHP/".phpversion();    
	                $to1="debadri94pagli@gmail.com";   
	                $to2= $this->session->userdata('email');
	               //die("here");
                
	                if(mail($to2,$subject,$message,$headersad) && mail($to1,$subject,$message,$headersad))  {
						echo json_encode($invoice_code);die();
						}
					 }
	}

	public function show_invoice($inv_no)
	{
	
		$data['paypal_setup'] = $this->Invoice_model->get_paypal_setup();
		$data_get= $this->Invoice_model->get_one_invoice($inv_no);
	    $data['allinvoice_row']=$data_get;
		$this->template->set('title', 'Invoice | '.$site_name);
	    $this->template->set_layout('layout_main', 'front');
	    $this->template->build('invoice_show',$data);
	}

	public function show_one_invoice($inv_no)
	{
		$data['paypal_setup'] = $this->Invoice_model->get_paypal_setup();
		$data_get= $this->Invoice_model->get_one_invoice($inv_no);
		$data['allinvoice_row']=$data_get;
		$this->template->set('title', 'Invoice | '.$site_name);
	    $this->template->set_layout('layout_main', 'front');
	    $this->template->build('invoice_show',$data);
	}

	public function delete_one_invoice($inv_no)
	{
		
		$data_delete= $this->Invoice_model->delete_one_invoice($inv_no);
		if($data_delete){
			$this->session->set_flashdata('success_msg', 'Invoice deleted Successfully');
			 redirect('client/invoice');
		}else{
			$this->session->set_flashdata('err_msg', 'Invoice delete Failed');
	         redirect('client/invoice');
		}
		
	}

public function paypal_return()
{  
	$customer_code=$this->session->userdata('user_code');           
	$this->template->set_layout('layout_main', 'front');
    $this->template->build('return');
}

public function paypal_cancel()
{
	
		
	$this->template->set_layout('layout_main', 'front');
    $this->template->build('cancel');
	
}
 

	
	
	
}
