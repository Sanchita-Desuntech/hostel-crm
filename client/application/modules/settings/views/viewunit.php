<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Unit
                        
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/settings/addunit">
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
                            </div>
						
                            <div class="space15"></div>
                            <table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>SL No.</th>
                                    <th>Unit Name</th>
									<th>Slug</th>
									<th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php $i=0;
								foreach($unit as $u) { $i++;?>
                                <tr class="">
								<?php  if($u->status=="1") { $stat="Active";} else {$stat="Inactive";} ?>
								<td><?php echo $i;?></td>
                                    <td><?php echo $u->name;?></td>
                                    <td><?php echo $u->slug;?></td>
									<td><?php echo $u->description;?></td>
										
                                    <td class="center"><?php echo $stat;?></td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/settings/editunit/<?php echo $u->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel('<?php echo $u->id;?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                    </td>
                                   
                                </tr>
								<?php } ?>	
                                
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
    window.location.href = "<?php echo base_url()?>admin/settings/delete_unit/"+dataid+'/'+dataimg;
    }
  }
</script>      