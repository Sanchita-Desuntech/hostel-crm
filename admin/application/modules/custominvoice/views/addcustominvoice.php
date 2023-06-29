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
                           <h3> Add Invoice <a href="<?php echo base_url();?>admin/custominvoice" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                        			<div class="panel-body">
                                     <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">                              
                                		<div class="form-group">
		                                    <label for="inputslidercaption">Customer Name</label>
		                                    <select name="customer_name" class="form-control">
		                                    	<option value="">Select Customer Name</option>
		                                    	    <?php foreach($customer as $res_customer){?>
													<option value=<?php echo $res_customer->cust_code;?>><?php echo $res_customer->full_name;?></option>
												<?php }?>                          	
		                                    </select>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Invoice Date</label>
		                                    <input name="inv_date" type="text" class="form-control" id="datepick" >
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Service Name</label>
		                                    <select name="service_code" class="form-control" id="service" onchange="showService(this.value)">
		                                    	<option value="">Select Service Name</option>
		                                    	    <?php foreach($service as $res_service) { ?>
													<option value=<?php echo $res_service->service_id; ?>><?php echo $res_service->service_name; ?></option>
												<?php } ?>                          	
		                                    </select>
		                                </div>
                                		
                                		<div class="form-group">
		                                    <label for="mobile">Service Amount</label>
		                                    <input name="amount" type="number" class="form-control" id="amnt">
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption3">Description</label>
		                                    <textarea name="inv_descrp" class="form-control editor_big"  placeholder="Enter Description"><?php echo set_value('inv_descrp'); ?></textarea>
		                                     <?php echo form_error('inv_descrp','<div class="error">','</div>'); ?>
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Status</label>
		                                    <select name="status" class="form-control">
		                                    	<option value="0">Paid</option>
		                                    	<option value="1">Unpaid</option>
		                                    </select>
		                                </div>
		                                <div class="form-group">
		                                    <label for="inputslidercaption">Payment Method</label>
		                                    <select name="pay_method" class="form-control">
		                                    	<option value="0">Cash</option>
		                                    	<option value="1">Net Banking</option>
		                                    </select>
		                                </div>
		                                
                                		
                                
                               
                                	</div>
                                    </div>
                            
                            

                        </div>
                         		<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
                        		</form>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
  
  <script>
function showService(str) {
  var xhttp;    
  if (str == "") {
    document.getElementById("amnt").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("amnt").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "addinvoice?q="+str, true);
  xhttp.send();
}
</script>

 
