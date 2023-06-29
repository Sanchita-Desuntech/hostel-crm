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
                           <h3> View Payment <a href="<?php echo base_url();?>admin/payment" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <?php
                        //print_r($allservice_row);die();
                         foreach($allpayment_row as $singledata)
                         //print_r($singledata);die();
                          { ?>
                        			<div class="panel-body">
                                    <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                      <div id="print" >         	                    
                                		<div class="form-group">
		                                    <label for="item_number">Item Number</label>
		                                    <input name="item_number" disabled="" type="text" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->item_number; ?>">
		                                </div>
		                                
		                                <div class="form-group">
		                                    <label for="inputslidercaption3">Item Name</label>
		                                    <input name="item_name" disabled="" type="text" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->item_name; ?>">
		                                </div>

                                        <div class="form-group">
                                            <label for="inputslidercaption3">Payment Amount</label>
                                            <input name="payment_amount" disabled="" type="text" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->payment_amount; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption3">Payment Currency</label>
                                            <input name="payment_currency" disabled="" type="text" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->payment_currency; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption3">Transaction Id</label>
                                            <input name="txn_id" type="text" disabled="" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->txn_id; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption3">Invoice No</label>
                                            <input name="invoice_no" type="text" disabled="" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->invoice_no; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputslidercaption3">Create At</label>
                                            <input name="create_at" type="text" disabled="" class="form-control" placeholder="Enter Service Name*" value="<?php echo $singledata->create_at; ?>">
                                        </div>
                                </div>
                               <div class="form-group">
                                            <a class="btn btn-primary"  onClick="printdiv('print');" href="javascript:void(0)">Print</a>
                                        
                                        </div>
                                	</div>
                                    </div>
                            
                            

                        </div>
                        <?php } ?>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
        <script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>