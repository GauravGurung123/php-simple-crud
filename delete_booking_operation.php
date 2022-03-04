<?php
require_once "db_config.php";

//delete booking ticket query
if($_SERVER['REQUEST_METHOD'] == "GET")  {
    if(!empty($_GET['delete'])) {
        try{

            $query = "DELETE FROM booking_details where id = {$_GET['delete']} ";
            $del_booked_query = mysqli_query($connection, $query);
            
            if (!$del_booked_query) throw new Exception(mysqli_error($connection)); 
            
            header("location: index.php");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    
    }

    if(!empty($_GET['action'])) {
        try {
            
            $query = "TRUNCATE booking_details";
            $truncate_query = mysqli_query($connection, $query);
            
            if (!$truncate_query) throw new Exception(mysqli_error($connection)); 
            
            header("location: index.php");
            
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }

}
?>