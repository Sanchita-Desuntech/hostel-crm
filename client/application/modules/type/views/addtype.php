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
                           <h3> Add Type Of User<a href="<?php echo base_url();?>admin/type/type" class="btn btn-danger flotright">Back</a></h3>
                        </header>
                        <div class="panel-body">
                            <div>
                                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                
                                

								<div class="form-group" id="type_name">
                                    <label for="inputslidercaption">User Type *</label>
                                    <input type="text" value="<?php echo set_value('type_name'); ?>" class="form-control" placeholder="Enter User Type" name="type_name">
                                    <?php echo form_error('type_name','<div class="error">','</div>'); ?>
                                </div>
                                
                                
                                <!--<div class="form-group">
                                    <label for="inputslidercaption2">Status</label>
                                    <select name="status" class="form-control">
                                    	<option value="1">Yes</option>
                                    	<option value="0">No</option>                                    	
                                    </select>
                                   
                                    
                        
                                </div>-->
                                
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
    <script type="text/javascript">

    $("#is_third_party").on('change', function() {  
        if(this.value==0){
            $("#ad_code").hide();
            $("#script").hide();
        }else{
            $("#ad_code").show();
            $("#script").show();
        }
    })
        



</script>