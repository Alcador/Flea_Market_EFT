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
        echo "<script type='text/javascript'>alert('Success');</script>";
    }

    ///////////////////////// Username and Password Checks
    if($username != $username_search) {
        echo "<script type='text/javascript'>alert('User does not exist in database!');</script>";
    }
    elseif($password == $db_password) {
        $_SESSION['Username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: index.php");
    }
    else {
        echo "<script type='text/javascript'>alert('You didnt enter the correct details!');</script>";
    }

}
//echo " ::after IF:: ";
//CloseCon($connection);
?>

<head>
    <title> LOGIN PAGE</title>
    <link rel="stylesheet" type="text/css" href="css.css">
    <style>
        @font-face {
            font-family: 'benderlight';
            src: url('jovanny_lemonad_-_bender-light-webfont.woff2') format('woff2'),
            url('jovanny_lemonad_-_bender-light-webfont.woff') format('woff');
            font-weight: normal;
            font-style: normal;

        }
        input[type=text]{
            padding: 5px;
            float: right;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
            font-family: benderlight, Arial, 'Times New Roman';
        }
        input[type=password]{
            padding: 5px;
            float: right;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
            font-family: benderlight, Arial, 'Times New Roman';
        }
        input[type=submit]{
            padding: 5px;
            float: right;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
            font-family: benderlight, Arial, 'Times New Roman';
            font-weight: bolder;
        }

    </style>
</head>
<body>
<div id="container">
    <div id="navbar">
        <a class="active" href="index.php">Home</a>
        <form class="form" action="login_page.php" method="post" enctype="multipart/form-data">
            <input type="submit" value="Login" name="Login">
            <input type="password" placeholder="Password" name="Password" required>
            <input type="text" placeholder="Username" name="Username" autocomplete="off" required autofocus>
            <a href="Registration_Page.php">Register</a>
        </form>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include "login_status.php"; ?>
        </form>
    </div>
    <div id="center">

    </div>
</div>



</body>
