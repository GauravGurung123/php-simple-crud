<?php 
require_once "db_config.php"; 

function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

  
if($_SERVER['REQUEST_METHOD'] == "POST")  {
    if(!empty($_POST)) {
        $id = escape($_POST['id']);
        $fullname = escape($_POST['fullname']);
        $email = escape($_POST['email']);
        $mobileNo = escape($_POST['mobile_no']);
        $location = escape($_POST['location']);
        $showDate = escape($_POST['showDate']);
        $showTime = escape($_POST['showTime']);

        try{
            
            $query = "UPDATE booking_details SET ";
            $query .= "fullname = '{$fullname}', ";
            $query .= "mobile = '{$mobileNo}', ";
            $query .= "email = '{$email}', ";
            $query .= "location = '{$location}', ";
            $query .= "show_date = '{$showDate}', ";
            $query .= "show_time = '{$showTime}' ";
            $query .="WHERE id = {$id} ";
    
            $update_booked_query = mysqli_query($connection, $query);

            if (!$update_booked_query) throw new Exception(mysqli_error($connection)); 
            
            header("location: index.php");
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


}


?>