<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
    <title>Document</title>
</head>
<body>
<?php include('header.php');?>
<div id="signupform-container">
    <form id="signupform" action="../loginsys/include/signup.php" method="POST">
        <lable for="Firstname">Firstname: </lable>
        <br>
        <input type="TEXT" name="firstName" placeholder="">
        <br>
        <lable for="Lastname">Lastname: </lable>
        <br>
        <input type="TEXT" name="lastName" placeholder="">
        <br>
        <lable for="Email">Email: </lable>
        <br>
        <input type="TEXT" name="email" placeholder="">
        <br>
        <lable for="Login name">Login name: </lable>
        <br>
        <input type="TEXT" name="loginName" placeholder="">
        <br>
        <lable for="Password">Password: </lable>
        <br>
        <input type="password" name="pwd" placeholder="">
        <br>
        <lable for="Repeat Password">Repeat Password: </lable>
        <br>
        <input type="password" name="repeatpwd" placeholder="">
        <br>
        <?php include('../loginsys/include/errormsg.php');?>
        <br>
        <button type="submit" name="submit">Sign up</button>
    </form>
</div>    
</body>
</html>