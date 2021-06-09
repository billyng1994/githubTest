<?php
    include_once('include.php');

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $loginName = $_POST['loginName'];
    $pwd = $_POST['pwd'];
    $repeatpwd = $_POST['repeatpwd'];
    
    // $sql = "INSERT INTO member (`firstName`,`lastName`,`email`,`loginName`,`pwd`) VALUES ('$firstName','$lastName','$email','$loginName','$pwd');";
    // mysqli_query($conn,$sql);

    function createUser($conn,$firstName,$lastName,$email,$loginName,$pwd){
        $spl = "INSERT INTO member (`firstName`,`lastName`,`email`,`loginName`,`pwd`) VALUES(?,?,?,?,?);";
        //Create a prepared statmtent
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$spl)){
            header("Location: ../signuppage.php?error=stmtfail"); 
            exit();
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,"sssss",$firstName,$lastName,$email,$loginName,$hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../signuppage.php?signup=success"); 
            exit();
    }

    function emptyInputSignup($firstName, $lastName, $email, $loginName, $pwd, $repeatpwd){
        $error;
        if (empty($firstName) || empty($lastName) || empty($email) || empty($loginName) || empty($pwd) || empty($repeatpwd)){
            $error = true;
        }else {
            $error = false;
        }
        return $error;
    }

    function invalidloginName($loginName){
        $error;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $loginName)){
            $error = true;
        }else {
            $error = false;
        }
        return $error;
    }

    function invalidemail($email){
        $error;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = true;
        }else {
            $error = false;
        }
        return $error;
    }

    function pwdmatch($pwd,$repeatpwd){
        $error;
        if ($pwd !== $repeatpwd){
            $error = true;
        }else {
            $error = false;
        }
        return $error;
    }

    function loginNameexist($conn,$loginName,$email){
        $spl = "SELECT * FROM member WHERE loginName=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$spl)){
            header("Location: ../signuppage.php?error=stmtfail"); 
            exit();
        }

        mysqli_stmt_bind_param($stmt,"ss",$loginName, $email);
        mysqli_stmt_execute($stmt);
        $resultdata = mysqli_stmt_get_result($stmt);

        if($row = mysqli_fetch_assoc($resultdata)){
            return $row;
        }else {
            $result = false;
            return $result;
        }

    mysqli_stmt_close($stmt);
    }


 