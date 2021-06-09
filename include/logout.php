<?php
session_start();
include_once('include.php'); 

$Userid = $_SESSION['userid'];

$sql = "DELETE FROM loginstatus WHERE Userid = $Userid;";
mysqli_query($conn,$sql);

session_unset();
session_destroy();

header('Location: ../homepage.php');