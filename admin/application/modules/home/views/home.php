<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <?php if(has_user_permission('view.dashboard')) : ?>

            <div class="row">
                <div class="col-md-12">
                    <section class="panel">
                        <div class="panel-body profile-information">
                        <h1>Dashboard</h1>
                        </div>
                    </section>
                </div>
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Open Tasks</h3>
                        
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
                                        <th>Service Name</th>
                                        <th>Supervisor Name</th>
                                        <!--<th>Task Hours</th> -->                                    
                                        <th>Consume Time</th>                                     
                                        <th>Customer Name</th>
                                        <th>Task Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($alltask_row as $alldata) { ?>
                                    <tr class="">
                                    <td><?php echo $i;?></td>
                                        <td><?php echo $alldata->task_name; ?></td>
                                        <td><?php echo $alldata->ser_name; ?></td>
                                        <td><?php echo $alldata->sup_name; ?></td>
                                        <td><?php echo $alldata->consume_time; ?></td>
                                        <td><?php echo $alldata->cus_name; ?></td>
                                        <td><?php echo $alldata->task_status; ?></td>
                                        <td class="center">

                                        <?php  if($alldata->status=="0") { ?>
                                        
                                        <a href="<?php echo base_url();?>admin/task/active/<?php echo $alldata->id;?>" class="btn btn-danger">Inactive </a>
                                        <?php } else if($alldata->status=="1"){?>
                                        <a href="<?php echo base_url();?>admin/task/inactive/<?php echo $alldata->id;?>" class="btn btn-success">Active </a>
                                        <?php } ?>
                                        
                                        </td>
                                        
                                        <td>
                                            <a class="edit_data" href="<?php echo base_url();?>admin/task/edittask/<?php echo $alldata->task_id;?>"><i class="fa fa-edit"></i></a>&nbsp; 
                                            <a class="view_data" href="<?php echo base_url();?>admin/task/viewtask/<?php echo $alldata->task_id;?>"><i class="fa fa-eye"></i></a>
                                        </td>
                                    
                                    </tr>
                                    <?php $i++; } ?>	
                                    
                                    </tbody>
                                </table>																							
                                
                            
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            <h3>Urgent Tasks</h3>
                        
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
                                <table class="table table-striped table-bordered nowrap" id="tabledata2" style="width:100%;">
                                    <thead>
                                    <tr>
                                        <th>SL No.</th>
                                        <th>Task Name</th>
                                        <th>Service Name</th>
                                        <th>Supervisor Name</th>
                                        <!--<th>Task Hours</th> -->                                    
                                        <th>Consume Time</th>                                     
                                        <th>Customer Name</th>
                                        <th>Task Status</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($allurgenttask_row as $alldata) { ?>
                                    <tr class="">
                                    <td><?php echo $i;?></td>
                                        <td><?php echo $alldata->task_name; ?></td>
                                        <td><?php echo $alldata->ser_name; ?></td>
                                        <td><?php echo $alldata->sup_name; ?></td>
                                        <td><?php echo $alldata->consume_time; ?></td>
                                        <td><?php echo $alldata->cus_name; ?></td>
                                        <td><?php echo $alldata->task_status; ?></td>
                                        <td class="center">

                                        <?php  if($alldata->status=="0") { ?>
                                        
                                        <a href="<?php echo base_url();?>admin/task/active/<?php echo $alldata->id;?>" class="btn btn-danger">Inactive </a>
                                        <?php } else if($alldata->status=="1"){?>
                                        <a href="<?php echo base_url();?>admin/task/inactive/<?php echo $alldata->id;?>" class="btn btn-success">Active </a>
                                        <?php } ?>
                                        
                                        </td>
                                        
                                        
                                        <td>
                                            <a class="edit_data" href="<?php echo base_url();?>admin/task/edittask/<?php echo $alldata->task_id;?>"><i class="fa fa-edit"></i></a>&nbsp; 
                                            <a class="view_data" href="<?php echo base_url();?>admin/task/viewtask/<?php echo $alldata->task_id;?>"><i class="fa fa-eye"></i></a>
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

        <?php else : ?>

            <div>
                <p>You don't have permission to view the content</p>
            </div>

        <?php endif ?>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<!--right sidebar start-->

<!--right sidebar end-->

</section>