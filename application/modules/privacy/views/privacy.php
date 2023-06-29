<!--main-->
	<main class="main" role="main">
		<!--wrap-->
		<div class="wrap clearfix">
			<!--breadcrumbs-->
			<div class="ads1"><img src="<?php echo base_url()?>themes/front/img/ads-1.png" alt=""/></div>
			<nav class="breadcrumbs">
				<ul>
					<li><a href="<?php echo base_url()?>home" title="Home">Home</a></li>
					<li>Privacy Policy</li>
				</ul>
			</nav>
			<!--//breadcrumbs-->
			
			<!--row-->
			<div class="row">
				<header class="s-title">
					<h1>Privacy Policy</h1>
				</header>
				<!--content-->
				<section class="content three-fourth">
					<!--one-half-->
					<section class="container">
                      <h4>Who we are</h4>
<p>Our website address is: http://www.mirchichef.com/staging.</p>

<h4>What personal data we collect and why we collect it</h4>
<p><strong>Comments</strong></p>
<p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>

<p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>

<p><strong>Media</strong></p>
<p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website.</p>

<p><strong>Contact forms</strong></p>
<p><strong>Cookies</strong></p>
<p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year.</p>

<p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>

<p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>

<p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>

<p><strong>Embedded content from other websites</strong></p>
<p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website.</p>

<p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>

<p><strong>Analytics</strong></p>
<h4>Who we share your data with</h4>
<h4>How long we retain your data</h4>
<p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>

<p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>

<h4>What rights you have over your data</h4>
<p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>

<h4>Where we send your data</h4>
<p>Visitor comments may be checked through an automated spam detection service.</p>

<h4>Your contact information</h4>
<h4>Additional information</h4>
<h4>How we protect your data</h4>
<h4>What data breach procedures we have in place</h4>
<h4>What third parties we receive data from</h4>
<h4>What automated decision making and/or profiling we do with user data</h4>
<h4>Industry regulatory disclosure requirements</h4>
<p>Technical and routing information about the customer’s computer is collected when he/she visits Mirchi Chef site. This facilitates use of the site by the customer. For example, the Internet Protocol address of the customer’s originating Internet Service Provider may be recorded, to ensure the best possible service and use the customer’s IP address to track his/her use of the site. Mirchi Chef also records search requests and results to ensure the accuracy and efficiency of its search engine. This information may be collected by using cookies. “Cookies” are small date files, typically made up of a string of text and numbers, which assign to the customer a unique identifier. Cookies may be sent to the customer’s browser and / or stored on Mirchi Chef servers. The cookies enable Mirchi Chef to provide the customer with better access to the site and a more tailored or user friendly service. The customer may set the browser to not to accept cookies but that would limit the functionality Bong Haat can provide to the customer while visiting the site. Mirchi Chef site contains advertisements and/or contents which may have cookies maintained or tracked by the ad server or third parties. Bong Haat does not have control or access to such cookies. The customer should contact these companies directly if customer has any questions about their collection or use of information. Finally, Mirchi Chef collects aggregate information about the use of its site, such as which pages are most frequently visited, how many visitors Mirchi Chef receives daily, and how long visitors stay on each page etc. Use of information The information Mirchi Chef collects about the customer in the course of its relationship is used to provide the customer with both general and tailored information about offers, services or other useful information from Mirchi Chef or others. Mirchi Chef also may combine information the customer has provided in communications offline with the information given online (or vice versa). Mirchi Chef uses demographic and site usage information collected from visitors to improve the usefulness of our site and to prepare aggregate, non-identifying, information used in marketing, site advertising, or similar activities. As the services or offerings evolve, the types of information Mirchi Chef collects may change. Please check this policy frequently for the most current explanation of Mirchi Chef date practices. With whom the information is shared Mirchi Chef does not sell the customer’s email address or other identifying information to third parties. Mirchi Chef may provide to others the aggregate statistics about activities taking place on its site or related site activity for purposes of marketing or promotion. Mirchi Chef may disclose information about the customer to others if Mirchi Chef has a good faith and belief that it is required to do so by law or legal process, to respond to claims, or to protect its rights, property or safety. Disclaimer All rights reserved. Neither this website nor any part of it may be downloaded, reproduced, stored, distributed, adapted, translated or transmitted in any form or by any means or medium, whether now known or hereinafter invented, without prior permission of Mirchi Chef. Any breach of this notice would entail severe civil and criminal penalties</p>
						
					</section>
					<!--//one-half-->
				</section>
				<!--//content-->
				
				<!--right sidebar-->
				<aside class="sidebar one-fourth">
					<div class="widget">
						<h3>Recipe Categories</h3>
						<ul class="boxed">
						<?php 
						$i=0;
						foreach($recipe_category_data as $res_cat) { $i++;
						if($i%2==0){
							$class="light";
						}else{
							$class="dark";
						}
						 ?>
							<li class="<?php echo $class;?>"><a href="<?php echo base_url()?>recipe/category/<?php echo $res_cat->slug;?>" title="<?php echo $res_cat->cat_name;?>"><i class="icon icon-themeenergy_pasta"></i> <span><?php echo $res_cat->cat_name;?></span></a></li>
							<?php } ?>
							
						</ul>
					</div>
					
					<div class="widget">
						<img src="<?php echo base_url()?>themes/front/img/ads-3.png" alt="" />
					</div>
				</aside>
				<!--//right sidebar-->
			</div>
			<!--//row-->
		</div>
		<!--//wrap-->
	</main>
	<!--//main-->
	
		