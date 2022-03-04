<?php

require_once "db_config.php";

// create table 'booking_details'
$create_tbl_booking_details = "CREATE TABLE IF NOT EXISTS `movies`.`booking_details` ( 
    `id` INT(4) NOT NULL AUTO_INCREMENT ,
     `fullname` VARCHAR(255) NOT NULL , 
     `mobile` VARCHAR(10) NOT NULL , 
     `email` VARCHAR(255) NOT NULL , 
     `location` VARCHAR(255) NOT NULL , 
     `show_date` DATE NOT NULL , 
     `show_time` TIME NOT NULL , 
     `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
     PRIMARY KEY (`id`), UNIQUE (`mobile`), UNIQUE (`email`)
     )";

$create_tbl = mysqli_query($connection, $create_tbl_booking_details);

if(!$create_tbl) echo "table creation failed".var_dump(mysqli_error($connection));

?>