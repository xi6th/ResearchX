<!DOCTYPE html>
<?php
      session_start();
      include("../includes/db_conn.php");
       $date = date("Y-m-d H:i:s");
      $day = date("Y-m-d");
  
      $auth = 0;
      if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] != 'admin'){
          header('location: ../home');
        }
       
          
      }else{
        header('location: ../home');
      }
  
      $script_name = pathinfo(__FILE__, PATHINFO_FILENAME);
      

      function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
      }


      // $user_id = $_SESSION['user_id'];
      // $date = date("Y-m-d H:i:s");
      // $day = date("Y-m-d");

      // $user_details_query = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
      // $user_details_result = mysqli_query($db_handle, $user_details_query);
      // $user_details = mysqli_fetch_assoc($user_details_result);
      // if ($user_details) {
      //   $username = $user_details['username'];
      //   $fullname = $user_details['full_name'];
      //   $email = $user_details['email'];
      // }


?>


<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      
      <!-- partial:partials/_sidebar.html -->
      <?php include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <?php if(isset($_GET['msg_success'])){ ?>
            <div class="alert alert-success" role="alert">
                  <?= $_GET['msg_success'] ?>
            </div>
          <?php } ?>

          <?php if(isset($_GET['msg_error'])){ ?>
            <div class="alert alert-danger" role="alert">
                  <?= $_GET['msg_error'] ?>
            </div>
          <?php } ?>

          <div class="row">
            <div class="col-md-12 grid-margin">
							<div class="card bg-facebook">
								<div class="card-body">
									<div class="d-flex flex-row align-items-top">
										<i class="mdi mdi-file-alert text-white icon-md"></i>
										<div class="ml-3">
                    <?php
                      $unseen_reports_query = "SELECT * FROM projects WHERE status='unseen'";
                      $unseen_reports_result = mysqli_query($db_handle, $unseen_reports_query);
                      $rows = mysqli_num_rows($unseen_reports_result);
                    ?>
											<a><h6 style="margin-top:8px" class="text-white"><?=$rows." "?> Unattended Project(s)</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					
					</div>

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Showing All Unattended Projects</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Project Title</th>
                            <th>Project Duration</th>
                            <th> Level</th>
                            <th>.</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $report_counter = 1;
                          $empty = TRUE;
                          $table_result = $db_handle->query("SELECT * FROM projects WHERE status ='unseen'");
                          foreach ($table_result as $report_row): ?>
                            <tr>
                                <td><?= $report_counter ?></td>
                                <td><?= $report_row['project_topic'] ?></td>
                                <td><?= $report_row['project_duration'] ?></td>
                                <td><?= $report_row['education_level'] ?></td>
                                <td>
                                    <a href="view_project.php?id=<?= $report_row['project_id'] ?>">
                                      <button type="button" class="btn btn-primary btn-icon-text">
                                        <i class="mdi mdi-eye btn-icon-prepend"></i>
                                        View
                                      </button>
                                    </a>
                                </td>
                            </tr>
                        <?php $empty = FALSE; $report_counter++; endforeach; unset($report_row); if ($empty == TRUE) 
                        echo "<h6 style='text-align: center; color: red'>There are no new projects</h6>" ?>
                      </tbody>
                     
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include("includes/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <!-- <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script> -->
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
