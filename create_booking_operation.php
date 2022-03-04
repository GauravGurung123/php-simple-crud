<?php

require "db_config.php";

/**  Insert data into 'booking_details' table */

// Escapes special characters in a string 
function escape($string) {
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $fullname = escape($_POST['fullname']);
    $email = escape($_POST['email']);
    $mobileNo = escape($_POST['mobile_no']);
    $location = escape($_POST['location']);
    $showDate = escape($_POST['showDate']);
    $showTime = escape($_POST['showTime']);
    $error = [
        'mobileNo'=> '',
        'email'=> '',
        'location' => '',
        'time' => ''
    ];

    if (strlen($mobileNo) != 10) {
        $error['mobileNo'] = 'Mobile Number length mismatched ';
    }else{
      $query = "SELECT mobile FROM booking_details WHERE mobile = '$mobileNo'";
      $result =  mysqli_query($connection, $query);

      if (mysqli_num_rows($result) > 0) {
        $error['mobileNo'] = 'Mobile number already exists';
      } 
    }

    $query = "SELECT email FROM booking_details WHERE email = '$email'";
    $result =  mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
      $error['email'] = 'Email already exists, pick another one';
    }
    
    if($location=="") $error['location'] = 'Select location';
    if($showTime=="") $error['time'] = 'Select show time';

    foreach ($error as $key => $value) {
      if (empty($value)) {
        unset($error[$key]);
      }
      if (!empty($value)) echo "Validation Failed => {$error[$key]} <br>";
    }

    if (empty($error)) {
      try{

        $query = "INSERT INTO booking_details (fullname, mobile, email, location, show_date, show_time) ";
        $query .= "VALUES('$fullname', '$mobileNo', '$email', '$location', '$showDate', '$showTime' )";
        $book_ticket_query = mysqli_query($connection, $query);
       
        if (!$book_ticket_query) throw new Exception(mysqli_error($connection));
    
        header("location: index.php");
        
      }
      catch (Exception $e) {
        echo $e->getMessage();
      }

    }
}
