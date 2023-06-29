<?php
foreach($singlecustomer_row as $singl_cus){
	$user_code = $singl_cus->user_code;
}
?>
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
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Customer Details  <a href="<?php echo base_url();?>admin/customer" class="btn btn-danger flotright">Back</a> <a href="<?php echo base_url();?>admin/customer/editcustomer/<?php echo $user_code;?>" style="margin-right: 2px;" class="btn btn-danger flotright">Edit</a> <a href="<?php echo base_url();?>admin/customer/weblogin/<?php echo $user_code;?>" style="margin-right: 2px;" class="btn btn-danger flotright">Weblogin</a></h3>
                        </header>
                        <?php foreach($singlecustomer_row as $singledata) { ?>
                         
                        			<div class="panel-body">
                                    <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
                                		<div class="row">
											<div class="col-md-6">
												<div class="form-group">
		                                   			 <label for="full_name">User Code</label>
		                                   			 <input name="full_name" disabled="" type="text" class="form-control"  value="<?php echo $singledata->user_code;?>">
		                               			 </div>
		                                		<div class="form-group">
				                                    <label for="full_name">Name </label>
				                                    <input name="full_name" disabled="" type="text" class="form-control"  value="<?php echo $singledata->full_name;?>">
				                                </div>
				                                <div class="form-group">
				 <!--id="datepick"-->           	<label for="inputslidercaption">Date Of Birth</label>
				                                    <input name="dob" disabled="" type="text" value="<?php echo $singledata->dob; ?>" class="form-control">
		                                		</div>
		                                		<div class="form-group">
				                                    <label for="email">Email </label>
				                                    <input name="email" type="text" disabled="" class="form-control"  value="<?php echo $singledata->email;?>">
				                                 
				                                </div>
		                                		<div class="form-group">
				                                    <label for="mobile">Mobile </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->mobile;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">Password </label>
				                                    <input disabled type="password" class="form-control" value="<?php echo $singledata->password;?>"> 
				                                </div>
		                                		<div class="form-group">
				                                    <img src="<?php echo base_url()?>uploads/users/profile_photo/<?php echo $singledata->profile_photo;?>" height=100px; width=100px;>
				                                </div>
				                                 <div class="form-group">
				                                    <label for="mobile">Mobile Verified </label>
				                                    <input disabled type="text" class="form-control" value="<?php if($singledata->is_mobile_verified == '1'){echo 'Verified';}else{echo "Not Verified";} ?>"> 
				                                </div>
				                                 <div class="form-group">
				                                    <label for="mobile">Email Verified </label>
				                                    <input disabled type="text" class="form-control" value="<?php if($singledata->is_email_verified == '1'){echo 'Verified';}else{echo "Not Verified";}?>"> 
				                                </div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
				                                    <label for="mobile">Time Wallet </label>
				                                    <input disabled="" name="time_wallet" type="text" class="form-control" value="<?php echo $singledata->time_wallet; ?>"> 
				                                </div>
												 <div class="form-group">
				                                    <label for="mobile">Address 1 </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->address_line1 ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">Address 2 </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->address_line2 ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">City </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->city ;?>"> 
				                                </div>
				                                 <div class="form-group">
				                                    <label for="mobile">Country </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->country ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">State </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->state ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">Created On </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->created_on ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="mobile">Updated On </label>
				                                    <input disabled type="text" class="form-control" value="<?php echo $singledata->updated_on ;?>"> 
				                                </div>
				                                <div class="form-group">
				                                    <label for="inputslidercaption">Preference *</label>
				                                    <input  disabled="" type="text" value="<?php echo $singledata->preference; ?>" class="form-control">
				                                </div>
											</div>
										</div>
                                		
                                	</div>
                                    </div>
                            
                            

                        </div>
       
                        		
                        <?php } ?>
                    </section>
                    
                <!--------------------------------------------------------------------->
                <!----=================  CUSTOMER TASK DETAILS   --------------------------------->
                <!------------------------------------------------------------->
                     <section class="panel">
                        <header class="panel-heading">
                           <h3> Customer Task Details  <a href="<?php echo base_url();?>admin/customer" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        
                         
                        			<div class="panel-body">
                                    <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
										
										     <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                	 <th>SL No.</th>
                                     <th>Task Name</th>
                                     <th>Service Name</th>
                                     <th>Task Priority</th>
                                     <th>Task Status</th>
                                     <th>Task Hours</th>
                                     <th>Start Date</th>
                                     <th>Priority</th>
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($alltask_row as $alldata) { 
								 //print_r($alltask_row); die("jk");
								 ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewtask/<?php echo $alldata->task_id;?>">  <?php echo $alldata->task_name; ?> </a> </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewtask/<?php echo $alldata->task_id;?>">  <?php echo $alldata->service_name; ?> </a>  </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewtask/<?php echo $alldata->task_id;?>"> <?php echo $alldata->task_priority; ?> </a> </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewtask/<?php echo $alldata->task_id;?>"> <?php echo $alldata->task_status; ?> </a> </td>
                                    <td><?php echo $alldata->task_hours; ?></td>
                                    <td><?php echo $alldata->created_on; ?></td>
                                    <td><?php echo $alldata->task_priority; ?></td>
                                    <td>
                                   
                                    
                                    <a class="view_data" href="<?php echo base_url();?>admin/customer/viewtask/<?php echo $alldata->task_id;?>">view</a> &nbsp;
                              
                                   
                                   </td>
                                </tr>
								<?php $i++; } ?>	
                                
                                </tbody>
                            </table>
										
													
                                	</div>
                                    </div>
                        </div>
       
                        		
                        
                    </section>
                     
	  <!--------------------------------------------------------------------->
                <!----============  CUSTOMER TASK DETAILS   --------------------------------->
                <!------------------------------------------------------------->
                
                
                  <!--------------------------------------------------------------------->
                <!----=================  CUSTOMER PAYMENT DETAILS   --------------------------------->
                <!------------------------------------------------------------->
                     <section class="panel">
                        <header class="panel-heading">
                           <h3> Customer Payment Details  <a href="<?php echo base_url();?>admin/customer" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        
                         
                        			<div class="panel-body">
                                    <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
										
										     <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                	 <th>SL No.</th>
                                     <th>Item Name</th>
                                     <th>Item Number</th>
                                     <th>Payment Status</th>
                                     <th>Payment Amount</th>
                                     <th>Txn Id</th>
                                     <th>Invoice No</th>
                                     <th>Paid On</th>
                                    <!-- <th>Priority</th>-->
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								/* echo "<pre>";
								 print_r($allpaymentdata_row); die("jk");*/
								 foreach($allpaymentdata_row as $alldata) { 
								
								 ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewpayment/<?php echo $alldata->id;?>">  <?php echo $alldata->item_name; ?> </a> </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewpayment/<?php echo $alldata->id;?>">  <?php echo $alldata->item_number; ?> </a>  </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewpayment/<?php echo $alldata->id;?>"> <?php echo $alldata->payment_status; ?> </a> </td>
                                    <td>  <a class="view_data" href="<?php echo base_url();?>admin/customer/viewpayment/<?php echo $alldata->id;?>"> <?php echo $alldata->payment_amount; ?> <?php echo $alldata->payment_currency; ?></a> </td>
                                    <td><?php echo $alldata->txn_id; ?></td>
                                    <td><?php echo $alldata->invoice_no; ?></td>
                                    <td><?php echo $alldata->create_at; ?></td>
                                    <td>
                                   
                                    
                                    <a class="view_data" href="<?php echo base_url();?>admin/customer/viewpayment/<?php echo $alldata->id;?>">view</a> &nbsp;
                              
                                   
                                   </td>
                                </tr>
								<?php $i++; } ?>	
                                
                                </tbody>
                            </table>
										
													
                                	</div>
                                    </div>
                        </div>
       
                        		
                        
                    </section>
                     
	  <!--------------------------------------------------------------------->
                <!----============  CUSTOMER PAYMENT DETAILS   --------------------------------->
                <!------------------------------------------------------------->
                
                
                
                
            </div>
        </div>
        <!-- page end-->
        </section>