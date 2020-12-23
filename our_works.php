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
	<title>Archive | Research X</title>
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
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(assets/img/abb-robotics-cover-image.jpg);">
				<div class="container">
					<h1>Our Works</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					
                <div class="clearfix"></div>
			<section>
				<div class="container">
					
					<div class="row">
						
					</div>
					<!--/row-->
					
					<!--Browse Job In Grid-->
					<div class="row extra-mrg">


					<?php
						$report_counter = 1;
						$empty = TRUE;
						$table_result = $db_handle->query("SELECT * FROM our_works ORDER BY id DESC");
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
										<h3><a href=""><?= $project_row['title'] ?></a></h3>
										<?php
											$description = substr($project_row['description'], 0,35)."...";
										?>
										<p><span><?= $project_row['description'] ?></span></p>
									</div>
									<!-- <span class="tg-themetag tg-featuretag">New</span> -->
								</div>
							</div>
							
					<?php $empty = FALSE; $report_counter++; endforeach; unset($project_row); if ($empty == TRUE) echo "<h6 style='text-align: center; color: red'>There are no new Tasks</h6>" ?>
						



					
					</div>
					<!--/.Browse Job In Grid-->

						
				</div>
			</section>
			<div class="clearfix"></div>
					
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
			
			<!-- Footer Section Start -->
			<?php include("includes/footer.php");?>
			<div class="clearfix"></div>
			<!-- Footer Section End -->
			
			 
			
			
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