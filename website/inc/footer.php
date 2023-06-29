<footer class="main-footer">
  <div class="bg bg-pattern-9"></div>
  <!--Widgets Section-->
  <div class="widgets-section">
    <div class="auto-container">
      <div class="row">
        <!--Footer Column-->
        <div class="footer-column col-xl-3 col-lg-12 col-md-12">
          <div class="footer-widget about-widget">
            <div class="logo">
              <a href="index.php"><img src="images/logo-3.png" alt=""></a>
            </div>
            <div class="text">Our Mission is to Enhance the Value Of Time For Individuals And Organizations All Across The Globe. The story of the begining and dedication behind the formation of the company.</div>
            <ul class="social-icon-two">
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>

        <!--Footer Column-->
        <div class="footer-column col-xl-3 col-lg-4 col-md-4">
          <div class="footer-widget links-widget">
            <h6 class="widget-title">Company</h6>
            <ul class="user-links">
              <li><a href="about.php">About Us</a></li>
              <li><a href="services.php">Services</a></li>
              <li><a href="pricing.php">Our Pricing</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms & Condition</a></li>
            </ul>
          </div>
        </div>

        <!--Footer Column-->
        <div class="footer-column col-xl-3 col-lg-4 col-md-4 col-sm-8">
          <div class="footer-widget gallery-widget">
           <?php $id = 0;
                $sql = "SELECT * FROM `portfolio`";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                // print_r($row);
             if (!$row == 0){ ?>
            <h6 class="widget-title">Portfolio</h6>
            <div class="widget-content">
              <div class="outer clearfix">
             <?php   
              while ($rows = mysqli_fetch_assoc($result)) {
                        $id = $id + 1;?>
                <figure class="image">
                  <a href="<?php echo $rows['url_text'] ?>"><img src="admin/<?php echo $rows['image']?>" width="30px" height="50px" alt="" ></a>
                </figure>
             <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <!--Footer Column-->
        <div class="footer-column col-xl-3 col-lg-4 col-md-4">
          <div class="footer-widget contacts-widget">
            <h6 class="widget-title">Contact</h6>
            <ul class="contact-info">
              <li><i class="fa fa-envelope"></i> <a href="mailto:info@taskenhancer.com">info@taskenhancer.com</a><br>
              </li>
              <li><i class="fa fa-phone-square"></i> <a href="tel:+13478096802">+1-347-809-6802</a><br></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--Footer Bottom-->
  <div class="footer-bottom">
    <div class="auto-container">
      <div class="inner-container">
        <div class="copyright-text">Copyright @2023 Taskenhance. All rights reserved</a>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--End Main Footer -->

</div>
<!-- End Page Wrapper -->

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

  <div class="integration">
  <a target="_blank" href="https://web.whatsapp.com/send?phone=918777846136">
    <div class="whatsapp-message">
      <img class="whatsapp-image" src="images/chaticon.svg">
    </div>
  </a>
</div>

<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<!--Revolution Slider-->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>
<!--Revolution Slider-->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/knob.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/script.js"></script>
</body>

</html>