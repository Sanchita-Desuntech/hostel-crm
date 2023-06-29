<section id="main-content">

    <section class="wrapper">

        <!-- page start-->



        <div class="row">

            <div class="col-lg-12">
                <?php if ($this->session->flashdata('success_msg') != "") { ?>

                    <div class="clearfix"></div>

                    <div class="alert alert-success">

                        <strong>Success!</strong> <?= $this->session->flashdata('success_msg'); ?>

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

                        <div class="row">
                            <div class="col-md-6">
                                <h3>Settings</h3>
                            </div>
                        </div>
                    </header>

                    <div class="panel-body">

                        <div>

                            <form role="form" method="POST" action="" enctype="multipart/form-data" autocomplete="off">
                                <?php foreach ($settings as $setting) { ?>
                                    <div class="form-group">

                                        <label for="inputslidercaption">New Registration & Chat Receiving Email</label>

                                        <input name="send_new_reg_and_chat_trans_email" value="<?php echo $setting->send_new_reg_and_chat_trans_email; ?>" type="text" class="form-control" placeholder="Enter New Registration & Chat Receiving Email">

                                        <?php echo form_error('send_new_reg_and_chat_trans_email', '<div class="error">', '</div>'); ?>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputslidercaption">Payment & Paypal Email</label>

                                        <input name="payment_and_paypal_email" value="<?php echo $setting->payment_and_paypal_email; ?>" type="text" class="form-control" placeholder="Enter Payment & Paypal Email">

                                        <?php echo form_error('payment_and_paypal_email', '<div class="error">', '</div>'); ?>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption">New Task Receive Email</label>

                                        <input name="new_task_email" value="<?php echo $setting->new_task_email; ?>" type="text" class="form-control" placeholder="Enter New Task Receive Email">

                                        <?php echo form_error('new_task_email', '<div class="error">', '</div>'); ?>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption">Paypal Secret Key</label>

                                        <input name="paypal_secret_key" value="<?php echo $setting->paypal_secret_key; ?>" type="text" class="form-control" placeholder="Enter Paypal Secret Key">

                                        <?php echo form_error('paypal_secret_key', '<div class="error">', '</div>'); ?>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption">Paypal Business Email</label>

                                        <input name="paypal_business_email" value="<?php echo $setting->paypal_business_email; ?>" type="text" class="form-control" placeholder="Enter Paypal Business Email">

                                        <?php echo form_error('paypal_business_email', '<div class="error">', '</div>'); ?>

                                    </div>

                                    <div class="form-group">

                                        <label for="inputslidercaption"> Paypal Business Name</label>

                                        <input name="paypal_business_name" value="<?php echo $setting->paypal_business_name; ?>" type="text" class="form-control" placeholder="Enter Paypal Business Name">

                                        <?php echo form_error('paypal_business_name', '<div class="error">', '</div>'); ?>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption">Paypal URL</label>

                                        <input name="paypal_url" value="<?php echo $setting->paypal_url; ?>" type="text" class="form-control" placeholder="Enter Paypal URL">

                                        <?php echo form_error('paypal_url', '<div class="error">', '</div>'); ?>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption2">Paypal Status</label>

                                        <select name="paypal_status" class="form-control">

                                            <option <?php if ($setting->paypal_status == "live") {
                                                        echo "selected";
                                                    } ?> value="live">Live</option>

                                            <option <?php if ($setting->paypal_status == "Sandbox") {
                                                        echo "selected";
                                                    } ?> value="sandbox">Sandbox</option>

                                        </select>

                                    </div>



                                    <div class="form-group">

                                        <label for="inputslidercaption">Paypal Currency Code</label>

                                        <input name="currency_code" value="<?php echo $setting->currency_code; ?>" type="text" class="form-control" placeholder="Enter Paypal Currency Code">

                                        <?php echo form_error('currency_code', '<div class="error">', '</div>'); ?>

                                    </div>

                                <?php } ?>

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