<?php

?>
<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Task Management
                        
                        <span class="tools pull-right">
                           <!-- <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>-->
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
                                   <!-- <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/employee/addemployee">
                                        Add New <i class="fa fa-plus"></i>
                                    </a>-->
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
                                     <th>Task Name</th>
                                     <th>Task Description</th>
                                     <th>Task Priority</th>                                     
                                     <th>Supervisor Name</th>                                     
                                     <th>Attachment</th>
                                     <th>Task Priority</th>
                                     <th>Task Status</th>
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($allemployee_row as $alldata) { ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                     <td><?php echo $alldata->task_name; ?></td>
                                     <td><?php echo mb_strimwidth($alldata->task_desp, 0, 100, '...'); ?></td>
                                    <td><?php echo $alldata->task_priority; ?></td>
                                    <td><?php echo $alldata->sup_name; ?></td>
                                    
                                    <td class="img_data">
                                    	<?php if($alldata->attach_file != '' || $alldata->attach_file != null){
                                    		$files = json_decode($alldata->attach_file);
                                    		foreach($files as $file){?>
                                    	<a target="_blank" href="<?php echo base_url();?>uploads/task/<?php echo $file; ?>"><?php echo $file; ?></a><br>
                                    	<?php } ?>
                                    	<?php }else{ ?>
                                    	<p>No Attachemnt Available</p>
                                    	<?php } ?>
                                    </td>
                                    
                                    <td><?php echo $alldata->task_priority; ?></td>
                                    <td><?php echo $alldata->task_status; ?></td>
                                    <td>
                                    <?php if($alldata->task_status != 'Completed'){?>
										<a href="<?php echo base_url();?>admin/employeee/chat/<?php echo $alldata->task_id;?>" title="Chat"><i class='fa fa-comments' style='font-size:36px'></i></a>
										<?php }else{ ?>
										<p>Project is completed you can't chat</p>
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
  function myJsFunc_comdel(dataid,dataimg)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/employeee/delete_data/"+dataid+'/'+dataimg;
    }
  }
</script> 
    
         