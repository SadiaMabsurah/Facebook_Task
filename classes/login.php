<?php
class Login {

    private $error = "";

    // Evaluate login credentials
    public function evaluate($data) {

        $email = trim(addslashes($data['email']));
        $password = $data['password']; // plain text password

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            $row = $result[0];

            // For plain text passwords
            if ($password == $row['password']) {
                $_SESSION['facebook_userid'] = $row['userid'];
                return "";
            } else {
                $this->error .= "Wrong password<br>";
            }
        } else {
            $this->error .= "No such email found<br>";
        }

        return $this->error;
    }

    // Check if user is logged in
    public function check_login($id) {
        $query = "SELECT userid FROM users WHERE userid = '$id' LIMIT 1";

        $DB = new Database();
        $result = $DB->read($query);

        if ($result) {
            return true;
        }
        return false;
    }
}
?>
