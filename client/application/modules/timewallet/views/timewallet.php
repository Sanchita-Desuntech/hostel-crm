<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Time Wallet Management
                        </h3>
                       
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
                      <strong>Success!</strong> <?=$this->session->flashdata('err_msg');?>
                    </div>
                      <?php } ?>
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                            	
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
                                     <th>Transaction Id</th>
                                     <th>Hours</th>
                                     <th>Remain Hours</th>
                                     <th>purpose</th>
                                     <th>Task Id</th>
                                     <th>Create Time</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($alltimewallet_row as $alldata) { 
								 //print_r($alltask_row); die("jk");
								 ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                    <td><?php echo $alldata->trans_id; ?></td>
                                    <td><?php echo $alldata->hours; ?></td>
                                    <td><?php echo $alldata->remain_hours; ?></td>
                                    <td><?php echo $alldata->purpose; ?></td>
                                    <td><?php echo $alldata->task_id; ?></td>
                                    <td><?php echo $alldata->create_time; ?></td>
                                    
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
    

    
         