<section id="main-content">
	<section class="wrapper">
        <form method="POST" action="<?= base_url('client/payment/init') ?>">
        
            <input type="hidden" name="package_id" value="<?= $package_id ?>" />

            <div class="row">           

                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <div style="margin-bottom: 30px;">
                        <h3>Selected Package : <b><?= $package_info['package_name'] ?></b></h3>
                    </div>

                    <p><b>Select Term Length</b></p>
                    <?php foreach($plan_info as $plan) : ?>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" name="planItem" value="<?= $plan['period_length'] ?>" class="form-control" />
                                </div>
                                <div class="col-md-3">
                                    <p><b><?= $plan['period_length_in_text'] ?></b></p>
                                </div>
                                <div class="col-md-6">
                                    <p style="font-size: 17px;"><b><?= $plan['plan_amount_in_text'] ?></b></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
                </div>
                <div class="col-md-3"></div>

            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input type="radio" name="upgrade_status" value="instantUpgrade" required/>
                    <span>INSTANT UPGRADE</span>
                </div>
                <div class="col-md-3">
                    <input type="radio" name="upgrade_status" value="upgardeNextBilling" required/>
                    <span>UPGRADE ON NEXT BILLING</span>
                </div>
                <div class="col-md-3"></div>
            </div>

            <div class="row" style="margin-top: 25px;margin-bottom: 25px;">
                <div class="col-md-3"></div>
                <div class="col-md-3">
                    <input class="btn btn-primary" type="submit" value="CHECKOUT USING PAYPAL" name="payment_gateway_provider" />
                </div>
                <div class="col-md-3">
                    <input class="btn btn-danger" type="submit" value="CHECKOUT USING STRIPE" name="payment_gateway_provider" />
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
	</section>
</section>