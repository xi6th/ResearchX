<?php 
    session_start();
    include("../includes/db_conn.php");
    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d H:i:s");
    $day = date("Y-m-d");
 
    function existInDb($code, $db){
        $code_query = "SELECT * FROM notifications WHERE notification_id ='$code'";
        $result = mysqli_query($db, $code_query);
        $number = mysqli_num_rows($result);
        if($number >0){
            return true;
        }else{
            return false;
        }
    }
  
    $account_id = $_SESSION['message_receiver'];

    $message = $_POST['message'];
    $error = 0;
    if(empty($message)){ 
        echo "error message"; 
        $error = $error + 1;
    }
    if($error < 1){

        $unique_number = uniqid(rand (), true);
        while(existInDb($unique_number, $db_handle)) {
            $unique_number = uniqid(rand (), true);                                       
        }
        $notification_id = $unique_number;        

        // $_SESSION['notification_id']=$notification_id;
        $report_submit_query = "INSERT INTO notifications ( notification_id,	title,	        body,	    sender_id,  receiver_id,	send_date,	send_day,	status ) 
  			                                        VALUES('$notification_id', 'title','$message', 'admin@fbs.com', '$account_id',         '$date',         '$day',    'unseen' )";
        if(mysqli_query($db_handle, $report_submit_query)){
            // unset($_SESSION['message_receiver']);
            echo("success");
        }

    }

    

   

//    $userinfo = $conn->prepare("INSERT INTO registered_users (FirstName, LastName, Username, Password, Email) VALUES ('$first1', '$last1', '$username1'', '$pass1', '$email01')");

//    $userinfo->execute();


//    $conn = null;
?>