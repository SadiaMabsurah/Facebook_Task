<?php
session_start();
include("classes/connect.php");
include("classes/login.php");

$email  = "";
$password = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $login = new Login();
    $result = $login->evaluate($_POST);

    if ($result == "") {
        header("Location: profile.php");
        die;
    } else {
        echo "<div style='text-align:center;font-size:12px;color:white;background-color:grey;padding:10px;border-radius:5px;'>";
        echo "<strong>The following errors occurred:</strong><br><br>";
        echo $result;
        echo "</div>";
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook Login</title>
<style>
body { font-family: Tahoma, sans-serif; background-color: #e9ebee; margin: 0; padding: 0; }

#bar { height: 100px; background-color: rgb(59, 89, 152); color: #d9dfeb; display: flex; align-items: center; justify-content: space-between; padding: 0 20px; }
#bar div { font-size: 40px; }
#signup_button { background-color: #42b72a; padding: 8px 16px; border-radius: 6px; cursor: pointer; font-size: 14px; font-weight: bold; color: white; }
#signup_button:hover { opacity: 0.9; }

#bar2 { background-color: white; width: 800px; max-width: 90%; margin: 50px auto; padding: 50px 20px 20px 20px; text-align: center; font-weight: bold; border-radius: 8px; box-shadow: 0px 0px 10px #ccc; }

.text_input { height: 40px; width: 300px; max-width: 90%; border-radius: 4px; border: solid 1px #ccc; padding: 4px; font-size: 14px; }

#button { width: 300px; max-width: 90%; height: 40px; border-radius: 4px; border: none; background-color: rgb(59, 89, 152); color: white; cursor: pointer; font-size: 16px; }
#button:hover { opacity: 0.9; }
</style>
</head>
<body>

<div id="bar">
    <div>facebook</div>
    <div id="signup_button" onclick="location.href='signup.php'">Signup</div>
</div>

<div id="bar2">
    Log in to Facebook<br><br>
    <form method="post">
        <input value="<?php echo $email ?>" type="text" class="text_input" name="email" placeholder="Email"><br><br>
        <input value="<?php echo $password ?>" type="password" class="text_input" name="password" placeholder="Password"><br><br>
        <input type="submit" id="button" value="Log in"><br><br><br><br>
    </form>
</div>

</body>
</html>
