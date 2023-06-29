<section id="main-content">



        <section class="wrapper">



        <!-- page start-->







        <div class="row">



            <div class="col-sm-12">



                <section class="panel">



                    <header class="panel-heading">



                        <h3>Settings Management



                        



                        <span class="tools pull-right">



                            <a href="javascript:;" class="fa fa-chevron-down"></a>



                            <a href="javascript:;" class="fa fa-times"></a>



                         </span></h3>



                       



                    </header>



                    <div class="panel-body" style="display: block;">



					 <?php if($this->session->flashdata('success_msg')!="") { ?>



                                             <div class="clearfix"></div>



                    <div class="alert alert-success">



                      <strong>Success!</strong> <?=$this->session->flashdata('success_msg');?>



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



                                <div class="btn-group">



                                    &nbsp;



                                </div>



                                <div class="btn-group pull-right">



                                  &nbsp;



                                </div>



                            </div>


						



                            <div class="space15"></div>

                           <?php foreach($alldata_row as $resdata){?>

                            

                           <div class="col-lg-6">

                            <h3>Address Management</h3>



                           <div class="form-group">

                           <label>Email:</label><br />

                           <?php echo $resdata->email; ?>

                           </div>

                            <div class="form-group">

                           <label>Phone Number 1:</label><br />

                           <?php echo $resdata->phone_no_1; ?>

                           </div>

                              <div class="form-group">

                           <label>Phone Number 2:</label><br />

                            <?php echo $resdata->phone_no_2; ?>

                           </div>

                            <div class="form-group">

                           <label>Phone Number 3:</label><br />

                            <?php echo $resdata->phone_no_3; ?>

                           </div>

                             <div class="form-group">

                           <label>Address:</label><br />

                           <?php echo $resdata->address; ?>

                           </div>

                           </div>

                           

                           <div class="col-lg-6">

                             <h3>Social Management</h3>



                           <div class="form-group">

                           <label>Facebook:</label><br />

                            <?php echo $resdata->facebook; ?>

                           </div>

                            <div class="form-group">

                           <label>Twitter:</label><br />

                            <?php echo $resdata->twitter; ?>

                           </div>

                              <div class="form-group">

                           <label>Linkedin:</label><br />

                            <?php echo $resdata->linkedin; ?>

                           </div>

                            <div class="form-group">

                           <label>Youtube</label><br />

                             <?php echo $resdata->youtube; ?>

                           </div>

                             <div class="form-group">

                           <label>G+:</label><br />

                          <?php echo $resdata->g_plus; ?>

                           </div>

                            </div>

                         

                           <div class="col-lg-12">

                           <h3>Quick Contact Form</h3>

                             <div class="form-group">

                           <label>Heading 1</label><br />
                           <?php echo $resdata->q_head_1; ?>

                           </div>
                           
                           
                           <div class="form-group">

                           <label>Heading 2</label><br />
                           <?php echo $resdata->q_head_2; ?>

                           </div>

                           </div>

                           

                           <?php } ?> 

                         

                          <div class="col-lg-12">

                          <a href="<?php echo base_url();?>admin/settings/editsettings/1" class="btn btn-success">Edit Settings</a>

                          </div>                           

 

                        </div>



                    </div>



                </section>



            </div>



        </div>



        <!-- page end-->



        </section>



    </section>



    



    



<script type="text/javascript">



  function myJsFunc_comdel(dataid,dataimg)



  {



    if (confirm("Are you sure that you want to delete the data?"))



    {



    window.location.href = "<?php echo base_url()?>admin/client/delete_data/"+dataid+'/'+dataimg;



    }



  }



</script>      