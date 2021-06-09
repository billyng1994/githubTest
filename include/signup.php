<?php

if(isset($_POST["submit"])){
    include_once('include.php');
    include_once('function.php');

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $loginName = $_POST['loginName'];
    $pwd = $_POST['pwd'];
    $repeatpwd = $_POST['repeatpwd'];

    if(emptyInputSignup($firstName, $lastName, $email, $loginName, $pwd, $repeatpwd) !== false){
        
        header("Location: ../signuppage.php?error=inputempty"); 
        exit();
    }

    if(invalidloginName($loginName) !== false){
        header("Location: ../signuppage.php?error=invalidloginName"); 
        exit();
    }

    if(invalidemail($email) !== false){
        header("Location: ../signuppage.php?error=invalidemail"); 
        exit();
    }

    if(pwdmatch($pwd,$repeatpwd) !== false){
        header("Location: ../signuppage.php?error=notsamepassword"); 
        exit();
    }

    if(loginNameexist($conn,$loginName,$email) !== false){
        header("Location: ../signuppage.php?error=loginnametaken"); 
        exit();
    }

    createUser($conn,$firstName,$lastName,$email,$loginName,$pwd);

}else{
    header("Location: ../signuppage.php");
    exit();
}