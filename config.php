<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "formation_db";
$con = mysqli_connect($servername, $user, $password, $dbname);

if(!$con){
    die("Database connection failed: " . mysqli_connect_error());
}
