<?php
class Post
{
    private $error = "";

    public function create_post($userid,$data)
    {
        if(!empty($data['post']))
        {
            $post = addslashes($data['post']);
            $postid = $this->create_postid();

            $query = "insert into posts (userid,postid,post) values ('$userid','$postid','$post')";

            $DB = new Database();
            $DB->save($query);

        }else{
            $this->error .= "Please type something to post!<br>";
        }
        return $this->error;
    }

    private function create_postid() {
        $length = rand(4, 19);
        $number = "";
        for($i = 0; $i < $length; $i++){
            $number .= rand(0, 9);
        }
        return $number;
    }

    public function get_posts($id)
    {
        $query = "select * from posts where userid = '$id' order by id desc limit 10";
        $DB = new Database();
        $result = $DB->read($query);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    public function get_post($postid){
        $DB = new Database();
        $query = "SELECT * FROM posts WHERE postid='$postid' LIMIT 1";
        $result = $DB->read($query);
        if($result){
            return $result[0];
        }
        return false;
    }

    public function update_post($userid, $postid, $new_post){
        $DB = new Database();
        $new_post = addslashes($new_post);
        $query = "UPDATE posts SET post='$new_post' WHERE postid='$postid' AND userid='$userid' LIMIT 1";
        $DB->save($query);
    }

    public function delete_post($userid, $postid){
        $DB = new Database();
        $query = "DELETE FROM posts WHERE postid='$postid' AND userid='$userid' LIMIT 1";
        $DB->save($query);
    }
}
?>