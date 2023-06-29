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
                            <!--<a href="javascript:;" class="fa fa-times"></a>-->
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
                      <strong>Success!</strong> <?php echo $this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                            	<div class="btn-group">
                                    
                                </div>
                                <div class="btn-group pull-right">
                                </div>						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                	 <th>SL No.</th>
                                     <th>Invoice No.</th>
                                     <th>Current Date</th>
                                     <th>Package Name</th>
                                     <th>Package Amount</th>
                                     <th>Package Hours</th>
                                     <th>Status</th>
                                     <th>Coupon Code</th>
                                     <th>Coupon Type</th>
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($get_allinvoice_row as $alldata) { 
								 //print_r($alltask_row); die("jk");
								 ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
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
                                    <td>
                                     <?php if($alldata->invoice_type == 'Pending'){?>
                                    <a class="edit_data edit_data_extra_style" href="<?php echo base_url(); ?>client/invoice/show_one_invoice/<?php echo $alldata->invoice_no; ?>">Pay Now</a> 
                                    <a class="delete_data delete_data_extra_style" href="<?php echo base_url(); ?>client/invoice/delete_one_invoice/<?php echo $alldata->invoice_no; ?>"><i class="fa fa-trash-o"></i></a> 
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
    

    
         