<style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}
.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
</style>

<section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h3>Message Details
                        
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
                            
                            <div class="col-md-8" id="chatSection">
					              <!-- DIRECT CHAT -->
					              <div class="box box-warning direct-chat direct-chat-primary">
					                <div class="box-header with-border">
					                  <h3 class="box-title" id="ReciverName_txt">this</h3>

					                  <div class="box-tools pull-right">
					                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
					                  </div>
					                </div>
					                <!-- /.box-header -->
					                <div class="box-body">
					                  <!-- Conversations are loaded here -->
					                  <div class="direct-chat-messages" id="content">
					                     <!-- /.direct-chat-msg -->

					                     <div id="dumppy"></div>

					                  </div>
					                  <!--/.direct-chat-messages-->
					 
					                </div>
					                <!-- /.box-body -->
					                <div class="box-footer">
					                <?php foreach($allmessage_row as $res_msg_all) { ?>
					                  <form role="form" method="POST" action="" enctype="multipart/form-data">
					                    <div class="input-group">
					                     	<input type="hidden" id="send_user_id" value="AD001" >
					                        <!--<input type="hidden" id="Sender_ProfilePic" >-->
					                    	
					                    	<input type="text" id="task_code" value="<?php echo $res_msg_all->task_code; ?>">
					                        <input type="text" value="<?php echo set_value('message'); ?>" name="message" placeholder="Type Message ..." class="form-control message">
					                      		<span class="input-group-btn">
					                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
					                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
					                             <input type="file" name="attach_file" class="upload_attachmentfile"/></div>
					                          </span>
					                    </div>
					                  </form>
					                  <?php } ?>
					                </div>
					                <!-- /.box-footer-->
					              </div>
					              <!--/.direct-chat -->
					            </div>
					            
                            <br />
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!-- Modal -->
<!--<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
         Modal Header 
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body 
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer 
         
        
      </div>
    </div>
  </div>
<!-- Modal -->
  
<script src="<?php echo base_url()?>themes/client/js/chat.js"></script> 
    

    
         