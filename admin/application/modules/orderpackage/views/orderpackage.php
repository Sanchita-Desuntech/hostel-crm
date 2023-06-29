<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Order Package              
                        <span class="tools pull-right">
                            <!--<a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>-->
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Success!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                  <?php /*?>  <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/pages/addpages">
                                        Add New <i class="fa fa-plus"></i>
                                    </a><?php */?>
                                </div>
                                <div class="btn-group pull-right">
                                   
                                </div>
                            </div>
						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Package Name</th>
                                    <th>Package Amount</th>
                                    <th>Payment Currency</th>
                                    <th>Payment Status</th>
                                    <th>Transaction Id</th>
                                    <th>Customer Name</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								$i=1;
								foreach($allorderpackage_row as $alldata) { ?>
                                <tr class="">
								
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $alldata->item_name;?></td>
                                    <td><?php echo $alldata->payment_amount;?></td>
                                    <td><?php echo $alldata->payment_currency;?></td>
                                    <td><?php echo $alldata->payment_status;?></td>
                                    <td><?php echo $alldata->txn_id;?></td>
                                    <td><?php echo $alldata->customer_name;?></td>
                                    <td>
                                    	<a class="edit_data" title="view" href="<?php echo base_url();?>admin/orderpackage/vieworderpackage/<?php echo $alldata->id;?>"><i class="fa fa-eye"></i></a> &nbsp; 
                                        <!--<a class="delete_data" onclick="myJsFunc_comdel('<?php echo $alldata->id;?>') " href="javascript:void(0);"><i class="fa fa-times"></i></a>&nbsp; -->
                                        <a href="<?php echo base_url();?>admin/orderpackage/printorderpackage/<?php echo $alldata->id;?>"><img style="height: 30px; width: 27px;" src="<?php echo base_url();?>themes/admin/images/printer.png"></a>
                                    </td>
                                </tr>
								<?php $i++; } ?>	
                                
                                </tbody>
                            </table>
                            
                            
                            
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
    window.location.href = "<?php echo base_url()?>admin/orderpackage/delete_data/"+dataid;
    }
  }
</script>