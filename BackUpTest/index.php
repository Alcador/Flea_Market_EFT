<?php
error_reporting(0);
require_once "db.php";
session_start();
//include("conn.php");
include "Table_Generator.php";

 if(!isset($_SESSION['id'])) {
     header("Location: login_page.php");
 }
/*
if(isset($_POST['login'])) {
    include("db.php");
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $db_password = $row['password'];

    if($password == $db_password) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: login_page.php");
    } else {
        echo "You didn't enter the correct details!";
    }

}
*/
?>
<head>
    <title> Index Page</title>
</head>
<body>

<h1>Flea Market Main</h1>
<?php include "login_status.php"; ?>
<?/*php include "Table_Generator.php";  //Table_Generator(); */?>




</body>
