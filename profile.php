<!DOCTYPE html>
<html lang="en">
<head>
<?php include('head.php');?>
    <title>Profile page</title>
</head>
<body>
<?php include('header.php');?>
<h1>This is Profile page</h1> 

<?php
if(isset($_SESSION['userid'])){
    include_once('include/include.php');
    function loadprofile($conn,$userid){
        $sql = "SELECT * FROM member WHERE id=?;";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../profilepage.php?error=stmtfail"); 
            exit();
        }

        mysqli_stmt_bind_param($stmt,'s',$userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        return $row;
    }

    $profiledata = loadprofile($conn,$_SESSION['userid']);

    echo "<p>User Name: ".$profiledata["firstName"]." ".$profiledata["lastName"]."<br>";
    echo "Login Name: ".$profiledata["loginName"]."<br>";
    echo "Contact email: ".$profiledata["email"]."<br></p>";
    
    // foreach($profiledata as $value){
    //     echo "$value <br>";
    // }
}else{
    echo '<p>Please login to see the content.</p>';
}
?>

</body>
</html>