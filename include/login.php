<?php

if(isset($_POST["submit"])){
    include_once('include.php');    

    $loginName = $_POST['loginName'];
    $pwd = $_POST['Password'];

//put the function to a sperate file later
    function checkloginpwd($conn, $loginName){
        $spl = "SELECT * FROM member WHERE loginName=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$spl)){
        header("Location: ../loginpage.php?error=stmtfail"); 
            exit();
        }        
        
        mysqli_stmt_bind_param($stmt,"ss",$loginName,$loginName);
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

    function checkloginstatus($conn, $Userid){
        $sql = "SELECT * FROM loginstatus WHERE Userid=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../loginpage.php?error=stmtfail"); 
            exit();    
        }

        mysqli_stmt_bind_param($stmt,"s",$Userid);
        mysqli_stmt_execute($stmt);
        $resultdata = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultdata)){
            return $row['loginStatus'];            
        }else {
            $result = false;
            return $result;
        }
    mysqli_stmt_close($stmt);
    }

    $userdata = checkloginpwd($conn, $loginName);

    $checkedpwd = password_verify($pwd, $userdata['pwd']);

    $Userid = $userdata['id'];


    if(checkloginstatus($conn, $Userid) === 1){
        header("Location: ../loginpage.php?error=userlogined");
        exit();
    }else{      
        if(empty($loginName)||empty($pwd)){
            header("Location: ../loginpage.php?error=inputempty");         
            exit();
        }if($userdata === false){
            header("Location: ../loginpage.php?error=nouser");         
            exit();
        }if($checkedpwd !== true){
            header("Location: ../loginpage.php?login=wrongpassword");
            exit();
        }if($checkedpwd === true){
            //change login status
            $sql = "INSERT INTO loginstatus (Userid, loginStatus) VALUES($Userid,1);";
            mysqli_query($conn,$sql);

            session_start();
            $_SESSION['loginName'] = $userdata['loginName'];
            $_SESSION['userid'] = $userdata['id'];
            header("Location: ../homepage.php?login=success");         
            exit();    
        }else{
            header("Location: ../loginpage.php?login=fail");
            exit(); 
        }
    }
}else{
    header("Location: ../loginpage.php");
    exit();
}