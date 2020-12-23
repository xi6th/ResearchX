<?php
	session_start();
	include("includes/db_conn.php");
	$day = date("Y-m-d");
	$date = date("Y-m-d H:i:s");
	$errors = array();
	$email ="";
    $phone_number="";
	$project_id="";
	

    function existInDb($code, $db){
		$code_query = "SELECT * FROM user WHERE user_id ='$code'";
		$result = mysqli_query($db, $code_query);
		$number = mysqli_num_rows($result);
		if($number >0){
			return true;
		}else{
			return false;
		}
	}
    
    if(isset($_GET['pid']) || isset($_POST['project_id'])){
		if(isset($_GET['pid'])){
			$project_id = $_GET['pid'];
		}
		if(isset($_POST['project_id'])){
			$project_id = $_POST['project_id'];
		}
        
    }else{
        header("location: home");
    }

	if (isset($_POST['register'])){
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $project_id = $_POST['project_id'];
        if(empty($email)){ array_push($errors, "Email is required*"); }
        if(empty($phone_number)){ array_push($errors, "phone number is required*"); }

        if (count($errors) == 0) {
			
			$unique_number = uniqid(rand (), true);
			while(existInDb($unique_number, $db_handle)) {
				$unique_number = uniqid(rand (), true);                                       
			}
			$user_id = $unique_number;

			$register_query = "INSERT INTO user (	user_id,	email,   	phone_number,user_role,	date,	day ) 
										VALUES('$user_id', '$email',     '$phone_number','user', '$date',  '$day' )";
			if(mysqli_query($db_handle, $register_query)){
				if ($project_id != "none"){
						$user_update_query = "UPDATE projects SET  user_id = '$user_id' WHERE project_id='$project_id'";
						if (mysqli_query($db_handle, $user_update_query)) {
						}
				}
				
				$user_id = $user['user_id'];
				
				header("location: message_user");
				
			}

			
            
        }
	}
?>


<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Tell Us More | Research X</title>
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
			<!-- End Navigation -->
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="login-plane-sec">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="login-panel panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">A few more details</h3>
								</div>
								<div class="panel-body">
									<img src="assets/img/llll.png" class="img-responsive" />
									
									<form role="form" action="more_details" method="post">
										<div style="color:red;">
											<?php include("includes/single_error.php");?>
										</div>
										
										<fieldset>
                                            <input name="project_id" value="<?= $project_id?>" type="hidden">
											<div class="form-group">
												<input required class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
											</div>
											<div class="form-group">
												<input required class="form-control" placeholder="Phone Number" name="phone_number" type="text" value="">
											</div>
											<div class="checkbox">
												<label>
													<!-- <input name="remember" type="checkbox" value="Remember Me">Remember Me -->
												</label>
											</div>
											<!-- Change this to a button or input when using this as a form -->
											<Button name="register" type="submit" class="btn btn-login">Finish</Button>
										</fieldset>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
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
			
		
		</div>
	</body>

</html>