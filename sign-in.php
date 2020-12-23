<?php
	session_start();
	include("includes/db_conn.php");
	$day = date("Y-m-d");
	$date = date("Y-m-d H:i:s");
	$errors = array();
	$email ="";
    $password="";


	if (isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
		// $project_id = $_POST['project_id'];
		if(empty($email)){ array_push($errors, "Email is required*"); }
		if(empty($password)){ array_push($errors, "Password is required*"); }

		if (count($errors) == 0) {
			$enc_password = md5($password);

			$user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
			$result = mysqli_query($db_handle, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			if ($user) { // if user exists
				if ($enc_password ==="5f4dcc3b5aa765d61d8327deb882cf99" ) {
					$_SESSION['status'] = "logged in";
                    $_SESSION['email'] = $email;
                    $_SESSION['user_role'] = $user['user_role'];
                    $_SESSION['user_id'] = $user['user_id'];
					$user_id = $user['user_id'];
					
					if($user['user_role'] == "admin"){
						header("location: admin_dashboard");
						// echo($user['user_role']);
					}				

				}
			}

		}
	}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Basic Page Needs
	================================================== -->
	<title>Sign In | Research X</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="assets/plugins/css/plugins.css">
    
    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/green-style.css">
    
	</head>
	<body class="simple-bg-screen" style="background-image:url(assets/img/map_connect.jpg);">
		<div class="Loader"></div>
		<div class="wrapper">  
			 
			<!-- Title Header Start -->
			<section class="login-screen-sec">
				<div class="container">
					<div class="login-screen">
						<img src="assets/img/llll.png" class="img-responsive" />
						<form action="sign-in" method="post">
							<div style="color:red;">
								<?php include("includes/single_error.php");?>
							</div>
							<input name="email" type="text" class="form-control" placeholder="Email">
							<input name="password"  type="password" class="form-control" placeholder="Password">
							<button name="login" class="btn btn-login" type="submit">Login</button>
						</form>
					</div>
				</div>
			</section>
			
			
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