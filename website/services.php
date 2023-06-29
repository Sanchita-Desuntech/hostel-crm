<?php 
require_once("config.php") ;
require_once("inc/header.php"); 
      ?>

		<!-- Start main-content -->
		<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
			<div class="auto-container">
				<div class="title-outer">
					<h1 class="title">Service</h1>
					<ul class="page-breadcrumb">
						<li><a href="index.php">Home</a></li>
						<i class="fa fa-angle-right"></i>
						<li>Services</li>
					</ul>
				</div>
			</div>
		</section>
		<!--Start Services Details-->
		<section class="ser">
			<!--<div class="bg bg-pattern-10"></div>-->
			<div class="auto-container">
				<!--<div class="upper-box row">
					<div class="left-column col-lg-6 col-md-12">
						<div class="sec-title light">
							<span class="sub-title">What We’re Offering</span>
							<h2>Services we’re <br>offering to customer to <br>grow business</h2>
						</div>
					</div>
				</div>-->
				<div class="row gx-5">
					<?php $id = 0;
           $sql = "SELECT * FROM `services`";
           $result = mysqli_query($conn, $sql);
           $row = mysqli_num_rows($result);
            // print_r($row);
              while ($rows = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
            ?>
					<div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
						<aside class="aside">
							<a class='normal' href='service_details.php?id=<?php echo $rows['service_id'];?>&p_name=<?php echo urlencode($rows['short_desp']) ?>'>
								<span>
									<div class="sBoxBlack">
										<i class="icon flaticon-color-sample"></i>
									</div>
									<h3><?php echo $rows['short_desp'] ?></h3>
								</span>
							</a>
							<div class="info">
								<strong><?php echo $rows['short_desp'] ?></strong>
								<p><?php echo $rows['long_desp'] ?></p>
								<a method="Get" style="color:#fff;" href='service_details.php?id=<?php echo $rows['service_id'];?>&p_name=<?php echo urlencode($rows['short_desp']) ?>'>Learn More</a>
							</div>
						</aside>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		<!--End Services Details-->

    <?php include("inc/footer.php"); ?>