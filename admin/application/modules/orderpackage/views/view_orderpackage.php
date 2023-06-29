<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> View Order Package <a href="<?php echo base_url();?>admin/orderpackage" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                            	<?php foreach($allorderpackage_row as $alldata) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Package Name:</label><br>
                                    <?php echo $alldata->item_name;?>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Payment Status:</label><br>
                                    <?php echo $alldata->payment_status; ?>
                                    
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Payment Amount:</label><br>
                                    <?php echo $alldata->payment_amount; ?>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Payment Currency:</label><br>
                                    <?php echo $alldata->payment_currency; ?>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Txn Id:</label><br>
                                    <?php echo $alldata->txn_id; ?>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Customer Name:</label><br>
                                    <?php echo $alldata->full_name; ?>
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Email:</label><br>
                                    <?php echo $alldata->payer_email; ?>
                                </div>
                            </form>
								<?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
</section>

<script type="text/javascript">

    $("#dstype").on('change', function() {  
        if(this.value == 'time'){
        	
        	$("#time1").show();
            $("#discount1").hide();
        }else{
            $("#discount1").show();
            $("#time1").hide();
        }
    })
</script>