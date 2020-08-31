<?php
error_reporting(0);
require_once "db.php";
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login_page.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title> Flea Market</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<div id="container">
    <div id="navbar">
        <a href="index.php">Home</a>
        <a class="active" href="flea_market.php">Flea Market</a>
        <a href="InvetorySite.php">Inventory</a>
        <a href="scavCase.php">Scav Case</a>
        <a href="aboutPage.php">About</a>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include "login_status.php"; ?>
        </form>


    </div>
    <div id="center">
        <?php include "Table_Generator.php"; ?>
    </div>
</div>

</body>
</html>