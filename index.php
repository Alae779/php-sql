<?php
$servername = "localhost";
$user = "root";
$password = "";
$dbname = "formation_db";
$con = mysqli_connect($servername, $user, $password, $dbname);

if($con){
    echo "you are connected";
}
?>