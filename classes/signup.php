<?php

class Signup {

    private $error = "";

    public function evaluate($data) {
    
        foreach($data as $key => $value){
            if(empty($value)){
                $this->error .= "$key is empty!<br>";
            }

            if($key == "email")
            {
                if(!preg_match("/^[\w\-]+@[\w\-]+\.[\w\-]+$/", $value)){
                    $this->error .= "invalid email address!<br>";
                }
            }

            if($key == "first_name")
            {
                if(strstr($value," ")){
                    $this->error .= "first name can't have space<br>";
                }
            }

            if($key == "last_name")
            {
                if(is_numeric($value)){
                    $this->error .= "last name can't be number<br>";
                }
                if(strstr($value," ")){
                    $this->error .= "last name can't have space<br>";
                }
            }
        }

        if($this->error == ""){
            return $this->create_user($data);
        } else {
            return $this->error;
        }
    }

    public function create_user($data) {

        $first_name = ucfirst($data['first_name']);
        $last_name  = ucfirst($data['last_name']);
        $gender     = $data['gender'];
        $email      = $data['email'];
        $password   = $data['password'];

      
        $userid = $this->create_userid();

    
        $url_address = strtolower($first_name) . "." . strtolower($last_name);

        $query = "INSERT INTO users (userid, first_name, last_name, gender, email, password, url_address) 
                  VALUES ('$userid', '$first_name', '$last_name', '$gender', '$email', '$password', '$url_address')";

        $DB = new Database();
        $DB->save($query);
    }

    private function create_userid() {
        $length = rand(4, 19);
        $number = "";

        for($i = 0; $i < $length; $i++){
            $number .= rand(0, 9);
        }

        return $number;
    }
}

?>
