<?php 
session_start();
?>
<header>
<nav>
    <div class="brand-title">Login System</div>
    <a herf="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <div class="nav-container">
    <ul>
        <li><a href="../loginsys/homepage.php">Home</a></li>
        <li><a href="../loginsys/signuppage.php">Signup</a></li>
        <?php
        if(isset($_SESSION['userid'])){
        echo '<li><a href="../loginsys/profile.php">Profile</a></li>';
        echo '<button id="logoutbt" type="button" name="logout" onclick="location.href='."'".'../loginsys/include/logout.php'."'".'">Logout</button>';
        }else{
        echo '<button id="loginbt" type="button" name="login" onclick="location.href='."'".'../loginsys/loginpage.php'."'".'">Login</button>';
        }      
        ?>           
    </ul>
    </div>     
</nav>

</header>