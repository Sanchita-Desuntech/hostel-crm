<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Message
                        
                        <!--<span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <!--<a href="javascript:;" class="fa fa-times"></a>
                         </span>--></h3>
                       
                    </header>
                    <div class="panel-body" style="display: block;">
					 <?php if($this->session->flashdata('success_msg')!="") { ?>
                                             <div class="clearfix"></div>
                    <div class="alert alert-success">
                      <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg');?>
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
                                <div class="btn-group pull-right">
                                </div>						
                            <div class="space15"></div>
                            
                            <!--<button id="myBtn" data-target="#myModal">New Message</button>

							 The Modal -->
							<!--<div id="myModal" class="modal">

							  <!-- Modal content 
							  <div class="modal-content">
							    <span class="close">&times;</span>
							    <form role="form" id="contactForm" method="POST" action="" enctype="multipart/form-data">
							    <div class="form-group">
			                    	<label for="inputslidercaption3">To</label>
			                        <input type="text" name="send_user_id" class="form-control" value="AD001" placeholder="Write Name"><?php echo set_value('send_user_id'); ?>
			                    </div>
							    
							    <div class="form-group">
			                    	<label for="inputslidercaption3">Message</label>
			                        <input type="text" name="message" class="form-control"  placeholder="Write Message"><?php echo set_value('message'); ?>
			                    </div>
			                    <div class="form-group">
				                    <label for="inputslidercaption">Attach File</label>
				                    		<input type="file" name="profile_photo" accept="image/*" />
				                    <p class="help-block" style="color: :red;">Please Select Only Image.</p>
			                    </div>
			                    <div class="panel-footer"> <button type="submit" class="btn btn-info">Submit</button></div>
			                    </form>
							  </div>

							</div>-->
							
							
							
							<table class="table table-striped table-bordered nowrap" id="tabledata" style="width:100%;">
                                <tbody>
								<?php 
								 $i=1;
								 foreach($allmessage_row as $alldata) { 
								 //print_r($alltask_row); die("jk");
								 ?>
                                <tr class="">
                                <td><?php echo $i;?></td>
                                <td>
                                <a href="<?php echo base_url();?>client/message/message_details" style="color: #302cd3"><?php echo $alldata->service_name ?></a>
                                <!--<button id="myBtn" data-target="#myModal<?php echo $i;?>"><?php echo $alldata->service_name ?></button></td>-->
                                </tr>
                                <?php $i++; } ?>
                            </table>
                            
                            
                            <br />
                        </div><br><br>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    

    
         