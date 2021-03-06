<!DOCTYPE html>
<?php

    session_start();
    include("../includes/db_conn.php");
    $day = date("Y-m-d");
    $date = date("Y-m-d H:i:s");
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

    

    
    if(isset($_GET['id'])){
      $project_id = $_GET['id'];

      $project_details_query = "SELECT * FROM projects WHERE project_id='$project_id' LIMIT 1";
      $project_details_result = mysqli_query($db_handle, $project_details_query);
      $project_details = mysqli_fetch_assoc($project_details_result);
      if ($project_details) {
        $project_title = $project_details['project_topic'];
        $project_category = $project_details['project_category'];
        $project_duration = $project_details['project_duration'];
        $education_level = $project_details['education_level'];
        $approval_date = $project_details['approval_date'];

        if($approval_date!= "null"){
            $approval_date = time_elapsed_string($approval_date, $full = false);
        }else{
            $approval_date = "";
        }

        $price = $project_details['price'];

        if($price!= "null"){
            $price = "<b>&#8358;</b>".$price;
        }else{
            $price = "";
        }

        $date_submitted = $project_details['date'];
        $date_submitted = time_elapsed_string($date_submitted, $full = false);
      }

    }else{
      header("location: home");
    }

    $project_update_query = "UPDATE projects SET  status = 'seen' WHERE project_id='$project_id'";
        if (mysqli_query($db_handle, $project_update_query)) {
    }


    
?>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Report</title>
  <!-- plugins:css -->
   <link rel="stylesheet" href="vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
   <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
   <!-- endinject -->
   <!-- plugin css for this page -->
   <link rel="stylesheet" href="vendors/summernote/dist/summernote-bs4.css">
   <!-- End plugin css for this page -->
   <!-- inject:css -->
   <link rel="stylesheet" href="css/vertical-layout-light/style.css">
   <!-- endinject -->
   <link rel="shortcut icon" href="images/favicon.png" />
</head>
<script src="jq.js"></script>
        <!-- <script>
          function sendReport(){
            var project_type = $('#reportType').val();
            var message = $('#summernote').summernote('code');
            
            console.log(project_type);
          }
        </script> -->
<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include("includes/header.php");?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include("includes/sidebar.php");?>
      <!-- partial -->
      <div class="main-panel">
        <div style="height:100%;" class="content-wrapper">
          <div style="height:100%;" class="row">
            <div class="col-lg-12">
              <div style="height:100%;" class="card">
                <div class="card-body">
                    <h4  class="card-title">Project Topic:<span style="color:red;"> <?=$project_title?> </span></h4>
                    <h6>Category: <span style="color:red;"> <?=$project_category?></span></h6> <br>
                    <h6>Duration: <span style="color:red;"> <?=$project_duration?></span></h6> <br>
                    <h6>Date submitted: <span style="color:blue;"> <?= $date_submitted?></span></h6> <br>

                    <h6>Date Approved: <span style="color:blue;"> <?= $approval_date?></span></h6> <br>
                    <h6>price: <span style="color:blue;"> <?= $price?></span></h6> <br>
                   
                    <div class="mt-3">
                        <a href="home">
                            <button type="button" class="btn btn-danger btn-icon-text">
                                <i class="mdi mdi-step-backward-2 btn-icon-prepend"></i>
                                Back
                            </button>
                        </a>
                        <?php if($project_details['approval_status']== 'not_approved'){ ?>
                            <a href="approve_project?id=<?=$project_id?>">
                                <button type="button" class="btn btn-success btn-icon-text">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                Approve
                                </button>
                            </a>
                        <?php }else{ ?>
                            <a href="approve_project?id=<?=$project_id?>">
                                <button type="button" class="btn btn-success btn-icon-text">
                                <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                Edit
                                </button>
                            </a>
                        <?php } ?>
                    </div>
                </div>
              </div>              
            </div>

            
            
          </div>
        </div>
        
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php include("includes/footer.php");?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->



  <script src="jq.js"></script>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="vendors/tinymce/tinymce.min.js"></script>
  <script src="vendors/tinymce/themes/modern/theme.js"></script>
  <script src="vendors/summernote/dist/summernote-bs4.min.js"></script>
  <!-- plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->

  <script src="js/editorDemo.js"></script>




  <!-- End custom js for this page-->
</body>


</html>
