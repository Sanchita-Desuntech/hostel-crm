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
                           <h3> Edit Invoice <a href="<?php echo base_url();?>admin/invoice" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <?php foreach($allinvoice_row as $singledata) { ?>
                             <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        			<div class="panel-body">
                                     <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
                                		<div class="form-group">
		                                    <label for="inputslidercaption">Customer Name</label>
		                                    <select name="customer_name" class="form-control">
		                                    	<option value="">Select Option</option>
		                                    	    <?php foreach($customer as $res_customer){?>
													<option value=<?php echo $res_customer->cust_code;?> <?php if($res_customer->cust_code==$singledata->customer_name) { echo "selected" ; } ?>><?php echo $res_customer->full_name;?></option>
												<?php }?>                          	
		                                    </select>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Service Name</label>
		                                    <select name="service_code" class="form-control">
		                                    	<option value="">Select Option</option>
		                                    	    <?php foreach($service as $res_service) { ?>
													<option value=<?php echo $res_service->service_id; ?> <?php if($res_service->service_id==$singledata->service_code) { echo "selected"; }?>><?php echo $res_service->service_name; ?></option>
												<?php } ?>                          	
		                                    </select>
		                                </div>
                                		
                                		<div class="form-group">
		                                    <label for="mobile">Service Amount</label>
		                                    <input name="amount" type="number" class="form-control" value="<?php echo $singledata->amount;?>" >
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption3">Description</label>
		                                    <textarea name="inv_descrp" class="form-control editor_big"  placeholder="Enter Description"><?php echo $singledata->inv_descrp; ?></textarea>
		                                     <?php echo form_error('inv_descrp','<div class="error">','</div>'); ?>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Status</label>
		                                    <select name="status" class="form-control">
		                                    	<option value="0" <?php if($singledata->status=="0") { echo "selected"; } ?>>Paid</option>
		                                    	<option value="1" <?php if($singledata->status=="0") { echo "selected"; } ?>>Unpaid</option>
		                                    </select>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Invoice Date</label>
		                                    <input name="inv_date" type="text" class="form-control" id="datepicker" value="<?php echo $singledata->inv_date; ?>" >
		                                </div>
                                		
                                
                               
                                	</div>
                                    </div>
                            
                            

                        </div>
                         		<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        		</form>
                        <?php } ?>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>