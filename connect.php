<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "facebook_db";

    function connect() {
        $connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);
        if (!$connection) {
            die("Database connection failed: " . mysqli_connect_error());
        }
        return $connection;
    }

    function read($query) {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        if (!$result) {
            return false;
        } else {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function save($query) {
        $conn = $this->connect();
        $result = mysqli_query($conn, $query);

        return $result ? true : false;
    }
}


?>
