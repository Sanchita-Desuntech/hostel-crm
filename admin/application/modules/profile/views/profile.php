<section id="main-content">
  <section class="wrapper">
    <!-- page start-->

    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <header class="panel-heading">
            <h3>Profile

              <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <!--<a href="javascript:;" class="fa fa-times"></a>-->
              </span>
            </h3>

          </header>
          <div class="panel-body" style="display: block;">
            <?php if ($this->session->flashdata('success_msg') != "") { ?>
              <div class="clearfix"></div>
              <div class="alert alert-success">
                <strong>Success!</strong> <?= $this->session->flashdata('success_msg'); ?>
              </div>
            <?php } ?>

            <?php if ($this->session->flashdata('err_msg') != "") { ?>
              <div class="clearfix"></div>
              <div class="alert alert-danger">
                <strong>Sorry!</strong> <?= $this->session->flashdata('err_msg'); ?>
              </div>
            <?php } ?>
            <div class="adv-table editable-table ">
              <div class="clearfix">
                <div class="btn-group">

                </div>
                <div class="btn-group pull-right">

                </div>
              </div>

              <div class="space15"></div>
              <div class="col-md-7">
                <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                  <div class="form-group">
                    <label for="inputslidercaption">Name*</label>
                    <input name="full_name" type="text" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" required value="<?php echo $profile['full_name']; ?>" class="form-control" placeholder="Enter Name*">
                    <?php echo form_error('full_name', '<div class="error">', '</div>'); ?>
                  </div>
                  <div class="form-group">
                    <label for="inputslidercaption">Mobile*</label>
                    <input name="mobile" maxlength="10" required type="text" value="<?php echo $profile['mobile']; ?>" class="form-control" placeholder="Enter Mobile">
                    <?php echo form_error('mobile', '<div class="error">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <label for="inputslidercaption">Email*</label>
                    <input name="email" type="text" required value="<?php echo $profile['email']; ?>" class="form-control" placeholder="Enter Email" readonly="readonly">
                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                  </div>

                  <div class="form-group">
                    <img src="<?php echo base_url() ?>uploads/users/profile_photo/<?= $profile['profile_photo'] ?>" height=100px; width=100px;>
                    <label for="inputslidercaption">Profile Image</label>
                    <input type="file" name="profile_photo" accept="image/*" />
                    <input name="prev_link" type="hidden" value="<?= $profile['profile_photo'] ?>" class="form-control" id="hid_class" placeholder="Enter Link Button Slug Link">
                  </div>

                  <button type="submit" class="btn btn-info">Submit</button>
                </form>

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
  function myJsFunc_comdel(dataid, dataimg) {
    if (confirm("Are you sure that you want to delete the data?")) {
      window.location.href = "<?php echo base_url() ?>admin/coupon/delete_coupon/" + dataid + '/' + dataimg;
    }
  }
</script>