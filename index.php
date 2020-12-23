<!doctype html>


<?php

	session_start();
	include("includes/db_conn.php");
	$day = date("Y-m-d");
	$date = date("Y-m-d H:i:s");
	$errors = array();

?>






<html lang="en">
 
<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Research X</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="assets/plugins/css/plugins.css">
    
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/green-style.css">
    
</head>
	<body>
		<div class="Loader"></div>
		<div class="wrapper">  
			<!-- Start Navigation -->
			<?php include("includes/header.php");?>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<?php// include("chat_btn.php");?>
			<!-- Main Banner Section Start -->
			<section class="slide-banner scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
				<div class="slideshow-container">
					<!-- slideshow-item -->	
					<div class="slideshow-item">
						<div class="bg"  data-bg="assets/img/b-1.jpg"></div>
					</div>
					<!--  slideshow-item end  -->
					
					<!-- slideshow-item -->	
					<div class="slideshow-item">
						<div class="bg"  data-bg="assets/img/b-2.jpg"></div>
					</div>
					<!--  slideshow-item end  -->
					
					<!-- slideshow-item -->	
					<div class="slideshow-item">
						<div class="bg"  data-bg="assets/img/b-3.jpg"></div>
					</div>
					<!--  slideshow-item end  -->

					<!-- slideshow-item -->	
					<div class="slideshow-item">
						<div class="bg"  data-bg="assets/img/b-4.jpg"></div>
					</div>
					<!--  slideshow-item end  -->					
				</div>
				<div class="overlay"></div>
				<div class="hero-section-wrap fl-wrap">
					<div class="container">
						<div class="intro-item fl-wrap">
							<div class="caption text-center cl-white"><br><br><br><br>
								<h2>Your Project Research Partner</h2>
								<p>We're a platform delivering first hand research and brilliant software products</p>
								<!-- <p>We help you conduct, implement and bring your Artificial Intelligence research projects to reality...</p> -->
								<a href="getting-started"><button type="submit" class="btn btn-primary">Get Started...</button></a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Main Banner Section End -->

			
 			<div class="clearfix"></div>
			<section>
				<div class="container">

					<div class="row">
						<div class="main-heading">
							<h2>Our <span>Services.</span></h2>
						</div>
					</div>

					<!--Browse Job In Grid-->
					<div class="row extra-mrg">
						
						<!-- Single Job Grid -->
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list">
								<div class="brows-job-company-img">
									<img src="assets/img/robotics_icon.jpg" class="img-responsive" alt="" />
								</div>
								<div class="brows-job-position">
									<h3><a href="">Robotics</a></h3>
									<p><span>Robotics and Automation Research.</span></p>
								</div>
								<!-- <span class="tg-themetag tg-featuretag">New</span> -->
							</div>
						</div>

						<!-- Single Job Grid -->
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list">
								<div class="brows-job-company-img">
									<img src="assets/img/machine_learning_icon.jpg" class="img-responsive" alt="" />
								</div>
								<div class="brows-job-position">
									<h3><a href="">Machine Learning</a></h3>
									<p><span>Machine Learning research.</span></p>
								</div>
								<!-- <span class="tg-themetag tg-featuretag">New</span> -->
							</div>
						</div>

						<!-- Single Job Grid -->
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list">
								<div class="brows-job-company-img">
									<img src="assets/img/deep_learning_icon.png" class="img-responsive" alt="" />
								</div>
								<div class="brows-job-position">
									<h3><a href="">Deep Learning</a></h3>
									<p><span>Deep Reinforcement learning research</span></p>
								</div>
								<!-- <span class="tg-themetag tg-featuretag">New</span> -->
							</div>
						</div>

						<!-- Single Job Grid -->
						<div class="col-md-3 col-sm-6">
							<div class="grid-view brows-job-list">
								<div class="brows-job-company-img">
									<img src="assets/img/data_analytics_icon.png" class="img-responsive" alt="" />
								</div>
								<div class="brows-job-position">
									<h3><a href="">Data Analytics</a></h3>
									<p><span>Data analysis and analytics</span></p>
								</div>
								<!-- <span class="tg-themetag tg-featuretag">New</span> -->
							</div>
						</div>

					</div>
					<!--/.Browse Job In Grid-->
						
				</div>
			</section>
			<div class="clearfix"></div>

 			<div class="clearfix"></div>
			<section>
				<div class="container">
					
					<div class="row">
						<div class="main-heading">
							<h2>Recent <span>Projects</span></h2>
						</div>
					</div>
					<!--/row-->
					
					<!--Browse Job In Grid-->
					<div class="row extra-mrg">


					<?php
						$report_counter = 1;
						$empty = TRUE;
						$table_result = $db_handle->query("SELECT * FROM our_works ORDER BY id DESC LIMIT 12");
						foreach ($table_result as $project_row): ?>
						
							<div class="col-md-3 col-sm-6">
								<div class="grid-view brows-job-list">
									<div style="align-center:true;">
									<?php
										$image_url = substr($project_row['image_url'], 3);
									?>
										<img height="150px" width="180px" src="<?= $image_url ?>" class="" alt="" />
									</div>
									<div class="brows-job-position">
										<h3><a href=""><?php
										$projectTitle = substr($project_row['title'], 0,32)."...";
										
										echo $projectTitle; ?></a></h3>
										<?php
											$description = substr($project_row['description'], 0,35)."...";
										?>
										<p><span><?= $description ?></span></p>
									</div>
									<span class="tg-themetag tg-featuretag">New</span>
								</div>
							</div>
							
					<?php $empty = FALSE; $report_counter++; endforeach; unset($project_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no new Tasks</h6>" ?>
						



					
					</div>
					<!--/.Browse Job In Grid-->

					<a href="our_works"><button type="submit" class="btn btn-primary">See More...</button></a>
						
				</div>
			</section>
			<div class="clearfix"></div>

			<!-- <div class="clearfix"></div>
			<section class="how-it-works">
				<div class="container">
					
					<div class="row" data-aos="fade-up">
						<div class="col-md-12">
							<div class="main-heading">
								<h2>How It <span>Works</span></h2>
							</div>
						</div>
					</div>
					
					<div class="row">
					
						<div class="col-md-4 col-sm-4">
							<div class="working-process">
								<span class="process-img">
									<img src="assets/img/step-1.png" class="img-responsive" alt="">
									<span class="process-num">01</span>
								</span>
								<h4>Project Statement</h4>
								<p>Tell us about your research project by clicking get-started button above and filling out the form</p>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
							<div class="working-process">
								<span class="process-img">
									<img src="assets/img/step-2.png" class="img-responsive" alt="">
									<span class="process-num">02</span>
								</span>
								<h4>We Match You</h4>
								<p>We match you with the most optimized researcher/ team that will best get the job done.</p>
							</div>
						</div>
						
						<div class="col-md-4 col-sm-4">
							<div class="working-process">
								<span class="process-img">
									<img src="assets/img/step-3.png" class="img-responsive" alt="">
									<span class="process-num">03</span>
								</span>
								<h4>Receive &amp; Reward</h4>
								<p>We deliver your project and the research community is rewarded.</p>
							</div>
						</div>
						
					</div>
					
				</div>
			</section> -->

			<section class="wp-process home-three">
				<div class="container">
					<div class="row">
						<div class="main-heading">
							<!-- <p>How We Work</p> -->
							<h2>How Can ResearchX <span>Help You?</span></h2>
						</div>
					</div>
					<!--/row-->
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-book-open"></span>
							</div>
							<div class="work-process-caption">
								<h4>As a Student</h4>
								<p>We guide and help students with the research and development of their <b> Computational Research Projects</b> at their various levels(final year, MSc, Phd).<br></p>
							</div>
						</div>
						
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-bargraph"></span><!-- icon-beaker  -->
							</div>
							<div class="work-process-caption">
								<h4>As a Resercher</h4>
								<p>We keep and maintain a large archive of <b>Opensource research projects, papers and codes</b> to aid researchers in their respective projects.</p>
							</div>
						</div>
						
						<!-- <div class="work-process">
							<div class="work-process-icon">
								<span class="icon-laptop"></span>
							</div>
							<div class="work-process-caption">
								<h4>As a Developer / Engineer</h4>
								<p>We  offer a wide range of training materials and resources to help engineers in their projects.</p>
							</div>
						</div> -->
					</div>
					
					<div class="col-md-4 hidden-sm">
						<!-- <img src="assets/img/wp-iphone.png" class="img-responsive" alt=""> -->
					</div>
					
					<div class="col-md-4 col-sm-6">
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-briefcase"></span>
								<!-- icon-layers -->
							</div>
							<div class="work-process-caption">
								<h4>Business</h4>
								<p>We Deliver Brilliant Software Products to enable your business leverage artificial intelligence. </p>
							</div>
						</div>
						
						<div class="work-process">
							<div class="work-process-icon">
								<span class="icon-happy"></span>
							</div>
							<div class="work-process-caption">
								<h4>Community</h4>
								<p>We maintain a community of <b>Developers, Engineers, Researchers and Enthusiasts</b> with the aim to bring together like minds to build a sustainable technology thereby improving the society. </p>
							</div>
						</div>
						
						<!-- <div class="work-process">
							<div class="work-process-icon">
								<span class="icon-layers"></span>
							</div>
							<div class="work-process-caption">
								<h4>Others</h4>
								<p> </p>
							</div>
						</div> -->
					</div>
					
				</div>
			</section>
	
			
			<!-- Footer Section Start -->
			<?php include("includes/footer.php");?>
			<div class="clearfix"></div>
			<!-- Footer Section End -->
			<a href="https://wa.me/+2347018894193"><button style="z-index:9; color:#07b107;background:#93aaba70;" class="w3-button w3-teal w3-xlarge w3-right" onclick=""><i class="fa fa-whatsapp" aria-hidden="true"></i></button></a>
			 
		
			
			<!-- Scripts
			================================================== -->
			<script type="text/javascript" src="assets/plugins/js/jquery.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/viewportchecker.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootsnav.js"></script>
			<script type="text/javascript" src="assets/plugins/js/select2.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/wysihtml5-0.3.0.js"></script>
			<script type="text/javascript" src="assets/plugins/js/bootstrap-wysihtml5.js"></script>
			<script type="text/javascript" src="assets/plugins/js/datedropper.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/dropzone.js"></script>
			<script type="text/javascript" src="assets/plugins/js/loader.js"></script>
			<script type="text/javascript" src="assets/plugins/js/owl.carousel.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/slick.min.js"></script>
			<script type="text/javascript" src="assets/plugins/js/gmap3.min.js"></script>
			
			<!-- Custom Js -->
			<script src="assets/js/custom.js"></script>
			<script src="assets/js/jQuery.style.switcher.js"></script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#styleOptions').styleSwitcher();
				});
			</script>
			<script>
				function openRightMenu() {
					document.getElementById("rightMenu").style.display = "block";
				}

				function closeRightMenu() {
					document.getElementById("rightMenu").style.display = "none";
				}
			</script>
		</div>
	</body>

</html>