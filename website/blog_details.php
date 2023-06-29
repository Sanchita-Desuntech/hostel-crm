<?php 
require_once("config.php") ;
require_once("inc/header.php"); 
if(isset($_GET['id'])){
  $slug = $_GET['id'];
  $sql = "SELECT * FROM `blog` WHERE `slug` = '$slug' "; 
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
    ?>

    <!-- Start main-content -->
    <section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
      <div class="auto-container">
        <div class="title-outer">
          <h1 class="title"> <?php print_r($row['title']); ?></h1>
          <ul class="page-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <i class="fa fa-angle-right"></i>
            <li>Services</li>
          </ul>
        </div>
      </div>
    </section>

    <!--Start Services Details-->
    <section class="services-details">
      <div class="container">
        <div class="row">
          <!--Start Services Details Sidebar-->
          <div class="col-xl-4 col-lg-4">
            <div class="service-sidebar">
              <!--Start Services Details Sidebar Single-->
              <div class="sidebar-widget service-sidebar-single">

                <!--<div class="sidebar-service-list">
                  <ul>
                    <li><a href="content-writing.html" class="current"><i class="fas fa-angle-right"></i><span>Content
                          Writing</span></a></li>
                    <li class="current"><a href="administrative-services.html"><i
                          class="fas fa-angle-right"></i><span>Administrative Services</span></a></li>
                    <li><a href="email-organization.html"><i class="fas fa-angle-right"></i><span>Email
                          Organization</span></a></li>
                    <li><a href="tech-support.html"><i class="fas fa-angle-right"></i><span>Tech Support for
                          PC</span></a></li>
                    <li><a href="book-keeping.html"><i class="fas fa-angle-right"></i><span>Book Keeping and Financial
                          Management</span></a></li>
                    <li><a href="projects.html"><i class="fas fa-angle-right"></i><span>Projects</span></a></li>
                    <li><a href="web-design-and-development.html"><i class="fas fa-angle-right"></i><span>Web Design and
                          Development</span></a></li>
                    <li><a href="SEO-and-digital-marketing.html"><i class="fas fa-angle-right"></i><span>SEO and Digital
                          Marketing</span></a></li>
                  </ul>
                </div>-->

                <div class="service-details-help">
                  <div class="help-shape-1"></div>
                  <div class="help-shape-2"></div>
                  <h2 class="help-title">Contact with <br> us for any <br> advice</h2>
                  <div class="help-icon">
                    <span class=" lnr-icon-phone-handset"></span>
                  </div>
                  <div class="help-contact">
                    <p>Need help? Talk to an expert</p>
                    <a href="tel:12463330079">+892 ( 123 ) 112 - 9999</a>
                  </div>
                </div>

                <!--Start Services Details Sidebar Single-->
                <div class="sidebar-widget service-sidebar-single mt-4">
                  <div class="service-sidebar-single-btn wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="1200m">
                    <a href="#" class="theme-btn btn-style-one d-grid"><span class="btn-title"><span
                          class="fa-thin fa-message-lines"></span>Chat Now</span></a>
                  </div>
                </div>
              </div>

              <!--End Services Details Sidebar-->
            </div>
          </div>

          <!--Start Services Details Content-->
          <div class="col-xl-8 col-lg-8">
            <div class="services-details__content">
              <h3 class="mt-4"> <?php print_r($row['short_desc']); ?></h3>
              <p> <?php print_r($row['content']); ?>
              </p>
            </div>
          </div>
          <!--End Services Details Content-->
        </div>
      </div>
    </section>
    <!--End Services Details-->
 <?php 
}
     include("inc/footer.php"); ?>
