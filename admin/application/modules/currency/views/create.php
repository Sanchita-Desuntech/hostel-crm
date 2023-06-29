<section id="main-content">

    <section class="wrapper">

        <!-- page start-->

        <div class="row">

            <div class="col-lg-12">

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
                                <h3>Add Currency</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url(); ?>admin/currency" class="btn btn-danger flotright">Back</a>
                            </div>
                        </div>
                    </header>

                    <div class="panel-body">

                        <div>

                            <form role="form" method="POST" autocomplete="off">

                                <div class="form-group">

                                    <label for="inputslidercaption">Currency Name *</label>

                                    <input name="currency_name" type="text" value="<?php echo set_value('currency_name'); ?>" class="form-control">

                                    <?php echo form_error('currency_name', '<div class="error">', '</div>'); ?>

                                </div>

                                <div class="form-group">

                                    <label for="inputslidercaption">Currency Code *</label>

                                    <select name="currency_code" class="form-control">
                                        <option value="">Select...</option>
                                        <option value="AUD">AUD (Australian Dollar)</option>
                                        <option value="CAD">CAD (Canadian Dollar)</option>
                                        <option value="SGD">SGD (Singapore Dollar)</option>
                                        <option value="AED">AED (UAE Dirham)</option>
                                        <option value="GBP">GBP (Pound Sterling)</option>
                                        <option value="USD">USD (US Dollar)</option>
                                    </select>

                                    <?php echo form_error('currency_code', '<div class="error">', '</div>'); ?>

                                </div>

                                <div class="form-group">

                                    <label for="inputslidercaption">Currency Value wrt INR *</label>

                                    <input name="currency_value_wrt_inr" type="text" value="<?php echo set_value('currency_value_wrt_inr'); ?>" class="form-control">

                                    <?php echo form_error('currency_value_wrt_inr', '<div class="error">', '</div>'); ?>

                                </div>


                                <button type="submit" class="btn btn-info">Add</button>

                            </form>

                        </div>



                    </div>

                </section>



            </div>

        </div>

        <!-- page end-->

    </section>

</section>