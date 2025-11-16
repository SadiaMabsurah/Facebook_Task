<div class="post">
    <?php
      $image = "pictures/male.avif";
      if($ROW_USER['gender']=="Female"){
        $image = "pictures/female.avif";
      }
    ?>
    <img src="<?php echo $image?>" alt="">
    <div class="post_content">
        <div class="author"><?php echo htmlspecialchars($ROW_USER['first_name'] . " " . $ROW_USER['last_name']); ?></div>
        <div class="text"><?php echo nl2br(htmlspecialchars($ROW['post'])); ?></div>
        <br>
        <a href="#">Like</a> . <a href="#">Comment</a> . <span><?php echo $ROW['date']; ?></span>

        <?php if($ROW['userid'] == $_SESSION['facebook_userid']): ?>
            <br>
            <!-- Edit and Delete links for the owner -->
            <a href="edit_post.php?id=<?php echo $ROW['postid']; ?>">Edit</a> | 
            <a href="delete_post.php?id=<?php echo $ROW['postid']; ?>" onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
        <?php endif; ?>
    </div>
</div>
