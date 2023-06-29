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
                           <h3> Add Tax<a href="<?php echo base_url();?>admin/settings/addtax" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label for="inputslidercaption">Tax Group Name</label>
                                    <input name="group_name" value="<?php echo set_value('group_name'); ?>" type="text" class="form-control" placeholder="Enter Tax Group Name">
                                    <?php echo form_error('group_name','<div class="error">','</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputslidercaption">Rate</label>
                                    <input name="rate" value="<?php echo set_value('rate'); ?>" type="text" class="form-control" placeholder="Enter Rate">
                                    <?php echo form_error('rate','<div class="error">','</div>'); ?>
                                </div>

								<div class="form-group">
                                    <label for="inputslidercaption">Type</label>
                                    <input name="type" value="<?php echo set_value('type'); ?>" type="text" class="form-control" placeholder="Enter Type">
                                    <?php echo form_error('type','<div class="error">','</div>'); ?>
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