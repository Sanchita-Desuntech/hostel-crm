<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>media Management
                        
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
                                    <a id="editable-sample_new" class="btn btn-primary" href="<?php echo base_url()?>admin/media/addmedia">
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
                                     <th>Media Type</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Link</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
								<?php 
								$i=1;
								foreach($alldata_row as $alldata) { ?>
                                <tr class="">
								
                                    <td><?php echo $i;?></td>
                                     <td><?php echo $alldata->media_type; ?></td>
                                    <td><?php echo $alldata->title; ?></td>
                                    <td class="img_data">
                                    <?php if($alldata->image_src!=''){?>
                                    <img  src="<?php echo base_url()?>uploads/media/<?php echo $alldata->image_src;?>" style="width:50px; height:50px" >
                                    <?php } ?>
                                    </td>
                                    <td><?php echo $alldata->video_url;?></td>
                                    <td class="center">
                                   <?php echo base_url()?>uploads/media/<?php echo $alldata->image_src;?>
                                    </td>
                                    <td>
                                    <a class="edit_data" href="<?php echo base_url();?>admin/media/editmedia/<?php echo $alldata->id;?>"><i class="fa fa-edit"></i></a> &nbsp; 
                                    <a class="delete_data" onclick="myJsFunc_comdel(<?php echo $alldata->id;?>,'<?php echo base64_encode($alldata->image_src);?>');" href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                    </td>
                                   
                                </tr>
								<?php $i++;} ?>	
                                
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
    window.location.href = "<?php echo base_url()?>admin/media/delete_data/"+dataid+'/'+dataimg;
    }
  }
</script>      