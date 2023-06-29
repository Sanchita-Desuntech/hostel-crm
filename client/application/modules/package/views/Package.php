<style>
.currency {
	font-size: 30px;
}
.plan-amount {
	font-size: 60px;
}

</style>

<section id="main-content">
	<section class="wrapper">

		<div class="row" style="margin-top: 10px; margin-bottom: 30px;">
			<div class="col-md-2">
				<p>Change Currency</p>
			</div>
			<div class="col-md-3">
				<form id="currencyForm">
					<select class="form-control" id="currencyCode" name="currency_code">
						<?php foreach($availableCurrency as $currency) : ?>
							<option value="<?= $currency->currency_code ?>" <?= (isset($_GET['currency_code']) && $_GET['currency_code'] == $currency->currency_code ) ? 'selected' : ''  ?> ><?= $currency->currency_code ?> (<?= $currency->currency_name ?>)</option>
						<?php endforeach ?>
					</select>
				</form>
			</div>
		</div>

		<div class="row">
			<?php foreach($packages as $package) : ?>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3><?= $package->package_name ?></h3>

							<p><?= $package->package_desp ?></p>

							<p><span class="currency"><?= $package->currency ?></span>&nbsp;&nbsp;&nbsp;<span class="plan-amount"><?= $package->package_amount ?></span></p>

							<p>PER MONTH</p>
							<div class="text-center">
								<a class="btn btn-success plan-select" href="<?= base_url('client/package/checkout?package_id='.$package->id) ?>">SELECT</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</section>
</section>


<script>
window.addEventListener("load", () => {
	$('#currencyCode').change( function(e) {
		currencyForm.submit();
	});
});
</script>