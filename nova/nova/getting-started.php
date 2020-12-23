<?php
	session_start();
	include("includes/db_conn.php");
	$day = date("Y-m-d");
	$date = date("Y-m-d H:i:s");
	$errors = array();
	$topic = "";
	$duration = "";
	$category = "";
	$education_level = "";

	function existInDb($code, $db){
		$code_query = "SELECT * FROM projects WHERE project_id ='$code'";
		$result = mysqli_query($db, $code_query);
		$number = mysqli_num_rows($result);
		if($number >0){
			return true;
		}else{
			return false;
		}
	}


	if (isset($_POST['submit_project'])){
		$topic = $_POST['topic'];
		$duration = $_POST['duration'];
		$category = $_POST['category'];
		$education_level = $_POST['education_level'];
		if(empty($topic)){ array_push($errors, "Project topic is required*"); }
		if(empty($duration)){ array_push($errors, "Project duration is required*"); }
		if($category == "Choose Project Category"){ array_push($errors, "Please select a category*"); }

		if (count($errors) == 0) {
			$unique_number = uniqid(rand (), true);
              while(existInDb($unique_number, $db_handle)) {
                  $unique_number = uniqid(rand (), true);                                       
              }
              $project_id = $unique_number;

			$register_query = "INSERT INTO projects (project_id,	project_topic,	project_category,	project_duration,	education_level,	user_id,	date,	day, status, approval_status, approval_date, price ) 
                                              VALUES('$project_id', '$topic',      '$category',         '$duration',       '$education_level',   '',     '$date',  '$day' , 'unseen', 'not_approved', 'null', 'null')";
              if(mysqli_query($db_handle, $register_query)){
					header("location: more_details?pid=$project_id");
			  }
		}
	}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Getting Started | Research X</title>
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
			

			<!-- Main Banner Section Start -->
			<div class="home-three-banner" style="background-image:url(assets/img/banner-4.jpg);">  
				<!-- Wrapper for carousel items -->
				<div class="container">
					<div class="simple-banner-caption">
						<div class="col-md-8 col-sm-10 banner-text">
							<h1>Tell Us About Your<span> Project </span></h1>
							<p>Please input details about your research project and let us know how we can help. </p>
							<?php include("includes/single_error.php");?>
							<form class="bt-form" action="getting-started" method="post">
								<div class="col-md-6 col-sm-6">
									<input name="topic" type="text" class="form-control" placeholder="Your Project Topic">
								</div>
								<div class="col-md-6 col-sm-6">
									<select name="category" id="choose-city" class="form-control">
										<option>Choose Project Category</option>
										<option>Computer Security</option>
										<option>Artificial Intelligence</option>
										<option>Software Engineering / Development</option>
										<option>Networking</option>
										<option>IOT & Embedded Systems</option>
										<option>Algorithim Implementation</option>
										<option>Others</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-6">
									<input name="duration" type="text" class="form-control" placeholder="Your Research Duration">
								</div>
								<div class="col-md-6 col-sm-6">
									<input name="education_level" type="text" class="form-control" placeholder="Education Level (eg BSc, MSc, PHD ....)">
								</div>
							
								<div class="col-md-4 col-sm-5">
									<button type="submit" name="submit_project" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<!-- Main Banner Section End -->
		
			<div class="clearfix"></div>
			<!-- Download app Section End -->
			
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