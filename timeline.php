<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: tahoma, sans-serif;
            background-color: #d0d8e4;
            margin: 0;
        }

        /* Top bar */
        #blue_bar {
            height: 50px;
            background-color: #405d9b;
            color: #d9dfeb;
        }

        #blue_bar .container {
            width: 800px;
            max-width: 90%;
            margin: auto;
            font-size: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #search_box {
            width: 400px;
            height: 25px;
            border-radius: 5px;
            border: none;
            padding: 4px;
            font-size: 14px;
            background-image: url(searchicon.png);
            background-repeat: no-repeat;
            background-position: right;
        }

        #profile_pic_top {
            width: 50px;
            border-radius: 50%;
        }

        /* Layout */
        .main_content {
            width: 800px;
            max-width: 90%;
            margin: 20px auto;
            display: flex;
            gap: 20px;
        }

        /* Friends sidebar */
        .friends_bar {
            flex: 1;
            min-height: 400px;
            background-color: white;
            text-align: center;
            font-size: 20px;
            color: #405d9b;
            border-radius: 8px;
            padding: 20px 10px;
        }

        .friends_bar img.profile {
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
            margin-bottom: 10px;
        }

        /* Posts area */
        .posts_area {
            flex: 2.5;
        }

        .post_input {
            background-color: white;
            border: solid #aaa 1px;
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
            margin-top: 5px;
        }

        .post_bar {
            background-color: white;
            padding: 10px;
            border-radius: 8px;
        }

        .post {
            display: flex;
            margin-bottom: 20px;
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

    <!-- Top Bar -->
    <div id="blue_bar">
        <div class="container">
            facebook
            <input type="text" id="search_box" placeholder="Search for people">
            <img src="profile.webp" id="profile_pic_top" alt="Profile">
        </div>
    </div>

    <!-- Main Content -->
    <div class="main_content">
        <!-- Friends Sidebar -->
        <div class="friends_bar">
            <img src="pictures/profile.webp" class="profile" alt="Profile Picture">
            <div>Sadia Mabsurah</div>
        </div>

        <!-- Posts Area -->
        <div class="posts_area">
            <!-- Post Input -->
            <div class="post_input">
                <textarea placeholder="What's on your mind?" rows="3"></textarea>
                <input type="submit" id="post_button" value="Post">
            </div>

            <!-- Posts -->
            <div class="post_bar">
                <div class="post">
                    <img src="pictures/user1.jfif" alt="John Mark">
                    <div class="post_content">
                        <div class="author">John Mark</div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, fugiat expedita a explicabo enim provident 
                        repudiandae quo blanditiis debitis! Itaque necessitatibus repellendus incidunt excepturi soluta ut delectus fugit!
                        <br><br>
                        <a href="#">Like</a> . <a href="#">Comment</a> . <span>November 11 2025</span>
                    </div>
                </div>

                <div class="post">
                    <img src="pictures/user3.jfif" alt="David Loren">
                    <div class="post_content">
                        <div class="author">David Loren</div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, fugiat expedita a explicabo enim provident 
                        repudiandae quo blanditiis debitis! Itaque necessitatibus repellendus incidunt excepturi soluta ut delectus fugit!
                        <br><br>
                        <a href="#">Like</a> . <a href="#">Comment</a> . <span>September 18 2025</span>
                    </div>
                </div>

                <div class="post">
                    <img src="pictures/user4.jfif" alt="Bob Frendy">
                    <div class="post_content">
                        <div class="author">Bob Frendy</div>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, fugiat expedita a explicabo enim provident 
                        repudiandae quo blanditiis debitis! Itaque necessitatibus repellendus incidunt excepturi soluta ut delectus fugit!
                        <br><br>
                        <a href="#">Like</a> . <a href="#">Comment</a> . <span>October 5 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
