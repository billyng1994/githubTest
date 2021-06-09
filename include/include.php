<?php
$dbservername = "localhost";
$dbloginname = "root";
$dbpassword = "";
$dbname = "membership";

$conn = new mysqli($dbservername,$dbloginname,$dbpassword,$dbname);

if(!$conn){
die("connetion failed: ".mysqli_connect_error());

}