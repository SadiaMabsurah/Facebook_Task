 <div class="friend">
    <?php
      $image = "pictures/male.avif";
      if($FRIEND_ROW['gender']=="Female"){
        $image = "pictures/female.avif";
      }
    ?>
    <img src="<?php echo $image?>" alt=""><br>

    <?php echo $FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name'] ?>
</div>