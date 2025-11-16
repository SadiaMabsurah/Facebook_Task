<?php
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/post.php");

// login check
if(isset($_SESSION['facebook_userid']) && is_numeric($_SESSION['facebook_userid'])){
    $id = $_SESSION['facebook_userid'];
    $login = new Login();
    $result = $login->check_login($id);

    if($result){
        $user = new User();
        $user_data = $user->get_data($id);
        if(!$user_data){
            header("Location: login.php");
            die;
        }
    } else {
        header("Location: login.php");
        die;
    }
} else {
    header("Location: login.php");
    die;
}

if($_SERVER['REQUEST_METHOD']=="POST"){
    $post = new Post();
    $result = $post->create_post($id,$_POST);
    if($result){
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;padding:10px;border-radius:5px;'>".$result."</div>";
    }
}

// fetch posts
$post = new Post();
$posts = $post->get_posts($id);

// fetch friends
$user = new User();
$friends= $user->get_friends($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profile</title>
<style>

body { 
    font-family: Tahoma, sans-serif; 
    background-color: #d0d8e4; 
    margin: 0; 
    padding: 0; 
}

/* Top Blue Bar */
#blue_bar { 
    height: 50px; 
    background-color: #405d9b; 
    color: #d9dfeb; 
}

#blue_bar .container { 
    width: 800px; 
    margin: auto; 
    font-size: 30px; 
    display: flex; 
    align-items: center; 
    justify-content: space-between; 
    position: relative; 
}

/*  Search Box  */
#search_box { 
    width: 400px; 
    height: 20px; 
    border-radius: 5px; 
    border: none; 
    padding: 4px; 
    font-size: 14px; 
    background-image: url(searchicon.png); 
    background-repeat: no-repeat; 
    background-position: right; 
}

/* Profile Image in Top Bar*/
#profile { 
    width: 50px; 
    border-radius: 50%; 
}

/* Cover Section*/
.cover_section { 
    width: 800px; 
    max-width: 90%; 
    margin: auto; 
    background-color: white; 
    text-align: center; 
    color: #405d9b; 
    position: relative; 
    border-radius: 8px; 
    overflow: hidden; 
}

.cover_section img.cover { 
    width: 100%; 
    display: block; 
}

.cover_section img.profile { 
    width: 150px; 
    margin-top: -75px; 
    border-radius: 50%; 
    border: solid 4px white; 
}

/*  User Name  */
.user_name { 
    font-size: 20px; 
    margin: 10px 0; 
}

/*  Menu Buttons Below Cover  */
.menu_buttons { 
    display: inline-block; 
    width: 100px; 
    margin: 2px; 
    padding: 5px 0; 
    cursor: pointer; 
    border-radius: 4px; 
}

/*  Main Content Area  */
.main_content { 
    display: flex; 
    width: 800px; 
    max-width: 90%; 
    margin: 20px auto; 
    gap: 20px; 
}

/*  Friends Sidebar  */
.friends_bar { 
    background-color: white; 
    min-height: 400px; 
    padding: 10px; 
    color: #aaa; 
    flex: 1; 
    border-radius: 8px; 
}

.friends_bar h3 { 
    margin-top: 0; 
    color: #405d9b; 
}

.friend { 
    display: flex; 
    align-items: center; 
    margin-bottom: 10px; 
    font-size: 12px; 
    font-weight: bold; 
    color: #405d9b; 
}

.friend img { 
    width: 50px; 
    height: 50px; 
    border-radius: 50%; 
    margin-right: 8px; 
    object-fit: cover; 
}

/*  Posts Area  */
.posts_area { 
    flex: 2.5; 
}

/*  Post Input Box */
.post_input { 
    background-color: white; 
    padding: 10px; 
    margin-bottom: 20px; 
    border-radius: 8px; 
}

.post_input textarea { 
    width: 100%; 
    border: none; 
    font-size: 14px; 
    font-family: tahoma; 
    resize: none; 
    padding: 4px; 
}

#post_button { 
    float: right; 
    background-color: #405d9b; 
    border: none; 
    color: white; 
    padding: 6px 10px; 
    font-size: 14px; 
    border-radius: 4px; 
    cursor: pointer; 
}

/* Posts List */
.post_bar { 
    background-color: white; 
    padding: 10px; 
    border-radius: 8px; 
}

.post { 
    display: flex; 
    margin-bottom: 20px; 
    padding: 4px; 
    font-size: 13px; 
}

.post img { 
    width: 75px; 
    height: 75px; 
    border-radius: 5px; 
    object-fit: cover; 
    margin-right: 10px; 
}

.post_content { 
    flex: 1; 
}

.post_content .author { 
    font-weight: bold; 
    color: #405d9b; 
}

.post_content a { 
    color: #405d9b; 
    text-decoration: none; 
    font-size: 13px; 
}

.post_content span { 
    color: #999; 
    font-size: 12px; 
}

</style>
</head>
<body>

<div id="blue_bar">
<div class="container">
facebook
<input type="text" id="search_box" placeholder="Search for people">
<div style="display:flex; align-items:center; gap:10px;">
<img id="profile" src="pictures/profile.webp" alt="Profile">
<a href="logout.php" style="color:white; font-size:14px; text-decoration:none;">Logout</a>
</div>
</div>
</div>

<!-- Cover section -->
<div class="cover_section">
<img src="pictures/nature.jpeg" class="cover" alt="Cover">
<img src="pictures/profile.webp" class="profile" alt="Profile Picture">
<div class="user_name"><?php echo htmlspecialchars($user_data['first_name'] . " " . $user_data['last_name']); ?></div>

<div class="menu_buttons">Timeline</div>
<div class="menu_buttons">About</div>
<div class="menu_buttons">Friends</div>
<div class="menu_buttons">Photos</div>
<div class="menu_buttons">Settings</div>
</div>

<!-- Main content -->
<div class="main_content">

<!-- Friends sidebar -->
<div class="friends_bar">
<h3>People you may know</h3>
<?php
$user_obj = new User(); 
if($friends) {
    foreach($friends as $FRIEND_ROW) {
        $friend_id = $FRIEND_ROW['userid'];
        $isFollowing = $user_obj->is_following($id, $friend_id); 

        $image = "pictures/male.avif";
        if(isset($FRIEND_ROW['gender']) && $FRIEND_ROW['gender'] == "Female"){
            $image = "pictures/female.avif";
        }

        if(!empty($FRIEND_ROW['profile_image'])){
            $image = $FRIEND_ROW['profile_image'];
        }
?>
    <div class="friend">
        <img src="<?php echo $image; ?>" alt="Friend">
        <div>
            <?php echo htmlspecialchars($FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name']); ?><br>
            <button class="follow-btn" data-id="<?php echo $friend_id; ?>"
                    style="padding:5px 10px; background-color:<?php echo $isFollowing ? 'red' : '#405d9b'; ?>; color:white; border-radius:5px; border:none; cursor:pointer;">
                <?php echo $isFollowing ? 'Unfollow' : 'Follow'; ?>
            </button>
        </div>
    </div>
<?php
    }
}
?>


</div>

<!-- Posts area -->
<div class="posts_area">
<div class="post_input">
<form method="post">
<textarea name="post" placeholder="What's on your mind?" rows="3"></textarea>
<input type="submit" id="post_button" value="Post">
</form>
</div>

<div class="post_bar">
<?php
if($posts) {
    foreach($posts as $ROW) {
        $ROW_USER = $user->get_data($ROW['userid']);
        include("post.php");
    }
}
?>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $(".follow-btn").click(function(){
        var btn = $(this);
        var follow_id = btn.data("id");

        $.ajax({
            url: "follow_ajax.php",
            type: "POST",
            data: { follow_id: follow_id },
            dataType: "json",
            success: function(response){
                if(response.status == "followed"){
                    btn.text("Unfollow");
                    btn.css("background-color", "red");
                } else if(response.status == "unfollowed"){
                    btn.text("Follow");
                    btn.css("background-color", "#405d9b");
                }
            }
        });
    });
});
</script>


</body>
</html>
