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

                    <section class="panel">

                        <header class="panel-heading">

                           <h3> View Task <a href="<?php echo base_url();?>admin/customer" class="btn btn-danger flotright">Back</a></h3>

                        </header>

                        <div class="panel-body">

                            <div>

                            <?php //print_r($alltaskdata_row);die("loop");
                             foreach($alltaskdata_row as $singledata) { ?>

           

                        			<div class="panel-body">

                                     <div class="tab-content">

                                    <div id="home" class="tab-pane fade in active">
                                	
                                	<div class="form-group">
		                                     <label for="inputslidercaption">Task ID </label>
		                                     <input disabled="" type="text" class="form-control" value="<?php echo $singledata->task_id;  ?>" >
		                                </div>
                                		
                               	        <div class="form-group">
		                                     <label for="inputslidercaption">Task Name </label>
		                                     <input   disabled="" type="text" class="form-control"  value="<?php echo $singledata->task_name;  ?>" >
		                                </div>
										<div class="form-group">
		                                    <label for="">Service ID </label>
		                                      <input  disabled="" type="text" class="form-control"  value="<?php echo $singledata->service_id;  ?>" >
		                                </div>
                                    	<div class="form-group">
		                                    <label for="">Service Name </label>
		                                      <input  disabled="" type="text" class="form-control"  value="<?php echo $singledata->service_name;  ?>" >
		                                </div>
										<div class="form-group">
		                                    <label for="">Service Type </label>
		                                      <input  disabled="" type="text" class="form-control"  value="<?php echo $singledata->service_type;  ?>" >
		                                </div>
                                		<div class="form-group">
		                                    <label for="inputslidercaption3">Task Description</label>
		                                    <textarea disabled="" class="form-control " style="resize:none" rows="13" cols="20"    ><?php echo $singledata->task_desp; ?></textarea>
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
		                                </div>

		                                <div class="form-group">
		                                     <label for="inputslidercaption">Task Priority</label>
		                                       <input  type="text" disabled="" class="form-control"  value="<?php echo $singledata->task_priority;  ?>" >
		                                </div>
										<div class="form-group">
		                                     <label for="inputslidercaption">Consume Time</label>
		                                       <input  type="text" disabled="" class="form-control"  value="<?php echo $singledata->consume_time;  ?>" >
		                                </div>
                             		   <div class="form-group">
		                                     <label for="inputslidercaption">Task Status</label>
		                                       <input  type="text" disabled="" class="form-control"  value="<?php echo $singledata->task_status;  ?>" >
		                                </div>
                            		   <div class="form-group">
		                                     <label for="inputslidercaption">Created On</label>
		                                       <input  type="text" disabled="" class="form-control"  value="<?php echo $singledata->created_on;  ?>" >
		                                </div>
										<div class="form-group">
		                                     <label for="inputslidercaption">Updated On</label>
		                                       <input  type="text" disabled="" class="form-control"  value="<?php echo $singledata->updated_on;  ?>" >
		                                </div>	 
                                	</div>

                                    </div>

                            

                            



                        </div>

                         		

                        		

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