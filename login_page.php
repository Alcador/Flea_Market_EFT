<?php
require_once "db.php";
session_start();

//include("conn.php");

//$connection = OpenCon();

/* if(!isset($_SESSION['id'])) {
    header("Location: index.php");
}
*/


echo "777777777 YEP COCK 77777777777";

//if(!empty($_POST))
if(!empty($_POST)) {

    $username = $_POST['Username'];
    $password = $_POST['Password'];


    $sql = "SELECT * FROM users WHERE username = '${username}'";
    echo "random";

    $query = mysqli_query($db, $sql);
    var_dump($query);
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $db_password = $row['password'];

    if($password == $db_password) {
        $_SESSION['Username'] = $username;
        $_SESSION['id'] = $id;
        header("Location: index.php");
        echo "Welcome!";
    }
    else {
        echo "You didn't enter the correct details!";
    }

}
echo "bullshit";
//CloseCon($connection);
?>

<head>
    <title> LOGIN PAGE</title>
</head>
<body>

<h1>LOGIN</h1>
<form action="login_page.php" method="post" enctype="multipart/form-data">
    <input type="text" placeholder="Username" name="Username" autofocus>
    <input type="password" placeholder="Password" name="Password">
    <input type="submit" value="Login" name="Login">
</form>

</body>
