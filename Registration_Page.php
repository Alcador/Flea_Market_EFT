<?php
error_reporting(0);
session_destroy();
session_start();
require_once "db.php";
//session_start();

//include("conn.php");

//$connection = OpenCon();

/* if(!isset($_SESSION['id'])) {
    header("Location: index.php");
}
*/

//echo "777777777 YEP COCK 77777777777";

//if(!empty($_POST))
if(!empty($_POST)) {
    $username_register = $_POST['Username_Register'];
    $password_register = $_POST['Password_Register'];


    $sql = "SELECT * FROM users WHERE username = '${username_register}'";

    $query = mysqli_query($db, $sql);
    //var_dump($query);
    $row = mysqli_fetch_array($query);
    $username_search = $row['username'];
    $id = $row['id'];
/*
    try {

        $id = $row['id'];
        $db_password = $row['password'];
    }
    catch (exception $e) {
        //code to handle the exception
        echo "Its all good fam";
    }
*/

    ///////////////////////// Username and Password Checks AND Insertion
    if($username_register === $username_search) {
        echo "<script type='text/javascript'>alert('User already exists in database!');</script>";
    }
    else {
        $sql_insert =  "INSERT INTO users (username, password)
                        VALUES ('$username_register','$password_register');";
        $result = mysqli_query($db, $sql_insert);
        $result_new_user = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result_new_user);
        $username_search = $row['username'];
        $id = $row['id'];

        if($result) {
            $_SESSION['Username'] = $username_register;
            $_SESSION['id'] = $id;
            header("Location: index.php");
        }

    }

/*
    if($password == $db_password) {
        $_SESSION['Username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: index.php");
    }
    else {
        echo "You didn't enter the correct details!";
    }
*/
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
<html>
<body>
<div id="container">
    <div id="navbar">
        <a href="index.php">Home</a>
        <form action="Registration_Page.php" method="post" enctype="multipart/form-data">
            <input type="submit" value="Register" name="Login">
            <input type="password" placeholder="Password" name="Password_Register" required>
            <input type="text" placeholder="Username" name="Username_Register" autocomplete="off" autofocus required>
        </form>
    </div>
    <div id="center">

    </div>
</div>
</body>
</html>