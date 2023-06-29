<section id="main-content">

        <section class="wrapper">

        <!-- page start-->



        <div class="row">

           <div class="col-lg-12">

           <?php if($this->session->flashdata('success_msg')!="") { ?>

        	<div class="clearfix"></div>

                    <div class="alert alert-success">

                      <strong>Success!</strong> <?php $this->session->flashdata('success_msg');?>

                    </div>

                      <?php } ?>

		    <?php if($this->session->flashdata('err_msg')!="") { ?>

			<div class="clearfix"></div>

				<div class="alert alert-danger">

				  <strong>Danger!</strong> <?=$this->session->flashdata('err_msg');?>

				</div>

				  <?php } ?>

                    <section class="panel">

                        <header class="panel-heading">

                           <h3> Edit Contact <a href="<?php echo base_url();?>client/contact" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                            <?php foreach($allcontact_row as $singledata) { ?>

                                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                        			<div class="panel-body">

                                     <div class="tab-content">

                                     <div id="home" class="tab-pane fade in active"> 

                                     	<div class="form-group">

		                                     <label for="inputslidercaption">Name *</label>

		                                     <input name="name" type="text" class="form-control" placeholder="Enter Name*"  value="<?php echo $singledata->name; ?>" >

		                                     

		                                     <!--<input type="hidden" name="customer_code" value="<?php echo $_SESSION['user_code'];?>">-->

		                                </div>

		                                

                                    	<div class="form-group">

		                                    <label for="phone">Phone *</label>

		                                    <input name="phone" type="text" maxlength="10" class="form-control" placeholder="Write Phone*" value="<?php echo $singledata->phone; ?>" >

		                                    <?php echo form_error('phone', '<div class="error">', '</div>'); ?>

		                                </div>

		                                

		                                <div class="form-group">

		                                    <label for="email">Email *</label>

		                                    <input name="email" type="email" class="form-control" placeholder="Write Email*" value="<?php echo $singledata->email; ?>" >

		                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>

		                                </div>

		                                

		                                <div class="form-group">

		                                    <label for="inputslidercaption3">Address</label>

		                                    <textarea name="address" class="form-control editor_big"  placeholder="Write Address"><?php echo $singledata->address; ?></textarea>

		                                </div>

		                                

		                                <div class="form-group">

		                                    <label for="relation">Relation *</label>

		                                    <input name="relation" type="text" class="form-control" placeholder="Write Relation*" value="<?php echo $singledata->relation; ?>" >

		                                    <?php echo form_error('relation', '<div class="error">', '</div>'); ?>

		                                </div>

		                                

                                		

                               

                                	</div>

                                    </div>

                            

                            



                        			</div>

                         			<div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>

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