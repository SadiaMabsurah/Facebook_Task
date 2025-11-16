<?php
session_start(); 
include("classes/connect.php");
include("classes/signup.php");

$first_name = "";
$last_name  = "";
$gender     = "";
$email      = "";
$error_message = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $signup = new Signup();
    $result = $signup->evaluate($_POST);

    if($result == "")
    {
        header("Location: login.php");
        die;
    }
    else
    {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;padding:10px;border-radius:5px;'>";
        echo "<strong>The following errors occured:</strong><br><br>";
        echo $result;
        echo "</div>";

        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $gender     = $_POST['gender'];
        $email      = $_POST['email'];
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Signup</title>
    <style>
        body { font-family: Tahoma, sans-serif; background-color: #e9ebee; }
        #bar { height: 100px; background-color: rgb(59, 89, 152); color: #d9dfeb; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; }
        #signup_button { background-color: #42b72a; width: 70px; text-align: center; padding: 10px; border-radius: 4px; cursor: pointer; }
        #bar2 { background-color: white; width: 800px; max-width: 90%; margin: 50px auto 0 auto; padding: 50px 20px 20px 20px; text-align: center; font-weight: bold; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; }
        #text { height: 40px; width: 300px; max-width: 90%; border-radius: 4px; border: solid 1px #ccc; padding: 4px; font-size: 14px; }
        #button { width: 300px; max-width: 90%; height: 40px; border-radius: 4px; border: none; background-color: rgb(59, 89, 152); color: white; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>
    <div id="bar">
        <div style="font-size: 40px;">facebook</div> 
        <div id="signup_button">Signup</div> 
    </div>

    <div id="bar2">
        Sign up to facebook<br><br>

        <form method="post" action="">
            <input name="first_name" type="text" id="text" placeholder="First name" value="<?php echo $first_name; ?>"><br><br>
            <input name="last_name" type="text" id="text" placeholder="Last name" value="<?php echo $last_name; ?>"><br><br>

            <span style="font-weight:normal;">Gender:</span><br>
            <select id="text" name="gender">
                <option><?php echo $gender?></option>
                <option>Male</option>
                <option>Female</option>
            </select>
            <br><br>
             
            <input name="email" type="text" id="text" placeholder="Email" value="<?php echo $email; ?>"><br><br>
            <input name="password" type="password" id="text" placeholder="Password"><br><br>
            <input name="password2" type="password" id="text" placeholder="Retype Password"><br><br>

            <input type="submit" id="button" value="Sign up"><br><br><br><br>
        </form>
    </div>
</body>
</html>
