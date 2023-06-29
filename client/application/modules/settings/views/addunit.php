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
                           <h3> Add Unit<a href="<?php echo base_url();?>admin/settings/addunit" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Unit Name</label>
                                    <input name="name" type="text" value="<?php echo set_value('name'); ?>" class="form-control" placeholder="Enter Unit Name">
                                    <?php echo form_error('name','<div class="error">','</div>'); ?>
                                </div>
								<div class="form-group">
                                    <label for="inputslidercaption3">Description</label>
                                    <textarea name="description"   class="form-control editor_big"  placeholder="Enter Description"><?php echo set_value('description'); ?></textarea>
                                     <?php echo form_error('description','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="status" class="form-control">
                                    	<option value="1">Yes</option>
                                    	<option value="0">No</option>                                    	
                                    </select>
                                   
                                    
                        
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