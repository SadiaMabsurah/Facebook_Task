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

    $post = new Post();

    if(isset($_GET['id'])){
        $postid = $_GET['id'];
        $post_data = $post->get_post($postid);

        // Make sure the post belongs to this user
        if($post_data['userid'] != $id){
            header("Location: profile.php");
            die;
        }
    }

    // Handle form submission
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $updated_post = $_POST['post'];
        $post->update_post($id, $postid, $updated_post);
        header("Location: profile.php");
        die;
    }

} else {
    header("Location: login.php");
    die;
}
?>

<form method="post">
    <textarea name="post" rows="4" style="width: 100%;"><?php echo htmlspecialchars($post_data['post']); ?></textarea><br>
    <input type="submit" value="Update Post">
</form>
