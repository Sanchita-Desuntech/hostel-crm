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

                           <h3>  contact Details </h3>

                        </header>

                        <div class="panel-body">

                            <div>

							<?php foreach($single_data as $singledata) { ?>

                                <form role="form" method="POST" action="" enctype="multipart/form-data">

                                <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Full Name</label><br />

                                    <?php echo $singledata->full_name;?>

                                </div>

								    <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Email Id</label><br />

                                     <?php echo $singledata->email_id;?>

                                </div>

                                

                                  <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Contact No</label><br />

                                     <?php echo $singledata->contact_no;?>

                                </div>

                                

                                <?php if($singledata->coursename!=''){?>

                                  <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Course Name </label><br />

                                     <?php echo $singledata->coursename;?>

                                </div>

                                <?php } ?>
                                
                                  <?php if($singledata->city_nm!=''){?>
                                <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">City Name</label><br />

                                     <?php echo $singledata->city_nm;?>

                                </div>

                                 <?php } ?>
                                 
                                   <?php if($singledata->area_nm!=''){?>

                                <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Area Name</label><br />

                                     <?php echo $singledata->area_nm;?>

                                </div>
                                
                                 <?php } ?>
                                 
                                  <?php if($singledata->company_name!=''){?>

                                <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Company Name</label><br />

                                     <?php echo $singledata->company_name;?>

                                </div>
                                
                                 <?php } ?>
                                 
                                   <?php if($singledata->website !=''){?>

                                <div class="form-group">

                                    <label for="inputslidercaption" style="color:#C30;">Website </label><br />

                                     <?php echo $singledata->website ;?>

                                </div>
                                
                                 <?php } ?>
                                
                               <?php if($singledata->subject_qry!=''){?>

                                  <div class="form-group">

                                    <label for="inputslidercaption">Subject </label><br />

                                     <?php echo $singledata->subject_qry;?>

                                </div>

                                <?php } ?>

                               

                                   <?php if($singledata->message_qry!=''){?>

                                  <div class="form-group">

                                    <label for="inputslidercaption"  style="color:#C30;">Message </label><br />

                                     <?php echo $singledata->message_qry;?>

                                </div>

                                <?php } ?>

                                 

                               

                                

                                <a href="<?php echo base_url();?>admin/contact" class="btn btn-danger ">Back</a>

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