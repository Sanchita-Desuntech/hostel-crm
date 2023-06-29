<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
           <?php if($this->session->flashdata('success_msg')!="") { ?>
        		<div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php $this->session->flashdata('success_msg');?>
                    </div>
            <?php } ?>
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
				<div class="clearfix"></div>
					<div class="alert alert-danger">
					  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
					</div>
  			<?php } ?>
<script type="text/javascript">
   </script>
                    <section class="panel">
                    <header class="panel-heading">
                           <h3> Invoice </h3>
                    </header>
                       <div class="panel-body" style="display: block;">
                        <?php
                        //print_r($allinvoice_row); die
                        $i=1;
                         foreach($allinvoice_row as $pck_res) {
                         	//echo "<pre>"; print_r($pck_res);die("look"); 
                         	?>
                            <div class="col-lg-12">
						          <div class="small-box bg-aqua"> 
						            <div class="inner">
						              <h3> <?php echo $pck_res->invoice_no; ?></h3>
						              <p> <?php echo $pck_res->curr_date; ?></p>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Hours:</strong>
						              	<?php echo $pck_res->package_hours; ?>
						              </div>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Customer Name:</strong>
						              	<?php echo $pck_res->customer_name; ?>
						              </div>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Package Name:</strong>
						              	<?php echo $pck_res->pck_name; ?>
						              </div>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Invoice Type:</strong>
						              	<?php echo $pck_res->invoice_type; ?>
						              </div>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Coupon Code:</strong>
						              	<?php echo $pck_res->coupon_code; ?>
						              </div>
						              <div class="hours_bx" id="total_hours<?php echo $i; ?>"><strong>Coupon Type:</strong>
						              	<?php echo $pck_res->coupon_type; ?>
						              </div>
						              <div class="price_bx" id="price_box<?php echo $i; ?>"><strong>Package Amount:</strong>
						              	<?php echo $pck_res->package_amount; ?>
						              </br>
						              </div>

                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
						
					
					<?php $cust_code=$this->session->userdata('user_code');?>             
	                <?php foreach($paypal_setup as $res_paypal) { ?>
	                <input type='hidden' name='business' value='<?php echo $res_paypal->business_email; ?>'>
					<input type='hidden' name='item_name' value='<?php echo $pck_res->pck_name; ?>'>
                    <input type='hidden'  name='item_number' value='<?php echo $pck_res->package_code; ?>'> 
                    <input type='hidden' name='custom' value='cust_code=<?php echo $cust_code; ?>&invoice_no=<?php echo $pck_res->invoice_no; ?>&time_wallet=<?php echo $pck_res->package_hours; ?>&customer_time=<?php echo $pck_res->customer_time; ?>'>
					<input type='hidden' name='currency_code' value='INR'>
					<input type='hidden' name='amount' id='price<?php echo $i; ?>' value='<?php echo $pck_res->package_amount; ?>'>
					<input type='hidden' name='package_hours' id='hours<?php echo $i; ?>' value='<?php echo $pck_res->package_hours; ?>'>
					<input type='hidden' name='notify_url' value='<?php echo $res_paypal->notify_url; ?>'>
					<input type='hidden' name='cancel_return' value='<?php echo $res_paypal->cancel_url; ?>'>
					<input type='hidden' name='return' value='<?php echo $res_paypal->return_url; ?>'>
					<?php } ?>               	  
	                <input type="hidden" name="cmd" value="_xclick">
					<input type="submit" name="pay_now" id="pay_now" Value="Pay Now" class="btn btn-success">
					
					</form>
                                     </div>


									  	            
						            </div>
						          </div> 
                        <?php $i++; } ?>
                   </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
</section>