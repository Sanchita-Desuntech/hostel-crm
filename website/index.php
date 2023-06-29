<?php
require_once("config.php") ;
require_once("inc/home-header.php");

function textShorten($text, $limit = 50){
	$text = $text. " ";
	$text = substr($text, 0, $limit);
	$text = substr($text, 0, strrpos($text, ' '));
	$text = $text." Learn more";
	return $text;
 }
?>
<!-- Banner Section -->
<section class="banner-section">
    <div class="banner-carousel owl-carousel owl-theme">
        <?php
        $sql = "SELECT * FROM `banner`";
        $result = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($result)) {
        $banner_id = $rows['banner_id'];
        ?>
        <!-- Slide Item -->
        <div class="slide-item">
            <div class="bg-image" style="background-image: url(admin/<?=$rows['image']?>);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <h1 class="title animate-2"><?=$rows['title']?></h1>
                    <div class="btn-box animate-3">
                        <a href="<?=$rows['btn_1_url']?>" class="theme-btn btn-style-one"><span class="btn-title"><?=$rows['btn_1_text']?></span></a>
                        <a href="<?=$rows['btn_2_url']?>" class="theme-btn btn-style-one light"><span class="btn-title"><?=$rows['btn_2_text']?></span></a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        
    </div>
</section>
<!-- About Section Two -->
<section class="about-section-two">
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight" data-wow-delay="600ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">Welcome to Taskenhance</span>
                        <h2>How We Work</h2>
                        <div class="text">We are a startup firm that started up from ground bottom with 3 highly qualified individuals and gradually on the way to climbing the corporate ladder. We believe in providing the best of our services to our customers.</div>
                        <div class="text">We are a startup firm that started up from ground bottom with 3 highly qualified individuals and gradually on the way to climbing the corporate ladder. We believe in providing the best of our services to our customers.</div>
                    </div>
                    <a href="about.html" class="theme-btn btn-style-one"><span class="btn-title">Explore now</span></a>
                </div>
            </div>
            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                <figure class="image-1 overlay-anim wow fadeInUp"><img src="images/resource/about-3.jpg" alt=""></figure>
                <figure class="image-2 overlay-anim wow fadeInRight"><img src="images/resource/about-4.jpg" alt="">
                </figure>
            </div>
        </div>
    </div>
</div>
</section>
<!--Emd About Section Two -->
<!-- Fun Fact Section -->
<section class="fun-fact-section pt-0" style="background-image: url(images/background/1.png)">
<div class="auto-container">
    <div class="upper-box">
        <span class="title">Happy cutomers</span>
        <div class="number-outer">
            <div class="numbers" style="background-image: url(images/resource/image-1.jpg)">86900+</div>
        </div>
    </div>
    <div class="fact-counter">
        <div class="row">
            <!-- Counter block-->
            <div class="counter-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner">
                    <i class="icon flaticon-campaign"></i>
                    <div class="count-box"><span class="count-text" data-speed="3000" data-stop="180">0</span>+</div>
                    <h6 class="counter-title">Client</h6>
                </div>
            </div>
            <!--Counter block-->
            <div class="counter-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                <div class="inner">
                    <i class="icon flaticon-reputation"></i>
                    <div class="count-box"><span class="count-text" data-speed="3000" data-stop="380">0</span>+</div>
                    <h6 class="counter-title">Jobs</h6>
                </div>
            </div>
            <!--Counter block-->
            <div class="counter-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                <div class="inner">
                    <i class="icon flaticon-coffee"></i>
                    <div class="count-box"><span class="count-text" data-speed="3000" data-stop="60">0</span>+</div>
                    <h6 class="counter-title">Workers</h6>
                </div>
            </div>
            <!--Counter block-->
            <div class="counter-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="900ms">
                <div class="inner">
                    <i class="icon flaticon-social-campaign"></i>
                    <div class="count-box"><span class="count-text" data-speed="3000" data-stop="70">0</span>+</div>
                    <h6 class="counter-title">Contrubutors</h6>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- End Fun Fact Section -->
<!-- Services Section Two -->
<section class="services-section-two">
<!--<div class="bg bg-pattern-10"></div>-->
<div class="auto-container">
    <div class="upper-box row">
        <div class="left-column col-lg-6 col-md-12">
            <div class="sec-title light">
                <span class="sub-title">What We’re Offering</span>
                <h2>Services we’re <br>offering to customer to <br>grow business</h2>
            </div>
        </div>
    </div>
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
                <a class='normal' href=''>
                    <span>
                        <div class="sBoxBlack">
                            <i class="icon flaticon-color-sample"></i>
                        </div>
                        <h3><?php echo $rows['short_desp'] ?></h3>
                    </span>
                </a>
                <div class="info">
                    <strong><?php echo $rows['short_desp'] ?></strong>
                    <p><?php echo textShorten($rows['long_desp'], 80); ?></p>
                    <a style="color:#fff;" href='service_details.php?id=<?php echo $rows['service_id'];?>&p_name=<?php echo urlencode($rows['short_desp']) ?>'>Learn More</a>
                </div>
            </aside>
        </div>
        <?php } ?>
    </div>
</div>
</section>
<!-- End Services Section-->
<!-- Testimonial Section Two -->
<section class="testimonial-section-two">
<div class="bg bg-pattern-11"></div>
<div class="auto-container">
    <div class="row">
        <div class="image-column col-lg-6 col-md-12">
            <div class="inner-column">
                <div class="image-box">
                    <div class="bg-shape"></div>
                <figure class="image image-4"><img src="images/resource/thumb-4.jpg" alt=""></figure>
            <figure class="image image-3"><img src="images/resource/thumb-3.jpg" alt=""></figure>
        <figure class="image image-2"><img src="images/resource/thumb-2.jpg" alt=""></figure>
    <figure class="image image-1"><img src="images/resource/thumb-1.jpg" alt=""></figure>
</div>
</div>
</div>
<div class="testimonial-column col-lg-6 col-md-12">
<div class="inner-column">
<div class="sec-title">
    <span class="sub-title">Our Testimonials</span>
    <h2>What they’re talking <br>about us</h2>
</div>
<div class="carousel-outer">
    <div class="testimonial-carousel-two owl-carousel owl-theme default-dots">
        <?php
        $id = 0;
        $sql = "SELECT * FROM `testimonials`";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        while ($rows = mysqli_fetch_assoc($result)) {
        $id  = $id  ++ ;
        ?>
        <!-- Testimonial Block Two -->
        <div class="testimonial-block-two">
            <div class="inner-box">
                <div class="image-box">
                    <div class="text"><?php echo $rows['content'] ?></div>
                    <div class="info-box">
                        <h6 class="name"><?php echo $rows['people_name'] ?></h6>
                        <span class="designation"><?php echo $rows['people_designation'] ?></span>
                        <span class="icon icon-quote"></span>
                    </div>
                    <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- End Testimonial Section Two -->
<?php include("inc/footer.php"); ?>