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
    <title> Index Page</title>
    <link rel="stylesheet" type="text/css" href="css.css">
</head>
<style>
    h1{
        margin: auto;
        text-align: center;
    }
    p{
        text-align: center;
    }
    .bottomText2{
        font-weight: bold;
    }

</style>
<body>
<div id="container">
    <div id="navbar">
        <a href="index.php">Home</a>
        <a href="flea_market.php">Flea Market</a>
        <a href="InvetorySite.php">Inventory</a>
        <a href="scavCase.php">Scav Case</a>
        <a class="active" href="aboutPage.php">About</a>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <?php include "login_status.php"; ?>
        </form>


    </div>
    <div id="center">
        <h1>What is Flea market?</h1>
        <p>Flea market is a website inspired by the game Escape from Tarkov where you are able to buy, sell and obtain items from the game.</p>
        <h1>Who are its creators?</h1>
        <p>The creators of this website are two young aspiring programmers, <a href="https://www.linkedin.com/in/jovan-daki%C4%87-09453315a/">Jovan Dakic</a> and <a href="https://www.linkedin.com/in/nikola-mrkai%C4%87-440427199/">Nikola Mrkaic</a>, currently studying in the town of Subotica.</p>
        <h1 class="bottomText">Contact:</h1>
        <p class="bottomText2">mrkaic.nikola@gmail.com <br>jovan.dakic999@gmail.com</p>

    </div>
</div>


</body>
    </html><?php
