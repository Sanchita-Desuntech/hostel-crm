<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Employee Management
                        
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/employee/addemployee">
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
                                     <th>Name</th>
                                     <th>Mobile</th>
                                     <th>Email</th>                                     
                                     <th>Supervisor Name</th>                                     
                                     <th>Profile Photo</th>
                                     <th>Status</th>
                                     <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								 $i=1;
								 foreach($allemployee_row as $alldata) { ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                     <td><?php echo $alldata->full_name; ?></td>
                                     <td><?php echo $alldata->mobile; ?></td>
                                    <td><?php echo $alldata->email; ?></td>
                                    <td><?php echo $alldata->sup_name; ?></td>
                                    
                                    <td class="img_data"><img  src="<?php echo base_url()?>uploads/users/profile_photo/<?php echo $alldata->profile_photo;?>" height=100px;width=100px;></td>
                                    
                                    <td class="center">

                                    <?php  if($alldata->status=="0") { ?>
                                    
                                    <a href="<?php echo base_url();?>admin/employee/active/<?php echo $alldata->emp_code;?>" class="btn btn-danger">Inactive </a>
                                     <?php } else if($alldata->status=="1"){?>
                                       <a href="<?php echo base_url();?>admin/employee/inactive/<?php echo $alldata->emp_code;?>" class="btn btn-success">Active </a>
                                     <?php } ?>
                                       
                                    </td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/employee/editemployee/<?php echo $alldata->emp_code;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $alldata->emp_code;?>','<?php echo base64_encode($alldata->profile_photo);?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
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
    window.location.href = "<?php echo base_url()?>admin/employee/delete_data/"+dataid+'/'+dataimg;
    }
  }
</script> 
    
         