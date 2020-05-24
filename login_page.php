<?php
session_start();
error_reporting(0);
//session_destroy();
require_once "db.php";


//include("conn.php");

//$connection = OpenCon();

/* if(!isset($_SESSION['id'])) {
    header("Location: index.php");
}
*/
/*
__          __            _
 \ \        / /           | |
  \ \  /\  / /___    __ _ | |__
   \ \/  \/ // _ \  / _` || '_ \
    \  /\  /| (_) || (_| || | | |
  _  \/  \/  \___/  \__,_||_|_|_|___    _____  _  __
 | \ | |(_)             / ____|/ __ \  / ____|| |/ /
 |  \| | _   ___  ___  | |    | |  | || |     | ' /
 | . ` || | / __|/ _ \ | |    | |  | || |     |  <
 | |\  || || (__|  __/ | |____| |__| || |____ | . \
 |_| \_||_| \___|\___|  \_____|\____/  \_____||_|\_\

*/
//echo "777777777 YEP COCK 77777777777";

if(!empty($_POST)) {

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    /////////////////////////////DONT'T fucking touch this Nikola
    $sql = "SELECT * FROM users WHERE username = '${username}'";
   // echo " ::Inside If:: ";

    $query = mysqli_query($db, $sql);
    //var_dump($query);
    $row = mysqli_fetch_array($query);
    $username_search = $row['username'];

    try {

        $id = $row['id'];
        $db_password = $row['password'];
    }
    catch (exception $e) {
        //code to handle the exception
        echo "Its all good fam";
    }

    ///////////////////////// Username and Password Checks
    if($username != $username_search) {
        echo "User does not exist in database!";
    }
    elseif($password == $db_password) {
        $_SESSION['Username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: index.php");
    }
    else {
        echo "You didn't enter the correct details!";
    }

}
//echo " ::after IF:: ";
//CloseCon($connection);
?>

<head>
    <title> LOGIN PAGE</title>
</head>
<body>

<h1>LOGIN</h1>
<a href="Registration_Page.php">Register</a>
<form action="login_page.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Username" name="Username" required autofocus>
    <input type="password" placeholder="Password" name="Password" required>
    <input type="submit" value="Login" name="Login"> <br>
</form>

</body>
