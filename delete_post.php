<?php
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/post.php");

if(isset($_SESSION['facebook_userid']) && is_numeric($_SESSION['facebook_userid'])) {
    $id = $_SESSION['facebook_userid'];

    $login = new Login();
    $result = $login->check_login($id);

    if(!$result){
        header("Location: login.php");
        die;
    }

    if(isset($_GET['id'])){
        $postid = $_GET['id'];
        $post = new Post();
        $post->delete_post($id, $postid);
    }

    header("Location: profile.php");
    die;
} else {
    header("Location: login.php");
    die;
}
?>
