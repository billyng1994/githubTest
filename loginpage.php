<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
    <title>Document</title>
</head>
<body>
<?php include('header.php');?>
<div id="loginform-container">
    <form id="loginform" action="../loginsys/include/login.php" method="POST">
        <lable for="Login name">Login name: </lable>
        <br>
        <input type="TEXT" name="loginName" placeholder="">
        <br>
        <lable for="Password">Password: </lable>
        <br>
        <input type="password" name="Password" placeholder="">
        <br>
        <?php include('../loginsys/include/errormsg.php');?>
        <br>
        <button type="submit" name="submit">Sign in</button>
    </form>
</div>    
</body>
</html>