<style>
	.upload-btn-wrapper {
	  position: relative;
	  overflow: hidden;
	  display: inline-block;
	}
.btn-upload-text {
  border: 2px dotted gray;
  color: gray;
  background-color: white;
  padding: 62px 168px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}	
</style>
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

                           <h3> Edit Task <a href="<?php echo base_url();?>client/task" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                            <?php //print_r($alltaskdata_row);die("loop");
                             foreach($alltaskdata_row as $singledata) { ?>

                                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">

                        			<div class="panel-body">

                                     <div class="tab-content">

                                    <div id="home" class="tab-pane fade in active">
                                    
                                    <div class="form-group">

		                                     <label for="inputslidercaption">Task Name *</label>

		                                     <input name="task_name" type="text" class="form-control" placeholder="Enter Task Name *" value="<?php echo $singledata->task_name;  ?>" >
		                                     <?php echo form_error('task_name', '<div class="error">', '</div>'); ?>

		                                </div>

                                    

                                    	<div class="form-group">

		                                    <label for="email">Service Name *</label>

		                                    <select name="service_code" class="form-control">

		                                    	<option value="">Select Task</option>

		                                    	<?php //print_r($res_service);die("lp");

		                                    	 foreach($res_service as $res_ser) { 
		                                    	 ?>

		                                    	<option value=<?php echo $res_ser->service_id; ?> <?php if($res_ser->service_id == $singledata->service_code) { echo("selected"); } ?>><?php echo $res_ser->service_name; ?></option>

		                                    	

		                                    	<?php } ?>

		                                    </select>
		                                    

		                                </div>

                                    	                          

                                		<div class="form-group">

		                                    <label for="inputslidercaption3">Task Description</label>

		                                    <textarea name="task_desp" class="form-control editor_big"  placeholder="Write Task Description"><?php echo $singledata->task_desp; ?></textarea>

		                                </div>

		                                

		                                <div class="form-group">
										 <?php if($singledata->attach_file != '' || $singledata->attach_file != null){
		                     $attach_file = json_decode($singledata->attach_file); 
		                      foreach($attach_file as $file ){
		                     ?>
		                                  <strong> Attached File: </strong><a href="<?php echo base_url()?>uploads/task/<?php echo $file;?>" target="_blank"><?php echo $file;?></a><br>
 <?php  }  ?> 
 <?php }else{  ?> 
  <strong> Attached File: </strong><p>No attachment available</p><br>
 <?php } ?>
		                                    <div class="clearfix"></div>

		                                    								<div class="upload-btn-wrapper" id="uploadWrapper">
										<p class="btn-upload-text">drag & drop files here</p>
		                                     <input type="file" id="fileUpload" name="attach_file[]" multiple="" accept="image/*,.doc,.docx,application/msword*,zip,application/octet-stream,application/zip,application/x-zip,application/x-zip-compressed" />
										 </div> 
										 <div id="nameOfFiles" style="display: none">
										 	<h3> <strong> Name Of Files</strong></h3>
										 </div>
		                                     <input name="prev_link" type="hidden" value='<?php echo $singledata->attach_file?>' class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
											<a href="javascript:void(0)" class="btn btn-danger" style="display: none" id="removeFile" onclick="removeFile()">Remove All</a>

		                                </div>

		                                

		                                <div class="form-group">

		                                     <label for="inputslidercaption">Task Priority</label>

		                                     <select name="task_priority" class="form-control">

		                                         <option value="Normal" <?php if($singledata->task_priority == 'Normal') { echo ("selected"); } ?>>Normal</option>

		                                         <option value="Low Priority" <?php if($singledata->task_priority == 'Low Priority') { echo ("selected"); } ?>>Low Priority</option>

		                                         <option value="High Priority" <?php if($singledata->task_priority == 'High Priority') { echo ("selected"); } ?>>High Priority</option>

		                                     </select>

		                                     <?php echo form_error('task_priority', '<div class="error">', '</div>'); ?>

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
      <script>
    var filesUpload = document.getElementById('fileUpload');
    	filesUpload.addEventListener("change", function () {
		//HIDING UPLOAD FILES DIV
		/*var uploadWrapper = document.getElementById('uploadWrapper') ;
		uploadWrapper.style.display = 'none';*/
		//SHOWING NAME OF FILES DIV
		var nameOfFilesDiv = document.getElementById('nameOfFiles');
		nameOfFilesDiv.style.display = 'Block';
		
		//LOOPING THROUGH FILES 
		for(i = 0;i < filesUpload.files.length; i++){
		    var fileName  =	filesUpload.files[i].name;
		    var sl = Number(i)+Number(1);
		    //GETTING THE FILES NAME DIV
		    var nameOfFilesDiv = document.getElementById('nameOfFiles');
		    //CREATING A P TAG TO ATTACH NAMES
		    var span = document.createElement('p');
		    span.innerHTML = '<strong>' + fileName +'</strong>';
		    span.insertBefore = '</br>';
		    nameOfFilesDiv.appendChild(span);
		    //SHOWING REMOVE FILES BUTTON
			var removeFile = document.getElementById('removeFile');
			removeFile.style.display = 'Block';
			removeFile.style.width = '20%';
		   /* nameOfFilesDiv.innerHTML = '<span>'+fileName+'</span>';
			console.log("File Name", fileName);*/
		}
	});
	function removeFile(){
		//HIDING UPLOAD FILES DIV
		var uploadWrapper = document.getElementById('uploadWrapper') ;
		uploadWrapper.style.display = 'block';
		//HIDING FILES NAME DIV
		var nameOfFilesDiv = document.getElementById('nameOfFiles');
		nameOfFilesDiv.style.display = 'none';
		nameOfFilesDiv.innerHTML = '';
		//HIDING REMOVE FILE BUTTON
		var removeFile = document.getElementById('removeFile');
		removeFile.style.display = 'none';
		var filesUpload = document.getElementById('fileUpload');
		filesUpload.value = '';
	}
    </script>