<?php 
require_once("config.php") ;
require_once("inc/header.php"); 
function textShorten($text, $limit = 50){
	$text = $text. " ";
	$text = substr($text, 0, $limit);
	$text = substr($text, 0, strrpos($text, ' '));
	$text = $text.".....";
	return $text;
 }

?>
		<!-- Start main-content -->
		<section class="page-title" style="background-image: url(images/main-slider/3.jpg);">
			<div class="auto-container">
				<div class="title-outer">
					<h1 class="title">Blog</h1>
					<ul class="page-breadcrumb">
						<li><a href="index.html">Home</a></li>
						<li>Blog</li>
					</ul>
				</div>
			</div>
		</section>
		<!-- end main-content -->

		<!-- News Section -->
		<section class="bg-silver-light">
			<div class="container pb-90">
				<div class="row">

				<?php $id = 0;
           $sql = "SELECT `blog`.*, `users`.`name` FROM `blog` LEFT JOIN `users` ON `users`.`user_id` = `blog`.`author` ORDER BY `blog`.`published_on`";
           $result = mysqli_query($conn, $sql);
              while ($rows = mysqli_fetch_assoc($result)) {
                $id = $id + 1;
								$blog_id = $rows['blog_id'];
								$a_name = $rows['name'];
								$short_desp = $rows['short_desc'];
							
            ?>
					<!-- News Block -->
					<div class="news-block col-xl-4 col-lg-6 col-md-6">
						<div class="inner-box">
							
							<div class="image-box">
								<figure class="image"><a href="blog_details.php?id=<?php echo $rows['blog_id'];?>"><img src="admin/<?php echo $rows['feature_img']?>" alt=""></a>
								</figure>
							</div>
							<div class="content-box">
								<span class="date"><?php echo (new DateTime($rows['published_on']))->format('d M, Y')  ?></span>
								<span class="post-info"><i class="fa fa-user-circle"></i>
										<?php
										echo "by ",$a_name;
										?>
							</span>
								<h5 class="title"><a href="blog_details.php?id=<?php echo $rows['slug'];?>"><?php echo $rows['title'] ?></a></h5>
								<div class="text"><?php echo textShorten(strchr($short_desp,'.'),95); ?></div>
								<a method="Get" href="blog_details.php?id=<?php echo $rows['slug'];?>" class="read-more"><i class="fa fa-long-arrow-alt-right"></i> Read More</a>
							</div>
						</div>
					</div>
					<?php } ?>

					
			</div>
		</section>
		<!--End News Section -->

		<!-- Main Footer -->
		<?php include("inc/footer.php"); ?>
