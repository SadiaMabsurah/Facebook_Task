<?php
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");

$response = ["status" => "error"];

if(isset($_SESSION['facebook_userid']) && is_numeric($_SESSION['facebook_userid'])){
    $id = $_SESSION['facebook_userid'];

    if(isset($_POST['follow_id']) && is_numeric($_POST['follow_id'])){
        $follow_id = $_POST['follow_id'];
        $user = new User();

        if($user->is_following($id, $follow_id)){
            $user->unfollow_user($id, $follow_id);
            $response["status"] = "unfollowed";
        } else {
            $user->follow_user($id, $follow_id);
            $response["status"] = "followed";
        }
    }
}

echo json_encode($response);
exit;
?>
