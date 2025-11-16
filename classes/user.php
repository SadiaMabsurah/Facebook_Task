<?php

class User
{
    public function get_data($id)
    {
        $query = "select * from users where userid = '$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];
            return $row;
        }else
        {
            return false;
        }
    }
    public function get_user($id)
    {
        $query = "select * from users where userid = '$id' limit 1";
        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }else
        {
            return false;
        }
    }
    public function get_friends($id)
{
    $query = "SELECT * FROM users WHERE userid != '$id'";
    $DB = new Database();
    $result = $DB->read($query);
    return $result ? $result : false;
}

 
    // Check if $follower_id is following $following_id
    public function is_following($follower_id, $following_id){
        $query = "SELECT * FROM followers WHERE follower_id='$follower_id' AND following_id='$following_id' LIMIT 1";
        $DB = new Database();
        $result = $DB->read($query);
        return $result ? true : false;
    }

    // Follow a user
    public function follow_user($follower_id, $following_id){
        $query = "INSERT INTO followers (follower_id, following_id) VALUES ('$follower_id', '$following_id')";
        $DB = new Database();
        $DB->save($query);
    }

    // Unfollow a user
    public function unfollow_user($follower_id, $following_id){
        $query = "DELETE FROM followers WHERE follower_id='$follower_id' AND following_id='$following_id' LIMIT 1";
        $DB = new Database();
        $DB->save($query);
    }

    
}


?>