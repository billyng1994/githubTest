<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
    <title>Document</title>
</head>
<body>
<?php include('header.php');?>
<h1>This is Homepage</h1> 

<?php
if(isset($_SESSION['userid'])){
    echo '<p>Hi, '.$_SESSION['loginName'].'! Welcome back!</p>';
}else{
    echo '<p>Please login to see the content.</p>';
}
?>

</body>
</html>