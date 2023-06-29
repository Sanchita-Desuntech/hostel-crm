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
                           <h3> Edit Tax <a href="<?php echo base_url();?>admin/settings/viewtax" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
							<?php foreach($tax as $t) { ?>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                 <label for="inputslidercaption">Tax Group Name</label>
                                    <input name="group_name" type="text" value="<?php echo $t->group_name; ?>" class="form-control" placeholder="Enter Unit Name">
                                    <?php echo form_error('name','<div class="error">','</div>'); ?>
                                    
                                </div>
                                <div class="form-group">
                                 <label for="inputslidercaption">Rate</label>
                                    <input name="rate" type="text" value="<?php echo $t->rate; ?>" class="form-control" >
                                    <?php echo form_error('rate','<div class="error">','</div>'); ?>
                                    
                                </div>
								<div class="form-group">
								<label for="inputslidercaption3">Type</label>
                                    <input name="type" type="text" class="form-control" value="<?php echo $t->type; ?>">
                                    
                                     <?php echo form_error('type','<div class="error">','</div>'); ?>
                                    
                                </div>
                                 <div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="status" class="form-control">
                                    	<option value="1" <?php if($t->status==1){echo "selected";}?>>Yes</option>
                                    	<option value="0" <?php if($t->status==0){echo "selected";}?>>No</option>                                    	
                                    </select>
                                   
                                    
                        
                                </div>	
                                
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