<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
           <div class="col-lg-12">
		    <?php if($this->session->flashdata('err_msg')!="") { ?>
						 <div class="clearfix"></div>
<div class="alert alert-danger">
  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>
</div>
  <?php } ?>
                    <section class="panel">
                        <header class="panel-heading">
                           <h3> Edit media <a href="<?php echo base_url();?>admin/media" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($single_data as $singledata) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                   <div class="form-group">
                                    <label for="inputslidercaption">Media Type</label>
                                    <select name="media_type" id="media_type" class="form-control" onchange="change_media_type(this.value);"> 
                                    <option value="">--Select Media Type--</option>
                                    <?php if($singledata->media_type=='image'){?>
                                    <option value="image" selected="selected">Image</option>
                                    <?php } else { ?>
                                    <option value="video"  selected="selected">Video</option>
                                    <?php } ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Title</label>
                                    <input name="title" value="<?php echo $singledata->title;?>" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Title">
                                </div>
								    
                                
                                  
                                <?php if($singledata->media_type=='image'){?>
                                <div class="form-group" id="imgbx">
								<img src="<?php echo base_url()?>uploads/media/<?php  echo $singledata->image_src?>" height=100px; width=100px;>
                                   
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                                <?php } else {?>
                                    <div class="form-group" id="youtubebx">
                                    <label for="inputslidercaption">Youtube Video Link</label>
                                    <input name="video_url" type="text" value="<?php echo $singledata->video_url;?>" class="form-control" id="inputslidercaption" placeholder="Youtube Video Link">
                                </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
							<?php } ?>
                            </div>

                        </div>
                    </section>

            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    
    <script type="text/javascript" language="javascript">
    function  change_media_type(currval){
	 alert(currval);
	 if(currval=='image')
	 {
		 $('#imgbx').show();
		 $('#youtubebx').hide();
	 }
	 else
	 {
		 $('#imgbx').hide();
		 $('#youtubebx').show();
	 }
	
	}
    
    
    </script>