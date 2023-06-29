<?php if (! defined('BASEPATH')) {

    exit('No direct script access allowed');

}

class Coupon extends MX_Controller

{

    public function __construct()

    {

        parent::__construct();

        is_logged_in(); 	//common function for session checking.

		

        $this->load->library('form_validation');

		$this->load->model('Coupon_model');

    }

    //===================================================================

    //===================================================================



    public function viewcoupon()



    {

    	$data_get= $this->Coupon_model->get_data();

    	

		$data['coupon']=$data_get;



        $this->template->set('title','Coupon  | '.$this->config->item('site_name'));



        $this->template->set_layout('layout_main', 'front');



        $this->template->build('viewcoupon',$data);

	}

	



	

/*================================ Add Coupon===========================*/	

	public function addcoupon()

	{

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

			//print_r($_POST);die();

			$data['coupon_code']= strtoupper(strip_tags($this->input->post('coupon_code')));

			$data['start_date']= strip_tags($this->input->post('start_date'));

			$data['end_date']= strip_tags($this->input->post('end_date'));
			$data['redemption']= strip_tags($this->input->post('redemption'));
			//$data['type']= strip_tags($this->input->post('type'));

			$data['discount_amount']= $this->input->post('discount_amount');

			$data['time_add']= $this->input->post('time_add');

			$data['dis_type']= $this->input->post('dis_type');

			$data['new_user_coupon']= strip_tags($this->input->post('new_user_coupon'));

			$data['min_cart_value']= strip_tags($this->input->post('min_cart_value'));

			$data['max_cart_value']= strip_tags($this->input->post('max_cart_value'));

			$data['coupon_desp']= $this->input->post('coupon_desp');

			$data['is_active']= strip_tags($this->input->post('is_active'));

			$now = date('Y-m-d');

			$data['create_date'] =$now;

			//print_r($data);

			 $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'trim|required');

			 $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');

			 $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

			 $this->form_validation->set_rules('redemption', 'Redemption', 'trim|required');

			 $this->form_validation->set_rules('new_user_coupon', 'New User Coupon', 'trim|required');

			 $this->form_validation->set_rules('min_cart_value', 'Min Cart Value', 'trim|required');

			 $this->form_validation->set_rules('max_cart_value', 'Max Cart Value', 'trim|required');
			 $this->form_validation->set_rules('dis_type', 'Discount Type', 'trim|required');
			 
			 //$this->form_validation->set_rules('coupon_desp', 'Coupon Description', 'trim|required');
			 

			  if ($this->form_validation->run() == TRUE) {

			  	$data_inserted = $this->Coupon_model->add_data($data);
			  	  //echo $this->db->last_query();
			  	  $this->session->set_flashdata('success_msg', 'Coupon Added Successfully'); 

                	redirect('admin/coupon/viewcoupon');

			  }
			

		}

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Add Coupon | '.$site_name);

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('addcoupon');

	}





/*================================ Edit Coupon===========================*/	

	public function editcoupon($id)

	{

		if($this->uri->segment(3)=="")

		{

			$this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

			redirect('admin/coupon/viewcoupon');	

		}

		

		if ($this->input->server('REQUEST_METHOD') == 'POST')

		{

       

	        $data['coupon_code']= strtoupper(strip_tags($this->input->post('coupon_code'))) ;

			$data['start_date']= strip_tags($this->input->post('start_date'));

			$data['end_date']= strip_tags($this->input->post('end_date'));

			//$data['type']= strip_tags($this->input->post('type'));
			$data['discount_amount']= $this->input->post('discount_amount');

			$data['time_add']= $this->input->post('time_add');

			$data['dis_type']= $this->input->post('dis_type');

			$data['redemption']= strip_tags($this->input->post('redemption'));

			$data['new_user_coupon']= strip_tags($this->input->post('new_user_coupon'));

			$data['min_cart_value']= strip_tags($this->input->post('min_cart_value'));

			$data['max_cart_value']= strip_tags($this->input->post('max_cart_value'));

			$data['coupon_desp']= strip_tags($this->input->post('coupon_desp'));

			$data['is_active']= strip_tags($this->input->post('is_active'));

			$now = date('Y-m-d');

			$data['create_date'] =$now;

			

			 $this->form_validation->set_rules('coupon_code', 'Coupon Code', 'trim|required');

			 $this->form_validation->set_rules('start_date', 'Start Date', 'trim|required');

			 $this->form_validation->set_rules('end_date', 'End Date', 'trim|required');

			 $this->form_validation->set_rules('redemption', 'Redemption', 'trim|required');

			 $this->form_validation->set_rules('new_user_coupon', 'New User Coupon', 'trim|required');

			 $this->form_validation->set_rules('min_cart_value', 'Min Cart Value', 'trim|required');
			 $this->form_validation->set_rules('max_cart_value', 'Max Cart Value', 'trim|required');
			 //$this->form_validation->set_rules('coupon_desp', 'Max Cart Value', 'trim|required');        

            if ($this->form_validation->run() == TRUE) {

            	

                  $data_updated = $this->Coupon_model->edit_data($data,$id);

                $this->session->set_flashdata('success_msg', 'Coupon Edited Successfully'); 

               redirect('admin/coupon/viewcoupon');	

            }

		}

		

		

		$site_name=$this->config->item('site_name');

	    $this->template->set('title', 'Edit Coupon | '.$site_name);

		$data_single = $this->Coupon_model->get_data_by_id($id);

		$data['coupon']=$data_single ;

		//print_r($data_single);die();

        $this->template->set_layout('layout_main', 'front');

        $this->template->build('editcoupon',$data);

    }

   

/*================================ Delete Coupon===========================	*/

	

	public function delete_coupon($dataid)

    {

        $this->Coupon_model->delete_row_data($dataid);

		redirect('admin/coupon/viewcoupon');

        exit;

    }



/*===================== Inactive=======================================*/

	public function inactive($id)

    {

        if($this->uri->segment(3)=="")

        {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

            redirect($_SERVER['HTTP_REFERER']);

        }

        else

        {

               $data['is_active'] = '0';

               $data_inserted = $this->Coupon_model->edit_data($data,$id);

               $this->session->set_flashdata('success_msg', 'Coupon Edited Successfully'); 

               redirect($_SERVER['HTTP_REFERER']);             

        }

    }   



/*=====================Active =======================================*/



  public function active($id)

    {

    	//die($id);

        if($this->uri->segment(3)=="")

        {

            $this->session->set_flashdata('err_msg', 'Dont Change the URL physically'); 

            redirect($_SERVER['HTTP_REFERER']);

        }

        else

        {

               $data['is_active'] = '1';

               $data_inserted = $this->Coupon_model->edit_data($data,$id);

               $this->session->set_flashdata('success_msg', 'Coupon Edited Successfully'); 

               redirect($_SERVER['HTTP_REFERER']);              

        }

    }

			

	

	

	

	

	

	

	

	

}

