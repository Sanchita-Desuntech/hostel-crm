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
                           <h3> Add media <a href="<?php echo base_url();?>admin/media" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data">
                                   <div class="form-group">
                                    <label for="inputslidercaption">Media Type</label>
                                    <select name="media_type" id="media_type" class="form-control" onchange="change_media_type(this.value);">
                                    <option value="">--Select Media Type--</option>
                                    <option value="image">Image</option>
                                    <option value="video">Video</option>
                                    </select>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputslidercaption">Name</label>
                                    <input name="title" type="text" class="form-control" id="inputslidercaption" placeholder="Enter Name">
                                </div>
								
                               
                               
                                
                                <div class="form-group" id="imgbx">
                                    <label for="inputsliderimage">Image</label>
                                    <input type="file" name="image_src" id="inputsliderimage" accept="image/*" />
                                    <p class="help-block" style="color:red;">Please Select Only Image.</p>
                                </div>
                                  <div class="form-group" id="youtubebx" style="display:none;">
                                    <label for="inputslidercaption">Youtube Video Link</label>
                                    <input name="video_url" type="text" class="form-control" id="inputslidercaption" placeholder="Youtube Video Link">
                                </div>
                                
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
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
    