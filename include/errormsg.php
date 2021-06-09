<?php

if(isset($_GET['error'])){
    $error = $_GET['error'];

    if($error == 'inputempty'){
        echo '<p class="errormsg">Please fill in all required fields!</p>';
    }

    if($error == 'invalidloginName'){
        echo '<p class="errormsg">Invalid Login Name!</p>';
    }

    if($error == 'invalidemail'){
        echo '<p class="errormsg">Invalid email!</p>';
    }

    if($error == 'notsamepassword'){
        echo '<p class="errormsg">Please repeat the same password!</p>';
    }

    if($error == 'loginnametaken'){
        echo '<p class="errormsg">login Name has been used!</p>';
    }

    if($error == 'nouser'){
        echo '<p class="errormsg">Incorrect user name!</p>';
    }

    if($error == 'userlogined'){
        echo '<p class="errormsg">This user is logined!</p>';
    }
}

if(isset($_GET['login'])){
    $error = $_GET['login'];

    if($error == 'wrongpassword'){
        echo '<p class="errormsg">Incorrect password!</p>';
    }    

}else {
    echo '<p class="errormsg"></p>';
}