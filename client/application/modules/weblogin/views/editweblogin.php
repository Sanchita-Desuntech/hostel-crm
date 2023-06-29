<section id="main-content">
  <section class="wrapper">
    <!-- page start-->

    <div class="row">
      <div class="col-lg-12">
        <?php if ($this->session->flashdata('success_msg') != "") { ?>
          <div class="clearfix"></div>
          <div class="alert alert-success">
            <strong>Success!</strong> <?php $this->session->flashdata('success_msg'); ?>
          </div>
        <?php } ?>
        <?php if ($this->session->flashdata('err_msg') != "") { ?>
          <div class="clearfix"></div>
          <div class="alert alert-danger">
            <strong>Danger!</strong> <?= $this->session->flashdata('err_msg'); ?>
          </div>
        <?php } ?>
        <section class="panel">
          <header class="panel-heading">
            <h3> Edit Weblogin <a href="<?php echo base_url(); ?>client/weblogin" class="btn btn-danger flotright">Back</a></h3>
          </header>
          <div class="panel-body">
            <div>
              <?php foreach ($allweblogindata_row as $singledata) { ?>
                <form role="form" method="POST" action="" autocomplete="off" enctype="multipart/form-data">
                  <div class="panel-body">
                    <div class="tab-content">
                      <div id="home" class="tab-pane fade in active">
                        <div class="form-group">
                          <label for="inputslidercaption">User Name/ Email *</label>
                          <input name="email" type="text" class="form-control" placeholder="Enter User Name*" value="<?php echo $singledata->email; ?>">

                          <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                        </div>

                        <div class="form-group">
                          <label for="website">Website *</label>
                          <input name="website" type="text" class="form-control" placeholder="Write Website*" value="<?php echo $singledata->website; ?>">
                          <?php echo form_error('website', '<div class="error">', '</div>'); ?>
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