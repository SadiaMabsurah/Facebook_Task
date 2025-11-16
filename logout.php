<?php
session_start();
if(isset($_SESSION['facebook_userid'])){

    $_SESSION['facebook_userid']=NULL;
    unset($_SESSION['facebook_userid']);
}
header("Location: login.php");
die;


?>