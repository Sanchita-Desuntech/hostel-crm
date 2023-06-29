<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Contact Management
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('contact_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-contact">
                      <strong>Contact!</strong> <?=$this->session->flashdata('contact_msg');?>
                    </div>
                      <?php } ?>
                      
                       <?php if($this->session->flashdata('err_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-danger">
                      <strong>Contact!</strong> <?=$this->session->flashdata('err_msg');?>
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
                            </div>
						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Contact No</th>
                                    <th>Query Type</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								$i=1;
								foreach($alldata_row as $alldata) { ?>
                                <tr class="">
								
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $alldata->full_name; ?></td>
                                    <td><a href="mailto:<?php echo $alldata->email_id;?>?Subject=<?php echo $alldata->qry_type; ?>"  target="_top"><?php echo $alldata->email_id; ?></a></td>
                                    <td><?php echo $alldata->contact_no; ?></td>
                                    <td style="text-transform:uppercase; font-weight:600;"><?php echo $alldata->qry_type; ?></td>
                                     <td style="text-transform:uppercase; font-weight:600; color:#060;"><?php echo $alldata->addon; ?></td>
                                
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/contact/detailscontact/<?php echo $alldata->id;?>"><i class="fa fa-eye"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel(<?php echo $alldata->id;?>);" href="javascript:void(0);"><i class="fa fa-times"></i></a>
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
  function myJsFunc_comdel(dataid,dataimg)
  {
    if (confirm("Are you sure that you want to delete the data?"))
    {
    window.location.href = "<?php echo base_url()?>admin/contact/delete_data/"+dataid;
    }
  }
</script>      