<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Invoice Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Sorry!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                            	<div class="btn-group">
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/invoice/addinvoice">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                   <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>-->
                                </div>						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                	 <th>SL No.</th>
                                   <th>Customer Name</th>
                                     <th>Invoice No.</th>
                                     <th>Current Date</th>
                                     <th>Package Name</th>
                                     <th>Package Amount</th>
                                     <th>Package Hours</th>
                                     <th>Invoice Type</th>
                                     <th>Coupon Code</th>
                                     <th>Coupon Type</th>
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($allinvoice_row as $alldata) { ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                     <td><?php echo $alldata->customer_name; ?></td>
                                     <td><?php echo $alldata->invoice_no; ?></td>
                                     <td><?php echo $alldata->curr_date; ?></td>
                                     <td><?php echo $alldata->pck_name; ?></td>
                                     <td><?php echo $alldata->package_amount; ?></td>
                                     <td><?php echo $alldata->package_hours; ?></td>
                                     <?php if($alldata->invoice_type == 'Pending'){?>
                                    <td><span class="btn btn-small btn-warning"><?php echo $alldata->invoice_type; ?></span></td>
                                    <?php } else { ?>
                                    <td><span class="btn btn-small btn-success"><?php echo $alldata->invoice_type; ?></span></td>
                                    <?php } ?>
                                     <td><?php echo $alldata->coupon_code; ?></td>
                                     <td><?php echo $alldata->coupon_type; ?></td>
                                    <!--<td><?php echo $alldata->email; ?></td>-->
                                    <td>
                                     <?php if($alldata->invoice_type == 'Pending'){?>
                                    <a class="edit_data" href="#">Pay Now</a> &nbsp;
                                  <?php } else { ?>
                                    <a class="delete_data" href="#">Paid</a> &nbsp;
                                  <?php } ?>
                                   </td>
                                </tr>
								<?php $i++; } ?>	
                                
                                </tbody>
                            </table>
                            
                            
                            <br />
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
<script type="text/javascript">
  function myJsFunc_comdel(dataid)
  {
  
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/invoice/delete_data/"+dataid;
    }
  }
</script> 
    
         