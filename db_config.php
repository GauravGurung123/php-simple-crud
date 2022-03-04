<?php
// create database connection without database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "movies";

$connection = mysqli_connect($db_host, $db_user, $db_pass);

if(!$connection) die('Error: cannot connect'. var_dump(mysqli_connect_error()));

// create database 'movies'
$create_db_movies = "CREATE DATABASE IF NOT EXISTS `movies`";

$create_db_movies = mysqli_query($connection, $create_db_movies);

if(!$create_db_movies) echo "database creation failed";

// create database connection with database
$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$connection) die('Error: cannot connect'. var_dump(mysqli_connect_error()));

?>